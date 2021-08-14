<?php
// Class : SQLManager
// Version : 1.2
// Create By : GoGermany
// Date Time : 27/10/2009 9:39 PM

//require ('../connections/mall.php');



if (class_exists ( 'SQLManager' ) === false) {

	// ADD Var sql
	class SQLManager {
		var $table;
		var $field;
		var $value;
		var $condition;
		var $sql;
		var $deleteAlias;

		public function __construct() {
			$this->field = "*";
		}

		// ====================INSERT======================
		public function insert() {
			$this->sql = "INSERT INTO $this->table ($this->field) VALUES ($this->value)";
			$result = mysqli_query ($GLOBALS["conn"], $this->sql ) or trigger_error ( mysqli_error ($GLOBALS["conn"]), E_USER_ERROR );
			return $result;
		}

		// ====================DELETE======================
		public function delete() {
			$this->sql = "DELETE $this->deleteAlias from $this->table $this->condition";
			$result = mysqli_query ($GLOBALS["conn"], $this->sql ) or trigger_error ( mysqli_error ($GLOBALS["conn"]), E_USER_ERROR );
			return $result;
		}

		// =====================UPDATE=====================
		public function update() {
			$this->sql = "UPDATE $this->table SET $this->value $this->condition";
			$result = mysqli_query ($GLOBALS["conn"], $this->sql ) or trigger_error ( mysqli_error ($GLOBALS["conn"]), E_USER_ERROR );
			return $result;
		}

		// =====================SELECT=====================
		public function select() {

			$this->sql = "SELECT $this->field FROM $this->table $this->condition";
			$result = mysqli_query ($GLOBALS["conn"], $this->sql ) or trigger_error ( mysqli_error ($GLOBALS["conn"]), E_USER_ERROR );
			return $result;
		}

		// =====================MAX=====================
		public function selectMax() {
			$this->sql = "SELECT max($this->field) FROM $this->table";
			$result = mysqli_query ($GLOBALS["conn"], $this->sql ) or trigger_error ( mysqli_error ($GLOBALS["conn"]), E_USER_ERROR );
			$row = mysqli_fetch_array ( $result );
			$id_max = $row [0];
			return $id_max;
		}

		// =====================COUNTROW=====================
		public function countRow() {
			$this->sql = "SELECT COUNT($this->field) FROM $this->table $this->condition";
			$result = mysqli_query ( $GLOBALS["conn"], $this->sql ) or trigger_error ( mysqli_error ($GLOBALS["conn"]), E_USER_ERROR );
			$row = mysqli_fetch_array ( $result );
			$countrow = $row [0];
			return $countrow;
		}
	}

	if (! function_exists ( "GetSQLValueString" )) {
		function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") {
			if (PHP_VERSION < 6) {
				$theValue = get_magic_quotes_gpc () ? stripslashes ( $theValue ) : $theValue;
			}

			//$theValue = function_exists ( "mysqli_real_escape_string" ) ? mysqlireali_escape_string ( $theValue ) : mysqli_escape_string ( $theValue );

			switch ($theType) {
				case "text" :
					$theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
					break;
				case "long" :
				case "int" :
					$theValue = ($theValue != "") ? intval ( $theValue ) : "NULL";
					break;
				case "double" :
					$theValue = ($theValue != "") ? doubleval ( $theValue ) : "NULL";
					break;
				case "date" :
					$theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
					break;
				case "defined" :
					$theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
					break;
			}
			return $theValue;
		}
	}
}
?>