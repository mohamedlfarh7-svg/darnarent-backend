<?php

namespace App\Console\Commands;

use Illuminate\Console\Attributes\Description;
use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Command;

#[Signature('app:close-expired-auctions')]
#[Description('Command description')]
class CloseExpiredAuctions extends Command
{
    /**
     * Execute the console command.
     */
    public function handle()
    {
        //
    }
}
