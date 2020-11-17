<?php

namespace App\Http\Controllers;

use App\Classes\GpFunctions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GPSubscriptionController extends Controller
{
    public function subRequest(Request $request,$msisdn,$package){
        $virtualMsisdn=null;
        if(isset($request->endUserId)){
            $virtualMsisdn->$request->endUserId;
        }
        if (session()->has('expiresIn')) {
            if (session()->get('expiresIn') < round(microtime(true) * 1000)) {
                $tokenResponse = GpFunctions::createToken();
                session()->put('accessToken',$tokenResponse['accessToken']);
                session()->put('expiresIn',round(microtime(true) * 1000) + ($tokenResponse['expiresIn'] * 1000));
            } else {

            }
        } else {
            $tokenResponse = GpFunctions::createToken();
            session()->put('accessToken',$tokenResponse['accessToken']);
            session()->put('expiresIn',round(microtime(true) * 1000) + ($tokenResponse['expiresIn'] * 1000));

        }

        $m = DB::select(DB::raw("SELECT MAX(id) AS id FROM `gp_subscription_request`"));
        $trans_id = "";

        if ($m[0]->id != null || $m[0]->id != '') {
            $trans_id = ($m[0]->id + rand(100, 2000));
        } else {
            $trans_id = rand(100, 2000);
        }
        $subArray = null;
        $channel_id = null;
        if ($package == 'Daily') {
            $channel_id = "bc066cf34f3745068ed154a258864add";
        }
        else if ($package == 'Weekly') {
            $channel_id = "8d5d0c6fdf22405ea5ed5755ae4c8139";
        }
        else if ($package == 'Monthly') {
            $channel_id = "a83b13ce596f45dba0ab138db5027a43";
        }

$cd = date('Y-m-d h:i:s', time());

$query = "INSERT INTO `gp_subscription_request`(`id`, `trans_id`, `msisdn`,`channel_id`,`plan`, `reference_code`, `status`, `virtual_msisdn`, `created_date`, `updated_date`) VALUES (NULL,'$trans_id','$msisdn','$channel_id','$package','','','','$cd','$cd')";
$re = DB::select(DB::raw($query));

        if ($package == 'Daily') {
            $subArray = GpFunctions::subscriptionDaily($channel_id, $trans_id, "test");
        }
        else if ($package == 'Weekly') {
            $subArray = GpFunctions::subscriptionWeekly($channel_id, $trans_id, "Weekly package For Leenbo");
        }
        else if ($package == 'Monthly') {
            $subArray = GpFunctions::subscriptionMonthly($channel_id, $trans_id, "Monthly package");
        }

//        dd($subArray);

$status = $subArray['status'];
        if ($status == 200 || $status == '200') {
            $id = $subArray['id'];
            $subUrl = $subArray['href'];

            session()->put('href',$subUrl);
            $reference_code = $subArray['message'];
            $ud = date('Y-m-d h:i:s', time());
            $upSql = "UPDATE `gp_subscription_request` SET `reference_code`='$reference_code',`status`='sub_request',`updated_date`='$ud' WHERE `trans_id`='$id'";
            $re = DB::select(DB::raw($upSql));
            if (($msisdn != false || $msisdn != null || $msisdn != '') && ($virtualMsisdn == null || $virtualMsisdn == '')) {
                    ?>
                <script>
                    window.location.href = "<?php echo $subUrl; ?>";
                </script>

                <?php
            } else {
                ?>
                <script>
                    window.location.href = "<?php echo $subUrl; ?>";
                </script>
                <?php
            }
        }
        else {

            if ($status == 500 || $status == '500') {
                session()->flash('failedMsg','500Something Went Wrong!! Please Try Again Later.');
               return redirect()->route('welcome');
            }
            session()->flash('failedMsg','Something Went Wrong!! Please Try Again Later.');
            return redirect()->route('welcome');
        }

    }

    public  function success(Request $request){
        $reference_code =$request->referenceCode;

        $cd = date('Y-m-d h:i:s', time());

        $upSql = "UPDATE `gp_subscription_request` SET `status`='success',`updated_date`='$cd' WHERE `reference_code`='$reference_code'";
        $re = DB::select(DB::raw($upSql));

        $selectMsisdnResult = DB::select(DB::raw("SELECT msisdn,plan,channel_id FROM `gp_subscription_request`  WHERE `reference_code`='$reference_code'"));


        $rowmsisdn = $selectMsisdnResult[0];
//        dd($rowmsisdn);
        $msisdn = $rowmsisdn->msisdn;
        $plan = $rowmsisdn->plan;
        $channel_id=$rowmsisdn->channel_id;
        if ($msisdn != null || $msisdn != '') {
            $validity=1;
            if($plan=='Daily'){
                $validity=1;
            }elseif ($plan=='Weekly') {
                $validity=7;
            }elseif ($plan=='Monthly') {
                $validity=30;
            }
            $sql_subscription = "INSERT INTO leenbo.subscription_detail VALUES (null,'', '$msisdn', '$plan', '$plan', '$cd', '$cd' + interval '$validity' day, '$cd' + interval '$validity'+1 day, 'Y', 'Y', '$reference_code') ON DUPLICATE KEY UPDATE plan_id = '$plan', service_id ='$plan', start_date = '$cd', end_date = '$cd' + interval '$validity' day, renewal_date = '$cd' + interval '$validity'+1 day, renew = 'Y', callback = 'Y', transaction_id = '$reference_code';";
            DB::select(DB::raw($sql_subscription));

            $sql_subscription_gp = "INSERT INTO subscription_detail_gp VALUES (null,'', '$msisdn','$channel_id','$reference_code','', '$plan', '$plan', '$cd', '$cd' + interval '$validity' day,'$cd'+ interval '$validity'+1 day, 'Y', 'Y', '$reference_code') ON DUPLICATE KEY UPDATE channel_id='$channel_id',virtual_subno='', reference_code='$reference_code', plan_id = '$plan', service_id ='$plan', start_date = '$cd', end_date = '$cd' + interval '$validity' day, renewal_date = '$cd' + interval '$validity'+1 day, renew = 'Y', callback = 'Y', transaction_id = '$reference_code';";
            DB::select(DB::raw($sql_subscription_gp));

            session()->flash('successMsg','You have successfully subscribed! enjoy & learn by watching amazing videos!');
            session()->put('msisdn',$msisdn);
            session()->put('subscription',true);
            return redirect()->route('myvideos');

        }
    }
    public  function failed(Request $request){
        $reference_code =$request->referenceCode;
        $cd = date('Y-m-d h:i:s', time());
        $upSql = "UPDATE `gp_subscription_request` SET `status`='failed',`updated_date`='$cd' WHERE `reference_code`='$reference_code'";
        $re = DB::select(DB::raw($upSql));
        session()->flash('successMsg','Subscription Process failed! Try again later');
        return redirect()->route('welcome');
    }
    public  function cancelled(Request $request){
        $reference_code =$request->referenceCode;
        $cd = date('Y-m-d h:i:s', time());
        $upSql = "UPDATE `gp_subscription_request` SET `status`='cancelled',`updated_date`='$cd' WHERE `reference_code`='$reference_code'";
        $re = DB::select(DB::raw($upSql));
        session()->flash('successMsg','You have cancelled the subscription process!');
        return redirect()->route('welcome');
    }


}
