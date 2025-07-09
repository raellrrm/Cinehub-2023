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
    <link href="<?php echo BASE_URL; ?>assets/css/fonticon.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/loginAdm.css">
    <title>Login de Adiministrador</title>
</head>
<body>
    <div class="container">
        <div class="form-container">
            <form method="POST">
                <h1>Adiministrador</h1>
                <span>Faça login em sua conta.</span>
                    <input type="email" placeholder="E-mail do usuário" name="email" required>
                    <input type="password" placeholder="Sua senha" name="senha" required>
                <button type="submit">Entrar</button>
            </form>
        </div><!--form-container-->
    </div><!--container-->
</body>
</html>