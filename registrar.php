<?php
    //print_r($_POST);
    if(empty($_POST["oculto"]) || empty($_POST["txtnombre"]) || empty($_POST["txtcantidad"]) || empty($_POST["txtprecio"])){
        header('Location: index.php?mensaje=falta');
        exit();
    }

    include_once 'model/conexion.php';
    $nombre = $_POST["txtnombre"];
    $cantidad = $_POST["txtcantidad"];
    $precio = $_POST["txtprecio"];
    
    $sentencia = $bd->prepare("INSERT INTO producto(nombre,cantidad,precio) VALUES (?,?,?);");
    $resultado = $sentencia->execute([$nombre,$cantidad,$precio,$codigo]);

    if ($resultado === TRUE) {
        header('Location: index.php?mensaje=registrado');
    } else {
        header('Location: index.php?mensaje=error');
        exit();
    }
    
?>