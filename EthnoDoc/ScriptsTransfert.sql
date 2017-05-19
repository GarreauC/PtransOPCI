


/*transfert_keyword*/

insert into ethnodoc.keyword (keyword_id, keyword)SELECT cle_mot, francais from raddo.c_mot on duplicate key update keyword_id = keyword_id;
UPDATE ethnodoc.keyword SET keyword=replace(keyword,"\'","_");
insert into keyword(keyword_id, keyword) value (0,"inconnu") on duplicate key update keyword_id = keyword_id;

/*transfert_country*/

insert into ethnodoc.country (country_id, country)SELECT cle_pays, pays from raddo.c_pays on duplicate key update country_id=country_id;
UPDATE `country` SET `country`=replace(country,"\'","_");
insert into country(country_id, country) value (0,"inconnu") on duplicate key update country_id=country_id;

/*transfert_departement*/

insert into ethnodoc.department (department_id, country_id,department) SELECT cle_depart, cle_pays,depart from raddo.c_departement on duplicate key update department_id=department_id;
UPDATE `department` SET `department`=replace(department,"\'","_");
insert into department(department_id, department) value (0,"inconnu") on duplicate key update department_id=department_id;

/*transfert_collection*/

insert into ethnodoc.collection (collection_id, collection, classement1, classement2)SELECT cle_collection,collection,collection,collection from raddo.c_collection on duplicate key update collection_id=collection_id;
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
		
insert into ethnodoc.collection(collection_id, collection) value (0, "inconnu") on duplicate key update collection_id=collection_id;

UPDATE `collection` SET `collection`=replace(collection,"\'","_");

/*transfert_canton*/

insert into ethnodoc.canton (canton_id,canton,department_id)SELECT cle_canton,canton,cle_depart from raddo.c_canton on duplicate key update canton_id = canton_id;
UPDATE `canton` SET `canton`=replace(canton,"\'","_");
insert into canton(canton_id, canton) value (0,"inconnu") on duplicate key update canton_id = canton_id;

/*transfert_locality*/

insert into ethnodoc.locality (locality_id, locality,canton_id)SELECT cle_localite, localite,cle_canton from raddo.c_localite on duplicate key update locality_id = locality_id;
UPDATE `locality` SET `locality`=replace(locality,"\'","_");
insert into locality(locality_id, locality) value (0,"inconnu") on duplicate key update locality_id = locality_id;

/*transfert_holder*/

insert into ethnodoc.holder (holder_id, holder)SELECT cle_conservateur,conservateur from raddo.c_conservateur on duplicate key update holder_id=holder_id;
UPDATE ethnodoc.holder SET holder=replace(holder,"\'","_");
insert into holder(holder_id, holder) value (0,"inconnu") on duplicate key update holder_id=holder_id;

/*transfert_usesCircumstance*/

insert into ethnodoc.usescircumstance (usesCircumstance_id, usesCircumstance)SELECT cle_usage, _usage from raddo.c_usage on duplicate key update usesCircumstance_id=usesCircumstance_id;
UPDATE ethnodoc.usescircumstance SET usesCircumstance=replace(usesCircumstance,"\'","_");
insert 	into usesCircumstance(usesCircumstance_id, usesCircumstance) value (0,"inconnu") on duplicate key update usesCircumstance_id=usesCircumstance_id;

/*transfert_functionuses*/

insert into ethnodoc.functionuse (functionUse_id,functionUse)SELECT cle_fonction,fonction from raddo.c_fonction on duplicate key update functionUse_id=functionUse_id;
UPDATE ethnodoc.functionuse SET functionUse=replace(functionUse,"\'","_");
insert into functionUse(functionUse_id, functionUse) value (0,"inconnu") on duplicate key update functionUse_id=functionUse_id;

/*transfert_witness*/

insert into ethnodoc.witness (witness_id,surname, name)SELECT cle_temoin,nom_temoin,prenom_temoin from raddo.c_temoin on duplicate key update witness_id = witness_id;
UPDATE ethnodoc.witness SET surname=replace(surname,"\'","_"), name=replace(name,"\'","_");
insert into witness(witness_id, surname, name) value (0,"inconnu","inconnu") on duplicate key update witness_id = witness_id;

/*transfert_decenie*/

