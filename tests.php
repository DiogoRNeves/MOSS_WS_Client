<?php
include_once(dirname(__FILE__)."/models/Country.php");
include_once(dirname(__FILE__)."/models/City.php");
include_once(dirname(__FILE__)."/models/User.php");

$results = Country::getAll();

echo "<h1>Country:</h1><br />";
print_r($results);
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