<?php
if(isset($_GET['conta_criada']) && $_GET['conta_criada'] === 'false'){
    ?>
    <div class="success-message" style="background-color: red; color:white; padding:10px; text-align: center; margin-bottom:10px; border-radius: 5px;">Este email já está em uso!</div> 
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
elseif(isset($_GET['telefone']) && $_GET['telefone'] === 'false'){
    ?>
    <div class="success-message" style="background-color: red; color:white; padding:10px; text-align: center; margin-bottom:10px; border-radius: 5px;">Telefone inválido!</div> 
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
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/cadastro.css">
    <title>Cadastro do usuario</title>
</head>

<body class="body_cadastro">
    <div class="container">
        <div class="form-container">
            <form action="" method="POST">
                <h1>Cadastrar-se</h1>
                <span>Insira seus dados para fazer login no sistema</span>
                <input type="text" placeholder="Nome do usuário" name="nome" required>
                <input type="text" placeholder="sobrenome" name="sobrenome" required>
                <input type="text" placeholder="telefone" id="numero" name="telefone" oninput="formatarNumero(this)" required>

                <script>
                    function formatarNumero(input) {
                        // Remove qualquer caractere que não seja um número
                        let numeroLimpo = input.value.replace(/\D/g, '');
            
                        // Limita o comprimento do número
                        if (numeroLimpo.length > 11) {
                            numeroLimpo = numeroLimpo.substring(0, 11);
                        }
            
                        // Formata o número
                        if (numeroLimpo.length === 11) {
                            const numeroFormatado = `(${numeroLimpo.substring(0, 2)}) ${numeroLimpo.substring(2, 7)}-${numeroLimpo.substring(7)}`;
                            input.value = numeroFormatado;
                        }
                    }
                </script>
                <input type="text" placeholder="E-mail do usuário" name="email" required>
                <input type="password" placeholder="Sua senha" name="senha" required>
                <div class="cadastro-content-input-radio">
                    <label for="">Tipo de Usuario:</label> <br>
                    <div class="inputs-radio">
                        <input class="input-radio" type="radio" name="tipoUsuario" value="comum" checked >Comum
                        <input class="input-radio" type="radio" name="tipoUsuario" value="publicador">Publicador 
                    </div>
                  </div>
                <button type="submit">Cadastrar</button>
            </form>
        </div><!--form-container-->
        <div class="right-container">
            <div class="panel-right">
                <div class="panel">
                    <div class="msg-right">
                        <h1>Bem-vindo</h1>
                        <span>Insira seus dados pessoais .</span>
                    </div><!--msg-right-->
                </div><!--panel-->
            </div><!--panel-right-->
        </div><!--right-container-->
    </div><!--container-->
</body>

</html>