<main>
        <header>
            <div class="noticias-fundo">
                <div class="noticias-fundo-title">
                    <h1 class="icon-blog">Notícias</h1>
                </div>
            </div>
        </header>
        <div class="noticias-header">
            <div class="noticias-header-content">
                <a href="<?php echo BASE_URL; ?>publicacao/abrirNoticia/<?php echo $noticias[0]['id_publicacao']; ?>">  <img src="<?php echo BASE_URL; ?>assets/img/<?php echo $noticias[0]['imagem']; ?>.jpg" alt="" width="580"></a>
                <h2 class="noticias-header-title"><a href="<?php echo BASE_URL; ?>publicacao/abrirNoticia/<?php echo $noticias[0]['id_publicacao']; ?>"><?php echo $noticias[0]['titulo']; ?></a></h2>
            </div>
            <div class="noticias-header-content">
             <a href="<?php echo BASE_URL; ?>publicacao/abrirNoticia/<?php echo $noticias[1]['id_publicacao']; ?>"><img src="<?php echo BASE_URL; ?>assets/img/<?php echo $noticias[1]['imagem']; ?>.jpg" alt="" width="580"></a>
                <h2 class="noticias-header-title"><a href="<?php echo BASE_URL; ?>publicacao/abrirNoticia/<?php echo $noticias[1]['id_publicacao']; ?>"><?php echo $noticias[1]['titulo']; ?></a></h2>
            </div>
        </div>

        <section class="section-noticias">
            <div class="noticias-section-container">
                <div class="main-news-articles">
                    <?php foreach($noticias as $noticia){
                        ?>
                     <article class="notice-default">
                        <a href="<?php echo BASE_URL; ?>publicacao/abrirNoticia/<?php echo $noticia['id_publicacao']; ?>">
                            <img src="<?php echo BASE_URL; ?>assets/img/<?php echo $noticia['imagem'] ?>.jpg" width="250" alt="Imagem post" title="Imagem Post">
                        </a>
                        <h2><a href="<?php echo BASE_URL; ?>publicacao/abrirNoticia/<?php echo $noticia['id_publicacao']; ?>" class="title"><?php echo $noticia['titulo']; ?></a></h2>
                     </article>

                        <?php
                    } ?>
                </div>
            </div>
        </section>
        <section>
            <div class="pagination">
                <div class="pagination-numbers">
                    <?php
                    for($q=1;$q<=$totalPaginas;$q++){
                        ?>
                          <a href="<?php echo BASE_URL; ?>publicacao/noticias?p=<?php echo $q; ?>"><?php echo $q; ?></a>
                        <?php
                    }
                    ?>
                  
                </div>
            </div>
        </section>
    </main>