<!DOCTYPE html>

<html lang="pt-br">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <title>Icaro CRUD PHP</title>
</head>

<body>

    <?php      
        include('conexao.php');

            $QueryGetClientes = "select id_cliente,nome_cliente,cpf_cliente from clientes where id_cliente = '".$_GET['id']."';";
            $QueryGetClientesResult = mysqli_query($conexao,$QueryGetClientes);
            $row = mysqli_fetch_assoc($QueryGetClientesResult);

            $nome = $row['nome_cliente'];
            $cpf = $row['cpf_cliente'];
            $resultado = '
            <div class="alert alert-warning" role="alert">
                Cliente ainda nao foi alterado
            </div>
            ';
    ?>
    <?php 
            if ($_POST['Nome'] == null){}
            else {
                $QueryGetClientes = "update clientes set 
                nome_cliente='".$_POST['Nome']."',
                cpf_cliente='".$_POST['CPF']."'
                where id_cliente = '".$_GET['id']."';";
                
                $QueryGetClientesResult = mysqli_query($conexao,$QueryGetClientes);
                $row = mysqli_fetch_assoc($QueryGetClientesResult);

                $nome = $_POST['Nome'];
                $cpf = $_POST['CPF'];
                $resultado = '
                <div class="alert alert-success" role="alert">
                    Cliente alterado!
                </div>
                ';
            }
    ?>

    <div class="p-1 mb-2 bg-primary text-white">
        <h1 class="text-center">Tela de alterar clientes</h1>
    </div>

    <div class="btn-group mb-4" role="group">
        <a href="index.html"             class="btn btn-danger"  aria-current="page">Sair</a>
        <a href="clientes_consultar.php" class="btn btn-primary" aria-current="page">Consultar clientes</a>
        <a href="clientes_incluir.php"   class="btn btn-primary" aria-current="page">Incluir clientes</a>
    </div>
            
    <form method="post" class="fs-5">
        <div class="input-group mb-1">
            <label for="floatingInputGroup1">ID: </label>
            <input type="text" class="form-control" id="floatingInputGroup1" name="id" id="id" disabled required value='<?php echo $_GET['id'] ; ?>'>
        </div>
        <div class="input-group mb-1">
            <label for="floatingInputGroup2">Nome: </label>
            <input type="text" class="form-control" id="floatingInputGroup2" name="Nome" id="nome" required value='<?php echo $nome; ?>'>
        </div>
        <div class="input-group mb-1">
            <label for="floatingInputGroup3">CPF: </label>
            <input type="text" class="form-control" id="floatingInputGroup3" name="CPF" id="cpf" required value='<?php echo $cpf; ?>'>
        </div>
        <div class="d-grid gap-2 col-1 mx-auto">
            <input class="btn btn-primary" type="submit">
        </div>
    </form>
        <?php echo $resultado; ?>
        

</body>