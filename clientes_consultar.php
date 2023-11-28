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

            $tabela = '<table border="1">';
            $tabela .='<thead>';
            $tabela .= '<tr>';
            $tabela .= '<th>ID</th>'; //            ID
            $tabela .= '<th>Nome</th>';//           Nome
            $tabela .= '<th>CPF</th>';//            cpf
            $tabela .= '<th>Excluir</th>';
            $tabela .= '</tr>';
            $tabela .='</thead>'; 
            $tabela .='<tbody>';

        while($row = mysqli_fetch_assoc($QueryGetClientesResult)) {
            $tabela .= '<tr>'; 
            $tabela .= '<td><a href="clientes_alterar.php?id='.$row['id_cliente'].'">'.$row['id_cliente']. '</a></td>';
            $tabela .= '<td>'.$row['nome_cliente'].'</td>'; //      Nome
            $tabela .= '<td>'.$row['cpf_cliente'].'</td>'; //       CPF
            $tabela .= '<td><a href="clientes_deletar_confirmar.php?id='.$row['id_cliente'].'"><img src="image\lixeira.ico"></a></td>';
            $tabela .= '</tr>';
           }

        $tabela .='</tbody>'; 
        $tabela .= '</table>';

        echo $tabela;
    ?>

</body>