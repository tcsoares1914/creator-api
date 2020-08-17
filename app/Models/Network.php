<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Network extends Model
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
    protected $table = 'networks';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
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