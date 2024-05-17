<?php

namespace App\Listeners;

use App\Events\OrderPlacedNotificationEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class OrderPlacedNotificationListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(OrderPlacedNotificationEvent $event): void
    {
        $orderId = $event->orderId;

        $order = Order::with('user')->find($orderId);

        Mail::send(new OrderPlacedMail($order));
    }
}
