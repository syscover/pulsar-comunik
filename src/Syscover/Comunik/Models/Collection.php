<?php namespace Syscover\Comunik\Models;

use Syscover\Core\Models\CoreModel;
use Illuminate\Support\Facades\Validator;

/**
 * Class Collection
 * @package Syscover\Comunik\Models
 */

class Collection extends CoreModel
{
	protected $table        = 'comunik_collection';
    protected $fillable     = ['id', 'name', 'field_group_id'];
    private static $rules   = [
        'name' => 'required'
    ];
        
    public static function validate($data, $specialRules = [])
    {
        return Validator::make($data, static::$rules);
	}

    public function contacts()
    {
        return $this->hasMany(Contact::class, 'list_id');
    }
}
