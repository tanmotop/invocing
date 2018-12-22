<?php
/**
 * Created by PhpStorm.
 * User: tanmo
 * Date: 2018/12/13
 * Time: 11:21 AM
 */

namespace App\Api\Controllers;


use App\Http\Controllers\Controller;
use App\Http\Resources\ItemResource;
use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index()
    {
        if (request()->has('limit')) {
            $limit = request()->get('limit');
            $items = Item::orderBy('created_at', 'desc')->paginate($limit);
        }
        else {
            $items = Item::latest()->get();
        }

        return api()->collection($items, ItemResource::class);
    }

    public function store(Request $request)
    {
        $item = new Item();
        $item->name = $request->name;
        $item->sn = $request->sn;
        $item->save();

        return api()->created();
    }

    public function show()
    {

    }

    public function update(Item $item, Request $request)
    {
        $item->name = $request->name;
        $item->sn = $request->sn;
        $item->save();

        return api()->noContent();
    }

    public function destroy()
    {

    }
}