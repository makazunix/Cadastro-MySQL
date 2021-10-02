<html>
<head><title>Sign in</title></head>
<body>

<?php
$conexao = mysqli_connect("localhost", "root", "", "marcos"); // Criando Conexão no banco "marcos"
if ($conexao == false){
    echo "<h3>Não foi possível entrar no servidor .-.</h3>";
    exit;
}

$username = $_POST["user"];
$senha = $_POST["senha"];

if (empty($username) or empty($senha)) {
    echo "<h2 style='color: red'>⚠ Campos inválidos! Digite novamente.</h2>";
    echo "<p style='font-size: 25px'><a href='index_login.html'>Voltar ↺</a></p>";
    exit;
}

$verify_row = mysqli_query($conexao,"SELECT * FROM consani WHERE username='$username' AND senha='$senha'"); // Pegando a senha e um usuário da tabela "consani"

if (mysqli_num_rows($verify_row) == 1) { // Verificando o número de cadastros com essa mesma senha e usuário 
    echo "<h2 style='color: blueviolet; font-family:Comic Sans MS, serif'>Login efetuado com Sucesso.<br>
           Seja Bem-vindo <b style='color: black'>$username</b>! ^^</h2>";
} else {
    echo "<h2 style='color: red'>Conta inválida ou Inexistente. Tente Novamente.</h2>";
    echo "<p style='font-size: 25px'><a href='index_login.html'>Voltar ↺</a></p>";
    echo "<p style='font-size: 25px'><a href='index_cadastros.html'>Cadastrar ↺</a></p>";
    exit;
}



?>
