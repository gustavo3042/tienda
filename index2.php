
<?php
include 'global/config.php';
include 'global/conexion.php';

?>



<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Tienda</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>

  </head>
  <body>

<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
  <a class="navbar-brand" href="index.php">Logo de la empresa</a>
  <button  class="navbar-toggler" data-target="#my-nav" data-toggle="collapse">
<span class="navbar-toggler-icon"></span>
</button>
<div id="my-nav" class="collapse navbar-collapse">
<ul class="navbar-nav mr-auto">
  <li class="nav-item active">
<a class="nav-link" href="index.php">Home</a>
  </li>

  <li class="nav-item active">
<a class="nav-link" href="#">Carrito(0)</a>
  </li>

</ul>
</div>

</nav>
<br/>
<br/>

<div class="container">
  <br>
<div class="alert alert-success">
Pantalla de mensaje
<a href="#" class="badge badge-success">Ver Carrito</a>
</div>

<div class="row" >



  <?php
$sentencia= $pdo->prepare('SELECT * FROM `tblproductos` ');
$sentencia->execute();
$listaProductos= $sentencia->fetchAll(PDO::FETCH_ASSOC);
print_r($listaProductos);






   ?>

  <div class="col-3" >

    <div class="card">
<img title="titulo del producto" src="https://d1w7fb2mkkr3kw.cloudfront.net/assets/images/book/lrg/9781/4842/9781484217290.jpg" class="card-img-top" alt="Titulo">
<div class="card-body">
  <span>Titulo del producto</span>
  <h5 class="card-title">$300.000</h5>
  <p class="card-text">Descripcion</p>
  <button class="btn btn-primary" name="btnAccion" value="Agregar" type="submit">Agregar al carrito</button>
</div>
    </div>



  </div>


  <div class="col-3" >

    <div class="card">
<img title="titulo del producto" src="https://d1w7fb2mkkr3kw.cloudfront.net/assets/images/book/lrg/9781/4842/9781484217290.jpg" class="card-img-top" alt="Titulo">
<div class="card-body">
  <span>Titulo del producto</span>
  <h5 class="card-title">$300.000</h5>
  <p class="card-text">Descripcion</p>
  <button class="btn btn-primary" name="btnAccion" value="Agregar" type="submit">Agregar al carrito</button>
</div>
    </div>



  </div>

  <div class="col-3" >

    <div class="card">
<img title="titulo del producto" src="https://d1w7fb2mkkr3kw.cloudfront.net/assets/images/book/lrg/9781/4842/9781484217290.jpg" class="card-img-top" alt="Titulo">
<div class="card-body">
  <span>Titulo del producto</span>
  <h5 class="card-title">$300.000</h5>
  <p class="card-text">Descripcion</p>
  <button class="btn btn-primary" name="btnAccion" value="Agregar" type="submit">Agregar al carrito</button>
</div>
    </div>



  </div>


  <div class="col-3" >

    <div class="card">
<img title="titulo del producto" src="https://d1w7fb2mkkr3kw.cloudfront.net/assets/images/book/lrg/9781/4842/9781484217290.jpg" class="card-img-top" alt="Titulo">
<div class="card-body">
  <span>Titulo del producto</span>
  <h5 class="card-title">$300.000</h5>
  <p class="card-text">Descripcion</p>
  <button class="btn btn-primary" name="btnAccion" value="Agregar" type="submit">Agregar al carrito</button>
</div>
    </div>



  </div>

</div>




</div>



  </body>
</html>
