<?php


/**
 * This class adds structure of 'm_utilisateurs' table to 'supergepi' DatabaseMap object.
 *
 *
 *
 * These statically-built map classes are used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    supergepi.map
 */
class MUtilisateurMapBuilder implements MapBuilder {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'supergepi.map.MUtilisateurMapBuilder';

	/**
	 * The database map.
	 */
	private $dbMap;

	/**
	 * Tells us if this DatabaseMapBuilder is built so that we
	 * don't have to re-build it every time.
	 *
	 * @return     boolean true if this DatabaseMapBuilder is built, false otherwise.
	 */
	public function isBuilt()
	{
		return ($this->dbMap !== null);
	}

	/**
	 * Gets the databasemap this map builder built.
	 *
	 * @return     the databasemap
	 */
	public function getDatabaseMap()
	{
		return $this->dbMap;
	}

	/**
	 * The doBuild() method builds the DatabaseMap
	 *
	 * @return     void
	 * @throws     PropelException
	 */
	public function doBuild()
	{
		$this->dbMap = Propel::getDatabaseMap(MUtilisateurPeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(MUtilisateurPeer::TABLE_NAME);
		$tMap->setPhpName('MUtilisateur');
		$tMap->setClassname('MUtilisateur');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'INTEGER', true, 4);

		$tMap->addColumn('LOGIN', 'Login', 'VARCHAR', true, 50);

		$tMap->addColumn('NOM', 'Nom', 'VARCHAR', true, 50);

		$tMap->addColumn('PRENOM', 'Prenom', 'VARCHAR', true, 50);

		$tMap->addColumn('CIVILITE', 'Civilite', 'VARCHAR', true, 5);

		$tMap->addColumn('PASSWORD', 'Password', 'VARCHAR', true, 100);

		$tMap->addColumn('EMAIL', 'Email', 'VARCHAR', true, 100);

		$tMap->addColumn('STATUT', 'Statut', 'VARCHAR', true, 20);

		$tMap->addColumn('SSO', 'Sso', 'CHAR', true, 1);

	} // doBuild()

} // MUtilisateurMapBuilder
