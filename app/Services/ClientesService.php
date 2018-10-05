<?php
/**
 * User: Alex Alexandre <alexalexandrejr@gmail.com>
 * Date: 03/10/18
 * Time: 19:55
 */
namespace App\Services;

use App\Models\Clientes;
use App\Traits\ResponseTrait;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Mockery\Exception;

class ClientesService
{
    use ResponseTrait;

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function all()
    {
        $clientes = Clientes::all();

        return $this->sendResponse(
          $clientes,
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

            $cliente = Clientes::create($request->input('cliente'));

            DB::commit();

            return $this->sendResponse(
                $cliente, __('responses.success.create'),
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
        $cliente = Clientes::find($id)
            ->update($request->all());

        return $this->sendResponse(
            $cliente,
            __('responses.success.update'),
            \Illuminate\Http\Response::HTTP_ACCEPTED
        );
    }

    public function destroy($id)
    {
        $cliente = Clientes::destroy($id);

        return $this->sendResponse($cliente, __('responses.success.destroy'));
    }
}
