<?php



/**
 * This class defines the structure of the 'm_etablissements' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.supergepi.map
 */
class MListeEtablissementTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'supergepi.map.MListeEtablissementTableMap';

	/**
	 * Initialize the table attributes, columns and validators
	 * Relations are not initialized by this method since they are lazy loaded
	 *
	 * @return     void
	 * @throws     PropelException
	 */
	public function initialize()
	{
	  // attributes
		$this->setName('m_etablissements');
		$this->setPhpName('MListeEtablissement');
		$this->setClassname('MListeEtablissement');
		$this->setPackage('supergepi');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, 4, null);
		$this->addColumn('NOM', 'Nom', 'VARCHAR', true, 200, null);
		$this->addColumn('TYPE', 'Type', 'VARCHAR', true, 20, null);
		$this->addColumn('RNE', 'Rne', 'VARCHAR', true, 15, null);
		$this->addColumn('NOM_BASE', 'NomBase', 'VARCHAR', true, 30, '0');
		$this->addColumn('USER_BASE', 'UserBase', 'VARCHAR', true, 30, '0');
		$this->addColumn('MDP_BASE', 'MdpBase', 'VARCHAR', true, 30, '0');
		$this->addColumn('HOST_BASE', 'HostBase', 'VARCHAR', true, 30, '0');
		$this->addColumn('PATH', 'Path', 'VARCHAR', true, 30, '0');
		$this->addColumn('CREATED_ON', 'CreatedOn', 'INTEGER', true, 12, 0);
		$this->addColumn('UPDATED_ON', 'UpdatedOn', 'INTEGER', true, 12, 0);
		// validators
		$this->addValidator('NOM_BASE', 'unique', 'propel.validator.UniqueValidator', '', 'Cette base existe déjà !');
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
	} // buildRelations()

} // MListeEtablissementTableMap
