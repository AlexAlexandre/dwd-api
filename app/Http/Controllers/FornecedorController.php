<?php

namespace App\Http\Controllers;

use App\Models\Endereco;
use App\Models\Fornecedores;
use App\Services\FornecedorService;
use Carbon\Carbon;
use Illuminate\Http\Request;

class FornecedorController extends Controller
{

    /**
     * @var FornecedorService $fornecedorService
     */
    protected $fornecedorService;

    /**
     * FornecedorController constructor.
     *
     * @param FornecedorService $fornecedoresService
     */
    public function __construct(FornecedorService $fornecedoresService)
    {
        $this->fornecedorService = $fornecedoresService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->fornecedorService->all();
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $this->fornecedorService->create($request);
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
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        return $this->fornecedorService->update($request, $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Fornecedores  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $this->fornecedorService->destroy($id);
    }
}
