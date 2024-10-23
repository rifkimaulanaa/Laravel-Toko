<?php

namespace App\Http\Controllers;


//import Facades Storage
use Illuminate\Support\Facades\Storage;

//import model product
use App\Models\Konsumen; 

//import return type View
use Illuminate\View\View;

//import return type redirectResponse
use Illuminate\Http\RedirectResponse;

//import Http Request
use Illuminate\Http\Request;



class KonsumenController extends Controller
{
    /**
     * index
     *
     * @return void
     */
    public function index() : View
    {
        //get all konsumens
        $konsumens = Konsumen::latest()->paginate(10);

        //render view with konsumens
        return view('konsumens.index', compact('konsumens'));
    }

    /**
     * create
     *
     * @return View
     */
    public function create(): View
    {
        return view('konsumens.create');
    }

    /**
     * store
     *
     * @param  mixed $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        //validate form
        $request->validate([
            'name'          => 'required|min:5',
            'image'         => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'alamat'        => 'required|min:10',
            'jenis_kelamin' => 'required|min:4',
            'no_hp'         => 'required|numeric'
        ]);

        //upload image
        $image = $request->file('image');
        $image->storeAs('/konsumens', $image->hashName());

        //create product
        Konsumen::create([
            'name'              => $request->name,
            'image'             => $image->hashName(),
            'alamat'            => $request->alamat,
            'jenis_kelamin'     => $request->jenis_kelamin,
            'no_hp'             => $request->no_hp
        ]);

        //redirect to index
        return redirect()->route('konsumens.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

     /**
     * show
     *
     * @param  mixed $id
     * @return View
     */
    public function show(string $id): View
    {
        //get product by ID
        $konsumens = Konsumen::findOrFail($id);

        //render view with product
        return view('konsumens.show', compact('konsumens'));
    }
    /**
     * edit
     *
     * @param  mixed $id
     * @return View
     */
    public function edit(string $id): View
    {
        //get product by ID
        $konsumens = Konsumen::findOrFail($id);

        //render view with product
        return view('konsumens.edit', compact('konsumens'));
    }
        
    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $id
     * @return RedirectResponse
     */
    public function update(Request $request, $id): RedirectResponse
    {
        //validate form
        $request->validate([
            'name'          => 'required|min:5',
            'image'         => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'alamat'        => 'required|min:10',
            'jenis_kelamin' => 'required|min:4',
            'no_hp'         => 'required|numeric'
        ]);

        //get product by ID
        $konsumens = Konsumen::findOrFail($id);

        //check if image is uploaded
        if ($request->hasFile('image')) {

            //upload new image
            $image = $request->file('image');
            $image->storeAs('/konsumens', $image->hashName());

            //delete old image
            Storage::delete('/konsumens'.$konsumens->image);

            //update product with new image
            $konsumens->update([
                'name'              => $request->name,
                'image'             => $image->hashName(),
                'alamat'            => $request->alamat,
                'jenis_kelamin'     => $request->jenis_kelamin,
                'no_hp'             => $request->no_hp
            ]);

        } else {

            //update product without image
            $konsumens->update([
                'name'              => $request->name,
                'alamat'            => $request->alamat,
                'jenis_kelamin'     => $request->jenis_kelamin,
                'no_hp'             => $request->no_hp
            ]);
        }

        //redirect to index
        return redirect()->route('konsumens.index')->with(['success' => 'Data Berhasil Diubah!']);
    }
}