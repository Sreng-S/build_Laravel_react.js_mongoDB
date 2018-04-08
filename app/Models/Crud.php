<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
//use Moloquent;
//use Illuminate\Database\Eloquent\Model;

class Crud extends Eloquent
{
    protected $collection = 'books';
}
