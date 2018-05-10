<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Article;

class ArticleController extends Controller
{



    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()

    {
        $articles=Article::all();
        return view ('admin.Blog.show',compact('articles'));


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('admin\Blog\post');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'title' => 'required',
            'subtitle' => 'required',
           'body' => 'required',
            'image'=>'required',


        ]);
        if($request->hasFile('image')){
        $imageName= $request->image->store('public/blogimage');
        $file_name = $request->file('image')->hashName();

        // save new image $file_name to database
        // $article->update(['image' => $file_name]);
    } else{
        return 'No';
    }


        $article = new Article;
        $article->image=$file_name;
        $article->title= $request->title;
        $article->subtitle= $request->subtitle;
        $article->post= $request->body;
        $article->save();
      return    redirect(route('articles.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article = Article::where('id',$id)->first();
        /*
                $service = Service::where('id',$id)->get();
        the result object inside table
       [{"id":1,"titre":"lllz","description":"zjjzjz","user_id":null,"created_at":"2018-03-11 20:23:19","updated_at":"2018-03-11 20:23:19"}]


        $service = Service::where('id',$id)->first();
     the result is object
        {"id":1,"titre":"lllz","description":"zjjzjz","user_id":null,"created_at":"2018-03-11 20:23:19","updated_at":"2018-03-11 20:23:19"}

        */
        return view ('admin.Blog.update',compact('article'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        request()->validate([

            'title' => 'required',
            'subtitle' => 'required',
            'body' => 'required',
            'image'=>'required',


        ]);
        if($request->hasFile('image')){
          $imageName= $request->image->store('public/blogimage');

        }

        //     return $request->all()
        $article  = Article::find($id);
        $article->title= $request->title;
        $article->image= $imageName;
        $article->subtitle= $request->subtitle;
        $article->post= $request->body;
        $article->save();
      return  redirect(route('articles.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        article::where ('id',$id)->delete();
        return redirect() ->back();
    }
}
