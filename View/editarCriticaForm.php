<?php
if(isset($_GET['editar']) && $_GET['editar'] === 'true'){
    ?>
    <div class="success-message" style="background-color: #4CAF50; color:white; padding:10px; text-align: center; margin-bottom:10px; border-radius: 5px;">Crítica editada com sucesso!</div> 
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
}elseif(isset($_GET['editar']) && $_GET['editar'] === 'false'){
    ?>
    <div class="success-message" style="background-color: red; color:white; padding:10px; text-align: center; margin-bottom:10px; border-radius: 5px;">Erro ao editar!</div> 
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
                <h1>Editar crítica do filme "<?php echo $nomeFilme['titulo']; ?>"</h1>
            </div>
            <div class="form-content">
                <form class="form-post" method="POST">
                    <div class="form-group">
                        <label for="conteudo"></label>
                        <textarea class="form-control" id="conteudo" name="conteudo" rows="8"><?php echo $critica['conteudo']; ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="notaCritica">De sua nota</label>
                        <select name="notaCritica" id="">
                            <option value="0" <?php echo($critica['notaCritica']=='0')?'selected="selected"':''; ?>>0</option>
                            <option value="1" <?php echo($critica['notaCritica']=='1')?'selected="selected"':''; ?>>1</option>
                            <option value="2" <?php echo($critica['notaCritica']=='2')?'selected="selected"':''; ?>>2</option>
                            <option value="3" <?php echo($critica['notaCritica']=='3')?'selected="selected"':''; ?>>3</option>
                            <option value="4" <?php echo($critica['notaCritica']=='4')?'selected="selected"':''; ?>>4</option>
                            <option value="5" <?php echo($critica['notaCritica']=='5')?'selected="selected"':''; ?>>5</option>
                            <option value="6" <?php echo($critica['notaCritica']=='6')?'selected="selected"':''; ?>>6</option>
                            <option value="7" <?php echo($critica['notaCritica']=='7')?'selected="selected"':''; ?>>7</option>
                            <option value="8" <?php echo($critica['notaCritica']=='8')?'selected="selected"':''; ?>>8</option>
                            <option value="9" <?php echo($critica['notaCritica']=='9')?'selected="selected"':''; ?>>9</option>
                            <option value="10" <?php echo($critica['notaCritica']=='10')?'selected="selected"':''; ?>>10</option>
                        </select>
                    </div>

                      <button type="submit" class="btn btn-primary">Enviar</button>
                </form>
            </div>
        </div>
    </main>