<?php

namespace App\Http\Controllers\Administrator;

use App\Models\PostCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('administrator.category.index', [
            'title' => 'Semua Kategori',
            'categories' => PostCategory::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('administrator.category.create', [
            'title' => 'Tambah Kategori',
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
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
        ]);

        $validatedData['slug'] = str_slug($request->nama);

        PostCategory::create($validatedData);
        return redirect()->route('categories.index')->with('success', 'Kategori berhasil ditambahkan!');
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
        return view('administrator.category.edit', [
            'title' => 'Edit Kategori',
            'category' => PostCategory::findOrFail($id)
        ]);
        return "berhasil";
        // return redirect()->route('categories.index')->with('success', 'Kategori berhasil diubah!');
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
        $request->validate([
            'nama' => 'required|string|max:255',
        ]);
        PostCategory::where('id', $id)->update([
            'nama' => $request->nama,
            'slug' => str_slug($request->nama)
        ]);

        return redirect()->route('categories.index')->with('success', 'Kategori berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = PostCategory::find($id);
        $data->delete();
        return redirect()->route('categories.index')->with('success', 'Kategori berhasil dihapus!');
    }
}