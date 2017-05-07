
<?php

require_once("./connexion.php");
//================================================================================================================================================================
//Databases connection
//================================================================================================================================================================
$dbsrc = connect("localhost", "root", "", "raddo"); //these attributs will change for the real one when possible
$dbdest = connect("localhost", "root", "", "ethnodoc");

$sql = 'insert into ethnodoc.canton (canton_id,canton,department_id)SELECT cle_canton,canton,cle_depart from raddo.c_canton;
		UPDATE `canton` SET `canton`=replace(canton,"\'","_");
		insert into canton(canton_id, canton) value (0,"inconnu");';
//Query
$res = mysqli_query($dbdest,$sql) or die(mysql_error());
//Databases deconnection
mysqli_close();
?>
Status API Training Shop Blog About
© 2016 GitHub, Inc. Terms Privacy Security Contact Help