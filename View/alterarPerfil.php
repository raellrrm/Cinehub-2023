
<main>
        <section class="perfil-container">
            <div class="perfil-header">
                <img src="<?php echo BASE_URL; ?>assets/img/LOGO PNG_adobe_express.png" alt="" width="200" height="200">
            </div>
            <div class="perfil-foto">
                <?php 
                if(isset($info['fotoPerfil'])){
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
                <a href="">Alterar meu perfil</a>
                <hr>
            </div>
            <hr>
            <div class="alterarPerfil-form">
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="AlterarPerfil-inputs">
                    <input type="text" placeholder="nome" name="nome" value="<?php echo $info['nome']; ?>">
                    <input type="text" placeholder="sobrenome" name="sobrenome" value="<?php echo $info['sobrenome']; ?>">
                     <textarea id="" cols="30" rows="5" placeholder="bio" name="bio"><?php echo $info['bio']; ?></textarea>
                     <label for="">Alterar foto de perfil</label>
                     <input type="file" name="fotoPerfil">
                  </div>
                  <div class="btn-editar">
                <button type="submit">Salvar</button>
            </div>
           </form>
          </div>
           
        </section>
    </main>