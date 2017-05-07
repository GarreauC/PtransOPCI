<?php
require_once("./connexion.php");
//================================================================================================================================================================
//Databases connection
//================================================================================================================================================================
$dbsrc = connect("localhost", "root", "", "raddo"); //these attributs will change for the real one when possible
$dbdest = connect("localhost", "root", "", "ethnodoc");
// Edited musical note transfert query
// 19/05/2015, 24 056 insert on 24 056 edited musical note from the raddo database
$sql = 'insert into ethnodoc.noneditedmusicalnote (consultation, cle_reel, title, date, url, decenie_id, locality_id, language, holder_id, collection_id, culture, leadInCoupletFR, leadInRefrainFR, leadInCoupletVO, leadInRefrainVO, authorAncient, traditionalAuthor, 
		publisherAncient, traditionalPublisher, coiraultTheme, coiraultNumber, laforteNumber, precotationEthnodoc, type_document, survey)
                
        select raddo.c_consultation.consultation, raddo.document_global.cle_document_global, raddo.document_global.titre,raddo.document_global.date, concat(concat(concat(concat(concat("http://www.raddo-ethnodoc.com/extrait/", (case 
                        when raddo.document_global.cle_document = 1 THEN "photo" 
						when raddo.document_global.cle_document = 2 THEN "chanson" 
						when raddo.document_global.cle_document = 3 THEN "chanson_texte" 
						when raddo.document_global.cle_document = 4 THEN "temoignage" 
						when raddo.document_global.cle_document = 5 THEN "parler" 
						when raddo.document_global.cle_document = 6 THEN "conte" 
						when raddo.document_global.cle_document = 7 THEN "discographie" 
						when raddo.document_global.cle_document = 8 THEN "manuscrit" end)),"/"), mil),"/"),nom_fichier), raddo.document_global.cle_decenie, raddo.document_global.cle_localite, raddo.c_langue.langue, 
			raddo.document_global_conservateur.cle_conservateur, raddo.document_global_collection.cle_collection, raddo.c_culture.culture, raddo.document_chanson.incipit_couplet, raddo.document_chanson.incipit_refrain, 
			raddo.document_chanson.incipit_langue_couplet, raddo.document_chanson.incipit_langue_refrain, raddo.c_auteur_an.auteur_an, raddo.c_auteur_folk.auteur_folk, raddo.c_editeur_an.editeur_an,  raddo.c_editeur_folk.editeur_folk, 
			raddo.c_titre_off.titre_coirault, raddo.c_titre_off.cote_coirault, raddo.c_titre_off.titre_laforte, raddo.c_titre_off.cote_ethnodoc, raddo.c_document.document, raddo.document_global.cle_enquete
		
		from ((((((((((((raddo.document_global
			left join raddo.c_langue on raddo.c_langue.cle_langue = raddo.document_global.cle_langue)
			left join raddo.document_global_conservateur on raddo.document_global_conservateur.cle_document_global = raddo.document_global.cle_document_global )
			left join raddo.document_global_collection on raddo.document_global_collection.cle_document_global = raddo.document_global.cle_document_global )
			left join raddo.c_culture on raddo.c_culture.cle_culture = raddo.document_global.cle_culture)
			LEFT JOIN raddo.document_son ON raddo.document_global.cle_document_son = raddo.document_son.cle_document_son)
			LEFT JOIN raddo.document_chanson_conte ON raddo.document_son.cle_document_chanson_conte = raddo.document_chanson_conte.cle_document_chanson_conte)
			LEFT JOIN raddo.c_typ_fichier ON raddo.document_global.cle_typ_fichier = raddo.c_typ_fichier.cle_typ_fichier)
			LEFT JOIN raddo.document_chanson ON raddo.document_chanson_conte.cle_document_chanson = raddo.document_chanson.cle_document_chanson)
			LEFT JOIN raddo.document_discographie ON raddo.document_chanson.cle_document_discographie = raddo.document_discographie.cle_document_discographie)
			LEFT JOIN raddo.c_document on raddo.c_document.cle_document = raddo.document_global.cle_document)
			LEFT JOIN ((((((raddo.c_titre_off
			LEFT JOIN raddo.c_ouvrage_an ON raddo.c_titre_off.cle_ouvrage_an = raddo.c_ouvrage_an.cle_ouvrage_an)
			LEFT JOIN raddo.c_ouvrage_folk ON raddo.c_titre_off.cle_ouvrage_folk = raddo.c_ouvrage_folk.cle_ouvrage_folk)
			LEFT JOIN raddo.c_auteur_an ON raddo.c_ouvrage_an.cle_auteur_an = raddo.c_auteur_an.cle_auteur_an)
			LEFT JOIN raddo.c_auteur_folk ON raddo.c_ouvrage_folk.cle_auteur_folk = raddo.c_auteur_folk.cle_auteur_folk)
			LEFT JOIN raddo.c_editeur_an ON raddo.c_ouvrage_an.cle_editeur_an = raddo.c_editeur_an.cle_editeur_an)
			LEFT JOIN raddo.c_editeur_folk ON raddo.c_ouvrage_folk.cle_editeur_folk = raddo.c_editeur_folk.cle_editeur_folk) ON raddo.document_chanson_conte.cle_titre_officiel = raddo.c_titre_off.cle_titre_off)
			LEFT JOIN raddo.c_consultation ON raddo.c_consultation.cle_consultation = raddo.document_global.cle_consultation)
		WHERE raddo.document_global.cle_document = 2
        OR raddo.document_global.cle_document = 3;
		
		update ethnodoc.noneditedmusicalnote set collection = (select collection from ethnodoc.collection where ethnodoc.collection.collection_id = ethnodoc.noneditedmusicalnote.collection_id);
		update ethnodoc.noneditedmusicalnote set holder = (select holder from ethnodoc.holder where ethnodoc.holder.holder_id = ethnodoc.noneditedmusicalnote.holder_id);
		update ethnodoc.noneditedmusicalnote set locality = (select locality from ethnodoc.locality where ethnodoc.locality.locality_id = ethnodoc.noneditedmusicalnote.locality_id);
		update ethnodoc.noneditedmusicalnote set canton = (select canton from ethnodoc.locality, ethnodoc.canton where ethnodoc.locality.locality_id = ethnodoc.noneditedmusicalnote.locality_id and ethnodoc.locality.canton_id=ethnodoc.canton.canton_id);
		update ethnodoc.noneditedmusicalnote set department = (select department from ethnodoc.department,ethnodoc.locality, ethnodoc.canton where ethnodoc.locality.locality_id = ethnodoc.noneditedmusicalnote.locality_id and ethnodoc.locality.canton_id=ethnodoc.canton.canton_id and ethnodoc.canton.department_id=ethnodoc.department.department_id);
		update ethnodoc.noneditedmusicalnote set country = (select country from ethnodoc.country, ethnodoc.department,ethnodoc.locality, ethnodoc.canton where ethnodoc.locality.locality_id = ethnodoc.noneditedmusicalnote.locality_id and ethnodoc.locality.canton_id=ethnodoc.canton.canton_id and ethnodoc.canton.department_id=ethnodoc.department.department_id and ethnodoc.department.country_id=ethnodoc.country.country_id);
		
		
		UPDATE `noneditedmusicalnote` SET `type_document`=replace(type_document,"\'","_");
		
		UPDATE `noneditedmusicalnote` SET `locality_id`= NULL WHERE `locality_id` = 0;
		UPDATE `noneditedmusicalnote` SET `holder_id`= NULL WHERE `holder_id` = 0;
		UPDATE `noneditedmusicalnote` SET `collection_id`= NULL WHERE `collection_id` = 0;
		UPDATE `noneditedmusicalnote` SET `decenie_id`= NULL WHERE `decenie_id` = 0;
		';
//Query
$res = mysqli_query($dbdest,$sql) or die(mysql_error());
//Databases deconnection
mysqli_close();
?>
Status API Training Shop Blog About
© 2016 GitHub, Inc. Terms Privacy Security Contact Help