<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\API\ResponseTrait;
use App\Models\Pedidos;
use App\Models\Productos;
use App\Models\PedidosDetalle;

class Editar extends Controller{

    use ResponseTrait;

    public function producto($id = NULL) {
        $item = new Productos();
        $id = $this->request->getVar('id');
        $data = [
            'nombre_producto' => $this->request->getVar('nombre_producto'),
            'descripcion_producto'  => $this->request->getVar('descripcion_producto'),
            'imagen' => $this->request->getVar('imagen'),
            'precio'  => $this->request->getVar('precio'),
        ];
        $item->update($id,$data);
        $response = [
            'status'   => 200,
            'error'    => null,
            'messages' => [
                'success' => 'Producto actualizado satisfactoriamente'
            ]
        ];
        return $this->respond($response);
    }

    public function pedido($id = NULL) {
        $item = new Pedidos();
        $id = $this->request->getVar('id');
        $data = [
            'nombre_cliente' => $this->request->getVar('nombre_cliente'),
        ];
        $item->update($id,$data);
        $response = [
            'status'   => 200,
            'error'    => null,
            'messages' => [
                'success' => 'Pedido actualizado satisfactoriamente'
            ]
        ];
        return $this->respondCreated($response);
    }
}