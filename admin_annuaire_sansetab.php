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
 * Fichier principal de contrôle des bases de données de Gepi en multisite
 */

// ================================ VARIABLES ========================================
$enregistrer  = isset($_POST["enregistrer"]) ? $_POST["enregistrer"] : NULL;
$erreur       = isset($_GET["erreur"]) ? $_GET["erreur"] : NULL;
$erreur       = isset($_POST["enregistrer"]) ? $_POST["enregistrer"] : NULL;
$csv          = isset($_POST["csv"]) ? $_POST["csv"] : NULL;
$nom          = isset($_POST["nom"]) ? $_POST["nom"] : NULL;
$login        = isset($_POST["login"]) ? $_POST["login"] : NULL;
$msg          = NULL;

// ============================= CODE METIER =========================================

include 'lib/init_session.inc.php';
include 'lib/init.inc.php';

if ($user === NULL){header("Location:login.php");Die('STOP');}

if ($enregistrer == 'Enregistrer'){
  $msg .= '<div style="padding: 5px 5px 5px 5px;border:1px solid red;">';
  // on traite le fichier csv
  if ($_FILES['csv']['error'] > 0){
    $msg .= "Erreur lors du transfert";
  // fichier csv ?
  }elseif(strtolower(  substr(  strrchr($_FILES['csv']['name'], '.')  ,1)  ) != 'csv'){
    $msg .= "Il faut fournir un fichier csv";
  // On peut y aller
  }else{
    $taille = 1024;
    $delimiteur = ";";
    $marqueur = 0;
    if($fp = fopen($_FILES['csv']['tmp_name'],"r")) {
      while ($ligne = fgetcsv($fp, $taille, $delimiteur)) {
        $new = new UtilisateurSansEtab();
        $new->setUid($ligne[0]);
        $new->setNom($ligne[1]);
        $new->setPrenom($ligne[2]);
        $new->setLogin($ligne[3]);
        $new->setMdp($ligne[4]);
        if ($new->save()){
          $msg .= $ligne[3] . 'utilisateur ajouté<br />';
        }
      }
    } else {
      echo "Ouverture impossible.";
    }
  }
}
if ($enregistrer == 'Chercher'){
  $msg .= '<div style="padding: 5px 5px 5px 5px;border:1px solid red;">';
  // On cherche cet utilisateur
  if (!is_null($nom) AND $nom != ''){
    $cherche = UtilisateurSansEtabQuery::create()->filterByNom('%'.$nom.'%')->find();
  }  else {
    $cherche = UtilisateurSansEtabQuery::create()->filterByLogin('%'.$login.'%')->find();
  }
  if (!$cherche->isEmpty()){
    foreach ($cherche as $trouve) {
      $msg .= '<br />' . $trouve->getUid() . ' ' . $trouve->getNom() . ' ' . $trouve->getPrenom() . ' ' . $trouve->getLogin() . ' ' . $trouve->getMdp();
    }
  }
}
if (!is_null($msg)){
  $msg .= '</div>';
}
/****************** AFFICHAGE ******************************/

$titre = 'Retrouver un utilisateur sans établissement (login, mdp,...)';
$aff_menu = 'o';
include 'layout/entete.php';
echo $msg;
?>
<br />
<form method="post" action="admin_annuaire_sansetab.php" enctype="multipart/form-data">
  <fieldset style="padding: 5px 5px 5px 5px;">
    <legend class="rond">Ajouter des comptes par fichier csv</legend>
    <p>
      <label for="idcsv">Fichier</label>
      <input type="file" name="csv" value="" id="idcsv" />
    </p>
    <p>
      <input type="submit" name="enregistrer" value="Enregistrer" />
    </p>
  </fieldset>
</form>
<br />
<form method="post" action="admin_annuaire_sansetab.php">
  <fieldset style="padding: 5px 5px 5px 5px;">
    <legend>Chercher un utilisateur</legend>
    <p>
      <label for="idNom">Nom : </label>
      <input type="text" name="nom" value="" id="idNom" />
    </p>
    <p>
      <label for="idLogin">Login : </label>
      <input type="text" name="login" value="" id="idLogin" />
    </p>
    <p>
      <input type="submit" name="enregistrer" value="Chercher" />
    </p>
  </fieldset>
</form>

<?php include 'layout/piedepage.php'; ?>