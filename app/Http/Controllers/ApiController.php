<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banner;
use App\Models\CustomProduct;
use App\Models\CustomPattern;
use App\Models\ArtisanCategory;
use App\Models\ArtisanProduct;
use App\Models\PriceCategory;
use App\Models\TypeCategory;
use App\Models\Settings;
use App\Models\Cart;
use App\Models\Address;
use App\Models\Order;
use App\Models\OrderStatus;
use App\Models\Province;
use App\Models\City;
use App\Models\PostalCode;
use App\Models\Transaction;
use App\Models\PromotionCode;

use App\User;

use File;
use Artisan;
use GuzzleHttp\Psr7\Request as GuzzleRequest;
use Config\Constants;


use Illuminate\Support\Facades\Hash;


class ApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function Login(Request $request){

        $user =  User::where('email', $request->input('email'))
                ->where('role', Config('Constants.userrole.customer'))
                ->first();

        
        if(!is_null($user) && (!$user->is_social && Hash::check( $request->input('password'), $user['password']) || $user->is_social)){

            if(!is_null($user->profile_image)){

                $user->ProfileImageData = base64_encode(file_get_contents($user->profile_image));
                $arr = explode('/', $user->profile_image);

                $user->profile_image = $arr[sizeof($arr) - 1];
            }
            else
                $user->ProfileImageData = null;

            return $user;
        }
            
