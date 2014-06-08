<?php
include_once(dirname(__FILE__)."/models/Country.php");
include_once(dirname(__FILE__)."/models/City.php");
include_once(dirname(__FILE__)."/models/User.php");
include_once(dirname(__FILE__)."/helpers/CHtml.php");

$results = Country::getNames();

echo "<h1>Country Names:</h1><br />";
print_r(htmlentities((CHtml::compileSelectOptions($results))));
echo "<br /><br /><br />";

$results = City::get(1);

echo "<h1>City:</h1><br />";
print_r($results);
echo "<br /><br /><br />";

$results = User::getAll();

echo "<h1>User:</h1><br />";
print_r($results);
echo "<br /><br /><br />";

?>