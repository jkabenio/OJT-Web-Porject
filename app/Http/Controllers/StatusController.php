<?php

namespace App\Http\Controllers;
use App\Models\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StatusController extends Controller
{
    public function createStatusBlog()
    {
        return view('admin.create-status-blog');
    }

    public function storeStatusBlog(Request $request)
    {
        $this->validate($request, [
            'status_description' => ['required',
            'max:2000',
            'min:20',
        ],
        ]);

        $status = new Status([
            'status_description' => $request->get('status_description'),

        ]);
        $status->user_id = auth()->user()->id;
        $status->save();

        return redirect('/admin/create-status-blog')->with('success', 'Status data successfully added');
    }
    public function showStatusBlog()
    {
        $status_data = Status::paginate(10);
        return view('admin.show-status-blog',compact('status_data'));
    }
    public function editStatusBlog($id)
    {
        $status_id = Status::findOrFail($id);
        return view('admin.edit-status-blog',compact('status_id'));
    }

    public function updateStatusBlog(Request $request, $id)
    {
        $this->validate($request, [
            'status_description' => ['required',
            'max:1000',
            'min:20',
        ],
        ]);

        $status_id = Status::find($id);
        $status_id->status_description = $request->input('status_description');
        $status_id->user_id = auth()->user()->id;
        $status_id->save();

        return redirect('/admin/show-status-blog')->with('success', 'Status data successfully updated');
    }
    public function deleteStatusBlog($id)
    {
        $status_id = Status::find($id);
        $status_id->delete();
        return redirect('/admin/show-status-blog')->with('success', 'Status Blog Removed');
    }

    //Status Search
    public function statusSearch(Request $request)
    {
        $blog_search_output_status = "";
        $row_count = 1;
        $result = Status::where('status_description', 'like', '%' . $request->search . '%')->get();
        foreach ($result as $item) {
            $blog_search_output_status .= '
            <tr>
                <td style="text-align:center">' . $row_count . '</td>
                <td>' . $item->status_description . '</td>
                <td style="text-align:center"><a href="' . url('/admin/edit-status-blog/' . $item->id) . '"><img src="' . asset('img/editfinal.png') . '" alt="Edit" style="max-height: 30px; max-width:30px;"></a></td>
                <td style="text-align:center">
                    <a href="' . route('admin.delete-status-blog.delete', ['id' => $item->id]) . '"
                        onclick="event.preventDefault();
                                 if(confirm(\'Are you sure you want to delete this item?\')) {
                                     document.getElementById(\'delete-form-' . $item->id . '\').submit();
                                 }">
                        <img src="' . asset('img/delete.png') . '" alt="Delete" style="max-height: 30px; max-width:30px;">
                     </a>
                     <form id="delete-form-' . $item->id . '" action="' . route('admin.delete-status-blog.delete', ['id' => $item->id]) . '" method="POST" style="display: none;">
                         ' . csrf_field() . '
                         ' . method_field('DELETE') . '
                     </form>
                </td>
            </tr>';
            $row_count++;
        }
    
        return response($blog_search_output_status);
    }
    
}
