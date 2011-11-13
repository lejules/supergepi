<?php


/**
 * This class adds structure of 'm_etablissements' table to 'supergepi' DatabaseMap object.
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
class MListeEtablissementMapBuilder implements MapBuilder {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'supergepi.map.MListeEtablissementMapBuilder';

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
		$this->dbMap = Propel::getDatabaseMap(MListeEtablissementPeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(MListeEtablissementPeer::TABLE_NAME);
		$tMap->setPhpName('MListeEtablissement');
		$tMap->setClassname('MListeEtablissement');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'INTEGER', true, 4);

		$tMap->addColumn('NOM', 'Nom', 'VARCHAR', true, 200);

		$tMap->addColumn('TYPE', 'Type', 'VARCHAR', true, 20);

		$tMap->addColumn('RNE', 'Rne', 'VARCHAR', true, 15);

		$tMap->addColumn('NOM_BASE', 'NomBase', 'VARCHAR', true, 30);

		$tMap->addColumn('USER_BASE', 'UserBase', 'VARCHAR', true, 30);

		$tMap->addColumn('MDP_BASE', 'MdpBase', 'VARCHAR', true, 30);

		$tMap->addColumn('HOST_BASE', 'HostBase', 'VARCHAR', true, 30);

		$tMap->addColumn('PATH', 'Path', 'VARCHAR', true, 30);

		$tMap->addColumn('CREATED_ON', 'CreatedOn', 'INTEGER', true, 12);

		$tMap->addColumn('UPDATED_ON', 'UpdatedOn', 'INTEGER', true, 12);

		$tMap->addValidator('NOM_BASE', 'unique', 'propel.validator.UniqueValidator', '', 'Cette base existe déjà !');

	} // doBuild()

} // MListeEtablissementMapBuilder
