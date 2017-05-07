
<?php

require_once("./connexion.php");
//================================================================================================================================================================
//Databases connection
//================================================================================================================================================================
$dbsrc = connect("localhost", "root", "", "raddo"); //these attributs will change for the real one when possible
$dbdest = connect("localhost", "root", "", "ethnodoc");

$sql = 'insert into ethnodoc.locality (locality_id, locality,locality_id)SELECT cle_localite, localite,cle_locality

			from raddo.c_localite;
		UPDATE `locality` SET `locality`=replace(locality,"\'","_");
		insert into locality(locality_id, locality) value (0,"inconnu");';
				
			
//Query
$res = mysqli_query($dbdest,$sql) or die(mysql_error());
//Databases deconnection
mysqli_close();
?>
Status API Training Shop Blog About
© 2016 GitHub, Inc. Terms Privacy Security Contact Help