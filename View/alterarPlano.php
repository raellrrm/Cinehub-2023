<?php
if(isset($_GET['editar-perfil']) && $_GET['editar-perfil'] === 'true'){
    ?>
    <div class="success-message" style="background-color: #4CAF50; color:white; padding:10px; text-align: center; margin-bottom:10px; border-radius: 5px;">Perfil editado com sucesso!</div> 
    <style>
        .success-message::before{
            cotent: "";
            position: absolute;
            top:-10;
            left:50%;
            margin-left:-10px;
            border-width:10px;
            border-style:solid;
            border-color:transparent transparent #4CAF50 transparent;
        }
    </style>
    <?php
}
?>
    <main>
        <section class="perfil-container">
            <div class="perfil-header">
                <img src="<?php echo BASE_URL; ?>assets/img/LOGO PNG_adobe_express.png" alt="" width="200" height="200">
            </div>
            <div class="perfil-foto">
                <?php 
                if(isset($info['fotoPerfil'])){
                ?>
                 <img src="<?php echo BASE_URL; ?>assets/img/<?php echo $info['fotoPerfil']; ?>.jpg" alt="" width="200px" height="200px">
                <?php
                }else{
                    ?>
                 <img src="<?php echo BASE_URL; ?>assets/img/post.jpg" alt="" width="200px" height="200px">
                    <?php
                }
                
                ?>
               
            </div>
            <div class="perfil-dados">
                <p><?php echo $info['nome']; ?> <?php echo $info['sobrenome']; ?></p>
                <p class="tipo"><?php echo $info['tipoUsuario']; ?></p>
            </div>
            <hr>
            <div class="perfil-menu">
                <hr>
                <a href="<?php echo BASE_URL; ?>perfil">Meu perfil</a>
                <?php 
                if($info['tipoUsuario']=="publicador"){
                    ?>
                     <a href="<?php echo BASE_URL; ?>perfil/minhasPublicacoes">Minhas publicaçoes</a>
                     <a href="<?php echo BASE_URL; ?>perfil/meuPlano">Meu plano</a>
                    <?php
                }elseif($info['tipoUsuario']=="administrador"){
                    ?>
                    <a href="<?php echo BASE_URL; ?>admin/listarUsuarios">Usuarios</a>
                    <?php
                }if($info['tipoUsuario']=="administrador"){
                    ?>
                    <a href="<?php echo BASE_URL; ?>critica/cadastrarFilmes">Cadastrar Filme</a>
                    <a href="<?php echo BASE_URL; ?>critica/filmes">Ver filmes</a>
                    <?php
                }
                ?>
                <hr>
            </div>
            <hr>
            <div class="assinatura-container">
    <div class="wrapper">
      <div class="table basic">
        <div class="price-section">
          <div class="price-area">
            <div class="inner-area">
              <span class="text">$</span>
              <span class="price">29</span>
            </div>
          </div>
        </div>
        <div class="package-name"></div>
        <ul class="features">
          <li>
            <span class="list-name">Acesso a conteudos exclusivos</span>
            <span class="icon check"><i class="fas fa-check"></i></span>
          </li>
          <li>
            <span class="list-name">Cupons de desconto e vale pipoca em cinemas</span>
            <span class="icon check"><i class="fas fa-check"></i></span>
          </li>
          <li>
            <span class="list-name">10 publicações mensais(publicador)</span>
            <span class="icon cross"><i class="fas fa-times"></i></span>
          </li>
        </ul>
        <div class="btn-assinar"><a href="<?php echo BASE_URL; ?>pagamento/planoBasic"><button>Assinar</button></a></div>
      </div>
      <div class="table premium">
        <div class="ribbon"><span>Recomendado</span></div>
        <div class="price-section">
          <div class="price-area">
            <div class="inner-area">
              <span class="text">$</span>
              <span class="price">59</span>
            </div>
          </div>
        </div>
        <div class="package-name"></div>
        <ul class="features">
          <li>
            <span class="list-name">Acesso a conteudos exclusivos</span>
            <span class="icon check"><i class="fas fa-check"></i></span>
          </li>
          <li>
            <span class="list-name">Cupons de desconto e vale pipoca em cinemas</span>
            <span class="icon check"><i class="fas fa-check"></i></span>
          </li>
          <li>
            <span class="list-name">Suporte 12h</span>
            <span class="icon check"><i class="fas fa-check"></i></span>
          </li>
          <li>
            <span class="list-name">25 publicações mensais(publicador)</span>
            <span class="icon cross"><i class="fas fa-times"></i></span>
          </li>
        </ul>
        <div class="btn-assinar"><a href="<?php echo BASE_URL; ?>pagamento/planoPremium"><button>Assinar</button></a></div>
      </div>
      <div class="table ultimate">
        <div class="price-section">
          <div class="price-area">
            <div class="inner-area">
              <span class="text">$</span>
              <span class="price">99</span>
            </div>
          </div>
        </div>
        <div class="package-name"></div>
        <ul class="features">
          <li>
            <span class="list-name">Acesso a conteudos exclusivos</span>
            <span class="icon check"><i class="fas fa-check"></i></span>
          </li>
          <li>
            <span class="list-name">Cupons de desconto e vale pipoca em cinemas</span>
            <span class="icon check"><i class="fas fa-check"></i></span>
          </li>
          <li>
            <span class="list-name">Suporte 24h</span>
            <span class="icon check"><i class="fas fa-check"></i></span>
          </li>
          <li>
            <span class="list-name">50 publicações mensais(publicador)</span>
            <span class="icon check"><i class="fas fa-check"></i></span>
          </li>
        </ul>
        <div class="btn-assinar"><a href="<?php echo BASE_URL; ?>pagamento/planoUltimate"><button>Assinar</button></a></div>
      </div>
    </div>
  </div>
 
        </section>
    </main>