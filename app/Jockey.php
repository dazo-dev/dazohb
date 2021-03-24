<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jockey extends Model
{
    /**
     * The model's default values for attributes.
     *
     * @var array
     */
    protected $fillable = [
        'jockey_id ', 'jockey_name', 'jockey_nationality', 'jockey_age', 'jockey_sex', 'jockey_started', 'jockey_achievements', 'jockey_n_wins', 'jockey_season_played', 'jockey_stake', 'jockey_bio', 'jockey_img_path'
    ];
}
