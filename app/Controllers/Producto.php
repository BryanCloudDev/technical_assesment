<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Productos;
use CodeIgniter\API\ResponseTrait;

class Producto extends BaseController
{
    use ResponseTrait;

    public function getAllProductos()
    {
        $pedidosDetalle = new Productos();
        $data = $pedidosDetalle->orderBy('id_producto','ASC')->findAll();
        $response = [];
        for($i = 0; $i < count($data); $i++){
            $id = $data[$i]['id_producto'];
            $response[] = [
                'id' => $id,
                'producto' => $data[$i]['nombre_producto'],
                'descripcion_producto' => $data[$i]['descripcion_producto'],
                'imagen' => $data[$i]['imagen'],
                'precio' => $data[$i]['precio']
            ];
        }
        return $this->respond($response,200);
    }

    public function getOneProducto($id = false)
    {
        //http://localhost:8080/producto?id=1
        $id = $id ? $id : $this->request->getVar('id');
        $pedidosDetalle = new Productos();
        $data = $pedidosDetalle->orderBy('id_producto','ASC')->find($id);
        $response = [
            'id' => $data['id_producto'],
            'producto' => $data['nombre_producto'],
            'descripcion_producto' => $data['descripcion_producto'],
            'imagen' => $data['imagen'],
            'precio' => $data['precio']
        ];
        return $this->respond($response,200);
    }
}
