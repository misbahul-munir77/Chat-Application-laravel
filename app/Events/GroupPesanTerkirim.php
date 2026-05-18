<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class GroupPesanTerkirim implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $pesan;

    public function __construct($pesan)
    {
        $this->pesan = $pesan;
    }

    public function broadcastOn(): array
    {
        return [
            new Channel('group.' . $this->pesan['group_id']),
        ];
    }

    public function broadcastAs()
    {
        return 'group-pesan-baru';
    }
}