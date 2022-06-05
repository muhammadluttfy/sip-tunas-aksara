<?php

namespace App\Http\Controllers\Administrator;

use App\Models\Letter;
use Illuminate\Http\Request;
use App\Models\LetterCategory;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class IncomingLetterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('administrator.incoming-letter.index', [
            'title' => 'Surat Masuk - Manajemen Surat',
            'letters' => Letter::where('tipe_surat', 'Surat Masuk')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('administrator.incoming-letter.create', [
            'title' => 'Tambah Surat Masuk - Manajemen Surat',
            'letters' => Letter::all(),
            'categories' => LetterCategory::all(),
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
            'asal_surat' => ['required', 'string'],
            'no_surat' => ['required', 'string'],
            'perihal' => ['required', 'string'],
            'tujuan' => ['required', 'string'],
            'tanggal_surat' => ['required', 'date'],
            'jenis_surat' => ['required', 'string'],
            'keterangan' => ['required', 'string'],
            'image' => ['image', 'mimes:jpeg,png,jpg|max:2048'],
        ]);

        if ($request->file('image')) {
            Letter::create([
                'tipe_surat' => 'Surat Masuk',
                'letter_category_id' => $request->jenis_surat,
                'user_id' => auth()->user()->id,
                'slug' => str_slug($request->perihal),

                'asal_surat' => $request->asal_surat,
                'no_surat' => $request->no_surat,
                'perihal' => $request->perihal,
                'tujuan' => $request->tujuan,
                'tanggal_surat' => $request->tanggal_surat,
                'keterangan' => $request->keterangan,
                'image' => $request->file('image')->store('letter-images'),
            ]);
        } else {
            Letter::create([
                'tipe_surat' => 'Surat Masuk',
                'letter_category_id' => $request->jenis_surat,
                'user_id' => auth()->user()->id,
                'slug' => str_slug($request->perihal),

                'asal_surat' => $request->asal_surat,
                'no_surat' => $request->no_surat,
                'perihal' => $request->perihal,
                'tujuan' => $request->tujuan,
                'tanggal_surat' => $request->tanggal_surat,
                'keterangan' => $request->keterangan,
            ]);
        }

        return redirect()->route('incoming.index')->with('success', 'Surat Masuk berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('administrator.incoming-letter.show', [
            'title' => 'Detail Surat Masuk - Manajemen Surat',
            'letter' => Letter::findOrFail($id),
            'categories' => LetterCategory::all(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('administrator.incoming-letter.edit', [
            'title' => 'Ubah Surat Masuk - Manajemen Surat',
            'letter' => Letter::findOrFail($id),
            'categories' => LetterCategory::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Letter $letter)
    {
        $request->validate([
            'asal_surat' => ['required', 'string'],
            'no_surat' => ['required', 'string'],
            'perihal' => ['required', 'string'],
            'tujuan' => ['required', 'string'],
            'tanggal_surat' => ['required', 'date'],
            'jenis_surat' => ['required', 'string'],
            'keterangan' => ['required', 'string'],
            'image' => ['image', 'mimes:jpeg,png,jpg|max:2048'],
        ]);

        // dd($request->all());

        if ($request->no_surat != $letter->no_surat) {
            $validatedData['no_surat'] = 'required|max:255|unique:posts';
        }

        if ($request->file('image')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }

            Letter::where('id', $letter->id)->update([
                'tipe_surat' => 'Surat Masuk',
                'letter_category_id' => $request->jenis_surat,
                'user_id' => auth()->user()->id,
                'slug' => str_slug($request->perihal),

                'asal_surat' => $request->asal_surat,
                'no_surat' => $request->no_surat,
                'perihal' => $request->perihal,
                'tujuan' => $request->tujuan,
                'tanggal_surat' => $request->tanggal_surat,
                'keterangan' => $request->keterangan,
                'image' => $request->file('image')->store('letter-images'),
            ]);
        } else {

            Letter::where('id', $letter->id)->update([
                'tipe_surat' => 'Surat Masuk',
                'letter_category_id' => $request->jenis_surat,
                'user_id' => auth()->user()->id,
                'slug' => str_slug($request->perihal),

                'asal_surat' => $request->asal_surat,
                'no_surat' => $request->no_surat,
                'perihal' => $request->perihal,
                'tujuan' => $request->tujuan,
                'tanggal_surat' => $request->tanggal_surat,
                'keterangan' => $request->keterangan,
            ]);
        }

        return redirect()->route('incoming.index')->with('success', 'Surat Masuk berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Letter::find($id);
        $data->delete();
        return redirect()->route('incoming.index')->with('success', 'Surat berhasil dihapus!');
    }
}
