<!DOCTYPE html>

<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css\style01.css">
    <title>Icaro CRUD PHP</title>
</head>

<body>
    <h1>Tela de consulta dependentes</h1>

    <div class="div03">
        <form action="index.html">
            <button type="submit" style="background-color:red;">Voltar</button></form></div>
    <div class="div02">
        <form action="dependentes_consultar.php">
            <button type="submit">Consultar dependentes</button></form></div>
    <div class="div02">
        <form action="dependentes_incluir.php">
            <button type="submit">Incluir dependentes</button></form></div>
            
    <form method="post">
        Name: <input type="text" name="name"><br>
            <input type="submit"></form>

    <?php
        include('conexao.php');
        echo $_POST['name'];
        if ($_POST['name'] != ''){
            $QueryGetClientes = "select 
                id_dependente, 
                nome_dependente, 
                idade_dependente, 
                nome_cliente 
            from dependentes 
            inner join clientes on dependentes.cliente_dependente = clientes.id_cliente
            where nome_dependente like '%".$_POST['name']."%' or nome_cliente like '%".$_POST['name']."%';";
        }
        else{
            $QueryGetClientes = "select 
                id_dependente, 
                nome_dependente, 
                idade_dependente, 
                nome_cliente 
            from dependentes
                inner join clientes on dependentes.cliente_dependente = clientes.id_cliente;";
        }
        $QueryGetClientesResult = mysqli_query($conexao,$QueryGetClientes);

        // Tabela
            $tabela = '<table border="1">';
            $tabela .='<thead>';
            $tabela .= '<tr>';
            $tabela .= '<th>ID</th>'; //            ID
            $tabela .= '<th>Nome</th>'; //          Nome
            $tabela .= '<th>Idade</th>';//          Idade
            $tabela .= '<th>Responsavel</th>';//    Cliente
            $tabela .= '<th>Excluir</th>';//        Excluir
            $tabela .= '</tr>';
            $tabela .='</thead>'; 
            $tabela .='<tbody>';

        while($row = mysqli_fetch_assoc($QueryGetClientesResult)) {
            $tabela .= '<tr>';
            $tabela .= '<td><a href="dependentes_alterar.php?id='.$row['id_dependente']. '">'.$row['id_dependente']. '</a></td>';
            $tabela .= '<td>'.$row['nome_dependente'].'</td>'; //       Nome
            $tabela .= '<td>'.$row['idade_dependente'].'</td>'; //      Idade
            $tabela .= '<td>'.$row['nome_cliente'].'</td>'; //          Cliente
            $tabela .= '<td><a href="dependentes_deletar_confirmar.php?id='.$row['id_dependente']. '"><img src="image\lixeira.ico"></a></td>';
            $tabela .= '</tr>';        
           }

        $tabela .='</tbody>'; 
        $tabela .= '</table>';

        echo $tabela; // imprime
    ?>

</body>