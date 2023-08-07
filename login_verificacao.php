<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

//login_verificacao.php

session_start();

include 'header.php';

$utilizador = "";
$password_utilizador = "";

if (isset($_POST['text_utilizador'])) {
    $utilizador = trim($_POST['text_utilizador']);
    $password_utilizador = trim($_POST['text_password']);
    $passwordEncriptada = password_hash($password_utilizador, PASSWORD_DEFAULT);
}

include 'config.php';

$ligacao = new PDO("mysql:dbname=$base_dados;host=$host", $user, $password);

$motor = $ligacao->prepare("SELECT * FROM USER WHERE utilizador = ?");

$motor->bindParam(1, $utilizador, PDO::PARAM_STR);

$motor->execute();

$dados_user = $motor->fetch(PDO::FETCH_ASSOC);

if ($motor->rowCount() == 0 || !password_verify($password_utilizador, $dados_user['pass'])) {
    echo '
    <div class="dados_invalidos">
        <div class="titulo">
            <h3 class="titulo-texto">Dados de login inválidos!</h3>
            <img class="logo" src="images/logo.webp" alt="Logo">
            <a class="avancar" href="index.php">Voltar</a>
        </div>
    </div>';
    exit;
} else {
    //definir os dados da sessao
    $_SESSION['id_user'] = $dados_user['id_user'];
    $_SESSION['user'] = $dados_user['utilizador'];
    $_SESSION['nome'] = $dados_user['nome'];

    echo '
    <div class="login_text">
        <div class="text">
            <h5 class="text1">hi, <strong class="session_nome">' . $_SESSION['nome'] . '</strong></h5>
            <div class="link-box">
                <a href="login.php">Login</a>
                <a href="signup.php">Register</a>
                <a href="logout.php">Logout</a>
            </div>
        </div>
    </div>';
}
?>
