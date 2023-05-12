<?php

namespace App\Http\Controllers;

use App\Models\Instructor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class AdminInstructorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.instructor.index', [
            'instructors' => Instructor::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.instructor.create');
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
            'image' => ['required', 'image'],
            'name' => ['required', 'array'],
            'name.en' => ['required', 'string', 'max:255'],
            'name.ar' => ['required', 'string', 'max:255'],
            'biography' => ['required', 'array'],
            'biography.en' => ['required', 'string'],
            'biography.ar' => ['required', 'string'],
            'experience' => ['required', 'array'],
            'experience.en' => ['required', 'string'],
            'experience.ar' => ['required', 'string'],
            'instagram' => ['string'],
            'facebook' => ['string'],
        ]);

        $attr['image'] = request()->file('image')->store('instructors');

        $instructor = Instructor::create($attr);

        return redirect()->route('admin.instructors.edit', $instructor)->with([
            'flash' => 'success',
            'message' => 'Added instructor successfully',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Instructor  $instructor
     * @return \Illuminate\Http\Response
     */
    public function show(Instructor $instructor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Instructor  $instructor
     * @return \Illuminate\Http\Response
     */
    public function edit(Instructor $instructor)
    {
        return view('admin.instructor.edit', [
            'instructor' => $instructor,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Instructor  $instructor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Instructor $instructor)
    {
        $attr = $request->validate([
            'image' => ['image'],
            'name' => ['required', 'array'],
            'name.en' => ['required', 'string', 'max:255'],
            'name.ar' => ['required', 'string', 'max:255'],
            'biography' => ['required', 'array'],
            'biography.en' => ['required', 'string'],
            'biography.ar' => ['required', 'string'],
            'experience' => ['required', 'array'],
            'experience.en' => ['required', 'string'],
            'experience.ar' => ['required', 'string'],
            'instagram' => ['string'],
            'facebook' => ['string'],
        ]);

        if (isset($attr['image'])) {
            $image = public_path("storage/$instructor->image");
            if (File::isFile($image)) {
                File::delete($image);
            }
            $attr['image'] = request()->file('image')->store('instructors');
        }

        $instructor->update($attr);

        return redirect()->back()->with([
            'flash' => 'success',
            'message' => 'Updated instructor successfully',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Instructor  $instructor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Instructor $instructor)
    {
        $image = public_path("storage/$instructor->image");
        if (File::isFile($image)) {
            File::delete($image);
        }

        $instructor->courses()->detach();

        $instructor->delete();

        return redirect()->back()->with([
            'flash' => 'success',
            'message' => 'Successfully deleted instructor.',
        ]);
    }
}
