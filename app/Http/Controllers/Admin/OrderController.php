<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    function index(OrderDataTable $dataTable) : View|JsonResponse {
        return $dataTable->render('admin.order.index');
    }

    function pendingOrderIndex(PendingOrderDataTable $dataTable) : View|JsonResponse {
        return $dataTable->render('admin.order.pending-order-index');
    }

    function inProcessOrderIndex(InProcessOrderDataTable $dataTable) : View|JsonResponse {
        return $dataTable->render('admin.order.inprocess-order-index');
    }

    function deliveredOrderIndex(DeliveredOrderDataTable $dataTable) : View|JsonResponse {
        return $dataTable->render('admin.order.delivered-order-index');
    }

    function declinedOrderIndex(DeclinedOrderDataTable $dataTable) : View|JsonResponse {
        return $dataTable->render('admin.order.declined-order-index');
    }

    function show($id) : View {
        $order = Order::findOrFail($id);
        $notification = OrderPlacedNotification::where('order_id', $order->id)->update(['seen' => 1]);

        return view('admin.order.show', compact('order'));
    }

    function getOrderStatus(string $id) : Response {
        $order = Order::select(['order_status', 'payment_status'])->findOrFail($id);

        return response($order);
    }

    function orderStatusUpdate(Request $request, string $id) : RedirectResponse|Response {
        $request->validate([
            'payment_status' => ['required', 'in:pending,completed'],
            'order_status' => ['required', 'in:pending,in_process,delivered,declined']
        ]);

        $order = Order::findOrFail($id);
        $order->payment_status = $request->payment_status;
        $order->order_status = $request->order_status;
        $order->save();

        if($request->ajax()){
            return response(['message' => 'Order Status Updated!']);
        }else {
            toastr()->success('Status Updated Successfully!');

            return redirect()->back();
        }

    }

    function destroy(string $id) : Response {
        try{
            $order = Order::findOrFail($id);
            $order->delete();
            return response(['status' => 'success', 'message' => 'Deleted Successfully!']);
        }catch(\Exception $e){
            logger($e);
            return response(['status' => 'error', 'message' => 'something went wrong!']);
        }
    }
}