insert into ethnodoc.decenie (decenie_id, decenie) SELECT cle_decenie, decenie from raddo.c_decenie on duplicate key update decenie_id=decenie_id;
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
		`millennium`= case 
			when `decenie` < 1000 then '0-1000'
			when `decenie` >= 100  and `decenie` < 2000 then '1000-2000'
			when `decenie` >= 2000 then '2000_et_plus'
			
		end;
				
insert into decenie(decenie_id, decenie) value (0,'inconnu') on duplicate key update decenie_id=decenie_id;

	/* transfert_ingredient (id) */

insert into ethnodoc.ingredient (ingredient_id, ingredient)SELECT cle_ingredient,nom_usage_ingredient from raddo.c_ingredient on duplicate key update ingredient_id = ingredient_id;
UPDATE ethnodoc.ingredient SET ingredient=replace(ingredient,"\'","_");
insert into ingredient(ingredient_id, ingredient) value (0,"inconnu") on duplicate key update ingredient_id = ingredient_id;

/*transfert_interpret (id)*/

insert into ethnodoc.interpret (interpret_id, interpret)SELECT cle_artiste,artiste from raddo.c_artiste on duplicate key update interpret_id = interpret_id;
UPDATE ethnodoc.interpret SET interpret=replace(interpret,"\'","_");
insert into interpret(interpret_id, interpret) value (0,"inconnu") on duplicate key update interpret_id = interpret_id;

/*-------------------------------------------------------------------------------------------------------------------------*/
/* ------------------------------------- TABLE DOCUMENTS ------------------------------------------------------------------*/
/*-------------------------------------------------------------------------------------------------------------------------*/



/*-------------------------------------------------------------------------------------------------------------------------*/
/* ------------------------------------- editedmusicalnote ----------------------------------------------------------------*/
/*-------------------------------------------------------------------------------------------------------------------------*/

