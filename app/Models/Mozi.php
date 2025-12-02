<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mozi extends Model
{
    use HasFactory;
    protected $fillable = ['moziazon','mozinev','irszam','cim','telefon'];

    // sok filmje lehet (many-to-many pivot ahol pivot táblában fkod/moziazon vannak)
    public function films()
    {
        // használunk custom pivot kulcsokat
        return $this->belongsToMany(Film::class, 'film_mozi', 'moziazon', 'fkod', 'moziazon', 'fkod');
    }
}
