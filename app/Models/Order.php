<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\OrderDetail;

class Order extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'full_name',
        'company',
        'address',
        'city',
        'ward',
        'district',
        'phone_number',
        'total',
        'user_id',
        'status',
        ];

    public function getOrderDate(){
        return date_format(date_create($this->created_at), "d/m/Y");
    }

    public function getStatus(){
       if ($this->status === 0){
           return 'Pending';
       }
       return 'Confirmed';
    }

    public function getUserName(){
        if ($this->user_id === -1){
            return 'Unknown User';
        }
        $user = User::find($this->user_id);
        return $user->name;
    }

    public function items(){
        return $this->hasMany(OrderDetail::class, 'order_id');
    }

    public static function pushOrder($order_id){
        $orderDetails = Order::with('items')->where('id', $order_id)->first()->toArray();
        $temp_order = Order::query()->where('id', $order_id);

        $orderDetails['payment_type_id'] = 1;
        $orderDetails['note']= "";
//        $orderDetails['from_name']= "";
//        $orderDetails['from_phone']= "";
//        $orderDetails['from_address']= "";
//        $orderDetails['from_ward_code']= "";
//        $orderDetails['from_district_name']= "";
//        $orderDetails['from_province_name']= "";
        $orderDetails['required_note']= "KHONGCHOXEMHANG";
        $orderDetails['return_name']= "Shakespeare";
        $orderDetails['return_phone']= "0336467550";
        $orderDetails['return_address']= "691 Le Van Viet";
        $orderDetails['return_ward_name']= "";
        $orderDetails['return_district_name']= "";
        $orderDetails['return_province_name']= "";
        $orderDetails['client_order_code']= "";
        $orderDetails['to_name']= $orderDetails['full_name'];
        $orderDetails['to_phone']= $orderDetails['phone_number'];
        $orderDetails['to_address']= $orderDetails['address'];
        $orderDetails['to_ward_name']= $orderDetails['ward'];
        $orderDetails['to_district_name']= $orderDetails['district'];
        $orderDetails['to_province_name']= $orderDetails['city'];
        $orderDetails['cod_amount']= 1000;
        $orderDetails['content']= "";
        $orderDetails['weight']= 7;
        $orderDetails['length']= 7;
        $orderDetails['width']= 7;
        $orderDetails['height']= 7;
        $orderDetails['pick_station_id']= null;
        $orderDetails['deliver_station_id']= null;
        $orderDetails['insurance_value']= 2000;
        $orderDetails['service_id']= 0;
        $orderDetails['service_type_id']= 2;
        $orderDetails['coupon']= "";
        $orderDetails['pick_shift']= null;
        $orderDetails['pickup_time']= null;
        foreach ($orderDetails['items'] as $key => $item) {
            $book = Book::query()->find($item['product_id']);
            $orderDetails['items'][$key]['name'] = $book['title'];
            $orderDetails['items'][$key]['code'] = "";
            $orderDetails['items'][$key]['quantity'] = $item['amount'];
            $orderDetails['items'][$key]['price'] = $book['price'];
            $orderDetails['items'][$key]['length'] = 7;
            $orderDetails['items'][$key]['width'] = 7;
            $orderDetails['items'][$key]['height'] = 7;
            $orderDetails['items'][$key]['category']['level1'] = "";
        }

//        echo "<pre>"; print_r(json_encode($orderDetails)); die;
        $orderDetails = json_encode($orderDetails);

        // create order in GHN
        $url = "https://online-gateway.ghn.vn/shiip/public-api/v2/shipping-order/create";
        $c = curl_init($url);

        curl_setopt($c, CURLOPT_POST, 1);
        curl_setopt($c, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($c, CURLOPT_POSTFIELDS, $orderDetails);
        curl_setopt($c, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($c, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($c, CURLOPT_HTTPHEADER, array('Content-Type:application/json', 'ShopId:3493032', 'Token:d1a74686-6d8b-11ed-b190-ea4934f9883e'));
        $result = curl_exec($c);
        curl_close($c);

        $temp_order->update(['order_code' => json_decode($result, true)['data']['order_code']]);
    }

}
