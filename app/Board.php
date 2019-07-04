<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Board extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'boards';
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;
    /**
     * The model's default values for attributes.
     *
     * @var array
     */
    protected $attributes = [
        'width'  => 4,
        'height' => 4,
    ];
}
