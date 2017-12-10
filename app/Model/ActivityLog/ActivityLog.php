<?php

namespace App\Model\ActivityLog;

use Illuminate\Database\Eloquent\Model;

class ActivityLog extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'tbl_log';

    /**
     * Custom primary key is set for the table
     * 
     * @var integer
     */
    protected $primaryKey = 'id';

    /**
     * Maintain created_at and updated_at automatically
     * 
     * @var boolean
     */
    public $timestamps = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'device_id',
        'activity_id',
        'message',
        'method',
        'request_data',
        'response_data',
        'ip_address',
    ];
}
