<?php

namespace EthnoDoc\PublicationBundle\Services\Faceter;

use Elastica\Aggregation\Terms;
use Elastica\Query;

class Faceter {

    private $index;

    public function __construct(\FOS\ElasticaBundle\Elastica\Index $index)
    {
        $this->index = $index;
    }

    /**
     * Returns a filter given the user's selection
     * @param $params
     * @return \Elastica\Filter\Bool
     */
    public function getFilter($params)
    {
        $filter =  new \Elastica\Filter\Bool();
        foreach($params as $key => $value) {
            $filter->addMust(new \Elastica\Filter\Terms($key, array($value)));
        }

        return $filter;
    }

    /**
     * Returns the facet filtered by $filter corresponding to the given field name $facetName
     * @param $facetName
     * @param $filter
     * @return Terms
     */
    public function getFacet($facetName, $filter)
    {
		if ($facetName == "country")
		{	
			$local = new \Elastica\Aggregation\Terms('locality');
			$local->setField("locality");
			
			$cant = new \Elastica\Aggregation\Terms('canton');
			$cant->setField("canton");
			$cant->addAggregation($local);
			
			$dept = new \Elastica\Aggregation\Terms('department');
			$dept->setField("department");
			$dept->addAggregation($cant);
			
			$facet = new \Elastica\Aggregation\Terms($facetName);
			$facet->setField($facetName);
			
			$facet->addAggregation($dept);
		}
		elseif ($facetName == "_type")
		{
			$type_doc = new \Elastica\Aggregation\Terms('type_document');
			$type_doc->setField("type_document");
			
			$facet = new \Elastica\Aggregation\Terms($facetName);
			$facet->setField($facetName);
			
			$facet->addAggregation($type_doc);
		}
		elseif ($facetName == "millennium")
		{
			$date_doc = new \Elastica\Aggregation\Terms('date');
			$date_doc->setField("date");
			
			$decenie = new \Elastica\Aggregation\Terms('decenie');
			$decenie->setField("decenie");
			$decenie->addAggregation($date_doc);
			
			$siecle = new \Elastica\Aggregation\Terms('century');
			$siecle->setField("century");
			$siecle->addAggregation($decenie);
			
			$facet = new \Elastica\Aggregation\Terms($facetName);
			$facet->setField($facetName);
			
			$facet->addAggregation($siecle);
		}
		else
		{
			$coll = new \Elastica\Aggregation\Terms('collection');
			$coll->setField("collection");
			
			$classement = new \Elastica\Aggregation\Terms('classement1');
			$classement->setField("classement1");
			$classement->addAggregation($coll);
			
			$facet = new \Elastica\Aggregation\Terms($facetName);
			$facet->setField($facetName);
			
			$facet->addAggregation($classement);
		}

        return $facet;
    }

    /**
     * Returns the facets collection in array $facetFields given the $filter Bool filter
     * @param array $facetFields
     * @param \Elastica\Filter\Bool $filter
     * @return array
     */
    public function getFacetCollection(array $facetFields, \Elastica\Filter\Bool $filter)
    {
        //New query
        $query = new \Elastica\Query();
		
		$filt  = new \Elastica\Query\Filtered();
		$filt->setFilter($filter);

        //Add facets to query
        foreach($facetFields as $key => $facetField) {
			$query->addAggregation($this->getFacet($facetField, $filter));
        }
		//Add filter on facets
		$query->setQuery($filt);
		
        $search = $this->index->search($query);
		return $search->getAggregations();
    }

    /**
     * Returns the result of user's selection
     * @param $selection
     * @param $page
     * @return \Elastica\ResultSet
     */
    public function getFacetSelection($selection, $page)
    {
        $results = null;
        $query_part = new \Elastica\Query\Bool();
        foreach($selection as $key => $value) {
            $query_part->addMust(
                new \Elastica\Query\Term(array(
                    $key => array('value' => $value),
                ))
            );
        }

        if(!empty($selection)){
            $results = $this->index->search($query_part, array('from' => ($page-1)*10));
        }

        return $results;
    }
} 