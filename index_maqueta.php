<!DOCTYPE HTML>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <title>Tienda de camisetas</title>
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body>
    <div id="container">


        <!--CABECERA-->
        <header id="header">
            <div id="logo">
                <img src="assets/img/camiseta.png" alt="Camiseta Logo">
                <a href="index.php">
                    Tienda de Camisetas
                </a>
            </div>
        </header>
        <div class="clearfix"></div>
        <!--MENU-->
        <nav id="menu">
            <ul>
                <li>
                    <a href="#">
                        Inicio
                    </a>
                </li>
                <li>
                    <a href="#">
                        Categoria 1
                    </a>
                </li>
                <li>
                    <a href="#">
                        Categoria 2
                    </a>
                </li>
                <li>
                    <a href="#">
                        Categoria 3
                    </a>
                </li>
                <li>
                    <a href="#">
                        Categoria 4
                    </a>
                </li>
                <li>
                    <a href="#">
                        Categoria 5
                    </a>
                </li>
            </ul>
        </nav>

        <div id="content">
            <!--BARRA LATERAL-->
            <aside id="lateral">
                <div id="login" class="block_aside">
                    <h3>Entrar a la Web</h3>
                    <form action="#" method="POST">
                        <label for="email">Email:</label>
                        <input type="email" name="email">

                        <label for="password">Password:</label>
                        <input type="password" name="password">
                        <input type="submit" value="Send">

                    </form>
                    <ul>
                        <li>
                            <a href="#">Mis Pedidos</a>
                        </li>
                        <li>
                            <a href="#">Gestionar Pedidos</a>
                        </li>
                        <li>
                            <a href="#">Gestionar Categorias</a>
                        </li>
                    </ul>
                </div>
            </aside>

            <!--CONTENIDO CENTRAL-->
            <div id="central">
                <h1>Productos Destacados</h1>
                <div class="product">
                    <img src="assets/img/camiseta.png" alt="">
                    <h2>Camiseta Azul Ancha</h2>
                    <p>30 euros</p>
                    <a href="" class="button">Comprar</a>
                </div>
                <div class="product">
                    <img src="assets/img/camiseta.png" alt="">
                    <h2>Camiseta Azul Ancha</h2>
                    <p>30 euros</p>
                    <a href="" class="button">Comprar</a>
                </div>
                <div class="product">
                    <img src="assets/img/camiseta.png" alt="">
                    <h2>Camiseta Azul Ancha</h2>
                    <p>30 euros</p>
                    <a href="" class="button">Comprar</a>
                </div>
            </div>
        </div>
        <!--FOOTER-->
        <footer id="footer">
            <p>Desarrollado por Pablo Solares WEB &copy; <?= date('Y') ?></p>
        </footer>
    </div>

</body>
<html