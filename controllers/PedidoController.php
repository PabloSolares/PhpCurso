<?php
require_once 'models/pedido.php';

class pedidoController
{
    public function hacer()
    {


        require_once "views/pedido/hacer.php";
    }

    public function add()
    {
        if (isset($_SESSION['identify'])) {
            $usuario_id = $_SESSION['identify']->id;
            $provincia = isset($_POST['provincia']) ? $_POST['provincia'] : false;
            $localidad = isset($_POST['localidad']) ? $_POST['localidad'] : false;
            $direccion = isset($_POST['direccion']) ? $_POST['direccion'] : false;
            $stats = Utils::statsCarrito();
            $coste = $stats['total'];
            if ($provincia && $localidad &&  $direccion) {
                //GUARDAR EL PEDIDO
                $pedido = new Pedido();
                $pedido->setUsuario_id($usuario_id);
                $pedido->setProvincia($provincia);
                $pedido->setLocalidad($localidad);
                $pedido->setDireccion($direccion);
                $pedido->setCoste($coste);

                $save = $pedido->save();

                //GUARDAR LINEA PEDIDO
                $save_linea = $pedido->save_linea();

                if ($save && $save_linea) {
                    $_SESSION['pedido'] = "complete";
                } else {
                    $_SESSION['pedido'] = "failed";
                }
            } else {
                $_SESSION['pedido'] = "failed";
            }
            header("Location:" . base_url."pedido/confirmado");

        } else {

            //REDIRIGIR AL INDEX
            header("Location:" . base_url);
        }
    }

    public function confirmado(){
        if(isset($_SESSION['identify'])){
            $identify = $_SESSION['identify'];
            $pedido = new Pedido();
            $pedido->setUsuario_id($identify->id);
            $pedido = $pedido->getOneByUser();

            $pedido_productos = new Pedido();
            $productos_p = $pedido_productos->getProductosByPedido($pedido->id);
        }

        require_once 'views/pedido/confirmado.php';
    }

    public function mis_pedidos(){
        Utils::isLogger();
        $usuario_id = $_SESSION['identify']->id;
        $pedido = new Pedido();

        // SACAR LOS PEDIDOS DE USUARIO
        $pedido->setUsuario_id($usuario_id);
        $pedidos = $pedido->getAllByUser();

        require_once 'views/pedido/mis_pedidos.php';
    }

    public function detalle(){
        Utils::isLogger();

        if(isset($_GET['id'])){
            $id =  $_GET['id'];
            //SACAR EL PEDIDO
            $pedido = new Pedido();
            $pedido->setId($id);
            $pedido = $pedido->getOne();

            // SACAR LOS PRODUCTOS
            $pedido_productos = new Pedido();
            $productos = $pedido_productos->getProductosByPedido($id);

            require_once "views/pedido/detalle.php";
        }else{
            header("Location:".base_url."pedido/mis_pedidos");
        }
    }

    public function gestion(){
        Utils::isAdmin();
        $gestion = true;

        $pedido = new Pedido();
        $pedidos = $pedido->getAll();

        require_once "views/pedido/mis_pedidos.php";
    }

    public function estado(){
        Utils::isAdmin();
        if(isset($_POST['pedido_id']) && isset($_POST['estado'])){
            // UPDATE DEL PEDIDO
            $estado = $_POST['estado'];
            $id = $_POST['pedido_id'];
            $pedido = new Pedido();
            $pedido->setId($id);
            $pedido->setEstado($estado);
            $pedido->edit();
            header("Location:".base_url."pedido/detalle&id=".$id);
        }else{
            header("Location:".base_url);
        }
    }
}
