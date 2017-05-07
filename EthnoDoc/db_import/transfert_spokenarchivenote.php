<?php
require_once("./connexion.php");
//================================================================================================================================================================
//Databases connection
//================================================================================================================================================================
$dbsrc = connect("localhost", "root", "", "raddo"); //these attributs will change for the real one when possible
$dbdest = connect("localhost", "root", "", "ethnodoc");
// Edited musical note transfert query
// 19/05/2015, 24 056 insert on 24 056 edited musical note from the raddo database
$sql = 'insert into ethnodoc.spokenarchivenote (consultation, cle_reel, title, date, url, decenie_id, locality_id, language, holder_id, collection_id, type_document, survey)
                
        select raddo.c_consultation.consultation, raddo.document_global.cle_document_global, raddo.document_global.titre,raddo.document_global.date, concat(concat(concat(concat(concat("http://www.raddo-ethnodoc.com/extrait/", (case 
                        when raddo.document_global.cle_document = 1 THEN "photo" 
						when raddo.document_global.cle_document = 2 THEN "chanson" 
						when raddo.document_global.cle_document = 3 THEN "chanson_texte" 
						when raddo.document_global.cle_document = 4 THEN "temoignage" 
						when raddo.document_global.cle_document = 5 THEN "parler" 
						when raddo.document_global.cle_document = 6 THEN "conte" 
						when raddo.document_global.cle_document = 7 THEN "discographie" 
						when raddo.document_global.cle_document = 8 THEN "manuscrit" end)),"/"), mil),"/"),nom_fichier), raddo.document_global.cle_decenie, raddo.document_global.cle_localite, raddo.c_langue.langue, 
			raddo.document_global_conservateur.cle_conservateur, raddo.document_global_collection.cle_collection, raddo.c_document.document, raddo.document_global.cle_enquete
		
		from (((((raddo.document_global
			left join raddo.c_langue on raddo.c_langue.cle_langue = raddo.document_global.cle_langue)
			left join raddo.document_global_conservateur on raddo.document_global_conservateur.cle_document_global = raddo.document_global.cle_document_global )
			left join raddo.document_global_collection on raddo.document_global_collection.cle_document_global = raddo.document_global.cle_document_global )
			LEFT JOIN raddo.c_document on raddo.c_document.cle_document = raddo.document_global.cle_document)
			LEFT JOIN raddo.c_consultation ON raddo.c_consultation.cle_consultation = raddo.document_global.cle_consultation)
		WHERE raddo.document_global.cle_document = 4
        OR raddo.document_global.cle_document = 5
        OR raddo.document_global.cle_document = 6;
		
		update ethnodoc.spokenarchivenote set collection = (select collection from ethnodoc.collection where ethnodoc.collection.collection_id = ethnodoc.spokenarchivenote.collection_id);
		update ethnodoc.spokenarchivenote set holder = (select holder from ethnodoc.holder where ethnodoc.holder.holder_id = ethnodoc.spokenarchivenote.holder_id);
		update ethnodoc.spokenarchivenote set locality = (select locality from ethnodoc.locality where ethnodoc.locality.locality_id = ethnodoc.spokenarchivenote.locality_id);
		update ethnodoc.spokenarchivenote set canton = (select canton from ethnodoc.locality, ethnodoc.canton where ethnodoc.locality.locality_id = ethnodoc.spokenarchivenote.locality_id and ethnodoc.locality.canton_id=ethnodoc.canton.canton_id);
		update ethnodoc.spokenarchivenote set department = (select department from ethnodoc.department,ethnodoc.locality, ethnodoc.canton where ethnodoc.locality.locality_id = ethnodoc.spokenarchivenote.locality_id and ethnodoc.locality.canton_id=ethnodoc.canton.canton_id and ethnodoc.canton.department_id=ethnodoc.department.department_id);
		update ethnodoc.spokenarchivenote set country = (select country from ethnodoc.country, ethnodoc.department,ethnodoc.locality, ethnodoc.canton where ethnodoc.locality.locality_id = ethnodoc.spokenarchivenote.locality_id and ethnodoc.locality.canton_id=ethnodoc.canton.canton_id and ethnodoc.canton.department_id=ethnodoc.department.department_id and ethnodoc.department.country_id=ethnodoc.country.country_id);
		
		UPDATE `spokenarchivenote` SET `type_document`=replace(type_document,"\'","_");
		
		UPDATE `spokenarchivenote` SET `locality_id`= NULL WHERE `locality_id` = 0;
		UPDATE `spokenarchivenote` SET `holder_id`= NULL WHERE `holder_id` = 0;
		UPDATE `spokenarchivenote` SET `collection_id`= NULL WHERE `collection_id` = 0;
		UPDATE `spokenarchivenote` SET `decenie_id`= NULL WHERE `decenie_id` = 0;
		
		';
//Query
$res = mysqli_query($dbdest,$sql) or die(mysql_error());
//Databases deconnection
mysqli_close();
?>
Status API Training Shop Blog About
© 2016 GitHub, Inc. Terms Privacy Security Contact Help