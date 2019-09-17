<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User_notification extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'user_id',
        'notification_id',
        'viewed',
    ];

    public function toArray()
    {
        $data['id'] = $this->id;
        $data['title'] = $this->title;
        $data['body'] = $this->body;
        $data['viewed'] = $this->viewed;
        $data['time'] = $this->notification_relation->getTime();
        return $data;
    }

    // custom Attributes
    public function getTitleAttribute()
    {
        $attribute = __('language.notSelected');
        if ($this->notification_relation)
            $attribute = $this->notification_relation->title;
        return $attribute;
    }

    public function getBodyAttribute()
    {
        $attribute = __('language.notSelected');
        if ($this->notification_relation)
            $attribute = $this->notification_relation->body;
        return $attribute;
    }



    // relations
    public function notification_relation()
    {
        return $this->belongsTo('App\Notification', 'notification_id');
    }
}
