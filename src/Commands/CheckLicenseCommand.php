<?php

namespace Ekram\LicenseGuard\Commands;

use Illuminate\Console\Command;
use Ekram\LicenseGuard\License;

class CheckLicenseCommand extends Command
{
    protected $signature = 'license:check';
    protected $description = 'Check license validity from server';

    public function handle()
    {
        if (License::check()) {
            $this->info('✅ License is valid.');
        } else {
            $this->error('❌ License is invalid!');
        }
    }
}
