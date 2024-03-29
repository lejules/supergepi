<?php


/**
 * This class adds structure of 'm_logs' table to 'supergepi' DatabaseMap object.
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
class MLogConnexionMapBuilder implements MapBuilder {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'supergepi.map.MLogConnexionMapBuilder';

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
		$this->dbMap = Propel::getDatabaseMap(MLogConnexionPeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(MLogConnexionPeer::TABLE_NAME);
		$tMap->setPhpName('MLogConnexion');
		$tMap->setClassname('MLogConnexion');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'INTEGER', true, 4);

		$tMap->addColumn('DEBUT', 'Debut', 'INTEGER', true, 12);

		$tMap->addColumn('FIN', 'Fin', 'INTEGER', true, 12);

		$tMap->addColumn('IP', 'Ip', 'VARCHAR', true, 30);

		$tMap->addColumn('TYPE', 'Type', 'VARCHAR', true, 30);

		$tMap->addColumn('MARQUEUR', 'Marqueur', 'VARCHAR', true, 30);

		$tMap->addForeignKey('UTILISATEUR_ID', 'UtilisateurId', 'INTEGER', 'm_utilisateurs', 'ID', true, 4);

	} // doBuild()

} // MLogConnexionMapBuilder
