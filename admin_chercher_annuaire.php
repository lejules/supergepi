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
$rne        = isset($_POST['rne']) ? $_POST['rne'] : '0331667H';
$service    = isset($_POST['service']) ? $_POST['service'] : NULL;
$nom        = isset($_POST['nom']) ? $_POST['nom'] : NULL;
$enr        = isset($_POST['enr']) ? $_POST['enr'] : NULL;
$header     = isset($_POST['header']) ? $_POST['header'] : NULL;
$result     = NULL;



/*************************************************************************************
 * ============================== CODE METIER ====================================== *
 *************************************************************************************/
include 'lib/init_session.inc.php';
include 'lib/init.inc.php';
include 'lib/annuaire.inc.php';

if ($user === NULL){header("Location:login.php");Die('STOP');}
if (!isset ($annuaire)){die('il manque des informations pour se connecter à l\'annuaire');}

if (!is_null($nom) AND !is_null($service)){
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_POST, 1);
  $_data = array(
      'client' => $annuaire['client'],
      'cleApi' => $annuaire['cle'],
      'service' => $service,
      'nom'=> $nom,
      'rne' => $rne
  );
  curl_setopt($ch, CURLOPT_URL, $annuaire['url']);
  curl_setopt($ch, CURLOPT_POSTFIELDS, $_data);

  // On appelle enfin le serveur
  $result = curl_exec($ch);
  if ($enr == 'ok'){
    //file_put_contents('temp/sarapis_'.$_data['service'].'_'.$_data['rne'].'.xml', $result);
  }
  if ($header == 'xml'){
    header ('Content-Type: text/xml');
  }
}
/*************************************************************************************
 * ================================ AFFICHAGE ====================================== *
 *************************************************************************************/
$aff_menu = 'o';
include 'layout/entete.php';

if (is_null($result)){
?>

    <h2>Chercher des utilisateurs dans l'annuaire</h2>
    <form method="post" action="admin_chercher_annuaire.php">
      <fieldset style="border: 2px solid turquoise;-moz-border-radius:10px;padding: 10px 10px 10px 10px;-webkit-border-radius:10px;-khtml-border-radius:10px;border-radius:10px;">
        <legend>L'établissement</legend>
        <p>
          <label for="idRne">RNE : </label>
          <input id="idRne" type="text" name="rne" value="0" />
        </p>
      </fieldset>
      <fieldset style="border: 2px solid turquoise;-moz-border-radius:10px;padding: 10px 10px 10px 10px;-webkit-border-radius:10px;-khtml-border-radius:10px;border-radius:10px;">
        <legend>Demande</legend>
        <p>
          <label for="idService">Type de demande</label>
          <select name="service" id="idService">
            <option value="getEtablissementByRne">Etablissement</option>
            <option value="getAllProfesseursByRne">Professeurs (tous)</option>
            <option value="getAllElevesByRne">Elèves (tous)</option>
            <option value="getAllPersonnelBySiren">Personnel (by siren)</option>
            <option value="getAllResponsablesWithEnfantsByRne">Responsables</option>
            <option value="getEleveByNom">Elève (par nom)</option>
            <option value="getProfesseurByNom">Professeur (par nom)</option>
          </select>
        </p>
        <p>
          <label for="idNom">Nom à chercher</label>
          <input id="idNom" type="text" name="nom" value="" />
        </p>
        <p>
          <label for="idEnr">Faut-il enregistrer le résultat sur DD ?</label>
          <input id="idEnr" type="checkbox" name="enr" value="ok" />
        </p>
        <p>
          <label for="idHeader">Est-ce un fichier XML ?</label>
          <input id="idHeader" type="checkbox" name="header" value="xml" />
        </p>
        <p>
          <input id="idEnregistrer" type="submit" name="demander" value="Faire sa demande" />
        </p>
      </fieldset>
    </form>

<?php
}else{
  if ($header != 'xml'){
    echo '<pre>';
    echo $result;
    echo '</pre>';
  }else{
    echo $result;
  }
}
include 'layout/piedepage.php'; ?>