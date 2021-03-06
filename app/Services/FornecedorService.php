<?php
/**
 * User: Alex Alexandre <alexalexandrejr@gmail.com>
 * Date: 03/10/18
 * Time: 19:55
 */
namespace App\Services;

use App\Models\Endereco;
use App\Models\Fornecedores;
use App\Models\TabelaPreco;
use App\Traits\ResponseTrait;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Mockery\Exception;

class FornecedorService
{
    use ResponseTrait;

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function all()
    {
        $fornecedores = Fornecedores::all();

        return $this->sendResponse(
          $fornecedores,
          __('responses.success.list'),
          Response::HTTP_OK,
          false
        );
    }

    /**
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function create(Request $request)
    {
        //TODO criar os repositories e tirar isso daqui.

        try {

            DB::beginTransaction();

            $endereco = Endereco::create($request->input('enderecoCompleto'));

            $fornecedor = new Fornecedores();
            $fornecedor->id_endereco = $endereco->id_endereco;
            $fornecedor->tx_nome_fornecedor = $request->input('fornecedor.tx_nome_fornecedor');
            $fornecedor->tx_razao_social_fornecedor = $request->input('fornecedor.tx_razao_social_fornecedor');
            $fornecedor->tx_nome_fantasia_fornecedor = $request->input('fornecedor.tx_nome_fantasia_fornecedor');
            $fornecedor->nr_cnpj_fornecedor = $request->input('fornecedor.nr_cnpj_fornecedor');
            $fornecedor->nr_inscricao_estadual = $request->input('fornecedor.nr_inscricao_estadual');
            $fornecedor->tx_nome_contato_fornecedor = $request->input('fornecedor.tx_nome_contato_fornecedor');
            $fornecedor->tx_email_comercial = $request->input('fornecedor.tx_email_comercial');
            $fornecedor->nr_telefone_direto = $request->input('fornecedor.nr_telefone_direto');
            $fornecedor->nr_telefone_celular = $request->input('fornecedor.nr_telefone_celular');
            $fornecedor->tx_cargo = $request->input('fornecedor.tx_cargo');

            $fornecedor->created_at = Carbon::now();

            $fornecedor->save();

            DB::commit();

            return $this->sendResponse(
                $fornecedor, __('responses.success.create'),
                \Illuminate\Http\Response::HTTP_CREATED
            );

        } catch (Exception $exception) {
            DB::rollBack();
            return $this->sendResponse($exception);
        }
    }

    //TODO - colocar o rollback
    public function update(Request $request)
    {
        Endereco::find($request->input('enderecoCompleto.id_endereco'))
            ->update($request->input('enderecoCompleto'));

        $fornecedor = Fornecedores::find($request->input('fornecedor.id_fornecedores'))
            ->update($request->input('fornecedor'));

        return $this->sendResponse(
            $fornecedor,
            __('responses.success.update'),
            \Illuminate\Http\Response::HTTP_ACCEPTED
        );
    }

    public function destroy($id)
    {
        $tb = TabelaPreco::where('id_fornecedores', $id)->get();

        if ($tb->isNotEmpty()) {
            return $this->sendResponse("tb", "Existe uma tabela de preço ligada a este fornecedor");
        } else {
            $fornecedor = Fornecedores::destroy($id);
            return $this->sendResponse($fornecedor, __('responses.success.destroy'));
        }
    }
}
