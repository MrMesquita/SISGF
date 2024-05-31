<?php

namespace App\Http\Controllers;

use App\Models\Farmaceutico;
use Illuminate\Http\Request;

class FarmaceuticoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('farmaceuticos');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Farmaceutico $farmaceutico)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Farmaceutico $farmaceutico)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Farmaceutico $farmaceutico)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Farmaceutico $farmaceutico)
    {
        //
    }
}
