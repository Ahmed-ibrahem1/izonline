<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserRequest;
use App\Models\Program;
use App\Models\Sale;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.users.index', [
            'sales' => Sale::all(),
            'users' => User::all(),
            'programs' => Program::all()
        ]);
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('admin.users.edit', [
            'user' => $user,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        return DB::transaction(function () use ($request, $user) {


            $user->update($request->forUpdate());


            return redirect()->route('admin.users.edit', $user)->with([
                'flash' => 'success',
                'message' => 'Updated User Successfully',
            ]);
        });
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        return DB::transaction(function () use ($user) {
            // make all child parent_ids null
            // Category::where('parent_id', $category->id)
            //     ->update(['parent_id' => null]);

            // // make all courses with category_id null
            // Sale::where('user_id', $user->id)
            //     ->update(['user_id' => null]);

            // delete current user
            $user->delete();

            return redirect()->route('admin.users.index')->with([
                'flash' => 'success',
                'message' => 'Deleted User Successfully',
            ]);
        });
    }
}
