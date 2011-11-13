<?php


/**
 * Base class that represents a query for the 'm_logs' table.
 *
 * Logs de connexion
 *
 * @method     MLogConnexionQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     MLogConnexionQuery orderByDebut($order = Criteria::ASC) Order by the debut column
 * @method     MLogConnexionQuery orderByFin($order = Criteria::ASC) Order by the fin column
 * @method     MLogConnexionQuery orderByIp($order = Criteria::ASC) Order by the ip column
 * @method     MLogConnexionQuery orderByType($order = Criteria::ASC) Order by the type column
 * @method     MLogConnexionQuery orderByMarqueur($order = Criteria::ASC) Order by the marqueur column
 * @method     MLogConnexionQuery orderByUtilisateurId($order = Criteria::ASC) Order by the utilisateur_id column
 *
 * @method     MLogConnexionQuery groupById() Group by the id column
 * @method     MLogConnexionQuery groupByDebut() Group by the debut column
 * @method     MLogConnexionQuery groupByFin() Group by the fin column
 * @method     MLogConnexionQuery groupByIp() Group by the ip column
 * @method     MLogConnexionQuery groupByType() Group by the type column
 * @method     MLogConnexionQuery groupByMarqueur() Group by the marqueur column
 * @method     MLogConnexionQuery groupByUtilisateurId() Group by the utilisateur_id column
 *
 * @method     MLogConnexionQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     MLogConnexionQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     MLogConnexionQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     MLogConnexionQuery leftJoinMUtilisateur($relationAlias = null) Adds a LEFT JOIN clause to the query using the MUtilisateur relation
 * @method     MLogConnexionQuery rightJoinMUtilisateur($relationAlias = null) Adds a RIGHT JOIN clause to the query using the MUtilisateur relation
 * @method     MLogConnexionQuery innerJoinMUtilisateur($relationAlias = null) Adds a INNER JOIN clause to the query using the MUtilisateur relation
 *
 * @method     MLogConnexion findOne(PropelPDO $con = null) Return the first MLogConnexion matching the query
 * @method     MLogConnexion findOneOrCreate(PropelPDO $con = null) Return the first MLogConnexion matching the query, or a new MLogConnexion object populated from the query conditions when no match is found
 *
 * @method     MLogConnexion findOneById(int $id) Return the first MLogConnexion filtered by the id column
 * @method     MLogConnexion findOneByDebut(int $debut) Return the first MLogConnexion filtered by the debut column
 * @method     MLogConnexion findOneByFin(int $fin) Return the first MLogConnexion filtered by the fin column
 * @method     MLogConnexion findOneByIp(string $ip) Return the first MLogConnexion filtered by the ip column
 * @method     MLogConnexion findOneByType(string $type) Return the first MLogConnexion filtered by the type column
 * @method     MLogConnexion findOneByMarqueur(string $marqueur) Return the first MLogConnexion filtered by the marqueur column
 * @method     MLogConnexion findOneByUtilisateurId(int $utilisateur_id) Return the first MLogConnexion filtered by the utilisateur_id column
 *
 * @method     array findById(int $id) Return MLogConnexion objects filtered by the id column
 * @method     array findByDebut(int $debut) Return MLogConnexion objects filtered by the debut column
 * @method     array findByFin(int $fin) Return MLogConnexion objects filtered by the fin column
 * @method     array findByIp(string $ip) Return MLogConnexion objects filtered by the ip column
 * @method     array findByType(string $type) Return MLogConnexion objects filtered by the type column
 * @method     array findByMarqueur(string $marqueur) Return MLogConnexion objects filtered by the marqueur column
 * @method     array findByUtilisateurId(int $utilisateur_id) Return MLogConnexion objects filtered by the utilisateur_id column
 *
 * @package    propel.generator.supergepi.om
 */
