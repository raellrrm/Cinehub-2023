<div class="table-container">
<div class="header_fixed">
        <table>
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Foto</th>
                    <th>Nome</th>
                    <th>Sobrenome</th>
                    <th>Email</th>
                    <th>Tipo Usuario</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                     foreach($listaUsuarios as $usuarios){
                        ?>
                     <tr>
                        <td><?php echo $usuarios['id_usuario'] ;?></td>
                        <?php  
                        if(!empty($usuarios['fotoPerfil'])){
                            ?>
                                 <td><img src="<?php echo BASE_URL ?>/assets/img/<?php echo $usuarios['fotoPerfil']; ?>.jpg" alt=""></td>
                            <?php
                        }else{
                            ?>
                                <td>  <img src="<?php echo BASE_URL; ?>assets/img/blank-profile-picture-973460_1280.png" alt=""></td>
                            <?php
                        }
                        ?>
                        <td><?php echo $usuarios['nome']; ?></td>
                        <td><?php echo $usuarios['sobrenome']; ?></td>
                        <td><?php echo $usuarios['email']; ?></td>
                        <td><?php echo $usuarios['tipoUsuario']; ?></td>
                        <td>
                            <?php 
                                if($usuarios['tipoUsuario'] != 'administrador'){
                            ?>
                            <button  style="background-color: #FFA500;"><a href="<?php echo BASE_URL; ?>admin/editarUsuario/<?php echo $usuarios['id_usuario']; ?>" style="color:#fff;" >editar</a></button>
                            <button style="background-color: red;"><a href="<?php echo BASE_URL; ?>admin/excluirUsuario/<?php echo $usuarios['id_usuario']; ?>" style="color:#fff;" onclick='return confirm("Deseja excluir este usuario?")'>excluir</a></button>
                            <?php
                                }
                            ?>
                        </td>
                    </tr>
                        <?php
                     }
                ?>
              
            </tbody>
        </table>
    </div>
           
</div>
            <?php /*
            foreach($listaUsuarios as $usuarios){
                ?>
                 <tr>
                <td><?php echo $usuarios['id_usuario']; ?></td>
                <td><?php echo $usuarios['nome']; ?></td>
                <td><?php echo $usuarios['email'] ?></td>
                <td><?php echo $usuarios['tipoUsuario']; ?></td>
                <td>
                    <?php if($usuarios['tipoUsuario']=="comum"){ ?>
                    <button class="btn-action"><a href="<?php echo BASE_URL; ?>admin/exluirUsuario/<?php echo $usuarios['id_usuario'] ?>" onclick='return confirm("Deseja excluir este usuario?")'>excluir</a></button>
                    <?php }
                    elseif($usuarios['tipoUsuario']=="publicador"){ ?>
                     <button class="btn-action"><a href="<?php echo BASE_URL; ?>admin/exluirUsuario/<?php echo $usuarios['id_usuario'] ?>" onclick='return confirm("Deseja excluir este usuario?")'>excluir</a></button>
                     <?php } ?>
                </td>
                </tr>
                <?php
            }*/
            ?>

    </div>
