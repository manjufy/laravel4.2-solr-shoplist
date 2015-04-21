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
 * Class ManagerController
 */
class ManagerHomeController extends ManagerController
{

    /**
     * Show manager/admin home/login page.
     *
     * @return \Illuminate\View\View
     */
    public function showIndex()
    {
        // if already logged in redirect to dashboard
        if (Auth::check()) {
            return Redirect::to('manager/dashboard');
        }

        return View::make('manager.index');
    }

    /**
     * Process the login.
     *
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function doLogin()
    {
        // validate the info, create rules for the inputs
        // run the validation rules on the inputs from the form
        $validator = User::validate(Input::all());

        // if the validator fails, redirect back to the form
        if ($validator->fails()) {
            return Redirect::to('manager')
                ->withErrors($validator)
                ->withInput(
                    Input::except('password')
                ); // send back the input (not the password) so that we can repopulate the form
        } else {
            // create user data for the authentication
            $userdata = array(
                'username' => Input::get('username'),
                'password' => Input::get('password')
            );

            // attempt to login
            if (Auth::attempt($userdata)) {
                return Redirect::to('manager/dashboard');
            } else {
                // validation not successful, send back to form
                return Redirect::to('manager');
            }
        }
    }

    /**
     * Logout (manager/admin).
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function doLogout()
    {
        Auth::logout();
        return Redirect::to('manager');
    }
}