<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RaceProg extends Model
{
    /**
     * The model's default values for attributes.
     *
     * @var array
     */

    

    protected $table = 'hb_r_prog';
    protected $fillable = [
        'r_num', 'r_date', 'r_time', 'r_track', 'r_length', 'r_group', 'r_t_type', 'r_l_finished', 'r_clocking', 'r_timein', 'r_R', 'rd_x_bet', 'rd_p_bet', 'br_id', 'r_replay', 'announcement'
    ];

    // protected $casts = [
    //     'rd_p_bet' => 'array',
    // ];

    public function getRdPBetAttribute($value)
    {
        return isset($value) ? unserialize($value) : $value;
    }
    
}
