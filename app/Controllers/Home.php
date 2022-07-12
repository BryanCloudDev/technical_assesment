<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Productos;

class Home extends Controller{
    public function index(){
        return view('index');
    }

    public function purchase(){
        $id = $this->request->getVar('id');
        $pedidosDetalle = new Productos();
        $data = $pedidosDetalle->orderBy('id_producto','ASC')->find($id);
        return view('purchase',['data' => $data]);
    }

    public function dashboard(){
        return view('dashboard');
    }

    public function nuevo(){
        return view('nuevo');
    }

    public function editarItem(){
        $id = $this->request->getVar('id');
        $pedidosDetalle = new Productos();
        $data = $pedidosDetalle->orderBy('id_producto','ASC')->find($id);
        return view('nuevo',['data' => $data]);
    }
}