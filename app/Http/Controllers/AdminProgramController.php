<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Instructor;
use App\Models\Level;
use App\Models\Program;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;

class AdminProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.course.index', [
            'courses' => Program::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.course.create', [
            'categories' => Category::select(['id', 'title'])->get()->pluck('title', 'id'),
            'levels' => Level::select(['id', 'title'])->get()->pluck('title', 'id'),
            'instructors' => Instructor::select(['id', 'name'])->get()->pluck('name', 'id'),
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
        // ddd($request->all());
        $attr = $request->validate([
            'category_id' => ['required', Rule::exists(Category::class, 'id')],
            'level_id' => ['required', Rule::exists(Level::class, 'id')],
            'image' => ['required', 'image'],
            'title' => ['required', 'array'],
            'title.en' => ['required', 'string', 'max:255'],
            'title.ar' => ['required', 'string', 'max:255'],
            'description' => ['array'],
            'objectives' => ['array'],
            'aimed_at' => ['array'],
            'learn_to' => ['array'],
            'modules' => ['array'],
            'duration' => ['integer', 'min:0'],
            'price' => ['integer', 'min:0'],
            'language' => ['string', Rule::in(['en', 'ar'])],
            'delivery_mode' => ['string', Rule::in(['online'])],
            'instructors_id' => ['array'],
        ]);

        $attr['image'] = request()->file('image')->store('course_images');
        $attr['featured'] = request('featured', 'no') == 'yes';

        if (isset($attr['modules']['en'])) {
            $en_modules = array_map(function (string $module) {
                $arr = array_filter(explode('|', str_replace(PHP_EOL, '', $module)));
                return $arr;
            }, $attr['modules']['en']);
            $attr['modules']['en'] = $en_modules;
        }
        if (isset($attr['modules']['ar'])) {
            $ar_modules = array_map(function (string $module) {
                $arr = array_filter(explode('|', str_replace(PHP_EOL, '', $module)));
                return $arr;
            }, $attr['modules']['ar']);
            $attr['modules']['ar'] = $ar_modules;
        }

        if (isset($attr['instructors_id'])) {
            $instructors_id = $attr['instructors_id'];
            unset($attr['instructors_id']);
            $course = Program::create($attr);
            $course->instructors()->sync($instructors_id);
        } else {
            $course = Program::create($attr);
        }

        return redirect()->route('admin.programs.edit', $course)->with([
            'flash' => 'success',
            'message' => 'Added course successfully',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Program  $program
     * @return \Illuminate\Http\Response
     */
    public function show(Program $program)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Program  $program
     * @return \Illuminate\Http\Response
     */
    public function edit(Program $program)
    {
        $modules_en = [];
        $modules_ar = [];

        if ($program->getTranslation('modules', 'en') != null) {
            foreach ($program->getTranslation('modules', 'en') as $module) {
                $modules_en[] = implode('|' . PHP_EOL, $module);
            }
        }

        if ($program->getTranslation('modules', 'ar') != null) {
            foreach ($program->getTranslation('modules', 'ar') as $module) {
                $modules_ar[] = implode('|' . PHP_EOL, $module);
            }
        }
        return view('admin.course.edit', [
            'program' => $program,
            'categories' => Category::select(['id', 'title'])->get()->pluck('title', 'id'),
            'levels' => Level::select(['id', 'title'])->get()->pluck('title', 'id'),
            'instructors' => Instructor::select(['id', 'name'])->get()->pluck('name', 'id'),
            'modules_en' => $modules_en,
            'modules_ar' => $modules_ar,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Program  $program
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Program $program)
    {
        $attr = $request->validate([
            'category_id' => ['required', Rule::exists(Category::class, 'id')],
            'level_id' => ['required', Rule::exists(Level::class, 'id')],
            'image' => ['image'],
            'title' => ['required', 'array'],
            'title.en' => ['required', 'string', 'max:255'],
            'title.ar' => ['required', 'string', 'max:255'],
            'description' => ['array'],
            'objectives' => ['array'],
            'aimed_at' => ['array'],
            'learn_to' => ['array'],
            'modules' => ['array'],
            'duration' => ['integer', 'min:0'],
            'price' => ['integer', 'min:0'],
            'language' => ['string', Rule::in(['en', 'ar'])],
            'delivery_mode' => ['string', Rule::in(['online'])],
            'instructors_id' => ['array'],
        ]);

        if (isset($attr['image'])) {
            $image = public_path("storage/$program->image");
            if (File::isFile($image)) {
                File::delete($image);
            }
            $attr['image'] = request()->file('image')->store('course_images');
        }
        $attr['featured'] = request('featured', 'no') == 'yes';

        if (isset($attr['modules']['en'])) {
            $en_modules = array_map(function (string $module) {
                $arr = array_filter(explode('|', str_replace(PHP_EOL, '', str_replace("\r", '', $module))));
                return $arr;
            }, $attr['modules']['en']);
            $attr['modules']['en'] = $en_modules;
        }
        if (isset($attr['modules']['ar'])) {
            $ar_modules = array_map(function (string $module) {
                $arr = array_filter(explode('|', str_replace(PHP_EOL, '', str_replace("\r", '', $module))));
                return $arr;
            }, $attr['modules']['ar']);
            $attr['modules']['ar'] = $ar_modules;
        }

        if (isset($attr['instructors_id'])) {
            $instructors_id = $attr['instructors_id'];
            unset($attr['instructors_id']);
            $program->update($attr);
            $program->instructors()->sync($instructors_id);
        } else {
            $program->update($attr);
        }

        return redirect()->route('admin.programs.edit', $program)->with([
            'flash' => 'success',
            'message' => 'Updated course successfully',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Program  $program
     * @return \Illuminate\Http\Response
     */
    public function destroy(Program $program)
    {
        $image = public_path("storage/$program->image");
        if (File::isFile($image)) {
            File::delete($image);
        }

        $program->instructors()->detach();

        $program->delete();

        return redirect()->back()->with([
            'flash' => 'success',
            'message' => 'Successfully deleted program.',
        ]);
    }
}
