<?php

class StoreController extends BaseController
{

    private $_numberOfLinks = 10;
    private $_pageLimit = 3;

    /*
    |--------------------------------------------------------------------------
    | Default Store Controller
    |--------------------------------------------------------------------------
    |
    | You may wish to use controllers instead of, or in addition to, Closure
    | based routes. That's great! Here is an example controller method to
    | get you started. To route to this controller, just add the route:
    |
    |	Route::get('/', 'StoreController@showIndex');
    |
    */

    public function showIndex()
    {
        $search_fields = [
            'category' => Input::get('category'),
            'state'    => Input::get('state'),
            'town'     => Input::get('town'),
            'shop'     => Input::get('shop'),
            'keyword'  => Input::get('keyword')
        ];
        $solr = new Solr();
        $shops = $solr->getAllByQuery($search_fields, Input::get('page', 0), Input::get('limit', $this->_pageLimit));
        $pagination = $solr->createLinks($this->_numberOfLinks, 'pagination pagination-sm');
        $facets = $shops['facets'];
        $results = $shops['result'];
        return View::make('store.all', compact('results', 'facets', 'pagination'));
    }

    /**
     * Search filter.
     *
     * @return \Illuminate\View\View
     */
    public function search()
    {
        $search_fields = [
            'category' => Input::get('category'),
            'state'    => Input::get('state'),
            'town'     => Input::get('town'),
            'shop'     => Input::get('shop'),
            'keyword'  => Input::get('keyword')
        ];

        $solr = new Solr();
        $shops = $solr->getAllByQuery($search_fields, Input::get('page', 0), Input::get('limit', $this->_pageLimit));
        $pagination = $solr->createLinks($this->_numberOfLinks, 'pagination pagination-sm');

        $facets = $shops['facets'];
        $results = $shops['result'];

        return View::make('store.search_results', compact('results', 'facets', 'pagination'));
    }

    /**
     * POST store/search.
     *
     * @return \Illuminate\View\View
     */
    public function doSearch()
    {
        $search_fields = [
            'category' => Input::get('category'),
            'state'    => Input::get('state'),
            'town'     => Input::get('town'),
            'shop'     => Input::get('shop'),
            'keyword'  => Input::get('keyword')
        ];

        $solr = new Solr();
        $shops = $solr->getAllByQuery($search_fields, Input::get('page', 0), Input::get('limit', $this->_pageLimit));
        $pagination = $solr->createLinks($this->_numberOfLinks, 'pagination pagination-sm');
        $facets = $shops['facets'];
        $results = $shops['result'];

        return View::make('store.search_results', compact('results', 'facets', 'pagination'));
    }

    /**
     * Show near by stores.
     *
     * @return \Illuminate\View\View
     */
    public function showNearByMe()
    {
        $lat = Input::get('lat');
        $long = Input::get('long');
        $distance = Input::get('d', 50);
        // instantiate solr
        $solr = new Solr();

        if (!empty($lat) && !empty($long)) {
            $shops = $solr->getAllByGeo(
                $lat,
                $long,
                $distance,
                Input::get('page', 0),
                Input::get('limit', $this->_pageLimit)
            );
        } else {
            $shops = $solr->getAll(Input::get('page', 0), Input::get('limit', $this->_pageLimit));
        }

        $pagination = $solr->createLinks($this->_numberOfLinks, 'pagination pagination-sm');
        $facets = $shops['facets'];
        $results = $shops['result'];
        return View::make('store.nearbyme', compact('facets', 'results', 'pagination'));
    }

    /**
     * Detail page.
     * @param $id
     *
     * @return \Illuminate\View\View
     */
    public function view($id)
    {
        $shop = Shop::find($id);

        return View::make('store.view', compact('shop'));
    }
}
