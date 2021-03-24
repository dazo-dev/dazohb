<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Horses extends Model
{
    /**
     * The model's default values for attributes.
     *
     * @var array
     */
    protected $fillable = [
        'horse_name ', 'horse_weight', 'horse_age', 'horse_birthdate', 'horses_color', 'horse_previous_owner', 'horse_current_owner', 'horse_sex', 'horse_origin', 'horse_current_owner', 'horse_imp_type', 'horse_stake', 'horse_cur_rating', 'horse_pre_rating', 'horse_sire', 'horse_dam', 'horse_image_path'
    ];
}
