<?php
    $router = request()->route()->getAction();
    $actualController = 'home';

    if(isset($router['as'])){
        $router = explode(".", $router['as']);
        $actualController = $router[0];
    }
?>

<div class="app-sidebar colored">
    <div class="sidebar-header">
        <a class="header-brand" href="index.html">
            <div class="logo-img">
                <img src="src/img/brand-white.svg" class="header-brand-img" alt="lavalite">
            </div>
            <span class="text">ThemeKit</span>
        </a>
        <button type="button" class="nav-toggle" id="closeSideBar"><i data-toggle="expanded"
                class="ik ik-toggle-right toggle-icon"></i></button>
        <button id="sidebarClose" class="nav-close"><i class="ik ik-x"></i></button>
    </div>
    <div class="sidebar-content">
        <div class="nav-container">
            <nav id="main-menu-navigation" class="navigation-main">
                <div class="nav-lavel">Navigation</div>
                <div class="nav-item {{ $actualController == "home" ? 'active' : null}}">
                    <a href="/"><i class="ik ik-home "></i><span>Home</span></a>
                </div>
                <div class="nav-item {{ $actualController == "caixa" ? 'active' : null}}">
                    <a href="/caixa"><i class="ik ik-shopping-cart"></i><span>Caixa</span></a>
                </div>
                <div class="nav-item">
                    <a href="/"><i class="ik ik-bar-chart-2"></i><span>Dashboard</span></a>
                </div>
                <div class="nav-lavel">Páginas</div>
                <div class="nav-item {{ $actualController == "clientes" ? 'active' : null}}">
                    <a href="/clientes"><i class="ik ik-users"></i><span>Clientes</span></a>
                </div>
                <div class="nav-item {{ $actualController == "produtos" ? 'active' : null}}">
                    <a href="/produtos"><i class="ik ik-package"></i><span>Produtos</span></a>
                </div>
                <div class="nav-item {{ $actualController == "funcionarios" ? 'active' : null}}">
                    <a href="/funcionarios"><i class="ik ik-briefcase"></i><span>Funcionários</span></a>
                </div>
                <div class="nav-item {{ $actualController == "farmaceuticos" ? 'active' : null}}">
                    <a href="/farmaceuticos"><i class="ik ik-heart"></i><span>Farmacêuticos</span></a>
                </div>
                <div class="nav-item {{ $actualController == "atestados" ? 'active' : null}}">
                    <a href="/atestados"><i class="ik ik-clipboard"></i><span>Atestados</span></a>
                </div>
                <div class="nav-item {{ $actualController == "relatorios" ? 'active' : null}}">
                    <a href="/relatorios"><i class="ik ik-bar-chart"></i><span>Relatórios</span></a>
                </div>
                <div class="nav-lavel">Outros</div>
                <div class="nav-item has-sub">
                    <a href="#"><i class="ik ik-lock"></i><span>Authentication</span></a>
                    <div class="submenu-content">
                        <a href="pages/login.html" class="menu-item">Login</a>
                        <a href="pages/register.html" class="menu-item">Register</a>
                        <a href="pages/forgot-password.html" class="menu-item">Forgot Password</a>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</div>