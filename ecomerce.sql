#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------
DROP DATABASE IF EXISTS ecommerce;

CREATE DATABASE ecommerce;

USE ecommerce;

--
-- Structure de la table `article`
--

CREATE TABLE IF NOT EXISTS `article` (
  `art_id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `mod_id` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `article`
--

INSERT INTO `article` (`art_id`, `order_id`, `mod_id`) VALUES
(1, 1, 1),
(2, 1, 1),
(3, NULL, 3),
(4, NULL, 3),
(5, NULL, 3),
(6, NULL, 3),
(7, NULL, 3),
(8, NULL, 3),
(9, NULL, 3),
(10, NULL, 3),
(11, NULL, 3),
(12, NULL, 3),
(13, NULL, 3),
(14, NULL, 3),
(15, NULL, 3),
(16, NULL, 3),
(17, NULL, 3),
(18, NULL, 3),
(19, NULL, 3),
(20, NULL, 3),
(21, NULL, 3),
(22, NULL, 3);

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(32) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`) VALUES
(1, 'beau'),
(2, 'laid');

-- --------------------------------------------------------

--
-- Structure de la table `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `com_id` int(11) NOT NULL,
  `com_text` text,
  `com_note` int(11) DEFAULT NULL,
  `mod_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `modeleArticle`
--

CREATE TABLE IF NOT EXISTS `modeleArticle` (
  `mod_id` int(11) NOT NULL,
  `mod_name` varchar(64) NOT NULL,
  `mod_desc` text,
  `mod_price` decimal(6,2) DEFAULT NULL,
  `cat_id` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `modeleArticle`
--

INSERT INTO `modeleArticle` (`mod_id`, `mod_name`, `mod_desc`, `mod_price`, `cat_id`) VALUES
(1, 'pierre', '  Un galet de taille moyenne  ', '4.95', 1),
(2, 'piere', 'Faute d''orthographe impardonnable', '4.99', 2),
(3, 'sable', 'un peu de sable pour vous sentir en vacance.', '7.50', 1);

-- --------------------------------------------------------

--
-- Structure de la table `ordering`
--

CREATE TABLE IF NOT EXISTS `ordering` (
  `order_id` int(11) NOT NULL,
  `order_date` datetime NOT NULL,
  `order_adress` varchar(254) NOT NULL,
  `order_city` varchar(64) NOT NULL,
  `order_zip` varchar(5) NOT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `ordering`
--

INSERT INTO `ordering` (`order_id`, `order_date`, `order_adress`, `order_city`, `order_zip`, `user_id`) VALUES
(1, '2017-03-01 16:14:14', 'z', 'e', 'a', 1),
(2, '2017-03-09 22:44:46', '49 rue saint jean', 'Granville', '50400', 1);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL,
  `user_grade` tinyint(1) DEFAULT '0',
  `user_email` varchar(254) DEFAULT NULL,
  `user_firstName` varchar(32) DEFAULT NULL,
  `user_lastName` varchar(32) DEFAULT NULL,
  `user_password` varchar(254) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`user_id`, `user_grade`, `user_email`, `user_firstName`, `user_lastName`, `user_password`) VALUES
(1, 1, '1pierrelezan@gmail.com', 'Pierre', 'Lezan', '$2y$10$ZzTYZQhAJ9vfUTyhP8hWGOwgFkXWkRQWT3MLoI5Gt9QPtsdz5Hu4i');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`art_id`),
  ADD KEY `FK_article_order_id` (`order_id`),
  ADD KEY `FK_article_mod_id` (`mod_id`);

--
-- Index pour la table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Index pour la table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`com_id`),
  ADD KEY `FK_comment_mod_id` (`mod_id`),
  ADD KEY `FK_comment_user_id` (`user_id`);

--
-- Index pour la table `modeleArticle`
--
ALTER TABLE `modeleArticle`
  ADD PRIMARY KEY (`mod_id`),
  ADD KEY `FK_modeleArticle_cat_id` (`cat_id`);

--
-- Index pour la table `ordering`
--
ALTER TABLE `ordering`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `FK_ordering_user_id` (`user_id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `article`
--
ALTER TABLE `article`
  MODIFY `art_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT pour la table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `comment`
--
ALTER TABLE `comment`
  MODIFY `com_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `modeleArticle`
--
ALTER TABLE `modeleArticle`
  MODIFY `mod_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `ordering`
--
ALTER TABLE `ordering`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `FK_article_mod_id` FOREIGN KEY (`mod_id`) REFERENCES `modeleArticle` (`mod_id`),
  ADD CONSTRAINT `FK_article_order_id` FOREIGN KEY (`order_id`) REFERENCES `ordering` (`order_id`);

--
-- Contraintes pour la table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `FK_comment_mod_id` FOREIGN KEY (`mod_id`) REFERENCES `modeleArticle` (`mod_id`),
  ADD CONSTRAINT `FK_comment_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Contraintes pour la table `modeleArticle`
--
ALTER TABLE `modeleArticle`
  ADD CONSTRAINT `FK_modeleArticle_cat_id` FOREIGN KEY (`cat_id`) REFERENCES `category` (`cat_id`);

--
-- Contraintes pour la table `ordering`
--
ALTER TABLE `ordering`
  ADD CONSTRAINT `FK_ordering_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);
