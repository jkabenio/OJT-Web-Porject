<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Blog;
use App\Models\Product;
use App\Models\FAQs;
use App\Models\Video;
use App\Models\Status;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
class TrashController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }
 
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function trashedCan(){
        $trashed_category = Category::onlyTrashed()->get();
        $trashed_product = Product::onlyTrashed()->get();
        $trashed_blog = Blog::onlyTrashed()->get();
        $trashed_video_blog = Video::onlyTrashed()->get();
        $trashed_status_blog = Status::onlyTrashed()->get();
        $trashed_faq = FAQs::onlyTrashed()->get();
        return view('admin.trash-can', compact('trashed_category','trashed_product', 'trashed_blog', 'trashed_faq','trashed_video_blog','trashed_status_blog'));
    }
 
    // restore funtion list here
    public function restoreSoftDeleteCategory($category_id)
    {
        Category::whereId($category_id)->restore();
        return back()->with('success', 'Category successfully restored');
    }
    //Product
    public function restoreSoftDeleteProduct($product_id)
    {
        Product::whereId($product_id)->restore();
        return back()->with('success', 'Product successfully restored');
    }
    //Blog
    public function restoreSoftDeleteBlog($blog_id)
    {
        Blog::whereId($blog_id)->restore();
        return back()->with('success', 'Blog successfully restored');
    }
    //Video Blog
    public function restoreSoftDeleteVideoBlog($video_blog_id)
    {
        Video::whereId($video_blog_id)->restore();
        return back()->with('success', 'Video Blog successfully restored');
    }
    // status blog
    public function restoreSoftDeleteStatusBlog($Status_blog_id)
    {
        Status::whereId($Status_blog_id)->restore();
        return back()->with('success', 'Status Blog successfully restored');
    }
    //Faq
    public function restoreSoftDeleteFaq($faq_id)
    {
        FAQs::whereId($faq_id)->restore();
        return back()->with('success', 'Faq successfully restored');
    }

    // restore all handler
    public function restoreAllSoftDeletes()
    {
        $tables = ['category','product', 'blog', 'faqs','video','status']; // Replace with the actual table names

        foreach ($tables as $table) {
            $modelClass = '\App\Models\\' . ucfirst($table);
            if (class_exists($modelClass) && in_array('Illuminate\Database\Eloquent\SoftDeletes', class_uses($modelClass))) {
                $modelClass::onlyTrashed()->restore();
            }
        }

        return redirect()->back()->with('success', 'All deleted records have been restored.');
    }
    // delete all handler
    public function forceDeleteAllSoftDeletes()
    {
        $tables = ['category','product', 'blog', 'faqs','video','status']; // Replace with the actual table names

        foreach ($tables as $table) {
            $modelClass = '\App\Models\\' . ucfirst($table);
            if (class_exists($modelClass) && in_array('Illuminate\Database\Eloquent\SoftDeletes', class_uses($modelClass))) {
                $modelClass::onlyTrashed()->forceDelete();
            }
        }

        return redirect()->back()->with('success', 'All soft-deleted records have been force deleted.');
    }

    
    // force delete list here
    // category
    public function forceDeleteCategory($category_id)
    {
        $category = Category::onlyTrashed()->find($category_id);
        if (!$category){
            return back()->with('error', 'Category not found');
        }
        $category->forceDelete();
        if($category->cat_img != 'noimage.jpg'){
            // Delete Image
            Storage::delete('public/upload_img/' . $category->cat_img);
        }
        return back()->with('success', 'Category Permanently Deleted');
    }
    // Porduct
    public function forceDeleteProduct($product_id)
    {
        $product = Product::onlyTrashed()->find($product_id);
        if (!$product){
            return back()->with('error', 'Product not found');
        }
        $product->forceDelete();
        if($product->prod_img != 'noimage.jpg'){
            // Delete Image
            Storage::delete('public/upload_img/' . $product->prod_img);
        } 
        return back()->with('success', 'Product Permanently Deleted');
    }
    //Blog
    public function forceDeleteBlog($blog_id)
    {
        $blog = Blog::onlyTrashed()->find($blog_id);
        if (!$blog){
            return back()->with('error', 'Blog not found');
        }
        $blog->forceDelete();
        if($blog->blog_img != 'noimage.jpg'){
            // Delete Image
            Storage::delete('public/upload_img/'.$blog->blog_img);
        } 
        return back()->with('success', 'Blog Permanently Deleted');
    }
    // video blog
    public function forceDeleteVideoBlog($video_blog_id)
    {
        $video_blog = Video::onlyTrashed()->find($video_blog_id);
        if (!$video_blog){
            return back()->with('error', 'Video Blog not found');
        }
        $video_blog->forceDelete();
            // Delete Image
            // Storage::delete($video_blog->video_thumbnail_path);
            Storage::delete('public/upload_vid/'.$video_blog->video_path); 
        return back()->with('success', 'Video Blog Permanently Deleted');
    }
    // status blog
    public function forceDeleteStatusBlog($status_blog_id)
    {
        $status_blog = Status::onlyTrashed()->find($status_blog_id);
        $status_blog->forceDelete();
            // Delete Image 
        return back()->with('success', 'Status Blog Permanently Deleted');
    }
    //Faq
    public function forceDeleteFaq($faq_id)
    {
        FAQs::onlyTrashed()->find($faq_id)->forceDelete();
        return back()->with('success', 'Faq Permanently Deleted');
    }

}
