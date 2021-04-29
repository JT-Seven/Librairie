
DROP TABLE IF EXISTS `acheteurs`;
CREATE TABLE IF NOT EXISTS `acheteurs` (
  `id_acheteurs` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(45) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `email` varchar(45) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `adresse` varchar(45) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  PRIMARY KEY (`id_acheteurs`)
);


DROP TABLE IF EXISTS `autheurs`;
CREATE TABLE IF NOT EXISTS `autheurs` (
  `id_autheurs` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(20) NOT NULL,
  PRIMARY KEY (`id_autheurs`)
);



DROP TABLE IF EXISTS `commandes`;
CREATE TABLE IF NOT EXISTS `commandes` (
  `id_commande` int NOT NULL AUTO_INCREMENT,
  `dates_commande` text CHARACTER SET utf8 COLLATE utf8_general_ci,
  `acheteurs_id_acheteurs` int NOT NULL,
  PRIMARY KEY (`id_commande`),
  KEY `fk_commandes_acheteurs1` (`acheteurs_id_acheteurs`)
);



DROP TABLE IF EXISTS `lignes_commandes`;
CREATE TABLE IF NOT EXISTS `lignes_commandes` (
  `id_lignes_commandes` int NOT NULL AUTO_INCREMENT,
  `quantite` int DEFAULT NULL,
  `prix_facture` int DEFAULT NULL,
  `commandes_id_commande` int NOT NULL,
  `livres_id_livres` int NOT NULL,
  PRIMARY KEY (`id_lignes_commandes`),
  KEY `fk_lignes_commandes_commandes1` (`commandes_id_commande`),
  KEY `fk_lignes_commandes_livres1` (`livres_id_livres`)
);


DROP TABLE IF EXISTS `livres`;
CREATE TABLE IF NOT EXISTS `livres` (
  `id_livres` int NOT NULL AUTO_INCREMENT,
  `titre` varchar(30) DEFAULT NULL,
  `description` text,
  `prix` float(4,2) DEFAULT NULL,
  `autheurs_id_autheurs` int NOT NULL,
  PRIMARY KEY (`id_livres`),
  KEY `fk_livres_autheurs1` (`autheurs_id_autheurs`)
);

