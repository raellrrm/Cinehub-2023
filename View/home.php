
 <main class="main">
        <section class="last-news">
            <header class="last-news-header">
                <h1 class="icon-blog">Ultimas notícias</h1>
            </header>
                <?php  foreach($ultimasNoticias as $lastNews){
                ?>
                    <article>
                          <h2><a href="<?php echo BASE_URL;?>publicacao/abrirNoticia/<?php echo $lastNews['id_publicacao']; ?>" class="title"><?php echo $lastNews['titulo']; ?></a></h2>
                            <a href="<?php echo BASE_URL;?>publicacao/abrirNoticia/<?php echo $lastNews['id_publicacao']; ?>"><img src="<?php echo BASE_URL; ?>assets/img/<?php echo $lastNews['imagem']; ?>.jpg" width="135"  alt="Imagem post" title="Imagem Post"></a>
                    </article>
                    <div class="last-news-hr">
                       <hr>
                   </div>
                <?php
            } ?>
          
           
        

        </section>

        <section class="main-news">
            <div class="main-news-articles">
                <article class="notice-default">
                    <a href="<?php echo BASE_URL; ?>publicacao/abrirNoticia/<?php echo $noticiasHome[0]['id_publicacao'];  ?>">
                        <img src="<?php echo BASE_URL; ?>assets/img/<?php echo $noticiasHome[0]['imagem']; ?>.jpg" width="250" alt="Imagem post" title="Imagem Post">
                    </a>
                    <h2><a href="<?php echo BASE_URL; ?>publicacao/abrirNoticia/<?php echo $noticiasHome[0]['id_publicacao'];  ?>" class="title"><?php echo $noticiasHome[0]['titulo']; ?></a></h2>
                </article>

                <article class="notice-big">
                    <a href="<?php echo BASE_URL; ?>publicacao/abrirNoticia/<?php echo $noticiasHome[1]['id_publicacao'];  ?>">
                        <img src="<?php echo BASE_URL; ?>assets/img/<?php echo $noticiasHome[1]['imagem']; ?>.jpg" width="600" alt="Imagem post" title="Imagem Post">
                    </a>
                    <h2 class="texto"><a href="<?php echo BASE_URL; ?>publicacao/abrirNoticia/<?php echo $noticiasHome[1]['id_publicacao'];  ?>" class="title"><?php echo $noticiasHome[1]['titulo']; ?></a></h2>
                </article>

                <article class="notice-default">
                    <a href="<?php echo BASE_URL; ?>publicacao/abrirNoticia/<?php echo $noticiasHome[2]['id_publicacao'];  ?>">
                        <img src="<?php echo BASE_URL; ?>assets/img/<?php echo $noticiasHome[2]['imagem']; ?>.jpg" width="250" alt="Imagem post" title="Imagem Post">
                    </a>
                    <h2><a href="<?php echo BASE_URL; ?>publicacao/abrirNoticia/<?php echo $noticiasHome[2]['id_publicacao'];  ?>" class="title"><?php echo $noticiasHome[2]['titulo']; ?></a></h2>
                </article>


                <article class="notice-default">
                    <a href="<?php echo BASE_URL; ?>publicacao/abrirNoticia/<?php echo $noticiasHome[3]['id_publicacao'];  ?>">
                        <img src="<?php echo BASE_URL; ?>assets/img/<?php echo $noticiasHome[3]['imagem']; ?>.jpg" width="250" alt="Imagem post" title="Imagem Post">
                    </a>
                    <h2><a href="<?php echo BASE_URL; ?>publicacao/abrirNoticia/<?php echo $noticiasHome[3]['id_publicacao'];  ?>" class="title"><?php echo $noticiasHome[3]['titulo']; ?></a></h2>
                </article>


                <article class="notice-default">
                    <a href="<?php echo BASE_URL; ?>publicacao/abrirNoticia/<?php echo $noticiasHome[4]['id_publicacao'];  ?>">
                        <img src="<?php echo BASE_URL; ?>assets/img/<?php echo $noticiasHome[4]['imagem']; ?>.jpg" width="250" alt="Imagem post" title="Imagem Post">
                    </a>
                    <h2><a href="<?php echo BASE_URL; ?>publicacao/abrirNoticia/<?php echo $noticiasHome[4]['id_publicacao'];  ?>" class="title"><?php echo $noticiasHome[4]['titulo']; ?></a></h2>
                </article>

                <article class="notice-big">
                    <a href="<?php echo BASE_URL; ?>publicacao/abrirNoticia/<?php echo $noticiasHome[5]['id_publicacao'];  ?>">
                        <img src="<?php echo BASE_URL; ?>assets/img/<?php echo $noticiasHome[5]['imagem']; ?>.jpg" width="600" alt="Imagem post" title="Imagem Post">
                    </a>
                    <h2 class="texto"><a href="<?php echo BASE_URL; ?>publicacao/abrirNoticia/<?php echo $noticiasHome[5]['id_publicacao'];  ?>" class="title"><?php echo $noticiasHome[5]['titulo']; ?></a></h2>
                </article>

                <article class="notice-default">
                    <a href="<?php echo BASE_URL; ?>publicacao/abrirNoticia/<?php echo $noticiasHome[6]['id_publicacao'];  ?>">
                        <img src="<?php echo BASE_URL; ?>assets/img/<?php echo $noticiasHome[6]['imagem']; ?>.jpg" width="250" alt="Imagem post" title="Imagem Post">
                    </a>
                    <h2><a href="<?php echo BASE_URL; ?>publicacao/abrirNoticia/<?php echo $noticiasHome[6]['id_publicacao'];  ?>" class="title"><?php echo $noticiasHome[6]['titulo']; ?></a></h2>
                </article>

               
                <article class="notice-default">
                    <a href="<?php echo BASE_URL; ?>publicacao/abrirNoticia/<?php echo $noticiasHome[7]['id_publicacao'];  ?>">
                        <img src="<?php echo BASE_URL; ?>assets/img/<?php echo $noticiasHome[7]['imagem']; ?>.jpg" width="250" alt="Imagem post" title="Imagem Post">
                    </a>
                    <h2><a href="<?php echo BASE_URL; ?>publicacao/abrirNoticia/<?php echo $noticiasHome[7]['id_publicacao'];  ?>" class="title"><?php echo $noticiasHome[7]['titulo']; ?>.</a></h2>
                </article>

                <article class="notice-default">
                    <a href="<?php echo BASE_URL; ?>publicacao/abrirNoticia/<?php echo $noticiasHome[8]['id_publicacao'];  ?>">
                        <img src="<?php echo BASE_URL; ?>assets/img/<?php echo $noticiasHome[8]['imagem']; ?>.jpg" width="250" alt="Imagem post" title="Imagem Post">
                    </a>
                    <h2><a href="<?php echo BASE_URL; ?>publicacao/abrirNoticia/<?php echo $noticiasHome[8]['id_publicacao'];  ?>" class="title"><?php echo $noticiasHome[8]['titulo']; ?></a></h2>
                </article>

                <article class="notice-default">
                    <a href="<?php echo BASE_URL; ?>publicacao/abrirNoticia/<?php echo $noticiasHome[9]['id_publicacao'];  ?>">
                        <img src="<?php echo BASE_URL; ?>assets/img/<?php echo $noticiasHome[9]['imagem']; ?>.jpg" width="250" alt="Imagem post" title="Imagem Post">
                    </a>
                    <h2><a href="<?php echo BASE_URL; ?>publicacao/abrirNoticia/<?php echo $noticiasHome[9]['id_publicacao'];  ?>" class="title"><?php echo $noticiasHome[9]['titulo']; ?></a></h2>
                </article>

            </div>
        </section>


    </main>

    <section class="main-articles">
        <header class="principal-articles-header">
            <h1 class="icon-blog">Principais artigos</h1>
        </header>
        <div class="principal-articles">
            <?php foreach($artigos as $artigo){
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
   
</body>

</html>