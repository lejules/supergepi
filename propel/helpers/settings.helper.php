<?php
/**
 * @version $Id: settings.helper.php 17 2009-05-23 22:00:13Z jjocal $
 * @author Julien Jocal
 * @copyright 2009 Julien Jocal
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
 */

class settingshelper {

  /**
   * Attribut qui stocke la liste des settings de l'application
   * @var array
   */
  private $_reglages = '';

  public function  __construct() {
    $c = new Criteria();
    $settings = MSettingPeer::doSelect($c);
    foreach ($settings as $setting){
      $reglage[$setting->getNom()] = $setting->getValeur();
      $reglage['id_'.$setting->getNom()] = $setting->getId();
    }

    $this->_reglages = $reglage;

    return true;

  }

  public function  __get($name) {
    if (array_key_exists($name, $this->_reglages)){
      return $this->_reglages[$name];
    }else{
      return '<p>Ce r&eacute;glage ('.$name.') n\'existe pas dans cette base</p>';
    }
  }

  public function changeSetting($nom, $valeur){
    if ($this->is_new($nom)){
      $this->updateSetting($nom, $valeur);
    }else{
      $this->addSetting($nom, $valeur);
    }
  }

  private function addSetting($nom, $valeur){
    $add = new MSetting();
    $add->setNom($nom);
    $add->setValeur($valeur);
    //$add->save();

    // Et on l'ajoute à la liste des settings déjà chargées
    $this->_reglages[$nom] = $valeur;
  }

  private function updateSetting($nom, $valeur){
    $setting = MSettingPeer::retrieveByPK($this->_reglages["id_".$nom]);
    $setting->setValeur($valeur);
    $setting->save();

    $this->_reglages[$nom] = $valeur;
  }

  private function is_new($nom){
    if (array_key_exists($nom, $this->_reglages)){
      // C'est donc un setting qui existe déjà
      return true;
    }else{
      return false;
    }
  }
}
?>
