-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 27/11/2024 às 23:58
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `loja`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `carrinho`
--

CREATE TABLE `carrinho` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_produto` int(11) NOT NULL,
  `quantidade` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `categorias`
--

INSERT INTO `categorias` (`id`, `nome`) VALUES
(1, 'Masculino'),
(2, 'Feminino');

-- --------------------------------------------------------

--
-- Estrutura para tabela `compras`
--

CREATE TABLE `compras` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `data_compra` timestamp NOT NULL DEFAULT current_timestamp(),
  `quantidade` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `compras`
--

INSERT INTO `compras` (`id`, `id_usuario`, `data_compra`, `quantidade`) VALUES
(1, 3, '2024-11-05 00:04:57', 2),
(9, 3, '2024-11-05 00:04:57', 4),
(13, 3, '2024-11-05 04:19:55', 1),
(14, 10, '2024-11-05 04:53:51', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `pedidos`
--

CREATE TABLE `pedidos` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `nome_usuario` varchar(255) NOT NULL,
  `id_produto` int(11) NOT NULL,
  `nome_produto` varchar(255) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `preco` decimal(10,2) NOT NULL,
  `data_pedido` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `pedidos`
--

INSERT INTO `pedidos` (`id`, `id_usuario`, `nome_usuario`, `id_produto`, `nome_produto`, `quantidade`, `preco`, `data_pedido`) VALUES
(1, 3, 'Kaio Fernandes', 12, 'Camiseta Chocolate Est Chunk Crew Marrom', 1, 169.00, '2024-11-27 19:22:43'),
(6, 3, '', 22, 'Camiseta Columbia Feminina Csc Emblem Branco', 1, 159.00, '2024-11-27 19:45:10');

-- --------------------------------------------------------

--
-- Estrutura para tabela `produtos`
--

CREATE TABLE `produtos` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `descricao` text DEFAULT NULL,
  `preco` decimal(10,2) NOT NULL,
  `imagem` varchar(255) NOT NULL,
  `estoque` int(11) DEFAULT 0,
  `destaque` tinyint(1) DEFAULT 0,
  `data_adicionado` datetime DEFAULT current_timestamp(),
  `categoria_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `produtos`
--

