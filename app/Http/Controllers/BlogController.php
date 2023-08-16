<?php

namespace App\Http\Controllers;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class BlogController extends Controller
{
      //Create Blog===========================================
    public function createBlog()
    {
        return view('admin.create-blog');
    }

    public function storeBlog(Request $request)
    { 
        $fileNameToStore = 'noimage.jpg';
            
        // Handle File Upload
        if ($request->hasFile('blog_img')) {
            // Get filename with the extension
            $filenameWithExt = $request->file('blog_img')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('blog_img')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            
            // Upload Image
            $path = $request->file('blog_img')->storeAs('public/upload_img/', $fileNameToStore);
        }
        $this->validate($request, [
            'blog_title' => ['required',
                'max:50',
                'min:5',
            ],
            'blog_desc' => ['required',
                'max:500',
                'min:20',
            ],
            'blog_img' =>  ['required',
                'image',
                'mimes:jpeg,png,jpg,HEIC',
                'max:50048',
            ], 
        ]);

        $blog = new Blog([
            
            'blog_title' => $request->get('blog_title'),
            'blog_desc' => $request->get('blog_desc'),
            'blog_img' => $fileNameToStore,
        ]);
        $blog->user_id = auth()->user()->id;
        $blog->save();

        return redirect('/admin/create-blog')->with('success', 'Blog data successfully added');
    }

    public function showBlog()
    {
        $blog_data = Blog::paginate(10);
        return view('admin.show-blog', compact('blog_data'));
    }

    //Edit Blog
    public function editBlog($id)
    {
        $blog_id = Blog::findOrFail($id); // find the blog by ID
        return view('admin.edit-blog', compact('blog_id')); // return the edit view with the blog data
    }

     //Update Blog
     public function updateBlog(Request $request, $id)
     {

         $this->validate($request, [
            'blog_title' => ['required',
                'max:50',
                'min:5',
            ],
            'blog_desc' => ['required',
                'max:2000',
                'min:20',
            ],
            'blog_img' =>  ['nullable',
                'image',
                'mimes:jpeg,png,jpg,HEIC',
                'max:50048',
            ], 
         ]);
         $blog_id = Blog::find($id);
         $blog_id->blog_title = $request->input('blog_title');
         $blog_id->blog_desc = $request->input('blog_desc');
           // Handle File Upload
        if($request->hasFile('blog_img')){
            // Get filename with the extension
            $filenameWithExt = $request->file('blog_img')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('blog_img')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('blog_img')->storeAs('public/upload_img/', $fileNameToStore);
            // Delete file if exists
            Storage::delete('public/upload_img/'.$blog_id->blog_img);
        } 

        if($request->hasFile('blog_img')){
            $blog_id->blog_img = $fileNameToStore;
        }
         $blog_id->save();
        return redirect('/admin/show-blog')->with('success', 'Blog Updated');
     }

    //Delete Blog
    public function deleteBlog( $id)
    {
        $blog_id = Blog::find($id);
        $blog_id->delete();
        return redirect('/admin/show-blog')->with('success', 'Blog Removed');
    }

    public function blogSearch(Request $request)
{       
    $blog_search_output = "";
    $row_count = 1;
    $result = Blog::where('blog_title', 'like', '%' . $request->search . '%')->orWhere('blog_desc', 'like', '%' . $request->search . '%')->get();
    foreach ($result as $item) {
        $blog_search_output .= '<tr> 
                <td style="text-align:center">' . $row_count . '</td>
                <td>' . $item->blog_title . '</td>
                <td>' . $item->blog_desc . '</td>
                <td style="text-align:center"><img src="' . asset('storage/upload_img/' . $item->blog_img) . '" width="50px" height="50px" alt="Image"></td>
                <td style="text-align:center"><a href="' . url('/admin/edit-blog/' . $item->id) . '"><img src="' . asset('img/editfinal.png') . '" alt="Edit" style="max-height: 30px; max-width:30px;"></a></td>
                <td style="text-align:center">
                    <a href="' . route('admin.delete-blog.delete', ['id' => $item->id]) . '"
                        onclick="event.preventDefault();
                            if(confirm(\'Are you sure you want to delete this item?\')) {
                                document.getElementById(\'delete-form-' . $item->id . '\').submit();
                            }">
                        <img src="' . asset('img/delete.png') . '" alt="Delete" style="max-height: 30px; max-width:30px;">
                    </a>

                    <form id="delete-form-' . $item->id . '" action="' . route('admin.delete-blog.delete', ['id' => $item->id]) . '" method="POST" style="display: none;">
                        ' . csrf_field() . '
                        ' . method_field('DELETE') . '
                    </form>
                </td>
            </tr>';
        $row_count++;
    }  

    return response($blog_search_output);
}

}
