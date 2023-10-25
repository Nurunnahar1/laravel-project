<?php

namespace App\Http\Controllers;

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

    
}
