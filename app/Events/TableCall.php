<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class TableCall implements ShouldBroadcast
{
    use Dispatchable;

    private $shopId;

    private $tableId;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($shopId, $tableId)
    {
        $this->shopId = $shopId;
        $this->tableId = $tableId;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('calls.'.md5($this->shopId));
    }

    /**
     * Get the data to broadcast.
     *
     * @return array
     */
    public function broadcastWith()
    {
        return ['tableId' => $this->tableId];
    }
}
