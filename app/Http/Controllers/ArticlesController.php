<?php

namespace App\Http\Controllers;

use App\Models\Articles;
use App\Models\Categories;
use App\Models\Comments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ArticlesController extends Controller
{
    /**
     * Class constructor.
     */
    public function __construct()
    {
        $this->middleware('auth')->except('index');
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

    public function previewPost(Articles $article)
    {
        return view('articles.preview', compact('article'));
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
        abort_if($article->status == "Pending", 401);
        $related_articles = Articles::where([
            ['id', '<>', $article->id],
            ['category_id', '=', $article->category_id]
        ])
            ->inRandomOrder()
            ->take(2)
            ->get();
        return view('articles.show', compact("article", "related_articles"));
    }

    public function comment(Articles $article)
    {

        $validator = Validator::make(request()->all(), [
            'comment' => 'required',
        ], [
            "comment.required" => 'Comment cannot be empty',
        ]);

        if ($validator->fails()) {
            return back()->withMessage('Comment cannot be empty')->withType('danger');
        }

        Comments::create([
            'user_id' => auth()->id(),
            'post_id' => $article->id,
            'comment' => request()->comment
        ]);

        return back()->withMessage('Comment posted')->withType('success');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Articles  $articles
     * @return \Illuminate\Http\Response
     */
    public function edit(Articles $article)
    {
        if ($article->author_id == auth()->id()) {
            $categories = Categories::all();
            return view('articles.edit', compact("article", "categories"));
        }
        abort(401, "You do not have the priviledge to edit this post");
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Articles  $articles
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Articles $article)
    {
        $request->validate([
            'category_id' => 'required',
            'title' => 'required',
            'body' => 'required',
        ], [
            'required' => " A :attribute is needed for your post to be created",
            'title.unique' => "An article with this title has alredy been created, please use a different title for your article"
        ]);

        $slug = Str::slug($request->title, '-');

        $update = Articles::where('id', $article->id)->update([
            'slug' => $slug,
            'category_id' => $request->category_id,
            'title' => $request->title,
            'body' => $request->body
        ]);

        if ($update) {
            return redirect()->route('articles.show', $slug)->withMessage("Your post has been updated.")->withType("success");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Articles  $articles
     * @return \Illuminate\Http\Response
     */
    public function destroy(Articles $article)
    {
        if ($article->author_id == auth()->id()) {
            $query = Articles::destroy($article->id);
            if ($query) {
                return redirect()->route('settings')->withMessage("Article has been deleted.")->withType("success");
            }
        }
    }
}
