<?php

require_once(dirname(__FILE__)."/../helpers/CRestAPI.php");

abstract class CModel {

	public static function getWebServiceURI() {
		include(dirname(__FILE__)."/../config/webserviceConfig.php");
		return $wsURL . strtolower(get_called_class());
	}

	public static function get($id) {
		$uri = self::getWebServiceURI() . "/" . $id;
		$response = CRestAPI::callAPI("GET", $uri);
		return CRestAPI::compileXML($response);
	}

	/*
	 *@return SimpleXMLElement with all records on the table
	 * 
	 */
	public static function getAll($criteria = false) {
		$uri = self::getWebServiceURI() . "/getall";
		$response = CRestAPI::callAPI("GET", $uri, $criteria);
		return CRestAPI::compileXML($response);
	}

	public static function delete($id) {
		$uri = self::getWebServiceURI() . "/" . $id;		
		$response = CRestAPI::callAPI("DELETE", $uri, false);
                return CRestAPI::compileXML($response);		
	}

	public static function add($data) {
		$uri = self::getWebServiceURI();
		$response = CRestAPI::callAPI("POST", $uri, $data);
                return CRestAPI::compileXML($response);
	}
}

?>