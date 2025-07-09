<main>
        <header>
            <div class="criticas-fundo">
                <div class="criticas-title">
                    <h1 class="icon-blog">Minhas críticas</h1>
                </div>
            </div>
        
        </header>
        <section class="criticas-filmes">
            <div class="filmes-container">
               <?php
                if(!empty($filmeUsuarioCritica)){
                    
                    foreach($filmeUsuarioCritica as $filmes){
                        ?>
                        <div class="minhasCriticasContainer">
                        <div class="bx">
                             <a href="<?php echo BASE_URL;?>critica/abrirFilme/<?php echo $filmes['id_filme'];?>"><img src="<?php echo BASE_URL;?>assets/img/<?php echo $filmes['fotoFilme'];?>.jpg" alt=""></a>
                             <a href="<?php echo BASE_URL;?>critica/abrirFilme/<?php echo $filmes['id_filme'];?>">
                        <div class="content">
                            <h3><?php echo $filmes['titulo']; ?></h3>
                            <p><?php echo $filmes['genero']; ?></p>
                            <h6><span>HUB</span><i class="rating-icon">★</i> <?php echo $filmes['notaCritica']; ?></h6>
                        </div>
                             </a>
                        </div>
                          <div class="minhasNoticias-acao">
                        <div class="btn-editar-noticia"><button><a href="<?php echo BASE_URL; ?>critica/editarCritica/<?php echo $filmes['id_critica']; ?>">editar</a></button></div>
                        <div class="btn-excluir-noticia"><button><a href="<?php echo BASE_URL; ?>critica/excluirCritica/<?php echo $filmes['id_critica']; ?>" onclick='return confirm("Deseja excluir esta crítica?")'>excluir</a></button></div>
                    </div>
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
                          <a href="<?php echo BASE_URL; ?>critica/minhasCriticas?p=<?php echo $q; ?>"><?php echo $q; ?></a>
                        <?php
                    }
                    ?>
                  
                </div>
            </div>
        </section>
    </main>