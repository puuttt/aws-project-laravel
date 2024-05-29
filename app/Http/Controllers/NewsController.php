<?php
  
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use App\Models\Article;
 
class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $article = Article::orderBy('created_at', 'DESC')->get();
  
        return view('articles.index', compact('article'));
    }
  
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('articles.create');
    }
  
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $article = new Article();
        $article->title = $request->title;
        $article->description = $request->description;
        $article->category = $request->category;
        $article->news_content = $request->news_content;
        if ($request->hasFile('img')) {
            $img = $request->file('img');
            $filename = date('Y-m-d') . '_' . $img->getClientOriginalName();
            $img->move(public_path('storage/images'), $filename);
            $article->img = $filename;
        }
        if ($request->hasFile('img2')) {
            $img2 = $request->file('img2');
            $filename = date('Y-m-d') . '_' . $img2->getClientOriginalName();
            $img2->move(public_path('storage/images'), $filename);
            $article->img2 = $filename;
        }
        if ($request->hasFile('img3')) {
            $img3 = $request->file('img3');
            $filename = date('Y-m-d') . '_' . $img3->getClientOriginalName();
            $img3->move(public_path('storage/images'), $filename);
            $article->img3 = $filename;
        }
        // Article::create($request->all());
        if (!$article->title || !$article->description || !$article->news_content || !$article->img || !$article->img2 || !$article->img3) {
            return redirect()->route('articles')->with('danger', 'Product added unsuccessfully');
        } else {
            $article->save();
            return redirect()->route('articles')->with('success', 'Product added successfully');
        }
    }
  
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $article = Article::findOrFail($id);
  
        return view('articles.show', compact('article'));
    }
  
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $article = Article::findOrFail($id);
  
        return view('articles.edit', compact('article'));
    }
  
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  string $id)
    {
        $article = Article::findOrFail($id);

        if ($request->file('img')) {
            $img = $request->file('img');
            $filename = date('Y-m-d') . '_' . $img->getClientOriginalName();
            $img->move(public_path('storage/images'), $filename);
            $article->img = $filename;
        } else {
            $filename = $request->img;
        }

        if ($request->file('img2')) {
            $img2 = $request->file('img2');
            $filename2 = date('Y-m-d') . '_' . $img2->getClientOriginalName();
            $img2->move(public_path('storage/images'), $filename2);
            $article->img2 = $filename2;
        } else {
            $filename2 = $request->img2;
        }

        if ($request->file('img3')) {
            $img3 = $request->file('img3');
            $filename3 = date('Y-m-d') . '_' . $img3->getClientOriginalName();
            $img3->move(public_path('storage/images'), $filename3);
            $article->img3 = $filename3;
        } else {
            $filename3 = $request->img3;
        }

        $fields = [
            'title' => $request->title,
            'description' => $request->description,
            'category' => $request->category,
            'news_content' => $request->news_content,
            'img' => $filename,
            'img2' => $filename2,
            'img3' => $filename3
        ];
        $article::where('id', $id)->update($fields);

        return redirect()->route('articles')->with('success', 'product updated successfully');
  
        // $article->update($request->all());
  
    }
  
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $article = Article::findOrFail($id);
  
        $article->delete();
  
        return redirect()->route('articles')->with('success', 'product deleted successfully');
    }
}