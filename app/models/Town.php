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

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'code' => 'required'
    ];


    /**
     * Defining relationship.
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
}
