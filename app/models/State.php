<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\Reminders\RemindableTrait;

class State extends Eloquent
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'state';

    /**
     * @var array
     */
    protected $fillable = array('country_id', 'name', 'created_by', 'updated_by');

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
    ];


    /**
     * Defining relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function country()
    {
        return $this->belongsTo('Country', 'country_id');
    }

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
     * @param $page
     *
     * @return \Illuminate\Pagination\Paginator
     */
    public static function getAll($page)
    {
        DB::getPaginator()->setCurrentPage($page);
        $states = DB::table('state')
            ->join('country', 'state.country_id', '=', 'country.id')
            ->select('state.id', 'state.name', 'country.name as country', 'country.code')
            ->paginate(10);

        return $states;

    }

    /**
     * Get states by countryId.
     *
     * @param $countryId
     *
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public static function getStatesByCountryId($countryId)
    {

        return self::where('country_id', '=', $countryId)->get(['id', 'name']);
    }

    /**
     * Get State Id By State Name.
     * @param $name
     *
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public static function getIdByName($name)
    {
        return self::where('name', '=', $name)->get(['id']);
    }
}
