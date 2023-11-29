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

            $QueryGetClientes = "select 
                id_dependente,
                nome_dependente,
                idade_dependente,
                cliente_dependente 
            from dependentes 
            where id_dependente = '".$_GET['id']."';";

            $QueryGetClientesResult = mysqli_query($conexao,$QueryGetClientes);
            $row = mysqli_fetch_assoc($QueryGetClientesResult);

            $nome = $row['nome_dependente'];
            $idade  = $row['idade_dependente'];
            $cliente  = $row['cliente_dependente'];

            $resultado = 'Dependente nao foi alterado ainda!';
    ?>
    <?php 
        if ($_POST['nome'] == null){}
        else {
            $QueryGetClientes = "update dependentes set 
            nome_dependente='".$_POST['nome']."',
            idade_dependente='".$_POST['idade']."',
            cliente_dependente='".$_POST['cliente']."'
            where id_dependente = '".$_GET['id']."';";
              
            $QueryGetClientesResult = mysqli_query($conexao,$QueryGetClientes);
            $row = mysqli_fetch_assoc($QueryGetClientesResult);

            $nome  = $_POST['nome'];
            $idade = $_POST['idade'];
            $cliente = $_POST['cliente'];

            $resultado = 'Dependente alterado!';
        }
    ?>

    <h1>Tela de consulta clientes</h1>

    <div class="div03">
        <form action="index.php">
            <button type="submit" style="background-color:red;">Sair</button></form></div>
    <div class="div02">
        <form action="dependentes_consultar.php">
            <button type="submit">Consultar dependentes</button></form></div>
    <div class="div02">
        <form action="dependentes_incluir.php">
            <button type="submit">Incluir dependentes</button></form></div>
            
    <h2>Alterar dados do dependente</h2>

    <form method="post">
        
        ID:         <input type="text" name="id"        id="id" disabled value='<?php echo $_GET['id'] ; ?>'><br>
        Nome:       <input type="text" name="nome"      id="nome"        value='<?php echo $nome; ?>'><br>
        Idade:      <input type="text" name="idade"     id="idade"       value='<?php echo $idade; ?>'><br>
        Resposavel: <input type="text" name="cliente"   id="cliente"     value='<?php echo $cliente; ?>'><br>
        <input type="submit">
    </form>
        <?php echo $resultado; ?>
        

</body>