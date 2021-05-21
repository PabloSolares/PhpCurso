<!DOCTYPE HTML>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <title>Tienda de camisetas</title>
    <link rel="stylesheet" href="<?= base_url ?>assets/css/styles.css">
</head>

<body>
    <div id="container">


        <!--CABECERA-->
        <header id="header">
            <div id="logo">
                <img src="<?= base_url ?>assets/img/camiseta.png" alt="Camiseta Logo">
                <a href="<?=base_url?>">
                    Tienda de Camisetas
                </a>
            </div>
        </header>
        <div class="clearfix"></div>
        <!--MENU-->
        <?php $categorias = Utils::showCategorias(); ?>
        <nav id="menu">

            <ul>
                <li>
                    <a href="<?=base_url?>">
                        Inicio
                    </a>
                </li>
                <?php while ($cat = $categorias->fetch_object()) : ?>
                    <li>
                        <a href="<?=base_url?>categoria/ver&id=<?=$cat->id?>">
                            <?=$cat->nombre?>
                        </a>
                    </li>
                <?php endwhile; ?>

            </ul>
        </nav>

        <div id="content">