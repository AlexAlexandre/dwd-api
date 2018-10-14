<?php
/**
 * User: Alex Alexandre <alexalexandrejr@gmail.com>
 * Date: 03/10/18
 * Time: 22:18
 */

namespace App\Services;


use App\Models\Fornecedores;
use App\Models\Produtos;
use App\Models\TabelaPreco;
use App\Models\TipoServico;
use App\Traits\ResponseTrait;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class TabelaPrecoService
{
    use ResponseTrait;

    public function all()
    {
        $tabelaPreco = Fornecedores::with('tabelaPreco.tipoServico','tabelaPreco.produtos')->get();

        return $this->sendResponse(
            $tabelaPreco,
            __('responses.success.list'),
            Response::HTTP_OK,
            false
        );
    }

    public function listarTipoServico()
    {
        $tipoServico = TipoServico::all();

        return $this->sendResponse(
            $tipoServico,
            __('responses.success.list'),
            Response::HTTP_OK,
            false
        );
    }

    public function show($id)
    {
        $tabelaPreco = TabelaPreco::with('produtos')->find($id);

        return $this->sendResponse(
            $tabelaPreco,
            __('responses.success.list'),
            Response::HTTP_OK,
            false
        );
    }

    public function create(Request $request)
    {
        try {

            DB::beginTransaction();

            $tabelaPreco = TabelaPreco::create($request->input('tabelaPreco'));

            foreach ($request->input('prod') as $value) {
                Produtos::create([
                    'id_tabela_preco' => $tabelaPreco->id_tabela_preco,
                    'tx_descricao_servico' => $value['tx_descricao_servico'],
                    'nr_valor' => $value['nr_valor'],
                    'nr_percentagem_desconto' => $value['nr_percentagem_desconto'],
                ]);
            }

            DB::commit();

            return $this->sendResponse(
                $tabelaPreco, __('responses.success.create'),
                \Illuminate\Http\Response::HTTP_CREATED
            );

        } catch (Exception $exception) {
            DB::rollBack();
            return $this->sendResponse($exception);
        }
    }

    public function destroy($id)
    {
        Produtos::where('id_tabela_preco', $id)->delete();
        $tb = TabelaPreco::destroy($id);
        return $this->sendResponse($tb, __('responses.success.destroy'));
    }

    public function destroyProduto($id)
    {
        $produto = Produtos::destroy($id);
        return $this->sendResponse($produto, __('responses.success.destroy'));
    }
}
