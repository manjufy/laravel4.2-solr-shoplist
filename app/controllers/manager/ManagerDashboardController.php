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
class ManagerDashboardController extends ManagerController
{

    public function showIndex()
    {

        // if not logged in redirect to dashboard
        if (!Auth::check()) {
            return Redirect::to('manager');
        }

        return View::make('manager.dashboard');
    }
}