insert into ethnodoc.editedmusicalnote (consultation, cle_reel, title, date, url, decenie_id, locality_id, language, holder_id, collection_id, culture, leadInCoupletFR, leadInRefrainFR, leadInCoupletVO, leadInRefrainVO, authorAncient, traditionalAuthor, 
		publisherAncient, traditionalPublisher, coiraultTheme, coiraultNumber, laforteNumber, precotationEthnodoc, phonogramTitle, type_document)
                
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
			raddo.c_titre_off.titre_coirault, raddo.c_titre_off.cote_coirault, raddo.c_titre_off.titre_laforte, raddo.c_titre_off.cote_ethnodoc, raddo.c_edition_discographie.titre_edition_discographie, raddo.c_document.document
		
		from (((((((((((((raddo.document_global
			left join raddo.c_langue on raddo.c_langue.cle_langue = raddo.document_global.cle_langue)
			left join raddo.document_global_conservateur on raddo.document_global_conservateur.cle_document_global = raddo.document_global.cle_document_global )
			left join raddo.document_global_collection on raddo.document_global_collection.cle_document_global = raddo.document_global.cle_document_global )
			left join raddo.c_culture on raddo.c_culture.cle_culture = raddo.document_global.cle_culture)
			LEFT JOIN raddo.document_son ON raddo.document_global.cle_document_son = raddo.document_son.cle_document_son)
			LEFT JOIN raddo.document_chanson_conte ON raddo.document_son.cle_document_chanson_conte = raddo.document_chanson_conte.cle_document_chanson_conte)
			LEFT JOIN raddo.c_typ_fichier ON raddo.document_global.cle_typ_fichier = raddo.c_typ_fichier.cle_typ_fichier)
			LEFT JOIN raddo.document_chanson ON raddo.document_chanson_conte.cle_document_chanson = raddo.document_chanson.cle_document_chanson)
			LEFT JOIN raddo.document_discographie ON raddo.document_chanson.cle_document_discographie = raddo.document_discographie.cle_document_discographie)
			LEFT JOIN raddo.c_edition_discographie ON raddo.document_discographie.cle_edition_discographie = raddo.c_edition_discographie.cle_edition_discographie)
			LEFT JOIN raddo.c_document on raddo.c_document.cle_document = raddo.document_global.cle_document)
			LEFT JOIN ((((((raddo.c_titre_off
			LEFT JOIN raddo.c_ouvrage_an ON raddo.c_titre_off.cle_ouvrage_an = raddo.c_ouvrage_an.cle_ouvrage_an)
			LEFT JOIN raddo.c_ouvrage_folk ON raddo.c_titre_off.cle_ouvrage_folk = raddo.c_ouvrage_folk.cle_ouvrage_folk)
			LEFT JOIN raddo.c_auteur_an ON raddo.c_ouvrage_an.cle_auteur_an = raddo.c_auteur_an.cle_auteur_an)
			LEFT JOIN raddo.c_auteur_folk ON raddo.c_ouvrage_folk.cle_auteur_folk = raddo.c_auteur_folk.cle_auteur_folk)
			LEFT JOIN raddo.c_editeur_an ON raddo.c_ouvrage_an.cle_editeur_an = raddo.c_editeur_an.cle_editeur_an)
			LEFT JOIN raddo.c_editeur_folk ON raddo.c_ouvrage_folk.cle_editeur_folk = raddo.c_editeur_folk.cle_editeur_folk) ON raddo.document_chanson_conte.cle_titre_officiel = raddo.c_titre_off.cle_titre_off)
			LEFT JOIN raddo.c_consultation ON raddo.c_consultation.cle_consultation = raddo.document_global.cle_consultation)
		where raddo.document_global.cle_document = 7
		on duplicate key update editedmusicalnote_id = editedmusicalnote_id;
		
		update ethnodoc.editedmusicalnote set collection = (select collection from ethnodoc.collection where ethnodoc.collection.collection_id = ethnodoc.editedmusicalnote.collection_id);
		update ethnodoc.editedmusicalnote set holder = (select holder from ethnodoc.holder where ethnodoc.holder.holder_id = ethnodoc.editedmusicalnote.holder_id);
		update ethnodoc.editedmusicalnote set locality = (select locality from ethnodoc.locality where ethnodoc.locality.locality_id = ethnodoc.editedmusicalnote.locality_id);
		update ethnodoc.editedmusicalnote set canton = (select canton from ethnodoc.locality, ethnodoc.canton where ethnodoc.locality.locality_id = ethnodoc.editedmusicalnote.locality_id and ethnodoc.locality.canton_id=ethnodoc.canton.canton_id);
		update ethnodoc.editedmusicalnote set department = (select department from ethnodoc.department,ethnodoc.locality, ethnodoc.canton where ethnodoc.locality.locality_id = ethnodoc.editedmusicalnote.locality_id and ethnodoc.locality.canton_id=ethnodoc.canton.canton_id and ethnodoc.canton.department_id=ethnodoc.department.department_id);
		update ethnodoc.editedmusicalnote set country = (select country from ethnodoc.country, ethnodoc.department,ethnodoc.locality, ethnodoc.canton where ethnodoc.locality.locality_id = ethnodoc.editedmusicalnote.locality_id and ethnodoc.locality.canton_id=ethnodoc.canton.canton_id and ethnodoc.canton.department_id=ethnodoc.department.department_id and ethnodoc.department.country_id=ethnodoc.country.country_id);
		
		UPDATE `editedmusicalnote` SET `type_document`=replace(type_document,"\'","_");
		
		UPDATE `editedmusicalnote` SET `locality_id`= NULL WHERE `locality_id` = 0;
		UPDATE `editedmusicalnote` SET `holder_id`= NULL WHERE `holder_id` = 0;
		UPDATE `editedmusicalnote` SET `collection_id`= NULL WHERE `collection_id` = 0;
		UPDATE `editedmusicalnote` SET `decenie_id`= NULL WHERE `decenie_id` = 0;






/*-------------------------------------------------------------------------------------------------------------------------*/
/* ------------------------------------- IcoVideoGraphynote ---------------------------------------------------------------*/
/*-------------------------------------------------------------------------------------------------------------------------*/

insert into ethnodoc.IcoVideoGraphynote (consultation, cle_reel,holder_id,collection_id,locality_id,title,`language`,url,publisher,survey, resolution, color, decenie_id,`date`,partner,`right`, type_document)
                                            
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
    WHERE raddo.document_global.cle_document = 1
    on duplicate key update icovideographynote_id = icovideographynote_id;
		
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





/*-------------------------------------------------------------------------------------------------------------------------*/
/* ------------------------------------- noneditedmusicalnote -------------------------------------------------------------*/
/*-------------------------------------------------------------------------------------------------------------------------*/



