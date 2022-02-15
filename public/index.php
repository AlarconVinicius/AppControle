<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../css/login.css">
</head>
<body>
    
   <div class="login-container">
        <form class="login-box" method="post" action="../sistema_login/login.php">
            <h1>Login</h1>
            <div class="login-text">
                <input type="email" placeholder="" id="email" name="email" value="" maxlength="" required>
                <label for="email">E-mail</label>
            </div>
    
            <div class="login-text">
                <input type="password" placeholder="" id="senha" name="senha" value="" maxlength="" >
                <label for="senha">Senha</label>
            </div>

            <?php if(isset($_GET['erro']) && $_GET['erro'] == 1){ ?>
                <div class="msg-erro">
                    <p>Preencha todos os campos!</p>
                </div>
            <?php } ?>

            <?php if(isset($_GET['erro']) && $_GET['erro'] == 2){ ?>
                <div class="msg-erro">
                    <p>Usuário ou senha inválido(s)</p>
                </div>
            <?php } ?>

            <?php if(isset($_GET['erro']) && $_GET['erro'] == 3){ ?>
                <div class="msg-erro">
                    <p>Faça login para acessar essa página!</p>
                </div>
            <?php } ?>
    
            <div class="center">
                <button class="login-btn" type="submit" value="">Entrar</button>
            </div>
        </form>
   </div>

</body>
</html>