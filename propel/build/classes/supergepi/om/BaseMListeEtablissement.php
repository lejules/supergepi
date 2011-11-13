<?php


/**
 * Base class that represents a row from the 'm_etablissements' table.
 *
 * Liste des etablissements en multisite
 *
 * @package    propel.generator.supergepi.om
 */
abstract class BaseMListeEtablissement extends BaseObject  implements Persistent
{

	/**
	 * Peer class name
	 */
	const PEER = 'MListeEtablissementPeer';

	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        MListeEtablissementPeer
	 */
	protected static $peer;

	/**
	 * The value for the id field.
	 * @var        int
	 */
	protected $id;

	/**
	 * The value for the nom field.
	 * @var        string
	 */
	protected $nom;

	/**
	 * The value for the type field.
	 * @var        string
	 */
	protected $type;

	/**
	 * The value for the rne field.
	 * @var        string
	 */
	protected $rne;

	/**
	 * The value for the nom_base field.
	 * Note: this column has a database default value of: '0'
	 * @var        string
	 */
	protected $nom_base;

	/**
	 * The value for the user_base field.
	 * Note: this column has a database default value of: '0'
	 * @var        string
	 */
	protected $user_base;

	/**
	 * The value for the mdp_base field.
	 * Note: this column has a database default value of: '0'
	 * @var        string
	 */
	protected $mdp_base;

	/**
	 * The value for the host_base field.
	 * Note: this column has a database default value of: '0'
	 * @var        string
	 */
	protected $host_base;

	/**
	 * The value for the path field.
	 * Note: this column has a database default value of: '0'
	 * @var        string
	 */
	protected $path;

	/**
	 * The value for the created_on field.
	 * Note: this column has a database default value of: 0
	 * @var        int
	 */
	protected $created_on;

	/**
	 * The value for the updated_on field.
	 * Note: this column has a database default value of: 0
	 * @var        int
	 */
	protected $updated_on;

	/**
	 * Flag to prevent endless save loop, if this object is referenced
	 * by another object which falls in this transaction.
	 * @var        boolean
	 */
	protected $alreadyInSave = false;

	/**
	 * Flag to prevent endless validation loop, if this object is referenced
	 * by another object which falls in this transaction.
	 * @var        boolean
	 */
	protected $alreadyInValidation = false;

	/**
	 * Applies default values to this object.
	 * This method should be called from the object's constructor (or
	 * equivalent initialization method).
	 * @see        __construct()
	 */
	public function applyDefaultValues()
	{
		$this->nom_base = '0';
		$this->user_base = '0';
		$this->mdp_base = '0';
		$this->host_base = '0';
		$this->path = '0';
		$this->created_on = 0;
		$this->updated_on = 0;
	}

	/**
	 * Initializes internal state of BaseMListeEtablissement object.
	 * @see        applyDefaults()
	 */
	public function __construct()
	{
		parent::__construct();
		$this->applyDefaultValues();
	}

	/**
	 * Get the [id] column value.
	 * cle primaire de la table m_etablissements
	 * @return     int
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * Get the [nom] column value.
	 * Nom de l'etablissement
	 * @return     string
	 */
	public function getNom()
	{
		return $this->nom;
	}

	/**
	 * Get the [type] column value.
	 * Type de l'etablissement (clg, lyc, cfa, ecole, ...)
	 * @return     string
	 */
	public function getType()
	{
		return $this->type;
	}

	/**
	 * Get the [rne] column value.
	 * Nombre de place disponible pour cet atelier
	 * @return     string
	 */
	public function getRne()
	{
		return $this->rne;
	}

	/**
	 * Get the [nom_base] column value.
	 * Base de donnees de cet etablissement
	 * @return     string
	 */
	public function getNomBase()
	{
		return $this->nom_base;
	}

	/**
	 * Get the [user_base] column value.
	 * Utilisateur MySql de cette Base de donnees
	 * @return     string
	 */
	public function getUserBase()
	{
		return $this->user_base;
	}

	/**
	 * Get the [mdp_base] column value.
	 * mdp de l'utilisateur MySql de cette Base de donnees
	 * @return     string
	 */
	public function getMdpBase()
	{
		return $this->mdp_base;
	}

