<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'label',
        'color',
    ];

    public function projects(){
        return $this->hasMany(Project::class);
    }
    
     //metodo per la validazione
    public static function getValidationRules()
    {
        return [
            'label' => 'required',
            'color' => 'required',
        ];
    }
}
