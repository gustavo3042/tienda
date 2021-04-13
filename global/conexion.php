<?php
//include 'config.php';
/*
$servidor="mysql:dbname=".$DB.";host=".SERVIDOR;

try {

  $pdo= new PDO($servidor,USUARIO,PASSWORD,
array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES utf8")
);

echo "<script>(alert('conectado...'))</script>";

} catch (PDOException $e) {

echo "<script>(alert('Error...'))</script>";

}

*/


function getPDO () {
     try {

         $pdo = new PDO('mysql:host=localhost;dbname=tienda', 'root', '', array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES utf8"));
         $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
         $sql = $pdo->prepare('SELECT * FROM tblproductos');
        $sql->execute();
        $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
         return $resultado;
         echo  "<script>(alert('conectado...'))</script>";
       }
       catch(PDOException $e){
         echo  "¡Error!: <br/>";
         return null;
       }
   }
 ?>
