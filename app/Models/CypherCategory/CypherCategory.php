<?php

namespace App\Models\CypherCategory;

use Illuminate\Database\Eloquent\Model;

class CypherCategory extends Model
{
    protected $table = 'cypher_categories';

    protected $fillable = [
        'name'
    ];
}
