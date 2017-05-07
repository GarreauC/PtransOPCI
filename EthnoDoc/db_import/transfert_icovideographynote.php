<?php
require_once("./connexion.php");
//================================================================================================================================================================
//Databases connection
//================================================================================================================================================================
$dbsrc = connect("localhost", "root", "", "raddo"); //these attributs will change for the real one when possible
$dbdest = connect("localhost", "root", "", "ethnodoc");
// Edited musical note transfert query
// 19/05/2015, 24 056 insert on 24 056 edited musical note from the raddo database
$sql = 'insert into ethnodoc.IcoVideoGraphynote (consultation, cle_reel,holder_id,collection_id,locality_id,title,`language`,url,
								publisher,survey, resolution, color, decenie_id,`date`,partner,`right`, type_document)
                                            
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
					raddo.c_editeur.editeur, 
					raddo.c_enquete.cle_enquete,
					raddo.document_photo.couleur,
                    raddo.document_photo.resolution,
					raddo.document_global.cle_decenie,
					raddo.document_global.date,
					raddo.c_partenaire.partenaire,
					raddo.document_photo.droit,
					raddo.c_document.document
		 
         FROM ((((((((((raddo.document_global
        
        LEFT JOIN raddo.document_global_conservateur ON raddo.document_global.cle_document_global= raddo.document_global_conservateur.cle_document_global)
        LEFT JOIN raddo.document_global_collection ON raddo.document_global_collection.cle_document_global = raddo.document_global.cle_document_global)
		LEFT JOIN raddo.c_langue ON raddo.document_global.cle_langue  = raddo.c_langue.cle_langue)
		LEFT JOIN raddo.c_enquete ON raddo.document_global.cle_enquete  = raddo.c_enquete.cle_enquete)
		LEFT JOIN raddo.document_photo ON raddo.document_global.cle_document_photo  = raddo.document_photo.cle_document_photo)
		LEFT JOIN raddo.document_photo_partenaire ON raddo.document_photo_partenaire.cle_document_photo = raddo.document_photo.cle_document_photo)
		LEFT JOIN raddo.c_partenaire ON raddo.document_photo_partenaire.cle_partenaire =  raddo.c_partenaire.cle_partenaire)
		LEFT JOIN raddo.c_editeur ON raddo.document_photo.cle_editeur = raddo.c_editeur.cle_editeur)
		LEFT JOIN raddo.c_document on raddo.c_document.cle_document = raddo.document_global.cle_document)
		LEFT JOIN raddo.c_consultation ON raddo.c_consultation.cle_consultation = raddo.document_global.cle_consultation)
        WHERE raddo.document_global.cle_document = 1;
		
		update ethnodoc.IcoVideoGraphynote set collection = (select collection from ethnodoc.collection where ethnodoc.collection.collection_id = ethnodoc.icovideographynote.collection_id);
		update ethnodoc.IcoVideoGraphynote set holder = (select holder from ethnodoc.holder where ethnodoc.holder.holder_id = ethnodoc.icovideographynote.holder_id);
		update ethnodoc.IcoVideoGraphynote set locality = (select locality from ethnodoc.locality where ethnodoc.locality.locality_id = ethnodoc.icovideographynote.locality_id);
		update ethnodoc.IcoVideoGraphynote set canton = (select canton from ethnodoc.locality, ethnodoc.canton where ethnodoc.locality.locality_id = ethnodoc.icovideographynote.locality_id and ethnodoc.locality.canton_id=ethnodoc.canton.canton_id);
		update ethnodoc.IcoVideoGraphynote set department = (select department from ethnodoc.department,ethnodoc.locality, ethnodoc.canton where ethnodoc.locality.locality_id = ethnodoc.icovideographynote.locality_id and ethnodoc.locality.canton_id=ethnodoc.canton.canton_id and ethnodoc.canton.department_id=ethnodoc.department.department_id);
		update ethnodoc.IcoVideoGraphynote set country = (select country from ethnodoc.country, ethnodoc.department,ethnodoc.locality, ethnodoc.canton where ethnodoc.locality.locality_id = ethnodoc.icovideographynote.locality_id and ethnodoc.locality.canton_id=ethnodoc.canton.canton_id and ethnodoc.canton.department_id=ethnodoc.department.department_id and ethnodoc.department.country_id=ethnodoc.country.country_id);
		
		UPDATE `icovideographynote` SET `type_document`=replace(type_document,"\'","_");
		
		UPDATE `icovideographynote` SET `locality_id`= NULL WHERE `locality_id` = 0;
		UPDATE `icovideographynote` SET `holder_id`= NULL WHERE `holder_id` = 0;
		UPDATE `icovideographynote` SET `collection_id`= NULL WHERE `collection_id` = 0;
		UPDATE `icovideographynote` SET `decenie_id`= NULL WHERE `decenie_id` = 0;
		';
		
//Query
$res = mysqli_query($dbdest,$sql) or die(mysql_error());
//Databases deconnection
mysqli_close();
?>
Status API Training Shop Blog About
© 2016 GitHub, Inc. Terms Privacy Security Contact Help