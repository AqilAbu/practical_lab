<?php
$error = "";
$shoebill = false;

if (isset($_POST['calculate'])) {
    echo "The input for the first kwh: " . $_POST['first'];

    $firstkwh = $_POST['first'];
    $secondkwh = $_POST['second'];
    $thirdkwh = $_POST['third'];
    $fourthkwh = $_POST['fourth'];
    $fifthkwh = $_POST['fifth'];

    if ($firstkwh == "") {
        $firstkwh = 0;
    }
    if ($secondkwh == "") {
        $secondkwh = 0;
    }
    if ($thirdkwh == "") {
        $thirdkwh = 0;
    }
    if ($fourthkwh == "") {
        $fourthkwh = 0;
    }
    if ($fifthkwh == "") {
        $fifthkwh = 0;
    }

    //validation 2

    if ($firstkwh < 0 || $secondkwh < 0 || $thirdkwh < 0 || $fourthkwh < 0 || $fifthkwh < 0) {
        $error = "Invalid input. Please enter a positive number.";
    }

    else if ($firstkwh + $secondkwh + $thirdkwh + $fourthkwh + $fifthkwh == 0) {
        $error = "Please enter at least one value!!";

        } else {
            
        

    $firstcharge = $firstkwh * 0.218;
    $secondcharge = $secondkwh * 0.344;
    $thirdcharge = $thirdkwh * 0.516;
    $fourthcharge = $fourthkwh * 0.546;
    $fifthcharge = $fifthkwh * 0.571;

    //totakwh 
    $totalkwh = $firstkwh + $secondkwh + $thirdkwh + $fourthkwh + $fifthkwh;
    //totalrm
    $totalcharge = $firstcharge + $secondcharge + $thirdcharge + $fourthcharge + $fifthcharge;
    //total sst 6% if above 600kwh
    if($totalkWh > 600){
        $sst = $totalcharge * 0.06;

        $totalcharge += $sst; 
        //takleh nak tunjuk sebab nak tunjuk total rm bila ada sst
        //pendek sikit
        //$totalcharge = $totalcharge + $sst;
    } else {
        $sst = 0;
    }

    //total semua tambah dengan sst sekali (jika ada)
    $totalbill = $totalcharge + $sst;

    $showbill = true;

    }
}
?>