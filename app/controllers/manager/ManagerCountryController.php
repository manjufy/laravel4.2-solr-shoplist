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
 * Class ManagerCountryController
 */
class ManagerCountryController extends ManagerController
{

    public function showIndex()
    {

        // if not logged in redirect to dashboard
        if (!Auth::check()) {
            return Redirect::to('manager');
        }

        $countries = Country::all();

        return View::make('manager.country.index', compact('countries'));
    }

    /**
     * Show Add Country Page
     */
    public function showAdd()
    {
        // if not logged in redirect to dashboard
        if (!Auth::check()) {
            return Redirect::to('manager');
        }

        return View::make('manager.country.add');
    }

    /**
     * Add new country
     */
    public function add()
    {
        // validate the info
        $validator = Country::validate(Input::all());

        // if the validator fails, redirect back to the form
        if ($validator->fails()) {
            return Redirect::to('manager/country/add')
                ->withErrors($validator)
                ->withInput();
        } else {
            // create country
            $country = new Country();
            $country->name = Input::get('name');
            $country->code = Input::get('code');
            $country->created_by = 'manju';
            $country->updated_by = 'manju';
            $country->save();

            return Redirect::to('manager/country');
        }
    }

    /**
     * Show edit country page.
     *
     * @param $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function showEdit($id)
    {
        // if not logged in redirect to dashboard
        if (!Auth::check()) {
            return Redirect::to('manager');
        }

        $country = Country::find($id);

        return View::make('manager.country.edit', compact('country'));
    }

    /**
     * Edit existing country
     */
    public function edit($id)
    {
        // validate the info
        $validator = Country::validate(Input::all());

        // if the validator fails, redirect back to the form
        if ($validator->fails()) {
            return Redirect::to('manager/country')
                ->withErrors($validator)
                ->withInput();
        } else {
            $country = Country::find($id);

            $country->name = Input::get('name');
            $country->code = Input::get('code');
            $country->created_by = 'manju';
            $country->updated_by = 'manju';
            $country->update();

            return Redirect::to('manager/country');
        }

    }

    /**
     * Delete existing country
     */
    public function delete($id)
    {
        $country = Country::find($id);
        $country->delete();

        return Redirect::to('manager/country');
    }
}