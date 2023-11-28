<!DOCTYPE html>

<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css\teste01.css">
    <script src="js/main.js"></script>
    <title>Icaro CRUD PHP</title>
</head>

<body>

    <?php
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);

        include('conexao.php');

        if ($_POST['id'] == $_GET['id']){
            $QueryGetClientes = "select id_cliente,nome_cliente,cpf_cliente from clientes where id_cliente = '".$_GET['id']."';";
            $QueryGetClientesResult = mysqli_query($conexao,$QueryGetClientes);
            $row = mysqli_fetch_assoc($QueryGetClientesResult);

            $nome = $row['nome_cliente'];
            $cpf = $row['cpf_cliente'];
            $resultado = 'Select deu bom';
        }
        else{ 
            //$QueryGetClientes = "update clientes set nome_cliente='".$_POST['Nome']."',cpf_cliente='".$_POST['CPF']."' where id_cliente='".$_POST['id']."';";
            //$QueryGetClientesResult = mysqli_query($conexao,$QueryGetClientes);    

            $QueryGetClientes = "select id_cliente,nome_cliente,cpf_cliente from clientes where id_cliente = '".$_GET['id']."';";
            $QueryGetClientesResult = mysqli_query($conexao,$QueryGetClientes);
            $row = mysqli_fetch_assoc($QueryGetClientesResult);

            $nome = $row['nome_cliente'];
            $cpf = $row['cpf_cliente'];

            echo $_POST['id'];
            echo 'chegou';
            $resultado = 'post deu bom';
        }
    ?>

    <h1>Tela de consulta clientes</h1>

    <div class="div02">
        <form action="clientes_consultar.php">
            <button type="submit">Consultar clientes</button></form></div>
    <div class="div02">
        <form action="clientes_incluir.php">
            <button type="submit">Incluir clientes</button></form></div>
    <div class="div02">
        <form action="clientes_alterar.php">
            <button type="submit">Alterar clientes</button></form></div>
    <div class="div02">
        <form action="clientes_deletar.php">
            <button type="submit">Deletar clientes</button></form></div>
            
    <h2>Informe o ID do cliente</h2>

    <form method="post">
        ID:   <input type="text" name="id"   id="id" disabled value='<?php echo $_GET['id'] ; ?>'><br>
        Nome: <input type="text" name="Nome" id="nome"        value='<?php echo $nome; ?>'><br>
        CPF:  <input type="text" name="CPF"  id="cpf"         value='<?php echo $cpf; ?>'><br>
        <input type="submit">
    </form>
        <?php echo isset($resultado) ? $resultado : ''; ?>

</body>