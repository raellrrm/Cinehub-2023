
<header>
        <div class="filme-container">
            <img src="<?php echo BASE_URL; ?>assets/img/<?php echo $critica['fotoFundo']; ?>.jpg" alt="">
        </div>
        <section>
            <div class="filme-card">
                <div class="filme-img">
                    <img src="<?php echo BASE_URL; ?>assets/img/<?php echo $critica['fotoFilme']; ?>.jpg" alt="">
                </div>

                <div class="filme-info">
                    <div class="filme-info-specs">
                        <h1><?php echo $critica['titulo']; ?> <span>(<?php echo date('Y',strtotime($critica['dataLanc'])); ?>)</span></h1>
                        <div class="filme-dados">
                            <span><?php echo $critica['classificacao']; ?></span>
                            <p><?php echo $critica['genero']; ?></p>
                        </div>
                        <div class="content">
                            <h6><span>HUB</span><i class="rating-icon">★</i> <?php echo $critica['nota']; ?></h6>
                        </div>
                        <div class="filme-sinopse">
                            <h3>Sinopse</h3>
                            <p><?php echo $critica['sinopse']; ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </header>

    <main class="main">
    <section class="last-news">
            <header class="last-news-header">
                <h1 class="icon-blog">Ultimas críticas</h1>
            </header>
                <?php  foreach($ultimasCriticas as $lastCriticas){
                ?>
                    <article>
                          <h2><a href="<?php echo BASE_URL; ?>critica/abriFilme/<?php echo $lastCriticas['id_filme']; ?>" class="title"><?php echo $lastCriticas['titulo']; ?></a></h2>
                            <a href="<?php echo BASE_URL; ?>critica/abrirFilme/<?php echo $lastCriticas['id_filme']; ?>"><img src="<?php echo BASE_URL; ?>assets/img/<?php echo $lastCriticas['fotoFilme']; ?>.jpg" width="80"  alt="Imagem post" title="Imagem Post"></a>
                    </article>
                    <div class="last-news-hr">
                       <hr>
                   </div>
                <?php
            } ?>
          
           
        

        </section>
       
        <section class="news-container">
            <div class="news-content">
                <div class="news-paragraphs">
                    <?php  
                          $textoDoBanco=$critica['conteudo'];
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
            <i>Critica de: <strong><?php echo $critica['nomeUsuario']; ?> <?php echo $critica['sNomeUsuario']; ?></strong> dia: <?php echo date('d/m/Y', strtotime($critica['data_hora'])); ?></i>
        </div>
    </div>

    
    <section class="criticas-filmes">
    <div class="veja-mais-title">
            <h3>Veja mais</h3>
        </div>
            <div class="filmes-container">
                
                <?php
                    foreach($criticasVejaMais as $vejaMais){
                        ?>
                        <div class="bx">
                             <a href="<?php echo BASE_URL;?>critica/abrirFilme/<?php echo $vejaMais['id_filme'];?>"><img src="<?php echo BASE_URL;?>assets/img/<?php echo $vejaMais['fotoFilme'];?>.jpg" alt=""></a>
                             <a href="<?php echo BASE_URL;?>critica/abrirFilme/<?php echo $vejaMais['id_filme'];?>">
                        <div class="content">
                            <h3><?php echo $vejaMais['titulo']; ?></h3>
                            <p><?php echo $vejaMais['genero']; ?></p>
                            <h6><span>HUB</span><i class="rating-icon">★</i> <?php 
                            if(!empty($vejaMais['nota']) || $vejaMais['nota']!=''){
                                echo $vejaMais['nota'];
                            }else{
                                echo "0.0";
                            }
                            ?>
                         </h6>
                        </div>
                             </a>
                        </div>
                        <?php
                    }
                ?>
               
                
            </div>
        </section>