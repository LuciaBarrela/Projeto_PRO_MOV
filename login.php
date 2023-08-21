<?php

include "header.php";

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ProjetoPRO_MOV</title>
</head>

<body>

<div class="centered-container">
    <div class="container login-container">
        <div class="login-bg">
            <form class="form_login" method="post" action="login_verificacao.php">
                <h3 class="title">Login</h3><p>
                <label for="text_utilizador">Email:</label>
                <input type="text" id="text_utilizador" name="text_utilizador" placeholder="o seu email">
                <label for="text_password">Password:</label>
                <input type="password" id="text_password" name="text_password" placeholder="a sua password">
                <button class="btn-login" type="submit"><span class="text-body">Entrar</span></button>
                <p>Não tem uma conta? <a href="signup.php" class="lnow">Registe-se agora</a></p>
                <p><a href="recuperar_senha.php">Esqueci-me da palavra passe</a></p>
            </form>
        </div>
    </div>
</div>

</body>


</html>



<?php

include "footer.php";

?>