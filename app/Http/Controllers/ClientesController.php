<?php

namespace App\Http\Controllers;

use App\Models\Clientes;
use App\Services\ClientesService;
use Illuminate\Http\Request;

class ClientesController extends Controller
{

    /**
     * @var ClientesService $clienteService
     */
    protected $clienteService;

    /**
     * FornecedorController constructor.
     *
     * @param ClientesService $clienteService
     */
    public function __construct(ClientesService $clienteService)
    {
        $this->clienteService = $clienteService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->clienteService->all();
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $this->clienteService->create($request);
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Clientes::find($id);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        return $this->clienteService->update($request, $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Fornecedores  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $this->clienteService->destroy($id);
    }
}
