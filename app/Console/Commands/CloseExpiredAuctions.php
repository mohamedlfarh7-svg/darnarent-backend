<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Property;

class CloseExpiredAuctions extends Command
{
    protected $signature = 'auctions:close-expired';
    protected $description = 'إغلاق المزادات التي انتهى وقتها وتحديد الفائز';

    public function handle()
    {
        $expiredProperties = Property::where('status', 'active')
            ->where('expires_at', '<=', now())
            ->get();

        foreach ($expiredProperties as $property) {
            $highestBid = $property->bids()->orderBy('amount', 'desc')->first();

            if ($highestBid) {
                $property->winner_id = $highestBid->user_id;
                $property->status = 'closed';
                $property->save();
            } else {
                $property->status = 'closed';
                $property->save();
            }
        }

        $this->info('تم إغلاق المزادات المنتهية بنجاح.');
    }
}