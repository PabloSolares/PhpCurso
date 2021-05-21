  <!--BARRA LATERAL-->
  <aside id="lateral">
      <?php if (isset($_SESSION['identify'])) : ?>

          <div id="carrito" class="block_aside">
              <h3>Mi carrito</h3>
              <ul>
              <?php $stats = Utils::statsCarrito(); ?>
                  <li><a href="<?= base_url ?>carrito/index">Productos (<?= $stats['count']?>)</a></li>
                  <li><a href="<?= base_url ?>carrito/index">Total: <?= $stats['total']?>$</a></li>

                  <li><a href="<?= base_url ?>carrito/index">Ver el carrito</a></li>
              </ul>
          </div>
      <?php endif ?>

      <div id="login" class="block_aside">
          <?php if (!isset($_SESSION['identify'])) : ?>
              <h3>Entrar a la Web</h3>
              <form action="<?= base_url ?>usuario/login" method="POST">
                  <label for="email">Email:</label>
                  <input type="email" name="email">

                  <label for="password">Password:</label>
                  <input type="password" name="password">
                  <input type="submit" value="Send">

              </form>
          <?php else : ?>
              <h3><?= $_SESSION['identify']->nombre ?> <?= $_SESSION['identify']->apellidos ?></h3>
          <?php endif; ?>
          <ul>
              <?php if (isset($_SESSION['admin'])) : ?>
                  <li>
                      <a href="<?= base_url ?>categoria/index">Gestionar Categorias</a>
                  </li>
                  <li>
                      <a href="<?= base_url ?>producto/gestion">Gestionar Productos</a>
                  </li>
                  <li>
                      <a href="<?= base_url ?>pedido/gestion">Gestionar Pedidos</a>
                  </li>

              <?php endif; ?>
              <?php if (isset($_SESSION['identify'])) : ?>
                  <li>
                      <a href="<?= base_url ?>pedido/mis_pedidos">Mis Pedidos</a>
                  </li>
                  <li>
                      <a href="<?= base_url ?>usuario/logout">Cerrar Sesion</a>
                  </li>
              <?php else : ?>
                  <li>
                      <a href="<?= base_url ?>usuario/registro">Registrate aqui</a>
                  </li>
              <?php endif; ?>
          </ul>
      </div>
  </aside>
  <!--CONTENIDO CENTRAL-->
  <div id="central">