INSERT INTO `produtos` (`id`, `nome`, `descricao`, `preco`, `imagem`, `estoque`, `destaque`, `data_adicionado`, `categoria_id`) VALUES
(11, 'Camiseta Vans Posted White', 'Tradição e originalidade estão presentes na cultura Vans e são referência para os pequenos. A Camiseta Posted SS White é um clássico Vans. Na cor branca, de manga curta, ela é confeccionada em tecido 100% algodão. Traz estampa frontal com assinatura Vans em “Drop V” e ‘’66 na altura do peito, no lado esquerdo. Já nas costas, traz a inscrição do manifesto Vans, com detalhes em checkerboard e assinaturas Vans em “Drop V” e “Off The Wall”, ambas em silk à base d’água. Com gola redonda, apresenta costura reforçada nos ombros e etiqueta Vans aplicada na manga. Autenticidade Vans para todos os momentos.', 150.00, 'assets/img/camisetavanspostedwhite-120940.jpg', 22, 0, '2024-11-18 08:31:16', 1),
(12, 'Camiseta Chocolate Est Chunk Crew Marrom', 'Confeccionada em tecido 100% algodão, esta camiseta básica combina conforto e estilo em um design minimalista. Possui modelagem regular, gola redonda e mangas curtas, proporcionando um ajuste perfeito para o dia a dia. Disponível em diversas cores, é uma peça essencial para criar combinações versáteis e modernas. Ideal para quem busca praticidade sem abrir mão do visual casual e elegante.', 169.00, 'assets/img/camisetachocolateestchunkcrewmarrom.jpg', 12, 1, '2024-11-18 08:40:38', 1),
(13, 'Camiseta Chocolate Og Chunk Square Areia', 'Com vibe urbana e despojada, esta camiseta estilo skatista é perfeita para quem busca conforto e atitude. Produzida em tecido 100% algodão, oferece respirabilidade e resistência, ideal para o dia a dia ou sessões de skate. O design apresenta modelagem oversized, mangas mais largas e uma estampa gráfica que reflete a cultura streetwear. Combine com calças cargo ou shorts para um visual autêntico e cheio de estilo.', 170.00, 'assets/img/camisetachocolateogchunksquareareia.jpg', 30, 0, '2024-11-18 08:42:48', 1),
(14, 'Camiseta Chocolate Parental Preto', 'Autenticidade e estilo se encontram nesta camiseta inspirada no universo do skate. Feita em algodão premium, ela oferece durabilidade e conforto para acompanhar suas manobras ou o rolê com a galera. O corte solto e as mangas amplas garantem liberdade de movimento, enquanto a estampa com temática urbana adiciona um toque moderno e descolado. Ideal para usar com bermudas ou calças jogger, é uma peça indispensável para quem vive a cultura do streetwear.', 169.00, 'assets/img/camisetachocolateparentalpreto.jpg', 50, 1, '2024-11-18 08:47:03', 1),
(15, 'Camiseta Santa Cruz Screaming Hand Front Preto', 'Representando o autêntico espírito do skate, esta camiseta Santa Cruz é um clássico indispensável. Fabricada em algodão de alta qualidade, ela combina conforto e durabilidade para o dia a dia ou sessões intensas. Com o icônico logo Santa Cruz estampado, ela reflete a essência da cultura skatista e a vibe californiana. A modelagem regular e as mangas curtas oferecem um ajuste confortável, perfeito para compor looks urbanos com atitude. Seja no rolê ou na pista, esta peça é sinônimo de estilo e tradição no mundo do skate.', 160.00, 'assets/img/camisetasantacruzscreaminghandfrontpreto.jpg', 40, 0, '2024-11-18 08:49:18', 1),
(16, 'Camiseta Vans Crazy Eddy Black', 'Arte e cultura de rua trazem referências icônicas para as peças clássicas da Vans. Confortável o bastante para usar todos os dias e em qualquer ocasião, a Camiseta Crazzy Eddy SS Black com um toque descontraído, traz estampa frontal na altura do peito, de um coelho segurando um celular na altura do peito. Já nas costas, traz também o mesmo coelho e o crânio de uma caveira dentro da tela de uma TV, e com referências vintage Vans® “Off The Wall”, ambas em silk à base d’água. Em algodão, a camiseta de manga curta preta possui gola redonda e aplicação de etiqueta tecida Vans® na manga.Camiseta de manga curta com gola redonda; • Estampas icônicas Vans® na parte frontal e nas costas, em silk à base d’água;', 169.00, 'assets/img/camisetavanscrazyeddyblack.jpg', 55, 1, '2024-11-18 08:52:00', 1),
(17, 'Camiseta Vans Holder St Classic Marshmallow Fro', 'Arte e cultura de rua trazem referências icônicas para as peças clássicas da Vans. Confortável o bastante para usar todos os dias e em qualquer ocasião, a Camiseta Holder St Classic SS Marshmallow Frost Gray traz a estampa clássica e tradicional com assinatura Vans® - na parte frontal, localizada na altura do peito, no lado esquerdo. Já nas costas, traz a mesma estampa, em tamanho maior, ambas em silk à base d’água. Em tecido algodão 100%, a camiseta de manga curta masculina na cor branca possui gola redonda e aplicação de etiqueta tecida Vans na manga. Modelagem com silhueta de caimento clássico.', 169.00, 'assets/img/camisetavansholderstclassicmarshmallowfro.jpg', 66, 0, '2024-11-18 08:53:31', 1),
(18, 'Camiseta Vans Classic Bold White', 'Tradição e originalidade estão presentes na cultura da Vans desde 1966. A personalidade e estilo inconfundível se destacam em todos os seus clássicos. A Camiseta Classic Bold SS White de manga curta é confeccionada em tecido de algodão. Com modelagem clássica, traz gola redonda e estampa em arte exclusiva, resgatando o logotipo lendário que faz parte da história da Vans, centralizada na altura do peito, em silk à base d’água. Traz etiqueta tecida Vans aplicada na manga.', 199.00, 'assets/img/camisetavansclassicboldwhite.jpg', 42, 0, '2024-11-18 08:55:27', 1),
(19, 'Fleece The North Face Feminino Crewneck Tka Glacier Preto\r\n', 'Perfeito para mulheres que buscam aquecimento com leveza e muita praticidade, o Fleece Feminino TKA Glacier Crew pode ser usado nas mais diversas atividades físicas, viagens e no dia a dia. Altamente respirável, o Fleece TKA Glacier Crew é compressível, não ocupando espaço e nem peso na mochila. Confeccionado com tecido de microfibra e gramatura 150g, este fleece possui alto desempenho em termos de aquecimento, respirabilidade e secagem rápida, para que você tenha o máximo de conforto em qualquer viagem ou esporte.\r\n\r\n', 299.00, 'assets/img/fleecethenorthfacefemininocrewnecktkaglacierpreto-148609.jpg', 50, 1, '2024-11-18 09:02:38', 2),
(20, 'Cardigan Volcom Feminina Breezy Babe Preto', 'Elegante e versátil, este cardigan é a peça-chave para elevar qualquer look. Confeccionado em malha macia de alta qualidade, oferece conforto térmico e um caimento perfeito. Possui fechamento frontal com botões delicados, além de acabamento refinado nos punhos e barra. Ideal para sobrepor vestidos, blusas ou camisas, é uma opção prática para os dias mais frescos, garantindo estilo e sofisticação em qualquer ocasião.', 259.00, 'assets/img/cardiganvolcomfemininabreezybabepreto-482524.jpg', 50, 0, '2024-11-18 09:11:15', 2),
(21, 'Camiseta Champion Feminina Cropped White', 'Descolada e cheia de atitude, esta camiseta cropped é a escolha perfeita para quem busca estilo e conforto. Feita em tecido leve e macio, possui modelagem curta que valoriza a silhueta e proporciona um visual moderno. Com gola redonda e mangas curtas, ela é ideal para combinar com calças de cintura alta, shorts ou saias, criando looks casuais e versáteis para o dia a dia ou ocasiões especiais. Disponível em cores e estampas vibrantes, é uma peça indispensável no guarda-roupa de quem ama moda e praticidade.', 59.00, 'assets/img/camisetachampionfemininacroppedclogowhite-734543.jpg', 50, 0, '2024-11-18 09:12:59', 2),
(22, 'Camiseta Columbia Feminina Csc Emblem Branco', 'Estilo e funcionalidade se unem nesta camiseta Columbia Feminina CSC Emblem. Feita com tecido leve e respirável, ela oferece conforto excepcional para o dia a dia ou aventuras ao ar livre. O design apresenta um ajuste casual com gola redonda e mangas curtas, enquanto o logo clássico Columbia CSC Emblem em destaque no peito adiciona um toque de autenticidade. Na cor branca, é uma peça versátil que combina com qualquer look, ideal para mulheres que apreciam praticidade e qualidade.', 159.00, 'assets/img/camisetacolumbiafemininacscemblembranco-246238.jpg', 50, 1, '2024-11-18 09:15:43', 0),
(23, 'Camiseta Columbia Feminina Basica Bord Preto', 'Simples e sofisticada, a camiseta Columbia Feminina Básica Bord é perfeita para quem busca conforto e estilo em uma única peça. Confeccionada em tecido de alta qualidade, oferece um toque macio e respirabilidade, ideal para o uso diário. O design básico na cor preta ganha um charme especial com o bordado discreto do logo Columbia, que adiciona autenticidade e elegância. Com gola redonda e mangas curtas, é uma peça curinga para combinar com diferentes looks, seja para atividades ao ar livre ou ocasiões casuais.', 149.00, 'assets/img/camisetacolumbiafemininabasicabordpreto-799141.jpg', 50, 0, '2024-11-18 09:17:31', 2),
(24, 'Camiseta Nike Feminina Nsw Dx', 'Atualizamos as nossas Camisetas Club Essentials para dar a elas um ajuste fácil e o visual moderno perfeito para uso no dia a dia. Um pouco mais larga e curta no corpo, com uma bainha levemente curvada fazem dessa camiseta uma peça sempre confortável com um visual atualizado.', 69.00, 'assets/img/camisetanikefemininanswdx7902-010-867991.jpg', 50, 1, '2024-11-18 09:18:45', 2),
(25, 'Camiseta Adidas Feminina 3 Stripes', 'O que é um guarda-roupa sem uma camiseta clássica? Esta camiseta adidas adiciona estilo e descontração ao seu look do dia a dia, com uma referência à vibe esportiva original. A estrutura em malha simples cria um ajuste macio e confortável, enquanto as Três Listras ao longo das mangas trazem um toque atemporal da herança adidas.\r\n\r\n', 119.00, 'assets/img/camisetaadidasfeminina3stripesil3868-557381.jpg', 50, 0, '2024-11-18 09:20:33', 2),
(26, 'Camiseta Adidas Feminina Trefoil', 'Renove seu look casual com um clássico moderno em malha simples confortável. Modelagem equilibrada, não muito larga nem justa demais, ela é perfeita para uso no dia a dia. Com design atemporal e apelo despojado, esta camiseta adidas certamente será uma peça curinga instantânea.', 99.00, 'assets/img/camisetaadidasfemininatrefoilik4037-814300.jpg', 50, 0, '2024-11-18 09:21:41', 2),
(27, 'Camiseta Fila Feminina Stack New Black', 'Combinando estilo esportivo e casual, a camiseta Fila é ideal para quem busca conforto e autenticidade. Produzida em tecido macio e durável, oferece ótimo caimento e liberdade de movimento para o dia a dia ou práticas esportivas. O design clássico é destacado pelo icônico logo Fila estampado no peito, garantindo um visual moderno e cheio de personalidade. Com gola redonda e mangas curtas, é uma peça versátil que combina facilmente com calças, shorts ou leggings para um look descontraído e cheio de atitude.', 99.00, 'assets/img/camisetafilafemininastacknewblack.png', 50, 0, '2024-11-18 09:22:53', 2);

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `idusuario` int(11) NOT NULL,
  `nome` varchar(80) NOT NULL,
  `email` varchar(80) NOT NULL,
  `senha` varchar(64) NOT NULL,
  `sit` int(1) NOT NULL,
  `telefone` varchar(15) NOT NULL,
  `endereco` varchar(255) NOT NULL,
  `bairro` varchar(255) NOT NULL,
  `rua` varchar(255) NOT NULL,
  `numero` varchar(20) NOT NULL,
  `complemento` varchar(255) DEFAULT NULL,
  `cidade` varchar(255) NOT NULL,
  `estado` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`idusuario`, `nome`, `email`, `senha`, `sit`, `telefone`, `endereco`, `bairro`, `rua`, `numero`, `complemento`, `cidade`, `estado`) VALUES
