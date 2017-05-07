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
			when `decenie` >= 2000 then "2000-3000"
		end;
	
	
UPDATE `canton` SET `canton`=replace(canton,"\'"," ");
UPDATE `collection` SET `collection`=replace(collection,"_"," "),`classement1`=replace(classement1,"_"," "),`classement2`=replace(classement2,"_"," ");
UPDATE `country` SET `country`=replace(country,"_"," ");
UPDATE `decenie` SET `century`=replace(century,"_"," "),`millennium`=replace(millennium,"_"," ");
UPDATE `department` SET `department`=replace(department,"_"," ");
UPDATE `locality` SET `locality`=replace(locality,"_"," ");

UPDATE `canton` SET `canton`=replace(canton,"\'","_");# 130 lignes affectées.

UPDATE `collection` SET `collection`=replace(collection,"\'","_");# 19 lignes affectées.

UPDATE `country` SET `country`=replace(country,"\'","_");# 9 lignes affectées.

UPDATE `department` SET `department`=replace(department,"\'","_");# 20 lignes affectées.

UPDATE `locality` SET `locality`=replace(locality,"\'","_");# 898 lignes affectées.

UPDATE `editedmusicalnote` SET `type_document`=replace(type_document,"\'","_");# MySQL a retourné un résultat vide (aucune ligne).

UPDATE `noneditedmusicalnote` SET `type_document`=replace(type_document,"\'","_");# MySQL a retourné un résultat vide (aucune ligne).

UPDATE `recipenote` SET `type_document`=replace(type_document,"\'","_");# MySQL a retourné un résultat vide (aucune ligne).

UPDATE `spokenarchivenote` SET `type_document`=replace(type_document,"\'","_");# MySQL a retourné un résultat vide (aucune ligne).

UPDATE `handwrittennote` SET `type_document`=replace(type_document,"\'","_");# MySQL a retourné un résultat vide (aucune ligne).

UPDATE `icovideographynote` SET `type_document`=replace(type_document,"\'","_");# MySQL a retourné un résultat vide (aucune ligne).
