
<?php

require_once("./connexion.php");
//================================================================================================================================================================
//Databases connection
//================================================================================================================================================================
$dbsrc = connect("localhost", "root", "", "raddo"); //these attributs will change for the real one when possible
$dbdest = connect("localhost", "root", "", "ethnodoc");

$sql = 'insert into ethnodoc.witness (id,surname, name)SELECT cle_temoin,nom_temoin,prenom_temoin
			from raddo.c_temoin;
		UPDATE ethnodoc.witness SET surname=replace(surname,"\'","_"), name=replace(name,"\'","_");
		
		insert into witness(witness_id, surname, name) value (0,"inconnu","inconnu");';
				
			
//Query
$res = mysqli_query($dbdest,$sql) or die(mysql_error());
//Databases deconnection
mysqli_close();
?>
Status API Training Shop Blog About
© 2016 GitHub, Inc. Terms Privacy Security Contact Help