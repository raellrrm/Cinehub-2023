<?php
if(isset($_GET['critica']) && $_GET['critica'] === 'true'){
    ?>
    <div class="success-message" style="background-color: #4CAF50; color:white; padding:10px; text-align: center; margin-bottom:10px; border-radius: 5px;">Crítica criada com sucesso!</div> 
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
}elseif(isset($_GET['critica']) && $_GET['critica'] === 'false'){
    ?>
    <div class="success-message" style="background-color: red; color:white; padding:10px; text-align: center; margin-bottom:10px; border-radius: 5px;">Você já fez uma critica deste filme!</div> 
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
                <h1>Fazer crítica do filme "<?php echo $filme['titulo']; ?>"</h1>
            </div>
            <div class="form-content">
                <form class="form-post" method="POST">
                    <div class="form-group">
                        <label for="conteudo">Sua critica</label>
                        <textarea class="form-control" id="conteudo" name="conteudo" rows="8"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="notaCritica">De sua nota</label>
                        <select name="notaCritica" id="">
                            <option value="0">0</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                        </select>
                    </div>

                      <button type="submit" class="btn btn-primary">Enviar</button>
                </form>
            </div>
        </div>
    </main>