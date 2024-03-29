<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Contracts\OrderContract;
use App\Http\Controllers\Controller;

class CheckoutController extends Controller
{
    protected $orderRepository;

    public function __construct(OrderContract $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }

    public function getCheckout()
    {
        return view('site.pages.checkout');
    }

    public function placeOrder(Request $request)
    {
        
        $order = $this->orderRepository->storeOrderDetails($request->all());

        // dd($order);
        return view('site.pages.success', compact('order'));
        // return back()->with('success_message','Thank You! Your order has been successfully accepted!');
    }

    // public function complete(Request $request)
    // {
    //     $order = Order::where('order_number', $status['invoiceId'])->first();
    //     $order->status = 'processing';
    //     $order->payment_status = 1;
    //     $order->save();

    //     Cart::clear();
    //     return view('site.pages.success', compact('order'));
    // }
}