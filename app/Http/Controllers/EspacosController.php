<?php

namespace App\Http\Controllers;

use App\Models\Espacos;
use App\Models\EspacosSalas;
use App\Models\Salas;
use App\Models\TabelaPreco;
use App\Services\EspacosService;
use Illuminate\Http\Request;

class EspacosController extends Controller
{

    /**
     * @var EspacosService $espacosService
     */
    protected $espacosService;

    /**
     * FornecedorController constructor.
     *
     * @param EspacosService $espacosService
     */
    public function __construct(EspacosService $espacosService)
    {
        $this->espacosService = $espacosService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->espacosService->all();
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $this->espacosService->create($request);
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Espacos::with('espacosTabela.tabelaPreco')->find($id);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        return $this->espacosService->update($request, $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Fornecedores  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $this->espacosService->destroy($id);
    }

    //TODO tirar isso daqui
    public function listarTabelaPreco()
    {
        return TabelaPreco::all();
    }

    public function listarSalas($id)
    {
        return EspacosSalas::with('salas')->where('id_espacos', $id)->get();
    }

    public function listarSala($id)
    {
        return Salas::find($id);
    }
}
