<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\Auth;

class Log extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'old_data' => 'array',
        'new_data' => 'array',
    ];

    // invoke by filling all
    public static function log($message, $old_data, $new_data)
    {
        $log = new Log();
        $log->ip_address = Request::ip();
        $log->user_id = Auth::id();
        $log->message = $message;
        $log->old_data = $old_data;
        $log->new_data = $new_data;
        $log->save();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getOldDataAttribute($value)
    {
        return json_decode($value);
    }

    public function setOldDataAttribute($value)
    {
        $this->attributes['old_data'] = json_encode($value);
    }

    public function getNewDataAttribute($value)
    {
        return json_decode($value);
    }

    public function setNewDataAttribute($value)
    {
        $this->attributes['new_data'] = json_encode($value);
    }

}
