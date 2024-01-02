<!DOCTYPE html>

<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <title>Icaro CRUD PHP</title>
</head>

<body>
    <div class="p-1 mb-2 bg-danger text-white">
        <h1 class="text-center">Tela de deletar dependentes</h1>
    </div>

    <div class="btn-group mb-4" role="group">
        <a href="dependentes_consultar.php" class="btn btn-success" aria-current="page">Consultar dependentes</a>
    </div>
    <?php
        session_start();
        include('conexao.php');
        //echo "aqui: " . $_GET['id'];
        if ($_GET['id'] != ''){
            $QueryGetClientes = "select id_dependente, nome_dependente, idade_dependente,cliente_dependente from dependentes where id_dependente = '".$_GET['id']."';";
            $QueryGetClientesResult = mysqli_query($conexao,$QueryGetClientes);

        //crie uma variável para receber o código da tabela
            $tabela = '<table border="1" class="table table-bordered table-striped border-danger">';//abre table
            $tabela .='<thead>';//abre cabeçalho
            $tabela .= '<tr>';//abre uma linha
            $tabela .= '<th>ID</th>'; // colunas do cabeçalho
            $tabela .= '<th>Nome</th>';
            $tabela .= '<th>Idade</th>';
            $tabela .= '<th>Responsavel</th>';
            $tabela .= '</tr>';//fecha linha
            $tabela .='</thead>'; //fecha cabeçalho
            $tabela .='<tbody>';//abre corpo da tabela

        /*Se você tiver um loop para exibir os dados ele deve ficar aqui*/
        while($row = mysqli_fetch_assoc($QueryGetClientesResult)) {
            $tabela .= '<tr>'; // abre uma linha
            $tabela .= '<td>'.$row["id_dependente"].'</td>'; // coluna ID
            $tabela .= '<td>'.$row['nome_dependente'].'</td>'; //coluna Nome
            $tabela .= '<td>'.$row['idade_dependente'].'</td>'; // coluna CPF
            $tabela .= '<td>'.$row['cliente_dependente'].'</td>'; // coluna CPF
            $tabela .= '</tr>'; // fecha linha        
           }
        /*loop deve terminar aqui*/
        $tabela .='</tbody>'; //fecha corpo
        $tabela .= '</table>';//fecha tabela

        echo $tabela; // imprime
        }
        
    ?>

    <div class="div02">
    <input type="text" name=teste disabled hidden value=<?php echo $_GET['id']?>><br>
        <form action="dependentes_deletar_confirmado.php" method="post" id=<?php $_GET['id']?>>

        <div class="d-grid gap-2 col-3 mx-auto">
            <p>Favor informar novamente o codigo do dependente</p> 
            <input type="text" name="id" id="id" ><br>
            <button type="submit" class="btn btn-danger" name=botao disabled>Apagar dependente</button>
        </div>
        
            <script type="text/javascript">
	            let postid = document.querySelector('input[name="id"]');
                let getid =  document.querySelector('input[name="teste"]');
	            let botao  = document.querySelector('[name="botao"]');

	            postid.addEventListener('input', function(){
		            verificaCampos();
	            });

	            function verificaCampos() {
		            if(postid.value == getid.value)
			            botao.disabled = false;
		            else
			            botao.disabled = true;
                }

            </script>
        </form></div>
    

</body>