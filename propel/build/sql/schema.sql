
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

#-----------------------------------------------------------------------------
#-- m_utilisateurs
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS m_utilisateurs;


CREATE TABLE m_utilisateurs
(
	id INTEGER(4)  NOT NULL AUTO_INCREMENT COMMENT 'cle primaire de la table utilisateurs',
	login VARCHAR(50)  NOT NULL COMMENT 'Login de l\'utilisateur',
	nom VARCHAR(50)  NOT NULL COMMENT 'Nom de l\'utilisateur',
	prenom VARCHAR(50)  NOT NULL COMMENT 'Prenom de l\'utilisateur',
	civilite VARCHAR(5)  NOT NULL COMMENT 'Civilite',
	password VARCHAR(100)  NOT NULL COMMENT 'Mot de passe',
	email VARCHAR(100)  NOT NULL COMMENT 'Email de l\'utilisateur',
	statut VARCHAR(20) default 'inscripteur' NOT NULL COMMENT 'Statut de l\'utilisateur',
	sso CHAR(1) default 'n' NOT NULL COMMENT 'Si l\'utilisateur existe en sso',
	PRIMARY KEY (id)
) ENGINE=MyISAM COMMENT='Utilisateurs du logiciel';

#-----------------------------------------------------------------------------
#-- m_settings
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS m_settings;


CREATE TABLE m_settings
(
	id INTEGER(4)  NOT NULL AUTO_INCREMENT COMMENT 'cle primaire de la table m_settings',
	nom VARCHAR(100)  NOT NULL COMMENT 'Nom du reglage',
	valeur VARCHAR(100)  NOT NULL COMMENT 'Valeur de ce reglage',
	PRIMARY KEY (id)
) ENGINE=MyISAM COMMENT='Reglages de l\'interface';

#-----------------------------------------------------------------------------
#-- m_etablissements
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS m_etablissements;


CREATE TABLE m_etablissements
(
	id INTEGER(4)  NOT NULL AUTO_INCREMENT COMMENT 'cle primaire de la table m_etablissements',
	nom VARCHAR(200)  NOT NULL COMMENT 'Nom de l\'etablissement',
	type VARCHAR(20)  NOT NULL COMMENT 'Type de l\'etablissement (clg, lyc, cfa, ecole, ...)',
	rne VARCHAR(15)  NOT NULL COMMENT 'Nombre de place disponible pour cet atelier',
	nom_base VARCHAR(30) default '0' NOT NULL COMMENT 'Base de donnees de cet etablissement',
	user_base VARCHAR(30) default '0' NOT NULL COMMENT 'Utilisateur MySql de cette Base de donnees',
	mdp_base VARCHAR(30) default '0' NOT NULL COMMENT 'mdp de l\'utilisateur MySql de cette Base de donnees',
	host_base VARCHAR(30) default '0' NOT NULL COMMENT 'Domaine du serveur MySql',
	path VARCHAR(30) default '0' NOT NULL COMMENT 'Chemin relatif de Gepi',
	created_on INTEGER(12) default 0 NOT NULL COMMENT 'timestamp UNIX de creation, pour savoir si la base est creee',
	updated_on INTEGER(12) default 0 NOT NULL COMMENT 'timestamp UNIX de modification',
	PRIMARY KEY (id)
) ENGINE=MyISAM COMMENT='Liste des etablissements en multisite';

#-----------------------------------------------------------------------------
#-- m_logs
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS m_logs;


CREATE TABLE m_logs
(
	id INTEGER(4)  NOT NULL AUTO_INCREMENT COMMENT 'cle primaire de la table _logs',
	debut INTEGER(12)  NOT NULL COMMENT 'timestamp UNIX du debut',
	fin INTEGER(12)  NOT NULL COMMENT 'timestamp UNIX de la fin',
	ip VARCHAR(30) default '0' NOT NULL COMMENT 'Adresse IP de l\'utilisateur',
	type VARCHAR(30) default 'session' NOT NULL COMMENT 'Type de log',
	marqueur VARCHAR(30) default '0' NOT NULL COMMENT 'Marqueur le temps de la session',
	utilisateur_id INTEGER(4)  NOT NULL COMMENT 'cle etrangere de l\'utilisateur logue',
	PRIMARY KEY (id),
	INDEX m_logs_FI_1 (utilisateur_id),
	CONSTRAINT m_logs_FK_1
		FOREIGN KEY (utilisateur_id)
		REFERENCES m_utilisateurs (id)
		ON DELETE CASCADE
) ENGINE=MyISAM COMMENT='Logs de connexion';

#-----------------------------------------------------------------------------
#-- m_listusers
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS m_listusers;


CREATE TABLE m_listusers
(
	id INTEGER(4)  NOT NULL AUTO_INCREMENT COMMENT 'cle primaire de la table m_listusers',
	login VARCHAR(200)  NOT NULL COMMENT 'login de l\'utilisateur',
	rne VARCHAR(15)  NOT NULL COMMENT 'RNE de l\'etablissement',
	statut VARCHAR(50)  NOT NULL COMMENT 'Statut de l\'utilisateur',
	created_on INTEGER(12) default 0 NOT NULL COMMENT 'timestamp UNIX de première connexion',
	updated_on INTEGER(12) default 0 NOT NULL COMMENT 'timestamp UNIX de dernière connexion',
	PRIMARY KEY (id)
) ENGINE=MyISAM COMMENT='Liste des utilisateurs des differents etablissements';

#-----------------------------------------------------------------------------
#-- annuaire_users_sans_etab
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS annuaire_users_sans_etab;


CREATE TABLE annuaire_users_sans_etab
(
	id INTEGER(4)  NOT NULL AUTO_INCREMENT COMMENT 'cle primaire de la table',
	uid VARCHAR(15)  NOT NULL COMMENT 'uid de l\'utilisateur',
	nom VARCHAR(100)  NOT NULL COMMENT 'Nom de l\'utilisateur',
	prenom VARCHAR(100)  NOT NULL COMMENT 'Prenom de l\'utilisateur',
	login VARCHAR(200)  NOT NULL COMMENT 'login de l\'utilisateur',
	mdp VARCHAR(200)  NOT NULL COMMENT 'mot de passe de l\'utilisateur',
	created_on INTEGER(12) default 0 NOT NULL COMMENT 'timestamp UNIX de creation',
	PRIMARY KEY (id)
) ENGINE=MyISAM COMMENT='Liste des utilisateurs sans établissements';

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