        return '';
    }


    public function Signup(Request $request){

        // $validatedData = $request->validate([
        //     'name'              => 'required|min:1|max:255',
        //     'email'             => 'required|max:255|unique:users',
        //     'password'          => 'required|min:1|max:255',
        // ]);

        $tempUser = User::where('email', $request->input('email'))->first();

        if($tempUser != null)
            if(!$request->input('is_social'))
                return "Duplicated Email Address";
            else
                return $tempUser;


        $created = new User();

        $created->name = $request->input('name');
        $created->email = $request->input('email');

        if(!is_null($request->input('password')))
            $created->password = Hash::make($request->input('password'));

        $created->phone     = $request->input('phone');
        $created->birthday  = $request->input('birthday');
        $created->gender    = $request->input('gender');
        $created->is_social = $request->input('is_social');

        $created->role = Config('Constants.userrole.customer');


        $created->save();

        return $created;
    }


    public function UpdateUser(Request $request){

        $user = User::find($request->input('user_id'));

        $user->name     = $request->input('name');
        $user->email    = $request->input('email');
        $user->gender   = $request->input('gender');
        $user->birthday = $request->input('birthday');
        $user->phone    = $request->input('phone');

        $user->save();

        return $user;
    }


    public function Banners(){

        $banners = Banner::all();
    
        foreach($banners as $banner){

            $filepath = $banner['filepath'];
            $file_paths = explode('/', $filepath);
            $filename = end($file_paths);
            
            unset($banner['filepath']);
            $banner['filename'] = $filename;
            $banner['image'] = base64_encode(file_get_contents($filepath));
        }

        return $banners;
    }

    public function CustomProducts(){

        $customs = CustomProduct::all();
    
        foreach($customs as $custom){

            $filepath = $custom['Preview'];
            $file_paths = explode('/', $filepath);
            $filename = end($file_paths);
            

            $custom['Label']            = $custom["Name"];
            $custom['Description']      = $custom["Description"];
            $custom['PreviewFileName']  = $filename;
            $custom['PreviewFileData']  = base64_encode(file_get_contents($filepath));
            $custom["Count"]            = 0;
            $custom["ArtisanCatalogId"] = "";


            unset($custom['Model']);
            unset($custom['Submitter']);
        }
        return $customs;
    }

    public function ArtisanCategories(){

        $ArtisanCategories = ArtisanCategory::all();

        foreach($ArtisanCategories as $category){

            $filepath = $category['PreviewImage'];
            $file_paths = explode('/', $filepath);
            $filename = end($file_paths);

            $category['PreviewFileName']  = $filename;
            $category['PreviewFileData']  = base64_encode(file_get_contents($filepath));

            if(is_null($category['Status']))
                $category['Status'] = 0;

            unset($category['Submitter']);
        }

        return $ArtisanCategories;
    }

    public function ArtisanProducts(){

        $ArtisanProducts = ArtisanProduct::all();

        foreach($ArtisanProducts as $product){

            $filepath = $product['Preview'];
            $file_paths = explode('/', $filepath);
            $filename = end($file_paths);

            $product['PreviewFileName']  = $filename;
            $product['PreviewFileData']  = base64_encode(file_get_contents($filepath));

            unset($product['Submitter']);
        }

        return $ArtisanProducts;
    }


    public function CustomPatterns(){

        $patterns = CustomPattern::where('Approved', true)->get();
        
        foreach($patterns as $pattern){

            $filepath = $pattern['Preview'];
            $file_paths = explode('/', $filepath);
            $filename = end($file_paths);
            
            unset($pattern['Submitter']);
            
            $pattern['PreviewFileName'] = $filename;
            $pattern['PreviewFileData'] = base64_encode(file_get_contents($filepath));
        }

        return $patterns;
    }


    public function PriceCategories(){

        $PriceCategories = PriceCategory::all();
        return $PriceCategories;
    }


    public function TypeCategories(){

        $TypeCategories = TypeCategory::all();
        return $TypeCategories;
    }


    public function Settings(){

        $Settings = Settings::all();
        return $Settings;
    }


    public function OrderStatuses(){

        $OrderStatueses = OrderStatus::all();
        return $OrderStatueses;
    }




    /*****          Manage Cart API             *****/
    public function Carts(Request $request){
        
        $Carts = Cart::where('UserId', $request->input('UserId'))->get();
        
            
        foreach($Carts as $cart){

            if($cart->IsArtisan == false){

                // $CustomImages = explode(Config("Constants.directory.seperater"), $cart->CustomImages);
                // foreach($CustomImages as $key => $filepath){

                //     $file_paths = explode('/', $filepath);
                //     $filename = end($file_paths);
                                        
                //     $cart['CustomFileName' . $key] = $filename;
                //     $cart['CustomFileData' . $key] = base64_encode(file_get_contents($filepath));
                // }
            }
            else {

            }


            $filepath = $cart['CustomImage'];
            $file_paths = explode('/', $filepath);
            $filename = end($file_paths);
            
            $cart['CustomImage'] = $filename;
            $cart['CustomImageData'] = base64_encode(file_get_contents($filepath));
        }


        return $Carts;
    }


    public function AddCart(Request $request){

        $Cart = new Cart();
        $Cart->UserId           = intval($request->input('UserId'));
        $Cart->ShoeId           = intval($request->input('ShoeId'));        
        $Cart->ShoePrice        = intval($request->input('ShoePrice'));
        $Cart->ShoeSize         = intval($request->input('ShoeSize'));
        $Cart->ShoeCount        = intval($request->input('ShoeCount'));
        $Cart->OrderId          = null;

        
        if($request->input('IsArtisan') == "False")
            $Cart->IsArtisan = false;
        else
            $Cart->IsArtisan = true;
            

        $Cart->CustomImages = '';

        if($Cart->IsArtisan == false){

            for( $i = 0; $i < Config('Constants.cart.image_count'); $i++){

                $filename = Config('Constants.directory.cart') . '/' . time() . $i . ".png";
                file_put_contents($filename, base64_decode($request->input('CustomImageData' . $i)));
    
                if($i == 0){
    
                    $Cart->CustomImage      = $filename;
                    $Cart->CustomImages     = $filename;
                }
                else 
                    $Cart->CustomImages .= Config("Constants.directory.seperater") . $filename;
            }
        }else {

            $ArtisanProduct = ArtisanProduct::find($Cart->ShoeId);
            $Cart->CustomImage      = $ArtisanProduct->Preview;
        }
        
        
        $Cart->save();

        $Cart['CustomImage'] = $request->input('CustomImage');
        return $Cart;
    }
    
    public function UpdateCart(Request $request){
        
        $Cart = Cart::where('Id', $request->input('Id'))->first();
        $Cart->ShoeCount        = intval($request->input('ShoeCount'));
        $Cart->OrderId          = intval($request->input('OrderId'));
        $Cart->save();

        return $Cart;
    }

    public function DeleteCart(Request $request){

        $Cart = Cart::where('Id', $request->input('Id'))->first();

        if(!$Cart->IsArtisan){

            $filepaths = explode(Config("Constants.directory.seperater"), $Cart->CustomImages);

            foreach($filepaths as $filepath)
                if(\File::exists($filepath)) \File::delete($filepath);
        }

        $Cart->delete();
        return $this->Carts($request);
    }



    /*****          Manage Address API          *****/

    public function AllAddress(Request $request){

        $Addresses = Address::where('UserId', $request->input('UserId'))->get();
        return $Addresses;
    }

    public function AddAddress(Request $request){

        $Address = new Address();
        $Address->UserId        = intval($request->input('UserId'));
        $Address->Alias         = $request->input('Alias');
        $Address->FullName      = $request->input('FullName');
        $Address->Country       = $request->input('Country');
        $Address->Province      = $request->input('Province');
        $Address->City          = $request->input('City');
        $Address->PostalCode    = $request->input('PostalCode');
        $Address->Phone         = $request->input('Phone');
        $Address->AddressDetail = $request->input('AddressDetail');
        
        $Address->save();
        
        return $Address;
    }

    public function UpdateAddress(Request $request){
        
        $Address = Address::find($request->input("Id"));
        $Address->UserId        = intval($request->input('UserId'));
        $Address->Alias         = $request->input('Alias');
        $Address->FullName      = $request->input('FullName');
        $Address->Country       = $request->input('Country');
        $Address->Province      = $request->input('Province');
        $Address->City          = $request->input('City');
        $Address->PostalCode    = $request->input('PostalCode');
        $Address->Phone         = $request->input('Phone');
        $Address->AddressDetail = $request->input('AddressDetail');
        
        $Address->save();
        
        return $Address;
    }

    public function DeleteAddress(Request $request){

        $Address = Address::find($request->input("Id"));
        $Address->delete();

        $Addresses = Address::where('UserId', $request->input('UserId'))->get();
        return $Addresses;
    }



    /*****          Manage Order API            ******/

    public function AllOrders(Request $request)
    {
        $Orders = Order::where('UserId', $request->input('UserId'))->get();
        return $Orders;
    }

    public function AddOrder(Request $request)
    {
        $Order = new Order();

        $Order->UserId          = intval($request->input('UserId'));
        $Order->Date            = $request->input('Date');
        $Order->TotalPrice      = intval($request->input('TotalPrice'));
        $Order->PromotionCode   = $request->input('PromotionCode');
        // $Order->PromotionCode   = "";
        $Order->Count           = intval($request->input('Count'));
        $Order->AddressIndex    = intval($request->input('AddressIndex'));
        $Order->Status          = intval($request->input('Status'));

        $Order->save();

        return $Order;
    }

    public function UpdateOrder(Request $request){

        $Order = Order::where('Id', $request->input('Id'))->first();

        if(!is_null($request->input('PromotionCode')) && !empty($request->input('PromotionCode')))
            $Order->PromotionCode   = $request->input('PromotionCode');

        $Order->AddressIndex    = intval($request->input('AddressIndex'));
        $Order->Status          = intval($request->input('Status'));
        
        $Order->save();

        return $Order;
    }

    public function ClearCache(Request $request){

        $exitCode = Artisan::call('cache:clear');
        return $exitCode;
    }


    // Addresses
    public function AllProvinces(Request $request){

        return Province::all();
    }

    public function Cities(Request $request){

        $Cities = City::where('province_id', $request->input('province_id'))->get();
        return $Cities;
    }

    public function PostalCode(Request $request){

        $PostalCode = PostalCode::where('city_id', $request->input('city_id'))->get();
        return $PostalCode;
    }


    // Payment

    public function SnapToken(Request $request){

        $client = new \GuzzleHttp\Client();
        
        try {
            $res = $client->request('POST', Config('Constants.api.payment_end_points'), 
                [
                'headers'   => [ 
                    'Accept'            => 'application/json',
                    'Content-Type'      => 'application/json',
                    'Authorization'     => 'Basic ' . base64_encode(Config('Constants.api.payment_server_key')),
                ],

                'query'     => 
                    [ 
                        'transaction_details' => 
                            [ 
                                'order_id'      => $request->input('OrderId'),
                                'gross_amount'  => $request->input('Price'),
                            ]
                    ]
                ]
            );

            $responseJson = $res->getBody()->getContents();
            $responseData = json_decode($responseJson, true);
            return $responseJson;

        } catch (GuzzleHttp\Exception\ClientException $e) {
            $response = $e->getResponse();
            $responseBodyAsString = $response->getBody(true);
            return $responseBodyAsString;
        }

        
        // $responseData = $responseData['data']['data'];
    }


    public function ChargeNotification(Request $request){

        if($request->input('status_code') == "200"){

            $Order = Order::where('Id', $request->input('order_id'))->get()->first();
            $Order->Status = 2;
            $Order->save();
        }

        
        $Transaction = new Transaction();

        $Transaction->order_id                  = $request->input('order_id');

        $Transaction->transaction_time          = $request->input('transaction_time');
        $Transaction->transaction_status        = $request->input('transaction_status');
        $Transaction->transaction_id            = $request->input('transaction_id');
        $Transaction->status_message            = $request->input('status_message');
        $Transaction->status_code               = $request->input('status_code');
        $Transaction->signature_key             = $request->input('signature_key');
        $Transaction->settlement_time           = $request->input('settlement_time');

        $Transaction->payment_type              = $request->input('payment_type');
        $Transaction->merchant_id               = $request->input('merchant_id');
        $Transaction->gross_amount              = $request->input('gross_amount');
        $Transaction->fraud_status              = $request->input('fraud_status');
        $Transaction->currency                  = $request->input('currency');
        $Transaction->approval_code             = $request->input('approval_code');

        $Transaction->save();
    }


    public function SetDefaultAddress(Request $request){

        $user =  User::where('id', $request->input('user_id'))->first();

        $user->default_address = $request->input('default_address');
        $user->save();

        return $user;
    }

    public function UpdateProfileImage(Request $request){

        try {
            $user =  User::where('id', $request->input('user_id'))->first();
            $filepath = $user->profile_image;
            
            if(\File::exists($filepath))
                \File::delete($filepath);


            $filepath = Config('Constants.directory.user') . '/' . $request->input('filename');
            file_put_contents($filepath, base64_decode($request->input('filedata')));

            
            $user->profile_image = $filepath;
            $user->save();


            $user->profile_image = $request->input('filename');
            $user->ProfileImageData = base64_encode(file_get_contents($filepath));

        } catch (Exception $e) {

            return $e->getMessage();
        }

        return $user;
    }

    function CheckPromotionCode(Request $request){

        $promotionCode =  PromotionCode::where('Code', $request->input('Code'))->first();

        if(is_null($promotionCode))
            return "No Promotion Code.";

        if(!is_null($promotionCode->UsedCustomer))
            return "The Promotion Code was already used.";

        return $promotionCode;
    }

    function SendForgotPwdCode(Request $request){

        $user = User::where('email', $request->input('email'))->first();
        
        if(is_null($user))
            return "There is no account registered with the email.";


        $rand_code = rand(1000, 9999);
        $user->remember_token = $rand_code;
        $user->save();

        $headers = 'From: Unreleased' . "\r\n" .
        $content = 'Need to reset your password? No problem. Please enter this code : ' . $rand_code . ' and you will be on your way. If you did not make this request, please ignore this email.';

        $result = mail($request->input("email"), "Reset Password", $content, $headers);

        return $user;
    }

    function ConfirmForgotPwdCode(Request $request){

        $user = User::where('email', $request->input('email'))
            ->where('remember_token', $request->input('code'))->first();

        if(is_null($user))
            return "Your can't reset your password with the token.";

        $user->remember_token = null;
        $user->save();

        return $user;
    }

    function ResetPassword(Request $request){

        $user = User::where('email', $request->input('email'))->first();
        $user->password = Hash::make($request->input('password'));
        $user->save();

        return $user;
    }
}