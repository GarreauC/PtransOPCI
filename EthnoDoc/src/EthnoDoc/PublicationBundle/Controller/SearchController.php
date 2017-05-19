<?php

namespace EthnoDoc\PublicationBundle\Controller;

use EthnoDoc\PublicationBundle\Entity\EditedMusicalNote;
use EthnoDoc\PublicationBundle\Entity\IcoVideoGraphyNote;
use EthnoDoc\PublicationBundle\Entity\KeyWord;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Elastica\Facet\Terms;
use Symfony\Component\HttpFoundation\Response;

class SearchController extends Controller
{
    public function searchAction($page, $id, $type, Request $request)
    {
		//Déclaration des facettes
        $faceter = $this->container->get('ethno_doc_publication.faceter');
		
        $index = $this->get('fos_elastica.index.ethnodoc');
        $selected = $request->query->all();
        foreach($selected as $key => $select) {
            $selected[$key] = str_replace('_', ' ', $selected[$key]);
        }
        $selectedFilter = $selected;
        if(array_key_exists('search', $selectedFilter)) {
            unset($selectedFilter['search']);
        }

        $results = null;
        $notice = null;
        $data = array();

        // Form creation
        $form = $this->get('form.factory')->createNamedBuilder('', 'form', $data, array(
                        'csrf_protection' => false,
                    ))->setMethod('GET')
                    ->add('search', 'text')
                    ->add('Rechercher', 'submit')
                    ->getForm();

        //get facet collection according to user's selection
        $facets = $faceter->getFacetCollection(
            array('_type', 'country', 'millennium', 'classement2', 'classement_pub1'), $faceter->getFilter($selectedFilter));

        //Build Query
        $results = $faceter->getFacetSelection($selectedFilter, $page);

        if(null !== $results && $results->getTotalHits()) {
            $nbResults = $results->getTotalHits();
        } else {
            $nbResults = 314227;
        }

        //Display textual search results
        if($request->getMethod() === 'GET') {
            $form->handleRequest($request);
            if(array_key_exists('search',$form->getData())) {
                $searchPhrase = explode(' ', $form->getData()['search']);
                $results = [];
                foreach($searchPhrase as $key => $word) {
                    $res = $index->search('*'.$word.'*', 1000)->getResults();
                    foreach($res as $resKey => $resValue) {
                        if(!in_array($resValue, $results)) {
                            $results[] = $resValue;
                        }
                    }
                }
                $paginatedResults = [];
                foreach($results as $key => $result) {
                    if($key >= ($page -1)*10 and $key <= 10*$page-1 and $key !== 'totalHits') {
                        $paginatedResults[] = $result ;
                    }
                }
                $paginatedResults['totalHits'] = count($results);
                $nbResults = count($results);
                $results = $paginatedResults;
            }
        }


        $nbPages = ceil($nbResults/10);

        //Display selected note on user's selection
        if( null !== $id && null !== $type) {
            $notice = $faceter->getFacetSelection(array('id' => $id, '_type' => $type), 1)->getResults();
            return $this->render('EthnoDocPublicationBundle:Search:printNote.html.twig', array(
                'selected' => $selected,
                'results' => $results,
                'facets' => $facets,
                'notice' => $notice[0]->getData(),
                'type' => $type,
                'page' => $page,
                'nbPages' => $nbPages,
                'nbResults' => $nbResults,
                'form' => $form->createView()
            ));
        }

        return $this->render('EthnoDocPublicationBundle:Search:search.html.twig', array(
            'selected' => $selected,
            'results' => $results,
            'facets' => $facets,
            'page' => $page,
            'nbPages' => $nbPages,
            'nbResults' => $nbResults,
            'form' => $form->createView()
        ));
    }

    public function autocompleteAction($searchPhrase)
    {
        $index = $this->container->get('fos_elastica.index.ethnodoc');
        if(null !== $searchPhrase) {
            $results = $index->search('*'.$searchPhrase.'*', 5)->getResults();
            $names = [];

            foreach($results as $key => $result) {
                $names[$key]['title'] =  $result->getData()['title'];
                $names[$key]['id'] = $result->getData()['id'];
                $names[$key]['type'] = $result->getType();
                $hit = null;
                foreach($result->getData() as  $data) {
                    if(!is_array($data) and stripos($data, $searchPhrase)!== false) {
                        $hit = $data;
                    } elseif(is_array($data)) {
                        foreach($data as $key => $value) {
                            $hit = (stripos($value, $searchPhrase) !== false) ? $value : null;
                        }
                    }
                }
                $names[$key]['hit'] = $hit;
            }

            return new Response(json_encode($names));
        }
        return null;
    }

}