abstract class BaseMLogConnexionQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseMLogConnexionQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'supergepi', $modelName = 'MLogConnexion', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new MLogConnexionQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    MLogConnexionQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof MLogConnexionQuery) {
			return $criteria;
		}
		$query = new MLogConnexionQuery();
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
	 * @return    MLogConnexion|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = MLogConnexionPeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    MLogConnexionQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(MLogConnexionPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    MLogConnexionQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(MLogConnexionPeer::ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the id column
	 * 
	 * @param     int|array $id The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    MLogConnexionQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(MLogConnexionPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the debut column
	 * 
	 * @param     int|array $debut The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    MLogConnexionQuery The current query, for fluid interface
	 */
	public function filterByDebut($debut = null, $comparison = null)
	{
		if (is_array($debut)) {
			$useMinMax = false;
			if (isset($debut['min'])) {
				$this->addUsingAlias(MLogConnexionPeer::DEBUT, $debut['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($debut['max'])) {
				$this->addUsingAlias(MLogConnexionPeer::DEBUT, $debut['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(MLogConnexionPeer::DEBUT, $debut, $comparison);
	}

	/**
	 * Filter the query on the fin column
	 * 
	 * @param     int|array $fin The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    MLogConnexionQuery The current query, for fluid interface
	 */
	public function filterByFin($fin = null, $comparison = null)
	{
		if (is_array($fin)) {
			$useMinMax = false;
			if (isset($fin['min'])) {
				$this->addUsingAlias(MLogConnexionPeer::FIN, $fin['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($fin['max'])) {
				$this->addUsingAlias(MLogConnexionPeer::FIN, $fin['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(MLogConnexionPeer::FIN, $fin, $comparison);
	}

	/**
	 * Filter the query on the ip column
	 * 
	 * @param     string $ip The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    MLogConnexionQuery The current query, for fluid interface
	 */
	public function filterByIp($ip = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($ip)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $ip)) {
				$ip = str_replace('*', '%', $ip);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(MLogConnexionPeer::IP, $ip, $comparison);
	}

	/**
	 * Filter the query on the type column
	 * 
	 * @param     string $type The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    MLogConnexionQuery The current query, for fluid interface
	 */
	public function filterByType($type = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($type)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $type)) {
				$type = str_replace('*', '%', $type);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(MLogConnexionPeer::TYPE, $type, $comparison);
	}

	/**
	 * Filter the query on the marqueur column
	 * 
	 * @param     string $marqueur The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    MLogConnexionQuery The current query, for fluid interface
	 */
	public function filterByMarqueur($marqueur = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($marqueur)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $marqueur)) {
				$marqueur = str_replace('*', '%', $marqueur);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(MLogConnexionPeer::MARQUEUR, $marqueur, $comparison);
	}

	/**
	 * Filter the query on the utilisateur_id column
	 * 
	 * @param     int|array $utilisateurId The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    MLogConnexionQuery The current query, for fluid interface
	 */
	public function filterByUtilisateurId($utilisateurId = null, $comparison = null)
	{
		if (is_array($utilisateurId)) {
			$useMinMax = false;
			if (isset($utilisateurId['min'])) {
				$this->addUsingAlias(MLogConnexionPeer::UTILISATEUR_ID, $utilisateurId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($utilisateurId['max'])) {
				$this->addUsingAlias(MLogConnexionPeer::UTILISATEUR_ID, $utilisateurId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(MLogConnexionPeer::UTILISATEUR_ID, $utilisateurId, $comparison);
	}

	/**
	 * Filter the query by a related MUtilisateur object
	 *
	 * @param     MUtilisateur $mUtilisateur  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    MLogConnexionQuery The current query, for fluid interface
	 */
	public function filterByMUtilisateur($mUtilisateur, $comparison = null)
	{
		return $this
			->addUsingAlias(MLogConnexionPeer::UTILISATEUR_ID, $mUtilisateur->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the MUtilisateur relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    MLogConnexionQuery The current query, for fluid interface
	 */
	public function joinMUtilisateur($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('MUtilisateur');
		
		// create a ModelJoin object for this join
		$join = new ModelJoin();
		$join->setJoinType($joinType);
		$join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
		if ($previousJoin = $this->getPreviousJoin()) {
			$join->setPreviousJoin($previousJoin);
		}
		
		// add the ModelJoin to the current object
		if($relationAlias) {
			$this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
			$this->addJoinObject($join, $relationAlias);
		} else {
			$this->addJoinObject($join, 'MUtilisateur');
		}
		
		return $this;
	}

	/**
	 * Use the MUtilisateur relation MUtilisateur object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    MUtilisateurQuery A secondary query class using the current class as primary query
	 */
	public function useMUtilisateurQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinMUtilisateur($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'MUtilisateur', 'MUtilisateurQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     MLogConnexion $mLogConnexion Object to remove from the list of results
	 *
	 * @return    MLogConnexionQuery The current query, for fluid interface
	 */
	public function prune($mLogConnexion = null)
	{
		if ($mLogConnexion) {
			$this->addUsingAlias(MLogConnexionPeer::ID, $mLogConnexion->getId(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

} // BaseMLogConnexionQuery
