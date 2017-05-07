
<?php

require_once("./connexion.php");
//================================================================================================================================================================
//Databases connection
//================================================================================================================================================================
$dbsrc = connect("localhost", "root", "", "raddo"); //these attributs will change for the real one when possible
$dbdest = connect("localhost", "root", "", "ethnodoc");

$sql = 'insert into ethnodoc.department (department_id, country_id,department)SELECT cle_depart, cle_pays,depart from raddo.c_departement;
		UPDATE `department` SET `department`=replace(department,"\'","_");
		insert into department(department_id, department) value (0,"inconnu")';
//Query
$res = mysqli_query($dbdest,$sql) or die(mysql_error());
//Databases deconnection
mysqli_close();
?>
Status API Training Shop Blog About
© 2016 GitHub, Inc. Terms Privacy Security Contact Help