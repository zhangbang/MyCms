<?php


namespace Addons\SystemLog\Listeners;


use Addons\SystemLog\Events\SystemLogEvent;
use Addons\SystemLog\Models\SystemLog;

class SystemLogListener
{
    /**
     * Handle the event.
     *
     * @param SystemLogEvent $event
     * @return void
     */
    public function handle(SystemLogEvent $event)
    {

        $values = $event->getValues();

        if ($values['is_ajax'] == 1 && strtolower($values['method']) == 'get') {
            return;
        }

        (new SystemLog())->store($event->getValues());
    }
}
