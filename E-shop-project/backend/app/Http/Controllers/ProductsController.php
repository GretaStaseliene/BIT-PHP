<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Categories;
use Exception;

class ProductsController extends Controller
{
    public function index() {
        $data = Products::with('categories')->get();

        return $data;
    }

    public function singleProduct($id) {
        try{
            return Products::with('categories')->find($id);
        } catch(Exception $e) {
            return response('Product was not found', 500);
        }
    }

    public function categoryProducts($id) {
        try {
            return Categories::with('products')->find($id);
        } catch(\Exception $e) {
            return response('Couldnt find products', 500);
        }
    }

    public function delete($id) {
        try{
            $data = Products::find($id);
            $data->categories()->detach();
            $data->delete();

            return 'Product deleted';
        } catch(Exception $e) {
            return response('Sorry, something went wrong.', 500);
        }
    }

    public function create(Request $request) {
        try {
            $data = new Products; 
                
            $data->name = $request->name;
            $data->sku = $request->sku;
            $data->photo = $request->photo;
            $data->warehouse_qty = $request->warehouse_qty;
            $data->price = $request->price;

            $data->save();

            $data->categories()->attach($request->categories);

            return 'Product successfully created';
        } catch(Exception $e) {
            return response('Product was not created', 500);
        }
    }

    public function update(Request $request, $id) {
        try {
            $data = Products::find($id);

            $data->name = $request->name;
            $data->sku = $request->sku;
            $data->photo = $request->photo;
            $data->warehouse_qty = $request->warehouse_qty;
            $data->price = $request->price;
    
            $data->save();

            $data->categories()->sync($request->categories);

            return response('Product successfully updated');
        } catch (Exception $e) {
            return response('Product was not updated', 500);
        }
    }

    public function search($keyword) {
        try {
            return Products::where('name', 'LIKE', '%' . $keyword . '%')->orWhere('sku', 'LIKE', $keyword)->get();
        } catch(Exception $e) {
            return response('Sorry, could not find product.', 500);
        }
    }

    public function order($field, $order) {
        try{
            return Products::with('categories')->orderBy($field, $order)->get();
        } catch(\Exception $e) {
            return response($e, 500);
        }
    }
}
