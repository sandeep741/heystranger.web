<?php

namespace App\Events;

use Request;
use App\Events\Event;
use App\Model\ActivityLog\ActivityLog;
use App\Model\Notification\Notification;

abstract class BaseEvent extends Event
{

    /**
     * 
     * @param type $log
     * @return type
     */
    public static function addActivityLog($log)
    {
        $arrActivity['user_id']        = isset($log['user_id']) ? $log['user_id'] : null;
        $arrActivity['device_id']     = isset($log['device_id']) ? $log['device_id'] : null;
        $arrActivity['activity_id']    = isset($log['activity_id']) ? $log['activity_id'] : null;
        $arrActivity['message']       = isset($log['message']) ? $log['message'] : null;
        $arrActivity['method']        = isset($log['method']) ? $log['method'] : null;
        $arrActivity['request_data']  = isset($log['request_data']) ? $log['request_data'] : null;
        $arrActivity['response_data'] = isset($log['response_data']) ? $log['response_data'] : null;
        $arrActivity['ip_address']    = isset($log['ip_address']) ? $log['ip_address'] : null;

        if (!isset($arrActivity['ip_address'])) {
            $arrActivity['ip_address'] = Request::getClientIp();
        }

        //$arrActivity['source'] = Request::server('HTTP_REFERER');
        //$arrActivity['browser_info'] = Request::server('HTTP_USER_AGENT');

        $save_activity = new ActivityLog($arrActivity);
        $saved         = $save_activity->save();

        return $saved;
    }

    /**
     * 
     * @param type $notification
     * @return type
     */
    public static function addJobSeekerNotification($notification)
    {

        $arrNotification['notification_for'] = isset($notification['notification_for']) ? $notification['notification_for'] : null;
        $arrNotification['not_type']         = isset($notification['not_type']) ? $notification['not_type'] : null;
        $arrNotification['amount']           = isset($notification['amount']) ? $notification['amount'] : null;
        $arrNotification['from_id']          = isset($notification['from_id']) ? $notification['from_id'] : null;
        $arrNotification['to_id']            = isset($notification['to_id']) ? $notification['to_id'] : null;
        $arrNotification['related_id']       = isset($notification['related_id']) ? $notification['related_id'] : null;
        $arrNotification['slug']             = isset($notification['slug']) ? $notification['slug'] : null;
        $arrNotification['subcategory_id']   = isset($notification['subcategory_id']) ? $notification['subcategory_id'] : null;
        $arrNotification['locality_id']      = isset($notification['locality_id']) ? $notification['locality_id'] : null;
        $arrNotification['status']           = isset($notification['status']) ? $notification['status'] : null;
        $arrNotification['created_by']       = isset($notification['created_by']) ? $notification['created_by'] : null;

        $save_notification = new CustomerNotification($arrNotification);
        $saved             = $save_notification->save();

        return $saved;
    }

    /**
     * addAdminNotification
     * @param type $notification
     * @return type
     */
    public static function addAdminNotification($notification)
    {

        $arrNotification['notification_for']  = isset($notification['notification_for']) ? $notification['notification_for'] : null;
        $arrNotification['notification_type'] = isset($notification['notification_type']) ? $notification['notification_type'] : null;
        $arrNotification['related_id']        = isset($notification['related_id']) ? $notification['related_id'] : null;
        $arrNotification['slug']              = isset($notification['slug']) ? $notification['slug'] : null;
        $arrNotification['status']            = isset($notification['status']) ? $notification['status'] : null;
        $arrNotification['created_by']        = isset($notification['created_by']) ? $notification['created_by'] : null;
        $arrNotification['notification_from'] = isset($notification['notification_from']) ? $notification['notification_from'] : null;
        $arrNotification['notification_to']   = isset($notification['notification_to']) ? $notification['notification_to'] : null;

        $save_notification = new Notification($arrNotification);
        $saved             = $save_notification->save();

        return $saved;
    }

    /**
     * addEmployerNotification
     * @param type $notification
     * @return type
     */
    public static function addEmployerNotification($notification)
    {

        $arrNotification['notification_for']   = isset($notification['notification_for']) ? $notification['notification_for'] : null;
        $arrNotification['notification_type']  = isset($notification['notification_type']) ? $notification['notification_type'] : null;
        $arrNotification['related_id']         = isset($notification['related_id']) ? $notification['related_id'] : null;
        $arrNotification['slug']               = isset($notification['slug']) ? $notification['slug'] : null;
        $arrNotification['status']             = isset($notification['status']) ? $notification['status'] : null;
        $arrNotification['created_by']         = isset($notification['created_by']) ? $notification['created_by'] : null;
        $arrNotification['notification_from']  = isset($notification['notification_from']) ? $notification['notification_from'] : null;
        $arrNotification['notification_to']    = isset($notification['notification_to']) ? $notification['notification_to'] : null;
        $arrNotification['notification_to_id'] = isset($notification['notification_to_id']) ? $notification['notification_to_id'] : null;

        $save_notification = new Notification($arrNotification);
        $saved             = $save_notification->save();

        return $saved;
    }
}