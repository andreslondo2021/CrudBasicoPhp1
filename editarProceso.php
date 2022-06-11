<?php
    print_r($_POST);
    if(!isset($_POST['codigo'])){
        header('Location: index.php?mensaje=error');
    }

    include 'model/conexion.php';
    $codigo = $_POST['codigo'];
    $nombre = $_POST['txtnombre'];
    $cantidad = $_POST['txtcantidad'];
    $precio = $_POST['txtprecio'];

    $sentencia = $bd->prepare("UPDATE producto SET nombre = ?, cantidad = ?, precio = ? where codigo = ?;");
    $resultado = $sentencia->execute([$nombre, $cantidad, $precio, $codigo]);

    if ($resultado === TRUE) {
        header('Location: index.php?mensaje=editado');
    } else {
        header('Location: index.php?mensaje=error');
        exit();
    }
    
?>