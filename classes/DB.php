<?php
class DB{
	private static $_instance = null;
	private $_pdo,
	$_query,
	$_error = false,
	$_results,
	$_count = 0;

	private function __construct(){
		try{
			$this->_pdo = new PDO('mysql:host='.Config::get('mysql/host').';dbname='.Config::get('mysql/db'), Config::get('mysql/username'), Config::get('mysql/password'));
		}catch(PDOException $e){
			die($e->getMessage());
		}
	}

	public static function getInstance(){
		if(!isset(self::$_instance)){
			self::$_instance = new DB();
		}
		return self::$_instance;
	}

	public function query($sql, $params = array()){
		$this->_error = false;
		// $this->_pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		if($this->_query = $this->_pdo->prepare($sql)){
			$x = 1;
			if(count($params)){
				foreach($params as $param){
					if(is_int($param)){
						$this->_query->bindValue($x, $param,PDO::PARAM_INT);
					}else{
						$this->_query->bindValue($x, $param);
					}
					$x++;
				}
			}

			if($this->_query->execute()){
				$this->_results = $this->_query->fetchAll(PDO::FETCH_OBJ);
				$this->_count = $this->_query->rowCount();
			}else{
				print_r($this->_query->errorInfo());
				$this->_error = true;
			}
		}
		return $this;
	}

	public function action($action, $table, $where = array()){
		if(count($where) === 3){
			$operators = array('=', '>', '<', '>=', '<=');

			$field = $where[0];
			$operator = $where[1];
			$value = $where[2];

			if(in_array($operator, $operators)){
				$sql = "{$action} FROM `{$table}` WHERE {$field} {$operator} ?";

				if(!$this->query($sql, array($value))->error()){
					return $this;
				}
			}
		}
		return false;
	}

	public function action_count($action, $table, $count = 0){
		if($count){
			$value = $count;

			$sql = "{$action} FROM `{$table}` ORDER BY id DESC LIMIT ?";

			if(!$this->query($sql, array($value))->error()){
				return $this;
			}
		}
		return false;
	}

	public function action_all($action, $table){

		$sql = "{$action} FROM `{$table}`";

		if(!$this->query($sql)->error()){
			return $this;
		}
		return false;
	}

	public function get($table, $where){
		return $this->action('SELECT *', $table, $where);
	}

	public function get_count($table, $count){
		return $this->action_count('SELECT *', $table, $count);
	}

	public function get_all($table){
		return $this->action_all('SELECT *', $table);
	}

	public function delete($table, $where){
		return $this->action('DELETE', $table, $where);
	}

	public function insert($table, $fields = array()){
		$keys = array_keys($fields);
		$values = '';
		$x = 1;

		foreach($fields as $field){
			$values .= '?';
			if($x < count($fields)){
				$values .= ', ';
			}
			$x++;
		}

		$sql = "INSERT INTO `{$table}` (`" . implode('`, `', $keys) . "`) VALUES ({$values})" ;

		if(!$this->query($sql, $fields)->error()){
			return true;
		}

		return false;
	}

	public function update($table, $id, $fields){
		$set = '';
		$x = 1;

		foreach($fields as $name => $value){
			$set .= "{$name} = ?";
			if($x < count($fields)){
				$set .= ', ';
			}
			$x++;
		}

		$sql = "UPDATE `{$table}` SET {$set} WHERE id = {$id}";

		if(!$this->query($sql, $fields)->error()){
			return true;
		}

		return false;
	}

	public function results(){
		return $this->_results;
	}

	public function first(){
		return $this->results()[0];
	}

	public function error(){
		return $this->_error;
	}

	public function count(){
		return $this->_count;
	}
}
?>