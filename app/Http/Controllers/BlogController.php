<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Blog;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Validator;
use Response;
use Illuminate\Support\Facades\Input;
use Image;

class BlogController extends Controller
{
    public function index(Request $request){
        
            if (Auth::check()) {
                $search = $request->get('search');
                $blogs = Blog::where('title','like','%'.$search.'%')->orderBy('id')->paginate(3);
                //new commit//
                return view('blog.index',['blogs' => $blogs]);
            }
            else{
                return redirect()->route('login');
            }
    }

    // edit data function
    public function editItem(Request $req) {
        $blog = Blog::find ($req->id);
        $blog->title = $req->title;
        $blog->description = $req->description;
        $blog->save();
        return response()->json($blog);
    }

    // add data into database
    public function addItem(Request $req) {
        $rules = array(
            'title' => 'required',
            'description' => 'required'
        );
        // for Validator
        $validator = Validator::make ( Input::all (), $rules );
        if ($validator->fails())
            return Response::json(array('errors' => $validator->getMessageBag()->toArray()));

        else {

            $blog = new Blog();
            $blog->title = $req->title;
            $blog->description = $req->description;
            $blog->save();

            return response()->json($blog);
        }
    }
    // delete item
    public function deleteItem(Request $req) {
        Blog::find($req->id)->delete();
        return response()->json();
    }
    public function proba(){
    }
}
