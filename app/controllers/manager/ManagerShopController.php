<?php
/**
 * Hardware Shop
 *
 * @author  Manjunath Reddy<manju16832003@gmail.com>
 * @version 1.0
 * @package Manager/Admin
 *
 */

/**
 * Class ManagerDashboardController
 */
class ManagerShopController extends ManagerController
{

    public function showIndex()
    {

        // if not logged in redirect to dashboard
        if (!Auth::check()) {
            return Redirect::to('manager');
        }

        $shops = Shop::getAll(Input::get('page', 0));
        return View::make('manager.shop.index', compact('shops'));
    }

    /**
     * Show Add Shop Form.
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function showAdd()
    {
        $country_list = [];
        $state_list = [];
        $category_list = [];

        // if not logged in redirect to dashboard
        if (!Auth::check()) {
            return Redirect::to('manager');
        }

        // country list
        $countries = Country::all();
        foreach ($countries AS $country) {
            $country_list[$country->id] = $country->name;
        }

        // state list
        $states = State::all();
        foreach ($states AS $state) {
            $state_list[$state->id] = $state->name;
        }

        // category list
        $categories = Category::all();
        foreach ($categories AS $category) {
            $category_list[$category->id] = $category->name;
        }

        return View::make('manager.shop.add', compact('country_list', 'state_list', 'category_list'));
    }

    /**
     * Add new shop.
     *
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function add()
    {
        $validator = Shop::validate(Input::all());

        if ($validator->fails()) {
            return Redirect::to('manager/shop/add')
                ->withErrors($validator)
                ->withInput();
        } else {
            // create new shop
            $category = Category::find(Input::get('category'));
            $country = Country::find(Input::get('country'));
            $state = State::find(Input::get('state'));
            $town = Town::find(Input::get('town'));

            $shop = new Shop();
            $shop->category = $category->name;
            $shop->name = Input::get('name');
            $shop->address = Input::get('address');
            $shop->town = $town->name;
            $shop->town_latitude = $town->latitude;
            $shop->town_longitude = $town->longitude;
            $shop->state = $state->name;
            $shop->tel = Input::get('tel');
            $shop->fax = Input::get('fax');
            $shop->cperson = Input::get('cperson');
            $shop->mobile = Input::get('mobile');
            $shop->email = Input::get('email');
            $shop->description = Input::get('description');
            $shop->urlcom = Input::get('urlcom');
            $shop->urladv = Input::get('urladv');
            $shop->rank = Input::get('rank');
            $shop->latitude = Input::get('latitude');
            $shop->longitude = Input::get('longitude');

            $shop->created_by = Auth::getName();
            $shop->updated_by = Auth::getName();

            if ($shop->save() === true) {
                // save to solr
                $solr = new Solr();
                $solr->save($shop->id);
            }
            return Redirect::to('manager/shop');
        }
    }

    public function showEdit($id)
    {
        $country_list = [];
        $state_list = [];
        $town_list = [];
        $category_list = [];

        // if not logged in redirect to dashboard
        if (!Auth::check()) {
            return Redirect::to('manager');
        }

        // country list
        $countries = Country::all();
        foreach ($countries AS $country) {
            $country_list[$country->id] = $country->name;
        }

        // state list
        $states = State::all();
        foreach ($states AS $state) {
            $state_list[$state->id] = $state->name;
        }

        // town list
        $towns = Town::all();
        foreach ($towns AS $town) {
            $town_list[$town->id] = $town->name;
        }

        // category list
        $categories = Category::all();
        foreach ($categories AS $category) {
            $category_list[$category->id] = $category->name;
        }

        $shop = Shop::find($id);
        $state = State::getIdByName($shop->state);
        $stateId = $state[0]->id;

        $town = Town::getIdByName($shop->town);
        $townId = $town[0]->id;
        return View::make(
            'manager.shop.edit',
            compact('shop', 'townId', 'stateId', 'country_list', 'state_list', 'town_list', 'category_list')
        );
    }

    public function edit($id)
    {
        $validator = Shop::validate(Input::all());

        if ($validator->fails()) {
            return Redirect::to('manager/shop')
                ->withErrors($validator)
                ->withInput();
        } else {
            $shop = Shop::find($id);

            // create new shop
            $category = Category::find(Input::get('category'));
            $country = Country::find(Input::get('country'));
            $state = State::find(Input::get('state'));
            $town = Town::find(Input::get('town'));

            $shop->category = $category->name;
            $shop->name = Input::get('name');
            $shop->address = Input::get('address');
            $shop->town = $town->name;
            $shop->town_latitude = $town->latitude;
            $shop->town_longitude = $town->longitude;
            $shop->state = $state->name;
            $shop->tel = Input::get('tel');
            $shop->fax = Input::get('fax');
            $shop->cperson = Input::get('cperson');
            $shop->mobile = Input::get('mobile');
            $shop->email = Input::get('email');
            $shop->description = Input::get('description');
            $shop->urlcom = Input::get('urlcom');
            $shop->urladv = Input::get('urladv');
            $shop->rank = Input::get('rank');
            $shop->latitude = Input::get('latitude');
            $shop->longitude = Input::get('longitude');

            $shop->created_by = Auth::getName();
            $shop->updated_by = Auth::getName();

            $shop->update();
            $solr = new Solr();
            $solr->save($id);
            return Redirect::to('manager/shop');
        }
    }

    /**
     * Delete existing Shop
     */
    public function delete($id)
    {
        $shop = Shop::find($id);
        $shop->delete();

        // delete it from solr as well
        $solr = new Solr();
        $solr->delete($id);

        return Redirect::to('manager/shop');
    }
}