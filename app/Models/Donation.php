<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    // Event: After a donation is created
    protected static function boot()
    {
        parent::boot();

        static::created(function ($donation) {
            if ($donation->payment_status === 'completed') {
                $donation->updateCampaignRaisedAmount($donation->amount);
            }
        });

        static::updated(function ($donation) {
            if ($donation->wasChanged('payment_status')) {
                if ($donation->getOriginal('payment_status') === 'completed') {
                    // If it was completed before, deduct the amount
                    $donation->updateCampaignRaisedAmount(-$donation->getOriginal('amount'));
                }

                if ($donation->payment_status === 'completed') {
                    // Add the amount back if it is now completed
                    $donation->updateCampaignRaisedAmount($donation->amount);
                }
            }
        });

        static::deleted(function ($donation) {
            if ($donation->payment_status === 'completed') {
                // Deduct the amount if the donation was completed
                $donation->updateCampaignRaisedAmount(-$donation->amount);
            }
        });
    }

    public function updateCampaignRaisedAmount($amount)
    {
        $campaign = $this->campaign;
        if ($campaign) {
            $campaign->raised_amt += $amount;
            $campaign->save();
        }
    }
    public function campaign()
    {
        return $this->belongsTo(Campaign::class, 'campaign_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
