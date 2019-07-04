<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Token extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tokens';
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['value', 'x_position', 'y_position'];
}
