<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login de usuário </title>
</head>
<body>
    <form method="post" action="">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" required><br>

        <label for="senha">Senha:</label>
        <input type="password" name="senha" required><br>

        <button type="submit">Entrar</button>
    </form>

    <?php
    // Verifica se o formulário foi enviado
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Recebe osvalores enviados pelo formulário
        $nome = $_POST['nome'];
        $senha = $_POST['senha'];

        // Abre o arquivo usuario.txt para leitura
        $arquivo = fopen('usuarios.txt', 'r');
        $login_sucesso = false;

        // Lê cada linha do arquivo
        while (($linha = fgets($arquivo)) !== false) {
            // Divide a linha pelo deimitador ";"
            list($usuario_arquivo, $senha_arquivo) = explode(';', trim($linha));

            // Verifica se o nome e a senha correspondem aos valores no arquivo
            if ($nome == $usuario_arquivo && $senha == $senha_arquivo) {
                $login_sucesso = true;
                break;
            }
        }

        // Fecha o arquivo
        fclose($arquivo);

        // Exibe a mensagem de sucesso ou erro
        if ($login_sucesso) {
            echo "<p>Login realizado com sucesso! Bem-vindo, $nome!</p>";
        } else {
            echo "<p style='color: red; '>Usuário ou senha incorretos.</p>";
        }
    }
    ?>
</body>
</html>