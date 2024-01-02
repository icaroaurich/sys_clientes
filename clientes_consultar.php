<!DOCTYPE html>

<html lang="pt-br">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <title>Icaro CRUD PHP</title>
</head>

<body>
    <div class="p-1 mb-2 bg-primary text-white">
        <h1 class="text-center">Tela de consultar clientes</h1>
    </div>

    <div class="btn-group mb-4" role="group">
        <a href="index.html"             class="btn btn-danger"  aria-current="page">Sair</a>
        <a href="clientes_consultar.php" class="btn btn-primary" aria-current="page">Consultar clientes</a>
        <a href="clientes_incluir.php"   class="btn btn-primary" aria-current="page">Incluir clientes</a>
    </div>
            
    <form method="post" class="fs-5">
        <div class="input-group mb-4">
            <label for="floatingInputGroup1">Nome do usuario: </label>
            <input type="text" class="form-control" id="floatingInputGroup1" name="name" placeholder="Nome">
        </div>
    </form>

    <?php
        include('conexao.php');
        if ($_POST['name'] != ''){
            $QueryGetClientes = "select id_cliente, nome_cliente, cpf_cliente from clientes where nome_cliente like '%".$_POST['name']."%';";
        }
        else{
            $QueryGetClientes = "select id_cliente, nome_cliente, cpf_cliente from clientes;";
        }
        $QueryGetClientesResult = mysqli_query($conexao,$QueryGetClientes);

        $tabela = '<table class="table table-bordered table-striped border-primary">';
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
            $tabela .= '<td><a class="btn btn-info" href="clientes_alterar.php?id='.$row['id_cliente'].'">'.$row['id_cliente']. '</a></td>';
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