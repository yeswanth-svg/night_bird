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

        // Fetch Google reviews
        $placeId = 'ChIJGRF6EbGTyzsRnuoTGE2cFFE';
        $apiKey = env('GOOGLE_API_KEY');
        $url = "https://maps.googleapis.com/maps/api/place/details/json?place_id={$placeId}&fields=name,rating,reviews&key={$apiKey}";

        $response = file_get_contents($url);
        $data = json_decode($response, true);
        $reviews = $data['result']['reviews'] ?? [];

        return view('welcome', compact('types', 'categories', 'reviews'));
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

    public function testimonials()
    {
        $placeId = 'ChIJGRF6EbGTyzsRnuoTGE2cFFE'; // Your Place ID
        $apiKey = env('GOOGLE_API_KEY'); // Your API key from .env
        $url = "https://maps.googleapis.com/maps/api/place/details/json?place_id={$placeId}&fields=name,rating,reviews&key={$apiKey}";

        $response = file_get_contents($url); // Fetch data from Google
        $data = json_decode($response, true);

        $reviews = $data['result']['reviews'] ?? []; // Use empty array if no reviews

        return view('user.testimonials', compact('reviews')); // Pass $reviews to Blade
    }

}
