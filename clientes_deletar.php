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
            <button type="submit" style="background-color:red;">Sair</button></form></div>
    <div class="div02">
        <form action="clientes_consultar.php">
            <button type="submit">Consultar clientes</button></form></div>
    <div class="div02">
        <form action="clientes_incluir.php">
            <button type="submit">Incluir clientes</button></form></div>
            
    <form action="clientes_deletar_confirmar.php" method="post">
        ID: <input type="text" name="id" id="id" ><br>
            <input type="submit"></form>

</body>