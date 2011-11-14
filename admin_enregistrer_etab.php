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
 * Fichier qui permet d'enregistrer une nouvelle base
 */

// ================================ VARIABLES ===========================
$_nom         = isset($_POST["nom"]) ? $_POST["nom"] : NULL;
$_type        = isset($_POST["type"]) ? $_POST["type"] : NULL;
$_rne         = isset($_POST["rne"]) ? $_POST["rne"] : NULL;
$_admin       = isset($_POST["admin"]) ? $_POST["admin"] : NULL;
$_user        = isset($_POST["user"]) ? $_POST["user"] : NULL;
$_mdp         = isset($_POST["mdp"]) ? $_POST["mdp"] : NULL;
$_base        = isset($_POST["base"]) ? $_POST["base"] : NULL;
$_host        = isset($_POST["host"]) ? $_POST["host"] : NULL;
$_path        = isset($_POST["path"]) ? $_POST["path"] : NULL;
$_use_ent     = isset($_POST["use_ent"]) ? $_POST["use_ent"] : NULL;
$_ajoutadmin  = isset($_POST["ajoutadmin"]) ? $_POST["ajoutadmin"] : NULL;
$_auth_sso    = isset($_POST["auth_sso"]) ? $_POST["auth_sso"] : NULL;
$_enregistrer = isset($_POST["enregistrer"]) ? $_POST["enregistrer"] : NULL;

$msg          = NULL;
$marqueur     = 'no';

// ============================= CODE METIER ============================
include 'lib/init_session.inc.php';
include 'lib/init.inc.php';
if ($user === NULL){header("Location:login.php");Die('STOP');}

if ($user->getStatut() != 'admin'){
  Die('Erreur');
}

