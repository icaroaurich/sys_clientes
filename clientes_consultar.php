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
        Name: <input type="text" name="name"><br>
            <input type="submit"></form>

    <?php
        include('conexao.php');
        echo $_POST['name'];
        if ($_POST['name'] != ''){
            $QueryGetClientes = "select id_cliente, nome_cliente, cpf_cliente from clientes where nome_cliente like '%".$_POST['name']."%';";
        }
        else{
            $QueryGetClientes = "select id_cliente, nome_cliente, cpf_cliente from clientes;";
        }
        $QueryGetClientesResult = mysqli_query($conexao,$QueryGetClientes);

        //crie uma variável para receber o código da tabela
            $tabela = '<table border="1">';//abre table
            $tabela .='<thead>';//abre cabeçalho
            $tabela .= '<tr>';//abre uma linha
            $tabela .= '<th>ID</th>'; // colunas do cabeçalho
            $tabela .= '<th>Nome</th>';
            $tabela .= '<th>CPF</th>';
            $tabela .= '<th>Excluir</th>';
            $tabela .= '</tr>';//fecha linha
            $tabela .='</thead>'; //fecha cabeçalho
            $tabela .='<tbody>';//abre corpo da tabela

        /*Se você tiver um loop para exibir os dados ele deve ficar aqui*/
        while($row = mysqli_fetch_assoc($QueryGetClientesResult)) {
            $tabela .= '<tr>'; // abre uma linha
            $tabela .= '<td><a href="clientes_alterar.php?id='.$row['id_cliente']. '">'.$row['id_cliente']. '</a></td>';
            $tabela .= '<td>'.$row['nome_cliente'].'</td>'; //coluna Nome
            $tabela .= '<td>'.$row['cpf_cliente'].'</td>'; // coluna CPF
            $tabela .= '<td><a href="clientes_deletar_confirmar.php?id='.$row['id_cliente']. '">'.$row['id_cliente']. '</a></td>';
            $tabela .= '</tr>'; // fecha linha        
           }
        /*loop deve terminar aqui*/
        $tabela .='</tbody>'; //fecha corpo
        $tabela .= '</table>';//fecha tabela

        echo $tabela; // imprime
    ?>

</body>