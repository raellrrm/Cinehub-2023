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
    <title>Cinehub</title>
</head>

<body class="body_cadastro">
    <div class="container">
        <div class="form-container">
            <form action="" method="POST">
                <h1>Dados adicionais</h1>
                <span>Insira seus dados para continuar a assinatura</span>
                <input type="text" placeholder="CPF" name="cpf" required>
                <select name="uf" id="" required>
                    <option value="UF">UF</option>
                    <option value="UF">AC</option>
                    <option value="UF">AL</option>
                    <option value="UF">AP</option>
                    <option value="UF">AM</option>
                    <option value="UF">BA</option>
                    <option value="UF">CE</option>
                    <option value="UF">DF</option>
                    <option value="UF">ES</option>
                    <option value="UF">GO</option>
                    <option value="UF">MA</option>
                    <option value="UF">MT</option>
                    <option value="UF">MS</option>
                    <option value="UF">MG</option>
                    <option value="UF">PA</option>
                    <option value="UF">PB</option>
                    <option value="UF">PR</option>
                    <option value="UF">PE</option>
                    <option value="UF">PI</option>
                    <option value="UF">RJ</option>
                    <option value="UF">RN</option>
                    <option value="UF">RS</option>
                    <option value="UF">RO</option>
                    <option value="UF">RR</option>
                    <option value="UF">SC</option>
                    <option value="UF">SP</option>
                    <option value="UF">SE</option>
                    <option value="UF">TO</option>
                </select>
                <input type="text" placeholder="Cidade" name="cidade" required>
                <input type="text" placeholder="Rua" name="rua" required>
                <input type="text" placeholder="Numero" name="numero" required>
                <input type="text" placeholder="CEP" name="cep" required>
                <input type="text" placeholder="Telefone" name="telefone" required>
                <button type="submit">Adicionar</button>
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