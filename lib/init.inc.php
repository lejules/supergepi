<?php
/**
 * @version $$
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
 * Initialisation de la connexion et de l'ORM
 */
   require_once("./securite/connectbase.inc.php");
   include './propel/helpers/settings.helper.php';
   //propel objects
   set_include_path("./propel/build/classes" . PATH_SEPARATOR . "./propel" . PATH_SEPARATOR . get_include_path());
   require_once("propel/Propel.php");
   Propel::setLogger(null);
   Propel::init("./propel/build/conf/supergepi-conf.php");

$fichier = array_pop(explode("/", $_SERVER["PHP_SELF"]));

try{

  $settings = new settingshelper();

}catch(Exception $e){

    if ($fichier != 'init.php'){
      header("Location:init.php");
      Die();
    }

}

$user = (isset($_SESSION["id"])) ? MUtilisateurPeer::retrieveByPK($_SESSION["id"]) : NULL;

 // On teste le marqueur de cette session pour voir s'il est valide
unset($_GET['pasdesession']);
unset($_POST['pasdesession']);
unset($_COOKIE['pasdesession']);
unset($_REQUEST['pasdesession']);// dans le cas où les réglages du serveur ne seraient pas bons (register_global)
if ((isset($pasdesession) && $pasdesession == 'y')){

}elseif (isset($_SESSION["login"]) AND !empty($_SESSION["login"])){
  $log_user = MLogConnexionPeer::retrieveByPK($_SESSION["log_id"]);
  if ($_SESSION["marqueur"] != $log_user->getMarqueur()){
    Die('La loi française interdit et punit les tentatives de piratage des systèmes informatiques');
  }
}else{
  if ($fichier != 'login.php'){
    header("Location:login.php");
    Die();
  }
}
$titre = $settings->titre;

// fonction d'écriture des logs de sécurité
function ecrire_log($fichier, $ligne, $message, $info1 = 'rien', $info2 = 'rien2'){
  @file_put_contents('temp/multigepi.log', "\n" . '# ' . $fichier . '(' . $ligne . ') :: ' . $message . ' - ' . $info1 . ' - ' . $info2, FILE_APPEND);
}
?>
