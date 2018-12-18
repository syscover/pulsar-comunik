<?php namespace Syscover\Comunik\Models;

use Syscover\Admin\Models\Country;
use Syscover\Core\Models\CoreModel;
use Illuminate\Support\Facades\Validator;

/**
 * Class Contact
 * @package Syscover\Comunik\Models
 */

class Contact extends CoreModel
{
	protected $table        = 'comunik_contact';
    protected $fillable     = ['id', 'list_id', 'customer_id', 'company', 'name', 'surname', 'birth_date', 'lang_id', 'country_id', 'prefix', 'mobile', 'email', 'unsubscribe_mobile', 'unsubscribe_email', 'data'];
    protected $casts        = [
        'data' => 'array'
    ];
    private static $rules   = [
        'list_id'   => 'required'
    ];
    public $with = ['type'];
        
    public static function validate($data, $specialRules = [])
    {
        return Validator::make($data, static::$rules);
	}

    public function list()
    {
        return $this->belongsTo(ListModel::class, 'list_id');
    }

    public function countries()
    {
        return $this->hasMany(Country::class, 'id', 'country_id');
    }
}
