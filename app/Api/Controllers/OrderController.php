<?php
/**
 * Created by PhpStorm.
 * User: tanmo
 * Date: 2018/12/21
 * Time: 4:47 PM
 */

namespace App\Api\Controllers;


use App\Http\Controllers\Controller;
use App\Http\Resources\OrderResource;
use App\Models\Item;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $limit = request()->get('limit');
        $orders = Order::latest()->paginate($limit);
        $orders->load('items');

        return api()->collection($orders, OrderResource::class);
    }

    public function store(Request $request)
    {
        $paid_price = $request->paid_price;
        $buyer = $request->buyer;
        $remark = $request->remark;

        $itemIds = $request->input('items.*.item_id');
        $items = Item::fetchItems($itemIds)->get();
        $items = $items->keyBy('id')->all();

        $byItems = $request->input('items');
        $total = 0;
        $itemList = [];
        foreach ($byItems as $byItem) {
            $quantity = $byItem['quantity'];
            $item = $items[$byItem['item_id']];
            $priceType = $byItem['price_type'];
            switch ($priceType) {
                case 'member_price':
                case 'retail_price':
                    $unitPrice = $item->$priceType;
                    break;
                case 'other':
                    $unitPrice = $byItem['unit_price'];
                    break;
                case 'free':
                case 'personal':
                default:
                    $unitPrice = 0;
            }

            $price = $unitPrice * $quantity;
            $total += $price;

            $itemList[] = new OrderItem([
                'item_id' => $byItem['item_id'],
                'quantity' => $quantity,
                'price_type' => OrderItem::$priceTypeMap[$priceType],
                'unit_price' => $unitPrice,
                'total_price' => $price
            ]);

            $item->stock -= $quantity;
            $item->save();
        }

        $order = new Order();
        $order->sn = 'SN' . date('YmdHis');
        $order->total_price = $total;
        $order->paid_price = $paid_price;
        $order->buyer = $buyer;
        $order->remark = $remark;
        $order->save();

        $order->items()->saveMany($itemList);

        return api()->created();
    }
}