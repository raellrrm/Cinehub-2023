<main class="main">
        <section class="last-news">
            <header class="last-news-header">
                <h1 class="icon-blog">Ultimos Artigos</h1>
            </header>
                <?php  foreach($ultimosArtigos as $lastArticles){
                ?>
                    <article>
                          <h2><a href="<?php echo BASE_URL; ?>publicacao/abrirArtigo/<?php echo $lastArticles['id_publicacao']; ?>" class="title"><?php echo $lastArticles['titulo']; ?></a></h2>
                            <a href="<?php echo BASE_URL; ?>publicacao/abrirArtigo/<?php echo $lastArticles['id_publicacao']; ?>"><img src="<?php echo BASE_URL; ?>assets/img/<?php echo $lastArticles['imagem']; ?>.jpg" width="135"  alt="Imagem post" title="Imagem Post"></a>
                    </article>
                    <div class="last-news-hr">
                       <hr>
                   </div>
                <?php
            } ?>
          
           
        

        </section>
        <section class="news-container">
            <div class="news-content">
                <div class="news-title">
                    <h2><?php  echo $artigo['titulo']; ?></h2>
                </div>
                <div class="news-description">
                    <p><?php  echo $artigo['descricao']; ?></p>
                </div>
                <div class="news-img">
                    <img src="<?php  echo BASE_URL; ?>assets/img/<?php echo $artigo['imagem']; ?>.jpg" alt="">
                </div>

                <div class="news-paragraphs">
                    <?php  
                          $textoDoBanco=$artigo['conteudo'];
                          $textoFormatado= preg_replace('/\[subtitulo\](.*?)\[\/subtitulo\]/','<h2 style="font-size:1.5em; color:#333;  font-weight: 700;">$1</h2>',$textoDoBanco);
                          $paragrafos= preg_split('/\r\n|\r|\n/', $textoFormatado);
                          foreach($paragrafos as $paragrafo){
                            ?>
                               <div class="paragraphs">
                                  <p>
                                    <?php echo $paragrafo; ?>
                                 </p>
                               </div>
                            <?php
                          }
                      ?>
                  
                </div>
            </div>

        </section>
  </main>
  <div class="news-autor">
        <div class="news-autor-info">
            <i>Artigo de: <strong><a href="#" style="color:#000;"><?php echo $publicador['nome']; ?> <?php echo $publicador['sobrenome'];?></a></strong> dia: <?php echo date("d-m-Y",strtotime($artigo['data_hora'])); ?></i>
        </div>
    </div>
    <section class="main-articles">
        <header class="principal-articles-header">
            <h1 class="icon-blog">Veja mais</h1>
        </header>
        <div class="principal-articles">
            <?php foreach($principaisArtigos as $artigo){
                ?>
                 <article class="principal-articles-article">
                    <a href="<?php echo BASE_URL; ?>publicacao/abrirArtigo/<?php echo $artigo['id_publicacao']; ?>">
                         <img src="<?php echo BASE_URL; ?>assets/img/<?php echo $artigo['imagem']; ?>.jpg" width="250" alt="Imagem post" title="Imagem Post">
                    </a>
                    <h2><a href="<?php echo BASE_URL; ?>publicacao/abrirArtigo/<?php echo $artigo['id_publicacao']; ?>" class="title"><?php echo $artigo['titulo']; ?></a></h2>
                </article>
                <?php
            } ?>
        </div>
    </section>

   
    <section class="comentarios">
        <div class="comentarios-content-title">
            <h4>Comentarios <?php echo $totalComentarios; ?></h4>
        </div>
        <div class="comentarios-form">
            <div class="comentarios-form-content">
                <div class="comentarios-form-content-header">
                <?php
                if(!empty($comentarios['comentador']['fotoPerfil'])){
                    ?>
                        <img src="<?php echo BASE_URL;?>assets/img/<?php echo $comentarios['comentador']['fotoPerfil'] ?>.jpg" alt="" width="35px" height="35px">
                    <?php
                }else{
                    ?>
                         <img src="<?php echo BASE_URL; ?>assets/img/blank-profile-picture-973460_1280.png" width="35px" height="35px" alt="">
                    <?php
                }
                ?>
                </div>
                <div class="comentarios-form-content-textarea">
                    <form action="" method="POST">
                        <textarea name="conteudo" id="" cols="60" rows="3"></textarea> <br>
                        <button type="submit">Comentar</button>
                    </form>
                </div>
            </div>
        </div>
        <hr>
  
            <?php foreach($comentarios_comentadores as $comentarios){
                $data_publicacao=$comentarios['comentario']['data_hora'];
                $timestamp_publicacao=strtotime($data_publicacao);
                $agora=time();
                $diferenca=$agora - $timestamp_publicacao;
                ?>

        <div class="comentarios-content">
            <div class="comentarios-content-header">
                <?php
                if(!empty($comentarios['comentador']['fotoPerfil'])){
                    ?>
                        <img src="<?php echo BASE_URL;?>assets/img/<?php echo $comentarios['comentador']['fotoPerfil'] ?>.jpg" alt="" width="35px" height="35px">
                    <?php
                }else{
                    ?>
                         <img src="<?php echo BASE_URL; ?>assets/img/blank-profile-picture-973460_1280.png" width="35px" height="35px" alt="">
                    <?php
                }
                ?>
                
                <p><?php echo $comentarios['comentador']['nome']; ?> 
                 <?php  
                if($diferenca < 60){
                    echo "Há menos de um minuto";
                }elseif($diferenca < 3600){
                    $minutos=floor($diferenca / 60);
                    echo "Há ".$minutos." minutos atrás";
                }elseif($diferenca < 86400){
                    $horas=floor($diferenca / 3600);
                    echo "Há ".$horas. " horas atrás";
                }else{
                    $dias=floor($diferenca / 86400);
                    echo "Há ".$dias." dias atrás";
                }
                ?></p>
            </div>
            <div class="comentarios-content-comentario">
                <p><?php echo $comentarios['comentario']['conteudo']; ?></p>
            </div>
            <?php 
            if(isset($_SESSION['cLogin'])){
                if($comentarios['comentador']['id_usuario']==$_SESSION['cLogin']){
                    ?>
                    <div class="comentarios-content-acoes">
                    <a href="<?php echo BASE_URL;?>publicacao/excluirComentarioArtigo/<?php echo $comentarios['comentario']['id_comentario']; ?>" class="excluir" onclick='return confirm("Deseja excluir este comentario?")'>Excluir</a>
                    </div>
                    <?php
                }
            }
            ?>
        </div>

        <hr>
                <?php
            } ?>
            


    </section>