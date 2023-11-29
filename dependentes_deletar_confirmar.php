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
        <form action="dependentes_consultar.php">
            <button type="submit">Sair</button></form></div>
    <?php
        session_start();
        include('conexao.php');
        //echo "aqui: " . $_GET['id'];
        if ($_GET['id'] != ''){
            $QueryGetClientes = "select id_dependente, nome_dependente, idade_dependente,cliente_dependente from dependentes where id_dependente = '".$_GET['id']."';";
            $QueryGetClientesResult = mysqli_query($conexao,$QueryGetClientes);

        //crie uma variável para receber o código da tabela
            $tabela = '<table border="1">';//abre table
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
            <p>Favor informar novamente o codigo do cliente</p> 
            
            <input type="text" name="id" id="id" ><br>
            <button type="submit" class="botaoCliente" disabled>Apagar cliente</button>
        
            <script type="text/javascript">
	            let postid = document.querySelector('input[name="id"]');
                let getid = document.querySelector('input[name="teste"]');
	            let botao  = document.querySelector('.botaoCliente');

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