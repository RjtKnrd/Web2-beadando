<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    use HasFactory;
    protected $fillable = ['fkod','filmcim','szines','szinkron','szarmazas','mufaj','hossz'];

    public function mozis()
    {
        return $this->belongsToMany(Mozi::class, 'film_mozi', 'fkod', 'moziazon', 'fkod', 'moziazon');
    }
}
