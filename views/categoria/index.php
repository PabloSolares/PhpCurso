<h1>Gestionar categorias</h1>
<a href="<?=base_url?>categoria/crear" class="button button-small">
    Crear Categoria
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

<table>
    <tr>
        <th>ID</th>
        <th>NOMBRE</th>
    </tr>
<?php while($cat = $categorias->fetch_object()):?>
    <tr>
        <td><?= $cat->id;?></td>
        <td><?= $cat->nombre;?></td>
    </tr>
<?php endwhile; ?>
</table>
