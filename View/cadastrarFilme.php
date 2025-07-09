<?php
if(isset($_GET['cadastrar-filme']) && $_GET['cadastrar-filme'] === 'true'){
    ?>
    <div class="success-message" style="background-color: #4CAF50; color:white; padding:10px; text-align: center; margin-bottom:10px; border-radius: 5px;">Filme cadastrado com sucesso!</div> 
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
                <h1>Cadastrar Filme</h1>
            </div>
            <div class="form-content">
                <form class="form-post" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="titulo">Nome do filme</label>
                        <input type="text" class="form-control" id="titulo" name="titulo"
                            placeholder="Título da notícia ou artigo">
                    </div>
                    <div class="form-group">
                        <label for="conteudo">Sinopse</label>
                        <textarea class="form-control" id="conteudo" name="sinopse" rows="8"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="classificacao">Classificação etária</label>
                        <select name="classificacao" id="">
                            <option value="10">10</option>
                            <option value="12">12</option>
                            <option value="14">14</option>
                            <option value="16">16</option>
                            <option value="18">18</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="genero">Gênero</label><br>
                        <select name="genero[]" id="" multiple>
                            <option value="Ação">Ação</option>
                            <option value="Aventura">Aventura</option>
                            <option value="Cinema de arte">Cinema de arte</option>
                            <option value="Chanchada">Chanchada</option>
                            <option value="Comedia">Comédia</option>
                            <option value="Comédia de ação">Comédia de ação</option>
                            <option value="Comédia de terror">Comédia de terror</option>
                            <option value="Comédia dramática">Comédia dramática</option>
                            <option value="Comédia romântica">Comédia romântica</option>
                            <option value="Dança">Dança</option>
                            <option value="Documentário">Documentário</option>
                            <option value="Docuficção">Docuficção</option>
                            <option value="Drama">Drama</option>
                            <option value="Espionagem">Espionagem</option>
                            <option value="Faroeste">Faroeste</option>
                            <option value="Fantasia">Fantasia</option>
                            <option value="Fantasia cientifica">Fantasia científica</option>
                            <option value="Ficção cientifica">Ficção científica</option>
                            <option value="Filmes com truques">Filmes com truques</option>
                            <option value="Guerra">Guerra</option>
                            <option value="Misterio">Mistério</option>
                            <option value="Musical">Musical</option>
                            <option value="Policial">Policial</option>
                            <option value="Romance">Romance</option>
                            <option value="Terror">Terror</option>
                            <option value="Thriller">Thriller</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="categoria">Selecione a imagem do filme</label>
                        <input type="file" name="fotoFilme" required>
                    </div>

                    <div class="form-group">
                        <label for="categoria">Selecione o plano de fundo</label>
                        <input type="file" name="fotoFundo" required>
                    </div>

                    <div class="form-group">
                        <label for="dtLanc">Data de lançamento</label>
                        <input type="date" name="dataLanc" id="dtLanc">
                    </div>
                      <button type="submit" class="btn btn-primary">Enviar</button>
                </form>
            </div>
        </div>
    </main>