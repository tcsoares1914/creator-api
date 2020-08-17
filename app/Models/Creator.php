<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Creator extends Model
{
    const CREATED_AT = 'created';
    const UPDATED_AT = 'updated';

    /**
     * The connection name for the model.
     *
     * @var string
     */
    protected $connection = 'mysql';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'creators';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'phone',
        'country',
        'language'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     * @var array
     */
    protected $hidden = [
        'created',
        'updated'
    ];
}