-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 02-Nov-2023 às 22:46
-- Versão do servidor: 5.7.26
-- versão do PHP: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projeto_cinehubv1`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `comentarios`
--

DROP TABLE IF EXISTS `comentarios`;
CREATE TABLE IF NOT EXISTS `comentarios` (
  `id_comentario` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `id_publicacao` int(11) NOT NULL,
  `conteudo` varchar(1000) CHARACTER SET utf8 NOT NULL,
  `data_hora` datetime NOT NULL,
  PRIMARY KEY (`id_comentario`)
) ENGINE=MyISAM AUTO_INCREMENT=48 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `comentarios`
--

INSERT INTO `comentarios` (`id_comentario`, `id_usuario`, `id_publicacao`, `conteudo`, `data_hora`) VALUES
(47, 17, 42, 'Bacana', '2023-10-30 21:54:47'),
(46, 17, 51, 'Ahhhh dadsds', '2023-10-30 17:46:53'),
(45, 17, 52, 'excellent', '2023-10-30 17:44:51'),
(44, 17, 52, 'Essa coisa Ã© legal ', '2023-10-30 17:44:35'),
(43, 11, 52, 'Slk legal', '2023-10-30 17:41:43'),
(42, 11, 52, 'Muito irado', '2023-10-30 17:41:26');

-- --------------------------------------------------------

--
-- Estrutura da tabela `critica`
--

DROP TABLE IF EXISTS `critica`;
CREATE TABLE IF NOT EXISTS `critica` (
  `id_critica` int(11) NOT NULL AUTO_INCREMENT,
  `conteudo` int(11) NOT NULL,
  `data_hora` datetime NOT NULL,
  `id_usuario` int(11) NOT NULL,
  PRIMARY KEY (`id_critica`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `endereco`
--

DROP TABLE IF EXISTS `endereco`;
CREATE TABLE IF NOT EXISTS `endereco` (
  `id_endereco` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `uf` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `cidade` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `rua` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `numero` int(11) NOT NULL,
  `cep` int(11) NOT NULL,
  PRIMARY KEY (`id_endereco`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `filmes`
--

DROP TABLE IF EXISTS `filmes`;
CREATE TABLE IF NOT EXISTS `filmes` (
  `id_filme` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `sinopse` varchar(2000) CHARACTER SET utf8mb4 NOT NULL,
  `classificacao` int(11) NOT NULL,
  `genero` varchar(1000) CHARACTER SET utf8mb4 NOT NULL,
  `nota` float DEFAULT NULL,
  `fotoFilme` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `fotoFundo` varchar(34) COLLATE utf8_unicode_ci NOT NULL,
  `id_critica` int(11) DEFAULT NULL,
  `dataLanc` date DEFAULT NULL,
  PRIMARY KEY (`id_filme`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `filmes`
--

INSERT INTO `filmes` (`id_filme`, `titulo`, `sinopse`, `classificacao`, `genero`, `nota`, `fotoFilme`, `fotoFundo`, `id_critica`, `dataLanc`) VALUES
(5, 'Filme', 'kclckvlcx', 14, 'AÃ§Ã£o,Aventura', NULL, '7a3b695eb01bae65e8aa6cadb5fbaffd', 'a84760af85e7afeaf796bcdd19a14a54', NULL, '2000-02-19');

-- --------------------------------------------------------

--
-- Estrutura da tabela `perfil`
--

DROP TABLE IF EXISTS `perfil`;
CREATE TABLE IF NOT EXISTS `perfil` (
  `id_perfil` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `tipoUsuario` tinyint(2) NOT NULL,
  PRIMARY KEY (`id_perfil`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `publicacao`
--

DROP TABLE IF EXISTS `publicacao`;
CREATE TABLE IF NOT EXISTS `publicacao` (
  `id_publicacao` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `titulo` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `descricao` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `conteudo` varchar(5000) COLLATE utf8_unicode_ci NOT NULL,
  `data_hora` datetime NOT NULL,
  `categoria` varchar(100) CHARACTER SET utf8 NOT NULL,
  `imagem` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id_publicacao`)
) ENGINE=MyISAM AUTO_INCREMENT=61 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `publicacao`
--

