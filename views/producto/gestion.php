<h1>Gestion de Productos</h1>
<a href="<?=base_url?>producto/crear" class="button button-small">
    Crear Producto
</a>

<?php if(isset($_SESSION['register']) && $_SESSION['register'] == 'complete'): ?>
<strong class="alert_green">Registro Completado correctamente</strong>   

<?php elseif(isset($_SESSION['register']) && $_SESSION['register'] == 'failed'):?>
<strong class="alert_red">Registro Fallido, introduce bien los datos</strong>   
<?php endif;?>
<?php Utils::deleteSession('register'); ?>

<?php if(isset($_SESSION['error_nombre'])): ?>
<strong class="alert_red">Registro Fallido, introduce el nombre correctamente</strong>   
<?php endif; ?>    
<?php Utils::deleteSession('error_nombre'); ?>

<?php if(isset($_SESSION['error_descripcion'])): ?>
<strong class="alert_red"><?=$_SESSION['error_descripcion']?></strong>   
<?php endif; ?>    
<?php Utils::deleteSession('error_descripcion'); ?>

<?php if(isset($_SESSION['error_precio'])): ?>
<strong class="alert_red"><?=$_SESSION['error_precio']?></strong>   
<?php endif; ?>    
<?php Utils::deleteSession('error_precio'); ?>

<?php if(isset($_SESSION['error_stock'])): ?>
<strong class="alert_red"><?=$_SESSION['error_stock']?></strong>   
<?php endif; ?>    
<?php Utils::deleteSession('error_stock'); ?>

<?php if(isset($_SESSION['error_categoria'])): ?>
<strong class="alert_red"><?=$_SESSION['error_categoria']?></strong>   
<?php endif; ?>    
<?php Utils::deleteSession('error_categoria'); ?>

<?php if(isset($_SESSION['error_imagen'])): ?>
<strong class="alert_red"><?=$_SESSION['error_imagen']?></strong>   
<?php endif; ?>    
<?php Utils::deleteSession('error_imagen'); ?>


<?php if(isset($_SESSION['delete']) && $_SESSION['delete'] == 'complete'): ?>
<strong class="alert_green">Pedido Borrado correctamente</strong>   

<?php elseif(isset($_SESSION['delete']) && $_SESSION['delete'] == 'failed'):?>
<strong class="alert_red">Borrado Incorrectamente<</strong>   
<?php endif;?>
<?php Utils::deleteSession('delete'); ?>

<table>
    <tr>
        <th>ID</th>
        <th>NOMBRE</th>
        <th>PRECIO</th>
        <th>STOCK</th>
        <th>Acciones</th>
    </tr>
<?php while($pro = $productos->fetch_object()):?>
    <tr>
        <td><?= $pro->id;?></td>
        <td><?= $pro->nombre;?></td>
        <td><?= $pro->precio;?></td>
        <td><?= $pro->stock;?></td>
        <td>
            <a href="<?=base_url?>producto/editar&id=<?=$pro->id?>" class="button button-gestion">Editar</a>
            <a href="<?=base_url?>producto/eliminar&id=<?=$pro->id?>" class="button button-gestion button-red">Eliminar</a>
        </td>
    </tr>
<?php endwhile; ?>
</table>