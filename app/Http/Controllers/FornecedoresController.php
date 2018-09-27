<?php

namespace App\Http\Controllers;

use App\Models\Cidade;
use App\Models\Endereco;
use App\Models\Fornecedores;
use Illuminate\Http\Request;

class FornecedoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $endereco = Endereco::create($request->input('enderecoCompleto'));
//        $fornecedor = Fornecedores::create([])
        return $endereco;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Fornecedores  $fornecedores
     * @return \Illuminate\Http\Response
     */
    public function show(Fornecedores $fornecedores)
    {
        //
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Fornecedores  $fornecedores
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Fornecedores $fornecedores)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Fornecedores  $fornecedores
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fornecedores $fornecedores)
    {
        //
    }
}
