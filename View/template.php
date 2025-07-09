<!DOCTYPE html>
<html lang="en">
<head>

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300;400;500&display=swap" rel="stylesheet">
    <link href="<?php echo BASE_URL; ?>assets/css/boot.css" rel="stylesheet">
    <link href="<?php echo BASE_URL; ?>assets/css/fonticon.css" rel="stylesheet">
    <link href="<?php echo BASE_URL; ?>assets/css/tailwindcss-colors.css" rel="stylesheet">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/style.css">
    <title>Cinehub</title>
</head>
<body>
    <nav class="navbar">
        <div class="logo">
            <a href="<?php echo BASE_URL; ?>"><img src="<?php echo BASE_URL; ?>assets/img/LOGO PNG_adobe_express.png" alt="logo" width="115px"></a>
        </div>
        <div class="menu">
            <a href="<?php echo BASE_URL; ?>">Home</a>
            <a href="<?php echo BASE_URL ?>home/sobreNos">Sobre Nós</a>
            <?php if(isset($_SESSION['cLogin'])){
                ?>
                 <a id="botao" href="<?php echo BASE_URL; ?>logar/sair" class="" onclick='return confirm("Deseja sair?")'>Sair</a>
                 <?php
            }else{
                ?>
                 <a id="botao" href="<?php echo BASE_URL; ?>logar" class="">Login/Cadastrar</a>
                <?php
            }
             ?>
        </div>
        <div class="navbar-extend">
            <div class="social-media">
                <a href="<?php echo BASE_URL;?>publicacao/noticias" class="icon-blog">Noticias</a>
                <a href="<?php echo BASE_URL;?>publicacao/artigos" class="icon-blog">Artigos</a>
                <a href="<?php echo BASE_URL;?>critica" class="icon-blog">Críticas</a>
            </div>
            <?php if(isset($_SESSION['cLogin'])){ 
                $usuarios=new Usuarios();
                $info=$usuarios->getInfo();
                ?>
            <div class="search-navbar">
                <div class="user-info">
                    <?php
                    if(!empty($info['fotoPerfil'])){
                    ?>
                    <img src="<?php echo BASE_URL;?>assets/img/<?php echo $info['fotoPerfil']; ?>.jpg" alt="" width="40px" height="40px">
                    <?php
                    }else{
                        ?>
                    <img src="<?php echo BASE_URL; ?>assets/img/blank-profile-picture-973460_1280.png" width="50px" height="50px" alt="">
                        <?php
                    }
                    ?>
                   <a href="<?php echo BASE_URL; ?>perfil"><?php echo $info['nome']; ?></a>
                </div>
            </div>
            <?php } ?>
        </div>
    </nav>

    <?php $this->loadViewInTemplate($viewName,$viewData); ?>

    <footer>
        <div id="footer_content">
            <div id="footer_contacts">
                <h1>CINEHUB</h1>
                <p>Seu site de notícias do cinema</p>
                <div id="footer_social_media">
                    <a href="#" class="footer_link" id="instagram">
                        <i class="fa-brands fa-instagram"></i>
                    </a>
                    <a href="#" class="footer_link" id="facebook">
                        <i class="fa-brands fa-facebook-f"></i>
                    </a>
                    <a href="#" class="footer_link" id="twitter">
                        <i class="fa-brands fa-x-twitter" style="color:#000"></i>
                    </a>
                </div>
            </div>
            <ul class="footer-list">
                <li>
                    <h3>Blog</h3>
                </li>
                <li>
                    <a href="" class="footer-link">Tech</a>
                </li>
                <li>
                    <a href="" class="footer-link">Suporte</a>
                </li>
                <li>
                    <a href="" class="footer-link">Parcerias</a>
                </li>
            </ul>

            <ul class="footer-list">
                <li>
                    <h3>Products</h3>
                </li>
                <li>
                    <a href="" class="footer-link">App</a>
                </li>
                <li>
                    <a href="" class="footer-link">Desktop</a>
                </li>
                <li>
                    <a href="" class="footer-link">Cloud</a>
                </li>
            </ul>

            <div id="footer_subscribe">
                <h3>Subscribe</h3>
                <p>Contate-nos</p>

                <div id="input_group">
                    <input type="email" id="email">
                    <button>
                        <i class="fa-regular fa-envelope"></i>
                    </button>
                </div>
            </div>
        </div>
        <div id="footer_copyright">
            &#169
            2023 todos os direitos reservados
        </div>
    </footer>
</body>

</html>