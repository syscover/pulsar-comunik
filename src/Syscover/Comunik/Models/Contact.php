<?php namespace Syscover\Comunik\Models;

use Syscover\Admin\Models\Country;
use Syscover\Admin\Models\Lang;
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

    public function collection()
    {
        return $this->belongsTo(Collection::class, 'list_id');
    }

    public function lang()
    {
        return $this->belongsTo(Lang::class, 'id', 'lang_id');
    }

    public function countries()
    {
        return $this->hasMany(Country::class, 'id', 'country_id');
    }
}
