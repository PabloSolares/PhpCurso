<h1>Carrito de la Compra</h1>
<?php if (isset($_SESSION['carrito']) && count($_SESSION['carrito']) >= 1) : ?>
    <table>
        <tr>
            <th>Imagen</th>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Unidades</th>
            <th>Eliminar</th>
        </tr>
        <?php
        foreach ($carrito as $indice => $elemento) :
            $producto = $elemento['producto'];
        ?>
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
                    <?= $elemento['unidades'] ?>
                    <div class="updown-unidades">
                        <a href="<?=base_url?>carrito/up&index=<?=$indice?>" class="button">+</a>
                        <a href="<?=base_url?>carrito/down&index=<?=$indice?> " class="button">-</a>
                    </div>

                </td>
                <td>
                    <a href="<?= base_url ?>carrito/delete&index=<?=$indice?>" class="button  button-red">Quitar Pedido</a>
                </td>
            </tr>
        <?php endforeach ?>
    </table>
    <br>
    <div class="delete_carrito">
        <a href="<?= base_url ?>carrito/delete_all" class="button button-delete button-red">Vaciar Pedido</a>
    </div>

    <div class="total_carrito">
        <?php $stats = Utils::statsCarrito(); ?>
        <h3>Precio total: $<?= $stats['total'] ?></h3>
        <a href="<?= base_url ?>pedido/hacer" class="button button-pedido">Hacer Pedido</a>
    </div>

<?php else : ?>
    <p>El carrito esta vacio añade algun producto</p>

<?php endif; ?>