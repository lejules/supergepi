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
 * Entête de toutes les pages de superGepi
 */
$aff_civ    = isset($_SESSION["civ"]) ? $_SESSION["civ"] : NULL;
$aff_nom    = isset($_SESSION["nom"]) ? $_SESSION["nom"] : NULL;
$aff_prenom = isset($_SESSION["prenom"]) ? $_SESSION["prenom"] : NULL;
$_obs = NULL;
if (isset($use_focus)){
  $_obs = 'donnerFocus(\''.$use_focus.'\');';
}

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
        <title><?php echo $titre; ?></title>
        <script type="text/javascript" src="javascript/prototype.js"></script>
        <script type="text/javascript" src="javascript/fonctions.js"></script>
        <link href="css/style.css" rel="stylesheet" type="text/css"/>
    </head>
    <body onload="observeur();<?php echo $_obs; ?>">

<div id="entete">
<p class="red absolute"><?php echo $aff_civ . ' ' . $aff_prenom . ' ' . $aff_nom; ?>&nbsp;&nbsp;</p>
  <h2><!-- le titre --><?php echo $titre; ?></h2>

</div>
<?php
if (isset($aff_menu)){
  echo '
  <ol id="essaiMenu">
    <li><a href="index.php">Accueil</a></li>
    <li><a href="admin_statistiques.php">Statistiques Gepi</a></li>
    <li><a href="admin_modifier_login.php">Modifier logins Gepi</a></li>
    <li><a href="admin_chercher_annuaire.php">Rechercher annuaire</a></li>
    <li><a href="admin_annuaire_sansetab.php">Annuaire sans établissement</a></li>
    <li><a href="admin_reglages.php">R&eacute;glages</a></li>
	<li><a href="admin_multi_perso.php">Mon compte</a></li>
    <li><a href="logout.php">d&eacute;connexion</a></li>
  </ol>';
}