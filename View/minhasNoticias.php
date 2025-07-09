    <main>
            <div class="minhasNoticiasContainer">
                <div class="minhasNoticiasTitle">
                    <h1>Minhas notícias</h1>
                </div>
                <section class="section-MinhasNoticias">
                    <div class="MinhasNoticias-section-container">
                        <div class="main-news-articles">
                            <?php  
                            if(!empty($minhasNoticias)){
                            foreach($minhasNoticias as $noticias){
                                ?>
                            <article class="notice-default">
                                <a href="#">
                                    <img src="<?php echo BASE_URL; ?>assets/img/<?php echo $noticias['imagem']; ?>.jpg" width="250" alt="Imagem post" title="Imagem Post">
                                </a>
                                <h2><a href="" class="title"><?php echo $noticias['titulo']; ?></a></h2>
                                        <div class="minhasNoticias-acao">
                                            <div class="btn-editar-noticia"><button><a href="<?php echo BASE_URL; ?>publicacao/editarNoticia/<?php echo $noticias['id_publicacao'] ?>">editar</a></button></div>
                                            <div class="btn-excluir-noticia"><button><a href="<?php echo BASE_URL; ?>publicacao/excluirNoticia/<?php echo $noticias['id_publicacao'] ?>" onclick='return confirm("Deseja excluir esta noticia?")'>excluir</a></button></div>
                                        </div>
                            </article>
                                <?php
                            }
                        }
                            ?>
                          
                        </div>
                    </div>
                </section>
                <section>
            <div class="pagination">
                <div class="pagination-numbers">
                <?php
                    for($q=1;$q<=$totalPaginas;$q++){
                        ?>
                          <a href="<?php echo BASE_URL; ?>publicacao/minhasNoticias?p=<?php echo $q; ?>"><?php echo $q; ?></a>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </section>
            </div>
    </main>