<?php


/**
 * Base class that represents a query for the 'annuaire_users_sans_etab' table.
 *
 * Liste des utilisateurs sans établissements
 *
 * @method     UtilisateurSansEtabQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     UtilisateurSansEtabQuery orderByUid($order = Criteria::ASC) Order by the uid column
 * @method     UtilisateurSansEtabQuery orderByNom($order = Criteria::ASC) Order by the nom column
 * @method     UtilisateurSansEtabQuery orderByPrenom($order = Criteria::ASC) Order by the prenom column
 * @method     UtilisateurSansEtabQuery orderByLogin($order = Criteria::ASC) Order by the login column
 * @method     UtilisateurSansEtabQuery orderByMdp($order = Criteria::ASC) Order by the mdp column
 * @method     UtilisateurSansEtabQuery orderByCreatedOn($order = Criteria::ASC) Order by the created_on column
 *
 * @method     UtilisateurSansEtabQuery groupById() Group by the id column
 * @method     UtilisateurSansEtabQuery groupByUid() Group by the uid column
 * @method     UtilisateurSansEtabQuery groupByNom() Group by the nom column
 * @method     UtilisateurSansEtabQuery groupByPrenom() Group by the prenom column
 * @method     UtilisateurSansEtabQuery groupByLogin() Group by the login column
 * @method     UtilisateurSansEtabQuery groupByMdp() Group by the mdp column
 * @method     UtilisateurSansEtabQuery groupByCreatedOn() Group by the created_on column
 *
 * @method     UtilisateurSansEtabQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     UtilisateurSansEtabQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     UtilisateurSansEtabQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     UtilisateurSansEtab findOne(PropelPDO $con = null) Return the first UtilisateurSansEtab matching the query
 * @method     UtilisateurSansEtab findOneOrCreate(PropelPDO $con = null) Return the first UtilisateurSansEtab matching the query, or a new UtilisateurSansEtab object populated from the query conditions when no match is found
 *
 * @method     UtilisateurSansEtab findOneById(int $id) Return the first UtilisateurSansEtab filtered by the id column
 * @method     UtilisateurSansEtab findOneByUid(string $uid) Return the first UtilisateurSansEtab filtered by the uid column
 * @method     UtilisateurSansEtab findOneByNom(string $nom) Return the first UtilisateurSansEtab filtered by the nom column
 * @method     UtilisateurSansEtab findOneByPrenom(string $prenom) Return the first UtilisateurSansEtab filtered by the prenom column
 * @method     UtilisateurSansEtab findOneByLogin(string $login) Return the first UtilisateurSansEtab filtered by the login column
 * @method     UtilisateurSansEtab findOneByMdp(string $mdp) Return the first UtilisateurSansEtab filtered by the mdp column
 * @method     UtilisateurSansEtab findOneByCreatedOn(int $created_on) Return the first UtilisateurSansEtab filtered by the created_on column
 *
 * @method     array findById(int $id) Return UtilisateurSansEtab objects filtered by the id column
 * @method     array findByUid(string $uid) Return UtilisateurSansEtab objects filtered by the uid column
 * @method     array findByNom(string $nom) Return UtilisateurSansEtab objects filtered by the nom column
 * @method     array findByPrenom(string $prenom) Return UtilisateurSansEtab objects filtered by the prenom column
 * @method     array findByLogin(string $login) Return UtilisateurSansEtab objects filtered by the login column
 * @method     array findByMdp(string $mdp) Return UtilisateurSansEtab objects filtered by the mdp column
 * @method     array findByCreatedOn(int $created_on) Return UtilisateurSansEtab objects filtered by the created_on column
 *
 * @package    propel.generator.supergepi.om
 */
abstract class BaseUtilisateurSansEtabQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseUtilisateurSansEtabQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'supergepi', $modelName = 'UtilisateurSansEtab', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new UtilisateurSansEtabQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    UtilisateurSansEtabQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof UtilisateurSansEtabQuery) {
			return $criteria;
		}
		$query = new UtilisateurSansEtabQuery();
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
	 * @return    UtilisateurSansEtab|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = UtilisateurSansEtabPeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    UtilisateurSansEtabQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(UtilisateurSansEtabPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    UtilisateurSansEtabQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(UtilisateurSansEtabPeer::ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the id column
	 * 
	 * @param     int|array $id The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UtilisateurSansEtabQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(UtilisateurSansEtabPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the uid column
	 * 
	 * @param     string $uid The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UtilisateurSansEtabQuery The current query, for fluid interface
	 */
	public function filterByUid($uid = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($uid)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $uid)) {
				$uid = str_replace('*', '%', $uid);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(UtilisateurSansEtabPeer::UID, $uid, $comparison);
	}

	/**
	 * Filter the query on the nom column
	 * 
	 * @param     string $nom The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UtilisateurSansEtabQuery The current query, for fluid interface
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
		return $this->addUsingAlias(UtilisateurSansEtabPeer::NOM, $nom, $comparison);
	}

	/**
	 * Filter the query on the prenom column
	 * 
	 * @param     string $prenom The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UtilisateurSansEtabQuery The current query, for fluid interface
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
		return $this->addUsingAlias(UtilisateurSansEtabPeer::PRENOM, $prenom, $comparison);
	}

	/**
	 * Filter the query on the login column
	 * 
	 * @param     string $login The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UtilisateurSansEtabQuery The current query, for fluid interface
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
		return $this->addUsingAlias(UtilisateurSansEtabPeer::LOGIN, $login, $comparison);
	}

	/**
	 * Filter the query on the mdp column
	 * 
	 * @param     string $mdp The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UtilisateurSansEtabQuery The current query, for fluid interface
	 */
	public function filterByMdp($mdp = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($mdp)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $mdp)) {
				$mdp = str_replace('*', '%', $mdp);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(UtilisateurSansEtabPeer::MDP, $mdp, $comparison);
	}

	/**
	 * Filter the query on the created_on column
	 * 
	 * @param     int|array $createdOn The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UtilisateurSansEtabQuery The current query, for fluid interface
	 */
	public function filterByCreatedOn($createdOn = null, $comparison = null)
	{
		if (is_array($createdOn)) {
			$useMinMax = false;
			if (isset($createdOn['min'])) {
				$this->addUsingAlias(UtilisateurSansEtabPeer::CREATED_ON, $createdOn['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($createdOn['max'])) {
				$this->addUsingAlias(UtilisateurSansEtabPeer::CREATED_ON, $createdOn['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(UtilisateurSansEtabPeer::CREATED_ON, $createdOn, $comparison);
	}

	/**
	 * Exclude object from result
	 *
	 * @param     UtilisateurSansEtab $utilisateurSansEtab Object to remove from the list of results
	 *
	 * @return    UtilisateurSansEtabQuery The current query, for fluid interface
	 */
	public function prune($utilisateurSansEtab = null)
	{
		if ($utilisateurSansEtab) {
			$this->addUsingAlias(UtilisateurSansEtabPeer::ID, $utilisateurSansEtab->getId(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

} // BaseUtilisateurSansEtabQuery
