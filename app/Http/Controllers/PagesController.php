<?php

namespace App\Http\Controllers;
use DB;
use App\Models\Blog;
use App\Models\Like;
use App\Models\Admin;
use App\Models\Video;
use App\Models\Status;
use App\Models\Comment;
use App\Models\Product;
use App\Models\Category;
use App\Models\Notification;
use Illuminate\Http\Request;
class PagesController extends Controller
{

    public function index()
    {
        $admin = Admin::select(['name', 'id'])->get();
        // $blogPosts = Blog::with('user')->get();
        $category_data = Category::select(['cat_title', 'cat_description', 'cat_img', 'id'])->get();
        $blog_data = Blog::select(['blog_title', 'blog_desc', 'blog_img','created_at','user_id','id'])->get();
        $post = Blog::pluck('id');
        $likeIds = Like::pluck('blog_post_id');
        $approvedComment = Comment::where('approved', true)->get();
        // $blog_comment_data = Comment::select(['blog_post_id','name','content','created_at'])->get();
        return view('pages.home', compact('category_data', 'blog_data','admin','post','likeIds','approvedComment'));
    }
    public function about()
    {
        return view('pages.about');
    }
    public function product()
    { 
        $category_data = Category::select(['cat_title', 'cat_description', 'cat_img', 'id'])->get();
        $product_data = Product::select(['prod_title', 'prod_description', 'prod_img','prod_cat_id'])->get();
        return view('pages.product', compact('category_data', 'product_data'));
    }
    public function eventCSR()
    {
        $blog_collected_data = Blog::select(['blog_title', 'blog_desc', 'blog_img', 'created_at', 'user_id', 'id'])->addSelect(\DB::raw("'blog' as blog_table_name"))->get();

        $video_blog_collected_data = Video::select(['video_title', 'video_description', 'video_path', 'created_at', 'user_id', 'id'])
            ->addSelect(\DB::raw("'video' as video_table_name"))
            ->get();

        $status_blog_collected_data = Status::select(['status_description', 'user_id', 'id', 'created_at'])
            ->addSelect(\DB::raw("'status' as status_table_name"))
            ->get();

        $mergedData = $blog_collected_data->concat($video_blog_collected_data)->concat($status_blog_collected_data);

        $sortedData = $mergedData->sortByDesc('created_at');
        // dd($sortedData);
        $admin = Admin::select(['name', 'id'])->get();
        $blog_data = Blog::select(['blog_title', 'blog_desc', 'blog_img','created_at','user_id','id'])->get();
        $video_blog_data = Video::select(['video_title', 'video_description', 'video_path','created_at','user_id','id'])->get();
        $status_blog_data = Status::select(['status_description','user_id','id','created_at'])->get();
        return view('pages.event-csr', compact('blog_data','admin','video_blog_data','status_blog_data','sortedData'));
    }
    public function contactUs(Request $request)
    {
        if ($request->cookie('accept_cookies')) {
            // Process the contact form submission for guest users
            // Allow the user to fill up and submit the form
            return view('pages.contact-us');
        } else {
            // Handle the scenario when cookies are not accepted
            // Display a message or redirect the user to the cookie consent page
            return back()->with('success', 'Please Accept cookie so you can use the contact form');
        }
        
    }

    public function storeContactUsMessage(Request $request)
    {
         // Get the current date
         $currentDate = now()->toDateString();

         // Generate a unique key for the user and current date
         $userKey = 'contact_us_submitted_' . $request->ip() . '_' . $currentDate;
 
         // Get the current feedback count for the user and date
         $contactUsCount = $request->session()->get($userKey, 0);
 
         // Check if the user has exceeded the daily limit (3)
         if ($contactUsCount >= 3) {
            return redirect()->back()->withErrors(['You have exceeded the daily limit to contact us.']);
         }
        $this->validate($request, [
            'name' => ['required',
                    'max:50',
                    'min:10',
            ],
            'company_name'  => ['required',
                    'max:50',
                    'min:5',
            ],
            'email'  => ['required',
                    'email',
            ],
            'contact_number'  => ['required',
                    'regex:/^[0-9]{10,12}$/'
            ],
            'message'  => ['required',
                    'max:500',
                    'min:20',
            ],
        ]);

        $notification = new Notification([
            'name' => $request->get('name'),
            'company_name' => $request->get('company_name'),
            'email' => $request->get('email'),
            'contact_number' => $request->get('contact_number'),
            'message' => $request->get('message'),
        ]); 
        $notification->save();
        // Increment the message count for the current user and date
        // Increment the feedback count for the current user and date
        $contactUsCount++;
        $request->session()->put($userKey, $contactUsCount);
        return redirect('/contact-us')->with('success', 'Thank you for contacting us. We will response to your message as soon as possible.');
    }
}
