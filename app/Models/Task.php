<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    public function category()
    {
        return $this->hasOne(Category::class, "id", "category_id");
    }

    public function owner()
    {
        return $this->hasOne(User::class);
    }

    public function tags()
    {
        return $this->hasMany(TagTask::class);
    }
}
