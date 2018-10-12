<?php

namespace App\Http\Controllers\User;
use App\Model\Article;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{
    public function index()
    {
        $recentarticles = Article::orderBy('created_at', 'desc')->limit(3)->get();
        //return $article;
       return  $recentarticles;
    }
    public function post(Article $article =null)

    {
        if($article == null ) {
            $article = Article::orderBy('id', 'DESC')->first();

        }
     $recentarticles = $this->index();
   return view ('user.Blog.post',compact('article','recentarticles'));


    }
}
