<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\Reminders\RemindableTrait;

class Town extends Eloquent
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'town';

    /**
     * @var array
     */
    protected $fillable = array('state_id', 'name', 'latitude', 'longitude', 'created_by', 'updated_by');

    public $state;
    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name'  => 'required',
        'state' => 'required'
    ];


    /**
     * Defining relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function country()
    {
        return $this->belongsTo('State');
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
     * Get all towns.
     *
     * @param $page
     *
     * @return \Illuminate\Pagination\Paginator
     */
    public static function getAll($page)
    {
        DB::getPaginator()->setCurrentPage($page);
        $towns = DB::table('town')
            ->join('state', 'town.state_id', '=', 'state.id')
            ->join('country', 'state.country_id', '=', 'country.id')
            ->select(
                'town.id',
                'town.name',
                'town.latitude',
                'town.longitude',
                'state.name as state',
                'state.country_id',
                'country.name as country',
                'country.code'
            )
            ->paginate(10);

        return $towns;

    }

    /**
     * Get towns by stateId.
     *
     * @param stateId
     *
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public static function getTownsByStateId($stateId)
    {
        return self::where('state_id', '=', $stateId)->get(['id', 'name']);
    }

    /**
     * Get townId by Town Name.
     * @param $name
     *
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public static function getIdByName($name)
    {
        return self::where('name', '=', $name)->get(['id']);
    }
}
