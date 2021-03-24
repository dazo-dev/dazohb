<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Support\Facades\Auth;
use DateTime;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function checkout($type, $amount, $status = null){

    	$transId = DB::table('hb_transactions')->orderBy('id', 'desc')->pluck('id')->first();
    	$transacrId = '';
    	$transacrDetails = '';

    	if ($transId == null) {
    		$transacrId = sprintf("%06d", 1);
    	}else{
    		$transacrId = $transId + 1;
    	}

    	$authEmail = Auth::user()->email;

    	if ($type == 'coin') {
    		$transacrDetails = "Payment for Dazo ". $amount ." Coins";
    	}else{
    		$transacrDetails = "Payment for Subscription amounting to ". $amount;
    	}

        $activeUser = $this->replace_space(Auth::user()->name);
        $linkEmail = $this->replace_at_sign(Auth::user()->email);
        $linkDescription = $this->replace_space($transacrDetails);

        $aaaa = '';

        if ($status != null) {
            switch ($status) {
              case "S":
                $aaaa = 'S';
                break;
              case "P":
                $aaaa = 'P';
                break;
              case "U":
                $aaaa = 'U';
                break;
              case "F":
                $aaaa = 'F';
                break;
            }

            return view('checkout')->with('data', ['transType' => $type, 'transAmount' => $amount, 'transId' => $transacrId, 'authEmail' => $authEmail, 'linkEmail' => $linkEmail, 'linkDescription' => $linkDescription, 'authUser' => $activeUser, 'transacrDetails' => $transacrDetails, 'transStatus' => $aaaa]);
        }else{
           return view('checkout')->with('data', ['transType' => $type, 'transAmount' => $amount, 'transId' => $transacrId, 'authEmail' => $authEmail, 'linkEmail' => $linkEmail, 'linkDescription' => $linkDescription, 'authUser' => $activeUser, 'transacrDetails' => $transacrDetails]); 
        }

    	

    }

    public function getTransStatus( Request $request ){

        $allDetails = $request->all();



        $mId = env('DP_MERCHANT_ID');
        $mps = env('DP_MERCHANT_PASSWORD');
        // $txd = $allDetails['transId'];


        $a = '';

        switch (strlen($allDetails['transId'])) {
          case 1:
            $a = '00000'.$allDetails['transId'];
            break;
          case 2:
            $a = '0000'.$allDetails['transId'];
            break;
          case 3:
            $a = '000'.$allDetails['transId'];
            break;
          case 4:
            $a = '00'.$allDetails['transId'];
            break;
          case 5:
            $a = '0'.$allDetails['transId'];
            break;
          default:
            $a = $allDetails['transId'];
        }

        // init curl object        
        $ch = curl_init();

        // define options
        $optArray = array(
            CURLOPT_URL => 'https://test.dragonpay.ph/MerchantRequest.aspx?op=GETSTATUS&merchantid='.$mId.'&merchantpwd='.$mps.'&txnid='.$a,
            CURLOPT_RETURNTRANSFER => true
        );

        // apply those options
        curl_setopt_array($ch, $optArray);

        // execute request and get response
        $result = curl_exec($ch);


        DB::table('hb_transactions')
              ->where('id', $allDetails['transId'])
              ->update(['status' => $result]);

        $cuCoins = DB::table('users')->where('id', Auth::user()->id)->pluck('coins')->first();
        $coinsadd = 0;


        if ($result == 'S' || $result == "S") {


            if ($allDetails['amount'] == 100) {
                $coinsadd = $cuCoins + 100;
            }elseif ($allDetails['amount'] == 500) {
                $coinsadd = $cuCoins + 520;
            }elseif ($allDetails['amount'] == 1000) {
                $coinsadd = $cuCoins + 1200;
            }

            DB::table('users')
              ->where('id', Auth::user()->id)
              ->update(['coins' => $coinsadd]);
        }

        $res['data'] = $result;
        $res['success'] = true;

        return response($res, 200);

    }

    public function replace_space($string) {
        $string = str_replace(" ", "+", $string);
        return $string;
    }

    public function replace_at_sign($string) {
        $string = str_replace("@", "%40", $string);
        return $string;
    }

    public function doTransaction( Request $request ){

        $allDetails = $request->all();

        $dpEnv = env('DP_STATUS');


        $a = '';

        switch (strlen($allDetails['transId'])) {
          case 1:
            $a = '00000'.$allDetails['transId'];
            break;
          case 2:
            $a = '0000'.$allDetails['transId'];
            break;
          case 3:
            $a = '000'.$allDetails['transId'];
            break;
          case 4:
            $a = '00'.$allDetails['transId'];
            break;
          case 5:
            $a = '0'.$allDetails['transId'];
            break;
          default:
            $a = $allDetails['transId'];
        }

        // var_dump($allDetails);
        // die();

        $errors = array();
        $is_link = false;

        $parameters = array(
          'merchantid' => env('DP_MERCHANT_ID'),
          'txnid' => $a,
          'amount' => $allDetails['transAmount'],
          'ccy' => 'PHP',
          'description' => $allDetails['transDescription'],
          'email' => $allDetails['transEmail'],
        );


        $fields = array(
          'txnid' => array(
              'label' => 'Transaction ID',
              'type' => 'text',
              'attributes' => array(),
              'filter' => FILTER_SANITIZE_STRING,
              'filter_flags' => array(FILTER_FLAG_STRIP_LOW),
          ),
          'amount' => array(
              'label' => 'Amount',
              'type' => 'number',
              'attributes' => array('step="0.01"'),
              'filter' => FILTER_SANITIZE_NUMBER_FLOAT,
              'filter_flags' => array(FILTER_FLAG_ALLOW_THOUSAND, FILTER_FLAG_ALLOW_FRACTION),
          ),
          'description' => array(
              'label' => 'Description',
              'type' => 'text',
              'attributes' => array(),
              'filter' => FILTER_SANITIZE_STRING,
              'filter_flags' => array(FILTER_FLAG_STRIP_LOW),
          ),
          'email' => array(
              'label' => 'Email',
              'type' => 'email',
              'attributes' => array(),
              'filter' => FILTER_SANITIZE_EMAIL,
              'filter_flags' => array(),
          ),
        );

        // Check for set values.
        foreach ($fields as $key => $value) {
          // Sanitize user input. However:
          // NOTE: this is a sample, user's SHOULD NOT be inputting these values.
          if (isset($_POST[$key])) {
              $parameters[$key] = filter_input(INPUT_POST, $key, $value['filter'],
                array_reduce($value['filter_flags'], function ($a, $b) { return $a | $b; }, 0));
          }
        }

        // Validate values.
        // Example, amount validation.
        // Do not rely on browser validation as the client can manually send
        // invalid values, or be using old browsers.
        if (!is_numeric($parameters['amount'])) {
          $errors[] = 'Amount should be a number.';
        }
        else if ($parameters['amount'] <= 0) {
          $errors[] = 'Amount should be greater than 0.';
        }

        if (empty($errors)) {
          // Transform amount to correct format. (2 decimal places,
          // decimal separated by period, no thousands separator)
          $parameters['amount'] = number_format($parameters['amount'], 2, '.', '');
          // Unset later from parameter after digest.
          $parameters['key'] = env('DP_MERCHANT_PASSWORD');
          $digest_string = implode(':', $parameters);
          unset($parameters['key']);
          // NOTE: To check for invalid digest errors,
          // uncomment this to see the digest string generated for computation.
          // var_dump($digest_string); $is_link = true;
          $parameters['digest'] = sha1($digest_string);

          if ($dpEnv == "TEST") {
            $url = 'http://test.dragonpay.ph/Pay.aspx?';
          }else{
            $url = 'https://gw.dragonpay.ph/Pay.aspx?';
          }

          $url .= http_build_query($parameters, '', '&');

          $abc = '';

          if ($is_link) {
            $abc = '<br><a href="' . $url . '">' . $url . '</a>';
          }
          else {
            $abc = $url;
            // header("Location: $url");
          }

          $coins = '';

          if ($allDetails['transAmount'] == 100) {
              $coins = 100;
          }elseif ($allDetails['transAmount'] == 500) {
              $coins = 520;
          }elseif ($allDetails['transAmount'] == 1000) {
              $coins = 1200;
          }

          DB::table('hb_transactions')->insert([
            'user_id' => Auth::user()->id,
            'trans_meta' => 'Payment',
            'trans_amount' => NULL,
            'coins' => $coins,
            'trans_p_mode' => 'Dragon Pay',
            'trans_package' => NULL,
            'start' => NULL,
            'end' => NULL
        ]);



            $res['data'] = $abc;
            $res['success'] = true;

            return response($res, 200);
        }



    }


    public function subscribe( Request $request ){

      $allDetails = $request->all();

      $totalAmount = $allDetails['totalAmount'];
      $proAmount   = $allDetails['proPack'] == 'Monthly' ? 300 : 1000;
      $nproAmount  = $allDetails['nproPack'] == '1 Day' ? 20 : 40;
      $proPackage  = $allDetails['proPack'];
      $nproPacakge = $allDetails['nproPack'];
      $firstDate   = $allDetails['fDate'];
      $secondDate  = ( $allDetails['sDate'] == '' ? $allDetails['fDate'] : $allDetails['sDate']);

      // $proStart = strtotime(date('Y-m-d'));
      // $proEnd = date('Y-m-d', strtotime('+1 month', $proStart));

      $dt1 = new DateTime();
      $proStart = $dt1->format("Y-m-d");

      $dt2 = new DateTime("+1 month");
      $proEnd = $dt2->format("Y-m-d");

      // Insert in Subscription

      DB::table('hb_subscription')->insert([
            'user_id' => Auth::user()->id,
            'total_coins' => $nproAmount,
            'sub_package' => 'daily',
            'reg_date' => date('Y-m-d'),
            'start_reg' => $firstDate,
            'end_reg' => $secondDate
        ]);

      DB::table('users')
              ->where('id', Auth::user()->id)
              ->update(['coins' => DB::raw('coins - '.$nproAmount)]);

      $nProremCoins = DB::table('users')->where('id', Auth::user()->id)->pluck('coins')->first();

      // Insert Transaction for Non Pro
      DB::table('hb_transactions')->insert([
            'user_id' => Auth::user()->id,
            'trans_meta' => 'Subscription',
            'trans_amount' => $nproAmount,
            'coins' => $nProremCoins,
            'trans_p_mode' => 'Dazo Platform',
            'trans_package' => 'Daily',
            'start' => $firstDate,
            'end' => $secondDate
        ]);

      // Update in Users
      if ($proPackage != '') {
        DB::table('users')
              ->where('id', Auth::user()->id)
              ->update([
                'coins' => DB::raw('coins - '.$proAmount),
                'is_subscribed' => 1,
                'subscription_type' => strtolower($proPackage),
                'sub_start' => $proStart,
                'sub_end' => $proEnd
              ]);

        $ProremCoins = DB::table('users')->where('id', Auth::user()->id)->pluck('coins')->first();

        // Insert Transaction for Pro
      DB::table('hb_transactions')->insert([
            'user_id' => Auth::user()->id,
            'trans_meta' => 'Subscription',
            'trans_amount' => $proAmount,
            'coins' => $ProremCoins,
            'trans_p_mode' => 'Dazo Platform',
            'trans_package' => $proPackage,
            'start' => $firstDate,
            'end' => $secondDate
        ]);
      }

      
      

      $res['success'] = true;

      return response($res, 200);

    }


    public function checkDailysub( Request $request ){

        $allDetails = $request->all();
        $myDaily = DB::select(
                DB::raw("select count(*) as count from hb_subscription where user_id = ".Auth::user()->id." and (start_reg = '".$allDetails['targetDate']."' OR end_reg = '".$allDetails['targetDate']."')"));

        $res['success'] = true;
        $res['data'] = $myDaily[0]->count;

        return response($res, 200);

    }


    public function checkProsub( Request $request ){

        $allDetails = $request->all();

        $myStatus = 0;

        $myMonthly = DB::table('users')
                     ->where('id', Auth::user()->id)
                     ->pluck('is_subscribed')->first();

        if ($myMonthly == 1) {
          $myStatus = 1;
        }else{
          $myDaily = DB::select(
                DB::raw("select count(*) as count from hb_subscription where user_id = ".Auth::user()->id." and (start_reg = '".$allDetails['targetDate']."' OR end_reg = '".$allDetails['targetDate']."')"));

          if ($myDaily[0]->count > 0) {
            $myStatus = 1;
          }else{
            $myStatus = 0;
          }
        }

        

        $res['success'] = true;
        $res['data'] = $myStatus;

        return response($res, 200);

    }



    
}
