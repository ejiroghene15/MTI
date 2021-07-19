<?php

namespace App\Http\Controllers;

use App\Models\Articles;
use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ArticlesController extends Controller
{

    /**
     * Class constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function imageUpload(Request $request)
    {
        $save_to_cloudinary = $request->upload->storeOnCloudinary('articles');
        $upload_path = $save_to_cloudinary->getSecurePath();
        return response()->json([
            'uploaded' => true,
            "url" => $upload_path,
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('articles.index')->withArticles(Articles::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Categories::all();
        return view('articles.create')->withCategories($categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $article = $request->validate([
            'category_id' => 'required',
            'title' => 'required|unique:articles',
            'body' => 'required',
            'thumbnail' => 'required|image'
        ], [
            'required' => " A :attribute is needed for your post to be created",
            'title.unique' => "An article with this title has alredy been created, please use a different title for your article"
        ]);

        $article['author_id'] = auth()->id();
        $article['slug'] = Str::slug($request->title, '-');
        $thumbnail = $request->thumbnail->storeOnCloudinaryAs('thumbnail', $article['slug']);
        $article['thumbnail'] = $thumbnail->getSecurePath();

        Articles::create($article);
        return back()->withMessage("Your post has been created and is pending approval from an admin. You'll be notified once it's published")->withType("success");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Articles  $articles
     * @return \Illuminate\Http\Response
     */
    public function show(Articles $article)
    {
        return view('articles.show', compact("article"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Articles  $articles
     * @return \Illuminate\Http\Response
     */
    public function edit(Articles $article)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Articles  $articles
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Articles $articles)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Articles  $articles
     * @return \Illuminate\Http\Response
     */
    public function destroy(Articles $article)
    {
        //
    }
}
