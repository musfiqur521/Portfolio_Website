<?php

namespace App\Http\Controllers\Admin;

use App\Models\About;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $about = About::first();
        return view('admin.about.index', compact('about'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $request->validate([
            'title' => ['required', 'max:5000'],
            'description' => ['required', 'max:10000'],
            'image' => ['image', 'max:5000'],
            'resume' => ['mimes:pdf,csv,txt', 'max:10000'],
        ]);

        $about = About::first();
        $imagePath = handleupload('image', $about);
        $resumePath = handleupload('resume', $about);

        About::updateOrCreate(
            ['id' => $id],
            [
                'title' => $request->title,
                'description' => $request->description,
                'image' => (!empty($imagePath) ? $imagePath : $about->image),
                'resume' => (!empty($resumePath) ? $resumePath : $about->resume),
            ]
        );

        toastr()->success('About updated successfully');
        return redirect()->route('admin.about.index');
    }

    //Resume Download
    public function resumeDownload()
    {
        $about = About::first();
        return response()->download(public_path($about->resume));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
