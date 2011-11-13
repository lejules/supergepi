<?php
/**
 * @version $Id$
 * @author Julien Jocal
 * @copyright 2011 Julien Jocal
 *
 * This file is part of superGepi.
 *
 * superGepi is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * superGepi is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details (COPYING).
 *
 * You should have received a copy of the GNU General Public License
 * along with superGepi.  If not, see <http://www.gnu.org/licenses/>.
 *
 *
 * Première mise en place de la structure de la base de données
 */
$migration = array();
$migration[] = "DROP TABLE IF EXISTS m_utilisateurs;";
$migration[] = "CREATE TABLE m_utilisateurs (id INTEGER(4)  NOT NULL AUTO_INCREMENT COMMENT 'cle primaire de la table utilisateurs', login VARCHAR(50)  NOT NULL COMMENT 'Login de l\'utilisateur', nom VARCHAR(50)  NOT NULL COMMENT 'Nom de l\'utilisateur', prenom VARCHAR(50)  NOT NULL COMMENT 'Prenom de l\'utilisateur', civilite VARCHAR(5)  NOT NULL COMMENT 'Civilite',	password VARCHAR(100)  NOT NULL COMMENT 'Mot de passe',	email VARCHAR(100)  NOT NULL COMMENT 'Email de l\'utilisateur',	statut VARCHAR(20) default 'inscripteur' NOT NULL COMMENT 'Statut de l\'utilisateur',	sso CHAR(1) default 'n' NOT NULL COMMENT 'Si l\'utilisateur existe en sso',	PRIMARY KEY (id))Type=MyISAM COMMENT='Utilisateurs du logiciel';";
$migration[] = "DROP TABLE IF EXISTS m_settings;";
$migration[] = "CREATE TABLE m_settings(id INTEGER(4)  NOT NULL AUTO_INCREMENT COMMENT 'cle primaire de la table m_settings',	nom VARCHAR(100)  NOT NULL COMMENT 'Nom du reglage',	valeur VARCHAR(100)  NOT NULL COMMENT 'Valeur de ce reglage',	PRIMARY KEY (id))Type=MyISAM COMMENT='Reglages de l\'interface';";
$migration[] = "DROP TABLE IF EXISTS m_etablissements;";
$migration[] = "CREATE TABLE m_etablissements(id INTEGER(4)  NOT NULL AUTO_INCREMENT COMMENT 'cle primaire de la table m_etablissements',	nom VARCHAR(200)  NOT NULL COMMENT 'Nom de l\'etablissement',	type VARCHAR(20)  NOT NULL COMMENT 'Type de l\'etablissement (clg, lyc, cfa, ecole, ...)',	rne VARCHAR(15)  NOT NULL COMMENT 'Nombre de place disponible pour cet atelier',	nom_base VARCHAR(30) default '0' NOT NULL COMMENT 'Base de donnees de cet etablissement',	user_base VARCHAR(30) default '0' NOT NULL COMMENT 'Utilisateur MySql de cette Base de donnees',	mdp_base VARCHAR(30) default '0' NOT NULL COMMENT 'mdp de l\'utilisateur MySql de cette Base de donnees', host_base VARCHAR(30) default '0' NOT NULL COMMENT 'Domaine du serveur MySql',path VARCHAR(30) default '0' NOT NULL COMMENT 'Chemin relatif de Gepi',	created_on INTEGER(12) default 0 NOT NULL COMMENT 'timestamp UNIX de creation, pour savoir si la base est creee', updated_on INTEGER(12) default 0 NOT NULL COMMENT 'timestamp UNIX de modification',	PRIMARY KEY (id))Type=MyISAM COMMENT='Liste des etablissements en multisite';";
$migration[] = "DROP TABLE IF EXISTS m_logs;";
$migration[] = "CREATE TABLE m_logs(id INTEGER(4)  NOT NULL AUTO_INCREMENT COMMENT 'cle primaire de la table _logs',	debut INTEGER(12)  NOT NULL COMMENT 'timestamp UNIX du debut',	fin INTEGER(12)  NOT NULL COMMENT 'timestamp UNIX de la fin',	utilisateur_id INTEGER(4)  NOT NULL COMMENT 'cle etrangere de l\'utilisateur logue', type VARCHAR(30) default 'session' NOT NULL COMMENT 'Type de log', ip VARCHAR(30) NOT NULL COMMENT 'Adresse IP de l\'utilisateur', marqueur VARCHAR(30) NOT NULL COMMENT 'Marqueur le temps de la session',	PRIMARY KEY (id),	INDEX (utilisateur_id))Type=MyISAM COMMENT='Logs de connexion';";
$migration[] = "DROP TABLE IF EXISTS m_listusers;";
$migration[] = "CREATE TABLE m_listusers(id INTEGER(4)  NOT NULL AUTO_INCREMENT COMMENT 'cle primaire de la table m_listusers',	login VARCHAR(200)  NOT NULL COMMENT 'login de l\'utilisateur',	rne VARCHAR(15)  NOT NULL COMMENT 'RNE de l\'etablissement',	statut VARCHAR(50)  NOT NULL COMMENT 'Statut de l\'utilisateur',	created_on INTEGER(12) default 0 NOT NULL COMMENT 'timestamp UNIX de premiere connexion',	updated_on INTEGER(12) default 0 NOT NULL COMMENT 'timestamp UNIX de derniere connexion',	PRIMARY KEY (id)) ENGINE=MyISAM COMMENT='Liste des utilisateurs des differents etablissements';";
$migration[] = "INSERT INTO m_settings VALUES ('', 'titre', 'MultiGepi');";
$migration[] = "INSERT INTO m_settings VALUES ('', 'auth_sso', 'n');";
$migration[] = "INSERT INTO m_settings VALUES ('', 'version_base', '1');";
$migration[] = "INSERT INTO m_settings VALUES ('', 'gepiPath', '/gepi');";
$migration[] = "INSERT INTO m_settings VALUES ('', 'gepiHost', 'localhost');";
$migration[] = "INSERT INTO m_settings VALUES ('', 'gepiAdmin', 'admin');";
$migration[] = "INSERT INTO m_settings VALUES ('', 'gepiAuth', 'cas');";
$migration[] = "INSERT INTO m_settings VALUES ('', 'gepiRne', '033____');";
$migration[] = "INSERT INTO m_settings VALUES ('', 'gepiEnt', 'y');";
$migration[] = "INSERT INTO m_utilisateurs VALUES ('', 'superadmin', 'Multi', 'Gepi', 'M.',	'304bbcb83278e61aa0fb23ee7e62a92a',	'rien@ne_pas_repondre.fr',	'admin',	'n');";
?>
