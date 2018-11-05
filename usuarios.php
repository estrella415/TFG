<?php

include("abrir_BD.php");

$linea = 0;   //numero de lineas del archivo csv
$num = 0;     //numero de columnas del archivo csv
$x=0;
$y=0;
$usuarios;
//Abrimos nuestro archivo
$archivo = fopen("usuarios.csv", "r");
//Lo recorremos
while (($datos = fgetcsv($archivo, ";")) == true)
{
  $num = count($datos);
  $linea++;
  //Recorremos las columnas de esa linea
  for ($columna = 0; $columna < $num; $columna++){
    $usuarios[$x][$y] =  $datos[$columna];
    $y++;
  }
  $y=0;
  $x++;
}
//Cerramos el archivo
fclose($archivo);

for($i = 0; $i < $linea; $i++){
    $us = $usuarios[$i][0];
    $nombre = $usuarios[$i][1];
    $alias = $usuarios[$i][2];
    $rol = $usuarios[$i][3];

//registra los datos de los usuarios
    $sql="INSERT INTO usuarios (Usuario,Nombre,Alias,Rol) VALUES ('$us','$nombre','$alias','$rol')";
    mysql_query($sql,$conexion) or die('Error. '.mysql_error());
}


mysql_close ($conexion);

?>
