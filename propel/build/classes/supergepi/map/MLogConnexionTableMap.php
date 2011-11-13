<?php



/**
 * This class defines the structure of the 'm_logs' table.
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
class MLogConnexionTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'supergepi.map.MLogConnexionTableMap';

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
		$this->setName('m_logs');
		$this->setPhpName('MLogConnexion');
		$this->setClassname('MLogConnexion');
		$this->setPackage('supergepi');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, 4, null);
		$this->addColumn('DEBUT', 'Debut', 'INTEGER', true, 12, null);
		$this->addColumn('FIN', 'Fin', 'INTEGER', true, 12, null);
		$this->addColumn('IP', 'Ip', 'VARCHAR', true, 30, '0');
		$this->addColumn('TYPE', 'Type', 'VARCHAR', true, 30, 'session');
		$this->addColumn('MARQUEUR', 'Marqueur', 'VARCHAR', true, 30, '0');
		$this->addForeignKey('UTILISATEUR_ID', 'UtilisateurId', 'INTEGER', 'm_utilisateurs', 'ID', true, 4, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('MUtilisateur', 'MUtilisateur', RelationMap::MANY_TO_ONE, array('utilisateur_id' => 'id', ), 'CASCADE', null);
	} // buildRelations()

} // MLogConnexionTableMap
