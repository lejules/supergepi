<?php


/**
 * Base class that represents a query for the 'm_settings' table.
 *
 * Reglages de l'interface
 *
 * @method     MSettingQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     MSettingQuery orderByNom($order = Criteria::ASC) Order by the nom column
 * @method     MSettingQuery orderByValeur($order = Criteria::ASC) Order by the valeur column
 *
 * @method     MSettingQuery groupById() Group by the id column
 * @method     MSettingQuery groupByNom() Group by the nom column
 * @method     MSettingQuery groupByValeur() Group by the valeur column
 *
 * @method     MSettingQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     MSettingQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     MSettingQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     MSetting findOne(PropelPDO $con = null) Return the first MSetting matching the query
 * @method     MSetting findOneOrCreate(PropelPDO $con = null) Return the first MSetting matching the query, or a new MSetting object populated from the query conditions when no match is found
 *
 * @method     MSetting findOneById(int $id) Return the first MSetting filtered by the id column
 * @method     MSetting findOneByNom(string $nom) Return the first MSetting filtered by the nom column
 * @method     MSetting findOneByValeur(string $valeur) Return the first MSetting filtered by the valeur column
 *
 * @method     array findById(int $id) Return MSetting objects filtered by the id column
 * @method     array findByNom(string $nom) Return MSetting objects filtered by the nom column
 * @method     array findByValeur(string $valeur) Return MSetting objects filtered by the valeur column
 *
 * @package    propel.generator.supergepi.om
 */
abstract class BaseMSettingQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseMSettingQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'supergepi', $modelName = 'MSetting', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new MSettingQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    MSettingQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof MSettingQuery) {
			return $criteria;
		}
		$query = new MSettingQuery();
		if (null !== $modelAlias) {
			$query->setModelAlias($modelAlias);
		}
		if ($criteria instanceof Criteria) {
			$query->mergeWith($criteria);
		}
		return $query;
	}

	/**
	 * Find object by primary key
	 * Use instance pooling to avoid a database query if the object exists
	 * <code>
	 * $obj  = $c->findPk(12, $con);
	 * </code>
	 * @param     mixed $key Primary key to use for the query
	 * @param     PropelPDO $con an optional connection object
	 *
	 * @return    MSetting|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = MSettingPeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
			// the object is alredy in the instance pool
			return $obj;
		} else {
			// the object has not been requested yet, or the formatter is not an object formatter
			$criteria = $this->isKeepQuery() ? clone $this : $this;
			$stmt = $criteria
				->filterByPrimaryKey($key)
				->getSelectStatement($con);
			return $criteria->getFormatter()->init($criteria)->formatOne($stmt);
		}
	}

	/**
	 * Find objects by primary key
	 * <code>
	 * $objs = $c->findPks(array(12, 56, 832), $con);
	 * </code>
	 * @param     array $keys Primary keys to use for the query
	 * @param     PropelPDO $con an optional connection object
	 *
	 * @return    PropelObjectCollection|array|mixed the list of results, formatted by the current formatter
	 */
	public function findPks($keys, $con = null)
	{	
		$criteria = $this->isKeepQuery() ? clone $this : $this;
		return $this
			->filterByPrimaryKeys($keys)
			->find($con);
	}

	/**
	 * Filter the query by primary key
	 *
	 * @param     mixed $key Primary key to use for the query
	 *
	 * @return    MSettingQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(MSettingPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    MSettingQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(MSettingPeer::ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the id column
	 * 
	 * @param     int|array $id The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    MSettingQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(MSettingPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the nom column
	 * 
	 * @param     string $nom The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    MSettingQuery The current query, for fluid interface
	 */
	public function filterByNom($nom = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($nom)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $nom)) {
				$nom = str_replace('*', '%', $nom);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(MSettingPeer::NOM, $nom, $comparison);
	}

	/**
	 * Filter the query on the valeur column
	 * 
	 * @param     string $valeur The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    MSettingQuery The current query, for fluid interface
	 */
	public function filterByValeur($valeur = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($valeur)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $valeur)) {
				$valeur = str_replace('*', '%', $valeur);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(MSettingPeer::VALEUR, $valeur, $comparison);
	}

	/**
	 * Exclude object from result
	 *
	 * @param     MSetting $mSetting Object to remove from the list of results
	 *
	 * @return    MSettingQuery The current query, for fluid interface
	 */
	public function prune($mSetting = null)
	{
		if ($mSetting) {
			$this->addUsingAlias(MSettingPeer::ID, $mSetting->getId(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

} // BaseMSettingQuery
