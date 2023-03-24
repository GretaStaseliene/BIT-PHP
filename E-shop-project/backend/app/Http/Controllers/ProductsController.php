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

    public function delete($id) {
        try{
            Products::find($id)->delete();
            return response('Product deleted');
        } catch(Exception $e) {
            return response('Sorry, something went wrong.', 500);
        }
    }

    
}
