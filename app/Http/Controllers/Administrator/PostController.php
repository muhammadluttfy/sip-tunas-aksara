<?php

namespace App\Http\Controllers\Administrator;

use App\Models\Post;
use App\Models\Comment;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('administrator.post.index', [
            'title' => 'Semua Postingan',
            // all posts order by desc
            'posts' => Post::orderBy('created_at', 'desc')->get(),
            // 'posts' => Post::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('administrator.post.create', [
            'title' => 'Tambah Postingan',
            'categories' => Category::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|max:255|unique:posts',
            'kategori' => 'required',
            'konten' => 'required',
            'kategori' => 'required',
        ]);

        if ($request->file('image')) {
            Post::create([
                'user_id' => auth()->user()->id,
                'category_id' => $request->kategori,

                'judul' => $request->judul,
                'slug' => str_slug($request->judul),
                'image' => $request->file('image')->store('post-images'),
                'konten' => $request->konten,
                'kutipan' => Str::limit(strip_tags($request->konten), 90, '...'),
            ]);
        } else {
            Post::create([
                'user_id' => auth()->user()->id,
                'category_id' => $request->kategori,

                'judul' => $request->judul,
                'slug' => str_slug($request->judul),
                'konten' => $request->konten,
                'kutipan' => Str::limit(strip_tags($request->konten), 90, '...'),
            ]);
        }

        return redirect()->route('posts.index')->with('success', 'Postingan berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('administrator.post.show', [
            'title' => 'Detail Postingan',
            'post' => $post,
            'comments' => Comment::latest()->where('post_id', $post->id)->get(),
            'count_comments' => Comment::where('post_id', $post->id)->count(),
        ]);
    }


    // ======== COMMENT FUNCTION =========
    public function comment(Request $request, $id)
    {
        $request->validate([
            'komentar' => 'required',
        ]);
        $post_id = Post::find($id);

        $comment = new Comment;

        if (Str::length(Auth::guard('student')->user()) > 0) {
            $comment->student_id = auth()->user()->id;
        } elseif (Str::length(Auth::guard('user')->user()) > 0) {
            $comment->user_id = auth()->user()->id;
        }

        $comment->post_id = $post_id->id;
        $comment->komentar = $request->komentar;
        $comment->save();

        // return redirect()->route('posts.show', $post_id->id)->with('success', 'Komentar berhasil ditambahkan!');
        return redirect()->back()->with('success', 'Komentar berhasil ditambahkan!');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('administrator.post.edit', [
            'title' => 'Edit Postingan',
            'post' => Post::findOrFail($id),
            'categories' => Category::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $validatedData = $request->validate([

            'kategori' => 'required',
            'konten' => 'required',
            'kategori' => 'required',
        ]);

        if ($request->judul != $post->judul) {
            $validatedData['judul'] = 'required|max:255|unique:posts';
        }

        if ($request->file('image')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }

            Post::where('id', $post->id)->update([
                'user_id' => auth()->user()->id,
                'category_id' => $request->kategori,

                'judul' => $request->judul,
                'slug' => str_slug($request->judul),
                'image' => $request->file('image')->store('post-images'),
                'konten' => $request->konten,
                'kutipan' => Str::limit(strip_tags($request->konten), 90, '...'),
            ]);
        } else {
            Post::where('id', $post->id)->update([
                'user_id' => auth()->user()->id,
                'category_id' => $request->kategori,

                'judul' => $request->judul,
                'slug' => str_slug($request->judul),
                'konten' => $request->konten,
                'kutipan' => Str::limit(strip_tags($request->konten), 90, '...'),
            ]);
        }

        return redirect()->route('posts.index')->with('success', 'Postingan berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Post::find($id);
        $data->delete();
        return redirect()->route('posts.index')->with('success', 'Postingan berhasil dihapus!');
    }
}
