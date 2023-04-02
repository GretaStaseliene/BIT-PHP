<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categories;

class CategoriesController extends Controller
{
    public function index() {
        try {
            return Categories::all();
        } catch(\Exception $e) {
            return response('Couldnt get categories list', 500);
        }
    }

    public function singleCategory($id) {
        try{
            return Categories::find($id);
        } catch(\Exception $e) {
            return response('Category was not found', 500);
        }
    }

    public function create(Request $request) {
        try{
            $data = new Categories();

            $data->name = $request->name;
            $data->save();

            return 'Category successfully created';
        } catch(\Exception $e) {
            return response('Category was not created', 500);
        }
    }

    public function delete($id) {
        try{
            Categories::find($id)->delete();
            return 'Category deleted';
        } catch(\Exception $e) {
            return response('Sorry, something went wrong.', 500);
        }
    }

    public function update(Request $request, $id) {
        try {
            $data = Categories::find($id);

            $data->name = $request->name;
          
    
            $data->save();

            return response('Product successfully updated');
        } catch (\Exception $e) {
            return response('Product was not updated', 500);
        }
    }
}
