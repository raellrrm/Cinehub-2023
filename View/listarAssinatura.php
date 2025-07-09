<div class="table-container">
<div class="header_fixed">
        <table>
            <thead>
                <tr>
                    <th>Id Assinatura</th>
                    <th>Id Usuario</th>
                    <th>Email do assinante</th>
                    <th>Tipo</th>
                    <th>Metodo</th>
                    <th>Data/Hora</th>
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody>
                
                <?php
                if(!empty($listarAssinaturas)){
                     foreach($listarAssinaturas as $assinaturas){
                        ?>
                     <tr>
                        <td><?php echo $assinaturas['id_assinatura'] ;?></td>
                        <td><?php echo $assinaturas['id_usuario']; ?></td>
                        <td><?php echo $assinaturas['email']; ?></td>
                        <td><?php echo $assinaturas['tipo']; ?></td>
                        <td><?php echo $assinaturas['metodo']; ?></td>
                        <td><?php echo date('d-m-Y H:i:s',strtotime($assinaturas['dataHora']));?></td>
                        <td>
                            <button style="background-color: red;"><a href="<?php echo BASE_URL; ?>admin/excluirAssinatura/<?php echo $assinaturas['id_usuario']; ?>" style="color:#fff;" onclick='return confirm("Deseja excluir esta assinatura?")'>exlcluir</a></button>
                           
                        </td>
                    </tr>
                        <?php
                     }
                    }else{
                        ?>
                    <tr>
                        <td>Vazio</td>
                        <td>Vazio</td>
                        <td>Vazio</td>
                        <td>Vazio</td>
                        <td>Vazio</td>
                        <td>Vazio</td>
                        <td>Vazio</td>
                    </tr>
                        <?php
                    }
                ?>
              
            </tbody>
        </table>
    </div>
           
</div>

    </div>
