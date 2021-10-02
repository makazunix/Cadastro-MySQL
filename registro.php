<html>
<head><title>Register</title></head>
<body>

<?php
$conexao = mysqli_connect("localhost", "root", "", "marcos");
if ($conexao == false){
    echo "Não foi possível entrar no servidor";
    exit;
}

$nome = $_POST["nome"];
$username = $_POST["username"];
$cidade = $_POST["cidade"];
$senha = $_POST["senha"];
$celular = $_POST["celular"];

if (empty($nome) or empty($username) or empty($senha) or empty($celular)) {
    echo "<h2 style='color: red'>⚠ Campos inválidos! Digite novamente.</h2>";
    echo "<p style='font-size: 25px'><a href='index_cadastros.html'>Voltar ↺</a></p>";
    exit;
}

$sql = "INSERT INTO consani (codUsuario, username, nome, senha, cidade, celular) 
            VALUES (NULL, '$username', '$nome', '$senha', '$cidade', '$celular')";

$username_existe = mysqli_query($conexao, "SELECT * FROM consani WHERE username= '$username'");
if (mysqli_num_rows($username_existe) >= 1) {
    echo "<h2 style='color: yellow'>Username já existente</h2>";
    echo "<p style='font-size: 25px'><a href='index_cadastros.html'>Voltar ↺</a></p>";
    echo "<p style='font-size: 25px'><a href='index_cadastros.html'>Voltar ↺</a></p>";
    exit;
}
$resultado = mysqli_query($conexao, $sql);

if (!$resultado)
    echo "<h2 style='color: red'>Erro na Gravação do registro ;-;.</h2>";
else echo "<h2 style='color: blue'>Registro Gravado ヅ.</h2>";
?>

<p style="font-size: 25px"><a href="index_cadastros.html">Voltar ↺</a></p>
</body></html>
