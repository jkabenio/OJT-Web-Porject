<?php

namespace App\Http\Controllers;

use App\Models\FAQs;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    // Create FAQs
    public function createFAQ(){

        return view('admin.create-faq');

    }

    public function storeFAQ(Request $request){
        $this->validate($request, [ 
            'questions' =>  ['required',
            'max:100',
            'min:5',
        ],
            'answers' =>  ['required',
            'max:2000',
            'min:20',
        ],
        ]);

        $faqs = new FAQs([
            'questions' => $request->get('questions'),
            'answers' => $request->get('answers'),
        ]);
        $faqs->save();

        return redirect('/admin/create-faq')->with('success', 'FAQs data successfully added');
    }

    // Show FAQs
    public function showFAQ()
    {
        $faqs_data = FAQs::paginate(10);
        return view('admin.show-faq', compact('faqs_data'));
    }
    //Edit FAQs
    public function editFAQ($id)
    {
        $faqs_id = FAQs::findOrFail($id); // find the blog by ID
        return view('admin.edit-faq', compact('faqs_id')); // return the edit view with the blog data
    }

    //Update FAQs
    public function updateFAQ(Request $request, $id)
    {

        $this->validate($request, [
            'questions' => 'required|max:255',
            'answers' => 'required'
            // 'blog_img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
        $faqs_id = FAQs::find($id);
        $faqs_id->questions = $request->input('questions');
        $faqs_id->answers = $request->input('answers');
        $faqs_id->save();
       return redirect('/admin/show-faq')->with('success', 'FAQs Updated');
    }

    //Delete Blog
    public function deleteFAQ( $id)
    {
        $faqs_id = FAQs::find($id);
        $faqs_id->delete();
        return redirect('/admin/show-faq')->with('success', 'FAQs Removed');
    }

    // Search
    public function faqSearch(Request $request)
    {
        $faq_search_output ="";
        $row_count = 1;
        $result   = FAQs::where('questions','like','%'.$request->search.'%')->orwhere('answers','like','%'.$request->search.'%')->get();
        foreach($result as $item)
        {
            $faq_search_output.='
            <tr>
                <td style="text-align:center">'.$row_count.'</td>
                <td>'.$item->questions.'</td>
                <td>'.$item->answers.'</td>
                <td style="text-align:center">'.'<a href="'.url ('/admin/edit-faq/'.$item->id).'">Edit'.'</a></td>
                <td style="text-align:center">'.'<a onclick="document.getElementById('.($item->id).').style.display='."'block'".'" >Delete</a>'.'</td>
                </td>
            </tr>
            <div id="{{$item->id}}" class="w3-modal" >
                <div class="w3-modal-content" style="width:50%;">

                    <header class="">
                        <span onclick="document.getElementById('.($item->id).').style.display='."'none'".'"
                        class=" w3-display-topright" style="padding: 10px;cursor: pointer;"><b>&times;</b></span>
                        <h2 style="color: white;background-color: rgb(212, 3, 3);text-align:center"><b>WARNING!</b></h2>
                    </header>
                    <div class="warning-body">
                        <div style="background-color: #e0e0e0; margin:20px">
                            <h3 style="padding: 10px" align="center"><b>Are you sure you want to delete this category?</b></h3>
                            <h5 align="center">{{$item->cat_title}}</h5>
                            <figure>
                                <figcaption align="center">
                                    {{$item->answers}}<br>
                                    <p style="color:rgb(90, 90, 90);font-size: 13px">Created At: {{$item->created_at}}<br>
                                    Updated At: {{$item->updated_at}}</p>
                                </figcaption>
                            </figure>

                        </div>
                    </div>
                    <footer>
                        <p class="button_option">
                            <b>
                            <a class="temporary" href="'.url('/admin/delete-course/'.$item->id).'" >Temporarily!</a>
                            <a class="permanent" href="'.url('/admin/permanent-delete-course/'.$item->id).'" >Permanently!</a>
                            <a class="no" onclick="document.getElementById('.($item->id).').style.display"="none">NO!</a>
                            </b>
                        </p>
                    </footer>
                </div>
            </div>';
        $row_count++;
        }

        return response($faq_search_output);
    }
}
