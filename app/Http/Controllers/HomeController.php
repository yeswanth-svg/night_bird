<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Dish;
use App\Models\Type;
use App\Models\DishQuantity;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //

    public function index()
    {
        // Fetch categories with only 5 dishes per category
        $categories = Category::all();
        $types = Type::with([
            'dishes' => function ($query) {
                $query->limit(5); // Limit to 5 dishes per category
            }
        ])->get();

        return view('welcome', compact('types', 'categories'));
    }


    public function about_us()
    {
        return view('about');
    }

  public function menu(Request $request)
{
    // Load categories with their types
    $categories = Category::with('types')->get();

    // Selected type (ID passed from sidebar)
    $selectedTypeId = $request->input(
        'category',
        optional($categories->first()?->types->first())->id
    );

    // Get dishes for selected type WITH quantities
    $dishes = Dish::with('quantities')
        ->where('type_id', $selectedTypeId)
        ->paginate(12);

    return view('menu', compact('categories', 'dishes', 'selectedTypeId'));
}





    public function contact()
    {
        return view('contact');
    }

    public function dashboard()
    {
        return view('user.dashboard');
    }

    public function singleDish($id)
    {

        $dish = Dish::with('reviews.user')->findOrFail($id);
        return view('singlepageitem', compact('dish'));
    }
}
