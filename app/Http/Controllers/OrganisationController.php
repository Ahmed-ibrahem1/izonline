<?php

namespace App\Http\Controllers;

use App\Models\Organisation;
use Illuminate\Http\Request;

class OrganisationController extends Controller
{
    public function index(){

        $orgs = Organisation::all();

        return view('organisation.index',[
            'organisations' => $orgs
        ]);
    }

    public function show(Request $request){

        if($request->org_id){
            $org_id = $request->org_id;
            $org =  Organisation::findOrFail($org_id);
        }

        return view('organisation.index',[
            'organisations' => $org
        ]);

    }



}
