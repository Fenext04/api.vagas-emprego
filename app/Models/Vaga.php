<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vaga extends Model
{
    use HasFactory;

    protected $with = ['tipo',"modalidade"];

    protected $fillable = ["titulo","descricao","salario","modalidade_id","tipo_id"];

    public function tipo(){
        return $this->belongsTo(Tipo::class);
    }

    public function modalidade(){
        return $this->belongsTo(Modalidade::class);
    }
}
