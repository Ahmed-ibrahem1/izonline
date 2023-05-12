<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Branch;
use App\Models\Program;
use App\Models\Sale;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function home()
    {

    //     public static function order()
    // {
    //     $sales = DB::table('sales')->select(DB::raw('SELECT program_id, COUNT(program_id) FROM sales GROUP BY program_id;'));
    //     return $sales;
    // }
        $items= DB::table('sales')->select('program_id',DB::raw(' COUNT(program_id) as count'))->groupBy('program_id')->orderBy('count','desc')->get()->take(3);

        $program_ids = [];
        foreach($items as $item ){
            array_push($program_ids,$item->program_id);
           
        } 
        
        $best_selling = Program::whereIn('id',$program_ids)->get(); 
        
        $branches = Branch::all();
    
        return view('home.home', [
            'featured_programs' => self::getFeaturedPrograms(),
            'categories' => self::getCategories(),
            'brnches' => $branches
            
        ], compact('best_selling'));
    }

    static public function getCategories(int $limit = 3)
    {
        return Category::where('featured', true)->limit($limit)->get();
    }

    static public function getFeaturedPrograms()
    {
        return Program::where('featured', true)->limit(3)->get();
    }
}
