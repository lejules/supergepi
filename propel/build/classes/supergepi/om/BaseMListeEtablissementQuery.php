<?php


/**
 * Base class that represents a query for the 'm_etablissements' table.
 *
 * Liste des etablissements en multisite
 *
 * @method     MListeEtablissementQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     MListeEtablissementQuery orderByNom($order = Criteria::ASC) Order by the nom column
 * @method     MListeEtablissementQuery orderByType($order = Criteria::ASC) Order by the type column
 * @method     MListeEtablissementQuery orderByRne($order = Criteria::ASC) Order by the rne column
 * @method     MListeEtablissementQuery orderByNomBase($order = Criteria::ASC) Order by the nom_base column
 * @method     MListeEtablissementQuery orderByUserBase($order = Criteria::ASC) Order by the user_base column
 * @method     MListeEtablissementQuery orderByMdpBase($order = Criteria::ASC) Order by the mdp_base column
 * @method     MListeEtablissementQuery orderByHostBase($order = Criteria::ASC) Order by the host_base column
 * @method     MListeEtablissementQuery orderByPath($order = Criteria::ASC) Order by the path column
 * @method     MListeEtablissementQuery orderByCreatedOn($order = Criteria::ASC) Order by the created_on column
 * @method     MListeEtablissementQuery orderByUpdatedOn($order = Criteria::ASC) Order by the updated_on column
 *
 * @method     MListeEtablissementQuery groupById() Group by the id column
 * @method     MListeEtablissementQuery groupByNom() Group by the nom column
 * @method     MListeEtablissementQuery groupByType() Group by the type column
 * @method     MListeEtablissementQuery groupByRne() Group by the rne column
 * @method     MListeEtablissementQuery groupByNomBase() Group by the nom_base column
 * @method     MListeEtablissementQuery groupByUserBase() Group by the user_base column
 * @method     MListeEtablissementQuery groupByMdpBase() Group by the mdp_base column
 * @method     MListeEtablissementQuery groupByHostBase() Group by the host_base column
 * @method     MListeEtablissementQuery groupByPath() Group by the path column
 * @method     MListeEtablissementQuery groupByCreatedOn() Group by the created_on column
 * @method     MListeEtablissementQuery groupByUpdatedOn() Group by the updated_on column
 *
 * @method     MListeEtablissementQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     MListeEtablissementQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     MListeEtablissementQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     MListeEtablissement findOne(PropelPDO $con = null) Return the first MListeEtablissement matching the query
 * @method     MListeEtablissement findOneOrCreate(PropelPDO $con = null) Return the first MListeEtablissement matching the query, or a new MListeEtablissement object populated from the query conditions when no match is found
 *
 * @method     MListeEtablissement findOneById(int $id) Return the first MListeEtablissement filtered by the id column
 * @method     MListeEtablissement findOneByNom(string $nom) Return the first MListeEtablissement filtered by the nom column
 * @method     MListeEtablissement findOneByType(string $type) Return the first MListeEtablissement filtered by the type column
 * @method     MListeEtablissement findOneByRne(string $rne) Return the first MListeEtablissement filtered by the rne column
 * @method     MListeEtablissement findOneByNomBase(string $nom_base) Return the first MListeEtablissement filtered by the nom_base column
 * @method     MListeEtablissement findOneByUserBase(string $user_base) Return the first MListeEtablissement filtered by the user_base column
 * @method     MListeEtablissement findOneByMdpBase(string $mdp_base) Return the first MListeEtablissement filtered by the mdp_base column
 * @method     MListeEtablissement findOneByHostBase(string $host_base) Return the first MListeEtablissement filtered by the host_base column
 * @method     MListeEtablissement findOneByPath(string $path) Return the first MListeEtablissement filtered by the path column
 * @method     MListeEtablissement findOneByCreatedOn(int $created_on) Return the first MListeEtablissement filtered by the created_on column
 * @method     MListeEtablissement findOneByUpdatedOn(int $updated_on) Return the first MListeEtablissement filtered by the updated_on column
 *
 * @method     array findById(int $id) Return MListeEtablissement objects filtered by the id column
 * @method     array findByNom(string $nom) Return MListeEtablissement objects filtered by the nom column
 * @method     array findByType(string $type) Return MListeEtablissement objects filtered by the type column
 * @method     array findByRne(string $rne) Return MListeEtablissement objects filtered by the rne column
 * @method     array findByNomBase(string $nom_base) Return MListeEtablissement objects filtered by the nom_base column
 * @method     array findByUserBase(string $user_base) Return MListeEtablissement objects filtered by the user_base column
 * @method     array findByMdpBase(string $mdp_base) Return MListeEtablissement objects filtered by the mdp_base column
 * @method     array findByHostBase(string $host_base) Return MListeEtablissement objects filtered by the host_base column
 * @method     array findByPath(string $path) Return MListeEtablissement objects filtered by the path column
 * @method     array findByCreatedOn(int $created_on) Return MListeEtablissement objects filtered by the created_on column
 * @method     array findByUpdatedOn(int $updated_on) Return MListeEtablissement objects filtered by the updated_on column
 *
 * @package    propel.generator.supergepi.om
 */
