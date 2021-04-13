<?php
include 'global/config.php';

include 'carrito.php';
include 'templates/cabecera.php';

 ?>

<br>
<h3>Lista del carrito</h3>
<?php if (!empty($_SESSION['CARRITO'])) { ?>

<table class="table table-light table-bordered">
  <tbody>
    <tr>
    <th width="40%"  >Descripcion</th>
      <th width="15%" class="text-center">Cantidad</th>
        <th width="20%" class="text-center">Precio</th>
          <th width="20%" class="text-center">Total</th>
            <th width="5%">--</th>
    </tr>
    <?php $total=0; ?>
<?php foreach ($_SESSION['CARRITO'] as $indice=>$producto) {?>

      <tr>
      <td width="40%"><?php echo $producto['nombre'] ?></td>
        <td width="15%" class="text-center"><?php echo $producto['cantidad'] ?></td>
          <td width="20%" class="text-center"><?php echo $producto['precio'] ?></td>
            <td width="20%" class="text-center"><?php echo number_format($producto['precio']*$producto['cantidad'],2);   ?></td>
           <td width="5%">



              <form class="" action="" method="post">

                <input type="hidden" name="id" id="id" value="<?php echo openssl_encrypt($producto['id'],COD,KEY); ?>">
                <button class="btn btn-danger" name="btnAccion" value="Eliminar" type="submit">Eliminar</button></td>


              </form>
      </tr>
<?php $total = $total+ ($producto['precio']*$producto['cantidad']); ?>
<?php } ?>

      <tr>
      <td colspan="3" align="right"><h3>Total</h3></td>
      <td align="right"><h3><?php echo number_format($total,2); ?></h3></td>
      </tr>

      <tr>
        <td colspan="5">

          <form class="" action="pagar.php" method="post">
<div class="alert alert-success">
  <div class="form-group">
    <label for="my-input">Correo de Contacto:</label>
    <input id="email" class="form-control" type="email" name="email" value=""
    placeholder="Por favor escribe tu correo"
  required
    >

  </div>
  <small id="emailHelp" class="form-text text-muted">

Los productos se enviaran a este correo.
  </small>
</div>

<button type="submit" class="btn btn-primary btn-lg btn-block" name="btnAccion" value="proceder"> Proceder a pagar >> </button>


  </form>

        </td>
      </tr>

  </tbody>
</table>

<?php }else{?>
<div class="alert alert-success">

no hay productos en el carrito

</div>

<?php } ?>
<?php include 'templates/pie.php'; ?>
