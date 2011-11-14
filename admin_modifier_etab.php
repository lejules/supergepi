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
 * Fichier qui permet d'enregistrer lesmodifications sur une base existante
 */

// ========================================= VARIABLES =====================================
$_nom         = isset($_POST["_nom"]) ? $_POST["_nom"] : NULL;
$_type        = isset($_POST["_type"]) ? $_POST["_type"] : NULL;
$_rne         = isset($_POST["_rne"]) ? $_POST["_rne"] : NULL;
$_base        = isset($_POST["_base"]) ? $_POST["_base"] : NULL;
$_host        = isset($_POST["_host"]) ? $_POST["_host"] : NULL;
$_user        = isset($_POST["_user"]) ? $_POST["_user"] : NULL;
$_mdp         = isset($_POST["_mdp"]) ? $_POST["_mdp"] : NULL;
$_path        = isset($_POST["_path"]) ? $_POST["_path"] : NULL;
$_id          = isset($_POST["_id"]) ? $_POST["_id"] : NULL;
$enregistrer  = isset($_POST["enregistrer"]) ? $_POST["enregistrer"] : NULL;

$marqueur = $marqueur_bis = 'no';

// ======================================= CODE METIER =====================================
include 'lib/init_session.inc.php';
include 'lib/init.inc.php';
if ($user === NULL){header("Location:login.php");Die('STOP');}

if ($enregistrer == 'Enregistrer'){

  $etablissement = MListeEtablissementPeer::retrieveByPK($_id);
  $reserve_etab = clone $etablissement; // on met en réserve les anciennes données de cet établissement.

  // On met à jour les données
  $etablissement->setNom($_nom);
  $etablissement->setRne($_rne);
  $etablissement->setType($_type);
  //$etablissement->setNomBase($_base); // il vaut mieux éviter de la modifier
  $etablissement->setUserBase($_user);
  $etablissement->setMdpBase($_mdp);
  $etablissement->setHostBase($_host);
  $etablissement->setPath($_path);
  $etablissement->setUpdatedOn(date("U"));

  if ($etablissement->save()){
    $marqueur = 'ok';
  }

  // Il faut maintenant modifier les données sur l'utilisateur de la base

  if ($marqueur == 'ok'){

      $cnx        = Propel::getConnection();

    // On vérifie si le nom de l'utilisateur est changé
    if ($etablissement->getUserBase() != $reserve_etab->getUserBase()){
      $createuser = "CREATE USER '".$_user."'@'".$_host."' IDENTIFIED BY '".$_mdp."'";
      $grant      = "GRANT USAGE ON * . * TO '".$_user."'@'".$_host."' IDENTIFIED BY '".$_mdp."' WITH MAX_QUERIES_PER_HOUR 0 MAX_CONNECTIONS_PER_HOUR 0 MAX_UPDATES_PER_HOUR 0 MAX_USER_CONNECTIONS 0 ";
      $grant1     = "GRANT ALL PRIVILEGES ON `".$_base."` . * TO '".$_user."'@'".$_host."'";
      $ex_user    = "DROP USER '".$reserve_etab->getUserBase()."'@'".$reserve_etab->getHostBase()."'";
      $reserve_etab->setUserBase($_user); // car l'ancien user est détruit
      $reserve_etab->setMdpBase($_mdp); // car l'ancien user et son mdp ont été supprimé

      $op_user    = $cnx->prepare($createuser);
      $op_grant   = $cnx->prepare($grant);
      $op_grant1  = $cnx->prepare($grant1);
      $op_exuser  = $cnx->prepare($ex_user);


      if ($op_exuser->execute() AND $op_user->execute() AND $op_grant->execute() AND $op_grant1->execute()){
        $marqueur_bis = 'ok';
      }
    } // fin de la modification de l'utilisateur MySql
    // On modifie seulement le mot de passe de l'utilisateur MySql
    /**
     * @todo ça ne marche pas :
     * PDOException: SQLSTATE[42000]: Syntax error or access violation: 1133
     * Can't find any matching row in the user table in /var/www/supergepi/propel/propel/util/DebugPDOStatement.php on line 61
     */
    $connect = mysql_connect($_host, $reserve_etab->getUserBase(), $reserve_etab->getMdpBase());
    mysql_select_db ($_base);
    $modif_mdp    = "SET PASSWORD FOR '".$_user."'@'".$_host."' = PASSWORD( '".$_mdp."' )";
    //$sql          = " SET PASSWORD FOR 'wwwgepitesteur'@'localhost' = PASSWORD( '****' )  ";
    //$op_mdp       = $cnx->prepare($modif_mdp);

    //if ($op_mdp->execute()){
    if (mysql_query($modif_mdp)){
      $marqueur_bis = 'ok';
    }

  } // if ($marqueur == 'ok'){...


  // Il faut maintenant modifier le fichier multisite.ini
  // Pour cela on utilise les anciennes données de l'utilisateur MySql
  if ($marqueur == 'ok' AND $marqueur_bis == 'ok'){

    // On efface les lignes qui concernent l'ancien RNE
    $tab  = file('../gepi/secure/multisite.ini');
    $m    = 99999;

    $nbre = count($tab);
      for($a = 0 ; $a < $nbre ; $a++){
        if (trim($tab[$a]) == $etablissement->getRne()){
          $m = $a;

          $tab[$m] = '['.$_rne.']';
          $tab[$m+1] = 'nomhote   = '.$_host;
          $tab[$m+2] = 'mysqluser	= '.$_user;
          $tab[$m+3] = 'mysqlmdp	= '.$_mdp;
          $tab[$m+4] = 'nombase		= '.$_base;
          $tab[$m+5] = 'pathname	= '.$_path;

        }
      }

    $test = fopen("../gepi/secure/multisite.ini", "w");
    fwrite($test, implode("\n", $tab));
    fclose($test);

    header("Location:index.php?erreur=10");
    Die();

  }else{
    header("Location:logout.php");
    Die();
  }



}else{
  header("Location:logout.php");
  Die('');
}


$titre = 'Modifier les donn&eacute;es pour un &eacute;tablissement';
include 'layout/entete.php';
?>




<?php include 'layout/piedepage.php'; ?>