<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
 
class CategoryController extends Controller
{
        // CATEGORY FUNCTIONS

        public function createCategory()
        {
            return view('admin.create-category');
        }

        public function storeCategory(Request $request)
        {
            $fileNameToStore = 'noimage.jpg';
            
            // Handle File Upload
            if ($request->hasFile('cat_img')) {
                // Get filename with the extension
                $filenameWithExt = $request->file('cat_img')->getClientOriginalName();
                // Get just filename
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                // Get just ext
                $extension = $request->file('cat_img')->getClientOriginalExtension();
                // Filename to store
                $fileNameToStore= $filename.'_'.time().'.'.$extension;
                
                // Upload Image
                $path = $request->file('cat_img')->storeAs('public/upload_img/', $fileNameToStore);
            }
         
            $this->validate($request, [
                'cat_title' => ['required',
                    'max:50',
                    'min:5',
                    'unique:categories,cat_title',
                    // "regex:/^(?=.*[A-Z])(?=.*[a-z])[a-zA-Z0-9.,&\\-():'\"']+$/",
                ],
                'cat_description' => ['required',
                    'max:500',
                    'min:20',
                    'unique:categories,cat_description',
                ],
                'cat_img' => ['required',
                    'image',
                    'mimes:jpeg,png,jpg,HEIC',
                    'max:50048',
                ],    
            ]);
            
        
            $category = new Category([
                'cat_title' => $request->get('cat_title'),
                'cat_description' => $request->get('cat_description'),
                'cat_img' => $fileNameToStore,
            ]);
            $category->save();
        
            return redirect('/admin/create-category')->with('success', 'Category data successfully added');
        }
        
        public function showCategory(Request $request)
        {
            $category_data = Category::paginate(10);
            return view('admin.show-category', compact('category_data'));
        }

        public function editCategory($id)
    {
        $category_id = Category::findOrFail($id);
        return view('admin.edit-category', compact('category_id'));
    }


        public function updateCategory(Request $request, $id)
        {
            $this->validate($request, [
                'cat_title' => "required|max:50|min:5|unique:categories,cat_title,$id,id",
                'cat_description' => "required|max:500|min:20|unique:categories,cat_description,$id,id",
                'cat_img' => "nullable|image|mimes:jpeg,png,jpg,HEIC|max:50048",   
            ]);
            $category_id = Category::find($id);
            $category_id->cat_title = $request->input('cat_title');
            $category_id->cat_description = $request->input('cat_description');
             // Handle File Upload
            if($request->hasFile('cat_img')){
                // Get filename with the extension
                $filenameWithExt = $request->file('cat_img')->getClientOriginalName();
                // Get just filename
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                // Get just ext
                $extension = $request->file('cat_img')->getClientOriginalExtension();
                // Filename to store
                $fileNameToStore= $filename.'_'.time().'.'.$extension;
                // Upload Image
                $path = $request->file('cat_img')->storeAs('public/upload_img/', $fileNameToStore);
                // Delete file if exists
                Storage::delete('public/upload_img/'.$category_id->cat_img);
            } 

            if($request->hasFile('cat_img')){
                $category_id->cat_img = $fileNameToStore;
            }
            $category_id->save();
           return redirect('/admin/show-category')->with('success', 'Category Updated');
        }

        public function deleteCategory( $id)
        {
            $category_id = Category::find($id);
            $category_id->delete();
            return redirect()->route('admin.show-category')->with('success', 'Category Removed');
        }

        // Search
        public function categorySearch(Request $request)
        {
            $cat_search_output =""; 
            $row_count = 1; 
            $result   = Category::where('cat_title','like','%'.$request->search.'%')->orWhere('cat_description','like','%'.$request->search.'%')->get();
            foreach($result as $item)
            {
                $cat_search_output .= '<tr>
                    <td style="text-align:center">'.$row_count.'</td>
                    <td>'.$item->cat_title.'</td>
                    <td>'.$item->cat_description.'</td>
                    <td style="text-align:center"><img src="'.asset('storage/upload_img/'.$item->cat_img).'" width="50px" height="50px" alt="Image"></td>
                    <td><a href="'.url('/admin/edit-category/'.$item->id).'"><img src="'.asset('img/editfinal.png').'" alt="Edit" style="max-height: 30px; max-width:30px;"></a></td>
                    <td>
                        <a href="'.route('admin.delete-category.delete', ['id' => $item->id]).'" onclick="event.preventDefault();
                        if(confirm(\'Are you sure you want to delete this item?\')) {
                            document.getElementById(\'delete-form-'.$item->id.'\').submit(); }">
                            <img src="'.asset('img/delete.png').'" alt="Delete" style="max-height: 30px; max-width:30px;">
                        </a>
                        <form id="delete-form-'.$item->id.'" action="'.route('admin.delete-category.delete', ['id' => $item->id]).'" method="POST" style="display: none;">
                            '.csrf_field().'
                            '.method_field('DELETE').'
                        </form>
                    </td>
                </tr>';
                $row_count++;
            }
            return response($cat_search_output);
        }
        
        
        

        // CATEGORY FUNCTION ENDS HERE.
}
