<?php

//logout.php

session_start();
include 'header.php';

    //faz o logout do utilizador

    unset($_SESSION['user']);

    //mensagem

    echo '
        <div class="mensagem">

            Até à próxima!<br>

            <center><div class="buttons_entrada"><a href="login.php">Login</a></div> </center>

            </div>
    ';

    




?>


<?php

include "footer.php";

?>