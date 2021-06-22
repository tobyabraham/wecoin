<?php
session_start();
$rows = 0;
date_default_timezone_set('Africa/Lagos');
$conn=mysqli_connect('localhost','root','','wecoin') or die('Could not Connect My Sql:'.mysql_error());
if(!isset($_SESSION["user"])){
    header("location: /wecoin/login");  

}
if(isset($_SESSION["user"])){
    
    $email = $_SESSION['user'];
    $conn=mysqli_connect('localhost','root','','wecoin') or die('Could not Connect My Sql:'.mysql_error());
    $ss = mysqli_query($conn,"select * from users where email='$email'");
    $row = mysqli_fetch_array($ss);
    $_SESSION['userid'] = $row['user id'];
    $_SESSION['lastlogin'] = $row['last login'];
    $_SESSION['mainbalance'] = $row['main balance'];
    $_SESSION['spotbalance'] = $row['spot balance'];
    $_SESSION['marginbalance'] = $row['margin balance'];
    $_SESSION['demobalance'] = $row['demo balance'];
    $_SESSION['demospot'] = $row['demo spot'];
    $_SESSION['demomargin'] = $row['demo margin'];
    $_SESSION['fname'] = $row['first name'];
    $fname = $_SESSION['fname'];
   
    $fname = $fname[0];
    $_SESSION['lastlogin'] = $row['last login'];
    
    if(isset($_POST["options"])){
        $nrows = $_POST["options"] - 1;
        $rs=mysqli_query($conn, "SELECT * FROM `openorder` WHERE `Trade Type` LIKE '%SPOT%'  LIMIT $nrows,1");
        $rowa = mysqli_fetch_array($rs);
        $openday = $rowa['Day'];
        $result = $rowa['Amount'];
        $td = $rowa['Transaction ID'];
        $status = "Closed";
        $curdate = date("Y-M-d, h:i:sa");
        $closedate = date("Y-M-d, h:i:sa");
        $closetime = date("h:i:sa");
        $profit = array();
            $loss = array();
            for ($x = 0; $x < 2; $x++) {
            $profit[] = rand(25,35)/10;
            
            }
            for ($y = 0; $y < 5; $y++) {
                
                $loss[] = rand(-50,-25)/10;
                }
                $profitloss = array_merge($profit,$loss);
            shuffle($profitloss);
        $numofdays = $openday - date("d");
        for ($z = 0; $z < ($numofdays + 1); $z++) {
           $result = $result + ($result*($profitloss[$z]/100));
            
        }
        $percentpl = array_slice($profitloss,0,$numofdays+1);
        $percentpls = implode(",",$percentpl);
        $querytrans = "UPDATE `orderhistory` SET `Date`='$curdate',`Close Time`='$closedate',`Status`='$status',`Result`='$result',
        `%Profit/Loss`='$percentpls' WHERE `Transaction ID`='$td'";
        $queryuser = "UPDATE `users` SET `spot balance`=`spot balance` + '$result' WHERE `email` = '$email'";
        $queryopen = "DELETE FROM `openorder` WHERE `Transaction ID` = '$td'";
        mysqli_query($conn,$querytrans) or die("Could Not Perform the Query");
        mysqli_query($conn,$queryuser) or die("Could Not Perform the Query");
        mysqli_query($conn,$queryopen) or die("Could Not Perform the Query");
       
    }
    if(isset($_POST["totalsell"])){
        if($_POST["totalsell"]>$_SESSION["spotbalance"]){
            echo '<script >alert("Insufficient Balance")</script>';
        }
        
        if($_POST["totalsell"]<$_SESSION["spotbalance"]){
            $_SESSION["spotbalance"] = $_SESSION["spotbalance"] - $_POST["totalsell"];
            $spotb = $_SESSION["spotbalance"];
            $transactionid = rand(1111111111,9999999999);
            $opendate = date("Y-M-d, h:i:sa");
            $opentime = date("h:i:sa");
            $opendays = date("d");
            $pair = "BTC/USDT";
            $tradeprice = $_POST["totalsell"];
            $tradetype = "SPOT(Sell)";
            $result = $tradeprice;
            $profit = array();
            $loss = array();
            for ($x = 0; $x < 2; $x++) {
            $profit[] = rand(25,35)/10;
            
            }
            for ($y = 0; $y < 5; $y++) {
                
                $loss[] = rand(-50,-25)/10;
                }
            $profitloss = array_merge($profit,$loss);
            shuffle($profitloss);
                
            if(!isset($_POST["options"])){
                $status = "Active";
                $queryuse = "UPDATE `users` SET `spot balance`='$spotb' WHERE `email` = '$email'";
                mysqli_query($conn,$queryuse) or die("Could Not Perform the Query");

                $query = "INSERT INTO `openorder`(`email`,`Transaction ID`, `Amount`, `Pair`, `Date`, `Open Time`, `Status`,`Trade Type`,`Day`) 
                VALUES ('$email','$transactionid','$tradeprice','$pair','$opendate','$opendate','$status','$tradetype','$opendays')";
                 $queryhistory = "INSERT INTO `orderhistory`(`email`,`Transaction ID`, `Amount`, `Pair`, `Date`, `Open Time`, `Status`,`Trade Type`,`Day`) 
                 VALUES ('$email','$transactionid','$tradeprice','$pair','$opendate','$opendate','$status','$tradetype','$opendays')";
                
                mysqli_query($conn,$query) or die("Could Not Perform the Query");
                mysqli_query($conn,$queryhistory) or die("Could Not Perform the Query");

                $ss=mysqli_query($conn, "SELECT * FROM `openorder` WHERE `Transaction ID` = '$transactionid'");
                $row = mysqli_fetch_array($ss);
                $openday = $row['Day'];
                if($opendays>($openday+6)){
                    $vs=mysqli_query($conn, "SELECT * FROM `openorder` WHERE `Transaction ID` = '$transactionid'");
                    $rown = mysqli_fetch_array($vs);
                    $openday = $rown['Day'];
                    $status = "Closed";
                    $curdate = date("Y-M-d, h:i:sa");
                    $closedate = date("Y-M-d, h:i:sa");
                    $closetime = date("h:i:sa");
                    
                    $numofdays = $openday - date("d");
                    for ($z = 0; $z < ($numofdays + 1); $y++) {
                       $result = $result + ($result*($profitloss[$z]/100));
                        
                    }
                    $querytrans = "UPDATE `orderhistory` SET `Date`='$curdate',`Close Time`=$closedate,`Status`='$status',`Result`='$result'
                    WHERE `Transaction ID`='$transactionid'";
                    $queryuser = "UPDATE `users` SET `spot balance`='$result' WHERE `email` = '$email'";
                    mysqli_query($conn,$querytrans) or die("Could Not Perform the Query");
                    mysqli_query($conn,$queryuser) or die("Could Not Perform the Query");
                }
            }
           
            
    }
    

    }
    if(isset($_POST["buyprice"])){
        if($_POST["buyprice"]>$_SESSION["spotbalance"]){
            echo '<script >alert("Insufficient Balance")</script>';
        }
        
        if($_POST["buyprice"]<$_SESSION["spotbalance"]){
            $_SESSION["spotbalance"] = $_SESSION["spotbalance"] - $_POST["buyprice"];
            $spotb = $_SESSION["spotbalance"];
            $transactionid = rand(1111111111,9999999999);
            $opendate = date("Y-M-d, h:i:sa");
            $opentime = date("h:i:sa");
            $opendays = date("d");
            $pair = "BTC/USDT";
            $tradeprice = $_POST["buyprice"];
            $tradetype = "SPOT(Buy)";
            $result = $tradeprice;
            $profit = array();
            $loss = array();
            for ($x = 0; $x < 2; $x++) {
            $profit[] = rand(25,35)/10;
            $btcequiv = round($_SESSION['dollar']*$_POST['buyprice'],8);
            
            }
            for ($y = 0; $y < 5; $y++) {
                
                $loss[] = rand(-50,-25)/10;
                }
            $profitloss = array_merge($profit,$loss);
            shuffle($profitloss);
                
            if(!isset($_POST["options"])){
                $status = "Active";
                $queryuse = "UPDATE `users` SET `spot balance`='$spotb' WHERE `email` = '$email'";
                mysqli_query($conn,$queryuse) or die("Could Not Perform the Query");

                $query = "INSERT INTO `openorder`(`email`,`Transaction ID`, `Amount`, `Pair`, `Date`, `Open Time`, `Status`,`Trade Type`,`Day`) 
                VALUES ('$email','$transactionid','$tradeprice','$pair','$opendate','$opendate','$status','$tradetype','$opendays')";
                 $queryhistory = "INSERT INTO `orderhistory`(`email`,`Transaction ID`, `Amount`, `Pair`, `Date`, `Open Time`, `Status`,`Trade Type`,`Day`) 
                 VALUES ('$email','$transactionid','$tradeprice','$pair','$opendate','$opendate','$status','$tradetype','$opendays')";
                
                mysqli_query($conn,$query) or die("Could Not Perform the Query");
                mysqli_query($conn,$queryhistory) or die("Could Not Perform the Query");

                $ss=mysqli_query($conn, "SELECT * FROM `openorder` WHERE `Transaction ID` = '$transactionid'");
                $row = mysqli_fetch_array($ss);
                $openday = $row['Day'];
                if($opendays>($openday+6)){
                    $vs=mysqli_query($conn, "SELECT * FROM `openorder` WHERE `Transaction ID` = '$transactionid'");
                    $rown = mysqli_fetch_array($vs);
                    $openday = $rown['Day'];
                    $status = "Closed";
                    $curdate = date("Y-M-d, h:i:sa");
                    $closedate = date("Y-M-d, h:i:sa");
                    $closetime = date("h:i:sa");
                    
                    $numofdays = $openday - date("d");
                    for ($z = 0; $z < ($numofdays + 1); $y++) {
                       $result = $result + ($result*($profitloss[$z]/100));
                        
                    }
                    $querytrans = "UPDATE `orderhistory` SET `Date`='$curdate',`Close Time`=$closedate,`Status`='$status',`Result`='$result'
                    WHERE `Transaction ID`='$transactionid'";
                    $queryuser = "UPDATE `users` SET `spot balance`='$result' WHERE `email` = '$email'";
                    mysqli_query($conn,$querytrans) or die("Could Not Perform the Query");
                    mysqli_query($conn,$queryuser) or die("Could Not Perform the Query");
                }
            }
           
            
    }
    


}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Spot | WeCoin Trade</title>
    <link rel="stylesheet" href="style.css">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap-theme.min.css"
        integrity="sha384-6pzBo3FDv/PJ8r2KRkGHifhEocL+1X2rVCTTkUfGk7/0pbek5mMa1upzvWbrUbOZ" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link
        href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:ital,wght@0,100;0,200;0,300;0,400;1,100;1,500&family=Signika+Negative:wght@400;700&display=swap"
        rel="stylesheet">
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"
        integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd"
        crossorigin="anonymous"></script>
   

  
        <style>
            * {
                padding: 0px;
                margin: 0px;
                box-sizing: border-box;


            }

            body {
                font-family: "IBM Plex Sans,sans-serif";
                font-family: "Signika Negative, sans-serif";
            }

            html body {
                font-family: "IBM Plex Sans,sans-serif";
                font-family: "Signika Negative, sans-serif";
            }

            header {
                position: absolute;
                top: 0px;
                left: 0px;
                width: 100%;

                display: flex;
                justify-content: space-between;
                align-items: center;
                padding: 15px 100px;
                z-index: 10;
                background: rgb(20, 21, 26);

            }

            header .mylogo {
                position: relative;
            }

            header .navigation {
                display: flex;
                justify-content: center;
                flex-wrap: wrap;
                margin: 10px 0;

            }

            header .navigation li {
                list-style: none;
                margin: 0 10px;
            }

            header .navigation li a {
                color: white;
                text-decoration: none;
                font-weight: 500;
                letter-spacing: 1px;
                padding: 5px;
            }

            header .navigation li a span:hover {
                color: #F0B90B;
            }

            #ask {
                font-family: 'IBM Plex Sans', sans-serif;
                font-family: 'Signika Negative', sans-serif;
            }

            #bid {
                font-family: 'IBM Plex Sans', sans-serif;
                font-family: 'Signika Negative', sans-serif;
            }

