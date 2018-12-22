<?php
/**
 * Created by PhpStorm.
 * User: tanmo
 * Date: 2018/12/13
 * Time: 7:27 PM
 */

namespace App\Api\Controllers;


use App\Http\Controllers\Controller;
use App\Http\Resources\PurchaseRecordResource;
use App\Models\Item;
use App\Models\PurchaseRecord;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    public function index()
    {
        $limit = request()->get('limit');
        $purchaseRecords = PurchaseRecord::orderBy('created_at', 'desc')->paginate($limit);
        return api()->collection($purchaseRecords, PurchaseRecordResource::class);
    }

    public function store(Request $request)
    {
        $purchaseRecord = new PurchaseRecord([
            'boxes' => $request->boxes,
            'per_box' => $request->per_box,
            'quantity' => $request->boxes * $request->per_box,
            'purchase_price' => $request->purchase_price,
            'member_price' => $request->member_price,
            'retail_price' => $request->retail_price,
            'created_at' => $request->created_at
        ]);

        $item = Item::find($request->item_id);
        $item->stock = $item->stock + $purchaseRecord->quantity;
        $item->purchase_price = $request->purchase_price;
        $item->member_price = $request->member_price;
        $item->retail_price = $request->retail_price;
        $item->purchaseRecord()->save($purchaseRecord);
        $item->save();

        return api()->created();
    }
}