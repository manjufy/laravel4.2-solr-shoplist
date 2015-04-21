<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\Reminders\RemindableTrait;

class Shop extends Eloquent
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'shop';

    /**
     * @var array
     */
    protected $fillable = array(
        'category',
        'name',
        'address',
        'town',
        'town_latitude',
        'town_longitude',
        'state',
        'tel',
        'fax',
        'cperson',
        'mobile',
        'email',
        'description',
        'urlcom',
        'urladv',
        'rank',
        'latitude',
        'longitude',
        'created_by',
        'updated_by'
    );

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name'        => 'required',
        'category'    => 'required',
        'address'     => 'required',
        'town'        => 'required',
        'state'       => 'required',
        'tel'         => 'required',
        'fax'         => 'required',
        'cperson'     => 'required',
        'mobile'      => 'required',
        'email'       => ['required', 'email'],
        'description' => 'required',
        'rank'        => ['required', 'min:1', 'max:3'],
        'latitude'    => 'required',
        'longitude'   => 'required',
    ];

    /**
     * @param $data
     *
     * @return \Illuminate\Validation\Validator
     */
    public static function validate($data)
    {
        return Validator::make($data, static::$rules);
    }

    /**
     * Get all towns.
     *
     * @param $page
     *
     * @return \Illuminate\Pagination\Paginator
     */
    public static function getAll($page)
    {
        DB::getPaginator()->setCurrentPage($page);
        $shops = DB::table('shop')
            ->paginate(10);

        return $shops;

    }
}
