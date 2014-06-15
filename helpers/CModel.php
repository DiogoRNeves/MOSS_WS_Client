<?php

require_once(dirname(__FILE__)."/../helpers/CRestAPI.php");

abstract class CModel {

	public static function getWebServiceURI() {
		include(dirname(__FILE__)."/../config/webserviceConfig.php");
		return $wsURL . strtolower(get_called_class());
	}

	public static function get($id) {
		$uri = self::getWebServiceURI() . "/" . $id;
		//$uri = "http://localhost/moss-ws/rest/" . get_called_class() . "/getall";
		$xmlResponse = CRestAPI::callAPI("GET", $uri);
		return new SimpleXMLElement($xmlResponse);
	}

	/*
	 *@return SimpleXMLElement with all records on the table
	 * 
	 */
	public static function getAll($criteria = false) {
		$uri = self::getWebServiceURI() . "/getall";
		//$uri = "http://localhost/moss-ws/rest/" . get_called_class() . "/getall";
		$xmlResponse = CRestAPI::callAPI("GET", $uri, $criteria);
		return new SimpleXMLElement($xmlResponse);
	}

	public static function delete($id) {
		$uri = self::getWebServiceURI() . "/" . $id;		
		$response = CRestAPI::callAPI("DELETE", $uri, false);
                try {
                    return new SimpleXMLElement($response);
                } catch (Exception $ex) {
                    return $response;
                }		
	}

	public static function add($data) {
		$uri = self::getWebServiceURI();
                print_r($uri);
		$response = CRestAPI::callAPI("POST", $uri, $data);
                try {
                    return new SimpleXMLElement($response);
                } catch (Exception $ex) {
                    return $response;
                }
	}
}

?>