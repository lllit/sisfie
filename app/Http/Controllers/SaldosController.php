<?php

namespace App\Http\Controllers;

use App\Models\Saldos;
use Illuminate\Http\Request;

class SaldosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        /*
        | Datos estaticos emulando csv

        */
        $saldos = [
            '2018' => [
                ['subvencion' => 'Normal', 'resultado' => 31408936, 'porcentaje_personal' => 85.6, 'mensaje' => 'Establecimientos con saldo para comprar'],
                ['subvencion' => 'PIE', 'resultado' => -15991892, 'porcentaje_personal' => 118.13, 'mensaje' => 'Los gastos NO pueden ser mayores a sus ingresos'],
                ['subvencion' => 'SEP', 'resultado' => -5702625, 'porcentaje_personal' => 68.83, 'mensaje' => 'Los gastos en remuneraciones NO pueden exceder el 50% de sus ingresos']
            ],
            '2019' => [
                ['subvencion' => 'Normal', 'resultado' =>  -16250000, 'porcentaje_personal' => 88.1, 'mensaje' => 'Establecimientos con saldo para comprar'],
                ['subvencion' => 'PIE', 'resultado' => 32800000, 'porcentaje_personal' => 120.5, 'mensaje' => 'Los gastos NO pueden ser mayores a sus ingresos'],
                ['subvencion' => 'SEP', 'resultado' => -5800000, 'porcentaje_personal' => 70.2, 'mensaje' => 'Los gastos en remuneraciones NO pueden exceder el 50% de sus ingresos']
            ],
            '2020' => [
                ['subvencion' => 'Normal', 'resultado' =>  26250000, 'porcentaje_personal' => 88.1, 'mensaje' => 'Establecimientos con saldo para comprar'],
                ['subvencion' => 'PIE', 'resultado' =>-12800000, 'porcentaje_personal' => 120.5, 'mensaje' => 'Los gastos NO pueden ser mayores a sus ingresos'],
                ['subvencion' => 'SEP', 'resultado' => 5800000, 'porcentaje_personal' => 70.2, 'mensaje' => 'Los gastos en remuneraciones NO pueden exceder el 50% de sus ingresos']
            ],


        ];
        $selectedYear = $request->input('year', '2018'); // Por defecto, 2018 si no se selecciona nada




        return view("admin.saldos.index", [
            'selectedYear' => $selectedYear,
            'saldos' => $saldos,
            'filteredSaldos' => $saldos[$selectedYear] ?? [],

        ]);
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
    public function show(Saldos $saldos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Saldos $saldos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Saldos $saldos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Saldos $saldos)
    {
        //
    }
}
