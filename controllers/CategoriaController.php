<?php
require_once 'models/producto.php';
require_once 'models/categoria.php';
class categoriaController{
    public function index(){
        Utils::isAdmin();

        $categoria = new Categoria();
        $categorias = $categoria->getAll();
        require_once 'views/categoria/index.php';
    }

    public function crear(){
        Utils::isAdmin();
        require_once 'views/categoria/crear.php';
    }
    
    public function save(){
        Utils::isAdmin();
        if(isset($_POST)){
            $nombre = isset($_POST['nombre']) ? $_POST['nombre']: false;

            if(!empty($nombre) && !is_numeric($nombre) && !preg_match("/[0-9]/", $nombre)){
                if($nombre){
                    $categoria = new Categoria();
                    $categoria->setNombre($nombre);
                    $save = $categoria->save();
                    if($save){
                        $_SESSION['register'] = "complete";
                    }else{
                        $_SESSION['register'] = "failed";
                    }
                }else{
                    $_SESSION['register'] = "failed";
                }
            }else{
                $_SESSION['error_nombre'] = "Introduce correctamente el nombre";
            }
        }
        
        header("Location:".base_url.'categoria/index');

    }

    public function ver(){
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            
            //CONSEGUIR CATEGORIA
            $categoria = new Categoria();
            $categoria->setId($id);

            $categoria = $categoria->getOne();

            //CONSEGUIR PRODUCTO
            $producto = new Producto();
            $producto->setCategoria_id($id);
            $productos = $producto->getAllCategory();
            
            
        }
        require_once 'views/categoria/ver.php';
    }
}