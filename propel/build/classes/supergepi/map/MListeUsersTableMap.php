<?php



/**
 * This class defines the structure of the 'm_listusers' table.
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
class MListeUsersTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'supergepi.map.MListeUsersTableMap';

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
		$this->setName('m_listusers');
		$this->setPhpName('MListeUsers');
		$this->setClassname('MListeUsers');
		$this->setPackage('supergepi');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, 4, null);
		$this->addColumn('LOGIN', 'Login', 'VARCHAR', true, 200, null);
		$this->addColumn('RNE', 'Rne', 'VARCHAR', true, 15, null);
		$this->addColumn('STATUT', 'Statut', 'VARCHAR', true, 50, null);
		$this->addColumn('CREATED_ON', 'CreatedOn', 'INTEGER', true, 12, 0);
		$this->addColumn('UPDATED_ON', 'UpdatedOn', 'INTEGER', true, 12, 0);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
	} // buildRelations()

} // MListeUsersTableMap