	/**
	 * Get the [host_base] column value.
	 * Domaine du serveur MySql
	 * @return     string
	 */
	public function getHostBase()
	{
		return $this->host_base;
	}

	/**
	 * Get the [path] column value.
	 * Chemin relatif de Gepi
	 * @return     string
	 */
	public function getPath()
	{
		return $this->path;
	}

	/**
	 * Get the [created_on] column value.
	 * timestamp UNIX de creation, pour savoir si la base est creee
	 * @return     int
	 */
	public function getCreatedOn()
	{
		return $this->created_on;
	}

	/**
	 * Get the [updated_on] column value.
	 * timestamp UNIX de modification
	 * @return     int
	 */
	public function getUpdatedOn()
	{
		return $this->updated_on;
	}

	/**
	 * Set the value of [id] column.
	 * cle primaire de la table m_etablissements
	 * @param      int $v new value
	 * @return     MListeEtablissement The current object (for fluent API support)
	 */
	public function setId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = MListeEtablissementPeer::ID;
		}

		return $this;
	} // setId()

	/**
	 * Set the value of [nom] column.
	 * Nom de l'etablissement
	 * @param      string $v new value
	 * @return     MListeEtablissement The current object (for fluent API support)
	 */
	public function setNom($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->nom !== $v) {
			$this->nom = $v;
			$this->modifiedColumns[] = MListeEtablissementPeer::NOM;
		}

		return $this;
	} // setNom()

	/**
	 * Set the value of [type] column.
	 * Type de l'etablissement (clg, lyc, cfa, ecole, ...)
	 * @param      string $v new value
	 * @return     MListeEtablissement The current object (for fluent API support)
	 */
	public function setType($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->type !== $v) {
			$this->type = $v;
			$this->modifiedColumns[] = MListeEtablissementPeer::TYPE;
		}

		return $this;
	} // setType()

	/**
	 * Set the value of [rne] column.
	 * Nombre de place disponible pour cet atelier
	 * @param      string $v new value
	 * @return     MListeEtablissement The current object (for fluent API support)
	 */
	public function setRne($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->rne !== $v) {
			$this->rne = $v;
			$this->modifiedColumns[] = MListeEtablissementPeer::RNE;
		}

		return $this;
	} // setRne()

	/**
	 * Set the value of [nom_base] column.
	 * Base de donnees de cet etablissement
	 * @param      string $v new value
	 * @return     MListeEtablissement The current object (for fluent API support)
	 */
	public function setNomBase($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->nom_base !== $v || $this->isNew()) {
			$this->nom_base = $v;
			$this->modifiedColumns[] = MListeEtablissementPeer::NOM_BASE;
		}

		return $this;
	} // setNomBase()

	/**
	 * Set the value of [user_base] column.
	 * Utilisateur MySql de cette Base de donnees
	 * @param      string $v new value
	 * @return     MListeEtablissement The current object (for fluent API support)
	 */
	public function setUserBase($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->user_base !== $v || $this->isNew()) {
			$this->user_base = $v;
			$this->modifiedColumns[] = MListeEtablissementPeer::USER_BASE;
		}

		return $this;
	} // setUserBase()

	/**
	 * Set the value of [mdp_base] column.
	 * mdp de l'utilisateur MySql de cette Base de donnees
	 * @param      string $v new value
	 * @return     MListeEtablissement The current object (for fluent API support)
	 */
	public function setMdpBase($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->mdp_base !== $v || $this->isNew()) {
			$this->mdp_base = $v;
			$this->modifiedColumns[] = MListeEtablissementPeer::MDP_BASE;
		}

		return $this;
	} // setMdpBase()

	/**
	 * Set the value of [host_base] column.
	 * Domaine du serveur MySql
	 * @param      string $v new value
	 * @return     MListeEtablissement The current object (for fluent API support)
	 */
	public function setHostBase($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->host_base !== $v || $this->isNew()) {
			$this->host_base = $v;
			$this->modifiedColumns[] = MListeEtablissementPeer::HOST_BASE;
		}

		return $this;
	} // setHostBase()

	/**
	 * Set the value of [path] column.
	 * Chemin relatif de Gepi
	 * @param      string $v new value
	 * @return     MListeEtablissement The current object (for fluent API support)
	 */
	public function setPath($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->path !== $v || $this->isNew()) {
			$this->path = $v;
			$this->modifiedColumns[] = MListeEtablissementPeer::PATH;
		}

		return $this;
	} // setPath()

	/**
	 * Set the value of [created_on] column.
	 * timestamp UNIX de creation, pour savoir si la base est creee
	 * @param      int $v new value
	 * @return     MListeEtablissement The current object (for fluent API support)
	 */
	public function setCreatedOn($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->created_on !== $v || $this->isNew()) {
			$this->created_on = $v;
			$this->modifiedColumns[] = MListeEtablissementPeer::CREATED_ON;
		}

		return $this;
	} // setCreatedOn()

	/**
	 * Set the value of [updated_on] column.
	 * timestamp UNIX de modification
	 * @param      int $v new value
	 * @return     MListeEtablissement The current object (for fluent API support)
	 */
	public function setUpdatedOn($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->updated_on !== $v || $this->isNew()) {
			$this->updated_on = $v;
			$this->modifiedColumns[] = MListeEtablissementPeer::UPDATED_ON;
		}

		return $this;
	} // setUpdatedOn()

	/**
	 * Indicates whether the columns in this object are only set to default values.
	 *
	 * This method can be used in conjunction with isModified() to indicate whether an object is both
	 * modified _and_ has some values set which are non-default.
	 *
	 * @return     boolean Whether the columns in this object are only been set with default values.
	 */
	public function hasOnlyDefaultValues()
	{
			if ($this->nom_base !== '0') {
				return false;
			}

			if ($this->user_base !== '0') {
				return false;
			}

			if ($this->mdp_base !== '0') {
				return false;
			}

			if ($this->host_base !== '0') {
				return false;
			}

			if ($this->path !== '0') {
				return false;
			}

			if ($this->created_on !== 0) {
				return false;
			}

			if ($this->updated_on !== 0) {
				return false;
			}

		// otherwise, everything was equal, so return TRUE
		return true;
	} // hasOnlyDefaultValues()

	/**
	 * Hydrates (populates) the object variables with values from the database resultset.
	 *
	 * An offset (0-based "start column") is specified so that objects can be hydrated
	 * with a subset of the columns in the resultset rows.  This is needed, for example,
	 * for results of JOIN queries where the resultset row includes columns from two or
	 * more tables.
	 *
	 * @param      array $row The row returned by PDOStatement->fetch(PDO::FETCH_NUM)
	 * @param      int $startcol 0-based offset column which indicates which restultset column to start with.
	 * @param      boolean $rehydrate Whether this object is being re-hydrated from the database.
	 * @return     int next starting column
	 * @throws     PropelException  - Any caught Exception will be rewrapped as a PropelException.
	 */
	public function hydrate($row, $startcol = 0, $rehydrate = false)
	{
		try {

			$this->id = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
			$this->nom = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
			$this->type = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
			$this->rne = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
			$this->nom_base = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
			$this->user_base = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
			$this->mdp_base = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
			$this->host_base = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
			$this->path = ($row[$startcol + 8] !== null) ? (string) $row[$startcol + 8] : null;
			$this->created_on = ($row[$startcol + 9] !== null) ? (int) $row[$startcol + 9] : null;
			$this->updated_on = ($row[$startcol + 10] !== null) ? (int) $row[$startcol + 10] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

			return $startcol + 11; // 11 = MListeEtablissementPeer::NUM_COLUMNS - MListeEtablissementPeer::NUM_LAZY_LOAD_COLUMNS).

		} catch (Exception $e) {
			throw new PropelException("Error populating MListeEtablissement object", $e);
		}
	}

	/**
	 * Checks and repairs the internal consistency of the object.
	 *
	 * This method is executed after an already-instantiated object is re-hydrated
	 * from the database.  It exists to check any foreign keys to make sure that
	 * the objects related to the current object are correct based on foreign key.
	 *
	 * You can override this method in the stub class, but you should always invoke
	 * the base method from the overridden method (i.e. parent::ensureConsistency()),
	 * in case your model changes.
	 *
	 * @throws     PropelException
	 */
	public function ensureConsistency()
	{

	} // ensureConsistency

	/**
	 * Reloads this object from datastore based on primary key and (optionally) resets all associated objects.
	 *
	 * This will only work if the object has been saved and has a valid primary key set.
	 *
	 * @param      boolean $deep (optional) Whether to also de-associated any related objects.
	 * @param      PropelPDO $con (optional) The PropelPDO connection to use.
	 * @return     void
	 * @throws     PropelException - if this object is deleted, unsaved or doesn't have pk match in db
	 */
	public function reload($deep = false, PropelPDO $con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("Cannot reload a deleted object.");
		}

		if ($this->isNew()) {
			throw new PropelException("Cannot reload an unsaved object.");
		}

		if ($con === null) {
			$con = Propel::getConnection(MListeEtablissementPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.

		$stmt = MListeEtablissementPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); // rehydrate

		if ($deep) {  // also de-associate any related objects?
		} // if (deep)
	}

	/**
	 * Removes this object from datastore and sets delete attribute.
	 *
	 * @param      PropelPDO $con
	 * @return     void
	 * @throws     PropelException
	 * @see        BaseObject::setDeleted()
	 * @see        BaseObject::isDeleted()
	 */
	public function delete(PropelPDO $con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(MListeEtablissementPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$con->beginTransaction();
		try {
			$ret = $this->preDelete($con);
			if ($ret) {
				MListeEtablissementQuery::create()
					->filterByPrimaryKey($this->getPrimaryKey())
					->delete($con);
				$this->postDelete($con);
				$con->commit();
				$this->setDeleted(true);
			} else {
				$con->commit();
			}
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	}

	/**
	 * Persists this object to the database.
	 *
	 * If the object is new, it inserts it; otherwise an update is performed.
	 * All modified related objects will also be persisted in the doSave()
	 * method.  This method wraps all precipitate database operations in a
	 * single transaction.
	 *
	 * @param      PropelPDO $con
	 * @return     int The number of rows affected by this insert/update and any referring fk objects' save() operations.
	 * @throws     PropelException
	 * @see        doSave()
	 */
	public function save(PropelPDO $con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(MListeEtablissementPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$con->beginTransaction();
		$isInsert = $this->isNew();
		try {
			$ret = $this->preSave($con);
			if ($isInsert) {
				$ret = $ret && $this->preInsert($con);
			} else {
				$ret = $ret && $this->preUpdate($con);
			}
			if ($ret) {
				$affectedRows = $this->doSave($con);
				if ($isInsert) {
					$this->postInsert($con);
				} else {
					$this->postUpdate($con);
				}
				$this->postSave($con);
				MListeEtablissementPeer::addInstanceToPool($this);
			} else {
				$affectedRows = 0;
			}
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	}

	/**
	 * Performs the work of inserting or updating the row in the database.
	 *
	 * If the object is new, it inserts it; otherwise an update is performed.
	 * All related objects are also updated in this method.
	 *
	 * @param      PropelPDO $con
	 * @return     int The number of rows affected by this insert/update and any referring fk objects' save() operations.
	 * @throws     PropelException
	 * @see        save()
	 */
	protected function doSave(PropelPDO $con)
	{
		$affectedRows = 0; // initialize var to track total num of affected rows
		if (!$this->alreadyInSave) {
			$this->alreadyInSave = true;

			if ($this->isNew() ) {
				$this->modifiedColumns[] = MListeEtablissementPeer::ID;
			}

			// If this object has been modified, then save it to the database.
			if ($this->isModified()) {
				if ($this->isNew()) {
					$criteria = $this->buildCriteria();
					if ($criteria->keyContainsValue(MListeEtablissementPeer::ID) ) {
						throw new PropelException('Cannot insert a value for auto-increment primary key ('.MListeEtablissementPeer::ID.')');
					}

					$pk = BasePeer::doInsert($criteria, $con);
					$affectedRows = 1;
					$this->setId($pk);  //[IMV] update autoincrement primary key
					$this->setNew(false);
				} else {
					$affectedRows = MListeEtablissementPeer::doUpdate($this, $con);
				}

				$this->resetModified(); // [HL] After being saved an object is no longer 'modified'
			}

			$this->alreadyInSave = false;

		}
		return $affectedRows;
	} // doSave()

	/**
	 * Array of ValidationFailed objects.
	 * @var        array ValidationFailed[]
	 */
	protected $validationFailures = array();

	/**
	 * Gets any ValidationFailed objects that resulted from last call to validate().
	 *
	 *
	 * @return     array ValidationFailed[]
	 * @see        validate()
	 */
	public function getValidationFailures()
	{
		return $this->validationFailures;
	}

	/**
	 * Validates the objects modified field values and all objects related to this table.
	 *
	 * If $columns is either a column name or an array of column names
	 * only those columns are validated.
	 *
	 * @param      mixed $columns Column name or an array of column names.
	 * @return     boolean Whether all columns pass validation.
	 * @see        doValidate()
	 * @see        getValidationFailures()
	 */
	public function validate($columns = null)
	{
		$res = $this->doValidate($columns);
		if ($res === true) {
			$this->validationFailures = array();
			return true;
		} else {
			$this->validationFailures = $res;
			return false;
		}
	}

	/**
	 * This function performs the validation work for complex object models.
	 *
	 * In addition to checking the current object, all related objects will
	 * also be validated.  If all pass then <code>true</code> is returned; otherwise
	 * an aggreagated array of ValidationFailed objects will be returned.
	 *
	 * @param      array $columns Array of column names to validate.
	 * @return     mixed <code>true</code> if all validations pass; array of <code>ValidationFailed</code> objets otherwise.
	 */
	protected function doValidate($columns = null)
	{
		if (!$this->alreadyInValidation) {
			$this->alreadyInValidation = true;
			$retval = null;

			$failureMap = array();


			if (($retval = MListeEtablissementPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	/**
	 * Retrieves a field from the object by name passed in as a string.
	 *
	 * @param      string $name name
	 * @param      string $type The type of fieldname the $name is of:
	 *                     one of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
	 *                     BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM
	 * @return     mixed Value of field.
	 */
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = MListeEtablissementPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		$field = $this->getByPosition($pos);
		return $field;
	}

	/**
	 * Retrieves a field from the object by Position as specified in the xml schema.
	 * Zero-based.
	 *
	 * @param      int $pos position in xml schema
	 * @return     mixed Value of field at $pos
	 */
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getNom();
				break;
			case 2:
				return $this->getType();
				break;
			case 3:
				return $this->getRne();
				break;
			case 4:
				return $this->getNomBase();
				break;
			case 5:
				return $this->getUserBase();
				break;
			case 6:
				return $this->getMdpBase();
				break;
			case 7:
				return $this->getHostBase();
				break;
			case 8:
				return $this->getPath();
				break;
			case 9:
				return $this->getCreatedOn();
				break;
			case 10:
				return $this->getUpdatedOn();
				break;
			default:
				return null;
				break;
		} // switch()
	}

	/**
	 * Exports the object as an array.
	 *
	 * You can specify the key type of the array by passing one of the class
	 * type constants.
	 *
	 * @param     string  $keyType (optional) One of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME,
	 *                    BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
	 *                    Defaults to BasePeer::TYPE_PHPNAME.
	 * @param     boolean $includeLazyLoadColumns (optional) Whether to include lazy loaded columns. Defaults to TRUE.
	 *
	 * @return    array an associative array containing the field names (as keys) and field values
	 */
	public function toArray($keyType = BasePeer::TYPE_PHPNAME, $includeLazyLoadColumns = true)
	{
		$keys = MListeEtablissementPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getNom(),
			$keys[2] => $this->getType(),
			$keys[3] => $this->getRne(),
			$keys[4] => $this->getNomBase(),
			$keys[5] => $this->getUserBase(),
			$keys[6] => $this->getMdpBase(),
			$keys[7] => $this->getHostBase(),
			$keys[8] => $this->getPath(),
			$keys[9] => $this->getCreatedOn(),
			$keys[10] => $this->getUpdatedOn(),
		);
		return $result;
	}

	/**
	 * Sets a field from the object by name passed in as a string.
	 *
	 * @param      string $name peer name
	 * @param      mixed $value field value
	 * @param      string $type The type of fieldname the $name is of:
	 *                     one of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
	 *                     BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM
	 * @return     void
	 */
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = MListeEtablissementPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	/**
	 * Sets a field from the object by Position as specified in the xml schema.
	 * Zero-based.
	 *
	 * @param      int $pos position in xml schema
	 * @param      mixed $value field value
	 * @return     void
	 */
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setNom($value);
				break;
			case 2:
				$this->setType($value);
				break;
			case 3:
				$this->setRne($value);
				break;
			case 4:
				$this->setNomBase($value);
				break;
			case 5:
				$this->setUserBase($value);
				break;
			case 6:
				$this->setMdpBase($value);
				break;
			case 7:
				$this->setHostBase($value);
				break;
			case 8:
				$this->setPath($value);
				break;
			case 9:
				$this->setCreatedOn($value);
				break;
			case 10:
				$this->setUpdatedOn($value);
				break;
		} // switch()
	}

	/**
	 * Populates the object using an array.
	 *
	 * This is particularly useful when populating an object from one of the
	 * request arrays (e.g. $_POST).  This method goes through the column
	 * names, checking to see whether a matching key exists in populated
	 * array. If so the setByName() method is called for that column.
	 *
	 * You can specify the key type of the array by additionally passing one
	 * of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME,
	 * BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
	 * The default key type is the column's phpname (e.g. 'AuthorId')
	 *
	 * @param      array  $arr     An array to populate the object from.
	 * @param      string $keyType The type of keys the array uses.
	 * @return     void
	 */
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = MListeEtablissementPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNom($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setType($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setRne($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setNomBase($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setUserBase($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setMdpBase($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setHostBase($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setPath($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setCreatedOn($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setUpdatedOn($arr[$keys[10]]);
	}

	/**
	 * Build a Criteria object containing the values of all modified columns in this object.
	 *
	 * @return     Criteria The Criteria object containing all modified values.
	 */
	public function buildCriteria()
	{
		$criteria = new Criteria(MListeEtablissementPeer::DATABASE_NAME);

		if ($this->isColumnModified(MListeEtablissementPeer::ID)) $criteria->add(MListeEtablissementPeer::ID, $this->id);
		if ($this->isColumnModified(MListeEtablissementPeer::NOM)) $criteria->add(MListeEtablissementPeer::NOM, $this->nom);
		if ($this->isColumnModified(MListeEtablissementPeer::TYPE)) $criteria->add(MListeEtablissementPeer::TYPE, $this->type);
		if ($this->isColumnModified(MListeEtablissementPeer::RNE)) $criteria->add(MListeEtablissementPeer::RNE, $this->rne);
		if ($this->isColumnModified(MListeEtablissementPeer::NOM_BASE)) $criteria->add(MListeEtablissementPeer::NOM_BASE, $this->nom_base);
		if ($this->isColumnModified(MListeEtablissementPeer::USER_BASE)) $criteria->add(MListeEtablissementPeer::USER_BASE, $this->user_base);
		if ($this->isColumnModified(MListeEtablissementPeer::MDP_BASE)) $criteria->add(MListeEtablissementPeer::MDP_BASE, $this->mdp_base);
		if ($this->isColumnModified(MListeEtablissementPeer::HOST_BASE)) $criteria->add(MListeEtablissementPeer::HOST_BASE, $this->host_base);
		if ($this->isColumnModified(MListeEtablissementPeer::PATH)) $criteria->add(MListeEtablissementPeer::PATH, $this->path);
		if ($this->isColumnModified(MListeEtablissementPeer::CREATED_ON)) $criteria->add(MListeEtablissementPeer::CREATED_ON, $this->created_on);
		if ($this->isColumnModified(MListeEtablissementPeer::UPDATED_ON)) $criteria->add(MListeEtablissementPeer::UPDATED_ON, $this->updated_on);

		return $criteria;
	}

	/**
	 * Builds a Criteria object containing the primary key for this object.
	 *
	 * Unlike buildCriteria() this method includes the primary key values regardless
	 * of whether or not they have been modified.
	 *
	 * @return     Criteria The Criteria object containing value(s) for primary key(s).
	 */
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(MListeEtablissementPeer::DATABASE_NAME);
		$criteria->add(MListeEtablissementPeer::ID, $this->id);

		return $criteria;
	}

	/**
	 * Returns the primary key for this object (row).
	 * @return     int
	 */
	public function getPrimaryKey()
	{
		return $this->getId();
	}

	/**
	 * Generic method to set the primary key (id column).
	 *
	 * @param      int $key Primary key.
	 * @return     void
	 */
	public function setPrimaryKey($key)
	{
		$this->setId($key);
	}

	/**
	 * Returns true if the primary key for this object is null.
	 * @return     boolean
	 */
	public function isPrimaryKeyNull()
	{
		return null === $this->getId();
	}

	/**
	 * Sets contents of passed object to values from current object.
	 *
	 * If desired, this method can also make copies of all associated (fkey referrers)
	 * objects.
	 *
	 * @param      object $copyObj An object of MListeEtablissement (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false)
	{
		$copyObj->setNom($this->nom);
		$copyObj->setType($this->type);
		$copyObj->setRne($this->rne);
		$copyObj->setNomBase($this->nom_base);
		$copyObj->setUserBase($this->user_base);
		$copyObj->setMdpBase($this->mdp_base);
		$copyObj->setHostBase($this->host_base);
		$copyObj->setPath($this->path);
		$copyObj->setCreatedOn($this->created_on);
		$copyObj->setUpdatedOn($this->updated_on);

		$copyObj->setNew(true);
		$copyObj->setId(NULL); // this is a auto-increment column, so set to default value
	}

	/**
	 * Makes a copy of this object that will be inserted as a new row in table when saved.
	 * It creates a new object filling in the simple attributes, but skipping any primary
	 * keys that are defined for the table.
	 *
	 * If desired, this method can also make copies of all associated (fkey referrers)
	 * objects.
	 *
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @return     MListeEtablissement Clone of current object.
	 * @throws     PropelException
	 */
	public function copy($deepCopy = false)
	{
		// we use get_class(), because this might be a subclass
		$clazz = get_class($this);
		$copyObj = new $clazz();
		$this->copyInto($copyObj, $deepCopy);
		return $copyObj;
	}

	/**
	 * Returns a peer instance associated with this om.
	 *
	 * Since Peer classes are not to have any instance attributes, this method returns the
	 * same instance for all member of this class. The method could therefore
	 * be static, but this would prevent one from overriding the behavior.
	 *
	 * @return     MListeEtablissementPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new MListeEtablissementPeer();
		}
		return self::$peer;
	}

	/**
	 * Clears the current object and sets all attributes to their default values
	 */
	public function clear()
	{
		$this->id = null;
		$this->nom = null;
		$this->type = null;
		$this->rne = null;
		$this->nom_base = null;
		$this->user_base = null;
		$this->mdp_base = null;
		$this->host_base = null;
		$this->path = null;
		$this->created_on = null;
		$this->updated_on = null;
		$this->alreadyInSave = false;
		$this->alreadyInValidation = false;
		$this->clearAllReferences();
		$this->applyDefaultValues();
		$this->resetModified();
		$this->setNew(true);
		$this->setDeleted(false);
	}

	/**
	 * Resets all collections of referencing foreign keys.
	 *
	 * This method is a user-space workaround for PHP's inability to garbage collect objects
	 * with circular references.  This is currently necessary when using Propel in certain
	 * daemon or large-volumne/high-memory operations.
	 *
	 * @param      boolean $deep Whether to also clear the references on all associated objects.
	 */
	public function clearAllReferences($deep = false)
	{
		if ($deep) {
		} // if ($deep)

	}

	/**
	 * Catches calls to virtual methods
	 */
	public function __call($name, $params)
	{
		if (preg_match('/get(\w+)/', $name, $matches)) {
			$virtualColumn = $matches[1];
			if ($this->hasVirtualColumn($virtualColumn)) {
				return $this->getVirtualColumn($virtualColumn);
			}
			// no lcfirst in php<5.3...
			$virtualColumn[0] = strtolower($virtualColumn[0]);
			if ($this->hasVirtualColumn($virtualColumn)) {
				return $this->getVirtualColumn($virtualColumn);
			}
		}
		return parent::__call($name, $params);
	}

} // BaseMListeEtablissement
