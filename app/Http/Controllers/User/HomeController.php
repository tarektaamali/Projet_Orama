<?php
namespace App\Http\Controllers\User;
use App\Model\Article;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function index()
    {
        $articles = Article::orderBy('created_at', 'desc')->limit(3)->get();
        //return $article;
        return view ('home',compact('articles'));
    }
}