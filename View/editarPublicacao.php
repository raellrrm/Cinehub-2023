<?php
if(isset($_GET['editar-post']) && $_GET['editar-post'] === 'true'){
    ?>
    <div class="success-message" style="background-color: #4CAF50; color:white; padding:10px; text-align: center; margin-bottom:10px; border-radius: 5px;">Publicação editada com sucesso!</div> 
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
                <h1>Editar publicação</h1>
            </div>
            <div class="form-content">
            <form method="POST" class="form-post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="titulo">Título</label>
                        <input type="text" class="form-control" id="titulo" name="titulo" value="<?php  echo $info['titulo']; ?>" required>
                      </div>
                      <div class="form-group">
                        <label for="descricao">Descrição</label>
                        <input type="text" class="form-control" id="descricao" name="descricao" value="<?php  echo $info['descricao']; ?>" required>
                      </div>
                      <div class="form-group">
                        <label for="conteudo">Conteúdo</label>
                        <textarea class="form-control" id="conteudo" name="conteudo" rows="10" required><?php  echo $info['conteudo']; ?></textarea>
                      </div>
                      <div class="form-group">
                        <label for="categoria">Categoria</label>
                        <input type="radio" name="categoria" value="noticia" <?php echo($info['categoria']=='noticia')?'checked':''; ?> required> Notícia
                        <input type="radio" name="categoria" value="Artigo"  <?php echo($info['categoria']=='artigo')?'checked':''; ?> required> Artigo
                      </div>
                      <div class="form-group">
                        <label for="categoria">Selecione uma imagem</label>
                        <input type="file" name="imagem" >
                      </div>
                      <button type="submit" class="btn btn-primary">Enviar</button>
                </form>
            </div>
        </div>
    </main>