insert into ethnodoc.noneditedmusicalnote (consultation, cle_reel, title, date, url, decenie_id, locality_id, language, holder_id, collection_id, culture, leadInCoupletFR, leadInRefrainFR, leadInCoupletVO, leadInRefrainVO, authorAncient, traditionalAuthor, 
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
        OR raddo.document_global.cle_document = 3
        on duplicate key update noneditedmusicalnote_id = noneditedmusicalnote_id;
		
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







/*-------------------------------------------------------------------------------------------------------------------------*/
/* ------------------------------------- recipenote -----------------------------------------------------------------------*/
/*-------------------------------------------------------------------------------------------------------------------------*/


insert into ethnodoc.recipenote (consultation, cle_reel, holder_id,collection_id,locality_id,title,language,url,
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
        WHERE raddo.document_global.cle_document = 9
        on duplicate key update recipenote_id = recipenote_id;
		
		UPDATE recipenote set recipenote.decenie_id = (select ethnodoc.decenie.decenie_id from ethnodoc.decenie WHERE ethnodoc.recipenote.annee >= ethnodoc.decenie.decenie and ethnodoc.recipenote.annee < (ethnodoc.decenie.decenie + 10));
		
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


/*-------------------------------------------------------------------------------------------------------------------------*/
/* ------------------------------------- spokenarchivenote ----------------------------------------------------------------*/
/*-------------------------------------------------------------------------------------------------------------------------*/


insert into ethnodoc.spokenarchivenote (consultation, cle_reel, title, date, url, decenie_id, locality_id, language, holder_id, collection_id, type_document, survey)
                
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
        OR raddo.document_global.cle_document = 6
        on duplicate key update spokenarchivenote_id = spokenarchivenote_id;
		
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



/*-------------------------------------------------------------------------------------------------------------------------*/
/* ------------------------------------- handwrittennote ------------------------------------------------------------------*/
/*-------------------------------------------------------------------------------------------------------------------------*/




insert into ethnodoc.handwrittennote (consultation, cle_reel, title, date, url, decenie_id, locality_id, language, holder_id, collection_id, culture, leadInCoupletFR, leadInRefrainFR, leadInCoupletVO, leadInRefrainVO, authorAncient, traditionalAuthor, 
		publisherAncient, traditionalPublisher, coiraultTheme, coiraultNumber, laforteNumber, precotationEthnodoc, type_document)
                
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
			raddo.c_titre_off.titre_coirault, raddo.c_titre_off.cote_coirault, raddo.c_titre_off.titre_laforte, raddo.c_titre_off.cote_ethnodoc, raddo.c_document.document
		
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
		WHERE raddo.document_global.cle_document = 8
		on duplicate key update handwrittennote_id = handwrittennote_id;
		
		update ethnodoc.handwrittennote set collection = (select collection from ethnodoc.collection where ethnodoc.collection.collection_id = ethnodoc.handwrittennote.collection_id);
		update ethnodoc.handwrittennote set holder = (select holder from ethnodoc.holder where ethnodoc.holder.holder_id = ethnodoc.handwrittennote.holder_id);
		update ethnodoc.handwrittennote set locality = (select locality from ethnodoc.locality where ethnodoc.locality.locality_id = ethnodoc.handwrittennote.locality_id);
		update ethnodoc.handwrittennote set canton = (select canton from ethnodoc.locality, ethnodoc.canton where ethnodoc.locality.locality_id = ethnodoc.handwrittennote.locality_id and ethnodoc.locality.canton_id=ethnodoc.canton.canton_id);
		update ethnodoc.handwrittennote set department = (select department from ethnodoc.department,ethnodoc.locality, ethnodoc.canton where ethnodoc.locality.locality_id = ethnodoc.handwrittennote.locality_id and ethnodoc.locality.canton_id=ethnodoc.canton.canton_id and ethnodoc.canton.department_id=ethnodoc.department.department_id);
		update ethnodoc.handwrittennote set country = (select country from ethnodoc.country, ethnodoc.department,ethnodoc.locality, ethnodoc.canton where ethnodoc.locality.locality_id = ethnodoc.handwrittennote.locality_id and ethnodoc.locality.canton_id=ethnodoc.canton.canton_id and ethnodoc.canton.department_id=ethnodoc.department.department_id and ethnodoc.department.country_id=ethnodoc.country.country_id);
		
		UPDATE `handwrittennote` SET `type_document`=replace(type_document,"\'","_");
		
		UPDATE `handwrittennote` SET `locality_id`= NULL WHERE `locality_id` = 0;
		UPDATE `handwrittennote` SET `holder_id`= NULL WHERE `holder_id` = 0;
		UPDATE `handwrittennote` SET `collection_id`= NULL WHERE `collection_id` = 0;
		UPDATE `handwrittennote` SET `decenie_id`= NULL WHERE `decenie_id` = 0;






/*-------------------------------------------------------------------------------------------------------------------------*/
/* ------------------------------------- KEYWORD --------------------------------------------------------------------------*/
/*-------------------------------------------------------------------------------------------------------------------------*/



/*editedNote_keyword*/

insert into ethnodoc.editedmusicalnote_keyword (editedmusicalnote_id, keyword_id)
                
        select ethnodoc.editedmusicalnote.editedmusicalnote_id, raddo.document_global_mot_cle.cle_mot
		
		from ((raddo.document_global
			left join raddo.document_global_mot_cle on raddo.document_global_mot_cle.cle_document_global = raddo.document_global.cle_document_global)
			left join ethnodoc.editedmusicalnote on raddo.document_global.cle_document_global = ethnodoc.editedmusicalnote.cle_reel)

		where raddo.document_global.cle_document = 7
		on duplicate key update ethnodoc.editedmusicalnote_keyword.editedmusicalnote_id = ethnodoc.editedmusicalnote_keyword.editedmusicalnote_id, keyword_id = keyword_id;


/* handnote_keyword */

insert into ethnodoc.handwrittennote_keyword (handwrittennote_id, keyword_id)
                
        select ethnodoc.handwrittennote.handwrittennote_id, raddo.document_global_mot_cle.cle_mot
		
		from ((raddo.document_global
			left join raddo.document_global_mot_cle on raddo.document_global_mot_cle.cle_document_global = raddo.document_global.cle_document_global)
			left join ethnodoc.handwrittennote on raddo.document_global.cle_document_global = ethnodoc.handwrittennote.cle_reel)

		where raddo.document_global.cle_document = 8 
		on duplicate key update ethnodoc.handwrittennote_keyword.handwrittennote_id = ethnodoc.handwrittennote_keyword.handwrittennote_id, keyword_id = keyword_id;

/* recipe_keyword */

insert into ethnodoc.recipenote_keyword (recipenote_id, keyword_id)
                
        select ethnodoc.recipenote.recipenote_id, raddo.document_global_mot_cle.cle_mot
		
		from ((raddo.document_global
			left join raddo.document_global_mot_cle on raddo.document_global_mot_cle.cle_document_global = raddo.document_global.cle_document_global)
			left join ethnodoc.recipenote on raddo.document_global.cle_document_global = ethnodoc.recipenote.cle_reel)

		WHERE raddo.document_global.cle_document = 9
		on duplicate key update ethnodoc.recipenote_keyword.recipenote_id = ethnodoc.recipenote_keyword.recipenote_id, keyword_id = keyword_id;

/*noneeditednote_keyword*/

insert into ethnodoc.noneditedmusicalnote_keyword (noneditedmusicalnote_id, keyword_id)
                
        select ethnodoc.noneditedmusicalnote.noneditedmusicalnote_id, raddo.document_global_mot_cle.cle_mot
		
		from ((raddo.document_global
			left join raddo.document_global_mot_cle on raddo.document_global_mot_cle.cle_document_global = raddo.document_global.cle_document_global)
			left join ethnodoc.noneditedmusicalnote on raddo.document_global.cle_document_global = ethnodoc.noneditedmusicalnote.cle_reel)

		WHERE raddo.document_global.cle_document = 2
        OR raddo.document_global.cle_document = 3
        on duplicate key update ethnodoc.noneditedmusicalnote_keyword.noneditedmusicalnote_id = ethnodoc.noneditedmusicalnote_keyword.noneditedmusicalnote_id, keyword_id = keyword_id;

/*icono_keyword  --!! Très long > 10h!!--*/

insert into ethnodoc.icovideographynote_keyword (icovideographynote_id, keyword_id)
                
        select ethnodoc.icovideographynote.icovideographynote_id, raddo.document_global_mot_cle.cle_mot
		
		from ((raddo.document_global
			left join raddo.document_global_mot_cle on raddo.document_global_mot_cle.cle_document_global = raddo.document_global.cle_document_global)
			left join ethnodoc.icovideographynote on raddo.document_global.cle_document_global = ethnodoc.icovideographynote.cle_reel)

		WHERE raddo.document_global.cle_document = 1
		on duplicate key update ethnodoc.icovideographynote_keyword.icovideographynote_id = ethnodoc.icovideographynote_keyword.icovideographynote_id, keyword_id = keyword_id;



/*publisher*/


insert into ethnodoc.publisher (publisher, classement_pub1, classement_pub2, classement_pub3) 
	SELECT  distinct traditionalPublisher, traditionalPublisher,traditionalPublisher,traditionalPublisher 
	FROM ethnodoc.noneditedmusicalnote on duplicate key update ethnodoc.publisher.publisher_id = ethnodoc.publisher.publisher_id;

	insert into ethnodoc.publisher (publisher, classement_pub1, classement_pub2, classement_pub3) 
	SELECT distinct publisherAncient, publisherAncient,publisherAncient,publisherAncient
	FROM ethnodoc.noneditedmusicalnote WHERE NOT EXISTS( SELECT publisher FROM ethnodoc.publisher, ethnodoc.noneditedmusicalnote WHERE  ethnodoc.publisher.publisher = ethnodoc.noneditedmusicalnote.publisherAncient)
	on duplicate key update ethnodoc.publisher.publisher_id = ethnodoc.publisher.publisher_id;;


insert into ethnodoc.publisher (publisher, classement_pub1, classement_pub2, classement_pub3) 
	SELECT distinct traditionalPublisher, traditionalPublisher,traditionalPublisher,traditionalPublisher
	FROM ethnodoc.editedmusicalnote WHERE NOT EXISTS( SELECT publisher FROM ethnodoc.publisher, ethnodoc.editedmusicalnote WHERE  ethnodoc.publisher.publisher = ethnodoc.editedmusicalnote.traditionalPublisher)
	on duplicate key update ethnodoc.publisher.publisher_id = ethnodoc.publisher.publisher_id;;


insert into ethnodoc.publisher (publisher, classement_pub1, classement_pub2, classement_pub3) 
	SELECT distinct publisherAncient, publisherAncient,publisherAncient,publisherAncient
	FROM ethnodoc.editedmusicalnote WHERE NOT EXISTS( SELECT publisher FROM ethnodoc.publisher, ethnodoc.editedmusicalnote WHERE  ethnodoc.publisher.publisher = ethnodoc.editedmusicalnote.publisherAncient)
	on duplicate key update ethnodoc.publisher.publisher_id = ethnodoc.publisher.publisher_id;;

insert into ethnodoc.publisher (publisher, classement_pub1, classement_pub2, classement_pub3) 
	SELECT distinct publisher, publisher,publisher,publisher
	FROM ethnodoc.icovideographynote WHERE NOT EXISTS( SELECT ethnodoc.publisher.publisher FROM ethnodoc.publisher, ethnodoc.icovideographynote WHERE  ethnodoc.publisher.publisher = ethnodoc.icovideographynote.publisher)
	on duplicate key update ethnodoc.publisher.publisher_id = ethnodoc.publisher.publisher_id;;

update ethnodoc.publisher SET publisher = 'inconnu' WHERE publisher_id = 1;

update ethnodoc.editedmusicalnote em, ethnodoc.publisher pub set em.publisher = em.traditionalPublisher and em.publisher_id = pub.publisher_id WHERE em.traditionalPublisher = pub.editeur;

update ethnodoc.handwrittennote em, ethnodoc.publisher pub set em.publisher = em.traditionalPublisher and em.publisher_id = pub.publisher_id WHERE em.traditionalPublisher = pub.editeur;

update ethnodoc.icovideographynote em, ethnodoc.publisher pub set em.publisher = em.publisher and em.publisher_id = pub.publisher_id WHERE em.publisher = pub.editeur;

update ethnodoc.noneditedmusicalnote em, ethnodoc.publisher pub set em.publisher = em.traditionalPublisher and em.publisher_id = pub.publisher_id WHERE em.traditionalPublisher = pub.editeur;

update ethnodoc.editedmusicalnote set publisher = "inconnu" AND publisher_id = "1" WHERE publisher is null;

update ethnodoc.handwrittennote set publisher = "inconnu" AND publisher_id = "1" WHERE publisher is null;

update ethnodoc.icovideographynote set publisher = "inconnu" AND publisher_id = "1" WHERE publisher is null;

update ethnodoc.noneditedmusicalnote set publisher = "inconnu" AND publisher_id = "1" WHERE publisher is null;	



update publisher
	SET `classement_pub1` = case
		when lower(`publisher`) like "a%" or lower(`publisher`) like "b%" or lower(`publisher`) like "c%" or lower(`publisher`) like "d%" or lower(`publisher`) like "e%" or lower(`publisher`) like "f%" then "A-F"
		when lower(`publisher`) like "g%" or lower(`publisher`) like "h%" or lower(`publisher`) like "i%" or lower(`publisher`) like "j%" or lower(`publisher`) like "k%" or lower(`publisher`) like "l%" then "G-L"
		when lower(`publisher`) like "m%" or lower(`publisher`) like "n%" or lower(`publisher`) like "o%" or lower(`publisher`) like "p%" or lower(`publisher`) like "q%" or lower(`publisher`) like "r%" or lower(`publisher`) like "s%" then "M-S"
		when lower(`publisher`) like "t%" or lower(`publisher`) like "u%" or lower(`publisher`) like "v%" or lower(`publisher`) like "w%" or lower(`publisher`) like "x%" or lower(`publisher`) like "y%" or lower(`publisher`) like "z%" then "T-Z"
		end,
	`classement_pub2` = case
		when lower(`publisher`) like "a%" or lower(`publisher`) like "b%" or lower(`publisher`) like "c%" then "A-C"
		when lower(`publisher`) like "d%" or lower(`publisher`) like "e%" or lower(`publisher`) like "f%" then "D-F"
		when lower(`publisher`) like "g%" or lower(`publisher`) like "h%" or lower(`publisher`) like "i%" then "G-I"
		when lower(`publisher`) like "j%" or lower(`publisher`) like "k%" or lower(`publisher`) like "l%" then "J-L"
		when lower(`publisher`) like "m%" or lower(`publisher`) like "n%" or lower(`publisher`) like "o%" then "M-O"
		when lower(`publisher`) like "p%" or lower(`publisher`) like "q%" or lower(`publisher`) like "r%" or lower(`publisher`) like "%s" then "P-S"
		when lower(`publisher`) like "t%" or lower(`publisher`) like "u%" or lower(`publisher`) like "v%" then "T-V"
		when lower(`publisher`) like "w%" or lower(`publisher`) like "x%" or lower(`publisher`) like "y%" or lower(`publisher`) like "%z" then "W-Z"
		end,
	`classement_pub3`=case
		when lower(`publisher`) like "a%" then 'A'
		when lower(`publisher`) like "b%" then 'B'
		when lower(`publisher`) like "c%" then 'C'
		when lower(`publisher`) like "d%" then 'D'
		when lower(`publisher`) like "e%" then 'E'
		when lower(`publisher`) like "f%" then 'F'
		when lower(`publisher`) like "g%" then 'G'
		when lower(`publisher`) like "h%" then 'H'
		when lower(`publisher`) like "i%" then 'I'
		when lower(`publisher`) like "j%" then 'J'
		when lower(`publisher`) like "k%" then 'K'
		when lower(`publisher`) like "l%" then 'L'
		when lower(`publisher`) like "m%" then 'M'
		when lower(`publisher`) like "n%" then 'N'
		when lower(`publisher`) like "o%" then 'O'
		when lower(`publisher`) like "p%" then 'P'
		when lower(`publisher`) like "q%" then 'Q'
		when lower(`publisher`) like "r%" then 'R'
		when lower(`publisher`) like "s%" then 'S'
		when lower(`publisher`) like "t%" then 'T'
		when lower(`publisher`) like "u%" then 'U'
		when lower(`publisher`) like "v%" then 'V'
		when lower(`publisher`) like "w%" then 'W'
		when lower(`publisher`) like "x%" then 'X'
		when lower(`publisher`) like "y%" then 'Y'
		when lower(`publisher`) like "z%" then 'Z'
		END;


