<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MatchesPlayed extends Model
{
    use HasFactory;
    protected $table = 'matches_played';
    protected $fillable = [
        'id',
        'championship_id',
        'stage',
        'team1_id',
        'team2_id',
        'team1_score',
        'team2_score',
        'team1_penalties',
        'team2_penalties',
        'match_winner',
        'team1_points',
        'team2_points',
        'match_date'
    ];
    public $timestamps = false;

    public function championship()
    {
        return $this->belongsTo(Championship::class);
    }

    public function team1()
    {
        return $this->belongsTo(Team::class, 'team1_id');
    }

    public function team2()
    {
        return $this->belongsTo(Team::class, 'team2_id');
    }
}
