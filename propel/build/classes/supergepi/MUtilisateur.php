<?php

require 'supergepi/om/BaseMUtilisateur.php';


/**
 * Skeleton subclass for representing a row from the 'm_utilisateurs' table.
 *
 * Utilisateurs du logiciel
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    supergepi
 */
class MUtilisateur extends BaseMUtilisateur {

	/**
	 * Initializes internal state of MUtilisateur object.
	 * @see        parent::__construct()
	 */
	public function __construct()
	{
		// Make sure that parent constructor is always invoked, since that
		// is where any default values for this object are set.
		parent::__construct();
	}

} // MUtilisateur
