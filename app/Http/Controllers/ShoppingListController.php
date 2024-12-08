<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Post;
use App\Models\ShoppingList;
use App\Models\PurchasedItems;


class ShoppingListController extends Controller
{
    
    public function dashboard(Request $request)
    {
        //Blocks Unauthentcated user access
        if(is_null($request->session()->get('user'))){
            return view('access_denied.accessdenied');
        }

        $username = $request->session()->get('user');

        //Display Veggies table data
        $table_Veggies = ShoppingList::where('username','LIKE',$username)
                                    ->where('category','LIKE',"Veggies")
                                    ->get();
        

        //Display Fruit table data
        $table_Fruit = ShoppingList::where('username','LIKE',$username)
                                    ->where('category','LIKE',"Fruit")
                                    ->get();

        //Display Canned Goods table data
        $table_CannedGoods= ShoppingList::where('username','LIKE',$username)
                                    ->where('category','LIKE',"Canned Goods")
                                    ->get();

        //Display Dairy table data
        $table_Dairy= ShoppingList::where('username','LIKE',$username)
                                    ->where('category','LIKE',"Dairy")
                                    ->get();

        //Display Meat table data
        $table_Meat= ShoppingList::where('username','LIKE',$username)
                                    ->where('category','LIKE',"Meat")
                                    ->get();

        //Display Snacks table data
        $table_Snacks = ShoppingList::where('username','LIKE',$username)
                                    ->where('category','LIKE',"Snacks")
                                    ->get();

        //Display Drinks table data
        $table_Drinks = ShoppingList::where('username','LIKE',$username)
                                    ->where('category','LIKE',"Drinks")
                                    ->get();
        
        //Display Drinks table data
        $table_HomeSupplies = ShoppingList::where('username','LIKE',$username)
                                    ->where('category','LIKE',"Home Supplies")
                                    ->get();

        //Display Other table data
        $table_Other = ShoppingList::where('username','LIKE',$username)
                                    ->where('category','LIKE',"Other")
                                    ->get();

        $todaysdate = date("Y-m-d");

        $Tables = [
            "username" => $username,
            "todaysdate" => $todaysdate,
            "Veggies" => $table_Veggies,
            "Fruit" => $table_Fruit,
            "CannedGoods" => $table_CannedGoods,
            "Dairy" => $table_Dairy,
            "Meat" => $table_Meat,
            "Snacks" => $table_Snacks,
            "Drinks" => $table_Drinks,
            "HomeSupplies" => $table_HomeSupplies,
            "Other" => $table_Other
        ];

        return view('shoppinglist.dashboard',$Tables);

    }

    public function additem(Request $request)
    {
        //Check method
        if($request->isMethod('get'))
        {
            return "Method is Get";
        }

        //Blocks Unauthentcated user access
        if(is_null($request->session()->get('user'))){
            return view('access_denied.accessdenied');
        }

        $username = $request->session()->get('user');

        //Input Validation
        $validated = $request->validate([
            'category' => 'required',
            'item' => 'required|min:3',
            'quantity' => 'required|min:1'
        ]);
        
        //Capture input data
        $item = $request->input('item');
        $quantity = $request->input('quantity');

        //Save data into Database
        $list = new ShoppingList();
        $list->username = $username;
        $list->category = $request->input('category');
        $list->item = $request->input('item');
        $list->quantity = $request->input('quantity');
        $list->date = date("Y-m-d");
        $list->save();

             
        return redirect('/items-dashboard');
        
    }

    public function deleteitem($id)
    {
        DB::delete('delete from shopping_lists where id = ?',[$id]);
        return redirect("/items-dashboard");
    }

    public function edititemView(Request $request, $id)
    {
        //Blocks Unauthentcated user access
        if(is_null($request->session()->get('user'))){
            return view('access_denied.accessdenied');
        }

        $username = $request->session()->get('user');
        $item = ShoppingList::find($id);
        return view('shoppinglist.itemedit', compact('username','item'));
    }

    public function edititem(Request $request, $id)
    {
        //Input Validation
        $validated = $request->validate([
            'category' => 'required',
            'item' => 'required|min:3',
            'quantity' => 'required|min:1'
        ]);

        $item = ShoppingList::find($id);
        $item->category = $request->input('category');
        $item->item = $request->input('item');
        $item->quantity = $request->input('quantity');

        $item->update();

        return redirect('/items-dashboard');

    }

    public function collectitemView(Request $request, $id)
    {
        //Blocks Unauthentcated user access
        if(is_null($request->session()->get('user'))){
            return view('access_denied.accessdenied');
        }

        $username = $request->session()->get('user');


        $item = ShoppingList::find($id);
        return view('shoppinglist.itempurchase', compact('username','item'));
    }

    public function purchaseitem(Request $request, $id)
    {
        //Blocks Unauthentcated user access
        if(is_null($request->session()->get('user'))){
            return view('access_denied.accessdenied');
        }

        $username = $request->session()->get('user');
        
        //Input Validation
        $validated = $request->validate([
            'quantity' => 'required|min:1',
            'price' => 'required'
        ]);

        //Save data into Database
        $purchaseitems = new PurchasedItems();
        $purchaseitems->username = $username;
        $purchaseitems->category = $request->input('category');
        $purchaseitems->item = $request->input('item');
        $purchaseitems->quantity = $request->input('quantity');

        //Multiply the price by the quantity
        $purchaseitems->price = round($request->input('price'),2) * $purchaseitems->quantity;
        
        $purchaseitems->save();

        //Deletes the item from the shopping list
        DB::delete('delete from shopping_lists where id = ?',[$id]);

        return redirect('/items-list');

    }

    public function purchaselist(request $request)
    {
        //Blocks Unauthentcated user access
        if(is_null($request->session()->get('user'))){
            return view('access_denied.accessdenied');
        }

        $username = $request->session()->get('user');


        $table_PurchasedItems = PurchasedItems::where('username','LIKE',$username)->get();

        //Gets the total from the price column
        $total_price = $table_PurchasedItems->sum('price');
        
        return view('shoppinglist.totalpurchaselist', compact('total_price','username','table_PurchasedItems'));

    }

    public function purchaseitemdelete($id)
    {
        DB::delete('delete from purchased_items where id = ?',[$id]);
        return redirect("/items-list");
    }

    public function purchaseitemdeleteAllView(request $request)
    {
        //Blocks Unauthentcated user access
        if(is_null($request->session()->get('user'))){
            return view('access_denied.accessdenied');
        }
        
        $username = $request->session()->get('user');
        
        return view('shoppinglist.cleartotallist',compact('username'));
    }

    public function purchaseitemdeleteAll()
    {
        //Clears the purchase list table
        PurchasedItems::truncate();
        return redirect("/items-list");
    }

    public function logout(request $request)
    {
        //Blocks Unauthentcated user access
        if(is_null($request->session()->get('user'))){
            return view('access_denied.accessdenied');
        }

        $username = $request->session()->get('user');

        //Delete the users sessions
        $request->session()->forget('user');

        return redirect('/');
    }

    
}
