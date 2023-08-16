<?php

namespace App\Http\Controllers;
use Cache;
use App\Models\Blog;
use App\Models\Admin;
use App\Models\Video;
use App\Models\Status;
use App\Models\Product;
use App\Models\Category;
use App\Models\Notification;
use Illuminate\Http\Request;
use App\Models\GuestFeedBack;
use Illuminate\Support\facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\RateLimiter;


class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function admin_dashboard()
    {
        $request_name = Admin::all();
        $category_count = Category::count();
        $product_count = Product::count();
        $blog_count = Blog::count();
        $video_blog_count = Video::count();
        $status_blog_count = Status::count();
        $notif_count = Notification::count();
        $total_blog_post = $blog_count + $video_blog_count +  $status_blog_count;
        //question 1 graph logic
        // $five_star = GuestFeedBack::count('q_one');
        // $five_star_count = 0;
        // foreach($five_star as $item){
        //     if ($item == 1){
        //         $five_star_count++;
        //     } 
        // } 
        $five_star_count = GuestFeedBack::where('q_one', 5)->count();
        $four_star_count = GuestFeedBack::where('q_one', 4)->count();
        $three_star_count = GuestFeedBack::where('q_one', 3)->count();
        $two_star_count = GuestFeedBack::where('q_one', 2)->count();
        $one_star_count = GuestFeedBack::where('q_one', 1)->count();
        
        // question 2
        $five_star_count1 = GuestFeedBack::where('q_two', 5)->count();
        $four_star_count1 = GuestFeedBack::where('q_two', 4)->count();
        $three_star_count1 = GuestFeedBack::where('q_two', 3)->count();
        $two_star_count1 = GuestFeedBack::where('q_two', 2)->count();
        $one_star_count1 = GuestFeedBack::where('q_two', 1)->count();

        // question 3
        $five_star_count2 = GuestFeedBack::where('q_three', 5)->count();
        $four_star_count2 = GuestFeedBack::where('q_three', 4)->count();
        $three_star_count2 = GuestFeedBack::where('q_three', 3)->count();
        $two_star_count2 = GuestFeedBack::where('q_three', 2)->count();
        $one_star_count2 = GuestFeedBack::where('q_three', 1)->count();

        $guest_comment = GuestFeedBack::orderByDesc('created_at')->get();
        return view('admin.admindashboard',compact('request_name','category_count','product_count','total_blog_post','notif_count','five_star_count','four_star_count','three_star_count','two_star_count','one_star_count',
        'five_star_count1','four_star_count1','three_star_count1','two_star_count1','one_star_count1','five_star_count2','four_star_count2','three_star_count2','two_star_count2','one_star_count2','guest_comment'));
    } 
    public function login_index()
    {
        return view('admin.admin_login');
    }

    public function admin_check(Request $request)
    {
        $key = "login.".$request->ip();
        $retries = RateLimiter::retriesLeft($key, 3);

        $request->validate([
            'email' => 'required|exists:admins,email',
            'password' => 'required|min:8',
        ], [
            'email.exists' => 'email is invalid',
            'password.exists' => 'password is incorrect'
        ]);

        $creds = $request->only('email','password');
        $remember = $request->filled('remember');

        if (Auth::guard('admin')->attempt($creds, $remember)) {
            return redirect()->route('admin.admindashboard')->with('Logged In as Admin Successful');
        } else {
            if ($retries <= 0) {
                $seconds = RateLimiter::availableIn($key);
                return redirect()->route('admin.admin_login')->with('fail', 'Too Many Requests Please try again in ' . $seconds . ' Seconds');
            } else {
                RateLimiter::hit($key);
                $retries = $retries - 1;
                if ($retries <= 0) {
                    $seconds = RateLimiter::availableIn($key);
                    return redirect()->route('admin.admin_login')->with('fail', 'Too Many Requests Please try again in ' . $seconds . ' Seconds');
                } else {
                    return redirect()->route('admin.admin_login')->with('fail', 'Incorrect Credential, You Have ' . $retries . ' Attempt Left');
                }
            }
        }
    }


    public function admin_logout(Request $request) {
        Auth::logout();
        return redirect('/admin/admin_login')->with('success', 'Logout is Successful');
    }
}
