<?php

namespace App\Http\Controllers;

use App\Models\Cidade;
use App\Models\Uf;
use Illuminate\Http\Request;

class UfController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Uf::all();
    }

   /**
     * Display the specified resource.
     *
     * @param  \App\Models\Uf  $uf
     * @return \Illuminate\Http\Response
     */
    public function show(Uf $uf)
    {
        return Uf::find($uf);
    }

    public function getCidadeUf($uf)
    {
        return Cidade::where('sg_uf', $uf)->get();
//        return Uf::with('cidade')->where('sg_uf', $uf)->get();
    }
}