// une demande arrive
if ($_enregistrer == "Enregistrer"){
  // On teste si tous les champs sont bien remplis
  if (in_array('', $_POST)){

    header("Location:index.php?erreur=1");

  }else{

	// si le path est égal à /, alors il est nul
	if ($_path == "/"){
		$_path = "";
	}
  
    // On teste si on peut créer la base
    $createbase = "CREATE DATABASE ".$_base."";
    $createuser = "CREATE USER '".$_user."'@'".$_host."' IDENTIFIED BY '".$_mdp."'";
    $grant      = "GRANT USAGE ON * . * TO '".$_user."'@'".$_host."' IDENTIFIED BY '".$_mdp."' WITH MAX_QUERIES_PER_HOUR 0 MAX_CONNECTIONS_PER_HOUR 0 MAX_UPDATES_PER_HOUR 0 MAX_USER_CONNECTIONS 0 ";
    $grant1     = "GRANT ALL PRIVILEGES ON `".$_base."` . * TO '".$_user."'@'".$_host."'";
    $cnx        = Propel::getConnection();
    $op_base    = $cnx->prepare($createbase);
    $op_user    = $cnx->prepare($createuser);
    $op_grant   = $cnx->prepare($grant);
    $op_grant1  = $cnx->prepare($grant1);

    if ($op_base->execute() AND $op_user->execute() AND $op_grant->execute() AND $op_grant1->execute()){
      // Il faut donc inscrire cet établissement dans la base
      $etab = new MListeEtablissement();
      $etab->setNom($_nom);
      $etab->setType($_type);
      $etab->setRne($_rne);
      $etab->setNomBase($_base);
      $etab->setUserBase($_user);
      $etab->setMdpBase($_mdp);
      $etab->setHostBase($_host);
      $etab->setPath($_path);
      $etab->setCreatedOn(date("U"));

      if ($etab->save()){
        $marqueur = 'ok';
        // on enregistre alors un log de création de base
        $log = new MLogConnexion();
        $log->setDebut(date("U"));
        $log->setUtilisateurId($_SESSION["id"]);
        $log->setIp($_SERVER["REMOTE_ADDR"]);
        $log->setType('creation base');
        $log->save();

      }else{
        header("Location:index.php?erreur=3");
      }

    }else{
      header('Location:index.php?erreur=2');
    }

    // Si on arrive ici, c'est que la base de données est crée, que l'utilisateur est créé avec son mdp et les droits qui vont bien sur cette base
    if ($marqueur == 'ok'){
      // Il faut maintenant créer la structure de la base (fichier /slq/structure_gepi.sql)
      $fd = fopen("./sql/structure_gepi.sql", "r");
      $result_ok = 'yes';
      while (!feof($fd)) {

        $query = fgets($fd, 8000);
        $query = trim($query);

        if((substr($query,-1)==";")&&(substr($query,0,3)!="-- ")) {

          /**
           * @todo : je ne suis pas arrivé à faire la suite en utilisant PDO, il ne veut pas travailler sur la base qui vient d'être créée
           * @todo Ce n'est pas satisfaisant mais je suis passé sur une connexion classique (alors que la connexion de Propel n'est pas fermée)
           *
           * @var $connect identifiant de connexion classique
           */

          $connect = mysql_connect($_host, $_user, $_mdp);
          mysql_select_db ($_base);

          if (mysql_query(substr($query, 0, -1))) {
            $result_ok = 'yes';
          }else{
            header("Location:index.php?erreur=4");
            Die();
            $result_ok = 'no';
          }
        }
      }
      fclose($fd);

      if ($result_ok == 'yes') {
        $fd = fopen("./sql/data_gepi.sql", "r");
    		while (!feof($fd)) {
    			$query = fgets($fd, 5000);
      		$query = trim($query);

        	if((substr($query,-1)==";")&&(substr($query,0,3)!="-- ")) {

            if (mysql_query($query)) {
              $result_ok = 'yes';
      			}else{
              header("Location:index.php?erreur=5");
              Die();
              $result_ok = 'no';
            }
        	}
        }
        fclose($fd);
      }
    } // fin du if ($marqueur == "ok") {...

    // Si c'est demandé, on insère les informations prévues pour un ENT, le CAS,...
    if ($_use_ent == 'y'){
      $sql = 'UPDATE '.$_base.'.setting SET VALUE="y" WHERE NAME="use_ent"';
      mysql_query($sql);
    }
    if ($_auth_sso == 'cas'){
      $sql = 'UPDATE '.$_base.'.setting SET VALUE="cas" WHERE NAME="auth_sso"';
      mysql_query($sql);
    }
    if ($_ajoutadmin == 'y'){
      $_insert_mdp = $_auth_sso == 'cas' ? '' : 'ab4f63f9ac65152575886860dde480a1';
      $_insert_auth = $_auth_sso == 'cas' ? 'sso' : 'gepi';
      $sql = "INSERT INTO ".$_base.".utilisateurs SET login = '".$_admin."', nom = 'GEPI', prenom = 'Administrateur', civilite = 'M.', password = '".$_insert_mdp."', statut = 'administrateur', etat = 'actif', change_mdp = 'n', auth_mode = '".$_insert_auth."'";
      mysql_query($sql);
    }

    mysql_query("INSERT INTO ".$_base.".setting VALUES ('gepiSchoolRne', '".$_rne."')");
    mysql_query("INSERT INTO `utilisateurs` ( `login` , `nom` , `prenom` , `civilite` , `password` , `email` , `show_email` , `statut` , `etat` , `change_mdp` , `date_verrouillage` , `password_ticket` , `ticket_expiration` , `niveau_alerte` , `observation_securite` , `temp_dir` , `numind` , `auth_mode` ) VALUES ('adm.gepi', 'SUPERADMIN', 'GEPI', 'M.', '', '', 'no', 'administrateur', 'actif', 'n', '2006-01-01 00:00:00', '', '', '0', '0', '', '', 'sso')");
    mysql_query("set password for ".$_user."@localhost=password('".$_mdp."')") OR DIE(__LINE__);

    /**
     * Il ne reste plus alors qu'à modifier le fichier multisite.ini pour y ajouter cet établissement
     * Il devrait y avoir des soucis avec les droits des utilisateurs des serveurs web pour modifier le fichier multisite.ini
     */
    $test = fopen("../secure/multisite.ini", "a+");

          $etab = "
[".$_rne."]
nomhote		= ".$_host."
mysqluser	= ".$_user."
mysqlmdp	= ".$_mdp."
nombase		= ".$_base."
pathname	= ".$_path;
      fwrite($test, $etab);
      fclose($test);


    if ($result_ok == 'yes'){
      header("Location:index.php?erreur=99");
      Die();
    }

  }



}else{
  header("Location:index.php");
}
?>
