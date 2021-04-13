<?php




include 'global/config.php';
include 'global/conexion.php';
include 'carrito.php';
include 'templates/cabecera.php';

 ?>

 <?php


if ($_POST) {
$total=0;
$SID=session_id();
$Correo= $_POST['email'];
foreach ($_SESSION['CARRITO'] as $indice=>$producto) {

$total = $total+($producto['precio']*$producto['cantidad']);

}

$pdo = new PDO('mysql:host=localhost;dbname=tienda', 'root', '', array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES utf8"));
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sentencia= $pdo->prepare("INSERT INTO `tblventas` (`id`, `ClaveTransaccion`, `PaypalDatos`, `fecha`, `correo`, `total`, `status`) VALUES
(NULL,:ClaveTransaccion, NULL,NOW(),:correo,:total, 'pendiente'); ");
$sentencia->bindparam(":ClaveTransaccion",$SID);
$sentencia->bindparam(":correo",$Correo);
$sentencia->bindparam(":total",$total);
$sentencia->execute();
$idVenta= $pdo->lastInsertId();



foreach ($_SESSION['CARRITO'] as $indice=>$producto) {



$sentencia= $pdo->prepare("INSERT INTO `tbldetalleventa` (`id`, `idVenta`, `idProducto`, `precioUnitario`, `cantidad`, `descargado`) VALUES
(NULL,:idVenta,:idProducto,:precioUnitario,:cantidad, '0');");

$sentencia->bindparam(":idVenta",$idVenta);
$sentencia->bindparam(":idProducto",$producto['id']);
$sentencia->bindparam(":precioUnitario",$producto['precio']);
$sentencia->bindparam(":cantidad",$producto['cantidad']);
$sentencia->execute();


}
//echo "<h3>".$total."</h3>";

}


  ?>

  <script src="https://www.paypal.com/sdk/js?client-id=sb&currency=USD"></script>



<style>
     /* Media query for mobile viewport */
     @media screen and (max-width: 400px) {
         #paypal-button-container {
             width: 100%;
         }
     }

     /* Media query for desktop viewport */
     @media screen and (min-width: 400px) {
         #paypal-button-container {
             width: 250px;
             display:inline-block;
         }
     }
 </style>

  <div class="jumbotron text-center">
  <h1 class="display-4">!Paso Final ¡</h1>
  <hr class="my-4">
  <p class="lead">Estas a punto de pagar con paypal la cantidad de:
<h4>$<?php echo number_format($total,2); ?></h4>
   <div id="paypal-button-container"></div>

  </p>
<p>Los productos podran ser descargados despues de que se procese el pago</br>
<strong>(Para aclaraciones :metal123z3042@gmail.com)</strong>
</p>

  </div>



<script>
     // Render the PayPal button into #paypal-button-container
     paypal.Buttons().render('#paypal-button-container');
 </script>




<?php include 'templates/pie.php'; ?>
