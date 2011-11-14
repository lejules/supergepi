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
 * Fichier principal de contrôle de la liste de tous les utilisateurs de tous les GEPI
 */

/*************************************************************************************
 * ================================ VARIABLES ====================================== *
 *************************************************************************************/
$erreur       = isset($_GET["erreur"]) ? $_GET["erreur"] : NULL;
$msg          = NULL;



/*************************************************************************************
 * ============================== CODE METIER ====================================== *
 *************************************************************************************/
include 'lib/init_session.inc.php';
include 'lib/init.inc.php';
if ($user === NULL){header("Location:login.php");Die('STOP');}

// liste des établissements de la base
$listeEtab = MListeEtablissementQuery::create()->select(array('Nom', 'Rne', 'NomBase'))->orderBy('Rne')->orderBy('Nom')->find();

/*************************************************************************************
 * ================================ AFFICHAGE ====================================== *
 *************************************************************************************/
$aff_menu = 'o';
include 'layout/entete.php';

$oldlogin = isset($_POST['oldlogin']) ? $_POST['oldlogin'] : NULL;
$newlogin = isset($_POST['newlogin']) ? $_POST['newlogin'] : NULL;
$dbDb = isset($_POST['base']) ? $_POST['base'] : NULL;
$aff_msg = NULL;

if (isset($_POST['oldlogin']) && isset($_POST['newlogin'])) {
	$base = $dbDb;
	$liendb = mysql_connect($host, $user, $mdp);
	mysql_select_db($base);

	// test si login existe
	$sql = "select login from eleves where login='".$oldlogin."'";
	$resultat = mysql_query($sql);
	$test1 = mysql_num_rows($resultat);
	$sql = "select login from utilisateurs where login='".$oldlogin."'";
	$resultat = mysql_query($sql);
	$test2 = mysql_num_rows($resultat);
	if ($test1 == 0 && $test2 == 0){

		$aff_msg .= '<p style="color: red;">le login ' . $oldlogin . ' est inconnu dans la base</p>';

	} else {

		// si le login existe on le remplace par le nouveau table par table
		$tables = mysql_list_tables($base);

		while (list($table) = mysql_fetch_array($tables))
		{

			$champs = mysql_query("SHOW COLUMNS FROM $table");
			if (mysql_num_rows($champs) > 0) {
				while (list($row) = mysql_fetch_array($champs)) {

					$sql = "update $table set $row = replace($row,'".$oldlogin."','".$newlogin."') ";
					$resultat = mysql_query ($sql);
					$n = mysql_affected_rows();
					if ($n<>0){

						$aff_msg .= ('Le champ '.$row.' de la table '.$table.' a été mis à jour --> ' . $newlogin . '.<br />');

					}
				}
			}
		}
	}
}
?>

	<h2 class="gepi">Modifier le login d'un utilisateur de Gepi</h2>


		<form method="POST" action="admin_modifier_login.php">

			<fieldset id="modifLogin">
			<p>
				<label for="idbase">Choix de la base</label>
				<select name="base" id="idbase">
					<option value="rien">Quelle ?</option>
					<?php
                    foreach ($listeEtab as $etab) {
                      echo '
                     <option value="'.$etab['NomBase'].'">'.$etab['Rne'].' - '.$etab['Nom'].'</option>';
                    }
                    ?>
				</select>
			</p>
			<p>
				<label for="login1">ANCIEN LOGIN respecter la CASSE(Majuscules,minuscules): </label>
				<input type="text" id="login1" name="oldlogin" value="" />
			</p>
			<p>
				<label for="login2">NOUVEAU LOGIN: </label>
				<input type="text" id="login2" name="newlogin" value="" />
			</p>
			<p>
				<input type="submit" name="changer" value="Changer" />
			</p>
			<?php echo $aff_msg; ?>
			</fieldset>

		</form>


<?php include 'layout/piedepage.php'; ?>