<?php

namespace App\Http\Controllers;
use App\Models\Notification;
use Illuminate\Http\Request;
use Carbon\Carbon;
class NotificationController extends Controller
{
    public function showNotification()
    {
        $allNotificationCount = Notification::pluck('read_at')->count();
        $newNotificationCount = Notification::whereNull('read_at')->count();
        $new_notifications = Notification::whereNull('read_at')->get();
        $all_notification = Notification::orderBy('created_at','desc')->get();
        return view('admin.show-notification', compact('new_notifications','allNotificationCount','all_notification','newNotificationCount'));
    }

    public function markAsRead(Request $request, $notification_id)
    { 
        $message_details = Notification::findOrFail($notification_id);
        $message_details->read_at = Carbon::now();
        $message_details->save();
        return view('admin.read-message', compact('message_details'));
    }
} 
 