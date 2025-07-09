<main>
<header>
            <div class="criticas-fundo">
                <div class="criticas-title">
                    <h1 class="icon-blog">Criticas</h1>
                </div>
            </div>
                <div class="critica-capa">
                    <img src="<?php echo BASE_URL;?>assets/img/peakpx.jpg" alt="">
                    <div class="form-critica">
                        <form action="" method="GET">
                            <input type="text" placeholder="Pesquisar um filme" name="filme">
                            <button type="submit">
                                <p>Pesquisar</p>
                            </button>
                        </form>
                    </div>
                </div>
               
            
        </header>
        <section class="criticas-filmes">
            <div class="filmes-container">
                <?php
                if(!empty($listaFilmes)){
                    foreach($listaFilmes as $filmes){
                        ?>
                        <div class="bx">
                             <a href="<?php echo BASE_URL;?>critica/abrirFilme/<?php echo $filmes['id_filme'];?>"><img src="<?php echo BASE_URL;?>assets/img/<?php echo $filmes['fotoFilme'];?>.jpg" alt=""></a>
                             <a href="<?php echo BASE_URL;?>critica/abrirFilme/<?php echo $filmes['id_filme'];?>">
                        <div class="content">
                            <h3><?php echo $filmes['titulo']; ?></h3>
                            <p><?php echo $filmes['genero']; ?></p>
                            <h6><span>HUB</span><i class="rating-icon">★</i>
                            <?php if(!empty($filmes['nota']) || $filmes['nota'] !=''){
                                echo $filmes['nota'];
                            }else{
                                echo "0.0";
                            }
                                 ?></h6>
                        </div>
                             </a>
                        </div>
                        <?php
                    }
                    }
                ?>
               
                
            </div>
        </section>
        <section>
        <div class="pagination">
                <div class="pagination-numbers">
                    <?php
                    for($q=1;$q<=$totalPaginas;$q++){
                        ?>
                          <a href="<?php echo BASE_URL; ?>critica?p=<?php echo $q; ?>"><?php echo $q; ?></a>
                        <?php
                    }
                    ?>
                  
                </div>
            </div>
        </section>
    </main>