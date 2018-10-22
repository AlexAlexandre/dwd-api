<?php
/**
 * User: Alex Alexandre <alexalexandrejr@gmail.com>
 * Date: 03/10/18
 * Time: 19:55
 */

namespace App\Services;

use App\Models\Endereco;
use App\Models\Espacos;
use App\Models\EspacosSalas;
use App\Models\EspacosTabelaPreco;
use App\Models\Salas;
use App\Traits\ResponseTrait;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Mockery\Exception;

class EspacosService
{
    use ResponseTrait;

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function all()
    {
        $espacos = Espacos::with('espacosSalas.salas')->get();

        return $this->sendResponse(
            $espacos,
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
        try {
            DB::beginTransaction();

            if (is_array($request->input('enderecoCompleto'))) {
                $endereco = Endereco::create($request->input('enderecoCompleto'));
            }

            $espaco = Espacos::create($request->input('espaco'));

            if ($request->input('espaco.sala')) {

                $sala = Salas::create($request->input('espaco.sala'));
                EspacosSalas::create([
                    'id_espacos' => $espaco->id_espacos,
                    'id_salas' => $sala->id_salas
                ]);
            }

            if (is_array($request->input('enderecoCompleto'))) {
                $espaco->update(['id_endereco' => $endereco->id_endereco]);
            }

            DB::commit();

            return $this->sendResponse(
                $espaco, __('responses.success.create'),
                \Illuminate\Http\Response::HTTP_CREATED
            );

        } catch (Exception $exception) {
            DB::rollBack();
            return $this->sendResponse($exception);
        }
    }

    //TODO - colocar o rollback
    public function update(Request $request, $id)
    {
        if (is_array($request->input('enderecoCompleto'))) {
            if ($request->input('enderecoCompleto.id_endereco') != 'null') {
                Endereco::find($request->input('enderecoCompleto.id_endereco'))
                    ->update($request->input('enderecoCompleto'));
            } else {
                Endereco::create($request->input('enderecoCompleto'));
            }
        }

        $espaco = Espacos::find($id)->update($request->input('espaco'));

        if ($request->input('espaco.sala.tx_nome_salas') != 'null') {

            if ($request->input('espaco.sala.id_salas') != 'null') {

                Salas::find($request->input('espaco.sala.id_salas'))->update($request->input('espaco.sala'));

            } else {

                //Salvando a imagem
                $request->file('espaco.sala.foto')->storeAs('/public/img/espaco/sala',
                    $request->file('espaco.sala.foto')->getClientOriginalName());

                $sala = Salas::create($request->input('espaco.sala'));

                $sala->update([
                    'tx_img_sala' => 'public/img/espaco/sala/' . $request->file('espaco.sala.foto')
                            ->getClientOriginalName()
                ]);

                EspacosSalas::create([
                    'id_espacos' => $id,
                    'id_salas' => $sala->id_salas
                ]);
            }
        }

        if (is_array($request->input('tabelaPreco'))) {
            foreach ($request->input('tabelaPreco') as $tb) {
                EspacosTabelaPreco::create([
                    'id_tabela_preco' => $tb['id_tabela_preco'],
                    'id_espacos' => $id
                ]);
            }
        }

        return $this->sendResponse(
            $espaco,
            __('responses.success.update'),
            \Illuminate\Http\Response::HTTP_ACCEPTED
        );
    }

    public function destroy($id)
    {
        $espaco = Espacos::destroy($id);

        return $this->sendResponse($espaco, __('responses.success.destroy'));
    }

    public function destroyEspacoSala($idSala, $idEspaco)
    {
        EspacosSalas::destroy(['id_salas' => $idSala, 'id_espacos' => $idEspaco]);
        $sala = Salas::destroy($idSala);

        return $this->sendResponse($sala, __('responses.success.destroy'));
    }

    public function destroyEspacoTabela($idTb, $idEspaco)
    {
        $espacoTb = EspacosTabelaPreco::where(['id_tabela_preco' => $idTb, 'id_espacos' => $idEspaco])->delete();
        return $this->sendResponse($espacoTb, __('responses.success.destroy'));
    }

    public function salvarDocumentos($request, $id)
    {

        foreach ($request->file('documentos') as $key => $value) {
            $value->storeAs('/public/documentos/espacos/',
                $value->getClientOriginalName());

            $espaco = Espacos::find($id)->update([
                $key => 'documentos/espacos/'.$value->getClientOriginalName()
            ]);
        }

        return $this->sendResponse(
            $espaco, __('responses.success.create'),
            \Illuminate\Http\Response::HTTP_CREATED
        );
    }
}
