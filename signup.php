<?php

//signup.php

session_start();
unset($_SESSION['user']); 

include 'header.php';

// dados de utilizador - verificação
if (!isset($_POST['btn_submit'])) {
    ApresentaFormulario();
} else {
    RegistarUtilizador();
}

function ApresentaFormulario()
{
    // form registo
    echo '
    <div class="signup-container">
    <div class="signup-bg">
        <form class="form_signup" method="POST" action="signup.php?a=signup" enctype="multipart/form-data">
            <br>
            <h3 class="title">Registo</h3>
            <br><br>
            Nome:<span class="required"></span><br><input type="text" size="20" name="text_utilizador" placeholder="escreva o seu nome aqui" required><br><br>
            Email:<span class="required"></span><br><input type="email" size="20" name="text_email" placeholder="escreva o seu email aqui" required><br><br>
            Password:<span class="required"></span><br><input type="password" size="20" name="text_password_1" placeholder="escreva a sua password aqui" required><br><br>
            Confirm Password:<span class="required"></span><br><input type="password" size="20" name="text_password_2" placeholder="confirme a sua password" required><br><br>

            <button class="btn-register" type="submit" name="btn_submit" value="Registar">Register Now</button><br><br>

            Já tem uma conta? <a href="index.php" class="lnow">Login</a><br><br>
        </form>
    </div>
</div>
    ';
}

function RegistarUtilizador()
{
    // registo de novo utilizador

    $nome = $_POST['text_utilizador'];
    $email = $_POST['text_email'];
    $password_1 = $_POST['text_password_1'];
    $password_2 = $_POST['text_password_2'];
    $usertype = $_POST['user_type'];
    $erro = false;

    // Verificação de erros
    if ($nome == "" || $password_1 == "" || $password_2 == "") {
        echo '<div class="erro">Não foram preenchidos os campos necessários.</div>';
        $erro = true;
    } else if ($password_1 != $password_2) {
        echo '<div class="erro">As passwords não coincidem.</div>';
        $erro = true;
    }

    if ($erro) {
        ApresentaFormulario();
        exit;
    }

    // registo de novo utilizador
    include 'config.php';
    $ligacao = new PDO("mysql:dbname=$base_dados;host=$host", $user, $password);

        $sql = "INSERT INTO users (nome, email, pass, pass2, user_type) VALUES (?, ?, ?, ?, ?)";

        $motor = $ligacao->prepare($sql);
        $motor->execute([$nome, $email, md5($password_1), md5($password_2), $usertype]);
        $ligacao = null;

        // mensagem
        
        echo '
            <div class="mensagem">
                
                Welcome <strong>'.$nome.'</strong><br><br>

                Please click the button to Login.<br><br>
                
                <center><div class="buttons_entrada"><a href="login.php">Login</a></div> </center>
            </div>';
    }

?>


<?php

include "footer.php";

?>