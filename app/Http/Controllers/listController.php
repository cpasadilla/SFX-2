<?php

namespace App\Http\Controllers;

use App\Models\priceList;
use App\Models\category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class listController extends Controller {
    protected function index() {
        $items = priceList::paginate();
        $cats = category::all();
        $page = 1;
        return view('list.home',compact('items','cats','page'));
    }

    protected function validator(array $data) {
        return Validator::make($data, [
            'cats' => ['required', 'not_in:0'],
            'itemName' => ['required', 'string', 'max:255'],
            'unit' => ['nullable', 'string', 'max:255'],
            'price' => ['nullable', 'numeric'],
            'length' => ['nullable', 'numeric'],
            'width' => ['nullable', 'numeric'],
            'height' => ['nullable', 'numeric'],
            'multiplier' => ['nullable', 'numeric'],
        ]);
    }

    protected function create(Request $request) {
        $this->validator($request->all())->validate();
        priceList::create([
            'category' => $request -> cats,
            'itemName' => $request -> itemName,
            'unit' => $request -> unit,
            'price' => $request->price ?? 0, // Set default value
            'length' => $request -> length,
            'width' => $request -> width,
            'height' => $request -> height,
            'multiplier' => $request -> multiplier,

        ]);

        return redirect() -> route('price');
    }

    protected function edit() {
        $items = priceList::paginate();

        return view('list.home',compact('items'));
    }

    protected function valid(array $data) {
        return Validator::make($data, [
            'category' => ['required', 'string', 'max:255'],
        ]);
    }

    protected function category(Request $request) {
        $this->valid($request->all())->validate();

        category::create([
            'name' => $request -> category,
        ]);

        return redirect() -> route('price');
    }

    protected function update(Request $request) {
        // Update listing
        $cat = $request-> cats2;
        $itemName = $request->itemName;
        $unit = $request->unit;
        $price = $request->price;
        $length = $request->length;
        $width = $request->width;
        $height = $request->height;
        $multiplier = $request->multiplier;
        $id = $request->id;

        $cats = category::where('name',$cat)->get();
        $page = $request->pages;

        foreach($cats as $key) {
            $category = $key->id;
        }

        DB::table('price_lists')
            ->where('id',$id)
            ->update([
                'itemName'=>$itemName,
                'unit'=>$unit,
                'price'=>$price,
                'category'=>$category,
                'length'=>$length,
                'width'=>$width,
                'height'=>$height,
                'multiplier'=>$multiplier
            ]);

        // Fetch updated items to reflect changes on the page
        $items = priceList::paginate();
        $cats = category::all();

        return redirect()->route('price', compact('items', 'cats', 'page'));
    }


    protected function delete(Request $request) {
        $id = $request-> id;
        $del = priceList::find($id);
        $del->delete();

        return response()->json(['message' => 'Item deleted successfully']);
    }

    public function search(Request $request) {
        $search = $request->input('search');

        // Perform the search query and retrieve the filtered results
        $items = priceList::where('itemName', 'like', "%$search%")
            ->get();
        $cats = category::paginate();

        if($items->isEmpty()) {
            $cats = category::where('name', 'like', "%$search%")
                ->get();
            if($cats->isEmpty()){
                $items = priceList::paginate(20);
            } else {
                $key = $cats;

                foreach($key as $keys){
                    $id = $keys->id;
                }

                $items = priceList::where('category', 'like', "%$id%");
                $items = $items->paginate(10);
            }
        } else {
            $items = priceList::where('itemName', 'like', "%$search%");
            $items = $items->paginate(10);
        }

        $products = $items;
        $cats = category::paginate();

        return view('list.home',compact('items','cats'));
    }


    // Create a new category
protected function addCategory(Request $request)
{
    $validated = $request->validate(['categoryName' => 'required|string|max:255']);
    category::create(['name' => $validated['categoryName']]);
    return redirect()->route('price');
}

// Update an existing category
protected function updateCategory(Request $request)
{
    $validated = $request->validate([
        'categorySelect' => 'required|exists:categories,id',
        'categoryName' => 'required|string|max:255',
    ]);
    $category = category::find($validated['categorySelect']);
    $category->name = $validated['categoryName'];
    $category->save();
    return redirect()->route('price');
}

// Delete a category
protected function deleteCategory(Request $request)
{
    $validated = $request->categorySelect;
    category::find($validated)->delete();
    return redirect()->route('price');
}
}
