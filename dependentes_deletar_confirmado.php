<?php
session_start();
include('conexao.php');

//echo $_POST['id'];
$query = "delete from dependentes where id_dependente='".$_POST['id']."';";
$result = mysqli_query($conexao,$query);

header('location : dependentes_consultar.php');
?>