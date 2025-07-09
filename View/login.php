<?php
if(isset($_GET['login']) && $_GET['login']==='false'){
    ?>  
 <div class="success-message" style="background-color: red; color:white; padding:10px; text-align: center; margin-bottom:10px; border-radius: 5px;">Email ou senha incorretos!</div> 
    <style>
        .success-message::before{
            cotent: "";
            position: absolute;
            top:-10;
            left:50%;
            margin-left:-10px;
            border-width:10px;
            border-style:solid;
            border-color:transparent transparent #4CAF50 transparent;
        }
    </style>
    <?php
}elseif(isset($_GET['conta_criada']) && $_GET['conta_criada']==='true'){
    ?>  
 <div class="success-message" style="background-color: #4CAF50ed; color:white; padding:10px; text-align: center; margin-bottom:10px; border-radius: 5px;">Conta criada com sucesso!</div> 
    <style>
        .success-message::before{
            cotent: "";
            position: absolute;
            top:-10;
            left:50%;
            margin-left:-10px;
            border-width:10px;
            border-style:solid;
            border-color:transparent transparent #4CAF50 transparent;
        }
    </style>
    <?php
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300;400;500&display=swap" rel="stylesheet">
    <link href="<?php echo BASE_URL; ?>assets/css/boot.css" rel="stylesheet">
    <link href="<?php echo BASE_URL; ?>assetscss/fonticon.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/assets/css/login.css">
    <title>Login do usuário</title>
</head>
<body class="login_body">
    <div class="container">
        <div class="form-container">
            <form action="" method="POST">
                <h1>Login</h1>
                <span>Faça login em sua conta.</span>
                    <input type="text" placeholder="E-mail do usuário" name="email" required>
                    <input type="password" placeholder="Sua senha" name="senha" required>
                <button type="submit">Entrar</button>
                <a href="<?php echo BASE_URL; ?>cadastro">Crie sua conta aqui.</a>
            </form>
        </div><!--form-container-->
            <div class="right-container">
                <div class="panel-right">
                    <div class="panel">
                        <div class="msg-right">
                            <h1>Bem-vindo de volta</h1>
                            <span>Insira seus dados pessoais para usar todos os recursos do site.</span>
                        </div><!--msg-right-->
                    </div><!--panel-->
                </div><!--panel-right-->
            </div><!--right-container-->
    </div><!--container-->
</body>
</html>