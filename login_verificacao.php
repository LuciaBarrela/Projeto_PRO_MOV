<?php

//login_verificacao.php

session_start();
if (isset($_SESSION['user'])){
    include 'cabecalho.php';
    echo '
        <div class="mensagem">
            Já se encontra ligado no site.<br><br>
            <div class="buttons_entrada"><a href="logout.php">Logout</a></div></center>
    ';
    exit;
}

include 'cabecalho.php';

$email = $_POST['text_email'];
$password_1 = $_POST['text_password_1'];

if (isset($_POST['text_email'])) {
    $email = $_POST['text_email'];
    $password_1 = $_POST['text_password_1'];

    if ($email == "" || $password_1 == "") {
        echo '
            <div class="erro">
            Não foram preenchidos os campos necessários.
            <br><br>
            <a href="index.php">Tente novamente</a>
            </div>
        ';
        exit;
    }
}

// Verificação dos dados de login - EMAIL E PASSWORD
$passwordEncriptada = md5($password_1);

include 'config.php';

$ligacao = new PDO("mysql:dbname=$base_dados;host=$host", $user, $password);
$motor = $ligacao->prepare("SELECT * FROM users WHERE email = ? AND pass = ?");
$motor->bindParam(1, $email, PDO::PARAM_STR);
$motor->bindParam(2, $passwordEncriptada, PDO::PARAM_STR);
$motor->execute();
$ligacao = null;

// Liga os dados ao SQL
if ($motor->rowCount() == 0) {
    echo '
        <div class="erro">
            Dados de login inválidos.<br><br>
            <div class="buttons_entrada"><a href="login.php">Login</a></div></center>
        </div>';
    exit;
} else {

    // Dados da sessão
    $dados_user = $motor->fetch(PDO::FETCH_ASSOC);
    $_SESSION['user'] = $dados_user['email'];
    $_SESSION['nome'] = $dados_user['nome']; 
    $_SESSION['usertype'] = $dados_user['user_type']; 

    // Página de entrada onde diz WELCOME "if user else admin"
    echo '
    <div class="entrada">

    hi, <span class="usertype">'.$_SESSION['usertype'].'</span><br>
    <span class="welcome"><strong>Welcome <span class="nome">'.$_SESSION['nome'].'</span></strong></span><br>
        this is an <strong>'.$_SESSION['usertype'].'</strong> page</div>
    <center><div class="buttons_entrada"><a href="login.php">Login</a></div> 
        <div class="buttons_entrada"><a href="signup.php">Register</a></div>
        <div class="buttons_entrada"><a href="logout.php">Logout</a></div></center>
    
    ';
}
?>
