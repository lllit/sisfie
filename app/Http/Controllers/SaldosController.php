<?php

namespace App\Http\Controllers;

use App\Models\Saldos;
use Illuminate\Http\Request;

class SaldosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view("admin.saldos.index");
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
