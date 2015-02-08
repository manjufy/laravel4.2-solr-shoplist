<?php

class StoreController extends BaseController
{

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

        $shops = Solr::getAllByQuery($search_fields);

        $facets = $shops['facets'];
        $results = $shops['result'];
        return View::make('store.all', compact('results', 'facets'));
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

        $shops = Solr::getAllByQuery($search_fields);

        $facets = $shops['facets'];
        $results = $shops['result'];

        return View::make('store.search_results', compact('results', 'facets'));
    }

    /**
     * POST store/search.
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

        $shops = Solr::getAllByQuery($search_fields);

        $facets = $shops['facets'];
        $results = $shops['result'];

        return View::make('store.search_results', compact('results', 'facets'));
    }

    /**
     * Show near by stores.
     *
     * @return \Illuminate\View\View
     */
    public function showNearByMe()
    {
        return View::make('store.nearbyme');
    }
}
