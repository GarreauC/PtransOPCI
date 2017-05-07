
<?php

require_once("./connexion.php");
//================================================================================================================================================================
//Databases connection
//================================================================================================================================================================
$dbsrc = connect("localhost", "root", "", "raddo"); //these attributs will change for the real one when possible
$dbdest = connect("localhost", "root", "", "ethnodoc");

$sql = 'insert into ethnodoc.interpret (id, interpret)SELECT cle_artiste,artiste from raddo.c_artiste;
		UPDATE ethnodoc.interpret SET interpret=replace(interpret,"\'","_");
		insert into interpret(interpret_id, interpret) value (0,"inconnu");';
//Query
$res = mysqli_query($dbdest,$sql) or die(mysql_error());
//Databases deconnection
mysqli_close();
?>
Status API Training Shop Blog About
© 2016 GitHub, Inc. Terms Privacy Security Contact Help