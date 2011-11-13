<?php


/**
 * Base class that represents a query for the 'm_listusers' table.
 *
 * Liste des utilisateurs des differents etablissements
 *
 * @method     MListeUsersQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     MListeUsersQuery orderByLogin($order = Criteria::ASC) Order by the login column
 * @method     MListeUsersQuery orderByRne($order = Criteria::ASC) Order by the rne column
 * @method     MListeUsersQuery orderByStatut($order = Criteria::ASC) Order by the statut column
 * @method     MListeUsersQuery orderByCreatedOn($order = Criteria::ASC) Order by the created_on column
 * @method     MListeUsersQuery orderByUpdatedOn($order = Criteria::ASC) Order by the updated_on column
 *
 * @method     MListeUsersQuery groupById() Group by the id column
 * @method     MListeUsersQuery groupByLogin() Group by the login column
 * @method     MListeUsersQuery groupByRne() Group by the rne column
 * @method     MListeUsersQuery groupByStatut() Group by the statut column
 * @method     MListeUsersQuery groupByCreatedOn() Group by the created_on column
 * @method     MListeUsersQuery groupByUpdatedOn() Group by the updated_on column
 *
 * @method     MListeUsersQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     MListeUsersQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     MListeUsersQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     MListeUsers findOne(PropelPDO $con = null) Return the first MListeUsers matching the query
 * @method     MListeUsers findOneOrCreate(PropelPDO $con = null) Return the first MListeUsers matching the query, or a new MListeUsers object populated from the query conditions when no match is found
 *
 * @method     MListeUsers findOneById(int $id) Return the first MListeUsers filtered by the id column
 * @method     MListeUsers findOneByLogin(string $login) Return the first MListeUsers filtered by the login column
 * @method     MListeUsers findOneByRne(string $rne) Return the first MListeUsers filtered by the rne column
 * @method     MListeUsers findOneByStatut(string $statut) Return the first MListeUsers filtered by the statut column
 * @method     MListeUsers findOneByCreatedOn(int $created_on) Return the first MListeUsers filtered by the created_on column
 * @method     MListeUsers findOneByUpdatedOn(int $updated_on) Return the first MListeUsers filtered by the updated_on column
 *
 * @method     array findById(int $id) Return MListeUsers objects filtered by the id column
 * @method     array findByLogin(string $login) Return MListeUsers objects filtered by the login column
 * @method     array findByRne(string $rne) Return MListeUsers objects filtered by the rne column
 * @method     array findByStatut(string $statut) Return MListeUsers objects filtered by the statut column
 * @method     array findByCreatedOn(int $created_on) Return MListeUsers objects filtered by the created_on column
 * @method     array findByUpdatedOn(int $updated_on) Return MListeUsers objects filtered by the updated_on column
 *
 * @package    propel.generator.supergepi.om
 */
abstract class BaseMListeUsersQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseMListeUsersQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'supergepi', $modelName = 'MListeUsers', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new MListeUsersQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    MListeUsersQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof MListeUsersQuery) {
			return $criteria;
		}
		$query = new MListeUsersQuery();
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
	 * @return    MListeUsers|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = MListeUsersPeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    MListeUsersQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(MListeUsersPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    MListeUsersQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(MListeUsersPeer::ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the id column
	 * 
	 * @param     int|array $id The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    MListeUsersQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(MListeUsersPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the login column
	 * 
	 * @param     string $login The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    MListeUsersQuery The current query, for fluid interface
	 */
	public function filterByLogin($login = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($login)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $login)) {
				$login = str_replace('*', '%', $login);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(MListeUsersPeer::LOGIN, $login, $comparison);
	}

	/**
	 * Filter the query on the rne column
	 * 
	 * @param     string $rne The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    MListeUsersQuery The current query, for fluid interface
	 */
	public function filterByRne($rne = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($rne)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $rne)) {
				$rne = str_replace('*', '%', $rne);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(MListeUsersPeer::RNE, $rne, $comparison);
	}

	/**
	 * Filter the query on the statut column
	 * 
	 * @param     string $statut The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    MListeUsersQuery The current query, for fluid interface
	 */
	public function filterByStatut($statut = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($statut)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $statut)) {
				$statut = str_replace('*', '%', $statut);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(MListeUsersPeer::STATUT, $statut, $comparison);
	}

	/**
	 * Filter the query on the created_on column
	 * 
	 * @param     int|array $createdOn The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    MListeUsersQuery The current query, for fluid interface
	 */
	public function filterByCreatedOn($createdOn = null, $comparison = null)
	{
		if (is_array($createdOn)) {
			$useMinMax = false;
			if (isset($createdOn['min'])) {
				$this->addUsingAlias(MListeUsersPeer::CREATED_ON, $createdOn['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($createdOn['max'])) {
				$this->addUsingAlias(MListeUsersPeer::CREATED_ON, $createdOn['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(MListeUsersPeer::CREATED_ON, $createdOn, $comparison);
	}

	/**
	 * Filter the query on the updated_on column
	 * 
	 * @param     int|array $updatedOn The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    MListeUsersQuery The current query, for fluid interface
	 */
	public function filterByUpdatedOn($updatedOn = null, $comparison = null)
	{
		if (is_array($updatedOn)) {
			$useMinMax = false;
			if (isset($updatedOn['min'])) {
				$this->addUsingAlias(MListeUsersPeer::UPDATED_ON, $updatedOn['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($updatedOn['max'])) {
				$this->addUsingAlias(MListeUsersPeer::UPDATED_ON, $updatedOn['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(MListeUsersPeer::UPDATED_ON, $updatedOn, $comparison);
	}

	/**
	 * Exclude object from result
	 *
	 * @param     MListeUsers $mListeUsers Object to remove from the list of results
	 *
	 * @return    MListeUsersQuery The current query, for fluid interface
	 */
	public function prune($mListeUsers = null)
	{
		if ($mListeUsers) {
			$this->addUsingAlias(MListeUsersPeer::ID, $mListeUsers->getId(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

} // BaseMListeUsersQuery
