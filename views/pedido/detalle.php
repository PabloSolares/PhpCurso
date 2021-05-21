<?php if (isset($gestion)) : ?>
    <h1>Gestionar Pedidos</h1>
<?php else : ?>
    <h1>Detalle de Pedido</h1>
<?php endif; ?>
<?php if (isset($pedido)) : ?>
    <?php if (isset($_SESSION['admin'])) : ?>
        <h3>Cambiar Estado del Pedido</h3>
        <form action="<?=base_url?>pedido/estado" method="POST">
            <input type="hidden" value="<?=$pedido->id?>" name="pedido_id">
            <select name="estado" id="">
                <option value="confirm" <?=$pedido->estado ==  "confirm" ? 'selected' : '';?>>Pendiente</option>
                <option value="preparation" <?=$pedido->estado ==  "preparation" ? 'selected' : '';?>>En Preparacion</option>
                <option value="ready" <?=$pedido->estado ==  "ready" ? 'selected' : '';?>>Preparado Para enviar</option>
                <option value="sended" <?=$pedido->estado ==  "sended" ? 'selected' : '';?>>Enviado</option>
            </select>
            <input type="submit" value="Cambiar Estado">
        </form>
        <br>
        <hr>
        <br>

    <?php endif; ?>
    <h3>Detalles del Envio</h3>
    Provincia: <?= $pedido->provincia ?> <br>
    Ciudad: <?= $pedido->localidad ?> <br>
    Direccion: <?= $pedido->direccion ?> <br> <br>

    <hr>

    <br>
    <h3>Datos del pedido</h3>
    
    Estado: <?=Utils::showStatus($pedido->estado)  ?> <br>
    Numero de pedido: <?= $pedido->id ?> <br>
    Total a Pagar: $<?= $pedido->coste ?> <br>
    Productos:
    <table>
        <tr>
            <th>Imagen</th>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Unidades</th>
        </tr>
        <?php while ($producto = $productos->fetch_object()) : ?>
            <tr>
                <td>
                    <?php if ($producto->imagen != null) : ?>
                        <img src="<?= base_url ?>uploads/images<?= $producto->imagen ?>" class="pictures" alt="">
                    <?php else : ?>
                        <img src="<?= base_url ?>assets/img/camiseta.png" alt="" class="pictures">
                    <?php endif; ?>
                </td>
                <td>
                    <a href="<?= base_url ?>producto/ver&id=<?= $producto->id ?>"><?= $producto->nombre ?></a>
                </td>
                <td>
                    <?= $producto->precio ?>
                </td>
                <td>
                    <?= $producto->unidades ?>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>
<?php endif; ?>