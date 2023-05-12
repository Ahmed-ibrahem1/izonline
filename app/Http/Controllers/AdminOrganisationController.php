<?php

namespace App\Http\Controllers;

use App\Models\Organisation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use App\Http\Requests\UpdateOrganisationRequest;


class AdminOrganisationController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.organisations.index', [
            'organisations' => Organisation::all(),
        ]);
    }


/**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.organisations.create');
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // ddd($request->all());
        $attr = $request->validate([
            'name' => ['required','array'],
            'name.en' => ['required', 'string', 'max:255'],
            'name.ar' => ['required', 'string','max:255'],
            'description' => ['required', 'array'],
            'description.en' => ['required', 'string'],
            'description.ar' => ['required', 'string'],
            'attributes' => ['required', 'array'],
            'attributes.en' => ['required', 'string'],
            'attributes.ar' => ['required', 'string'],
            'image' => ['required', 'image'],
            'cover' => ['required', 'image'],
            'website' => ['string',Rule::unique(Organisation::class)],
            'instagram' => ['string',Rule::unique(Organisation::class),],
            'facebook' => ['string',Rule::unique(Organisation::class),],
            'twitter' => ['string',Rule::unique(Organisation::class),],

        ]);

        $attr['image'] = request()->file('image')->store('organizations_images');
        
        
        $photo_image = $request->image;
        $folder = "storage/organizations";
        $file_extintion=$photo_image->getClientOriginalExtension();
        $attr['image']=time().random_int(5,30).'.'.$file_extintion;
        $path=$folder;
        $photo_image->move($path,$attr['image']);
        
        $photo_cover = $request->cover;
        $folder = "storage/organizations";
        $file_extintion=$photo_cover->getClientOriginalExtension();
         $attr['cover']=time().random_int(5,30).'.'.$file_extintion;
        $path=$folder;
        $photo_cover->move($path, $attr['cover']);

        

        $organisation = Organisation::create($attr);

        return redirect()->route('admin.organisations.edit', $organisation)->with([
            'flash' => 'success',
            'message' => 'Added Organistaion successfully',
        ]);
    }





     /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Instructor  $instructor
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOrganisationRequest $request, Organisation $organisation)
    {
      

        return DB::transaction(function () use ($request, $organisation) {

 
            $organisation->update($request->forUpdate());

            return redirect()->route('admin.organisations.edit', $organisation)->with([
                'flash' => 'success',
                'message' => 'Updated Organisation Successfully',
            ]);
        });
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Organisation  $organisation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Organisation $organisation)
    {
        return DB::transaction(function () use ($organisation) {
            // make all child parent_ids null
            // Organisation::where('parent_id', $organisation->id)
            //     ->update(['parent_id' => null]);

            // make all courses with organisation_id null
            // Program::where('organisation_id', $organisation->id)
            //     ->update(['organisation_id' => null]);

            // delete current organisation (deletes media as well)
            $organisation->delete();

            return redirect()->route('admin.organisations.index')->with([
                'flash' => 'success',
                'message' => 'Deleted Organisation Successfully',
            ]);
        });
    }


    public function edit(Organisation $organisation)
    {
        return view('admin.organisations.edit', [
            'organisation' => $organisation,
        ]);
    }
}
