<!DOCTYPE html>

<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <title>Icaro CRUD PHP</title>
</head>

<body>
    <div class="p-1 mb-2 bg-success text-white">
        <h1 class="text-center">Tela de incluir dependentes</h1>
    </div>

    <div class="btn-group mb-4" role="group">
        <a href="index.html"                class="btn btn-danger"  aria-current="page">Sair</a>
        <a href="dependentes_consultar.php" class="btn btn-success" aria-current="page">Consultar dependentes</a>
        <a href="dependentes_incluir.php"   class="btn btn-success" aria-current="page">Incluir dependentes</a>
    </div>

    <form method="post" class="fs-5">
        <div class="input-group mb-2">
            <label for="floatingInputGroup1">Nome do dependente:</label>
            <input type="text" class="form-control" id="floatingInputGroup1" name="name" placeholder="Nome" required>
        </div>
        <div class="input-group mb-2">
            <label for="floatingInputGroup2">Idade do dependente:</label>
            <input type="text" class="form-control" id="floatingInputGroup2" name="idade" placeholder="Idade" required>
        </div>
        <div class="input-group mb-3">
            <label for="floatingInputGroup3">Responsavel do dependente:</label>
            <input type="text" class="form-control" id="floatingInputGroup3" name="cliente" placeholder="Codigo" required>
        </div>
        <div class="d-grid gap-3 col-6 mx-auto">
            <input class="btn btn-success" type="submit" value="Incluir" >
        </div>
    </form>

    <?php
        include('conexao.php');
        if ($_POST['name'] == '' or $_POST['idade'] == ''){echo "
            <div class='alert alert-warning' role='alert'>
                Algo de errado nao esta certo!
            </div>
            ";}
        else {
            $query = "insert into dependentes 
            (nome_dependente,idade_dependente,cliente_dependente) values 
            ('".$_POST['name']."','".$_POST['idade']."','".$_POST['cliente']."');";

            $QueryGetClientesResult = mysqli_query($conexao,$query);
            if ($QueryGetClientesResult == 1){echo "
                <div class='alert alert-success' role='alert'>
                    Cliente inserido com sucesso!
                </div>
                ";};
        }

    ?>

</body>