<?php if (isset($product)) : ?>
    <h1><?= $product->nombre ?></h1>
    <div id="detail-product">
        <div class="image">
            <?php if ($product->imagen != null) : ?>
                <img src="<?= base_url ?>uploads/images<?= $product->imagen ?>" alt="">
            <?php else : ?>
                <img src="<?= base_url ?>assets/img/camiseta.png" alt="">
            <?php endif; ?>
        </div>
        <div class="data">
            <h3 class="description"><?= $product->descripcion ?></h3>
            <h3 class="precio">$<?= $product->precio ?></h3>
            <a href="<?=base_url?>carrito/add&id=<?=$product->id?>" class="button">Comprar</a>
        </div>
    </div>
<?php else : ?>
    <h1>El producto no existe</h1>
<?php endif; ?>