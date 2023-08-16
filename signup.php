<?php

//signup.php

session_start();
unset($_SESSION['user']); 

include 'header.php';

function gerarCodigoSeguranca() {
    return mt_rand(100000, 999999);
}


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
            Nome:<span class="required"></span><br><input type="text" size="20" name="text_nome" placeholder="escreva o seu nome aqui" required><br><br>
            Email:<span class="required"></span><br><input type="email" size="20" name="email_utilizador" placeholder="escreva o seu email aqui" required><br><br>
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

    // Executar as operações necessárias para o registo de um novo utilizador


    $nome = $_POST['text_nome'];

    $utilizador = $_POST['email_utilizador'];

    $password_1 = $_POST['text_password_1'];

    $password_2 = $_POST['text_password_2'];

    $erro = false;

 

    // Verificação de erros do utilizador

    if ($nome == "" || $utilizador == "" || $password_1 == "" || $password_2 == "" ) {

        echo '<div class="alert">

        <span class="closebtn" onclick="this.parentElement.style.display = \'none\';">&times;</span>

        Não foram preenchidos os campos necessários!

      </div>';

        $erro = true;

    } else if ($password_1 != $password_2) {

        echo '<div class="alert">

        <span class="closebtn" onclick="this.parentElement.style.display = \'none\';">&times;</span>

        As passwords não coincidem!

      </div>';

        $erro = true;

    }

    if ($erro) {

        ApresentaFormulario();

        exit;

    }

    $codigoSeguranca = gerarCodigoSeguranca();

    // Processo do registo de um novo utilizador

 

    include 'config.php';

    $ligacao = new PDO("mysql:dbname=$base_dados;host=$host", $user, $password);

 

    // Verificar se já existe um utilizador com o mesmo email

 

    $motor = $ligacao->prepare("SELECT utilizador FROM USER WHERE utilizador = ?");

    $motor->bindParam(1, $utilizador, PDO::PARAM_STR);

    $motor->execute();

 

    if ($motor->rowCount() != 0) {

        echo '<div class="alert">

        <span class="closebtn" onclick="this.parentElement.style.display = \'none\';">&times;</span>

        Já existe uma conta associada a este email!

      </div>';

        $ligacao = null;

        ApresentaFormulario();

        exit;

    } else {

        // Registo de um novo utilizador

 

        $motor = $ligacao->prepare("SELECT MAX(id_user) AS MaxID FROM USER");

        $motor->execute();

        $id_temp = $motor->fetch(PDO::FETCH_ASSOC)['MaxID'];

        if ($id_temp == null) {

            $id_temp = 1;

        } else {

            $id_temp++;

        }

        

        // Password encriptada

        $passwordEncriptada = password_hash($password_1, PASSWORD_DEFAULT);

 

        $sql = "INSERT INTO USER VALUES (:id_user, :nome, :utilizador, :pass, :codigo)";

 

        $motor = $ligacao->prepare($sql);

        $motor->bindParam(":id_user", $id_temp, PDO::PARAM_INT);

        $motor->bindParam(":nome", $nome, PDO::PARAM_STR);

        $motor->bindParam(":utilizador", $utilizador, PDO::PARAM_STR);

        $motor->bindParam(":pass", $passwordEncriptada, PDO::PARAM_STR);

        $motor->bindParam(":codigo", $codigoSeguranca, PDO::PARAM_INT);



        $motor->execute();

        $ligacao = null;

 

        // Apresentar mensagem de boas vindas



        echo '<div class="novo_registo_sucesso">
        <div class="titulo">
            <h3 class="titulo-texto">Bem-vindo, <strong>'.$nome.'</strong></h3>
            <img class="logo" src="images/logo.webp" alt="Logo">
            <a class= "avancar"href = "login.php">Login</a>
            <br>
            Código de Segurança: ' . $codigoSeguranca . '
        </div>
    
        ';

    }

}
?>


<?php

include "footer.php";

?>