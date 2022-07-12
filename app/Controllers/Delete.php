<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\API\ResponseTrait;
use App\Models\Pedidos;
use App\Models\Productos;
use App\Models\PedidosDetalle;

class Delete extends Controller{

    use ResponseTrait;

    public function producto() {
        $id = $this->request->getVar('id');
        $item = new Productos();
        $item->where('id_producto',$id)->delete($id);
        return redirect()->back();
    }

    public function pedido($id = NULL) {
        $id = $this->request->getVar('id');
        $item = new Pedidos();
        $item->where('id_pedido',$id)->delete($id);
    }

    public function detalle() {
        $id = $this->request->getVar('id');
        $item = new PedidosDetalle();
        $itemRemoved = $item->where('id_detalle',$id)->first();
        if($itemRemoved){
            $item->delete($id);
            // $this->pedido($itemRemoved['id_pedido']);
            // $this->producto($itemRemoved['id_producto']);
            $response = [
                'status'   => 200,
                'mensaje' => [
                    'success' => 'El registro ha sido borrado satisfactoriamente'
                ]
            ];
            return $this->respondDeleted($response);
        }else{
            return $this->failNotFound('Registro no encontrado');
        }
        var_dump($itemRemoved);
    }
}