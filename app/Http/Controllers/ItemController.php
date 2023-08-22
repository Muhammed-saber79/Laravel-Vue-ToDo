<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $data = Item::orderBy('created_at', 'DESC')->get();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $newItem = new Item;
        $newItem->name = $request->item['name'];
        $newItem->save();

        return $newItem;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $oldItem = Item::find($id);
        
        if ( $oldItem ) {
            $oldItem->completed = $request->item['completed'] == true ? true : false;
            $oldItem->completed_at = $request->item['completed'] ? Carbon::now() : null;
            $oldItem->save();

            return $oldItem;
        }

        return 'Item not found...!';
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = Item::find( $id );

        if ( $item ) {
            $item->delete();

            return 'Item successfully deleted.';
        }

        return 'Item not found...!';
    }
}
