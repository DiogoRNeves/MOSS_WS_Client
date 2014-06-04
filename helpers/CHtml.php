<?php

class CHtml{
	public static function compileSelectOptions($values) {
		//return "<option value=\"nome3\">Valor3</option>";
		$keys = array();
		foreach ($values[0] as $key => $value) {
			$keys[] = $key;
		}
			//var_dump($keys);

		$output = "";
		foreach ($values as $key => $value) {
			//var_dump($value[$keys[0]]);

			$output .= "<option value=\"" . $value[$keys[0]] . "\">" . 
				$value[$keys[1]] . "</option>\n";
		}

		return $output;
	}	
}

?>