INSERT INTO `publicacao` (`id_publicacao`, `id_usuario`, `titulo`, `descricao`, `conteudo`, `data_hora`, `categoria`, `imagem`, `status`) VALUES
(42, 11, 'Primeira Noticia', 'primeiro', 'nada', '2023-10-29 01:31:16', 'noticia', 'a1b798473a771b4f78098bb3ce5811fd', 0),
(43, 11, 'o', 'k', 'd', '2023-10-29 01:34:13', 'artigo', '9a1003aac76b2efebffd4c0767f74fbc', 0),
(44, 11, 'Blade, da Marvel, serÃ¡ classificado para maiores', ' Afirma diretor Yann Demange diz que estÃ¡ animado para trabalhar com Mahershala Ali', 'Blade, novo filme da Marvel Studios, terÃ¡ classificaÃ§Ã£o etÃ¡ria para maiores de 18 anos. A informaÃ§Ã£o foi compartilhada pelo diretor Yann Demange (Lovecraft Country), em entrevista concedida ao Deadline.\r\nSegundo Demange, ele recebeu autorizaÃ§Ã£o para fazer o filme para maiores. \"Eles e deram [a classificaÃ§Ã£o] R, o que Ã© muito importante. Para Blade, vamos nos divertir porque Mahershala Ã© um ator muito profundo. Estou animado para mostrar o tipo de crueldade e dureza que ele tem, que permite a ele ser do jeito que ele Ã©. Eu o amo por isso. Ele Ã© digno e Ã­ntegro, mas Ã© feroz de uma forma que ele nÃ£o mostra muito. Quero fazÃª-lo soltar isso e colocar nas telas.\"\r\nRecentemente, foram reveladas turbulÃªncias no desenvolvimento de Blade no estÃºdio presidido por Kevin Feige. Segundo a Variety, o filme teria passado por reformulaÃ§Ãµes do roteiro e cortes de orÃ§amento, que ameaÃ§aram a permanÃªncia do protagonista.\r\nAlÃ©m de Ali no papel tÃ­tulo, Blade contarÃ¡ com Mia Goth (Pearl) no elenco. ApÃ³s diversos adiamentos, a estreia estÃ¡ marcada para 14 de fevereiro de 2025.', '2023-10-30 09:33:27', 'noticia', '8d3f8cdd0eb3c57615f0c6d7265c5e80', 0),
(45, 11, 'Five Nights at FreddyÂ´s segue no topo da bilheteria no brasil', 'Taylor Swift estreia em segundo lugar no pÃ¡is', 'Five Nights at FreddyÂ´s - O Pesadelo Sem Fim - que atingiu o marco de filme de terror mais bem-sucedido de 2023 durante o final de semana segue conquistando o pÃºblico tambÃ©m do Brasil, onde permaneceu lÃ­der de arrecadaÃ§Ãµes. Nos Ãºltimos dias, a adaptaÃ§Ã£o do videogame fez mais de R$ 12,6 milhÃµes e soma agora um total de R$ 38,6 no paÃ­s.\r\nEm segundo ligar ficou a estreia do filme-concerto de Taylor Swift, The Eras Tour, que arrecadou R$ 4,9 milhÃµes em seu primeiro final de semana. O lanÃ§amento empurrou Trolls 3-Juntos Novamente para o terceiro lugar, que com R$3,9 milhÃµes agora totaliza R$ 21,8 de arrecadaÃ§Ã£o.', '2023-10-30 09:44:45', 'noticia', '897768cd66917f8854258eab951192ef', 0),
(46, 11, 'Stranger Things Day: Netflix lanÃ§a trailer em aquecimento para amanhÃ£, dia 6', 'Quinto ano da sÃ©rie ainda nÃ£o tem nem data de lanÃ§amento prevista', 'A Netflix divulgou dia 5 um trailer em aquecimento para o Stranger Things Day, data comemorativa da sÃ©rie que acontece dia 6 de novembro. A data Ã© celebrada todo ano por marcar o dia em que, na sÃ©rie, Will Byers (Noah Schnapp) desapareceu na primeira temporada. Confira: A prÃ©via da Netflix aquece para uma celebraÃ§Ã£o mas nÃ£o dÃ¡ detalhes de possÃ­veis anÃºncios. O dia 6, no entanto, marca tambÃ©m o inÃ­cio da Geeked Week, semana em que a Netflix promete notÃ­cias, prÃ©vias, segredos os bastidores, anÃºncio de produtos e muito mais. A Netflix Brasil divulgou tambÃ©m um cartaz da data:\r\nAs quatro temporadas jÃ¡ lanÃ§adas de Stranger Things estÃ£o disponÃ­veis para streaming na Netflix. O quinto e Ãºltimo ano da sÃ©rie ainda nÃ£o tem data de estreia anunciada.\r\n[Entrevista]  De Kate Bush a \"Chrissy Wake Up\": atores analisam a trilha de Stranger Things, LanÃ§ada em dois Volumes, a temporada mais recente de Stranger Things foi a mais longa atÃ© agora, somando 13 horas de conteÃºdo. Sua duraÃ§Ã£o, aliada a despedidas doloridas e cenas musicais marcantes, fez com quea sÃ©rie se tornasse o tÃ­tulo em inglÃªs mais assistido da Netflix. ', '2023-10-30 10:28:25', 'noticia', 'fc18ab9dab713548d2e4eda6a53f8377', 0),
(47, 11, 'Morre Evan Ellingson, ator de CSI: Miami e 24 Horas, aos 35 anos', 'No cinema, ele foi o filho de Cameron Diaz no drama Uma Prova de Amor ', 'O ator Evan Ellingson, que durante a infÃ¢ncia e adolescÃªncia marcou papÃ©is em sÃ©ries como CSI: Miami e 24 Horas, morreu aos 35 anos. A notÃ­cia foi confirmada ao TMZ pelo pai do ator, sem citar a causa da morte.\r\nOs fÃ£s de CSI: Miami se lembrarÃ£o de Ellingson como Kyle Harmon, filho do protagonista Horatio Crane (David Caruso) e Julia WInston (Elisabeth Nerkley). O personagem apareceu em 19 episÃ³dios entre a 6Â° e 8Â° temporadas da sÃ©rie criminal.\r\nJÃ¡ os espectadores de 24 Horas viram Ellingson como Josh Bauer, sobrinho de Jack Bauer (Kiefer Sutherland), que se torna pivÃ´ de um drama familiar violento na 6Â° temporada da sÃ©rie, em 2007.\r\nEntre outros crÃ©ditos do ator, destaque para o drama Uma Prova de Amor (2009), onde interpretou o filho mais velho de Cameron Diaz, alÃ©m de episÃ³dios isolados de MadTV (2000-2002) e Bones (2005).\r\nEllingson se afastou das telas em 2010, para lidar com problemas pessoais, incluindo o vÃ­cio em drogas. O ator viveu em uma comunidade de ex-viciados nos Ãºltimos anos de sua vida, ajudando outros que passavam pelas mesmas dificuldades que ele.\r\n', '2023-10-30 10:42:26', 'noticia', 'e717188f21ad080d4dd6bfe70ffa030f', 0),
(48, 11, 'Morre Matthew Perry, o Chandler de Friends, aos 54 anos', 'NotÃ­cia foi dada pelo site TMZ; ator teria se afogado', 'Os fÃ£s de Friends estÃ£o em luto, Matthew Perry, que ficou mundialmente famoso por interpretar Chandler Bing por uma dÃ©cada, foi achado morto em sua casa, em Los Angeles, neste sÃ¡bado (28).\r\nDe acordo com o site TMZ, o artista de 54 anos foi encontrado em uma banheira com sinais de afogamento e nÃ£o havia sinais de consumo de drogas no local - Perry lutou contra a dependÃªncia quÃ­mica por grande parte de sua vida.\r\nAinda segundo a publicaÃ§Ã£o, o ator havia participado de uma partida de pickleball durante a manhÃ£ e, ao voltar para sua casa, pediu algo a seu assistente. O funcionÃ¡rio retornou cerca de duas horas depois e encontrou Perry jÃ¡ inconsciente. A polÃ­cia local nÃ£o trata a morte como crime. Janice de Friends, Maggie Wheeler homenageia Matthew Perry: \"Que perda\" Matthew Perry deixou marca em Friends.\r\nLembre 5 momentos inesquecÃ­veis do ator, produtor, roteirista e comendiante, Matthew Perry nasceu e 19 de agosto de 1969, em Williamstown, Massachusetts, Estados Unidos. Seu papel mais conhecido foi exatamente o de Chandler em Friends, que foi ao ar de 1994 a 2004. Perry comeÃ§ou sua carreira como ator em meados da dÃ©cada de 1980, aparecendo e vÃ¡rias produÃ§Ãµes teatrais e programas de televisÃ£o. \r\nEle ganhou reconhecimento em 1994, quando foi escalado para uma das sitcoms mais bem-sucedidas e amadas de todos os tempos. Seu desempenho como sarcÃ¡stico e engraÃ§ado Chandler lhe rendeu vÃ¡rias indicaÃ§Ãµes a prÃªmios e o transformou em uma estrela internacional. ApÃ³s o termino de Friends, Perry continuou a trabalhar na indÃºstria do entretenimento. Ele apareceu em vÃ¡rias sÃ©ries de televisÃ£o, incluindo Studio 60 on the Sunset Strip, The Good Wife e The Odd Couple. AlÃ©m da televisÃ£o, ele tambÃ©m atuou em filmes, como Meu Vizinho Mafioso e sua sequÃªncia. Perry ainda trabalhou como produtor e roteirista em algumas produÃ§Ãµes.\r\nUma de suas Ãºltimas apariÃ§Ãµes em uma produÃ§Ã£o audiovisual foi justamente no especial de reuniÃ£o de Friends, exibido em 2021 na HBO Max. Ele ainda chegou a gravar uma participaÃ§Ã£o no filme NÃ£o Olhe Para Cima, de Adam Mckay, mas sua cena nÃ£o entrou no corte final do longa. Ao longo dos anos, Perry lutou contra problemas pessoais, incluindo o vÃ­cio em drogas e Ã¡lcool, o que afetou sua carreira em certos perÃ­odos. Ele tambÃ©m usou suas experiÃªncias pessoais para ajudar outras pessoas, apoiando vÃ¡rias organizaÃ§Ãµes de caridade e fundando seu prÃ³prio centro de reabilitaÃ§Ã£o.\r\nO ator tambÃ©m sempre falou abertamente sobre suas prÃ³prias lutas, contribuindo para aumentar a conscientizaÃ§Ã£o sobre questÃµes de saÃºde mental. Em 2022, ele detalhou muitas de suas batalhas pessoais e sua auto biografia, intitulada Friends, Lovers and the Big Terrible Thing', '2023-10-30 15:30:21', 'noticia', '48556016e5665f8feaf6ff98ff82871a', 0),
(49, 11, 'Super Mario Bros. alcanÃ§a a 3Âª maior bilheteria de um filme animado da histÃ³ria', 'Longa bateu Os IncrÃ­veis 2 e estÃ¡ atrÃ¡s da dobradinha de Frozen', 'A famÃ­lia PÃªra de Os IncrÃ­veis nÃ£o conseguiu segurar o avanÃ§o dos irmÃ£os Mario na bilheteria das animaÃ§Ãµes. Os encanadores bigodudos de Super Mario Bros. alcanÃ§aram o terceiro lugar no ranking de maiores bilheterias de filmes animados, segundo o site The Numbers, que compila os dados.PorÃ©m, a briga de famÃ­lias segue, jÃ¡ que Mario e Luigi ainda nÃ£o conseguiram bater as irmÃ£s Elsa e Anna. Sendo assim, Frozen 2 e Frozen - Uma Aventura Congelante ficaram com o primeiro e segundo lugar, respectivamente.\r\nVale lembrar que Super Mario Bros. jÃ¡ Ã© o filme baseado em videogame mais lucrativo da histÃ³ria.Confira o top 5 bilheterias de filmes animados em bilhÃµes de dÃ³lares:Chris Pratt dÃ¡ voz ao Mario na animaÃ§Ã£o, que ainda tem Anya Taylor-Joy como a Princesa Peach, Charlie Day como Luigi, Seth Rogen como Donkey Kong, Jack Black como Bowser e Keegan-Michael Key como Toad.Super Mario Bro. O Filme tem produÃ§Ã£o da Illumination, estÃºdio responsÃ¡vel por Meu Malvado Favorito e Minions, e jÃ¡ estÃ¡ em cartaz nos cinemas brasileiros.', '2023-10-30 16:10:33', 'noticia', '37583365b05e0c341af0ffa2fd21bbb6', 0),
(50, 11, 'Jogos Vorazes | Astros da prequel ganham permissÃ£o para promover o filme', 'Longa chega aos cinemas em meados de novembro', 'Teremos a Rachel Zegler nos chamando para o cinema! Pelo menos Ã© o que definiu um acordo provisÃ³rio entre o SAG (sindicato dos atores de Hollywood) e os produtores de Jogos Vorazes: A Cantiga dos PÃ¡ssaros e da Serpentes. As informaÃ§Ãµes sÃ£o da Variety.Segundo a definiÃ§Ã£o, os astros do filme como Zegler, Tom Blyth, Viola Davis, Peter Dinklage e Hunter Schafer estÃ£o autorizados a promover o filme antes de sua estreia, em 17 de novembro. \r\nEssa serÃ¡ a primeira vez que um filme de um grande estÃºdio serÃ¡ promovido por atores durante a greve. O motivo para a liberaÃ§Ã£o repentina nÃ£o foi revelado.\r\n[subtitulo]Jogos Vorazes continua relevante?[/subtitulo]\r\nVale a pena ler A Cantiga dos PÃ¡ssaros e das Serpentes? Em A Cantiga dos PÃ¡ssaros e das Serpentes, cuja trama se passa dÃ©cadas antes dos eventos de Jogos Vorazes, veremos Lucy Gray Baird (Rachel Zegler) disputando os Jogos pelo empobrecido Distrito 12, tendo o jovem Snow (Blyth) como mentor.O numeroso elenco da prequel ainda inclui Peter Dinklage (Game of Thrones) como um professor de Snow, responsÃ¡vel por criar os Jogos anos antes do comeÃ§o da histÃ³ria; e Hunter Schaefer (Euphoria) como Tigris, a prima do futuro presidente de Panem.O filme serÃ¡ comandado por Francis Lawrence, responsÃ¡vel pela direÃ§Ã£o dos Ãºltimos trÃªs longas de Jogos Vorazes. O roteiro ficou com Michael Arndt (Em Chamas) e Michael Lesslie (The Little Drummer Girl).', '2023-10-30 16:13:41', 'noticia', 'd0426e80238a0fb3b636158df7300f7c', 0),
(51, 11, 'Greta Gerwig quer Kingsley Ben-Adir como James Bond no novo 007', 'Diretora trabalhou com o ator britÃ¢nico em Barbie', 'Greta Gerwig, diretora de Barbie, aposta em um de seus Kens do filme para assumir o papel de James Bond nos cinemas. Em entrevista a um podcast da Variety, a cineasta disse torcer por Kingsley Ben-Adir para ser o novo rosto da franquia 007.   \"Ele pode fazer qualquer coisa e Ã© um ator britÃ¢nico treinado e muito adequado. Ele consegue fazer a voz de [Laurence] Olivier, entÃ£o tivemos versÃµes em que ele se virou e era britÃ¢nico. Foi um daqueles momentos, quando ele se virou e fez aquela voz â€“ todo mundo ficou de queixo caÃ­do. Ele se tornou essa pessoa diferente\", contou Gerwig.\r\n\"Acho que na direÃ§Ã£o que dei a ele, eu disse algo como: \'Ascender ao trono\' e ele disse: \'Entendi\'. E ele se virou e subiu ao trono. Eu estava tipo: \'Levem isso para quem estÃ¡ fazendo Bond. Eles precisam disso imediatamente\'\", completou a diretora.\r\nAlÃ©m de atuar em Barbie, Ben-Adir tambÃ©m viveu o vilÃ£o Gravik em InvasÃ£o Secreta. Ele tambÃ©m Ã© o responsÃ¡vel por interpretar Bob Marley na cinebriografia One Love, que tem estreia marcada para 14 de fevereiro de 2024.\r\n', '2023-10-30 16:15:22', 'noticia', '4ca9ddb16a069ef2bca87ae529b4087e', 0),
(52, 11, 'Barbenheimer: ComÃ©dia de terror contarÃ¡ histÃ³ria de boneca cientista', 'Produtor e roteirista Charles Band busca tirar proveito do fenÃ´meno criado pelos dois filmes', 'Depois do fenÃ´meno de Barbenheimer - a estreia dos dois blockbusters, Barbie e Oppenheimer, na mesma semana - nada mais natural que uma produÃ§Ã£o tire proveito do acontecimento. Ã‰ o que o produtor e roteirista Charles Band busca fazer com o seu recÃ©m anunciado projeto, intitulado Barbenheimer, que busca financiamento para iniciar filmagens no ano que vem [via THR].\r\nBarbenheimer contarÃ¡ a histÃ³ria de uma boneca chamada Bambi J Barbenheimer, uma cientista que vive em Dolltopia, um mundo colorido de festas e praias. Quando ela visita o mundo real e testemunha o tratamento que crianÃ§as dÃ£o a bonecas, ela decide construir uma bomba nuclear para destruir tudo.\r\nMartin Scorsese diz que fenÃ´meno â€œBarbenheimerâ€ foi â€œalgo especialâ€\r\nMulher chamada Barbie Oppenheimer brinca com memes: \"Muito engraÃ§ado\"\r\nQuestionado pela THR se seu novo filme Ã© apenas uma oportunidade de lucrar em cima do fenÃ´meno, Band respondeu \"100% verdade\". Mas continuou: \"Ã‰ tambÃ©m uma oportunidade de se divertir com a parceria dos dois filmes e a energia de Barbie e a sobriedade de Oppenheimer. VocÃª mistura os dois e tem uma grande oportunidade de humor sombrio\". Barbenheimer terÃ¡ um orÃ§amento de US$ 1 milhÃ£o e espera iniciar filmagens em 2024\r\n', '2023-10-30 16:17:08', 'noticia', '3f8243e0360ceb055684cfa921e3662e', 0),
(53, 11, '10 Curiosidades sobre o primeiro filme do homem aranha', 'Coisas que vocÃª nao sabia sobe o filme', '[subtitulo]1. Sony nÃ£o queria Tobey Maguire no papel do herÃ³i[/subtitulo]\r\nCom 25 anos na Ã©poca, Tobey Maguire era relativamente desconhecido no mercado cinematogrÃ¡fico, mas o seu papel no filme â€˜Regras da Vidaâ€™ certamente o destacou para o papel. Mesmo assim, ele ainda nÃ£o era o favorito da Sony para interpretar o herÃ³i, pois a produtora achava que o ator nÃ£o combinava com o protagonista.\r\n[subtitulo]2. Cena gravada nas Torres GÃªmeas foi cortada da ediÃ§Ã£o final[/subtitulo]\r\nA primeira adaptaÃ§Ã£o do Homem-Aranha para os cinemas (2002) foi lanÃ§ada pouco tempo depois do ataque Ã s Torres GÃªmeas, por isso, uma das cenas do filme em que o herÃ³i prende um helicÃ³ptero em sua gigante teia entre os prÃ©dios do World Trade Center foi excluÃ­da da ediÃ§Ã£o final.\r\n[subtitulo]3. Primeira apariÃ§Ã£o do logo da Marvel em quadrinhos[/subtitulo]\r\nO icÃ´nico logo da Marvel, formado por pÃ¡ginas em quadrinhos, apareceu pela primeira vez no filme do Homem-Aranha, em 2002, e desde entÃ£o Ã© capa do inÃ­cio de todos os filmes da franquia.\r\n[subtitulo]4. Jake Gyllenhaal quase interpretou o herÃ³i[/subtitulo]\r\nEm entrevista ao Yahoo, em 2019, o ator Jake Gyllenhaal, que interpreta o vilÃ£o â€˜MystÃ©rioâ€™ em â€˜Homem-Aranha: Longe de Casaâ€™, revelou que quase interpretou o herÃ³i em 2004, quando Tobey Maguire machucou as costas fazendo o longa â€˜Seabiscuit: Alma de HerÃ³iâ€™. No entanto, Tobey se recuperou e entrou em acordo com os produtores, reassumindo o papel.\r\n[subtitulo]5. Sentido-Aranha sem computaÃ§Ã£o grÃ¡fica[/subtitulo]\r\nEm Homem-Aranha (2002), Tobey Maguire levou aproximadamente 16 horas para gravar uma cena de 1 minuto. Isso porque ao fazer a icÃ´nica parte em que salva Mary Jane de cair no refeitÃ³rio, o ator pega todas as comidas em uma bandeja, tudo isso sem computaÃ§Ã£o grÃ¡fica e com muitas horas de treinamento.\r\n[subtitulo]6. LanÃ§adores de teias mecÃ¢nicos[/subtitulo]\r\nNa segunda versÃ£o de Spider-Man, interpretado por Andrew Garfield, os fÃ£s conheceram um lanÃ§ador de teias diferente do usado pelo herÃ³i na primeira versÃ£o. Para justificar a produÃ§Ã£o de um novo aranha, a Sony resolveu se inspirar nos quadrinhos do Homem-Aranha Ultimate. Assim, a empresa decidiu chamar Brian Michael Bendis, o autor do HQ, para decidir entre as teias orgÃ¢nicas e as mecÃ¢nicas, sendo a segunda opÃ§Ã£o a favorita do escritor.\r\n[subtitulo]7. Trilha sonora especial[/subtitulo]\r\nAlgumas das composiÃ§Ãµes que os telespectadores puderam ouvir ao logo do filme â€˜O Espetacular Homem-Aranha 2â€™, foram produzidas por Hans Zimmer, compositor alemÃ£o amplamente conhecido no mercado cinematogrÃ¡fico, que tambÃ©m produziu a trilha sonora de filmes da concorrente DC, como: â€˜Batman: O Cavalheiro das Trevas Ressurgeâ€™ e â€˜O Homem de AÃ§oâ€™.\r\n[subtitulo]8. Primeira tia May jovem[/subtitulo]\r\nA tia May, interpretada por Marisa Tomei, na terceira geraÃ§Ã£o do Homem-Aranha, interpretado por Tom Holland, Ã© a versÃ£o mais jovem da personagem. Tanto nos quadrinhos quanto nas duas geraÃ§Ãµes anteriores, ela geralmente Ã© interpretada por uma idosa. Com isso, a Marvel tentou trazer mais realismo para a trama, jÃ¡ que pela lÃ³gica, se Peter tem apenas 15 anos, nÃ£o teria sentido a sua tia ser meio sÃ©culo mais velha que ele.\r\n[subtitulo]9. ReferÃªncia aos quadrinhos[/subtitulo]\r\nEm uma das cenas do primeiro trailer do filme â€˜Homem-Aranha: Longe de Casaâ€™, Ã© possÃ­vel ver o passaporte de Peter Parker. No documento, o pÃºblico vÃª que o famoso Spider Man faz aniversÃ¡rio no dia 10 de agosto, mesmo dia em que o quadrinho Amazing Fantasy #15, onde o herÃ³i aparece pela primeira vez, em 1962, foi lanÃ§ado.\r\n[subtitulo]10. Maior bilheteria da histÃ³ria da Sony[/subtitulo]\r\nEm 2021, o filme â€˜Homem-Aranha: Sem Volta para Casaâ€™ conquistou a marca de maior bilheteria da histÃ³ria da Sony. Com 1,916 bilhÃµes de dÃ³lares, o longa ultrapassou o seu antecessor â€˜Homem-Aranha: Longe de Casaâ€™, lanÃ§ado em 2019, que tinha uma bilheteria de 1,132 bilhÃµes de dÃ³lares.\r\n', '2023-10-30 16:55:54', 'artigo', '3206d8641f4c5484a2f2115833039157', 0),
(54, 11, '5 Fatos artigo de teste', '5 curiosidades', '[subtitulo]Fato 1[/subtitulo]\r\nLorem ipsum dolor, sit amet consectetur adipisicing elit. Quisquam nesciunt, quasi ratione nihil, necessitatibus laboriosam possimus voluptatum, ex sint est maxime odio a consequatur et. Praesentium corrupti nobis accusamus vel.Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quisquam nesciunt, quasi ratione nihil, necessitatibus laboriosam possimus voluptatum, ex sint est maxime odio a consequatur et. Praesentium corrupti nobis accusamus vel.\r\n[subtitulo]Fato 2[/subtitulo]\r\nLorem ipsum dolor, sit amet consectetur adipisicing elit. Quisquam nesciunt, quasi ratione nihil, necessitatibus laboriosam possimus voluptatum, ex sint est maxime odio a consequatur et. Praesentium corrupti nobis accusamus vel.Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quisquam nesciunt, quasi ratione nihil, necessitatibus laboriosam possimus voluptatum, ex sint est maxime odio a consequatur et. Praesentium corrupti nobis accusamus vel.\r\n[subtitulo]Fato 3[/subtitulo]\r\nLorem ipsum dolor, sit amet consectetur adipisicing elit. Quisquam nesciunt, quasi ratione nihil, necessitatibus laboriosam possimus voluptatum, ex sint est maxime odio a consequatur et. Praesentium corrupti nobis accusamus vel.Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quisquam nesciunt, quasi ratione nihil, necessitatibus laboriosam possimus voluptatum, ex sint est maxime odio a consequatur et. Praesentium corrupti nobis accusamus vel.\r\n[subtitulo]Fato 4[/subtitulo]\r\nLorem ipsum dolor, sit amet consectetur adipisicing elit. Quisquam nesciunt, quasi ratione nihil, necessitatibus laboriosam possimus voluptatum, ex sint est maxime odio a consequatur et. Praesentium corrupti nobis accusamus vel.Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quisquam nesciunt, quasi ratione nihil, necessitatibus laboriosam possimus voluptatum, ex sint est maxime odio a consequatur et. Praesentium corrupti nobis accusamus vel\r\n[subtitulo]Fato 5[/subtitulo]\r\nLorem ipsum dolor, sit amet consectetur adipisicing elit. Quisquam nesciunt, quasi ratione nihil, necessitatibus laboriosam possimus voluptatum, ex sint est maxime odio a consequatur et. Praesentium corrupti nobis accusamus vel.Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quisquam nesciunt, quasi ratione nihil, necessitatibus laboriosam possimus voluptatum, ex sint est maxime odio a consequatur et. Praesentium corrupti nobis accusamus vel.\r\n', '2023-10-30 17:01:38', 'artigo', '46c63375d37f972173aef770ed2f2442', 0),
(55, 11, 'Novo artigo', 'descricao ', '[subtitulo]Muito legal[/subtitulo]\r\nLorem ipsum dolor, sit amet consectetur adipisicing elit. Quisquam nesciunt, quasi ratione nihil, necessitatibus laboriosam possimus voluptatum, ex sint est maxime odio a consequatur et.Praesentium corrupti nobis accusamus vel.Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quisquam nesciunt, quasi ratione nihil, necessitatibus laboriosam possimus voluptatum, ex sint est maxime odio a consequatur et. Praesentium corrupti nobis accusamus vel.\r\nLorem ipsum dolor, sit amet consectetur adipisicing elit. Quisquam nesciunt, quasi ratione nihil, necessitatibus laboriosam possimus voluptatum, ex sint est maxime odio a consequatur et.Praesentium corrupti nobis accusamus vel.Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quisquam nesciunt, quasi ratione nihil, necessitatibus laboriosam possimus voluptatum, ex sint est maxime odio a consequatur et. Praesentium corrupti nobis accusamus vel.\r\nLorem ipsum dolor, sit amet consectetur adipisicing elit. Quisquam nesciunt, quasi ratione nihil, necessitatibus laboriosam possimus voluptatum, ex sint est maxime odio a consequatur et.Praesentium corrupti nobis accusamus vel.Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quisquam nesciunt, quasi ratione nihil, necessitatibus laboriosam possimus voluptatum, ex sint est maxime odio a consequatur et. Praesentium corrupti nobis accusamus vel.', '2023-10-30 17:03:18', 'Artigo', 'c8824de3906aaa44206296bcf78b26da', 0),
(56, 11, 'Artigo muy Loko', 'Este Ã© um super artigo', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quisquam nesciunt, quasi ratione nihil, necessitatibus laboriosam possimus voluptatum, ex sint est maxime odio a consequatur et.Praesentium corrupti nobis accusamus vel.Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quisquam nesciunt, quasi ratione nihil, necessitatibus laboriosam possimus voluptatum, ex sint est maxime odio a consequatur et. Praesentium corrupti nobis accusamus vel.Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quisquam nesciunt, quasi ratione nihil, necessitatibus laboriosam possimus voluptatum, ex sint est maxime odio a consequatur et.Praesentium corrupti nobis accusamus vel.Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quisquam nesciunt, quasi ratione nihil, necessitatibus laboriosam possimus voluptatum, ex sint est maxime odio a consequatur et. Praesentium corrupti nobis accusamus vel.Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quisquam nesciunt, quasi ratione nihil, necessitatibus laboriosam possimus voluptatum, ex sint est maxime odio a consequatur et.Praesentium corrupti nobis accusamus vel.Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quisquam nesciunt, quasi ratione nihil, necessitatibus laboriosam possimus voluptatum, ex sint est maxime odio a consequatur et. Praesentium corrupti nobis accusamus vel.', '2023-10-30 17:09:51', 'artigo', '0ee45f2324557412fd288846937ed1f4', 0),
(57, 11, 'DesgraÃ§a', 'klklkv', 'vlvklkclz\\kc\\lzkclz\\kLorem ipsum dolor, sit amet consectetur adipisicing elit. Quisquam nesciunt, quasi ratione nihil, necessitatibus laboriosam possimus voluptatum, ex sint est maxime odio a consequatur et.Praesentium corrupti nobis accusamus vel.Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quisquam nesciunt, quasi ratione nihil, necessitatibus laboriosam possimus voluptatum, ex sint est maxime odio a consequatur et. Praesentium corrupti nobis accusamus vel.Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quisquam nesciunt, quasi ratione nihil, necessitatibus laboriosam possimus voluptatum, ex sint est maxime odio a consequatur et.Praesentium corrupti nobis accusamus vel.Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quisquam nesciunt, quasi ratione nihil, necessitatibus laboriosam possimus voluptatum, ex sint est maxime odio a consequatur et. Praesentium corrupti nobis accusamus vel. \r\n[subtitulo]testeee[/subtitulo]', '2023-10-30 17:11:48', 'artigo', '2066f61b58d42a4ddeca9bf32e8ada5f', 0),
(58, 11, 'Super artigo', 'Artigo de teste', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quisquam nesciunt, quasi ratione nihil, necessitatibus laboriosam possimus voluptatum, ex sint est maxime odio a consequatur et.Praesentium corrupti nobis accusamus vel.Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quisquam nesciunt, quasi ratione nihil, necessitatibus laboriosam possimus voluptatum, ex sint est maxime odio a consequatur et. Praesentium corrupti nobis accusamus vel.', '2023-10-30 17:13:32', 'artigo', '816552749d118eed4f5d136dc6be6081', 0),
(59, 11, 'Super artigo', 'dadasdasd', 'ckjkasjdklAJdkaMS,mf,>DMc,>MC,f.smdc,.mc,.xzckzjkdjzkljfdsf', '2023-10-30 17:40:27', 'artigo', 'cad8cd88c97cfb248f7cf32ef50eb8c2', 0),
(60, 11, '10 melhores filmes de aÃ§Ã£o', 'deterrerererer', 'dssssssskkkkkkkkkkkkk', '2023-10-30 21:58:23', 'artigo', '4a02a5adce873053010e03841ee92053', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `telefone`
--

DROP TABLE IF EXISTS `telefone`;
CREATE TABLE IF NOT EXISTS `telefone` (
  `id_telefone` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `numero` int(11) NOT NULL,
  PRIMARY KEY (`id_telefone`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `sobrenome` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `senha` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `dataNasc` date NOT NULL,
  `cpf` int(11) DEFAULT NULL,
  `tipoUsuario` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `bio` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fotoPerfil` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nome`, `sobrenome`, `email`, `senha`, `dataNasc`, `cpf`, `tipoUsuario`, `bio`, `fotoPerfil`, `status`) VALUES
(11, 'Luciana', 'Khalifa', 'fulano@gmail.com', '698dc19d489c4e4db73e28a713eab07b', '1999-02-19', 689999999, 'publicador', 'Louco e sonhador', '11774837e13bacd8746c240586d5d4c8', 1),
(12, 'Rambo', 'Silva', 'rael@gmail.com', '698dc19d489c4e4db73e28a713eab07b', '1980-05-09', 0, 'publicador', NULL, '', 0),
(17, 'Israel', 'Rodrigues', 'gamingprodf@gmail.com', '698dc19d489c4e4db73e28a713eab07b', '2009-02-20', NULL, 'comum', 'Louko', 'aeebf9b79e08bf60e9cc6ddbc1b3cb5f', 0),
(14, 'israel', 'Rodrigues', 'israell.rodrigues@gmail.com', '698dc19d489c4e4db73e28a713eab07b', '1999-02-20', 0, 'comum', 'vida loka', '4f934359c29071cec32a99d5f95a9b4c', 0),
(15, 'Administrador', 'adm', 'adm@gmail.com', '698dc19d489c4e4db73e28a713eab07b', '2023-10-11', NULL, 'administrador', NULL, NULL, 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
