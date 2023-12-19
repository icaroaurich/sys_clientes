<!DOCTYPE html>

<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css\style01.css">
    <title>Icaro CRUD PHP</title>
</head>

<body>
    <h1>Tela de consulta clientes</h1>
    
    <div class="div03">
        <form action="index.html">
            <button type="submit" style="background-color:red;">Sair</button></form></div>
    <div class="div02">
        <form action="dependentes_consultar.php">
            <button type="submit">Consultar dependentes</button></form></div>
    <div class="div02">
        <form action="dependentes_incluir.php">
            <button type="submit">Incluir dependentes</button></form></div>
            
    <form method="post">
        Name: <input type="text" name="name" required><br>
        idade: <input type="text" name="idade" required><br>
        Responsavel: <input type="text" name="cliente" required><br>
            <input type="submit"></form>

    <?php
        include('conexao.php');
        if ($_POST['name'] == '' or $_POST['idade'] == ''){echo "Conteudo invalido!";}
        else {
            echo $_POST['name'];
            echo "<br>";
            echo $_POST['idade'];
            echo "<br>";
            echo $_POST['cliente'];

            $query = "insert into dependentes 
            (nome_dependente,idade_dependente,cliente_dependente) values 
            ('".$_POST['name']."','".$_POST['idade']."','".$_POST['cliente']."');";

            $QueryGetClientesResult = mysqli_query($conexao,$query);
            if ($QueryGetClientesResult == 1){echo "Dependente inserido com sucesso!";};
        }

    ?>

</body>