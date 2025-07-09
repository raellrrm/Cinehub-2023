<?php
if(isset($_GET['conta_editada']) && $_GET['conta_editada'] === 'false'){
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
}elseif(isset($_GET['conta_editada']) && $_GET['conta_editada'] === 'true'){
    ?>
    <div class="success-message" style="background-color: #4CAF50ed; color:white; padding:10px; text-align: center; margin-bottom:10px; border-radius: 5px;">Conta editada com sucesso!</div> 
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
<main>
        <div class="form-post-container">
            <div class="form-title">
                <h1>Editar informações do usuario</h1>
            </div>
            <div class="form-content">
            <form method="POST" class="form-post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="titulo">Nome</label>
                        <input type="text" class="form-control" id="titulo" name="nome" value="<?php echo $dadosUsuario['nome']; ?>" placeholder="Digite o nome" required>
                      </div>
                    <div class="form-group">
                        <label for="titulo">Sobrenome</label>
                        <input type="text" class="form-control" id="titulo" name="sobrenome" value="<?php echo $dadosUsuario['sobrenome']; ?>" placeholder="Digite o nome" required>
                      </div>
                      <div class="form-group">
                        <label for="descricao">Email</label>
                        <input type="email" class="form-control" id="descricao" name="email" value="<?php echo $dadosUsuario['email']; ?>" placeholder="Digite o email" required>
                      </div>
                      <div class="form-group">
                        <label for="descricao">Telefone</label>
                        <input type="text" class="form-control" id="descricao" name="telefone" value="<?php echo $dadosUsuario['numero']; ?>" placeholder="Digite o numero" oninput="formatarNumero(this)" required>
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
                      </div>
                      <div class="form-group">
                        <label for="descricao">Senha</label>
                        <input type="password" class="form-control" id="descricao" name="senha" placeholder="Digite a nova senha (opcional)" >
                      </div>
                      <button type="submit" class="btn btn-primary">Enviar</button>
                </form>
            </div>
        </div>
    </main>