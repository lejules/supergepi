<?php


/**
 * Base class that represents a query for the 'm_utilisateurs' table.
 *
 * Utilisateurs du logiciel
 *
 * @method     MUtilisateurQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     MUtilisateurQuery orderByLogin($order = Criteria::ASC) Order by the login column
 * @method     MUtilisateurQuery orderByNom($order = Criteria::ASC) Order by the nom column
 * @method     MUtilisateurQuery orderByPrenom($order = Criteria::ASC) Order by the prenom column
 * @method     MUtilisateurQuery orderByCivilite($order = Criteria::ASC) Order by the civilite column
 * @method     MUtilisateurQuery orderByPassword($order = Criteria::ASC) Order by the password column
 * @method     MUtilisateurQuery orderByEmail($order = Criteria::ASC) Order by the email column
 * @method     MUtilisateurQuery orderByStatut($order = Criteria::ASC) Order by the statut column
 * @method     MUtilisateurQuery orderBySso($order = Criteria::ASC) Order by the sso column
 *
 * @method     MUtilisateurQuery groupById() Group by the id column
 * @method     MUtilisateurQuery groupByLogin() Group by the login column
 * @method     MUtilisateurQuery groupByNom() Group by the nom column
 * @method     MUtilisateurQuery groupByPrenom() Group by the prenom column
 * @method     MUtilisateurQuery groupByCivilite() Group by the civilite column
 * @method     MUtilisateurQuery groupByPassword() Group by the password column
 * @method     MUtilisateurQuery groupByEmail() Group by the email column
 * @method     MUtilisateurQuery groupByStatut() Group by the statut column
 * @method     MUtilisateurQuery groupBySso() Group by the sso column
 *
 * @method     MUtilisateurQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     MUtilisateurQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     MUtilisateurQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     MUtilisateurQuery leftJoinMLogConnexion($relationAlias = null) Adds a LEFT JOIN clause to the query using the MLogConnexion relation
 * @method     MUtilisateurQuery rightJoinMLogConnexion($relationAlias = null) Adds a RIGHT JOIN clause to the query using the MLogConnexion relation
 * @method     MUtilisateurQuery innerJoinMLogConnexion($relationAlias = null) Adds a INNER JOIN clause to the query using the MLogConnexion relation
 *
 * @method     MUtilisateur findOne(PropelPDO $con = null) Return the first MUtilisateur matching the query
 * @method     MUtilisateur findOneOrCreate(PropelPDO $con = null) Return the first MUtilisateur matching the query, or a new MUtilisateur object populated from the query conditions when no match is found
 *
 * @method     MUtilisateur findOneById(int $id) Return the first MUtilisateur filtered by the id column
 * @method     MUtilisateur findOneByLogin(string $login) Return the first MUtilisateur filtered by the login column
 * @method     MUtilisateur findOneByNom(string $nom) Return the first MUtilisateur filtered by the nom column
 * @method     MUtilisateur findOneByPrenom(string $prenom) Return the first MUtilisateur filtered by the prenom column
 * @method     MUtilisateur findOneByCivilite(string $civilite) Return the first MUtilisateur filtered by the civilite column
 * @method     MUtilisateur findOneByPassword(string $password) Return the first MUtilisateur filtered by the password column
 * @method     MUtilisateur findOneByEmail(string $email) Return the first MUtilisateur filtered by the email column
 * @method     MUtilisateur findOneByStatut(string $statut) Return the first MUtilisateur filtered by the statut column
 * @method     MUtilisateur findOneBySso(string $sso) Return the first MUtilisateur filtered by the sso column
 *
 * @method     array findById(int $id) Return MUtilisateur objects filtered by the id column
 * @method     array findByLogin(string $login) Return MUtilisateur objects filtered by the login column
 * @method     array findByNom(string $nom) Return MUtilisateur objects filtered by the nom column
 * @method     array findByPrenom(string $prenom) Return MUtilisateur objects filtered by the prenom column
 * @method     array findByCivilite(string $civilite) Return MUtilisateur objects filtered by the civilite column
 * @method     array findByPassword(string $password) Return MUtilisateur objects filtered by the password column
 * @method     array findByEmail(string $email) Return MUtilisateur objects filtered by the email column
 * @method     array findByStatut(string $statut) Return MUtilisateur objects filtered by the statut column
 * @method     array findBySso(string $sso) Return MUtilisateur objects filtered by the sso column
 *
 * @package    propel.generator.supergepi.om
 */
