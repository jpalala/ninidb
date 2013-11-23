<?php 



/**
 * The NiniDB.. its actually an old
 *
 * @package    slimMVC-Nettuts
 * @category   db-simplifier	
 * @author     Joe Palala  github.com/jpalala
 */
class NiniDB extends PDOWrapper {
	protected $_root = NULL;
	protected static $instance;
	
	private $database;
	private $db_host;
	private $db_user;
	private $db_pass;


	protected function _createInstance() {
				$objPDO = parent::instance();
				return $objPDO;
	}
	public static function getInstance() { 	
				self::$instance = $this;
	}
	
	public function __construct($objPDO = NULL) {
		
		if($objPDO === NULL) {
			if( !defined("DB_HOST") )  { 
					error_log("db_host not defined");
			} elseif( !defined("DB_DB") ) { 
					error_log("db_db not defined"); 
			} elseif( !defined("DB_USERNAME") ) {
					error_log("db_username not defined");
			} else { 
 				
				$this->db_host  = DB_HOST; 
				$this->database = DB_DB;
				$this->db_user  = DB_USERNAME;
				$this->db_pass  = DB_PASSWORD;
		
				$objPDO =  $this->_createIntance(); //$pdoi =  PDOWrapper::instance();
				$objPDO->configMaster($this->dbhost, $this->db,$this->dbuser,$this->dbpass);
			
				return $objPDO;
			}
		} else {
			throw new Exception("NiniDB - Failed to initialize");
		}
	}



	

	/**
	 * Runs the query using the query (free form select) method of  ThinPDOWrapper class
	 *
	 * @param string|array path
	 * @return this
	 */
	public function simpleQuery($query) { 
		return $this->query($query);
	}
	/*
         * **Execq** 
         * Normally, this execq function is for doing update/insert/truncate/delete SQL commands , not selecting.
         */ 
	public function execq($query) {
		return $this->execute($query);
	}

	//@params $cols array
	public function simpleSelect($table,$cols) {
		return $this->select($table,$cols);
	}
	/**
	 * setTimeZone(tz)
         * sets the time in given zone
	 * 
	 * @params $timezone i.e. America/Los Angeles or Asia/Tokyo
         * @note To be run by the bootstrapping page
	 */
	public static function setTimeZone($timezone) 
	{
 		date_default_timezone_set($timezone);		
	}


	/**
	 * Get_Where
	 * inspired by get_where in codeigniter's activerecord
         *
	 * @param	string	the where clause
	 * @param	string	the limit clause
	 * @param	string	the offset clause
	 * @return	object
	 */
	public function get_where($table = '', $where = null, $limit = null, $offset = null)
	{
		$sql = 'SELECT * FROM '. $table;
		//my code
		if(!is_null($where)) {
			$sql .= 'WHERE '.$where;
		}

		if(is_null($limit)) {
			$limit = '';
		} else {
			if(!is_null($offset)) {
				$sql .= ' LIMIT ' . $limit . ','. $offset;
			}
			
		}
	

		$result = $this->query($sql);

		return $result;
	}

	/* 
	*clone of PDOWrapper::update() 
         * @modified 2013-11-23
	*/
	public function update($table, $params, $wheres = Array(), $timestamp_this = NULL) 
	{
		parent::update($table, $params, $wheres, $timestamp_this);
	}

	/*
         * clone of PDOWrapper::delete()
	*/
	public function delete($table,$params = Array()) 
	{
		parent::delete($table,$params);

	}	
}
