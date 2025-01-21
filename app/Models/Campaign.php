<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    public function charity()
    {
        return $this->belongsTo(Charity::class, 'charity_id');
    }

    public function donations()
    {
        return $this->hasMany(Donation::class, 'campaign_id');
    }
}