abstract class BaseMListeEtablissementQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseMListeEtablissementQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'supergepi', $modelName = 'MListeEtablissement', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new MListeEtablissementQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    MListeEtablissementQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof MListeEtablissementQuery) {
			return $criteria;
		}
		$query = new MListeEtablissementQuery();
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
	 * @return    MListeEtablissement|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = MListeEtablissementPeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    MListeEtablissementQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(MListeEtablissementPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    MListeEtablissementQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(MListeEtablissementPeer::ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the id column
	 * 
	 * @param     int|array $id The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    MListeEtablissementQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(MListeEtablissementPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the nom column
	 * 
	 * @param     string $nom The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    MListeEtablissementQuery The current query, for fluid interface
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
		return $this->addUsingAlias(MListeEtablissementPeer::NOM, $nom, $comparison);
	}

	/**
	 * Filter the query on the type column
	 * 
	 * @param     string $type The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    MListeEtablissementQuery The current query, for fluid interface
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
		return $this->addUsingAlias(MListeEtablissementPeer::TYPE, $type, $comparison);
	}

	/**
	 * Filter the query on the rne column
	 * 
	 * @param     string $rne The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    MListeEtablissementQuery The current query, for fluid interface
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
		return $this->addUsingAlias(MListeEtablissementPeer::RNE, $rne, $comparison);
	}

	/**
	 * Filter the query on the nom_base column
	 * 
	 * @param     string $nomBase The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    MListeEtablissementQuery The current query, for fluid interface
	 */
	public function filterByNomBase($nomBase = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($nomBase)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $nomBase)) {
				$nomBase = str_replace('*', '%', $nomBase);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(MListeEtablissementPeer::NOM_BASE, $nomBase, $comparison);
	}

	/**
	 * Filter the query on the user_base column
	 * 
	 * @param     string $userBase The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    MListeEtablissementQuery The current query, for fluid interface
	 */
	public function filterByUserBase($userBase = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($userBase)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $userBase)) {
				$userBase = str_replace('*', '%', $userBase);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(MListeEtablissementPeer::USER_BASE, $userBase, $comparison);
	}

	/**
	 * Filter the query on the mdp_base column
	 * 
	 * @param     string $mdpBase The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    MListeEtablissementQuery The current query, for fluid interface
	 */
	public function filterByMdpBase($mdpBase = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($mdpBase)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $mdpBase)) {
				$mdpBase = str_replace('*', '%', $mdpBase);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(MListeEtablissementPeer::MDP_BASE, $mdpBase, $comparison);
	}

	/**
	 * Filter the query on the host_base column
	 * 
	 * @param     string $hostBase The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    MListeEtablissementQuery The current query, for fluid interface
	 */
	public function filterByHostBase($hostBase = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($hostBase)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $hostBase)) {
				$hostBase = str_replace('*', '%', $hostBase);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(MListeEtablissementPeer::HOST_BASE, $hostBase, $comparison);
	}

	/**
	 * Filter the query on the path column
	 * 
	 * @param     string $path The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    MListeEtablissementQuery The current query, for fluid interface
	 */
	public function filterByPath($path = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($path)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $path)) {
				$path = str_replace('*', '%', $path);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(MListeEtablissementPeer::PATH, $path, $comparison);
	}

	/**
	 * Filter the query on the created_on column
	 * 
	 * @param     int|array $createdOn The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    MListeEtablissementQuery The current query, for fluid interface
	 */
	public function filterByCreatedOn($createdOn = null, $comparison = null)
	{
		if (is_array($createdOn)) {
			$useMinMax = false;
			if (isset($createdOn['min'])) {
				$this->addUsingAlias(MListeEtablissementPeer::CREATED_ON, $createdOn['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($createdOn['max'])) {
				$this->addUsingAlias(MListeEtablissementPeer::CREATED_ON, $createdOn['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(MListeEtablissementPeer::CREATED_ON, $createdOn, $comparison);
	}

	/**
	 * Filter the query on the updated_on column
	 * 
	 * @param     int|array $updatedOn The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    MListeEtablissementQuery The current query, for fluid interface
	 */
	public function filterByUpdatedOn($updatedOn = null, $comparison = null)
	{
		if (is_array($updatedOn)) {
			$useMinMax = false;
			if (isset($updatedOn['min'])) {
				$this->addUsingAlias(MListeEtablissementPeer::UPDATED_ON, $updatedOn['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($updatedOn['max'])) {
				$this->addUsingAlias(MListeEtablissementPeer::UPDATED_ON, $updatedOn['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(MListeEtablissementPeer::UPDATED_ON, $updatedOn, $comparison);
	}

	/**
	 * Exclude object from result
	 *
	 * @param     MListeEtablissement $mListeEtablissement Object to remove from the list of results
	 *
	 * @return    MListeEtablissementQuery The current query, for fluid interface
	 */
	public function prune($mListeEtablissement = null)
	{
		if ($mListeEtablissement) {
			$this->addUsingAlias(MListeEtablissementPeer::ID, $mListeEtablissement->getId(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

} // BaseMListeEtablissementQuery
