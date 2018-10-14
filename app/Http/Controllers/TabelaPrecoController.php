<?php

namespace App\Http\Controllers;


use App\Services\TabelaPrecoService;
use Illuminate\Http\Request;

class TabelaPrecoController extends Controller
{

    /**
     * @var TabelaPrecoService $tabelaPrecoService
     */
    protected $tabelaPrecoService;

    /**
     * FornecedorController constructor.
     *
     * @param TabelaPrecoService $tabelaPrecoService
     */
    public function __construct(TabelaPrecoService $tabelaPrecoService)
    {
        return $this->tabelaPrecoService = $tabelaPrecoService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->tabelaPrecoService->all();
    }

    public function listarTipoServico()
    {
        return $this->tabelaPrecoService->listarTipoServico();
    }

    public function store(Request $request)
    {
//        return $request->all();
        return $this->tabelaPrecoService->create($request);
    }

    public function show($id)
    {
        return $this->tabelaPrecoService->show($id);
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        return $this->tabelaPrecoService->destroy($id);
    }

    public function destroyProduto($id)
    {
        return $this->tabelaPrecoService->destroyProduto($id);
    }
}
