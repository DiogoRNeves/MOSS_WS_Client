<?php

require_once(dirname(__FILE__)."/../helpers/CModel.php");

class Country extends CModel {
	/**
	 *
	 **/
	public static function getNames() {
		$allUsers = self::getAll();
		$result = array();
		foreach ($allUsers as $key => $value) {
			$result[] = (array) $value;
		}
		return $result;
	}
}

?>