(2, 'Bianca Muniz', 'bianca@gmail.com', '123456', 1, '', '', '', '', '', NULL, '', ''),
(3, 'Kaiogre', 'kaio@gmail.com', '202cb962ac59075b964b07152d234b70', 1, '41414141', '', 'centro', 'correia pinto', '111', 'prédio', 'Lages', 'Sc'),
(4, 'carlos', 'carlos@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 0, '', '', '', '', '', NULL, '', ''),
(5, 'KAIO FERNANDES BRANCO', 'kaiofernandes@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 0, '', '', '', '', '', NULL, '', ''),
(6, 'teste', 'teste@gmail.com', '698dc19d489c4e4db73e28a713eab07b', 0, '', '', '', '', '', NULL, '', ''),
(7, 'juliana branco', 'ju@gmail.com', '202cb962ac59075b964b07152d234b70', 0, '', '', '', '', '', NULL, '', ''),
(8, 'Nox', 'nox@gmail.com', '202cb962ac59075b964b07152d234b70', 0, '', '', '', '', '', NULL, '', ''),
(9, 'Juliana Fernandes', 'juliana@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 0, '', '', '', '', '', NULL, '', ''),
(10, 'kaio fernandes', 'kaioinformatica7@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 0, '', '', '', '', '', NULL, '', ''),
(11, 'Ryan SIlveira', 'ryansilveira@gmail.com', '202cb962ac59075b964b07152d234b70', 0, '4818490855', '', 'Universitário', 'Correia Pinto', '123', 'esquina', 'Lages', 'SP');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `carrinho`
--
ALTER TABLE `carrinho`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_produto` (`id_produto`);

--
-- Índices de tabela `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `compras`
--
ALTER TABLE `compras`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Índices de tabela `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idusuario`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `carrinho`
--
ALTER TABLE `carrinho`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `compras`
--
ALTER TABLE `compras`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de tabela `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `carrinho`
--
ALTER TABLE `carrinho`
  ADD CONSTRAINT `carrinho_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`idusuario`),
  ADD CONSTRAINT `carrinho_ibfk_2` FOREIGN KEY (`id_produto`) REFERENCES `produtos` (`id`);

--
-- Restrições para tabelas `compras`
--
ALTER TABLE `compras`
  ADD CONSTRAINT `compras_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`idusuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
