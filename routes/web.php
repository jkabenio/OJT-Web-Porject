<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// }); 
Route::get('/', 'App\Http\Controllers\PagesController@index');
Route::get('/about', 'App\Http\Controllers\PagesController@about');
Route::get('/product', 'App\Http\Controllers\PagesController@product');
Route::get('/event-csr', 'App\Http\Controllers\PagesController@eventCSR');
Route::get('/contact-us', 'App\Http\Controllers\PagesController@contactUs');
Route::post('/store-message', [App\Http\Controllers\PagesController::class,'storeContactUsMessage'])->name('store-message');
// Route::get('/admin/login', 'App\Http\Controllers\AdminController@login_index');
// Route::post('/admin-check',[App\Http\Controllers\AdminController::class,'admin_check'])->name('admin-check');
Route::post('/posts/{post}/like', 'App\Http\Controllers\BlogLikeController@blogLike')->name('posts.like');
Route::post('/comments', 'App\Http\Controllers\CommentController@storeBlogComment')->name('comments.store');
// cookies
Route::post('/accept-cookies', 'App\Http\Controllers\CookieConsentController@acceptCookies')->name('cookies.accept');
Route::post('/decline-cookies', 'App\Http\Controllers\CookieConsentController@declineCookies')->name('cookies.decline');


