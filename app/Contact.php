<?php
/**
 * Created by PhpStorm.
 * User: kauxtero
 * Date: 1/29/19
 * Time: 9:20 AM
 */

namespace App;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contact extends Model
{
    use SoftDeletes;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];
}