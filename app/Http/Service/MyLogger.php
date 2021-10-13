<?php


namespace App\Http\Service;


use App\Models\ActivityLog;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class MyLogger
{

    public static function info($activity, $message)
    {
        $userId = Auth::check() ? Auth::user()->id : null;
        Log::info($activity, ["message" => $message, "userId" => $userId]);

        ActivityLog::create([
            "level" => 'info',
            "user_id" => $userId,
            "activity" => $activity,
            "message" => $message
        ]);
    }

    public static function error($activity, $message, $userId)
    {
        $userId = Auth::check() ? Auth::user()->id : null;
        Log::error($activity, ["message" => $message, "userId" => $userId]);

        ActivityLog::create([
            "level" => 'error',
            "user_id" => $userId,
            "activity" => $activity,
            "message" => $message
        ]);
    }
}
