<?php if (isset($_SESSION['identify'])) : ?>
    <h1>Hacer Pedido</h1>
    <p>
    <a href="<?= base_url ?>carrito/index">Ver los productos y el precio del pedido</a>
    </p>
    <br>   
    <h3>Domicilio para el envio: </h3>
    <form action="<?=base_url.'pedido/add'?>" method="POST">
        <label for="provincia">Provincia</label>
        <input type="text" name="provincia" required/>

        <label for="localidad">Localidad</label>
        <input type="text" name="localidad" required/>

        <label for="direccion">Dirección</label>
        <input type="text" name="direccion" required/>

        <input type="submit" value="Confirmar pedido">
    </form>
    
<?php else : ?>
    <h1>Necesitas Estar Identificado</h1>
    <p>Necesitas estasx logueado en la web para poder realizar tu pedido</p>
<?php endif; ?>