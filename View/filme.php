<main>
        <header>
            <div class="filme-container">
                <img src="<?php echo BASE_URL; ?>assets/img/<?php echo $filme['fotoFundo']; ?>.jpg" alt="">
            </div>
            <section>
                <div class="filme-card">
                    <div class="filme-img">
                        <img src="<?php echo BASE_URL; ?>assets/img/<?php echo $filme['fotoFilme']; ?>.jpg" alt="">
                    </div>

                    <div class="filme-info">
                        <div class="filme-info-specs">
                            <h1><?php echo $filme['titulo']; ?> <span>(<?php echo date('Y', strtotime($filme['dataLanc'])); ?>)</span></h1>
                            <div class="filme-dados">
                                <span><?php echo $filme['classificacao']; ?></span>
                                <p><?php echo $filme['genero']; ?></p>
                            </div>
                            <div class="content">
                                <h6><span>HUB</span><i class="rating-icon"> ★</i>
                                    <?php
                                        if($filme['nota'] == '' || $filme['nota'] == 0){
                                            ?>
                                            0.0
                                            <?php
                                        }else{
                                            echo $filme['nota'];
                                        }
                                    ?>
                                </h6>
                            </div>
                            <div class="filme-sinopse">
                                <h3>Sinopse</h3>
                                <p><?php echo $filme['sinopse']; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        </header>

        <header>
            <div class="criticas-fundo">
                <div class="criticas-title">
                    <h1 class="icon-blog">Criticas deste filme</h1>
                </div>
            </div>            
        </header>

        <section class="criticas-filmes">
            <div class="filmes-container">
                <?php
                if(!empty($criticasFilme)){
                foreach($criticasFilme as $critica){
                    ?>
                    <div class="bx">
                      <a href="<?php echo BASE_URL ?>critica/abrirCritica/<?php echo $critica['id_critica']; ?>"><img src="<?php echo BASE_URL; ?>assets/img/<?php echo $critica['fotoFilme']; ?>.jpg" alt=""></a>
                      <a href="<?php echo BASE_URL ?>critica/abrirCritica/<?php echo $critica['id_critica']; ?>">
                        <div class="content">
                            <h3><?php echo $critica['titulo'];?></h3>
                            <p>Crítica de <?php echo $critica['nomeUsuario']." ".$critica['sNomeUsuario']; ?></p>
                            <h6><span>HUB</span><i class="rating-icon">★</i> <?php echo $critica['notaCritica']; ?></h6>
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
                          <a href="<?php echo BASE_URL; ?>critica/abrirFilme/<?php echo $id_filme; ?>?p=<?php echo $q; ?>"><?php echo $q; ?></a>
                        <?php
                    }
                    ?>
                  
                </div>
            </div>
        </section>

    </main>
