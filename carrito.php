<?php
session_start();

$mensaje="";

if (isset($_POST['btnAccion'])) {



  switch($_POST['btnAccion']) {

    case 'Agregar':


if (is_numeric (openssl_decrypt($_POST['id'],COD,KEY))) {


  $ID= openssl_decrypt($_POST['id'],COD,KEY);
  $mensaje.="OK ID correcto".$ID;

}else{
  $mensaje.="Upps ID incorrecto..".$ID;
}


if (is_string(openssl_decrypt($_POST['nombre'],COD,KEY))) {
  $NOMBRE=openssl_decrypt($_POST['nombre'],COD,KEY);
$mensaje.="OK nombre...".$NOMBRE."</br>";
}else{  $mensaje.="Upps algo pasa con el nombre..."."</br>"; break;}


if (is_string(openssl_decrypt($_POST['cantidad'],COD,KEY))) {
  $CANTIDAD=openssl_decrypt($_POST['cantidad'],COD,KEY);
$mensaje.="OK cantidad...".$CANTIDAD."</br>";
}else{  $mensaje.="Upps algo pasa con la cantodad..."."</br>"; break;}



if (is_string(openssl_decrypt($_POST['precio'],COD,KEY))) {
  $PRECIO=openssl_decrypt($_POST['precio'],COD,KEY);
  $mensaje.="OK precio...".$PRECIO."</br>";

}else{  $mensaje.="Upps algo pasa con el precio..."."</br>"; break;}


if (!isset($_SESSION['CARRITO'])) {

  $producto = array(

    'id'=>$ID,
    'nombre'=>$NOMBRE,
    'cantidad'=>$CANTIDAD,
    'precio'=>$PRECIO
  );

    $_SESSION['CARRITO'][0]=$producto;
    $mensaje="Producto agregado al carrito";

}else{

  $idProductos=array_column($_SESSION['CARRITO'],'id');



  if (in_array($ID,$idProductos)) {

echo "<script>alert('El producto ya ha sido seleccionado');</script>";
$mensaje="";
  }else {



  $NumeroProductos= count($_SESSION['CARRITO']);
  $producto = array(

    'id'=>$ID,
    'nombre'=>$NOMBRE,
    'cantidad'=>$CANTIDAD,
    'precio'=>$PRECIO
  );


$_SESSION['CARRITO'][$NumeroProductos]=$producto;
$mensaje="Producto agregado al carrito";
}
}
//$mensaje=print_r($_SESSION,true);

    break;

case 'Eliminar':

if (is_numeric (openssl_decrypt($_POST['id'],COD,KEY))) {


  $ID= openssl_decrypt($_POST['id'],COD,KEY);

foreach ($_SESSION['CARRITO'] as $indice=>$producto) {

if ($producto['id']==$ID) {


unset($_SESSION['CARRITO'][$indice]);
echo "<script>alert('Elemento borrado');</script>";

}

}

}else{
  $mensaje.="Upps ID incorrecto..".$ID;
}
      break;
  }
}
 ?>
