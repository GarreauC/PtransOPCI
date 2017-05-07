
<?php

require_once("./connexion.php");
//================================================================================================================================================================
//Databases connection
//================================================================================================================================================================
$dbsrc = connect("localhost", "root", "", "raddo"); //these attributs will change for the real one when possible
$dbdest = connect("localhost", "root", "", "ethnodoc");

$sql = 'insert into ethnodoc.collection (collection_id, collection, classement1, classement2)SELECT cle_collection,collection,collection,collection from raddo.c_collection;
		UPDATE collection 
			SET `classement1`= case 
				when lower(`collection`) like "a%" or lower(`collection`) like "b%" or lower(`collection`) like "c%" then "A-C"
				when lower(`collection`) like "d%" or lower(`collection`) like "e%" or lower(`collection`) like "f%" then "D-F"
				when lower(`collection`) like "g%" or lower(`collection`) like "h%" or lower(`collection`) like "i%" then "G-I"
				when lower(`collection`) like "j%" or lower(`collection`) like "k%" or lower(`collection`) like "l%" then "J-L"
				when lower(`collection`) like "m%" or lower(`collection`) like "n%" or lower(`collection`) like "o%" then "M-O"
				when lower(`collection`) like "p%" or lower(`collection`) like "q%" or lower(`collection`) like "r%" or lower(`collection`) like "%s" then "P-S"
				when lower(`collection`) like "t%" or lower(`collection`) like "u%" or lower(`collection`) like "v%" then "T-V"
				when lower(`collection`) like "w%" or lower(`collection`) like "x%" or lower(`collection`) like "y%" or lower(`collection`) like "%z" then "W-Z"
				
			end,
			
			`classement2`= case 
				when lower(`collection`) like "a%" or lower(`collection`) like "b%" or lower(`collection`) like "c%" or lower(`collection`) like "d%" or lower(`collection`) like "e%" or lower(`collection`) like "f%" then "A-F"
				when lower(`collection`) like "g%" or lower(`collection`) like "h%" or lower(`collection`) like "i%" or lower(`collection`) like "j%" or lower(`collection`) like "k%" or lower(`collection`) like "l%" then "G-L"
				when lower(`collection`) like "m%" or lower(`collection`) like "n%" or lower(`collection`) like "o%" or lower(`collection`) like "p%" or lower(`collection`) like "q%" or lower(`collection`) like "r%" or lower(`collection`) like "s%" then "M-S"
				when lower(`collection`) like "t%" or lower(`collection`) like "u%" or lower(`collection`) like "v%" or lower(`collection`) like "w%" or lower(`collection`) like "x%" or lower(`collection`) like "y%" or lower(`collection`) like "z%" then "T-Z"
				
			end;
			
		insert into ethnodoc.collection(collection_id, collection) value (0, "inconnu");
		
		UPDATE `collection` SET `collection`=replace(collection,"\'","_");';
//Query
$res = mysqli_query($dbdest,$sql) or die(mysql_error());
//Databases deconnection
mysqli_close();
?>
Status API Training Shop Blog About
© 2016 GitHub, Inc. Terms Privacy Security Contact Help