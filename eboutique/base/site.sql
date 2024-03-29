CREATE DATABASE eboutique;
USE eboutique;

CREATE TABLE article (
  id_article int(5) NOT NULL AUTO_INCREMENT,
  reference varchar(255) NOT NULL,
  categorie varchar(255) NOT NULL,
  titre varchar(255) NOT NULL,
  description text NOT NULL,
  couleur varchar(255) NOT NULL,
  taille varchar(255) NOT NULL,
  sexe enum('m','f') NOT NULL,
  photo varchar(255) NOT NULL,
  prix double(7,2) NOT NULL,
  stock int(4) NOT NULL,
  PRIMARY KEY (id_article),
  UNIQUE KEY reference (reference)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 ;



CREATE TABLE commande (
  id_commande int(6) NOT NULL auto_increment,
  id_membre int(5) default NULL,
  montant double(7,2) NOT NULL,
  date datetime NOT NULL,
  etat enum('en cours de traitement','envoyé','livré') NOT NULL default 'en cours de traitement',
  PRIMARY KEY  (id_commande),
  KEY id_membre (id_membre)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 ;


CREATE TABLE details_commande (
  id_details_commande int(5) NOT NULL auto_increment,
  id_commande int(6) NOT NULL,
  id_article int(5) default NULL,
  quantite int(4) NOT NULL,
  prix double(7,2) NOT NULL,
  PRIMARY KEY  (id_details_commande),
  KEY id_article (id_article)
  KEY id_article (id_commande)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 ;


CREATE TABLE membre (
  id_membre int(5) NOT NULL auto_increment,
  pseudo varchar(255) NOT NULL,
  mdp varchar(255) NOT NULL,
  nom varchar(255) NOT NULL,
  prenom varchar(255) NOT NULL,
  email varchar(255) NOT NULL,
  sexe enum('m','f') NOT NULL,
  ville varchar(255) NOT NULL,
  cp varchar(5) NOT NULL,
  adresse text NOT NULL,
  statut int(1) NOT NULL,
  PRIMARY KEY  (id_membre),
  UNIQUE KEY pseudo (pseudo)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ;


ALTER TABLE commande
  ADD CONSTRAINT commande_ibfk_1 FOREIGN KEY (id_membre) REFERENCES membre (id_membre) ON DELETE SET NULL ON UPDATE CASCADE;


ALTER TABLE details_commande
  ADD CONSTRAINT details_commande_ibfk_1 FOREIGN KEY (id_article) REFERENCES article (id_article) ON DELETE SET NULL ON UPDATE CASCADE;
