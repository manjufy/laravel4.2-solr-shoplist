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
 * Class ManagerTownController
 */
class ManagerTownController extends ManagerController
{

    public function showIndex()
    {
        // if not logged in redirect to dashboard
        if (!Auth::check()) {
            return Redirect::to('manager');
        }
        $town = new Town();

        $towns = $town->getAll(Input::get('page', 0));

        return View::make('manager.town.index', compact('towns'));
    }

    /**
     * Show Add Town Page
     */
    public function showAdd()
    {
        $country_list = [];
        $state_list = [];

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

        return View::make('manager.town.add', compact('country_list', 'state_list'));
    }

    /**
     * Add new Town
     */
    public function add()
    {
        // validate the info
        $validator = State::validate(Input::all());

        // if the validator fails, redirect back to the form
        if ($validator->fails()) {
            return Redirect::to('manager/town/add')
                ->withErrors($validator)
                ->withInput(['state']);
        } else {
            // create town
            $town = new Town();
            $town->state_id = Input::get('state');
            $town->name = Input::get('name');
            $town->latitude = Input::get('latitude');
            $town->longitude = Input::get('longitude');

            $town->created_by = 'manju';
            $town->updated_by = 'manju';
            $town->save();

            return Redirect::to('manager/town');
        }
    }

    /**
     * Show edit town page.
     *
     * @param $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function showEdit($id)
    {
        $country_list = [];
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

        $town = Town::find($id);
        return View::make('manager.town.edit', compact('town', 'country_list', 'state_list'));
    }

    /**
     * Edit existing town
     */
    public function edit($id)
    {
        // validate the info
        $validator = State::validate(Input::all());

        // if the validator fails, redirect back to the form
        if ($validator->fails()) {
            return Redirect::to('manager/state')
                ->withErrors($validator)
                ->withInput();
        } else {
            $town = Town::find($id);

            $town->state_id = Input::get('state');
            $town->name = Input::get('name');
            $town->latitude = Input::get('latitude');
            $town->longitude = Input::get('longitude');

            $town->created_by = 'manju';
            $town->updated_by = 'manju';
            $town->update();

            return Redirect::to('manager/town');
        }

    }

    /**
     * Delete existing town
     */
    public function delete($id)
    {
        $town = Town::find($id);
        $town->delete();

        return Redirect::to('manager/town');
    }
}