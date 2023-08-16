<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class ProductController extends Controller
{
    //====================Products Function Start Here============

    //Index Product

    public function createProduct(Request $request){
        $category_id = Category::all();
        return view('admin.create-product', compact('category_id'));
    }

    //Create Product
    public function storeProduct(Request $request){
        $fileNameToStore = 'noimage.jpg';
            
            // Handle File Upload
            if ($request->hasFile('prod_img')) {
                // Get filename with the extension
                $filenameWithExt = $request->file('prod_img')->getClientOriginalName();
                // Get just filename
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                // Get just ext
                $extension = $request->file('prod_img')->getClientOriginalExtension();
                // Filename to store
                $fileNameToStore= $filename.'_'.time().'.'.$extension;
                
                // Upload Image
                $path = $request->file('prod_img')->storeAs('public/upload_img/', $fileNameToStore);
            }
            $this->validate($request, [
                'prod_cat_id' => 'required',

                'prod_title' => ['required',
                    'max:30',
                    'min:3',
                    'unique:products,prod_title',
                ],
                'prod_description' => ['required',
                    'max:150',
                    'min:10',
                    'unique:products,prod_description',
                ], 
                'prod_img' => ['required',
                    'image',
                    'mimes:jpeg,png,jpg,HEIC',
                    'max:50048',
                ], 
        ]);

        $product = new Product([
            'prod_cat_id' => $request->get('prod_cat_id'),
            'prod_title' => $request->get('prod_title'),
            'prod_description' => $request->get('prod_description'),
            'prod_img' => $fileNameToStore,
        ]);
        $product->save();

        return redirect('/admin/create-product')->with('success', 'Product data successfully added');
    }

    //Show Product

    public function showProduct()
    {
        $category_data = Category::select(['id','cat_title'])->get();
        $product_data = Product::paginate(10);
        return view('admin.show-product', compact('product_data','category_data'));
    }

    //Edit Product

    public function editProduct($id){
        $product_id = Product::findOrFail($id); // find the category by ID
        $category_id = Category::all();
        return view('admin.edit-product', compact('product_id','category_id')); // return the edit view with the category data
    }
 
    //Update Product
    public function updateProduct(Request $request, $id)
    {

        $this->validate($request, [
            'prod_cat_id' => 'required',
            'prod_title' => "required|max:30|min:2|unique:products,prod_title,$id,id",
            'prod_description' =>"required|max:150|min:10|unique:products,prod_description,$id,id",
            'prod_img' => 'nullable|image|mimes:jpeg,png,jpg,HEIC|max:50048',
        ]);
        $product_id = Product::find($id);
        $product_id->prod_cat_id = $request->input('prod_cat_id');
        $product_id->prod_title = $request->input('prod_title');
        $product_id->prod_description = $request->input('prod_description');
          // Handle File Upload
        if($request->hasFile('prod_img')){
            // Get filename with the extension
            $filenameWithExt = $request->file('prod_img')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('prod_img')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('prod_img')->storeAs('public/upload_img/', $fileNameToStore);
            // Delete file if exists
            Storage::delete('public/upload_img/'.$product_id->prod_img);
        } 

        if($request->hasFile('prod_img')){
            $product_id->prod_img = $fileNameToStore;
        }
        $product_id->save();
       return redirect('/admin/show-product')->with('success', 'Product Updated');
    }

    //Delete Category
 
    public function deleteProduct($id)
    {
        $product_id = Product::find($id);
        $product_id->delete();
        return redirect('/admin/show-product')->with('success', 'Product Removed');
    }

    public function productSearch(Request $request)
    {
        $prod_search_output = "";
        $row_count = 1;
        $category_data = Category::select(['id','cat_title'])->get();
        $result = Product::where('prod_title', 'like', '%' . $request->search . '%')->orWhere('prod_description', 'like', '%' . $request->search . '%')->get();
        foreach ($result as $item) {
            $prod_search_output .= '
            <tr> 
                <td style="text-align:center">' . $row_count . '</td>';
    
            foreach ($category_data as $cat_item) {
                if ($cat_item->id == $item->prod_cat_id) {
                    $prod_search_output .= '
                    <td>' . $cat_item->cat_title . '</td>';
                }
            }
    
            $prod_search_output .= '
                <td>' . $item->prod_title . '</td>
                <td>' . $item->prod_description . '</td>
                <td style="text-align:center"><img src="' . asset('storage/upload_img/' . $item->prod_img) . '" width="50px" height="50px" alt="Image"></td>
                <td style="text-align:center"><a href="' . url('/admin/edit-product/' . $item->id) . '"><img src="' . asset('img/editfinal.png') . '" alt="Edit" style="max-height: 30px; max-width:30px;"></a></td>
                <td style="text-align:center">
                    <a href="' . route('admin.delete-product.delete', ['id' => $item->id]) . '" onclick="event.preventDefault();
                            if(confirm(\'Are you sure you want to delete this item?\')) {
                            document.getElementById(\'delete-form-' . $item->id . '\').submit();
                            }">
                        <img src="' . asset('img/delete.png') . '" alt="Delete" style="max-height: 30px; max-width:30px;">
                     </a>
    
                     <form id="delete-form-' . $item->id . '" action="' . route('admin.delete-product.delete', ['id' => $item->id]) . '" method="POST" style="display: none;">
                        ' . csrf_field() . '
                        ' . method_field('DELETE') . '
                     </form>
                </td>
            </tr>';
    
            $row_count++;
        }
        return response($prod_search_output);
    }
    

    //====================Products Function End Here==============
}
