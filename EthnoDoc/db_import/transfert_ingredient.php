
<?php

require_once("./connexion.php");
//================================================================================================================================================================
//Databases connection
//================================================================================================================================================================
$dbsrc = connect("localhost", "root", "", "raddo"); //these attributs will change for the real one when possible
$dbdest = connect("localhost", "root", "", "ethnodoc");

$sql = 'insert into ethnodoc.ingredient (id, ingredient)SELECT cle_ingredient,nom_usage_ingredient from raddo.c_ingredient;
		UPDATE ethnodoc.ingredient SET ingredient=replace(ingredient,"\'","_");
		insert into ingredient(ingredient_id, ingredient) value (0,"inconnu");';
//Query
$res = mysqli_query($dbdest,$sql) or die(mysql_error());
//Databases deconnection
mysqli_close();
?>
Status API Training Shop Blog About
© 2016 GitHub, Inc. Terms Privacy Security Contact Help