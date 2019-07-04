<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Square extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'squares';
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
    protected $fillable = ['is_filled', 'x_position', 'y_position'];
    /**
     * The model's default values for attributes.
     *
     * @var array
     */
    protected $attributes = [
        'is_filled' => false,
    ];
}
