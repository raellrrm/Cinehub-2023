
<main>
    <header>
            <div class="noticia-principal">
                <div class="noticia-fundo-h1">
                    <h1 class="">Artigos</h1>
                </div>
            </div>
        </header>
    <section class="main-articles">
            <div class="principal-articles">
                <?php
                foreach($artigosAdm as $artigos){
                    ?>
                     <article class="principal-meus-articles-article">
                         <a href="#">
                           <img src="<?php echo BASE_URL; ?>assets/img/<?php echo $artigos['imagem']; ?>.jpg" width="250" alt="Imagem post" title="Imagem Post">
                         </a>
                         <h2><a href="" class="title"><?php echo $artigos['titulo']; ?></a></h2>
                        <div class="minhasNoticias-acao">
                             <div class="btn-excluir-noticia"><button><a href="<?php echo BASE_URL; ?>admin/excluirArtigo/<?php echo $artigos['id_publicacao'] ?>" onclick='return confirm("Deseja excluir este artigo?")'>excluir</a></button></div>
                        </div>
                    </article>
                    <?php
                }
                ?>
              
        </section>
        <section>
        <div class="pagination">
                <div class="pagination-numbers">
                <?php
                    for($q=1;$q<=$totalPaginas;$q++){
                        ?>
                          <a href="<?php echo BASE_URL; ?>admin/artigosAdm?p=<?php echo $q; ?>"><?php echo $q; ?></a>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </section>
        </div>
    </main>
