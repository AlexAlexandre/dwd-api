<?php
/**
 * User: Alex Alexandre <alexalexandrejr@gmail.com>
 * Date: 03/10/18
 * Time: 19:55
 */

namespace App\Services;

use App\Models\Espacos;
use App\Models\EspacosSalas;
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

        if ($request->input('espaco.sala')) {
            $sala = Salas::create($request->input('espaco.sala'));
            EspacosSalas::create([
                'id_espacos' => $id,
                'id_salas' => $sala->id_salas
            ]);
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
}