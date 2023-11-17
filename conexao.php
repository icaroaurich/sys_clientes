<?php
    $myfile = fopen("config.auh", "r") or die("Não foi possível abrir o arquivo de configuração!!");
    $contador = 0;
while (($line = fgets($myfile)) !== false) {
    $equalPos = strpos($line,"=") + 2;
    $endLine = strpos($line,";") - 1;
    $linha = substr($line,$equalPos,$endLine-$equalPos+1);

    if ($contador == 0) $host = $linha;
    if ($contador == 1) $usuario = $linha;
    if ($contador == 2) $senha = $linha;
    if ($contador == 3) $bd = $linha;
    if ($contador == 4) $porta = $linha;
    $contador = $contador + 1;
}
fclose($myfile);

define('HOST',$host);
define('USUARIO',$usuario);
define('SENHA',$senha);
define('DB',$bd);
define('PORT',$porta);

$erro = "Não foi possível conectar ao banco de dados!! 
<br> {$host}
<br> {$usuario}
<br> {$senha}
<br> {$bd}
<br> {$porta}";

$conexao = mysqli_connect(HOST,USUARIO,SENHA,DB,PORT) or die ($erro)
?>