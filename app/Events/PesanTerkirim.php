<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class PesanTerkirim implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $pesan;

    public function __construct($pesan)
    {
        $this->pesan = $pesan;
    }

    public function broadcastAs()
    {
        return 'pesan-baru';
    }

    public function broadcastOn(): array
    {
        return [
            new Channel('chat'),
        ];
    }
}