abstract class BaseMUtilisateurQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseMUtilisateurQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'supergepi', $modelName = 'MUtilisateur', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new MUtilisateurQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    MUtilisateurQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof MUtilisateurQuery) {
			return $criteria;
		}
		$query = new MUtilisateurQuery();
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
	 * @return    MUtilisateur|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = MUtilisateurPeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    MUtilisateurQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(MUtilisateurPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    MUtilisateurQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(MUtilisateurPeer::ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the id column
	 * 
	 * @param     int|array $id The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    MUtilisateurQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(MUtilisateurPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the login column
	 * 
	 * @param     string $login The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    MUtilisateurQuery The current query, for fluid interface
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
		return $this->addUsingAlias(MUtilisateurPeer::LOGIN, $login, $comparison);
	}

	/**
	 * Filter the query on the nom column
	 * 
	 * @param     string $nom The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    MUtilisateurQuery The current query, for fluid interface
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
		return $this->addUsingAlias(MUtilisateurPeer::NOM, $nom, $comparison);
	}

	/**
	 * Filter the query on the prenom column
	 * 
	 * @param     string $prenom The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    MUtilisateurQuery The current query, for fluid interface
	 */
	public function filterByPrenom($prenom = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($prenom)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $prenom)) {
				$prenom = str_replace('*', '%', $prenom);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(MUtilisateurPeer::PRENOM, $prenom, $comparison);
	}

	/**
	 * Filter the query on the civilite column
	 * 
	 * @param     string $civilite The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    MUtilisateurQuery The current query, for fluid interface
	 */
	public function filterByCivilite($civilite = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($civilite)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $civilite)) {
				$civilite = str_replace('*', '%', $civilite);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(MUtilisateurPeer::CIVILITE, $civilite, $comparison);
	}

	/**
	 * Filter the query on the password column
	 * 
	 * @param     string $password The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    MUtilisateurQuery The current query, for fluid interface
	 */
	public function filterByPassword($password = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($password)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $password)) {
				$password = str_replace('*', '%', $password);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(MUtilisateurPeer::PASSWORD, $password, $comparison);
	}

	/**
	 * Filter the query on the email column
	 * 
	 * @param     string $email The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    MUtilisateurQuery The current query, for fluid interface
	 */
	public function filterByEmail($email = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($email)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $email)) {
				$email = str_replace('*', '%', $email);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(MUtilisateurPeer::EMAIL, $email, $comparison);
	}

	/**
	 * Filter the query on the statut column
	 * 
	 * @param     string $statut The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    MUtilisateurQuery The current query, for fluid interface
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
		return $this->addUsingAlias(MUtilisateurPeer::STATUT, $statut, $comparison);
	}

	/**
	 * Filter the query on the sso column
	 * 
	 * @param     string $sso The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    MUtilisateurQuery The current query, for fluid interface
	 */
	public function filterBySso($sso = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($sso)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $sso)) {
				$sso = str_replace('*', '%', $sso);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(MUtilisateurPeer::SSO, $sso, $comparison);
	}

	/**
	 * Filter the query by a related MLogConnexion object
	 *
	 * @param     MLogConnexion $mLogConnexion  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    MUtilisateurQuery The current query, for fluid interface
	 */
	public function filterByMLogConnexion($mLogConnexion, $comparison = null)
	{
		return $this
			->addUsingAlias(MUtilisateurPeer::ID, $mLogConnexion->getUtilisateurId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the MLogConnexion relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    MUtilisateurQuery The current query, for fluid interface
	 */
	public function joinMLogConnexion($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('MLogConnexion');
		
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
			$this->addJoinObject($join, 'MLogConnexion');
		}
		
		return $this;
	}

	/**
	 * Use the MLogConnexion relation MLogConnexion object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    MLogConnexionQuery A secondary query class using the current class as primary query
	 */
	public function useMLogConnexionQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinMLogConnexion($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'MLogConnexion', 'MLogConnexionQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     MUtilisateur $mUtilisateur Object to remove from the list of results
	 *
	 * @return    MUtilisateurQuery The current query, for fluid interface
	 */
	public function prune($mUtilisateur = null)
	{
		if ($mUtilisateur) {
			$this->addUsingAlias(MUtilisateurPeer::ID, $mUtilisateur->getId(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

} // BaseMUtilisateurQuery
