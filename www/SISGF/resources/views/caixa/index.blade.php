@extends('layout.header')
@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="widget bg-primary" style="margin-bottom: 20px">
                        <div class="widget-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="state">
                                    <h2>{{$totalItems ?? '0'}}  X</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="widget bg-primary" style="margin-bottom: 20px">
                        <div class="widget-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="state" style="width:100%; display: flex; flex-direction:row;justify-content:space-between; align-items: center;">
                                    <h6>Total da compra:</h6>
                                    <span id="total" style="font-size: 2em">R$ 0</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="text-container">
                            <h6>Atalhos numpad</h6>
                            <span>[Esc] Cancelar</span>
                            <span>[1] Iniciar</span>
                            <span>[+] Adicionar produto</span>
                            <span>[-] Remover produto</span>
                            <span>[enter] Finaliza a compra</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card-body p-0 table-border-style">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Nome </th>
                                        <th>Tipo</th>
                                        <th>Qtde</th>
                                        <th>Valor</th>
                                        <th>Cód. barras</th>
                                    </tr>
                                </thead>
                                <tbody class="itemsBody">
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('keydown', function(event) {
            switch(event.code) {
                case 'Numpad1':
                    start()
                    break;
                case 'NumpadAdd':
                    add();
                    break;
                case 'NumpadSubtract':
                    getItems();
                    break;
                case 'NumpadEnter':
                    finalizar();
                    break;
                case 'Escape':
                    cancel();
                    break;
                default:
                    console.log('Outra tecla foi pressionada');
                    break;
            }
        });

        function start(){
            const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            let cliente = prompt('cpf do cliente')
            let funcionario = prompt('Codigo do funcionário')

            if(cliente != "" && funcionario != ""){
                fetch('/caixa/start/', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': token
                    },
                    body: JSON.stringify({cliente,funcionario})
                })
                .then(response => {
                    if(response.ok){
                        return response.json();
                    }else{
                        alert('Erro, cliente ou funcionário não existe no sistema')
                    }
                })
                .then(data => localStorage.setItem('compra_id', data.compra_id))
                .catch((error) => console.error('Error:', error));
            }
        }

        function add(){
            const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            let codigo = prompt('Digite o código de barras');

            if(!localStorage.getItem('compra_id')){
                alert('Inicie uma compra primeiro')
            }
            fetch('/caixa/add/', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': token
                },
                body: JSON.stringify({codigo, 'compra_id': localStorage.getItem('compra_id')})
            })
            .then(response => {
                if(!response.ok){
                    alert('Produto não encontrado');
                }else{
                    getItems();
                    return response.json();
                }
            })
            .catch((error) => alert(error.produto));
        }

        function getItems(){
            const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            const tbody = document.querySelector('.itemsBody');
            const idTotal = document.getElementById('total');
            let total = 0;
            tbody.innerHTML = '';

            fetch('/caixa/getItems/', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': token
                },
                body: JSON.stringify({'compra_id': localStorage.getItem('compra_id')})
            })
            .then(response => response.json())
            .then(data => {
                data.forEach(item => {
                    const tr = document.createElement('tr');
                    const tdNome = document.createElement('td');
                    tdNome.textContent = item.produto_nome;
                    const tdTipo = document.createElement('td');
                    tdTipo.textContent = item.tipo;
                    const tdQtd = document.createElement('td');
                    tdQtd.textContent = item.quantidade;
                    const tdValor = document.createElement('td');
                    tdValor.textContent = item.preco_unitario;
                    const tdCod = document.createElement('td');
                    tdCod.textContent = item.codigo;
                    
                    tr.append(tdNome,tdTipo,tdQtd,tdValor,tdCod);
                    tbody.append(tr);
                    total += Number(item.preco_unitario)
                });
                idTotal.textContent = 'R$ '+total;
            })
            .catch((error) => console.error('Error:', error));
        }

        function finalizar(){
            if(localStorage.getItem('compra_id')){
                alert('Compra finalizada');
                localStorage.removeItem('compra_id');
            }else{
                alert('Não existe compra para finalizar');
            }
        }

        function cancel(){
            const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            if(!localStorage.getItem('compra_id')){
                alert('Inicie uma compra para cancelá-la')
            }else{
                fetch('/caixa/destroyCompra/', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': token
                    },
                    body: JSON.stringify({'compra_id': localStorage.getItem('compra_id')})
                })
                .then(response => response.json())
                .catch((error) => console.error('Error:', error));
                finalizar()
            }
        }

    </script>
@endsection