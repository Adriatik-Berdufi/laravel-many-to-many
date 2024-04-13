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
        'project_link',
        
    ];

    // metodo per la relazione
    public function technologies(){
        return $this->belongsToMany(Technology::class);
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
