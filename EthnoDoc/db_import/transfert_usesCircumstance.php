
<?php

require_once("./connexion.php");
//================================================================================================================================================================
//Databases connection
//================================================================================================================================================================
$dbsrc = connect("localhost", "root", "", "raddo"); //these attributs will change for the real one when possible
$dbdest = connect("localhost", "root", "", "ethnodoc");

$sql = 'insert into ethnodoc.usescircumstance (id, usesCircumstance)SELECT cle_usage, _usage
			from raddo.c_usage;
			
		UPDATE ethnodoc.usescircumstance SET usesCircumstance=replace(usesCircumstance,"\'","_");
		
		insert into usesCircumstance(usesCircumstance_id, usesCircumstance) value (0,"inconnu")';
				
			
//Query
$res = mysqli_query($dbdest,$sql) or die(mysql_error());
//Databases deconnection
mysqli_close();
?>
Status API Training Shop Blog About
© 2016 GitHub, Inc. Terms Privacy Security Contact Help