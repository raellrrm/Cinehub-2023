<?php
if(isset($_GET['post_create']) && $_GET['post_create'] === 'true'){
    ?>
    <div class="success-message" style="background-color: #4CAF50; color:white; padding:10px; text-align: center; margin-bottom:10px; border-radius: 5px;">Publicação crida com sucesso!</div> 
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
                <h1>Criar publicação</h1>
            </div>
            <div class="form-content">
            <form method="POST" class="form-post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="titulo">Título</label>
                        <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Título da notícia ou artigo" required>
                      </div>
                      <div class="form-group">
                        <label for="descricao">Descrição</label>
                        <input type="text" class="form-control" id="descricao" name="descricao" placeholder="Descrição da notícia ou artigo" required>
                      </div>
                      <div class="form-group">
                        <label for="conteudo">Conteúdo</label>
                        <textarea class="form-control" id="conteudo" name="conteudo" rows="10" required></textarea>
                      </div>
                      <div class="form-group">
                        <label for="categoria">Categoria</label>
                        <input type="radio" name="categoria" value="noticia" required> Notícia
                        <input type="radio" name="categoria" value="artigo" required> Artigo
                      </div>
                      <div class="form-group">
                        <label for="categoria">Selecione uma imagem</label>
                        <input type="file" name="imagem" required>
                      </div>
                      <button type="submit" class="btn btn-primary">Enviar</button>
                </form>
            </div>
        </div>
    </main>