<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class PropertyLimit extends Model
{
    use SoftDeletes;
    protected $table = "property_limits";
}
