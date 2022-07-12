<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PedidosDetalle;
use CodeIgniter\API\ResponseTrait;
use App\Models\Pedidos;
use App\Models\Productos;


class PedidoDetalle extends BaseController
{
    use ResponseTrait;

    public function getAllPedidosDetalle()
    {
        $pedidosDetalle = new PedidosDetalle();
        $data = $pedidosDetalle->orderBy('id_detalle','ASC')->findAll();
        if($data){
            $response = [];
            $pedidos = new Pedidos();
            $produtos = new Productos();
            for($i = 0; $i < count($data); $i++){

                $id = $data[$i]['id_detalle'];
                $id_pedido = $data[$i]['id_pedido'];
                $id_producto = $data[$i]['id_producto'];

                $pedido = $pedidos->orderBy('id_pedido','ASC')->find($id_pedido);
                $produto = $produtos->orderBy('id_producto','ASC')->find($id_producto);

                $response[$id] = [
                    'pedido' => $pedido,
                    'producto' => $produto
                ];
            }
        }
        else{
            $response = [
                'respuesta' => 'No hay registros',
                'status' => 204
            ];
        }
        
        return $this->respond($response,200);
    }

    public function getOnePedidosDetalle()
    {
        //http://localhost:8080/detalle?id=1
        $id = $this->request->getVar('id');
        $pedidosDetalle = new PedidosDetalle();
        $data = $pedidosDetalle->orderBy('id_detalle','ASC')->find($id);
        if($data){
            $id = $data['id_detalle'];
            $id_pedido = $data['id_pedido'];
            $id_producto = $data['id_producto'];

            $pedidos = new Pedidos();
            $produtos = new Productos();

            $pedidos = $pedidos->orderBy('id_pedido','ASC')->find($id_pedido);
            $produtos = $produtos->orderBy('id_producto','ASC')->find($id_producto);

            $response[] = [
                'id' => $id,
                'pedido' => $pedidos,
                'producto' => $produtos
            ];
        }
        else{
            $response = [
                'respuesta' => 'El elemento buscado no se encuentra',
                'status' => 404
            ];
        }
        return $this->respond($response,200);
    }
}
