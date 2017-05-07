<?php
require_once("./connexion.php");
//================================================================================================================================================================
//Databases connection
//================================================================================================================================================================
$dbsrc = connect("localhost", "root", "", "raddo"); //these attributs will change for the real one when possible
$dbdest = connect("localhost", "root", "", "ethnodoc");
// Edited musical note transfert query
// 19/05/2015, 24 056 insert on 24 056 edited musical note from the raddo database
$sql = 'insert into ethnodoc.recipenote (consultation, cle_reel, holder_id,collection_id,locality_id,title,language,url,
								type,taste,type_document,date,annee,description)
                                            
			SELECT 	raddo.c_consultation.consultation, raddo.document_global.cle_document_global,
					raddo.document_global_conservateur.cle_conservateur,
					raddo.document_global_collection.cle_collection, 	  
					raddo.document_global.cle_localite,
					raddo.document_global.titre,
					raddo.c_langue.langue,
					 concat(concat(concat(concat(concat("http://www.raddo-ethnodoc.com/extrait/", (case 
                        when raddo.document_global.cle_document = 1 THEN "photo" 
						when raddo.document_global.cle_document = 2 THEN "chanson" 
						when raddo.document_global.cle_document = 3 THEN "chanson_texte" 
						when raddo.document_global.cle_document = 4 THEN "temoignage" 
						when raddo.document_global.cle_document = 5 THEN "parler" 
						when raddo.document_global.cle_document = 6 THEN "conte" 
						when raddo.document_global.cle_document = 7 THEN "discographie" 
						when raddo.document_global.cle_document = 8 THEN "manuscrit" end)),"/"), mil),"/"),nom_fichier),
					raddo.c_gout.gout, 
					raddo.c_type_plat.type_plat,
					raddo.c_document.document,
					concat (raddo.document_global.jour,'/',concat(raddo.document_global.mois,'/',raddo.document_global.annee)),
					raddo.document_global.annee,
					raddo.document_recette.description_recette
		 
         FROM ((((((((((raddo.document_global
        
        LEFT JOIN raddo.document_global_conservateur ON raddo.document_global.cle_document_global= raddo.document_global_conservateur.cle_document_global)
        LEFT JOIN raddo.document_global_collection ON raddo.document_global_collection.cle_document_global = raddo.document_global.cle_document_global)
		LEFT JOIN raddo.c_langue ON raddo.document_global.cle_langue  = raddo.c_langue.cle_langue)
		LEFT JOIN raddo.document_photo ON raddo.document_global.cle_document_photo  = raddo.document_photo.cle_document_photo)
        LEFT JOIN raddo.document_son ON raddo.document_global.cle_document_son = raddo.document_son.cle_document_son)
        LEFT JOIN raddo.document_recette ON raddo.document_son.cle_document_recette = raddo.document_recette.cle_document_recette)
        LEFT JOIN raddo.c_gout ON raddo.document_recette.cle_gout = raddo.c_gout.cle_gout)
        LEFT JOIN raddo.c_type_plat ON raddo.document_recette.cle_type_plat = raddo.c_type_plat.cle_type_plat)
		LEFT JOIN raddo.c_document ON raddo.document_global.cle_document = raddo.c_document.cle_document)
		LEFT JOIN raddo.c_consultation ON raddo.c_consultation.cle_consultation = raddo.document_global.cle_consultation)
        WHERE raddo.document_global.cle_document = 9;
		
		UPDATE recipenote set recipenote.decenie_id = (select ethnodoc.decenie.id from ethnodoc.decenie WHERE ethnodoc.recipenote.annee >= ethnodoc.decenie.decenie and ethnodoc.recipenote.annee < (ethnodoc.decenie.decenie + 10));
		
		update ethnodoc.recipenote set collection = (select collection from ethnodoc.collection where ethnodoc.collection.collection_id = ethnodoc.recipenote.collection_id);
		update ethnodoc.recipenote set holder = (select holder from ethnodoc.holder where ethnodoc.holder.holder_id = ethnodoc.recipenote.holder_id);
		update ethnodoc.recipenote set locality = (select locality from ethnodoc.locality where ethnodoc.locality.locality_id = ethnodoc.recipenote.locality_id);
		update ethnodoc.recipenote set canton = (select canton from ethnodoc.locality, ethnodoc.canton where ethnodoc.locality.locality_id = ethnodoc.recipenote.locality_id and ethnodoc.locality.canton_id=ethnodoc.canton.canton_id);
		update ethnodoc.recipenote set department = (select department from ethnodoc.department,ethnodoc.locality, ethnodoc.canton where ethnodoc.locality.locality_id = ethnodoc.recipenote.locality_id and ethnodoc.locality.canton_id=ethnodoc.canton.canton_id and ethnodoc.canton.department_id=ethnodoc.department.department_id);
		update ethnodoc.recipenote set country = (select country from ethnodoc.country, ethnodoc.department,ethnodoc.locality, ethnodoc.canton where ethnodoc.locality.locality_id = ethnodoc.recipenote.locality_id and ethnodoc.locality.canton_id=ethnodoc.canton.canton_id and ethnodoc.canton.department_id=ethnodoc.department.department_id and ethnodoc.department.country_id=ethnodoc.country.country_id);
		
		UPDATE `recipenote` SET `type_document`=replace(type_document,"\'","_");
		
		UPDATE `recipenote` SET `locality_id`= NULL WHERE `locality_id` = 0;
		UPDATE `recipenote` SET `holder_id`= NULL WHERE `holder_id` = 0;
		UPDATE `recipenote` SET `collection_id`= NULL WHERE `collection_id` = 0;
		UPDATE `recipenote` SET `decenie_id`= NULL WHERE `decenie_id` = 0;
		';
//Query
$res = mysqli_query($dbdest,$sql) or die(mysql_error());
//Databases deconnection
mysqli_close();
?>
Status API Training Shop Blog About
© 2016 GitHub, Inc. Terms Privacy Security Contact Help