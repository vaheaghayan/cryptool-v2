<?php

namespace App\Models\CypherCategory;

use Illuminate\Database\Eloquent\Model;

class CypherCategoryMl extends Model
{
    protected $table = 'cypher_categories_ml';

    protected $fillable = [
        'lng_code',
        'cypher_category_id',
        'body'
    ];
}
