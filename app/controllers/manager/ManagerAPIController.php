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
 * Class ManagerAPIController
 */
class ManagerAPIController extends ManagerController
{

    /**
     * GET manager/api/state/{country_id}.
     *
     * @param $country_id
     *
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function state($country_id)
    {
        $states = State::getStatesByCountryId($country_id);

        return $states;
    }

    /**
     * GET manager/api/town/{state_id}
     *
     * @param state_id
     *
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function town($state_id)
    {
        $towns = Town::getTownsByStateId($state_id);

        return $towns;
    }
} 