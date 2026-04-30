<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Majors extends Model
{
    protected $fillable = ['name', 'code'];

    public function student(): HasMany
    {
        return $this->hasMany(Student::class, 'major_id');
    }
}