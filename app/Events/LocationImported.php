<?php 

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class LocationImported implements ShouldBroadcast
{
    public $message;

    public function __construct($message)
    {
        $this->message = $message;
    }

    public function broadcastOn()
    {
        return new Channel('location'); // 👈 phải trùng với channel hiển thị trong dashboard
    }

    public function broadcastAs()
    {
        return 'import.done'; // 👈 phải trùng với event name bạn thấy
    }
}
