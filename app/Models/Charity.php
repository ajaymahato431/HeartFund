<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Charity extends Model
{
    public function creator()
    {
        return $this->belongsTo(Admin::class, 'admin_id');
    }

    public function campaigns()
    {
        return $this->hasMany(Campaign::class, 'charity_id');
    }
}
