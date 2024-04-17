<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Technology;
use App\Models\Category;

class Project extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'author',
        'description',
        'project_link',
        
    ];

    // metodo per la relazione
    public function technologies(){
        return $this->belongsToMany(Technology::class);
    }
    public function category(){
        return $this->belongsTo(Category::class);
    }

    //metodo per la validazione
    public static function getValidationRules()
    {
        return [
            'title' => 'required',
            'author' => 'required',
            'project_link' => 'required|url',
            'description' => '',
            'image'=>'',
        ];
    }
}
