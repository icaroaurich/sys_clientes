<!DOCTYPE html>

<html lang="pt-br">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <title>Icaro CRUD PHP</title>
</head>

<body>
    <div class="p-1 mb-2 bg-success text-white">
        <h1 class="text-center">Tela de consulta dependentes</h1>
    </div>

    <div class="btn-group mb-4" role="group">
        <a href="index.html"                class="btn btn-danger"  aria-current="page">Sair</a>
        <a href="dependentes_consultar.php" class="btn btn-success" aria-current="page">Consultar dependentes</a>
        <a href="dependentes_incluir.php"   class="btn btn-success" aria-current="page">Incluir dependentes</a>
    </div>

    <form method="post" class="fs-5">
        <div class="input-group mb-4">
            <label for="floatingInputGroup1">Nome do dependente/responsavel: </label>
            <input type="text" class="form-control" id="floatingInputGroup1" name="name" placeholder="Nome">
        </div>
    </form>

    <?php
        include('conexao.php');
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
            $tabela = '<table border="1" class="table table-bordered table-striped border-success">';
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
            $tabela .= '<td><a class="btn btn-success" href="dependentes_alterar.php?id='.$row['id_dependente']. '">'.$row['id_dependente']. '</a></td>';
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