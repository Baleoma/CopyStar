<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Orders;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function destroy(Orders $order)
    {
        $order->delete();
        return redirect()->route('admin.dashboard')->with('success', 'Заказ удален');
    }
}
