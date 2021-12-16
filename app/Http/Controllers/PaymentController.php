<?php

namespace App\Http\Controllers;

use App\Payment\PaymentMyfatoorahApiV2;
use Illuminate\Http\Request;

class PaymentController extends PaymentMyfatoorahApiV2
{
    private $apiKey;
    private $status;

    public function __construct()
    {

          
       // actual key
       $this->apiKey = '8sGCVwRfM6yRv9kZ8f5UeDDnNwPcnheZnhew1vc6QOKldvkD4w9oImQncjhQBLBZBefM22OjCF7gcXEnhuE-OPtuzzmxQtgzlEt7VByTLU4zM8R308_ROhIsisnFB8_5xHx3OTuaq481DNOmo1GLaRFMx2i1Y3BDPHwMYMl_diVQHtUMRrigC8UKwala1KywnshjuEOpFYE_i53s7hTexLeOjNVifSBNGUlhhROxZP_migy07J__y81FYuvrroYMEa116Qx5UJk103iL_EAKNppj2Ayc1RZfFj7PoDqI6SKvTJaGBWzBQxI3vNdNuGl1TBFyAgT23RSgMn7uB3KxhtRtE_vomAFuBe0-h2Kvr1LSqJ8YNTZCPre6WCUCsR27QCR_myAeWdsFMtZNagi-51E922vdjpBboeEm8Epa2DAOETR8938xutwl2jMcAfCWEH5fQfrMEe-gQeyHsAhrJ_VVgVPoOATUP4OIp0AeNQVqDvubc252-PToXK9JB1Fd02BbOl8xspnDG1YvCzX455-A21J7axtF2GUYoT2Tnhz_XYljwpw7QsfRLl7LWC2tsfEfIPcJoEHCLlo7J3xamkXJ6pfqHPLXR9C_k7vO4usimoSQMuECh1dtYvWLEyrO0F5_Snf4n_vmHmBqk89sJc8AY-lbR6G1jCtgDjPAFg_Dqlh9ZdtTw28O9-VJrORiNiccUBphyi7eWMjMJCczGrrmZrFUjolEj-gY-QgFFKSl0Ik_';


        // test key 
        //$this->apiKey = 'rLtt6JWvbUHDDhsZnfpAhpYk4dxYDQkbcPTyGaKp2TYqQgG7FGZ5Th_WD53Oq8Ebz6A53njUoo1w3pjU1D4vs_ZMqFiz_j0urb_BH9Oq9VZoKFoJEDAbRZepGcQanImyYrry7Kt6MnMdgfG5jn4HngWoRdKduNNyP4kzcp3mRv7x00ahkm9LAK7ZRieg7k1PDAnBIOG3EyVSJ5kK4WLMvYr7sCwHbHcu4A5WwelxYK0GMJy37bNAarSJDFQsJ2ZvJjvMDmfWwDVFEVe_5tOomfVNt6bOg9mexbGjMrnHBnKnZR1vQbBtQieDlQepzTZMuQrSuKn-t5XZM7V6fCW7oP-uXGX-sMOajeX65JOf6XVpk29DP6ro8WTAflCDANC193yof8-f5_EYY-3hXhJj7RBXmizDpneEQDSaSz5sFk0sV5qPcARJ9zGG73vuGFyenjPPmtDtXtpx35A-BVcOSBYVIWe9kndG3nclfefjKEuZ3m4jL9Gg1h2JBvmXSMYiZtp9MR5I6pvbvylU_PP5xJFSjVTIz7IQSjcVGO41npnwIxRXNRxFOdIUHn0tjQ-7LwvEcTXyPsHXcMD8WtgBh-wxR8aKX7WPSsT1O8d8reb2aR7K3rkV3K82K_0OgawImEpwSvp9MNKynEAJQS6ZHe_J_l77652xwPNxMRTMASk1ZsJL';
     
    }

    public function store(string $sort)
    {
        if($sort == 'delivering') { return redirect()->route('success',$sort);  }
       
        $payment = new PaymentMyfatoorahApiV2($this->apiKey, false);
       
        $payment->excutePayment(5, [
           'PaymentMethodId' => 1,
           'CustomerName' => 'ahmed',
           'DisplayCurrencyIso' => 'kwd',
           'MobileCountryCode' => '‎+965',
           'CustomerMobile' => '12345678',
           'CustomerEmail' => 'client@domain.com',
           'InvoiceValue' => request()->total,
           'Language' => 'ar',
           'InvoiceItems' => [[
            "ItemName"=> "item",
            "Quantity"=> 1,
            "UnitPrice"=> request()->total,
           ]], 
           'CallBackUrl' => 'http://joomlakw.com/success/myFatoorah'
         , 'ErrorUrl' => 'http://joomlakw.com/fail'], 1);

       
    }
}
