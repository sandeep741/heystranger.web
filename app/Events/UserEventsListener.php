<?php

namespace App\Events;

use App\Events\BaseEvent;
use Illuminate\Queue\SerializesModels;
use Exception;

class UserEventsListener extends BaseEvent
{

    use SerializesModels;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Event that would be fired on a user login
     * 
     * @param object $user Logged in user object
     * 
     * @since 0.1
     */
    public function createLog($user)
    {
        $user_data = unserialize($user);
        self::addActivityLog($user_data);
    }

    /**
     * Event that would be fired for customer notification
     * @param $notification
     * @since 0.1
     * @author Sakshay : Meghendra S Yadav
     */
    public function createJobSeekerNotification($notification)
    {
        $notification_data = unserialize($notification);
        self::addJobSeekerNotification($notification_data);
    }

    /**
     * Event that would be fired for admin notification
     * @param $notification
     * @since 0.1
     * @author Sakshay : Meghendra S Yadav
     */
    public function createAdminNotification($notification)
    {
        $notification_data = unserialize($notification);
        self::addAdminNotification($notification_data);
    }

    /**
     * Event that would be fired for admin notification
     * @param $notification
     * @since 0.1
     * @author Sakshay : Meghendra S Yadav
     */
    public function createEmployerNotification($notification)
    {
        $notification_data = unserialize($notification);
        self::addEmployerNotification($notification_data);
    }

    /**
     * Event subscribers
     * 
     * @param mixed $events
     */
    public function subscribe($events)
    {
        $events->listen(
            'heystranger.log', 'App\Events\UserEventsListener@createLog'
        );

        $events->listen(
            'jobseeker.notification', 'App\Events\UserEventsListener@createJobSeekerNotification'
        );

        $events->listen(
            'admin.notification', 'App\Events\UserEventsListener@createAdminNotification'
        );

        $events->listen(
            'employer.notification', 'App\Events\UserEventsListener@createEmployerNotification'
        );
    }
}