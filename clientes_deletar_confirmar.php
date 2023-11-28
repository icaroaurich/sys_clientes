<!DOCTYPE html>

<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css\style01.css">
    <title>Icaro CRUD PHP</title>
</head>

<body>
    <h1>Tela de consulta clientes</h1>

    <div class="div02">
        <form action="clientes_deletar.php">
            <button type="submit">Voltar</button></form></div>
    <?php
        session_start();
        include('conexao.php');
        //echo "aqui: " . $_GET['id'];
        if ($_GET['id'] != ''){
            $QueryGetClientes = "select id_cliente, nome_cliente, cpf_cliente from clientes where id_cliente = '".$_GET['id']."';";
            $QueryGetClientesResult = mysqli_query($conexao,$QueryGetClientes);

        //crie uma variável para receber o código da tabela
            $tabela = '<table border="1">';//abre table
            $tabela .='<thead>';//abre cabeçalho
            $tabela .= '<tr>';//abre uma linha
            $tabela .= '<th>ID</th>'; // colunas do cabeçalho
            $tabela .= '<th>Nome</th>';
            $tabela .= '<th>CPF</th>';
            $tabela .= '</tr>';//fecha linha
            $tabela .='</thead>'; //fecha cabeçalho
            $tabela .='<tbody>';//abre corpo da tabela

        /*Se você tiver um loop para exibir os dados ele deve ficar aqui*/
        while($row = mysqli_fetch_assoc($QueryGetClientesResult)) {
            $tabela .= '<tr>'; // abre uma linha
            $tabela .= '<td>'.$row["id_cliente"].'</td>'; // coluna ID
            $tabela .= '<td>'.$row['nome_cliente'].'</td>'; //coluna Nome
            $tabela .= '<td>'.$row['cpf_cliente'].'</td>'; // coluna CPF
            $tabela .= '</tr>'; // fecha linha        
           }
        /*loop deve terminar aqui*/
        $tabela .='</tbody>'; //fecha corpo
        $tabela .= '</table>';//fecha tabela

        echo $tabela; // imprime
        }
        
    ?>

    <div class="div02">
        <form action="clientes_deletar_confirmado.php" method="post">
            <p>Favor informar novamente o codigo do cliente</p> <input type="text" name="id" id="id" ><br>
            <button type="submit">Apagar cliente</button></form></div>
    

</body>