<?php
require_once 'models/producto.php';
require_once 'helpers/utils.php';
class productoController
{
    public function index()
    {
        $producto = new Producto();
        $productos = $producto->getRandom(6);

     // REDERIZAR VISTA
        require_once 'views/producto/destacados.php';
    }

    public function ver(){
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            

            $producto = new Producto();
            $producto->setId($id);
            
            $product = $producto->getOne();
         
        }
        require_once 'views/producto/ver.php';
    }
    

    public function crear()
    {
        Utils::isAdmin();

        require_once 'views/producto/crear.php';
    }

    public function gestion()
    {
        Utils::isAdmin();



        $producto = new Producto();
        $productos = $producto->getAll();

        require_once 'views/producto/gestion.php';
    }

    public function save()
    {
        Utils::isAdmin();

        if (isset($_POST)) {
            $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;
            $descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : false;
            $precio = isset($_POST['precio']) ? $_POST['precio'] : false;
            $stock = isset($_POST['stock']) ? $_POST['stock'] : false;
            $categoria = isset($_POST['categoria']) ? $_POST['categoria'] : false;
            // $imagen = isset($_POST['imagen']) ? $_POST['imagen'] : false;

            if (!empty($nombre) && !is_numeric($nombre) && !preg_match("/[0-9]/", $nombre) && $nombre) {
                if (!empty($descripcion) && !is_numeric($descripcion) && !preg_match("/[0-9]/", $descripcion) && $descripcion) {
                    if (!empty($precio) && is_numeric($precio) && $precio) {
                        if (!empty($stock) && is_numeric($stock) && $stock) {

                            $producto = new Producto();
                            $producto->setNombre($nombre);
                            $producto->setDescripcion($descripcion);
                            $producto->setPrecio($precio);
                            $producto->setStock($stock);
                            $producto->setCategoria_id($categoria);

                            // GUARDAR LA IMAGEN
                            if (isset($_FILES['imagen'])) {

                                $file = $_FILES['imagen'];
                                $filename = $file['name'];
                                $mimetype = $file['type'];

                                if ($mimetype == "image/jpg" || $mimetype == 'image/jpeg' || $mimetype == 'image/png' || $mimetype == 'image/gif') {
                                    if (!is_dir('uploads/images')) {
                                        mkdir('uploads/images', 0777, true);
                                    }

                                    move_uploaded_file($file['tmp_name'], 'uploads/images' . $filename);
                                    $producto->setImagen($filename);
                                }
                            }
                            if ($_GET['id']) {
                                $id = $_GET['id'];
                                $producto->setId($id);
                                $save = $producto->edit();
                            } else {
                                $save = $producto->save();
                            }

                            if ($save) {
                                $_SESSION['register'] = "complete";
                            } else {
                                $_SESSION['register'] = "failed";
                                
                            }
                        } else {
                            $_SESSION['error_stock'] = "Introduce correctamente el numero de stock del producto";
                        }
                    } else {
                        $_SESSION['error_precio'] = "Introduce correctamente el precio del producto";
                    }
                } else {
                    $_SESSION['error_descripcion'] = "Introduce correctamente la descripcion del producto";
                }
            } else {
                $_SESSION['error_nombre'] = "Introduce correctamente el nombre del producto";
            }
        }
        header("Location:" . base_url . 'producto/gestion');
    }

    public function editar()
    {
        Utils::isAdmin();
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $edit = true;

            $producto = new Producto();
            $producto->setId($id);
            $pro = $producto->getOne();
            require_once 'views/producto/crear.php';
        } else {
            header("Location:" . base_url . "producto/gestion");
        }
    }

    public function eliminar()
    {
        Utils::isAdmin();

        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $producto = new Producto();
            $producto->setId($id);
            $delete = $producto->delete();

            if ($delete) {
                $_SESSION['delete'] = 'complete';
            } else {
                $_SESSION['delete'] = 'failed';
            }
        } else {
            $_SESSION['delete'] = 'failed';
        }

        header("Location:" . base_url . "producto/gestion");
    }
}
