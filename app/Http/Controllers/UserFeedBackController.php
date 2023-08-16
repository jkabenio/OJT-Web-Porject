<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\GuestFeedBack;

class UserFeedBackController extends Controller
{
    public function feedBackStore(Request $request) {

         // Get the current date
        $currentDate = now()->toDateString();

        // Generate a unique key for the user and current date
        $userKey = 'feedback_submitted_' . $request->ip() . '_' . $currentDate;

        // Get the current feedback count for the user and date
        $feedbackCount = $request->session()->get($userKey, 0);

        // Check if the user has exceeded the daily limit (3)
        if ($feedbackCount >= 3) {
            return redirect()->back()->withErrors(['You have exceeded the daily feedback limit.']);
        }
        $this->validate($request, [
            'q_one' => ['required',
            'integer',
            'between:1,5',
        ],
            'q_two' => ['required',
            'integer',
            'between:1,5',
        ],
            'q_three' => ['required',
            'integer',
            'between:1,5',
        ],
            'guest_comment' => ['nullable',
            'string',
            'max:500',
        ],
        ]);
        $feedback = new GuestFeedBack([
            'q_one' => $request->get('q_one'),
            'q_two' => $request->get('q_two'),
            'q_three' => $request->get('q_three'),
            'guest_comment' => $request->get('guest_comment'),

        ]);
        $feedback->save();
         // Increment the feedback count for the current user and date
        $feedbackCount++;
        $request->session()->put($userKey, $feedbackCount);

        return redirect()->back()->with('success', 'Thank you for your feedback!');
    }
}
