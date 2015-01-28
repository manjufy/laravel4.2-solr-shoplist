<?php
/**
 * Hardware Shop
 *
 * @author Manjunath Reddy<manju16832003@gmail.com>
 * @version 1.0
 * @package Manager/Admin
 *
 */

/**
 * Class ManagerController
 */
class ManagerHomeController extends ManagerController{

    public function showIndex() {
        return View::make('manager.index');
    }
}