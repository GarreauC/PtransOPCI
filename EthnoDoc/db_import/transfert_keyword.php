
<?php

require_once("./connexion.php");
//================================================================================================================================================================
//Databases connection
//================================================================================================================================================================
$dbsrc = connect("localhost", "root", "", "raddo"); //these attributs will change for the real one when possible
$dbdest = connect("localhost", "root", "", "ethnodoc");

$sql = 'insert into ethnodoc.keyword (id, keyword)SELECT cle_mot, francais
			from raddo.c_mot;
		UPDATE ethnodoc.keyword SET keyword=replace(keyword,"\'","_");
		insert into keyword(keyword_id, keyword) value (0,"inconnu");';		
			
//Query
$res = mysqli_query($dbdest,$sql) or die(mysql_error());
//Databases deconnection
mysqli_close();
?>
Status API Training Shop Blog About
© 2016 GitHub, Inc. Terms Privacy Security Contact Help