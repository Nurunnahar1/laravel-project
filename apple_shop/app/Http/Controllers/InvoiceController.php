<?php

namespace App\Http\Controllers;

use App\Helper\SSLCommerz;
use Exception;
use App\Models\Invoice;
use App\Models\ProductCart;
use Illuminate\Http\Request;
use App\Helper\ResponseHelper;
use App\Models\InvoiceProduct;
use App\Models\CustomerProfile;
use App\Models\SslcommerzAccount;
use Illuminate\Support\Facades\DB;

class InvoiceController extends Controller
{
    public function InvoiceCreate(Request $request){
        DB::beginTransaction();

        try {
             $user_id = $request->header("id");
             $user_email = $request->header("email");

             $tran_id=uniqid();
             $delivery_status='Pendings';
             $payment_status= 'Pendings';

             $profile=CustomerProfile::where('user_id','=',$user_id)->first();
             $cus_details="
                Name:$profile->cus_name,
                Address:$profile->cus_add,
                City:$profile->cus_city,
                Phone:$profile->cus_phone
                ";
             $ship_details="
                Name:$profile->ship_name,
                Address:$profile->ship_add,
                City:$profile->ship_city,
                Phone:$profile->cus_phone
                ";

                //payable Calculation
                $total = 0;
                $cartList =  ProductCart::where('user_id','=',$user_id)->get();
                 foreach($cartList as $cartItem){
                    $total= $total + $cartItem->price;
                 }

                $vat= ($total*3)/100;
                $payable= $total + $vat;

                $invoice= Invoice::create([
                   'total' => $total,
                   'vat' => $vat,
                   'payable'=> $payable,
                   'cus_details'=>$cus_details,
                   'ship_details'=>$ship_details,
                   'tran_id'=>$tran_id,
                   'delivery_status'=> $delivery_status,
                   'payment_status'=> $payment_status,
                   'user_id'=>$user_id

                ]);

                $invoiceID = $invoice->id;


                foreach($cartList as $EachProduct){
                  InvoiceProduct::create([
                     'invoice_id' => $invoiceID,
                     'product_id' => $EachProduct['product_id'],
                     'user_id' => $user_id,
                     'qty' => $EachProduct['qty'],
                     'sale_price' => $EachProduct['price']
                  ]);
                }

                $paymentMethod= SslcommerzAccount::InitiatePayment($profile, $payable, $tran_id, $user_email);

                DB::commit();

                return ResponseHelper::Out('success' , array('paymentMethod'=>$paymentMethod,'payable'=>$payable,'vat'=>$vat,'total'=>$total));

        }

        catch (Exception $e) {
            DB::rollback();
            return ResponseHelper::Out('error', $e,200);
        }
    }





    public function InvoiceList(Request $request){
        $user_id = $request->header('id');
        return Invoice::where('user_id', $user_id)->get();
    }

    public function InvoiceProductList(Request $request){
        $user_id = $request->header('id');
        $invoice_id = $request->invoice_id;
        return InvoiceProduct::where('user_id'=>$user_id,'invoice_id'=>$invoice_id)->with('product')->get();
    }


    public function PaymentSuccess(Request $request){
        return SSLCommerz::InitiateSuccess($request->query('tram_id'));
    }
    public function PaymentCancel(Request $request){
        return SSLCommerz::InitiateCancel($request->query('tram_id'));
    }
    public function PaymentFail(Request $request){
        return SSLCommerz::InitiateFail($request->query('tram_id'));
    }
    public function PaymentIPN(Request $request){
        return SSLCommerz::InitiateIPN($request->input('tram_id'),$request->input('status'), $request->input('val_id'));
    }
}
