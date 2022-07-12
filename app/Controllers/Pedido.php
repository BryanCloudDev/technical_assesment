<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Pedidos;
use CodeIgniter\API\ResponseTrait;

class Pedido extends BaseController
{
    use ResponseTrait;

    public function getAllPedidos()
    {
        $pedidosDetalle = new Pedidos();
        $data = $pedidosDetalle->orderBy('id_pedido','ASC')->findAll();
        $response = [];
        for($i = 0; $i < count($data); $i++){
            $id = $data[$i]['id_pedido'];
            $response[$id] = ['nombre_cliente' => $data[$i]['nombre_cliente'], 'fecha_pedido' => $data[$i]['fecha_pedido']];
        }
        return $this->respond($response,200);
    }

    public function getPedido()
    {
        //http://localhost:8080/pedidos?id=1
        $id = $this->request->getVar('id');
        $pedidosDetalle = new Pedidos();
        $data = $pedidosDetalle->orderBy('id_pedido','ASC')->find($id);
        $response[] = [
            'id' => $data['id_pedido'],
            'nombre_cliente' => $data['nombre_cliente'], 
            'fecha_pedido' => $data['fecha_pedido']
        ];

        return $this->respond($response,200);
    }
}
