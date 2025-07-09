
<main class="main">
        <section class="last-news">
            <header class="last-news-header">
                <h1 class="icon-blog">Ultimas notícias</h1>
            </header>
                <?php  foreach($ultimasNoticias as $lastNews){
                ?>
                    <article>
                          <h2><a href="<?php echo BASE_URL; ?>publicacao/abrirNoticia/<?php echo $lastNews['id_publicacao']; ?>" class="title"><?php echo $lastNews['titulo']; ?></a></h2>
                            <a href="<?php echo BASE_URL; ?>publicacao/abrirNoticia/<?php echo $lastNews['id_publicacao']; ?>"><img src="<?php echo BASE_URL; ?>assets/img/<?php echo $lastNews['imagem']; ?>.jpg" width="135"  alt="Imagem post" title="Imagem Post"></a>
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
                    <h2><?php  echo $noticia['titulo']; ?></h2>
                </div>
                <div class="news-description">
                    <p><?php  echo $noticia['descricao']; ?></p>
                </div>
                <div class="news-img">
                    <img src="<?php  echo BASE_URL; ?>assets/img/<?php echo $noticia['imagem']; ?>.jpg" alt="">
                </div>

                <div class="news-paragraphs">
                    <?php  
                          $textoDoBanco=$noticia['conteudo'];
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
            <i>Noticia de: <strong><a href="#" style="color:#000;"><?php echo $publicador['nome']; ?> <?php echo $publicador['sobrenome'];?></a></strong> dia: <?php echo date("d-m-Y",strtotime($noticia['data_hora'])); ?></i>
        </div>
    </div>
    <section class="veja-mais-container">
        <div class="veja-mais-title">
            <h3>Veja mais</h3>
        </div>
        <div class="veja-mais-news">
            <?php  
            foreach($vejaMais as $noticia){
               ?>
                <article class="veja-mais-news-article">
                    <a href="<?php echo BASE_URL; ?>publicacao/abrirNoticia/<?php echo $noticia['id_publicacao']; ?>">
                         <img src="<?php echo BASE_URL; ?>assets/img/<?php echo $noticia['imagem']; ?>.jpg" width="250" alt="Imagem post" title="Imagem Post">
                    </a>
                    <h2><a href="<?php echo BASE_URL; ?>publicacao/abrirNoticia/<?php echo $noticia['id_publicacao']; ?>" class="title"><?php echo $noticia['titulo']; ?></a></h2>
                </article>
               <?php
            }
            ?>
        </div>
    </section>

    <section class="comentarios">
        <div class="comentarios-content-title">
            <h4>Comentarios <?php echo $totalComentarios; ?></h4>
        </div>
        <?php
        if(isset($_SESSION['cLogin'])){
           ?>
     <div class="comentarios-form">
            <div class="comentarios-form-content">
                <div class="comentarios-form-content-header">
                    <?php  
                    if(!empty($info['fotoPerfil'])){
                    ?>
                    <img src="<?php echo BASE_URL; ?>assets/img/<?php echo $info['fotoPerfil']; ?>.jpg" alt=""  width="35px" height="35px">
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
           <?php
        }
        ?>
       
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
                        <a href="<?php echo BASE_URL;?>publicacao/excluirComentarioNoticia/<?php echo $comentarios['comentario']['id_comentario']; ?>" class="excluir" onclick='return confirm("Deseja excluir este comentario?")'>Excluir</a>
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