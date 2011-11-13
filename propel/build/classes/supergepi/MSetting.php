<?php

require 'supergepi/om/BaseMSetting.php';


/**
 * Skeleton subclass for representing a row from the 'm_settings' table.
 *
 * Reglages de l'interface
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    supergepi
 */
class MSetting extends BaseMSetting {

	/**
	 * Initializes internal state of MSetting object.
	 * @see        parent::__construct()
	 */
	public function __construct()
	{
		// Make sure that parent constructor is always invoked, since that
		// is where any default values for this object are set.
		parent::__construct();
	}

} // MSetting
