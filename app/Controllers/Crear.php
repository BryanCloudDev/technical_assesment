<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\API\ResponseTrait;
use App\Models\Pedidos;
use App\Models\Productos;
use App\Models\PedidosDetalle;

class Crear extends Controller{

    use ResponseTrait;

    public function producto() {
        $item = new Productos();
        $data = [
            'nombre_producto' => $this->request->getVar('nombre_producto'),
            'descripcion_producto'  => $this->request->getVar('descripcion_producto'),
            'imagen' => $this->request->getVar('imagen'),
            'precio'  => $this->request->getVar('precio'),
        ];
        $item->insert($data);
        $response = [
            'status'   => 201,
            'error'    => null,
            'messages' => [
                'success' => 'Producto agregado satisfactoriamente'
            ]
        ];
        return $this->respondCreated($response);
        //http://localhost:8080/create/producto?nombre_producto=sdfsdf&descripcion_producto=sdfsdfsdf&imagen=sdfsdfsdf&precio=sdfsdfsdf
    }

    public function pedido() {
        $item = new Pedidos();
        $data = [
            'nombre_cliente' => $this->request->getVar('nombre_cliente'),
        ];
        
        $item->insert($data);
        $response = [
            'status'   => 201,
            'error'    => null,
            'messages' => [
                'success' => 'Pedido agregado satisfactoriamente'
            ]
        ];
        return $this->respondCreated($response);
    }

    public function detalle() {
        $item = new PedidosDetalle();
        $data = [
            'nombre_cliente' => $this->request->getPost('nombre_cliente'),
        ];

        $pedidos = new Pedidos();
        $pedidos->insert($data);
        $data = $pedidos->orderBy('id_pedido','DESC')->findAll();
        $ultimoIndexPedidos = $data[0]['id_pedido'];

        $id_producto = $this->request->getPost('id_producto');

        $data = [
            'id_pedido' => $ultimoIndexPedidos,
            'id_producto' => $id_producto
        ];
        $item->insert($data);
        
        return redirect()->to('/');
    }
}