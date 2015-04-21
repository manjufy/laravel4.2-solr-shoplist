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
 * Class ManagerStateController
 */
class ManagerStateController extends ManagerController
{

    public function showIndex()
    {
        // if not logged in redirect to dashboard
        if (!Auth::check()) {
            return Redirect::to('manager');
        }
        $state = new State();

        $states = $state->getAll(Input::get('page', 0));
        //$states = State::all();
        //$states->load('country');

        return View::make('manager.state.index', compact('states'));
    }

    /**
     * Show Add State Page
     */
    public function showAdd()
    {
        $country_list = [];
        // if not logged in redirect to dashboard
        if (!Auth::check()) {
            return Redirect::to('manager');
        }

        $countries = Country::all();
        foreach ($countries AS $country) {
            $country_list[$country->id] = $country->name;
        }

        return View::make('manager.state.add', compact('country_list'));
    }

    /**
     * Add new state
     */
    public function add()
    {
        // validate the info
        $validator = State::validate(Input::all());

        // if the validator fails, redirect back to the form
        if ($validator->fails()) {
            return Redirect::to('manager/state/add')
                ->withErrors($validator)
                ->withInput();
        } else {
            // create state
            $state = new State();
            $state->name = Input::get('name');
            $state->country_id = Input::get('country'); //country_id
            $state->created_by = 'manju';
            $state->updated_by = 'manju';
            $state->save();

            return Redirect::to('manager/state');
        }
    }

    /**
     * Show edit state page.
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

        $countries = Country::all();
        foreach ($countries AS $country) {
            $country_list[$country->id] = $country->name;
        }

        $state = State::find($id);

        return View::make('manager.state.edit', compact('state','country_list'));
    }

    /**
     * Edit existing state
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
            $state = State::find($id);

            $state->name = Input::get('name');
            $state->country_id = Input::get('country');
            $state->created_by = 'manju';
            $state->updated_by = 'manju';
            $state->update();

            return Redirect::to('manager/state');
        }

    }

    /**
     * Delete existing state
     */
    public function delete($id)
    {
        $state = State::find($id);
        $state->delete();

        return Redirect::to('manager/state');
    }
}