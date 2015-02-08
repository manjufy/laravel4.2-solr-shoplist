<?php

/**
 * Solr Connection Class
 */
class Solr
{

    protected $client;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->client = new \Solarium\Client(Config::get('solr'));
    }

    /**
     * Get all stores from Solr.
     * @return array
     */
    function getAll()
    {
        $stores = [];
        $result = [];
        $facets = [];

        $facetQuery = "&facet=true&facet.field=category&facet.field=state&facet.field=town&json.nl=map";
        $query = 'q=*:*&wt=json&indent=true' . $facetQuery . '&rows=100';

        $url = self::getSolrUrl() . $query;

        $client = new \Guzzle\Service\Client($url);
        $request = $client->get();
        $response = $request->send();
        $resultSet = $response->json();

        foreach ($resultSet['response']['docs'] as $solrDocument) {
            $stores[] = $solrDocument;
        }

        foreach ($resultSet['facet_counts']['facet_fields'] as $facetname => $facetValues) {
            $facetList = [];
            foreach ($facetValues as $facetKey => $facetCount) {
                $facetList[$facetKey] = $facetCount;
            }

            $facets[$facetname] = $facetList;
        }

        $result['result'] = $stores;
        $result['facets'] = $facets;

        return $result;
    }

    /**
     * Get stores by query filter.
     * @param $fields
     *
     * @return array
     */
    public static function getAllByQuery($fields)
    {
        $stores = [];
        $result = [];
        $facets = [];
        $fq = null;

        if (!empty($fields['category'])) {
            $fq = '&fq=category:"' . $fields['category'] . '"';
        }

        if (!empty($fields['state'])) {
            $fq .= '&fq=state:"' . $fields['state'] . '"';
        }

        if (!empty($fields['town'])) {
            $fq .= '&fq=town:"' . $fields['town'] . '"';
        }

        if (!empty($fields['shop'])) {
            $fq .= '&fq=name:"' . $fields['shop'] . '"';
        }

        if (!empty($fields['keyword'])) {
            $fq .= '&fq=keyword:"' . $fields['keyword'] . '"';
        }


        $facetQuery = "&facet=true&facet.field=category&facet.field=state&facet.field=town&json.nl=map&facet.mincount=1";
        $query = 'q=*:*&wt=json&indent=true' . $facetQuery . $fq . '&rows=100';

        $url = self::getSolrUrl() . $query;

        $client = new \Guzzle\Service\Client($url);
        $request = $client->get();
        $response = $request->send();
        $resultSet = $response->json();

        foreach ($resultSet['response']['docs'] as $solrDocument) {
            $stores[] = $solrDocument;
        }

        foreach ($resultSet['facet_counts']['facet_fields'] as $facetname => $facetValues) {
            $facetList = [];
            foreach ($facetValues as $facetKey => $facetCount) {
                $facetList[$facetKey] = $facetCount;
            }

            $facets[$facetname] = $facetList;
        }

        $result['result'] = $stores;
        $result['facets'] = $facets;

        return $result;
    }

    /**
     * Get Solr URL.
     *
     * @return string
     */
    private static function getSolrUrl()
    {
        $uri = Config::get('solr')['host'] . ':' . Config::get('solr')['port'] . Config::get(
                'solr'
            )['path'] . Config::get('solr')['core'];
        $url = 'http://' . $uri . '/select?';

        return $url;
    }
} 