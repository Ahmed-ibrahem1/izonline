<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use App\Models\Program;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class AdminCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.category.index', [
            'categories' => Category::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create', [
            'categories' => Category::select(['id', 'title'])->get()->pluck('title', 'id'),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
     
     
     
    public function store(Request $request)
    {
        // return DB::transaction(function () use ($request) {
        //     /** @var Category $category */
        //     $category = Category::create($request->forStore());

        //     $category->addMediaFromRequest('icon')->toMediaCollection('icon');

        //     return redirect()->route('admin.categories.edit', $category)->with([
        //         'flash' => 'success',
        //         'message' => 'Created Category Successfully',
        //     ]);
        // });
        
        $request->validate([
            'title' => 'required',
            // 'title.*' => 'required',
            'icon' => 'required|image|mimes:png,jpg,jpeg',
            'parent_id' => 'nullable'
        ]);
        
        
        $photo = $request->icon;
        $folder = "storage/cats";
        // storeImages($photo,$folder){
        $file_extintion=$photo->getClientOriginalExtension();
        $file_name=time().random_int(5,30).'.'.$file_extintion;
        $path=$folder;
        $photo->move($path,$file_name);
        // return $file_name;
            
        // }

        // $imagePath = Storage::putFile("/categories",$request->icon);

        //dd($request->all());
        $title = $request->title;
        $category = Category::create([
            'title' => $title,
            'icon' => $file_name,
            'parent_id' => $request->parent_id
        ]);

        // $request->session()->flash('done','Done Adding Catigory');

        return redirect()->route('admin.categories.edit', $category)->with([
            'flash' => 'success',
            'message' => 'Created Category Successfully',
        ]);

        
    }
    
    
    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('admin.category.edit', [
            'category' => $category,
            'categories' => Category::select(['id', 'title'])->whereNotIn('id', $category->childrenIds(true))->get()->pluck('title', 'id'),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCategoryRequest  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        return DB::transaction(function () use ($request, $category) {
            // removes children from category, cuz it causes problems in update method
            $category->offsetUnset('children');
            $category->update($request->forUpdate());

            if ($request->has('icon'))
                $category->addMediaFromRequest('icon')->toMediaCollection('icon');

            return redirect()->route('admin.categories.edit', $category)->with([
                'flash' => 'success',
                'message' => 'Updated Category Successfully',
            ]);
        });
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        return DB::transaction(function () use ($category) {
            // make all child parent_ids null
            Category::where('parent_id', $category->id)
                ->update(['parent_id' => null]);

            // make all courses with category_id null
            Program::where('category_id', $category->id)
                ->update(['category_id' => null]);

            // delete current category (deletes media as well)
            $category->delete();

            return redirect()->route('admin.categories.index')->with([
                'flash' => 'success',
                'message' => 'Deleted Category Successfully',
            ]);
        });
    }
}
