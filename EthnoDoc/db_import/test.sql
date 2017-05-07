select donneesraddo.document_global.titre,donneesraddo.document_global.date, concat(concat(concat(concat(concat('http://www.raddo-ethnodoc.com/extrait/', (case when donneesraddo.document_global.cle_document = 1 THEN 'photo' when donneesraddo.document_global.cle_document = 2 THEN 'chanson' when donneesraddo.document_global.cle_document = 3 THEN 'chanson_texte' when donneesraddo.document_global.cle_document = 4 THEN 'temoignage' when donneesraddo.document_global.cle_document = 5 THEN 'parler' when donneesraddo.document_global.cle_document = 6 THEN 'conte' when donneesraddo.document_global.cle_document = 7 THEN 'discographie' when donneesraddo.document_global.cle_document = 8 THEN 'manuscrit' end)),'/'), mil),'/'),nom_fichier), 
	donneesraddo.document_global.cle_decenie, donneesraddo.document_global.cle_localite, donneesraddo.c_langue.langue, donneesraddo.document_global_conservateur.cle_conservateur, donneesraddo.document_global_collection.cle_collection, donneesraddo.c_culture.culture, donneesraddo.document_chanson.incipit_couplet, donneesraddo.document_chanson.incipit_refrain, donneesraddo.document_chanson.incipit_langue_couplet, donneesraddo.document_chanson.incipit_langue_refrain, donneesraddo.c_auteur_an.auteur_an, donneesraddo.c_auteur_folk.auteur_folk, donneesraddo.c_editeur_an.editeur_an,  donneesraddo.c_editeur_folk.editeur_folk, donneesraddo.c_titre_off.titre_coirault, donneesraddo.c_titre_off.cote_coirault, donneesraddo.c_titre_off.titre_laforte, donneesraddo.c_titre_off.cote_ethnodoc, donneesraddo.c_edition_discographie.titre_edition_discographie
from (((((((((((donneesraddo.document_global
left join donneesraddo.c_langue on donneesraddo.c_langue.cle_langue = donneesraddo.document_global.cle_langue)
left join donneesraddo.document_global_conservateur on donneesraddo.document_global_conservateur.cle_document_global = donneesraddo.document_global.cle_document_global )
left join donneesraddo.document_global_collection on donneesraddo.document_global_collection.cle_document_global = donneesraddo.document_global.cle_document_global )
left join donneesraddo.c_culture on donneesraddo.c_culture.cle_culture = donneesraddo.document_global.cle_culture)
LEFT JOIN donneesraddo.document_son ON donneesraddo.document_global.cle_document_son = donneesraddo.document_son.cle_document_son)
LEFT JOIN donneesraddo.document_chanson_conte ON donneesraddo.document_son.cle_document_chanson_conte = donneesraddo.document_chanson_conte.cle_document_chanson_conte)
LEFT JOIN donneesraddo.c_typ_fichier ON donneesraddo.document_global.cle_typ_fichier = donneesraddo.c_typ_fichier.cle_typ_fichier)
LEFT JOIN donneesraddo.document_chanson ON donneesraddo.document_chanson_conte.cle_document_chanson = donneesraddo.document_chanson.cle_document_chanson)
LEFT JOIN donneesraddo.document_discographie ON donneesraddo.document_chanson.cle_document_discographie = donneesraddo.document_discographie.cle_document_discographie)
LEFT JOIN donneesraddo.c_edition_discographie ON donneesraddo.document_discographie.cle_edition_discographie = donneesraddo.c_edition_discographie.cle_edition_discographie)
LEFT JOIN ((((((donneesraddo.c_titre_off
LEFT JOIN donneesraddo.c_ouvrage_an ON donneesraddo.c_titre_off.cle_ouvrage_an = donneesraddo.c_ouvrage_an.cle_ouvrage_an)
LEFT JOIN donneesraddo.c_ouvrage_folk ON donneesraddo.c_titre_off.cle_ouvrage_folk = donneesraddo.c_ouvrage_folk.cle_ouvrage_folk)
LEFT JOIN donneesraddo.c_auteur_an ON donneesraddo.c_ouvrage_an.cle_auteur_an = donneesraddo.c_auteur_an.cle_auteur_an)
LEFT JOIN donneesraddo.c_auteur_folk ON donneesraddo.c_ouvrage_folk.cle_auteur_folk = donneesraddo.c_auteur_folk.cle_auteur_folk)
LEFT JOIN donneesraddo.c_editeur_an ON donneesraddo.c_ouvrage_an.cle_editeur_an = donneesraddo.c_editeur_an.cle_editeur_an)
LEFT JOIN donneesraddo.c_editeur_folk ON donneesraddo.c_ouvrage_folk.cle_editeur_folk = donneesraddo.c_editeur_folk.cle_editeur_folk) ON donneesraddo.document_chanson_conte.cle_titre_officiel = donneesraddo.c_titre_off.cle_titre_off)

where donneesraddo.document_global.cle_document = 7;