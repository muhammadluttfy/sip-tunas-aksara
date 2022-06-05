<?php

namespace App\Http\Controllers\Administrator;

use Illuminate\Http\Request;
use App\Models\LetterCategory;
use App\Http\Controllers\Controller;

class LetterCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('administrator.letter-category.index', [
            'title' => 'Kategori Surat - Manajemen Surat',
            'letter_categories' => LetterCategory::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('administrator.letter-category.create', [
            'title' => 'Tambah Kategori Surat - Manajemen Surat',
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
            'nama' => 'required|string|max:255|unique:letter_categories,nama',
        ]);

        $validatedData['slug'] = str_slug($request->nama);

        LetterCategory::create($validatedData);
        return redirect()->route('letters.index')->with('success', 'Kategori berhasil ditambahkan!');
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
        return view('administrator.letter-category.edit', [
            'title' => 'Edit Kategori Surat - Manajemen Surat',
            'letter_category' => LetterCategory::findOrFail($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, LetterCategory $letter_category)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
        ]);
        if ($request->nama != $letter_category->nama) {
            $request->validate([
                'nama' => 'required|string|max:255|unique:letter_categories,nama',
            ]);
        }

        LetterCategory::where('id', $id)->update([
            'nama' => $request->nama,
            'slug' => str_slug($request->nama)
        ]);

        return redirect()->route('letters.index')->with('success', 'Kategori berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = LetterCategory::find($id);
        $data->delete();
        return redirect()->route('letters.index')->with('success', 'Kategori berhasil dihapus!');
    }
}
