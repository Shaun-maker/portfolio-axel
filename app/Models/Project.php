<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Project extends Model
{
    use HasFactory;

    public function tools() : BelongsToMany {
        return $this->belongsToMany(Tool::class);
    }

    public function category() {
        return $this->belongsTo(Category::class);
    }
}
