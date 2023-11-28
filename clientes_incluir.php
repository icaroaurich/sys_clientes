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
        <form action="index.php">
            <button type="submit" style="background-color:red;">Voltar</button></form></div>
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
            
    <form method="post">
        Name: <input type="text" name="name" required><br>
        cpf: <input type="text" name="cpf" required><br>
            <input type="submit"></form>

    <?php
        include('conexao.php');
        if ($_POST['name'] == '' or $_POST['cpf'] == ''){echo "Conteudo invalido!";}
        else {
            echo $_POST['name'];
            echo "<br>";
            echo $_POST['cpf'];
            echo "<br>";

            $query = "insert into clientes (nome_cliente,cpf_cliente) values ('".$_POST['name']."','".$_POST['cpf']."');";
            $QueryGetClientesResult = mysqli_query($conexao,$query);
            if ($QueryGetClientesResult == 1){echo "Cliente inserido com sucesso!";};
        }

    ?>

</body>