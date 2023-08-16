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

<div class="container login-container">
<div class="login-bg">
    <form class="form_login" method="post" action="login_verificacao.php">
        
        <br><br>
        <h3 class="title">Login</h3>

        Email:<br><input type="text" size="20" name="text_utilizador" placeholder="escreva aqui o seu email"><br><br>

        Password<br><input type="password" size="20" name="text_password" placeholder="escreva aqui a sua password"><br><br>

        <button class="btn-login" type="submit"><span class="text-body">Entrar</span></button><br><br>

        Não tem uma conta? <a href="signup.php" class="lnow">Registe-se agora</a><br><br>
        <a href="recuperar_senha.php">Esqueci-me da palavra passe</a>

    </form>
</div>

    
</body>
</html>



<?php

include "footer.php";

?>