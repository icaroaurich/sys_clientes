<!DOCTYPE html>

<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <title>Icaro CRUD PHP</title>
</head>

<body>

    <?php      
        include('conexao.php');

            $QueryGetClientes = "select 
                id_dependente,
                nome_dependente,
                idade_dependente,
                cliente_dependente 
            from dependentes 
            where id_dependente = '".$_GET['id']."';";

            $QueryGetClientesResult = mysqli_query($conexao,$QueryGetClientes);
            $row = mysqli_fetch_assoc($QueryGetClientesResult);

            $nome = $row['nome_dependente'];
            $idade  = $row['idade_dependente'];
            $cliente  = $row['cliente_dependente'];

            $resultado = '
            <div class="alert alert-warning" role="alert">
                Dependente ainda nao foi alterado
            </div>
            ';
    ?>
    <?php 
        if ($_POST['nome'] == null){}
        else {
            $QueryGetClientes = "update dependentes set 
            nome_dependente='".$_POST['nome']."',
            idade_dependente='".$_POST['idade']."',
            cliente_dependente='".$_POST['cliente']."'
            where id_dependente = '".$_GET['id']."';";
              
            $QueryGetClientesResult = mysqli_query($conexao,$QueryGetClientes);
            $row = mysqli_fetch_assoc($QueryGetClientesResult);

            $nome  = $_POST['nome'];
            $idade = $_POST['idade'];
            $cliente = $_POST['cliente'];

            $resultado = '
                <div class="alert alert-success" role="alert">
                    Dependente alterado!
                </div>
            ';
        }
    ?>

    <div class="p-1 mb-2 bg-success text-white">
        <h1 class="text-center">Tela de alterar dependentes</h1>
    </div>

    <div class="btn-group mb-4" role="group">
        <a href="index.html"                class="btn btn-danger"  aria-current="page">Sair</a>
        <a href="dependentes_consultar.php" class="btn btn-success" aria-current="page">Consultar dependentes</a>
        <a href="dependentes_incluir.php"   class="btn btn-success" aria-current="page">Incluir dependentes</a>
    </div>
    
    <form method="post" class="fs-5">
        <div class="input-group mb-1">
            <label for="floatingInputGroup1">ID: </label>
            <input type="text" class="form-control" id="floatingInputGroup1" name="id" id="id" disabled required value='<?php echo $_GET['id'] ; ?>'>
        </div>
        <div class="input-group mb-1">
            <label for="floatingInputGroup2">Nome: </label>
            <input type="text" class="form-control" id="floatingInputGroup2" name="nome" id="nome" required value='<?php echo $nome; ?>'>
        </div>
        <div class="input-group mb-1">
            <label for="floatingInputGroup3">Idade: </label>
            <input type="text" class="form-control" id="floatingInputGroup3" name="idade" id="idade" required value='<?php echo $idade; ?>'>
        </div>
        <div class="input-group mb-1">
            <label for="floatingInputGroup4">Responsavel: </label>
            <input type="text" class="form-control" id="floatingInputGroup4" name="cliente" id="cliente" required value='<?php echo $cliente; ?>'>
        </div>
        <div class="d-grid gap-2 col-1 mx-auto">
            <input class="btn btn-success" type="submit">
        </div>
    </form>
        <?php echo $resultado; ?>
        

</body>