
    <main>
        <header>
            <div class="noticia-principal">
                <div class="noticia-fundo-h1">
                    <h1 class="icon-blog">Artigos</h1>
                </div>
                <div class="noticia-fundo">
                    <div class="noticia-fundo-img">
                       <a href="<?php echo BASE_URL; ?>publicacao/abrirArtigo/<?php echo $artigos[0]['id_publicacao']; ?>"><img src="<?php echo BASE_URL; ?>assets/img/<?php echo $artigos[0]['imagem']; ?>.jpg" alt="" width="800"></a>
                        <h2 class="noticia-fundo-title"><a href="<?php echo BASE_URL; ?>publicacao/abrirArtigo/<?php echo $artigos[0]['id_publicacao']; ?>"><?php echo $artigos[0]['titulo']; ?></a></h2>
                    </div>
                </div>
            </div>
        </header>
        <section class="main-articles">
            <div class="principal-articles">
                <?php foreach($artigos as $artigo){
                    ?>  
                    <article class="principal-articles-article">
                        <a href="<?php echo BASE_URL; ?>publicacao/abrirArtigo/<?php echo $artigo['id_publicacao']; ?>">
                          <img src="<?php echo BASE_URL; ?>assets/img/<?php echo $artigo['imagem'] ?>.jpg" width="250" alt="Imagem post" title="Imagem Post">
                         </a>
                     <h2><a href="" class="title"><?php echo $artigo['titulo']; ?></a></h2>
                     </article>
                    <?php
                } ?>
            </div>
        </section>
        <section>
            <div class="pagination">
                <div class="pagination-numbers">
                <?php
                    for($q=1;$q<=$totalPaginas;$q++){
                        ?>
                          <a href="<?php echo BASE_URL; ?>publicacao/artigos?p=<?php echo $q; ?>"><?php echo $q; ?></a>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </section>
    </main>