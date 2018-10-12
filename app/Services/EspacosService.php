<?php
/**
 * User: Alex Alexandre <alexalexandrejr@gmail.com>
 * Date: 03/10/18
 * Time: 19:55
 */

namespace App\Services;

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
        //TODO criar os repositories e tirar isso daqui.

        try {

            DB::beginTransaction();

            $espaco = Espacos::create($request->input('espaco'));

            if ($request->input('espaco.sala')) {
                $sala = Salas::create($request->input('espaco.sala'));
                EspacosSalas::create([
                    'id_espacos' => $espaco->id_espacos,
                    'id_salas' => $sala->id_salas
                ]);
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
        $espaco = Espacos::find($id)
            ->update($request->input('espaco'));

        if ($request->input('espaco.sala.tx_nome_salas') != null) {

            if($request->input('espaco.sala.id_salas')) {

                Salas::find($request->input('espaco.sala.id_salas'))
                    ->update($request->input('espaco.sala'));

            } else {

                $sala = Salas::create($request->input('espaco.sala'));
                EspacosSalas::create([
                    'id_espacos' => $id,
                    'id_salas' => $sala->id_salas
                ]);
            }
        }

        if($request->input('tabelaPreco')){
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
}
