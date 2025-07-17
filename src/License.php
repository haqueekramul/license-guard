<?php

namespace Ekram\LicenseGuard;

use Illuminate\Support\Facades\Http;

class License
{
    public static function check()
    {
        $response = Http::post(config('licenseguard.api_url'), [
            'license_key' => config('licenseguard.license_key'),
            'domain'      => request()->getHost(),
            'ip'          => request()->ip(),
        ]);

        return $response->json('status') === 'valid';
    }
}
