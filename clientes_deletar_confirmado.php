<?php
session_start();
include('conexao.php');

//echo $_POST['id'];
$query = "delete from clientes where id_cliente='".$_POST['id']."';";
$result = mysqli_query($conexao,$query);

header('location : clientes_consultar.php');
?>