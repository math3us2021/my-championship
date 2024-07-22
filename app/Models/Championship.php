<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Championship extends Model
{
    use HasFactory;
    protected $table = 'championships';
    protected $fillable = [
        'id',
        'name',
    ];

    public function teams()
    {
        return $this->belongsToMany(Team::class, 'championship_teams');
    }
    public function matches()
    {
        return $this->hasMany(MatchesPlayed::class);
    }
}
