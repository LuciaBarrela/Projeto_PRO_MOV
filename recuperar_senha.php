<?php
// recuperar_senha.php

include 'header.php';
include 'config.php'; // Certifique-se de incluir a configuração do seu banco de dados

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $codigoSeguranca = $_POST['codigo'];
    $novaSenha = $_POST['novaSenha'];

    // Verificar se o e-mail e código de segurança existem na base de dados
    $ligacao = new PDO("mysql:dbname=$base_dados;host=$host", $user, $password);
    $motor = $ligacao->prepare("SELECT id_user, codigo_seguranca FROM USER WHERE utilizador = ?");
    $motor->bindParam(1, $email, PDO::PARAM_STR);
    $motor->execute();

    if ($motor->rowCount() > 0) {
        $dadosUsuario = $motor->fetch(PDO::FETCH_ASSOC);
        $id_user = $dadosUsuario['id_user'];
        $codigoArmazenado = $dadosUsuario['codigo_seguranca'];

        if ($codigoSeguranca == $codigoArmazenado) {
            // Atualiza a senha na base de dados
            $options = ['cost' => 12];
            $hashedPassword = password_hash($novaSenha, PASSWORD_BCRYPT, $options);

            $motor = $ligacao->prepare("UPDATE USER SET pass = ? WHERE id_user = ?");
            $motor->bindParam(1, $hashedPassword, PDO::PARAM_STR);
            $motor->bindParam(2, $id_user, PDO::PARAM_INT);
            $motor->execute();

            echo '<p>A sua senha foi redefinida com sucesso.</p>';
        } else {
            echo '<p>O código de segurança inserido não corresponde ao utilizador.</p>';
        }
    } else {
        echo '<p>O e-mail fornecido não está associado a nenhuma conta.</p>';
    }

    $ligacao = null;
} else {
    // Formulário para redefinição de senha
    echo '
    <form method="POST">
        <label for="email">Digite o seu endereço de e-mail:</label>
        <input type="email" id="email" name="email" required><br>
        
        <label for="codigo">Código de Segurança:</label>
        <input type="text" name="codigo" required><br>
        
        <label for="novaSenha">Nova Senha:</label>
        <input type="password" name="novaSenha" required><br>

        <button type="submit" name="submit">Redefinir Senha</button>
    </form>
    ';
}

include 'footer.php';
?>
