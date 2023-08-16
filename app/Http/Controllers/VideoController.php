<?php

namespace App\Http\Controllers;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\facades\Auth;
use Illuminate\Support\Facades\Storage;
class VideoController extends Controller
{
 

    public function createVideoBlog()
    {
        return view('admin.create-video-blog');
    }
    public function storeVideoBlog(Request $request)
    {
        $fileNameToStore = 'novideo.mp4';
        // Validate the request data
        $validatedData = $request->validate([
            'video_title' => ['required',
                'max:100',
                'min:5',
            ],
            'video_description' => ['required',
                'max:2000',
                'min:20',
            ],
            'video_path' => ['required',
                'mimes:mp4,mov,avi',
                'max:500240',
            ], // Max 10MB file size
            // 'video_thumbnail_path' => 'nullable|mimes:jpeg,png|max:500240', 
        ]);
           
        // Handle File Upload
        if ($request->hasFile('video_path')) {
            // Get filename with the extension
            $filenameWithExt = $request->file('video_path')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('video_path')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            
            // Upload Video
            $videoPath = $request->file('video_path')->storeAs('public/upload_vid', $fileNameToStore);
        }
        // Store the video file in the storage
        // $videoPath = $request->file('video_path')->storeAs('public/upload_vid', $request->file('video_path')->getClientOriginalName());
        // Store the thumbnail file in the storage
        // $thumbnailPath = null;
        // if ($request->hasFile('video_thumbnail_path')) {
        //     $thumbnailPath = $request->file('video_thumbnail_path')->storeAs('public/upload_thumbnail', $request->file('video_thumbnail_path')->getClientOriginalName());
        // }

        // Create a new video record in the database
        $video = new Video([
            'video_title' => $validatedData['video_title'],
            'video_description' => $validatedData['video_description'],
            'video_path' => $fileNameToStore,
            // 'video_thumbnail_path' => $thumbnailPath,
            'user_id' => Auth::user()->id,
        ]);
        $video->save();

        // Redirect to the index page with success message
        return redirect()->route('admin.create-video-blog')->with('success', 'Video uploaded successfully.');
    }

    public function editVideoBlog($id)
    {
        $video_id = Video::findOrFail($id);
        return view('admin.edit-video-blog', compact('video_id'));
    }
    public function updateVideoBlog(Request $request, $id)
    {
        // Validate the request data
        $this->validate($request,[
            'video_title' => ['required',
                'max:100',
                'min:5',
            ],
            'video_description' => ['required',
                'max:2000',
                'min:20',
            ],
            'video_path' => ['nullable',
                'mimes:mp4,mov,avi',
                'max:500240',
            ],
            // 'video_thumbnail_path' => 'nullable|mimes:jpeg,png|max:500240',
        ]);
        // Find the video by ID
        $video = Video::find($id);
        // Update the video record in the database
        $video->video_title = $request->input('video_title');
        $video->video_description = $request->input('video_description');


        if($request->hasFile('video_path')){
            // Get filename with the extension
            $filenameWithExt = $request->file('video_path')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('video_path')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            // Upload Video
            $path = $request->file('video_path')->storeAs('public/upload_vid/', $fileNameToStore);
            // Delete file if exists
            Storage::delete('public/upload_vid/'.$video->video_path);
        } 

        if($request->hasFile('video_path')){
            $video->video_path = $fileNameToStore;
        }
        // Update the video file in the storage if a new file is provided
        // if ($request->hasFile('video_path')) {
        //     // Delete the old video file
        //     Storage::delete($video->video_path);

        //     // Store the new video file in the storage
        //     $videoPath = $request->file('video_path')->storeAs('public/upload_vid', $request->file('video_path')->getClientOriginalName());
        //     $video->video_path = $videoPath;
        // }

        // Update the thumbnail file in the storage if a new file is provided
        // if ($request->hasFile('video_thumbnail_path')) {
        //     // Delete the old thumbnail file
        //     Storage::delete($video->video_thumbnail_path);

        //     // Store the new thumbnail file in the storage
        //     $thumbnailPath = $request->file('video_thumbnail_path')->storeAs('public/upload_thumbnail', $request->file('video_thumbnail_path')->getClientOriginalName());
        //     $video->video_thumbnail_path = $thumbnailPath;
        // }

        $video->save();

        // Redirect to the show page with success message
        return redirect()->route('admin.show-video-blog', $video)->with('success', 'Video blog updated successfully.');
    }


    public function showVideoBlog()
    {

        $video_data = Video::paginate(10);
        return view('admin.show-video-blog', compact('video_data'));
    } 
    public function deleteVideoBlog($id)
    {
        $video_id = Video::find($id);
        $video_id->delete();
        return redirect('/admin/show-video-blog')->with('success', 'Video Blog Removed');
    }

    //Search Video
    public function videoSearch(Request $request)
    {
        $blog_search_output_video = "";
        $row_count = 1;
        $result = Video::where('video_title', 'like', '%' . $request->search . '%')->orWhere('video_description', 'like', '%' . $request->search . '%')->get();
        foreach ($result as $item) {
            $blog_search_output_video .= '
            <tr>
                <td style="text-align:center">' . $row_count . '</td>
                <td>' . $item->video_title . '</td>
                <td>' . $item->video_description . '</td>
                <td style="text-align:center">'.$item->video_path.'</td>
                <td style="text-align:center"><a href="' . url('/admin/edit-video-blog/' . $item->id) . '"><img src="' . asset('img/editfinal.png') . '" alt="Edit" style="max-height: 30px; max-width:30px;"></a></td>
                <td style="text-align:center">
                    <a href="' . route('admin.delete-video-blog.delete', ['id' => $item->id]) . '"
                        onclick="event.preventDefault();
                                 if(confirm(\'Are you sure you want to delete this video item?\')) {
                                     document.getElementById(\'delete-form-' . $item->id . '\').submit();
                                 }">
                        <img src="' . asset('img/delete.png') . '" alt="Delete" style="max-height: 30px; max-width:30px;">
                     </a>
                     <form id="delete-form-' . $item->id . '" action="' . route('admin.delete-video-blog.delete', ['id' => $item->id]) . '" method="POST" style="display: none;">
                         ' . csrf_field() . '
                         ' . method_field('DELETE') . '
                     </form>
                </td>
            </tr>';
            $row_count++;
        }
    
        return response($blog_search_output_video);
    }
}
