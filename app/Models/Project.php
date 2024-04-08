<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Technology;

class Project extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'author',
        'description',
        'project_link'
    ];
    public function technologies(){
        return $this->belongsToMany(Technology::class);
    }
}