ul li a:hover{
    color: white !important;
    background-color: rgb(20, 21, 26) !important;

}/* Dropdown Content (Hidden by Default) */
.dropdown-content {
  display: none;
  position: absolute;
  background-color: #0a0909;
  min-width: 200px;
  
  box-shadow: 10px 4px 8px 10px rgba(0,0,0,0.2);
  z-index: 1;
  font-size: 13px;
}

/* Links inside the dropdown */
.dropdown-content a {
  color: rgb(230, 228, 223);
  padding: 10px 18px;
  text-decoration: none;
  display: block;
}

/* Change color of dropdown links on hover */
.dropdown-content a:hover {background-color: rgb(184, 122, 8);}

/* Show the dropdown menu on hover */
.dropdown:hover .dropdown-content {display: block;}

/* Change the background color of the dropdown button when the dropdown content is shown */
.dropdown:hover .dropbtn {background-color: #3e8e41;}
.css-1atcjr2 {
    margin-left: 16px;
}
            .css-1oy6ugm:first-of-type {
                margin-top: 0px;
            }

            .css-1oy6ugm {
                margin: 8px 0px 4px;
                margin-top: 8px;
                min-width: 0px;
                width: 100%;
                box-sizing: border-box;
                border-radius: 4px;
                background-color: rgba(43, 47, 54, 0.9);
            }

            .css-1if2ycv {
                box-sizing: border-box;
                margin: 0px;
                min-width: 0px;
                display: inline-flex;
                position: relative;
                height: 32px;
                -moz-box-align: center;
                align-items: center;
                line-height: 1.6;
                border: 1px solid rgba(43, 47, 54, 0.8);
                border-radius: 4px;
                width: 100%;
                font-size: 14px;
            }

            .css-1if2ycv .bn-input-prefix {
                flex-shrink: 0;
                margin-left: 8px;
                min-width: 48px;
                font-size: 14px;
                color: rgb(94, 102, 115);
            }

            .css-vurnku {
                box-sizing: border-box;

            }

            .css-1if2ycv {
                line-height: 1.6;

            }

            element {
                display: inline-block;
                text-align: right;
            }

            .css-ef8yc4 {
                box-sizing: border-box;
                margin: 0px;
                min-width: 0px;
                font-size: 14px;
                color: rgb(132, 142, 156);
            }

            .css-1if2ycv input {
                color: rgb(255, 255, 255);
                font-size: 14px;
                padding-left: 4px;
                padding-right: 4px;
                text-align: right;
            }

            .css-1wlt96c {
                box-sizing: border-box;
                margin: 0px;
                min-width: 0px;
                width: 100%;
                height: 100%;
                padding: 0px;
                padding-right: 0px;
                padding-left: 0px;
                outline: currentcolor none medium;
                background-color: inherit;
                opacity: 1;
                border: medium none !important;
                appearance: textfield;
            }

            .css-1oy6ugm {
                margin: 8px 0px 4px;
                min-width: 0px;
                width: 100%;
                box-sizing: border-box;
                border-radius: 4px;
                background-color: rgba(43, 47, 54, 0.9);
            }

            .css-1if2ycv {
                box-sizing: border-box;
                margin: 0px;
                min-width: 0px;
                display: inline-flex;
                position: relative;
                height: 32px;
                -moz-box-align: center;
                align-items: center;
                line-height: 1.6;
                border: 1px solid rgba(43, 47, 54, 0.8);
                border-radius: 4px;
                width: 100%;
                font-size: 14px;
            }

            .css-1if2ycv .bn-input-prefix {
                flex-shrink: 0;
                margin-left: 8px;
                min-width: 48px;
                font-size: 14px;
                color: rgb(94, 102, 115);
            }

            .css-vurnku {
                box-sizing: border-box;

                min-width: 0px;
            }

            .css-1if2ycv {
                line-height: 1.6;

            }

            element {
                display: inline-block;
                text-align: right;
            }

            .css-ef8yc4 {
                box-sizing: border-box;
                margin: 0px;
                min-width: 0px;
                font-size: 14px;
                color: rgb(132, 142, 156);
            }

            .css-1if2ycv input {
                color: rgb(255, 255, 255);
                font-size: 14px;
                padding-left: 4px;
                padding-right: 4px;
                text-align: right;
            }

            .css-1wlt96c {
                box-sizing: border-box;
                margin: 0px;
                min-width: 0px;
                width: 100%;
                height: 100%;
                padding: 0px;
                padding-right: 0px;
                padding-left: 0px;
                outline: currentcolor none medium;
                background-color: inherit;
                opacity: 1;
                border: medium none !important;
                appearance: textfield;
            }

            input {
                font-family: inherit;
            }

            .css-1if2ycv {
                line-height: 1.6;

            }

            .css-1if2ycv .bn-input-suffix {
                flex-shrink: 0;
                margin-right: 8px;
                font-size: 14px;
                color: rgb(132, 142, 156);
            }

            .css-1oy6ugm .bn-input-suffix {
                margin-left: 8px;
            }

            .css-vurnku {
                box-sizing: border-box;
                margin: 0px;

                min-width: 0px;
            }

            .css-1if2ycv {
                line-height: 1.6;

            }

            .css-k0oot2 {
                margin: 4px 0px 0px;
                appearance: none;
                user-select: none;
                cursor: pointer;
                overflow: hidden;
                text-overflow: ellipsis;
                white-space: nowrap;
                display: inline-flex;
                -moz-box-align: center;
                align-items: center;
                -moz-box-pack: center;
                justify-content: center;
                box-sizing: border-box;
                font-family: inherit;
                text-align: center;
                text-decoration: none;
                outline: currentcolor none medium;
                font-weight: 500;
                font-size: 14px;
                line-height: 20px;
                word-break: keep-all;
                padding: 6px 12px;
                min-height: 24px;
                background-color: rgb(2, 192, 118);
                min-width: 52px;
                width: 100%;
                height: 40px;
                border: medium none;
                border-radius: 4px;
                color: white;
            }

            .css-1niv2fa {
                box-sizing: border-box;
                margin: 0px;
                min-width: 0px;
                display: flex;
                height: 100%;
                width: 100%;
                background-color: rgba(30, 32, 38, 0.498);
                grid-area: basictable;
                font-size: 14px;
                color: rgb(255, 255, 255);
                flex-direction: column;
                overflow: hidden;
            }

            .css-dwb7t {
                box-sizing: border-box;
                margin: 0px;
                min-width: 0px;
                width: 100%;
                height: 100%;
                grid-area: userinfo;
                padding-left: 16px;
                padding-right: 16px;
                background-color: rgba(30, 32, 38, 0.498);
                z-index: auto;
                position: relative;
            }

            .css-1niv2fa {
                font-size: 14px;
                color: rgb(255, 255, 255);
            }

            .css-19pe9oc {
                box-sizing: border-box;
                margin: 0px;
                min-width: 0px;
                width: 100%;
                height: 100%;
                display: flex;
                flex-direction: column;
            }

            @media (max-width:991px) {
                header {
                    padding: 10px 20px;
                    flex-direction: column;
                }

            }
        </style>
    
</head>

<body style="background: #14151a">
    <header>
        <a href="" class="text-left"> <img src="/wecoin/logo.png"></a>
        <ul class="navigation">
            <li><a href="">Market</a></li>
            <div class="dropdown" style="display: inline-block;"> <li><a href="">Live Trade</a>
                <div class="dropdown-content"><a href="/wecoin/user/spot/">Spot</a><a href="/wecoin/user/margin/">Margin</a></div></li></div>
                <div class="dropdown">  <li><a href="" style="margin-right: 550px;"><span>Demo Trade</span></a>
                <div class="dropdown-content"><a href="/wecoin/user/spot/">Spot</a><a href="/wecoin/user/margin/">Margin</a></div></li></div>
            <br />
            <br />
            <br />
            <div class="dropdown">  <li><a href="" ><span>Wallet</span></a>
            <div class="dropdown-content"><a href="/wecoin/user/wallet/spot">Spot Balance</a><a href="/wecoin/user/wallet/margin/">Margin Balance</a></div></li></div>

<div class="dropdown">  <li><a href="" style="margin-right: 10px;"><span>Order</span></a>
    <div class="dropdown-content"><a href="/wecoin/user/spot#openorder">Spot Order</a><a href="/wecoin/user/margin#openorder">Margin Order</a></div></li></div>
            <div class="dropdown"><a href="/wecoin/user/profile.html" class="css-1ke7bwx"><img src="/wecoin/profile.png" height="20"
                width="20" /></a><div class="dropdown-content"><a href="/wecoin/user/">Dashboard</a>
                    <a href="/wecoin/user/margin/">Fee Structure</a><a href="/wecoin/user/logout.php">Logout</a></div></div>
        </ul>


    </header>

    <div class="container" style="width: 100%;">
        <!-- TradingView Widget BEGIN -->
        <div class="row">
            <div style="padding-top: 71px;" style="flex-direction: column;">


                <script type="text/javascript"
                    src="https://s3.tradingview.com/external-embedding/embed-widget-ticker-tape.js" async>
                        {
                            "symbols": [
                                {
                                    "proName": "FX_IDC:EURUSD",
                                    "title": "EUR/USD"
                                },
                                {
                                    "proName": "BITSTAMP:BTCUSD",
                                    "title": "BTC/USD"
                                },
                                {
                                    "proName": "BITSTAMP:ETHUSD",
                                    "title": "ETH/USD"
                                }
                            ],
                                "showSymbolLogo": true,
                                    "colorTheme": "dark",
                                        "isTransparent": false,
                                            "displayMode": "regular",
                                                "locale": "en"
                        }
                    </script>
            </div>
        </div>


        <div class="row">
            <div class="col-md-3" style=" color: rgb(250, 250, 250);">
                <h4>Order Book</h4>
                <div class="row">
                    <div class="col-md-4">
                        Price(USDT)
                    </div>
                    <div class="col-md-4">
                        Amount(BTC)
                    </div>
                    <div class="col-md-4">
                        Total
                    </div>
                </div>
                <div class="row">
                    <br />
                    <div class="col-md-12" id="ask" style="font-weight: 500; font-size: 12px; 
                  color: red;"></div>

                </div>


            </div>
            <div class="col-md-6" style="  color: white;">
                <h4>CHART</h4>
                <!-- TradingView Widget BEGIN -->
                <div>

                    <script type="text/javascript" src="https://s3.tradingview.com/tv.js"></script>
                    <script type="text/javascript">
                        new TradingView.widget(
                            {
                                "width": 630,
                                "height": 400,
                                "symbol": "BINANCE:BTCUSDT",
                                "timezone": "Etc/UTC",
                                "theme": "dark",

                                "locale": "en",
                                "toolbar_bg": "#f1f3f6",
                                "enable_publishing": false,
                                "withdateranges": true,
                                "range": "YTD",
                                "allow_symbol_change": true,
                                "save_image": false,
                                "details": true,

                            }
                        );
                    </script>
                </div>
                <!-- TradingView Widget END -->

            </div>
            <div class="col-md-3 ">
                <h4 style="color: white;">
                    TICKER PRICE
                </h4>
                <div class="row" style="background: rgb(20, 21, 26) !important; font-size: 8px;">
                    <div class="col-md-3">
                        <button style="font-size: 10px;" type="button" onclick="window.location.href=''" class="btn btn-outline-dark"  >BTC/USDT</button>
                    </div>
                    <div class="col-md-3" >
                        <button style="font-size: 10px;" type="button"  onclick="window.location.href='ETH_USDT.php'" class="btn btn-outline-dark">ETH/USDT</button>
                    </div>
                    <div class="col-md-3" >
                        <button style="font-size: 10px;" type="button" onclick="window.location.href='XRP_USDT.php'" class="btn btn-outline-dark"  >XRP/USDT</button>
                    </div>
                    <div class="col-md-3" >
                        <button style="font-size: 10px;" type="button" onclick="window.location.href='TRX_USDT.php'" class="btn btn-outline-dark"  >TRX/USDT</button>
                    </div>
                </div>
                <div class="row" style="color: white;">
                    <div class="col-md-4">Pair</div>
                    <div class="col-md-4">Price</div>
                    <div class="col-md-4">Change</div>
                </div>
                <br />
                <div class="row" style="font-weight: 500; font-size: 12px;">
                    <div id="pairTick" class="col-md-4" style="color: white;">

                    </div>
                    <div id="priceTick" class="col-md-4">

                    </div>
                    <div id="changeTick" class="col-md-4">

                    </div>
                </div>

            </div>
        </div>


        <br />
        <div class="row">
            <div class="col-md-3">
                <div class="row">
                    <div class="row">

                        <div class="col-md-12" id="priceInfo" style="font-weight: 500; font-size: 17px; ">
                        </div>
                    </div>


                    <div class="col-md-12" id="bid" style="font-weight: 500; font-size: 12px; 
            color: green;">



                    </div>
                </div>
            </div>

            <div class="col-md-6" id="opera" style="color: white;">
                <div class="row">
                    <div class="col-md-12">
                        <h4>SPOT</h4>
                    </div>

                </div>
              
            
            <div class="row">
                <div class="col-md-12">
                    <div class="row" style="margin-left: 5px;">
                        <div id="buysell" class="row" >
                            <ul class="nav nav-tabs " style="margin-left:5px;">
                                <li  class="active"><a data-toggle="tab" href="#limit">
                                        <h6>Limit</h6>
                                    </a></li>
                                <li ><a data-toggle="tab" href="#market">
                                        <h6>Market</h6>
                                    </a></li>

                            </ul>
                        </div>
                        <div class="tab-content">
                            <div id="limit" class="tab-pane fade in active"  >
                               
                                    <br />
                                    <div class="row" >
                                    <div class="col-md-6">
                                        BUY BTC
                                        <form action=""  method="post" autocomplete="off">
                                            <div class="css-1oy6ugm">
                                                <div class=" css-1if2ycv">
                                                    <div class="bn-input-prefix css-vurnku"><label data-bn-type="text"
                                                            for="FormRow-BUY-price" style="display: inline-block; text-align: right;"
                                                            class="css-ef8yc4">Price</label></div><input data-bn-type="input"
                                                        id="buybal" name="buyprice" class=" css-1wlt96c" type="number"
                                                      oninput="getBitPrice()" required="required" min="0.01" step="0.01"  value="" lang="en"required="required">
                                                    <div class="bn-input-suffix css-vurnku"><label data-bn-type="text"
                                                            for="FormRow-BUY-price" style="display: inline-block; text-align: right;"
                                                            class="css-ef8yc4">USDT</label></div>
                                                </div>
                                            </div>
                                            <div class="css-1oy6ugm">
                                                <div class=" css-1if2ycv">
                                                    <div class="bn-input-prefix css-vurnku"><label data-bn-type="text"
                                                            for="FormRow-BUY-quantity" style="display: inline-block; text-align: right;"
                                                            class="css-ef8yc4">Amount</label></div><input data-bn-type="input" 
                                                         value=""  oninput="getBitPrice()" id="buyamount" name="bitcoinval" class=" css-1wlt96c" type="number"
                                                         lang="en" disabled>
                                                    <div class="bn-input-suffix css-vurnku"><label data-bn-type="text"
                                                            for="FormRow-BUY-quantity" style="display: inline-block; text-align: right;"
                                                            class="css-ef8yc4">BTC</label></div>
                                                </div>
                                                
                                            </div>
                                            
                                            <div dir="ltr" class="css-1au5w6l">
                                                <div class="css-8y9li2">
                                                    <div class="css-1axcs3s">
                                                        <div class="css-1nr34sj"></div>
                                                    </div>
                                                    <div class="bn-tradeSlider-ratioButton css-arkd9r"></div><label
                                                        class="css-q3jtu7"></label><br /><br />
                                                    <div class="css-4l9ic"></div>
                                                    <div class="css-r5qggc"></div>
                                                    <div class="css-nsqynb"></div>
                                                    <div class="css-80wbqm"></div>
                                                    <div class="css-v6fymx"></div>
                                                </div>
                                            </div>
                                            <div class="css-1oy6ugm">
                                                <div class=" css-1if2ycv">
                                                    <div class="bn-input-prefix css-vurnku"><label data-bn-type="text"
                                                            for="FormRow-BUY-total" style="display: inline-block; text-align: right;"
                                                            class="css-ef8yc4">Total</label></div><input data-bn-type="input"
                                                        id="totalAmount" name="totalbuy" class=" css-1wlt96c" type="number"
                                                         min="0.01" step="0.01" value="" lang="en" disabled>
                                                    <div class="bn-input-suffix css-vurnku"><label data-bn-type="text"
                                                            for="FormRow-BUY-total" style="display: inline-block; text-align: right;"
                                                            class="css-ef8yc4">USDT</label></div>
                                                </div>
                                            </div><button data-bn-type="button" style="cursor: pointer;" data-sensors-click="true"
                                                id="orderformBuyBtn" class=" css-k0oot2">Buy BTC</button>
                                        </form>
                                    </div>
                                    <div class="col-md-6">
                                        SELL BTC
                                        <form action="" method="post"  autocomplete="off">
                                            <div class="css-1oy6ugm">
                                                <div class=" css-1if2ycv">
                                                    <div class="bn-input-prefix css-vurnku"><label data-bn-type="text"
                                                            for="FormRow-BUY-price" style="display: inline-block; text-align: right;"
                                                            class="css-ef8yc4">Price</label></div><input data-bn-type="input"
                                                       id="sellbal" name="sellprice" class="css-1wlt96c" type="number"
                                                        min="0.01" step="0.01" value="" lang="en" disabled>
                                                    <div class="bn-input-suffix css-vurnku"><label data-bn-type="text"
                                                            for="FormRow-BUY-price" style="display: inline-block; text-align: right;"
                                                            class="css-ef8yc4">USDT</label></div>
                                                </div>
                                            </div>
                                            <div class="css-1oy6ugm">
                                                <div class=" css-1if2ycv">
                                                    <div class="bn-input-prefix css-vurnku"><label data-bn-type="text"
                                                            for="FormRow-BUY-quantity" style="display: inline-block; text-align: right;"
                                                            class="css-ef8yc4">Amount</label></div><input data-bn-type="input"
                                                            oninput="getUsdPrice()"  id="sellamount" name="quantity" class=" css-1wlt96c" type="text"
                                                        pattern="^[0-9][\.\d]*(,\d+)?$"  value="" lang="en" required="required">
                                                    <div class="bn-input-suffix css-vurnku"><label data-bn-type="text"
                                                            for="FormRow-BUY-quantity" style="display: inline-block; text-align: right;"
                                                            class="css-ef8yc4">BTC</label></div>
                                                </div>
                                            </div>
                                            
                                            <div dir="ltr" class="css-1au5w6l">
                                                <div class="css-8y9li2">
                                                    <div class="css-1axcs3s">
                                                        <div class="css-1nr34sj"></div>
                                                    </div>
                                                    <div class="bn-tradeSlider-ratioButton css-arkd9r"></div><label
                                                        class="css-q3jtu7"></label><br /><br />
                                                    <div class="css-4l9ic"></div>
                                                    <div class="css-r5qggc"></div>
                                                    <div class="css-nsqynb"></div>
                                                    <div class="css-80wbqm"></div>
                                                    <div class="css-v6fymx"></div>
                                                </div>
                                            </div>
                                            <div class="css-1oy6ugm">
                                                <div class=" css-1if2ycv">
                                                    <div class="bn-input-prefix css-vurnku"><label data-bn-type="text"
                                                            for="FormRow-BUY-total" style="display: inline-block; text-align: right;"
                                                            class="css-ef8yc4">Total</label></div><input data-bn-type="input"
                                                        id="totAmount" name="totalsell" class=" css-1wlt96c" type="number"
                                                        min="0.01" step="0.01" value="" lang="en" >
                                                    <div class="bn-input-suffix css-vurnku"><label data-bn-type="text"
                                                            for="FormRow-BUY-total" style="display: inline-block; text-align: right;"
                                                            class="css-ef8yc4">USDT</label></div>
                                                </div>
                                            </div><button data-bn-type="button" style=background:crimson; cursor: pointer;"
                                                data-sensors-click="true" id="orderformBuyBtn" class=" css-k0oot2">SELL BTC</button>
                                        </form>
                                    </div>
                                </div>
                                  
                            
                            </div>
                            <div id="market" class="tab-pane fade" >
                              
                                    <br />
                                  
                                      
                                  
                                    <div class="row" >
                                        
                                        <div class="col-md-6">
                                            BUY BTC
                                            <form action="" method="post" autocomplete="off">
                                               
                                                
                                                <div dir="ltr" class="css-1au5w6l">
                                                    <div class="css-8y9li2">
                                                        <div class="css-1axcs3s">
                                                            <div class="css-1nr34sj"></div>
                                                        </div>
                                                        <div class="bn-tradeSlider-ratioButton css-arkd9r"></div><label
                                                            class="css-q3jtu7"></label><br /><br />
                                                        <div class="css-4l9ic"></div>
                                                        <div class="css-r5qggc"></div>
                                                        <div class="css-nsqynb"></div>
                                                        <div class="css-80wbqm"></div>
                                                        <div class="css-v6fymx"></div>
                                                    </div>
                                                </div>
                                                <div class="css-1oy6ugm">
                                                    <div class=" css-1if2ycv">
                                                        <div class="bn-input-prefix css-vurnku"><label data-bn-type="text"
                                                                for="FormRow-BUY-total" style="display: inline-block; text-align: right;"
                                                                class="css-ef8yc4">Total</label></div><input data-bn-type="input"
                                                            id="FormRow-BUY-total" name="buyprice" class=" css-1wlt96c" type="number"
                                                            min="0.01" step="0.01" value="" lang="en">
                                                        <div class="bn-input-suffix css-vurnku"><label data-bn-type="text"
                                                                for="FormRow-BUY-total" style="display: inline-block; text-align: right;"
                                                                class="css-ef8yc4">USDT</label></div>
                                                    </div>
                                                </div><button data-bn-type="button" style="cursor: pointer;" data-sensors-click="true"
                                                    id="orderformBuyBtn" class=" css-k0oot2">Buy BTC</button>
                                            </form>
                                        </div>
                                        <div class="col-md-6">
                                            SELL BTC
                                            <form action="" method="post" autocomplete="off">
                                              
                                                
                                               
                                                <div dir="ltr" class="css-1au5w6l">
                                                    <div class="css-8y9li2">
                                                        <div class="css-1axcs3s">
                                                            <div class="css-1nr34sj"></div>
                                                        </div>
                                                        <div class="bn-tradeSlider-ratioButton css-arkd9r"></div><label
                                                            class="css-q3jtu7"></label><br /><br />
                                                        <div class="css-4l9ic"></div>
                                                        <div class="css-r5qggc"></div>
                                                        <div class="css-nsqynb"></div>
                                                        <div class="css-80wbqm"></div>
                                                        <div class="css-v6fymx"></div>
                                                    </div>
                                                </div>
                                                <div class="css-1oy6ugm">
                                                    <div class=" css-1if2ycv">
                                                        <div class="bn-input-prefix css-vurnku"><label data-bn-type="text"
                                                                for="FormRow-BUY-total" style="display: inline-block; text-align: right;"
                                                                class="css-ef8yc4">Total</label></div><input data-bn-type="input"
                                                            id="FormRow-BUY-total" name="totalsell" class=" css-1wlt96c" type="number"
                                                            min="0.01" step="0.01" value="" lang="en">
                                                        <div class="bn-input-suffix css-vurnku"><label data-bn-type="text"
                                                                for="FormRow-BUY-total" style="display: inline-block; text-align: right;"
                                                                class="css-ef8yc4">USDT</label></div>
                                                    </div>
                                                </div><button data-bn-type="button" style=background:crimson; cursor: pointer;"
                                                    data-sensors-click="true" id="orderformBuyBtn" class=" css-k0oot2">SELL BTC</button>
                                            </form>
                                        </div>
                                          
                                    </div>
                            </div>
                        </div>
                        </div>
                    </div>
            </div>

            </div>
            <div class="col-md-3 " style="color: white;">
                <h4>Market Trades</h4>

                <div class="row">
                    <div class="col-md-4">
                        Price(BTC)
                    </div>
                    <div class="col-md-4">
                        Amount(BTC)
                    </div>
                    <div class="col-md-4">
                        Time
                    </div>
                </div>

                <div class="row">
                    <br />
                    <div class="col-md-12" id="mTrade" style="font-weight: 500; font-size: 12px; 
               overflow-y: auto;
height: 350px;"></div>

                </div>
            </div>
        </div>
        <div class="row" >
            <div class="col-md-12" >
                <ul class="nav nav-tabs" role="tablist" >
                   <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#openorder"><b>Open Order(s)</b></a></li>
                    <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#orderhistory"><b>Order History</b></a></li>
                    
                  </ul>
                    </div>
                    </div>
                
                  <div class="tab-content" >
                  <div id="openorder"  class="tab-pane active"  >
                    <div class="row" >
                        <div class="col-md-12"  >
                    
                        <?php  
                echo "<table  class='table'>
                           <tr style='color: white;'>";
                            
                      $tid = "Transaction ID";
                      $dt = "Date";
                      $ot = "OpenTime";
                      $pr  =" Pair";
                      $amt = " Amount";
                      $sts = " Status";
                      $ttp = " Trade Type";
                      $opt = "Options";
                      $querys = "SELECT * FROM `openorder` WHERE `email`='$email' AND `Trade Type` LIKE '%SPOT%' "; //You don't need a ; like you do in SQL
                      $results = mysqli_query($conn,$querys);
                      
                      echo" <th>" .$tid."</th> 
                               <th>" .$dt."</th> 
                               <th>".$ot."</th> 
                               <th>" .$pr."</th> 
                               <th>".$amt."</th> 
                                
                               <th>" .$sts."</th> 
                               <th>" .$ttp."</th> 
                               <th> ".$opt."</th>
                             
                                
                           
                           
                           </tr>";
                           
                           
                           
                            while($row = mysqli_fetch_array($results)){
                                $rows = $rows +1;
                                echo "<tr style='color:white;'><td>".$row['Transaction ID']. "</td>
                                <td>" .$row['Date']."</td>
                                <td>".$row['Open Time']."</td>
                                <td>" .$row['Pair'] ."</td>
                                <td>$" . $row['Amount'] ."</td>
                                <td>"  .$row['Status'] ."</td>
                                <td>"  .$row['Trade Type']."</td>
                                <td><form method='post' action=''><label style='color:white;'>Close Trade</label><input style='color:black;'name='options' type='submit' value='$rows'></form></td>
                                
                            
                               
                        </tr>";}
                        ?>

                          </table> </div></div></div>
                          <div id="orderhistory"  class="tab-pane fade">
                          <div class="row" >
                            <div class="col-md-12"  >
                    
                            <?php  
                            echo "<table  class='table'>


                            <tr style='color: white;'>";
                          
                            
                      $tid = "Transaction ID";
                      $amt = " Amount";
                      $pr  =" Pair";
                      $dt = "Date";
                      $ot = "OpenTime";
                      $ct = "CloseTime";
                      $sts = " Status";
                      $pl = "%Profit/Loss";
                      $ttp = " Trade Type";
                      $res = "Results";
                      echo" <th>" .$tid."</th> 
                            <th>".$amt."</th> 
                            <th>" .$pr."</th> 
                               <th>" .$dt."</th> 
                               <th>".$ot."</th> 
                               <th>".$ct."</th> 
                               <th>" .$sts."</th> 
                               <th>".$pl."</th> 
                               <th>" .$ttp."</th> 
                               <th>".$res."</th>
                                         
                           

                            </tr>";

                            
                           
                            $queryhis = "SELECT * FROM `orderhistory` WHERE `email`='$email' AND `Trade Type` LIKE '%SPOT%'"; //You don't need a ; like you do in SQL
                            $resultss = mysqli_query($conn,$queryhis);
                            
                            while($row = mysqli_fetch_array($resultss)){
                                $rows = $rows +1;
                                echo "<tr style='color:white; '><td>".$row['Transaction ID']. "</td>
                                <td>$" . $row['Amount'] ."</td>
                                <td>" .$row['Pair'] ."</td>   
                                <td>" .$row['Date']."</td>
                                <td>".$row['Open Time']."</td>
                                <td>".$row['Close Time']."</td>                          
                                <td>"  .$row['Status'] ."</td>
                                <td>".$row['%Profit/Loss']."%</td>
                                <td>"  .$row['Trade Type']."</td>
                                <td>$".$row['Result']."</td>
                                ";}
                            
                            ?>
 
                        </tr>
                          
                            
                      </table>
                      </div>
                      </div>
                   </div>
             
        </div>
    



    <script>
        /* var binanceSocket = new WebSocket('wss://stream.binance.com:9443/ws/btcusdt@depth');
       var orderbook = document.getElementById("trades");
      
       binanceSocket.onmessage = function (event){
       
           
               var div = document.createElement("div");
               var messageObj  = JSON.parse(event.data)
           div.innerHTML = parseFloat(messageObj.b[0][0]).toFixed(2);
           orderbook.appendChild(div);
       //var messageObj  = JSON.parse(event.data)
       //orderbook.append(messageObj.p);
      
           
 
       } */
       globalThis.marvalues = "";
        setInterval(priceTicker, 6000);
        function priceTicker() {
            var myRequest = new XMLHttpRequest();
            myRequest.open('GET', 'https://api.binance.com/api/v3/ticker/24hr', true);
            var pairTick = document.getElementById("pairTick");
            var priceTick = document.getElementById("priceTick");
            var changeTick = document.getElementById("changeTick");
            globalThis.marvalues; 
            myRequest.onload = function () {
                myData = JSON.parse(myRequest.responseText);
                var divPairTick = document.createElement("div");
                var divPriceTick = document.createElement("div");
                var divChangeTick = document.createElement("div");
                var pairTickarr = [], priceTickarr = [], changeTickarr = [];
                globalThis.marvalues = parseFloat(myData[11]["lastPrice"]).toFixed(2).toString();
                
                for (i = 0; i < 15; i++) {

                    if (parseFloat(myData[i]["askPrice"]) >= parseFloat(myData[i]["bidPrice"])) {
                        var priceChange = parseFloat(myData[i]["askPrice"]).toFixed(6).toString().fontcolor("red");

                    }
                    if (parseFloat(myData[i]["askPrice"]) <= parseFloat(myData[i]["bidPrice"])) {
                        var priceChange = parseFloat(myData[i]["bidPrice"]).toFixed(6).toString().fontcolor("green");

                    }
                    if (parseFloat(myData[i]["priceChangePercent"]) >= 0) {
                        var perChange = "+" + parseFloat(myData[i]["priceChangePercent"]) + "%";
                        var perChange = perChange.toString().fontcolor("green");

                    }
                    if (parseFloat(myData[i]["priceChangePercent"]) <= 0) {
                        var perChange = parseFloat(myData[i]["priceChangePercent"]) + "%";
                        var perChange = perChange.toString().fontcolor("red");
                    }

                    pairTickarr.unshift(myData[i]["symbol"]);
                    priceTickarr.unshift(priceChange);
                    changeTickarr.unshift(perChange);
                }

                
                pairTickarr = pairTickarr.toString().split(',').join('<br/><div style="margin-bottom:0.6em;"></div>');
                priceTickarr = priceTickarr.toString().split(',').join('<br/><div style="margin-bottom:0.6em;"></div>');
                changeTickarr = changeTickarr.toString().split(',').join('<br/><div style="margin-bottom:0.6em;"></div>');
                divPairTick = pairTickarr;
                divPriceTick = priceTickarr
                divChangeTick = changeTickarr;
                pairTick.innerHTML = divPairTick;
                priceTick.innerHTML = divPriceTick;
                changeTick.innerHTML = divChangeTick;
                
                pairTick.style.alignItems = "left";
                priceTick.style.alignItems = "center";
                changeTick.style.alignItems = "right";
                pairTick.style.fontWeight = "500";
                pairTick.style.fontFamily = "IBM Plex Sans,sans-serif |initial|inherit";
                pairTick.style.fontFamily = "Signika Negative, sans-serif";
                priceTick.style.fontWeight = "500";
                priceTick.style.fontFamily = "IBM Plex Sans,sans-serif |initial|inherit";
                priceTick.style.fontFamily = "Signika Negative, sans-serif";
                changeTick.style.fontWeight = "500";
                changeTick.style.fontFamily = "IBM Plex Sans,sans-serif |initial|inherit";
                changeTick.style.fontFamily = "Signika Negative, sans-serif";
             
            }
            
            myRequest.send();
            
        }
      
        getBitPrice();
        function getBitPrice(){
            
            
            document.getElementById("totalAmount").value = document.getElementById("buybal").value;
 
            var bitPrice = new XMLHttpRequest();
            bitPrice.open("GET","https://bitpay.com/api/rates",true);
            
            bitPrice.onload = function() {
            var bitcoinData = JSON.parse(bitPrice.responseText);
            var bitp = parseFloat(document.getElementById("buybal").value/(bitcoinData[2]["rate"])).toFixed(8);
            document.getElementById("buyamount").value = bitp;
            }
            bitPrice.send();
        }
        getUsdPrice();
        function getUsdPrice(){
            
            
            
 
            var bitPrices = new XMLHttpRequest();
            bitPrices.open("GET","https://bitpay.com/api/rates",true);
            
            bitPrices.onload = function() {
            var bitcoinData = JSON.parse(bitPrices.responseText);
            var bitp = parseFloat(document.getElementById("sellamount").value*(bitcoinData[2]["rate"])).toFixed(2);
            document.getElementById("sellbal").value = bitp;
            document.getElementById("totAmount").value = document.getElementById("sellbal").value;
            }
            bitPrices.send();
        }
curP();
   function curP() {
            var myRequest = new XMLHttpRequest();
            myRequest.open('GET', 'https://api.binance.com/api/v3/ticker/24hr', true);
            
            
            myRequest.onload = function () {
                myData = JSON.parse(myRequest.responseText);
                
                document.getElementById("buybal").value = parseFloat(myData[11]["lastPrice"]).toFixed(2).toString();
                document.getElementById("sellbal").value = parseFloat(myData[11]["lastPrice"]).toFixed(2).toString();
               
            }
            
            myRequest.send();
            
        }
   
        setInterval(marketTrade, 6000);
        function marketTrade() {
            var ourRequests = new XMLHttpRequest();
            ourRequests.open('GET', 'https://api.binance.com/api/v1/trades?symbol=BTCUSDT&limit=100', true);
            var marketTrades = document.getElementById("mTrade");
            var curPrice = document.getElementById("priceInfo");
            ourRequests.onload = function () {
                ourDatas = JSON.parse(ourRequests.responseText);
                var mdiv = document.createElement("div");
                var marketValues = [];


                for (i = 0; i < 20; i++) {
                    var timestamp = ourDatas[i]["time"];
                    var date = new Date(timestamp);
                    var curTime = date.toTimeString();
                    // Converting to local datetime 
                    curTime = curTime.slice(0, 8);
                    if (ourDatas[i]["isBuyerMaker"] == false) {
                        var colorPrice = parseFloat(ourDatas[i]["price"]).toFixed(2).toString().fontcolor("green");
                        var prices = colorPrice + ' &nbsp;  ' + ("&#8593;").fontcolor("green");
                    }
                    if (ourDatas[i]["isBuyerMaker"] == true) {
                        var colorPrice = parseFloat(ourDatas[i]["price"]).toFixed(2).toString().fontcolor("red");
                        var prices = colorPrice + ' &nbsp;   ' + ("&#8595;").fontcolor("red");
                    }

                    marketValues.unshift(' &emsp;'
                        + colorPrice + '&emsp; &emsp; &emsp; &emsp; &emsp;'
                        + parseFloat(ourDatas[i]["qty"]).toFixed(6) + ' &emsp; &emsp;  &emsp;' + curTime);

                }
                curPrice.innerHTML = ' &nbsp; &nbsp; &nbsp;  ' + prices + '<div>/<div>';
                marketValues = marketValues.toString().split(',').join('<div style="margin-bottom:0.3em;"></div>');
                mdiv = marketValues;

                marketTrades.style.fontWeight = "500";
                marketTrades.style.fontFamily = "IBM Plex Sans,sans-serif |initial|inherit";
                marketTrades.style.fontFamily = "Signika Negative, sans-serif";
                marketTrades.innerHTML = mdiv;

            }
            ourRequests.send();
        }
        setInterval(orderBook, 6000);

        function orderBook() {
            var ourRequest = new XMLHttpRequest();
            ourRequest.open('GET', 'https://api.binance.com/api/v1/depth?symbol=BTCUSDT&limit=15', true);
            var orderbooks = document.getElementById("ask");
            var orderbookss = document.getElementById("bid");
            ourRequest.onload = function () {
                ourData = JSON.parse(ourRequest.responseText);
                var div = document.createElement("div");
                var divy = document.createElement("div");
                //console.log(ourData);
                var zAsk = [], zBid = [], xAsk = [], yAsk = [], xBid = [], yBid = [];
                ;
                //Collect Data for Asks
                for (i = 0; i < 15; i++) {
                    zAsk.unshift(' &emsp;'
                        + parseFloat(ourData["asks"][i][0]).toFixed(2) + '&nbsp; &nbsp; &nbsp; &nbsp; &emsp; &emsp; &emsp;'
                        + parseFloat(ourData["asks"][i][1]).toFixed(4) + ' &nbsp; &nbsp; &emsp; &emsp; &emsp;'
                        + parseFloat((ourData["asks"][i][0]) * (ourData["asks"][i][1])).toFixed(2));

                }

                //Collect Data for Bids
                for (i = 14; i >= 0; i--) {
                    zBid.unshift(' &emsp;'
                        + parseFloat(ourData["bids"][i][0]).toFixed(2) + '&nbsp; &nbsp; &nbsp; &nbsp; &emsp; &emsp; &emsp;'
                        + parseFloat(ourData["bids"][i][1]).toFixed(4) + ' &nbsp; &nbsp; &emsp; &emsp; &emsp;'
                        + parseFloat((ourData["bids"][i][0]) * (ourData["bids"][i][1])).toFixed(2));
                }

                //Display Chart for Asks

                zAsk = zAsk.toString().split(',').join('<br/><div style="margin-bottom:0.6em;"></div>');
                zBid = zBid.toString().split(',').join('<br/><div style="margin-bottom:0.6em;"></div>');
                div = zAsk;
                divy = zBid;

                orderbooks.innerHTML = div
                orderbookss.innerHTML = divy;

            }

            ourRequest.send();

        }
          
        

    </script>
<script>
     if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
     </script>
</body>

</html>
<?php
}
?>