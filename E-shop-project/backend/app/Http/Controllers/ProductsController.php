<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use Exception;

class ProductsController extends Controller
{
    public function index() {
        $data = Products::all();

        return $data;
    }

    public function singleProduct($id) {
        try{
            return Products::find($id);
        } catch(Exception $e) {
            return response('Product was not found', 500);
        }
    }

    public function delete($id) {
        try{
            Products::find($id)->delete();
            return response('Product deleted');
        } catch(Exception $e) {
            return response('Sorry, something went wrong.', 500);
        }
    }

    public function create(Request $request) {
        try {
            $product = new Products; 
                
            $product->name = $request->name;
            $product->sku = $request->sku;
            $product->photo = $request->photo;
            $product->warehouse_qty = $request->warehouse_qty;
            $product->price = $request->price;

            $product->save();

            return response('Product successfully created');
        } catch(Exception $e) {
            return response('Product was not created', 500);
        }
    }

    public function update(Request $request, $id) {
        try {
            $product = Products::find($id);

            $product->name = $request->name;
            $product->sku = $request->sku;
            $product->photo = $request->photo;
            $product->warehouse_qty = $request->warehouse_qty;
            $product->price = $request->price;
    
            $product->save();

            return response('Product successfully updated');
        } catch (Exception $e) {
            return response('Sorry, product cant be updated', 500);
        }
    }

    public function search($keyword) {
        try {
            return Products::where('name', 'LIKE', '%' . $keyword . '%')->orWhere('sku', 'LIKE', $keyword)->get();
        } catch(Exception $e) {
            return response('Sorry, could not find product.', 500);
        }
    }
}
