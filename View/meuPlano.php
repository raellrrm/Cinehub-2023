<?php
if(isset($_GET['plano_edit']) && $_GET['plano_edit'] === 'true'){
    ?>
    <div class="success-message" style="background-color: #4CAF50; color:white; padding:10px; text-align: center; margin-bottom:10px; border-radius: 5px;">Plano alterado com sucesso!</div> 
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
        <section class="perfil-container">
            <div class="perfil-header">
                <img src="<?php echo BASE_URL; ?>assets/img/LOGO PNG_adobe_express.png" alt="" width="200" height="200">
            </div>
            <div class="perfil-foto">
                <?php 
                if(!empty($info['fotoPerfil'])){
                ?>
                 <img src="<?php echo BASE_URL; ?>assets/img/<?php echo $info['fotoPerfil']; ?>.jpg" alt="" width="200px" height="200px">
                <?php
                }else{
                    ?>
                 <img src="<?php echo BASE_URL; ?>assets/img/blank-profile-picture-973460_1280.png" alt="" width="200px" height="200px">
                    <?php
                }
                
                ?>
               
            </div>
            <div class="perfil-dados">
                <p><?php echo $info['nome']; ?> <?php echo $info['sobrenome']; ?></p>
                <p class="tipo"><?php echo $info['tipoUsuario']; ?></p>
            </div>
            <hr>
            <div class="perfil-menu">
                <hr>
                <a href="<?php echo BASE_URL; ?>perfil">Meu perfil</a>
                <?php 
                if($info['tipoUsuario']=="publicador"){
                    ?>
                     <a href="<?php echo BASE_URL; ?>perfil/minhasPublicacoes">Minhas publicaçoes</a>
                     <a href="<?php echo BASE_URL; ?>perfil/meuPlano">Meu plano</a>
                    <?php
                }elseif($info['tipoUsuario']=="administrador"){
                    ?>
                    <a href="<?php echo BASE_URL; ?>admin/listarUsuarios">Usuarios</a>
                    <?php
                }if($info['tipoUsuario']=="administrador"){
                    ?>
                    <a href="<?php echo BASE_URL; ?>critica/cadastrarFilmes">Cadastrar Filme</a>
                    <a href="<?php echo BASE_URL; ?>critica/filmes">Ver filmes</a>
                    <?php
                }
                ?>
                <hr>
            </div>
            <hr>
            <div class="perfil-info">
                <?php
                if(empty($assinaturaInfo['tipoAssinatura'])){
                    ?>
                 <p>Plano atual: Nenhum</p>
                <hr>
                <p style="color: red;">Não ativo</p>
                <hr>
                    <?php
                }else{
                    ?>
                <p>Plano atual: <?php echo $assinaturaInfo['tipoAssinatura']; ?></p>
                <hr>
                <p style="color: green;">Ativo</p>
                <hr>
                    <?php
                }
                ?>
                
            </div>
            <?php
            if(!empty($assinaturaInfo['tipoAssinatura'])){
            ?>
            <div class="btn-editar">
                <button><a href="<?php echo BASE_URL; ?>perfil/alterarPlano">Alterar plano</a></button>
            </div>
            <div class="btn-editar">
                <button style="background:red;"><a style="color:white;" href="<?php echo BASE_URL; ?>perfil/excluirPlano/" onclick='return confirm("Deseja cancelar o plano atual?")'>Calcelar plano</a></button>
            </div>
            <?php
            }
            ?>
        </section>
    </main>