Route::post('/feedback', 'App\Http\Controllers\UserFeedBackController@feedBackStore')->name('feedback.store');
Route::prefix('admin')->name('admin.')->group(function(){
    Route::middleware(['guest:admin','RevalidateBackHistory','ip.whitelist'])->group(function(){
        Route::get('/admin_login', [App\Http\Controllers\AdminController::class, 'login_index'])->name('admin_login');
        Route::post('/admin-check',[App\Http\Controllers\AdminController::class,'admin_check'])->name('admin-check')->middleware(['throttle:login']);
    }); 

    Route::middleware(['auth:admin','RevalidateBackHistory'])->group(function(){
        Route::get('/admindashboard', [App\Http\Controllers\AdminController::class, 'admin_dashboard'])->name('admindashboard');
        Route::get('/logout', [App\Http\Controllers\AdminController::class, 'admin_logout'])->name('logout');

        //Category
        Route::get('/show-category', [App\Http\Controllers\CategoryController::class, 'showCategory'])->name('show-category');
        Route::get('/create-category', [App\Http\Controllers\CategoryController::class, 'createCategory'])->name('create-category');
        Route::post('/store-category', [App\Http\Controllers\CategoryController::class,'storeCategory'])->name('store-category');
        Route::get('/edit-category/{category_id}', [App\Http\Controllers\CategoryController::class, 'editCategory'])->name('edit-category.edit');
        Route::put('/edit-category/{category_id}', [App\Http\Controllers\CategoryController::class, 'updateCategory'])->name('edit-category.update');
        Route::delete('/delete-category/{id}', [App\Http\Controllers\CategoryController::class, 'deleteCategory'])->name('delete-category.delete');
        // Search
        Route::get('/cat-search-url', [App\Http\Controllers\CategoryController::class, 'categorySearch'])->name('cat-search-url');


        // Product
        Route::get('/show-product', [App\Http\Controllers\ProductController::class, 'showProduct'])->name('show-product');
        Route::get('/create-product', [App\Http\Controllers\ProductController::class, 'createProduct'])->name('create-product');
        Route::post('/store-product', [App\Http\Controllers\ProductController::class,'storeProduct'])->name('store-product');
        Route::get('/edit-product/{prod_cat_id}', [App\Http\Controllers\ProductController::class, 'editProduct'])->name('edit-product.edit');
        Route::put('/update-product/{prod_cat_id}', [App\Http\Controllers\ProductController::class, 'updateProduct'])->name('update-product.update');
        Route::delete('/delete-product/{id}', [App\Http\Controllers\ProductController::class, 'deleteProduct'])->name('delete-product.delete');
        // Search
        Route::get('/product-search-url', [App\Http\Controllers\ProductController::class, 'productSearch'])->name('product-search-url');

        //Blog
        // Route::get('/show-encrypted-blog/{data}', [App\Http\Controllers\BlogController::class, 'showEncryptedBlog'])->name('show-encrypted-blog');

        Route::get('/show-blog', [App\Http\Controllers\BlogController::class, 'showBlog'])->name('show-blog');
        Route::get('/create-blog', [App\Http\Controllers\BlogController::class, 'createBlog'])->name('create-blog');
        Route::post('/store-blog', [App\Http\Controllers\BlogController::class,'storeBlog'])->name('store-blog');
        Route::get('/edit-blog/{blog_id}', [App\Http\Controllers\BlogController::class, 'editBlog'])->name('edit-blog.edit');
        Route::put('/update-blog/{blog_id}', [App\Http\Controllers\BlogController::class, 'updateBlog'])->name('update-blog.update');
        Route::delete('/delete-blog/{id}', [App\Http\Controllers\BlogController::class, 'deleteBlog'])->name('delete-blog.delete');
        // Search
        Route::get('/blog-search-url', [App\Http\Controllers\BlogController::class, 'blogSearch'])->name('blog-search-url');

        //FAQs
        Route::get('/show-faq', [App\Http\Controllers\FaqController::class, 'showFAQ'])->name('show-faq');
        Route::get('/create-faq', [App\Http\Controllers\FaqController::class, 'createFAQ'])->name('create-faq');
        Route::post('/store-faq', [App\Http\Controllers\FaqController::class,'storeFAQ'])->name('store-faq');
        Route::get('/edit-faq/{faqs_id}', [App\Http\Controllers\FaqController::class, 'editFAQ'])->name('edit-faq.edit');
        Route::put('/edit-faq/{faqs_id}', [App\Http\Controllers\FaqController::class, 'updateFAQ'])->name('edit-faq.update');
        Route::delete('/delete-faq/{id}', [App\Http\Controllers\FaqController::class, 'deleteFAQ'])->name('delete-faq.delete');
        // Search
        Route::get('/faq-search-url', [App\Http\Controllers\FaqController::class, 'faqSearch'])->name('faq-search-url');


        // trash routes
        Route::get('/trash-can', [App\Http\Controllers\TrashController::class, 'trashedCan'])->name('trash.softdeletes');


        // restore trash route
        //Category
        Route::get('/restore-category/{category_id}', [App\Http\Controllers\TrashController::class, 'restoreSoftDeleteCategory'])->name('restore-category');
        //Product
        Route::get('/restore-product/{product_id}', [App\Http\Controllers\TrashController::class, 'restoreSoftDeleteProduct'])->name('restore-product');
        //Blog
        Route::get('/restore-blog/{blog_id}', [App\Http\Controllers\TrashController::class, 'restoreSoftDeleteBlog'])->name('restore-blog');
        Route::get('/restore-video-blog/{video_blog_id}', [App\Http\Controllers\TrashController::class, 'restoreSoftDeleteVideoBlog'])->name('restore-video-blog');
        Route::get('/restore-status-blog/{status_blog_id}', [App\Http\Controllers\TrashController::class, 'restoreSoftDeleteStatusBlog'])->name('restore-status-blog');
        //Faq
        Route::get('/restore-faq/{faq_id}', [App\Http\Controllers\TrashController::class, 'restoreSoftDeleteFaq'])->name('restore-faq');


        // forcedelete route
        //Category
        Route::delete('/permanent-delete-category/{category_id}', [App\Http\Controllers\TrashController::class, 'forceDeleteCategory'])->name('permanent-delete-category');
        //Product
        Route::delete('/permanent-delete-product/{product_id}', [App\Http\Controllers\TrashController::class, 'forceDeleteProduct'])->name('permanent-delete-product');
        //Blog
        Route::delete('/permanent-delete-blog/{blog_id}', [App\Http\Controllers\TrashController::class, 'forceDeleteBlog'])->name('permanent-delete-blog');
        Route::delete('/permanent-delete-video-blog/{video_blog_id}', [App\Http\Controllers\TrashController::class, 'forceDeleteVideoBlog'])->name('permanent-delete-video-blog');
        Route::delete('/permanent-delete-status-blog/{status_blog_id}', [App\Http\Controllers\TrashController::class, 'forceDeleteStatusBlog'])->name('permanent-delete-status-blog');

        //Faq
        Route::delete('/permanent-delete-faq/{faq_id}', [App\Http\Controllers\TrashController::class, 'forceDeleteFaq'])->name('permanent-delete-faq');


        // restore all trash route
        Route::patch('/restore-all-soft-deletes', [App\Http\Controllers\TrashController::class, 'restoreAllSoftDeletes'])->name('restore-all-soft-deletes');
        Route::delete('/delete-all-soft-deletes', [App\Http\Controllers\TrashController::class, 'forceDeleteAllSoftDeletes'])->name('delete-all-soft-deletes');

        // notification routes
        Route::get('/show-notification', [App\Http\Controllers\NotificationController::class, 'showNotification'])->name('show-notification.index');
        Route::get('/read-message/{notification_id}', [App\Http\Controllers\NotificationController::class, 'markAsRead'])->name('read-message');

        // comments route
        // Route::get('/comment-approval', [App\Http\Controllers\CommentController::class, 'indexComment'])->name('comment-approval.index');
        // Route::put('/comment-approval/{comment}', [App\Http\Controllers\CommentController::class, 'updateComment'])->name('comment-approval.update');
        
        // video blog route
        Route::get('/create-video-blog', [App\Http\Controllers\VideoController::class, 'createVideoBlog'])->name('create-video-blog');
        Route::post('/store-video-blog', [App\Http\Controllers\VideoController::class,'storeVideoBlog'])->name('store-video-blog');
        Route::get('/show-video-blog', [App\Http\Controllers\VideoController::class, 'showVideoBlog'])->name('show-video-blog');
        Route::get('/edit-video-blog/{video_id}', [App\Http\Controllers\VideoController::class, 'editVideoBlog'])->name('edit-video-blog.edit');
        Route::put('/edit-video-blog/{video_id}', [App\Http\Controllers\VideoController::class, 'updateVideoBlog'])->name('edit-video-blog.update');
        Route::delete('/delete-video-blog/{id}', [App\Http\Controllers\VideoController::class, 'deleteVideoBlog'])->name('delete-video-blog.delete');
        // Video Search
        Route::get('/video-search-url', [App\Http\Controllers\VideoController::class, 'videoSearch'])->name('video-search-url');

        // blog status
        Route::get('/create-status-blog', [App\Http\Controllers\StatusController::class, 'createStatusBlog'])->name('create-status-blog');
        Route::post('/store-status-blog', [App\Http\Controllers\StatusController::class,'storeStatusBlog'])->name('store-status-blog');
        Route::get('/show-status-blog', [App\Http\Controllers\StatusController::class, 'showStatusBlog'])->name('show-status-blog');
        Route::get('/edit-status-blog/{status_id}', [App\Http\Controllers\StatusController::class, 'editStatusBlog'])->name('edit-status-blog.edit');
        Route::put('/edit-status-blog/{status_id}', [App\Http\Controllers\StatusController::class, 'updateStatusBlog'])->name('edit-status-blog.update');
        Route::delete('/delete-status-blog/{id}', [App\Http\Controllers\StatusController::class, 'deleteStatusBlog'])->name('delete-status-blog.delete');
        // Status
        Route::get('/status-search-url', [App\Http\Controllers\StatusController::class, 'statusSearch'])->name('status-search-url');

    });
});
