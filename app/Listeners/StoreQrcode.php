<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class StoreQrcode
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  Registered  $event
     * @return void
     */
    public function handle(Registered $event)
    {
        File::ensureDirectoryExists(public_path('qrcodes'));

        $qrcode = time() . Str::random(15)  . '.png';

        QrCode::size(500)
            ->format('png')
            ->generate(route('profiles.show', $event->user), public_path('qrcodes/' . $qrcode));

        $event->user->update([
            'qrcode' => $qrcode
        ]);
    }
}
