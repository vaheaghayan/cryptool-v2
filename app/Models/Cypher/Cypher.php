<?php

namespace App\Models\Cypher;

use App\Models\Comments\Comment;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Cypher extends Model
{
    use HasFactory;

    protected $table = 'cyphers';

    const CATEGORIES = ['classic_algorithms', 'hash_algorithms', 'cryptographic_algorithms'];

    public function ml(): HasMany
    {
        return $this->hasMany(CypherMl::class, 'cypher_id', 'id');
    }

    public function current(): HasOne
    {
        return $this->hasOne(CypherMl::class, 'cypher_id', 'id')->where('lng_code', cLng());
    }
}
