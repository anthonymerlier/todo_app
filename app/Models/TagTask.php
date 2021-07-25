<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TagTask extends Model
{
    use HasFactory;

    public function task()
    {
        return $this->hasOne(Task::class);
    }
    
    public function tag()
    {
        return $this->hasOne(Tag::class);
    }
}
