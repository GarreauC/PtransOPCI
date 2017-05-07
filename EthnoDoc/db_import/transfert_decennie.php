
<?php

require_once("./connexion.php");
//================================================================================================================================================================
//Databases connection
//================================================================================================================================================================
$dbsrc = connect("localhost", "root", "", "raddo"); //these attributs will change for the real one when possible
$dbdest = connect("localhost", "root", "", "ethnodoc");

$sql = "insert into ethnodoc.decenie (id, decenie) SELECT cle_decenie, decenie
			from raddo.c_decenie;
		UPDATE `decenie` 
			SET `century`= case 
						when `decenie` < 100 then 'Moins de 100'
						when `decenie` >= 100  and `decenie` < 200 then '100-200'
						when `decenie` >= 200  and `decenie` < 300 then '200-300'
						when `decenie` >= 300  and `decenie` < 400 then '300-400'
						when `decenie` >= 400  and `decenie` < 500 then '400-500'
						when `decenie` >= 500  and `decenie` < 600 then '500-600'
						when `decenie` >= 600  and `decenie` < 700 then '600-700'
						when `decenie` >= 700  and `decenie` < 800 then '700-800'
						when `decenie` >= 800  and `decenie` < 900 then '800-900'
						when `decenie` >= 900  and `decenie` < 1000 then '900-1000'
						when `decenie` >= 1000  and `decenie` < 1100 then '1000-1100'
						when `decenie` >= 1100  and `decenie` < 1200 then '1100-1200'
						when `decenie` >= 1200  and `decenie` < 1300 then '1200-1300'
						when `decenie` >= 1300  and `decenie` < 1400 then '1300-1400'
						when `decenie` >= 1400  and `decenie` < 1500 then '1400-1500'
						when `decenie` >= 1500  and `decenie` < 1600 then '1500-1600'
						when `decenie` >= 1600  and `decenie` < 1700 then '1600-1700'
						when `decenie` >= 1700  and `decenie` < 1800 then '1700-1800'
						when `decenie` >= 1800  and `decenie` < 1900 then '1800-1900'
						when `decenie` >= 1900  and `decenie` < 2000 then '1900-2000'
						when `decenie` >= 2000  and `decenie` < 2100 then '2000-2100'
						
					end,
			`	millennium`= case 
					when `decenie` < 1000 then '0-1000'
					when `decenie` >= 100  and `decenie` < 2000 then '1000-2000'
					when `decenie` >= 2000 then '2000_et_plus'
					
				end;
				
		insert into decennie(decennie_id, decennie) value (0,'inconnu')";
				
			
//Query
$res = mysqli_query($dbdest,$sql) or die(mysql_error());
//Databases deconnection
mysqli_close();
?>
Status API Training Shop Blog About
© 2016 GitHub, Inc. Terms Privacy Security Contact Help