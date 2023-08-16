<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CookieConsentController extends Controller
{
    public function acceptCookies(Request $request)
    {
        $cookie = cookie()->forever('accept_cookies', true);
        return redirect()->back()->cookie($cookie);
    }
    public function declineCookies(Request $request)
    {
        // Code to handle declining cookies
        // Perform any necessary actions when the user declines cookies

        // For example, you can unset or delete the 'accept_cookies' cookie
        return redirect()->back()->withCookie(cookie()->forget('accept_cookies'));
    }
}
 