<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;
use App\Traits\ExtendedModel;

class Product extends Model
{
    use ExtendedModel;
    
    /**
     * @var string
     */
    protected $connection = 'mongodb';

    /**
     * @var string
     */
    protected $collection = 'products';

    /**
     * Fields to be fillable
     *
     * @var array
     */
    protected $fillable = ['name','quantity','ingredients'];
}
