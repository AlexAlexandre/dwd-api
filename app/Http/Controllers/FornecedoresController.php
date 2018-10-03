<?php

namespace App\Http\Controllers;

use App\Models\Cidade;
use App\Models\Endereco;
use App\Models\Fornecedores;
use Carbon\Carbon;
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
        return Fornecedores::all();
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

        $fornecedor = new Fornecedores();
        $fornecedor->id_endereco = $endereco->id_endereco;
        $fornecedor->tx_nome_fornecedor = $request->input('fornecedor.tx_nome_fornecedor');
        $fornecedor->nr_cpf = $request->input('fornecedor.nr_cpf');
        $fornecedor->tx_email_comercial = $request->input('fornecedor.tx_email_comercial');
        $fornecedor->nr_telefone_direto = $request->input('fornecedor.nr_telefone_direto');
        $fornecedor->nr_telefone_celular = $request->input('fornecedor.nr_telefone_celular');
        $fornecedor->tx_cargo = $request->input('fornecedor.tx_cargo');
        $fornecedor->tx_descricao_atividades = $request->input('fornecedor.tx_descricao_atividades');
        $fornecedor->created_at = Carbon::now();

        $fornecedor->save();

        return 'true';
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Fornecedores::with('endereco')->find($id);
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
     * @param  \App\Models\Fornecedores  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Fornecedores $id)
    {
        return $request;
//        return Fornecedores::destroy($id);
    }
}
