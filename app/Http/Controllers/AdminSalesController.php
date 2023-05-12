<?php

namespace App\Http\Controllers;

use App\Models\Program;
use App\Models\Sale;
use App\Models\User;
use Illuminate\Http\Request;

class AdminSalesController extends Controller
{
    


     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.sales.index', [
            'sales' => Sale::all(),
            'users' => User::all(),
            'programs' =>Program::all()
        ]);
    }

    //  /**
    //  * Show the form for creating a new resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function create()
    // {
    //     return view('admin.sale.create');
    // }



    // /**
    //  * Store a newly created resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @return \Illuminate\Http\Response
    //  */
    // public function store(Request $request)
    // {
    //     // ddd($request->all());
    //     $attr = $request->validate([
    //         'image' => ['required', 'image'],
    //         'name' => ['required', 'array'],
    //         'name.en' => ['required', 'string', 'max:255'],
    //         'name.ar' => ['required', 'string', 'max:255'],
    //         'biography' => ['required', 'array'],
    //         'biography.en' => ['required', 'string'],
    //         'biography.ar' => ['required', 'string'],
    //         // 'experience' => ['required', 'array'],
    //         // 'experience.en' => ['required', 'string'],
    //         // 'experience.ar' => ['required', 'string'],
    //         // 'instagram' => ['string'],
    //         // 'facebook' => ['string'],
    //     ]);

    //     $attr['image'] = request()->file('image')->store('Sales');

    //     $sale = Sale::create($attr);

    //     return redirect()->route('admin.sales.edit', $sale)->with([
    //         'flash' => 'success',
    //         'message' => 'Added Sale successfully',
    //     ]);
    // }

    //  /**
    //  * Show the form for editing the specified resource.
    //  *
    //  * @param  \App\Models\Sale  $Sale
    //  * @return \Illuminate\Http\Response
    //  */
    // public function edit(Sale $sale)
    // {
    //     return view('admin.sale.edit', [
    //         'sale' => $sale,
    //     ]);
    // }


}
