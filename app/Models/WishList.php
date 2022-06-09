<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WishList extends Model
{
    /**
     * @var string
     */
    protected $table = 'wish_lists';

    protected $primaryKey = 'id';

    protected $fillable = [
      'table_number',
      'wish_name',
      'description',
      'price',
      'link'
    ];

}
