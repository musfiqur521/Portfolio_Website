<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\PortfolioItem;
use App\Http\Controllers\Controller;
use App\DataTables\PortfolioItemDataTable;

class PortfolioItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(PortfolioItemDataTable $dataTable)
    {
        return $dataTable->render('admin.portfolio-item.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.portfolio-item.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => ['required', 'image', 'max:5000'],
            'title' => ['required', 'max:255'],
            'description' => ['required'],
            'category_id' => ['required', 'numeric'],
            'client' => ['max:255'],
            'website' => ['url'],

        ]);

        $imagepath = handleUpload('image');

        $portfolioItem = new PortfolioItem();
        $portfolioItem->image = $imagepath;
        $portfolioItem->title = $request->title;
        $portfolioItem->description = $request->description;
        $portfolioItem->category_id = $request->category_id;
        $portfolioItem->client = $request->client;
        $portfolioItem->website = $request->website;
        $portfolioItem->save();

        toastr()->success('Portfolio item created successfully');

        return redirect()->route('admin.portfolio-item.index');
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
        $portfolioItem = PortfolioItem::findOrFail($id);
        $categories = Category::all();
        return view('admin.portfolio-item.edit', compact('portfolioItem', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'image' => ['image', 'max:5000'],
            'title' => ['required', 'max:255'],
            'description' => ['required'],
            'category_id' => ['required', 'numeric'],
            'client' => ['max:255'],
            'website' => ['url'],

        ]);

        $portfolioItem = PortfolioItem::findOrFail($id);
        $imagepath = handleUpload('image', $portfolioItem);


        $portfolioItem->image = (!empty($imagepath) ? $imagepath : $portfolioItem->image);
        $portfolioItem->title = $request->title;
        $portfolioItem->description = $request->description;
        $portfolioItem->category_id = $request->category_id;
        $portfolioItem->client = $request->client;
        $portfolioItem->website = $request->website;
        $portfolioItem->save();

        toastr()->success('Portfolio item Update successfully');

        return redirect()->route('admin.portfolio-item.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $portfolioItem = PortfolioItem::findOrFail($id);
        deleteFileIfExist($portfolioItem->image);
        $portfolioItem->delete();
    }
}
