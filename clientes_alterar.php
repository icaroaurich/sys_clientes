<!DOCTYPE html>

<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css\style01.css">
    <script src="js/main.js"></script>
    <title>Icaro CRUD PHP</title>
</head>

<body>

    <?php      
        include('conexao.php');

            $QueryGetClientes = "select id_cliente,nome_cliente,cpf_cliente from clientes where id_cliente = '".$_GET['id']."';";
            $QueryGetClientesResult = mysqli_query($conexao,$QueryGetClientes);
            $row = mysqli_fetch_assoc($QueryGetClientesResult);

            $nome = $row['nome_cliente'];
            $cpf = $row['cpf_cliente'];
            $resultado = 'Cliente nao foi alterado ainda!';
    ?>
    <?php 
            if ($_POST['Nome'] == null){}
            else {
                $QueryGetClientes = "update clientes set 
                nome_cliente='".$_POST['Nome']."',
                cpf_cliente='".$_POST['CPF']."'
                where id_cliente = '".$_GET['id']."';";
                
                $QueryGetClientesResult = mysqli_query($conexao,$QueryGetClientes);
                $row = mysqli_fetch_assoc($QueryGetClientesResult);

                $nome = $_POST['Nome'];
                $cpf = $_POST['CPF'];
                $resultado = 'Cliente alterado!';
            }
    ?>

    <h1>Tela de consulta clientes</h1>

    <div class="div03">
        <form action="index.html">
            <button type="submit" style="background-color:red;">Sair</button></form></div>
    <div class="div02">
        <form action="clientes_consultar.php">
            <button type="submit">Consultar clientes</button></form></div>
    <div class="div02">
        <form action="clientes_incluir.php">
            <button type="submit">Incluir clientes</button></form></div>
            
    <h2>Informe o ID do cliente</h2>

    <form method="post">
        
        ID:   <input type="text" name="id"   id="id" disabled value='<?php echo $_GET['id'] ; ?>'><br>
        Nome: <input type="text" name="Nome" id="nome"        value='<?php echo $nome; ?>'><br>
        CPF:  <input type="text" name="CPF"  id="cpf"         value='<?php echo $cpf; ?>'><br>
        <input type="submit">
    </form>
        <?php echo $resultado; ?>
        

</body>