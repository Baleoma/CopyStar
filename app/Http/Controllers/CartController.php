<?php

namespace App\Http\Controllers;


use App\Models\Carts;
use App\Models\Order_items;
use App\Models\Orders;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class CartController extends Controller
{
// Отображение корзины
    public function index()
    {
        if (!Auth::check()) {
            return redirect()->intended('/login');
        }

        $user = Auth::user();

        $cartItems = Carts::where('user_id', $user->id)->with('product')->get();

        // Используем правильное отношение "items" вместо "order_items"
        $orders = Orders::where('user_id', $user->id)
            ->with(['items.product' => function ($query) {
                $query->select('id', 'name', 'price');
            }])
            ->get();

        return view('cart', compact('cartItems', 'orders'));
    }

    // Удаление товара из корзины
    public function removeFromCart($cartItemId)
    {
        $user = Auth::user();
        $cartItem = Carts::where('user_id', $user->id)
            ->where('id', $cartItemId)
            ->first();

        if ($cartItem) {
            $cartItem->delete();
        }

        return redirect()->route('cart.index')->with('success', 'Товар удален из корзины.');
    }

    // Оформление заказа
    public function placeOrder()
    {
        $user = Auth::user();
        $cartItems = Carts::where('user_id', $user->id)->with('product')->get();

        if ($cartItems->isEmpty()) {
            return redirect()->route('cart.index')->with('error', 'Корзина пуста.');
        }

        // Создаем новый заказ
        $order = Orders::create([
            'user_id' => $user->id,
            'status' => 'new',
        ]);

        // Добавляем товары в заказ
        foreach ($cartItems as $cartItem) {
            Order_items::create([
                'order_id' => $order->id,
                'product_id' => $cartItem->product_id,
                'quantity' => $cartItem->quantity,
            ]);
        }

        // Очищаем корзину
        Carts::where('user_id', $user->id)->delete();

        return redirect()->route('cart.index')->with('success', 'Заказ успешно оформлен.');
    }

    public function updateQuantities(Request $request)
    {
        $validated = $request->validate([
            'quantities' => 'required|array',
            'quantities.*' => 'integer|min:1',
        ]);

        foreach ($validated['quantities'] as $cartId => $quantity) {
            $cartItem = Carts::find($cartId);
            if ($cartItem) {
                $cartItem->update(['quantity' => $quantity]);
            }
        }

        return redirect()->route('cart.index')->with('success', 'Количество товаров успешно обновлено.');
    }

    public function addToCart(Request $request, $productId)
    {
        $user = Auth::user();
        $product = Products::find($productId);

        if (!$product) {
            return response()->json(['error' => 'Товар не найден.'], 404);
        }

        // Проверяем, есть ли уже такой товар в корзине
        $existingCartItem = Carts::where('user_id', $user->id)
            ->where('product_id', $productId)
            ->first();

        if ($existingCartItem) {
            // Если товар уже есть, увеличиваем количество
            $existingCartItem->increment('quantity');
        } else {
            // Иначе добавляем новый товар в корзину
            Carts::create([
                'user_id' => $user->id,
                'product_id' => $productId,
                'quantity' => 1,
            ]);
        }

        return response()->json(['success' => 'Товар добавлен в корзину.']);
    }
}
