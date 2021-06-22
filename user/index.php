<?php   
session_start();  
$conn=mysqli_connect('remotemysql.com','AI9hgEKDPt','nS6lsKdyHE','AI9hgEKDPt') or die('Could not Connect My Sql:'.mysql_error());
if(!isset($_SESSION['user'])){
    header("location: /wecoin/login");  
}
if(isset($_SESSION["user"])){  
    $url='https://bitpay.com/api/rates';
    $json=json_decode( file_get_contents( $url ) );
    $dollar=$btc=0;

    foreach( $json as $obj ){
        if( $obj->code=='USD' )$btc=$obj->rate;
    }
    
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
    $_SESSION['dollar']=1 / $btc;
    $btcval = round( $_SESSION['dollar'] * $row['main balance'] ,8 );
    $btcdemo = round( $_SESSION['dollar'] * $row['demo balance'] ,8 );
    $fname = $fname[0];
    $_SESSION['lastlogin'] = $row['last login'];
   
    if(isset($_POST["options"])){
        $nrows = $_POST["options"] - 1;
        $rs=mysqli_query($conn, "SELECT * FROM `openorder` LIMIT $nrows,1");
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
    if(isset($_POST["tspotmain"])){
        if($_POST["maininput"] > $_SESSION["mainbalance"]){
            echo '<script >alert("Insufficient Balance")</script>';
        }
        if($_POST["maininput"] < $_SESSION["mainbalance"]){
            $_SESSION["mainbalance"] = ($_SESSION["mainbalance"] - $_POST["maininput"]);
            $updatedemobal = ($_SESSION["mainbalance"]);
            $mainspot = $_POST["maininput"];
            $query = "UPDATE `users` SET `main balance`= '$updatedemobal', `spot balance`=`spot balance` + '$mainspot' WHERE `email`='$email'";
            mysqli_query($conn,$query) or die("Could Not Perform the Query");
        }
    }
    if(isset($_POST["tmarginmain"])){
        if($_POST["maininput"] > $_SESSION["mainbalance"]){
            echo '<script >alert("Insufficient Balance")</script>';
        }
        if($_POST["maininput"] < $_SESSION["mainbalance"]){
            $_SESSION["mainbalance"] = ($_SESSION["mainbalance"] - $_POST["maininput"]);
            $updatedemobal = ($_SESSION["mainbalance"]);
            $mainmargin = $_POST["maininput"];
            $query = "UPDATE `users` SET `main balance`= '$updatedemobal', `margin balance`=`margin balance` + '$mainmargin' WHERE `email`='$email'";
            mysqli_query($conn,$query) or die("Could Not Perform the Query");
        }
    }
    if(isset($_POST["tspotdemo"])){
        if($_POST["demoinput"] > $_SESSION["demobalance"]){
            echo '<script >alert("Insufficient Balance")</script>';
        }
        if($_POST["demoinput"] < $_SESSION["demobalance"]){
            $_SESSION["demobalance"] = ($_SESSION["demobalance"] - $_POST["demoinput"]);
            $updatedemobal = ($_SESSION["demobalance"]);
            $demospot = $_POST["demoinput"];
            $query = "UPDATE `users` SET `demo balance`= '$updatedemobal', `demo spot`=`demo spot` + '$demospot' WHERE `email`='$email'";
            mysqli_query($conn,$query) or die("Could Not Perform the Query");
        }
    }
    if(isset($_POST["tmargindemo"])){
        if($_POST["demoinput"] > $_SESSION["demobalance"]){
            echo '<script >alert("Insufficient Balance")</script>';
        }
        if($_POST["demoinput"] < $_SESSION["demobalance"]){
            $_SESSION["demobalance"] = ($_SESSION["demobalance"] - $_POST["demoinput"]);
            $updatedemobal = $_SESSION["demobalance"];
            $demomargin = $_POST["demoinput"];
            $query = "UPDATE `users` SET `demo balance`= '$updatedemobal', `demo margin`=`demo margin` + '$demomargin' WHERE `email`='$email'";
            mysqli_query($conn,$query) or die("Could Not Perform the Query");
        }
    }
  ?>  
<html dir="ltr" lang="en">

<head>
    <meta http-equiv="etag" content="556e1a166e279aa6bec3f09e6e465fca74c4221f">
    <meta name="viewport"
        content="user-scalable=no,width=device-width,initial-scale=1.0,maximum-scale=1.0,minimum-scale=1.0">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta charset="utf-8">
    <meta name="robots" content="noindex">
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
        body {
            overflow-x: hidden;
            /* iphoneX */
            padding-bottom: constant(safe-area-inset-bottom);
            padding-bottom: env(safe-area-inset-bottom);
            padding-top: constant(safe-area-inset-top);
            padding-top: env(safe-area-inset-top);
        }
    </style>

   
    <script>window.ga = window.ga || function () { (ga.q = ga.q || []).push(arguments) }; ga.l = +new Date; ga('create', 'test', 'auto');
        window.gaFilterExp = "^(email|mobile)";
        if (document.location.search) {
            var search = document.location.search.trim().replace(/^[?#&]/, '');
            if (search) {
                var regexp = new RegExp(gaFilterExp);
                var params = search.split('&');
                params = params.filter(val => !(regexp.test(val)));
                paramsString = params.join('&');
                ga('set', 'location', location.origin + location.pathname + '?' + paramsString);
            }
        }
        ; ga('send', 'pageview');</script>
    <script>(function (w, d, s, l, i) {
            w[l] = w[l] || []; w[l].push({
                'gtm.start':
                    new Date().getTime(), event: 'gtm.js'
            }); var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s), dl = l != 'dataLayer' ? '&l=' + l : ''; j.async = true; j.src =
                    'https://www.googletagmanager.com/gtm.js?id=' + i + dl; f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-WW2RRZX');</script>
    <script>window.dataLayer = []</script>
    
    <style data-emotion="css-global"></style>
    <style data-emotion="css-global"></style>
    <style data-emotion="css-global"></style>
    <style data-emotion-css="tq0shg">
        html body {
            font-family: BinancePlex, Arial, sans-serif !important;

        }
        .css-jlbk6n {
    box-sizing: border-box;
    margin: 0px;
    min-width: 0px;
    display: flex;
    flex-wrap: wrap;
    -moz-box-pack: justify;
    justify-content: space-between;
    padding: 8px;
}.css-kvkii2 {
    width: 66.6667%;
}

.css-kvkii2 {
    box-sizing: border-box;
    margin: 0px;
    min-width: 0px;
    display: flex;
    
    padding: 8px;
}.css-vurnku {
    box-sizing: border-box;
    margin: 0px;
    min-width: 0px;
}.css-4sk89q {
    box-sizing: border-box;
    margin: 0px;
    min-width: 0px;
    width: 100%;
    white-space: nowrap;
    display: flex;
    flex-direction: row;
    overflow: scroll;
    scrollbar-width: none;
    border-width: 0px 0px 1px;
    border-style: solid;
    border-color: rgb(234, 236, 239);
}.css-yv6506 {
    margin-right: 24px;
}
.css-yv6506 {
    box-sizing: border-box;
    margin: 0px 16px 0px 0px;
        margin-right: 16px;
    cursor: pointer;
    min-width: auto;
    font-size: 14px;
    color: rgb(132, 142, 156);
}
.css-4sk89q {
    white-space: nowrap;
}.css-yv6506 > div.active {
    color: rgb(30, 35, 41);
    font-weight: 500;
}
.css-d3ui9e.active {
    border-bottom: 3px solid rgb(240, 185, 11);
        border-bottom-color: rgb(240, 185, 11);
    border-color: rgb(240, 185, 11);
    color: rgb(240, 185, 11);
}
.css-yv6506 > div {
    padding-left: 0px;
    padding-right: 0px;
    color: rgb(112, 122, 138);
}
.css-d3ui9e {
    margin: 0px;
    min-width: 0px;
    padding: 10px 90px;
        padding-right: 90px;
        padding-left: 90px;
    height: 100%;
    box-sizing: border-box;
    user-select: none;
}
.css-yv6506 {
    cursor: pointer;
    font-size: 14px;
    color: rgb(132, 142, 156);
}
.css-4sk89q {
    white-space: nowrap;
}.css-1s6nhe2 {
    box-sizing: border-box;
    margin: 0px 0px 0px 16px;
    min-width: 0px;
    text-decoration: none;
    color: rgb(201, 148, 0);
    display: flex;
}
a {
    background-color: transparent;
}.css-155meta {
    box-sizing: border-box;
    margin: 0px;
    min-width: 0px;
    color: rgb(0, 0, 0);
    font-size: 24px;
    fill: rgb(0, 0, 0);
    width: 1em;
    height: 1em;
}.css-1p01izn {
    box-sizing: border-box;
    margin: 0px;
    min-width: 0px;
    box-shadow: rgba(20, 21, 26, 0.04) 0px 1px 2px, rgba(71, 77, 87, 0.04) 0px 3px 6px, rgba(20, 21, 26, 0.1) 0px 0px 1px;
    border-radius: 4px;
    background-color: rgb(255, 255, 255);
    padding: 0px 16px;
    width: 100%;
}.css-1hythwr {
    box-sizing: border-box;
    margin: 0px;
    min-width: 0px;
    display: flex;
    
    flex-direction: column;
}.css-1hz1mz6 {
    box-sizing: border-box;
    margin: 0px;
    min-width: 0px;
    flex: 1 1 0%;
    padding-top: 16px;
    padding-bottom: 16px;
}.css-5x6ly7 {
    box-sizing: border-box;
    margin: 0px;
    min-width: 0px;
    display: flex;
    flex: 1 1 0%;
    -moz-box-align:stretch;
    
}
.css-181kvgz {
    font-size: 16px;
}
.css-181kvgz {
    box-sizing: border-box;
    margin: 0px 16px 0px 0px;
   
    min-width: 0px;
    display: inline-block;
    text-decoration: none;
    font-weight: 600;
    color: rgb(30, 35, 41);
    
    padding: 0px;
}
a {
    background-color: transparent;
}
.css-10nf7hq {
    box-sizing: border-box;
    margin: 0px;
    min-width: 0px;
    display: flex;
    -moz-box-align: center;
    align-items: center;
}.css-4cffwv {
    box-sizing: border-box;
    margin: 0px;
    min-width: 0px;
    display: flex;
}.css-noqr05 {
    width: auto;
}
.css-noqr05 {
    width: auto;
}
.css-noqr05 {
    box-sizing: border-box;
    margin: 0px;
    min-width: 0px;
    display: flex;
    -moz-box-pack: justify;
    justify-content: space-between;
    -moz-box-align: center;
    align-items: center;
    width: 100%;
}.css-d732j0 {
    min-height: 24px;
}
.css-d732j0 {
    min-height: 24px;
}
.css-d732j0 {
    margin: 0px 4px;
    min-width: 0px;
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
    line-height: 20px;
    word-break: keep-all;
    color: rgb(33, 40, 51);
    border-radius: 4px;
    padding: 4px 16px;
    border: medium none;
    background-image: linear-gradient(rgb(248, 209, 47) 0%, rgb(240, 185, 11) 100%);
    flex: 1 1 0%;
    min-height: 32px;
    font-size: 12px;
}
button, [type="button"], [type="reset"], [type="submit"] {
    appearance: button;
}
button, select {
    text-transform: none;
}
        body {
            margin: 0px;
        }

        body {
            margin: 0px;
            width: 100vw;
            min-height: 100vh;
            overflow-x: hidden !important;
            overflow-y: auto;
        }

        .css-160vccy {
            box-sizing: border-box;
            margin: 0px;
            min-width: 0px;
            flex: 1 1 0%;
            background-color: rgb(250, 250, 250);
        }

        .css-146q23 {
            box-sizing: border-box;
            margin: 0px;
            min-width: 0px;
            flex: 1 1 0%;
            background-color: rgb(255, 255, 255);
        }

        .css-1e6doj4 {
            box-sizing: border-box;
            margin: 0px;
            min-width: 0px;
            display: flex;
            box-shadow: rgba(0, 0, 0, 0.05) 0px 0px 4px;
            flex: 1 1 0%;
            padding: 24px;
        }

        .css-6vt7sa {
            width: 40px;
            height: 40px;
        }

        .css-6vt7sa {
            width: 40px;
            height: 40px;
        }

        .css-6vt7sa {
            box-sizing: border-box;
            margin: 0px;
            min-width: 0px;
            display: flex;
            width: 32px;
            height: 32px;
            border-radius: 100%;
            border-width: 1px;
            border-style: solid;
            border-color: rgb(30, 35, 41);
            font-weight: 500;
            -moz-box-pack: center;
            justify-content: center;
            -moz-box-align: center;
            align-items: center;
            font-size: 20px;
            color: rgb(30, 35, 41);
        }

        .css-1sgz1lk {
            box-sizing: border-box;
            margin: 0px 0px 0px 16px;
            min-width: 0px;
        }

        .css-ize0sl {
            box-sizing: border-box;
            margin: 0px 0px 4px;
            min-width: 0px;
            display: flex;
            -moz-box-align: center;
            align-items: center;
        }

        .css-1124n14 {
            box-sizing: border-box;
            margin: 0px 16px 0px 0px;
            min-width: 0px;
            color: rgb(30, 35, 41);
        }

        .css-1uoge8i {
            box-sizing: border-box;
            margin: 0px 16px 0px 0px;
            min-width: 0px;
        }

        .css-180eiyx {
            box-sizing: border-box;
            margin: 0px;
            min-width: 0px;
            display: flex;
            font-size: 14px;
            color: rgb(30, 35, 41);
        }

        .css-1ap5wc6 {
            box-sizing: border-box;
            margin: 0px;
            min-width: 0px;
            color: rgb(112, 122, 138);
        }

        .css-180eiyx {
            font-size: 14px;
            color: rgb(30, 35, 41);
        }

        .css-1ry7rnu {
            box-sizing: border-box;
            margin: 0px;
            min-width: 0px;
            display: flex;
            color: rgb(112, 122, 138);
            font-size: 12px;
            line-height: 1.25;
        }

        .css-9cwl6c {
            box-sizing: border-box;
            margin: 0px 8px 0px 0px;
            min-width: 0px;
        }

        .css-1ry7rnu {
            color: rgb(112, 122, 138);
            font-size: 12px;
            line-height: 1.25;
        }

        .css-1wu88jq {
            margin: 16px;
        }

        .css-1wu88jq {
            margin: 16px;
        }

        .css-1wu88jq {
            box-sizing: border-box;
            min-width: 0px;
            background: url("https://bin.bnbstatic.com/static/images/accounts/dashboard/banner/right.svg") no-repeat scroll right top / auto 264px, url("https://bin.bnbstatic.com/static/images/accounts/dashboard/banner/left.svg") no-repeat scroll left bottom / 281px 154px, rgba(0, 0, 0, 0) linear-gradient(102.18deg, rgb(52, 56, 63) 11.81%, rgb(30, 32, 38) 94.26%) repeat scroll 0% 0%;
            box-shadow: rgba(0, 0, 0, 0.08) 0px 2px 4px, rgba(0, 0, 0, 0.08) 0px 0px 4px;
            border-radius: 4px;
            margin: 0px;
            padding: 24px;
        }

       
            color.css-45f3jl {
                font-size: 16px;
            }

            .css-45f3jl {
                font-size: 16px;
            }

            .css-45f3jl {
                box-sizing: border-box;
                margin: 0px;
                min-width: 0px;
                font-weight: 400;
                line-height: 30px;
                font-size: 14px;
                color: rgba(255, 255, 255, 0.5);
            }

            .css-11grwh5 {
                margin-top: 24px;
            }

            .css-11grwh5 {
                box-sizing: border-box;
                margin: 0px;
                margin-top: 0px;
                min-width: 0px;
                display: flex;
                position: relative;
                flex-direction: row;
            }

            .css-1r1a9yt {
                box-sizing: border-box;
                margin: 0px;
                min-width: 0px;
                position: absolute;
                top: 26px;
                left: 26px;
                width: 180px;
                border-bottom: 1px dotted rgb(240, 185, 11);
                border-bottom-color: rgb(240, 185, 11);
                border-color: rgb(240, 185, 11);
                z-index: 1;
            }

            .css-zwbic7 {
                margin-right: 32px;
                padding: 0px;
            }

            .css-zwbic7 {
                margin-right: 0px;
                padding: 0px;
            }

            .css-zwbic7 {
                box-sizing: border-box;
                margin: 0px;
                margin-right: 0px;
                display: flex;
                position: relative;
                flex-direction: column;
                min-width: 124px;
                padding: 16px;
            }

            .css-12lulx0 {
                box-sizing: border-box;
                margin: 0px;
                min-width: 0px;
                width: 20px;
                height: 20px;
                background-color: rgb(0, 192, 135);
                border-radius: 50%;
                text-align: center;
                line-height: 20px;
                color: rgb(0, 0, 0);
                font-size: 12px;
                position: relative;
                z-index: 2;
            }

            .css-7g6s51 {
                box-sizing: border-box;
                margin: 0px;
                min-width: 0px;
                color: currentcolor;
                font-size: 16px;
                fill: currentcolor;
                width: 1em;
                height: 1em;
                vertical-align: -4px;
            }

            .css-12lulx0 {
                text-align: center;
                line-height: 20px;
                color: rgb(0, 0, 0);
                font-size: 12px;
            }

            .css-1atbbsq {
                margin-left: 0px;
                flex-direction: column;
                align-items: flex-start;
                -moz-box-pack: start;
                justify-content: flex-start;
            }

            .css-1atbbsq {
                margin-left: 16px;
                flex-direction: column;
                align-items: flex-start;
                -moz-box-pack: start;
                justify-content: flex-start;
            }

            .css-1atbbsq {
                box-sizing: border-box;
                margin: 0px 0px 0px 8px;
                margin-left: 8px;
                min-width: 0px;
                display: flex;
                flex-direction: row;
                -moz-box-align: center;
                align-items: center;
                flex: 1 1 0%;
                -moz-box-pack: justify;
                justify-content: space-between;
            }

            .css-vurnku {
                box-sizing: border-box;
                margin: 0px;
                min-width: 0px;
            }

            .css-12z5qwk {
                margin-top: 8px;
                padding-bottom: 0px;
            }

            .css-12z5qwk {
                margin-top: -1px;
                padding-bottom: 16px;
            }

            .css-12z5qwk {
                box-sizing: border-box;
                margin: -1px 0px 0px;
                margin-top: -1px;
                min-width: 0px;
                font-weight: 600;
                font-size: 16px;
                line-height: 22px;
                color: rgb(255, 255, 255);
                padding-bottom: 0px;
            }

            .css-w381hx {
                font-size: 13px;
            }

            .css-w381hx {
                font-size: 13px;
            }

            .css-w381hx {
                box-sizing: border-box;
                margin: 0px;
                min-width: 0px;
                font-weight: 400;
                line-height: 18px;
                font-size: 12px;
                color: rgb(132, 142, 156);
            }

            body {
                font-family: BinancePlex, Arial, sans-serif !important;
            }

            body {
                overflow-x: hidden;
                padding-bottom: constant(safe-area-inset-bottom);
                padding-bottom: env(safe-area-inset-bottom);
                padding-top: constant(safe-area-inset-top);
                padding-top: env(safe-area-inset-top);
            }

            html {
                overflow: clip;
                height: 100%;
            }

            html {
                overflow: auto !important;
            }

            .css-1e6doj4 {
                box-sizing: border-box;
                margin: 0px;
                min-width: 0px;
                display: flex;
                box-shadow: rgba(0, 0, 0, 0.05) 0px 0px 4px;
                flex: 1 1 0%;
                padding: 24px;
            }

            .css-6vt7sa {
                width: 40px;
                height: 40px;
            }

            .css-6vt7sa {
                width: 40px;
                height: 40px;
            }

            .css-3miali {
                display: block;
            }

            .css-3miali {
                box-sizing: border-box;
                margin: 0px;
                min-width: 0px;
                box-shadow: rgba(0, 0, 0, 0.08) 0px 2px 4px, rgba(0, 0, 0, 0.08) 0px 0px 4px;
                position: relative;
                z-index: 1;

                width: 200px;

            }

            .css-6vt7sa {
                box-sizing: border-box;
                margin: 0px;
                min-width: 0px;
                display: flex;
                width: 32px;
                height: 32px;
                border-radius: 100%;
                border-width: 1px;
                border-style: solid;
                border-color: rgb(30, 35, 41);
                font-weight: 500;
                -moz-box-pack: center;
                justify-content: center;
                -moz-box-align: center;
                align-items: center;
                font-size: 20px;
                color: rgb(30, 35, 41);
            }

            .css-1sgz1lk {
                box-sizing: border-box;
                margin: 0px 0px 0px 16px;
                min-width: 0px;
            }

            .css-ize0sl {
                box-sizing: border-box;
                margin: 0px 0px 4px;
                min-width: 0px;
                display: flex;
                -moz-box-align: center;
                align-items: center;
            }

            .css-1ry7rnu {
                box-sizing: border-box;
                margin: 0px;
                min-width: 0px;
                display: flex;
                color: rgb(112, 122, 138);
                font-size: 12px;
                line-height: 1.25;
            }

            .css-1ry7rnu {
                color: rgb(112, 122, 138);
                font-size: 12px;
                line-height: 1.25;
            }

            .css-1wu88jq {
                margin: 16px;
            }

            .css-1wu88jq {
                margin: 16px;
            }

            .css-1wu88jq {
                box-sizing: border-box;
                min-width: 0px;
                background: url("https://bin.bnbstatic.com/static/images/accounts/dashboard/banner/right.svg") no-repeat scroll right top / auto 264px, url("https://bin.bnbstatic.com/static/images/accounts/dashboard/banner/left.svg") no-repeat scroll left bottom / 281px 154px, rgba(0, 0, 0, 0) linear-gradient(102.18deg, rgb(52, 56, 63) 11.81%, rgb(30, 32, 38) 94.26%) repeat scroll 0% 0%;
                box-shadow: rgba(0, 0, 0, 0.08) 0px 2px 4px, rgba(0, 0, 0, 0.08) 0px 0px 4px;
                border-radius: 4px;
                margin: 0px;
                padding: 24px;
            }
            .css-ei3nni {
    width: 50%;
}
.css-1pysja1 {
    box-sizing: border-box;
    margin: 0px;
    min-width: 0px;
    flex: 1 1 0%;
}.css-1hythwr {
    box-sizing: border-box;
    margin: 0px;
    min-width: 0px;
    display: flex;
    flex: 1 1 0%;
    flex-direction: column;
}.css-2ypmf8 {
    box-sizing: border-box;
    margin: 0px;
    min-width: 0px;
    display: flex;
    flex: 1 1 0%;
    -moz-box-pack: center;
    justify-content: center;
    color: rgb(112, 122, 138);
}.css-cvp9q5 {
    margin-top: 24px;
    margin-bottom: 24px;
}
.css-cvp9q5 {
    box-sizing: border-box;
    margin: 16px 0px;
        margin-top: 16px;
        margin-bottom: 16px;
    min-width: 0px;
    text-align: center;
}
.css-2ypmf8 {
    color: rgb(112, 122, 138);
}.css-1lzksdc {
    margin: 24px;
}
.css-1lzksdc {
    width: 96px;
    height: 96px;
    font-size: 96px;
}.css-1lzksdc {
    box-sizing: border-box;
    min-width: 0px;
    color: rgb(132, 142, 156);
    font-size: 64px;
    fill: rgb(132, 142, 156);
    margin: 16px;
    width: 1em;
    height: 1em;
}
.css-cvp9q5 {
    text-align: center;
}
.css-ei3nni {
    box-sizing: border-box;
    margin: 0px;
    min-width: 0px;
    display: flex;
    width: 100%;
    padding: 8px;
}.css-1p01izn {
    box-sizing: border-box;
    margin: 0px;
    min-width: 0px;
    box-shadow: rgba(20, 21, 26, 0.04) 0px 1px 2px, rgba(71, 77, 87, 0.04) 0px 3px 6px, rgba(20, 21, 26, 0.1) 0px 0px 1px;
    border-radius: 4px;
    background-color: rgb(255, 255, 255);
    padding: 0px 16px;
    width: 100%;
}.css-1hythwr {
    box-sizing: border-box;
    margin: 0px;
    min-width: 0px;
    display: flex;
    flex: 1 1 0%;
    flex-direction: column;
}.css-hwv82q {
    box-sizing: border-box;
    margin: 0px;
    min-width: 0px;
    border-width: 0px 0px 1px;
    border-style: solid;
    border-color: rgb(234, 236, 239);
    flex: 1 1 0%;
    padding-top: 16px;
    padding-bottom: 16px;
}.css-5x6ly7 {
    box-sizing: border-box;
    margin: 0px;
    min-width: 0px;
    display: flex;
    flex: 1 1 0%;
    -moz-box-align: center;
    align-items: center;
}.css-5x6ly7 {
    box-sizing: border-box;
    margin: 0px;
    min-width: 0px;
    display: flex;
    flex: 1 1 0%;
    -moz-box-align: center;
    align-items: center;
}.css-181kvgz {
    font-size: 16px;
}
.css-181kvgz {
    box-sizing: border-box;
    margin: 0px 16px 0px 0px;
    min-width: 0px;
    display: inline-block;
    text-decoration: none;
    font-weight: 600;
    color: rgb(30, 35, 41);
    font-size: 14px;
    padding: 0px;
}
a {
    background-color: transparent;
}.css-10nf7hq {
    box-sizing: border-box;
    margin: 0px;
    min-width: 0px;
    display: flex;
    -moz-box-align: center;
    align-items: center;
}.css-1s6nhe2 {
    box-sizing: border-box;
    margin: 0px 0px 0px 16px;
    min-width: 0px;
    text-decoration: none;
    color: rgb(201, 148, 0);
    display: flex;
}
a {
    background-color: transparent;
}.css-155meta {
    box-sizing: border-box;
    margin: 0px;
    min-width: 0px;
    color: rgb(0, 0, 0);
    font-size: 24px;
    fill: rgb(0, 0, 0);
    width: 1em;
    height: 1em;
}.css-1dcd6pv {
    box-sizing: border-box;
    margin: 0px;
    min-width: 0px;
    display: flex;
    flex: 1 1 0%;
    padding-top: 16px;
    padding-bottom: 16px;
    flex-direction: column;
}.css-1h690ep {
    box-sizing: border-box;
    margin: 0px;
    min-width: 0px;
    display: flex;
    flex: 1 1 0%;
}.css-phax11 {
    box-sizing: border-box;
    margin: 0px;
    min-width: 0px;
    display: flex;
    padding: 8px;
    flex-direction: column;
    width: 20%;
}.css-9b6x94 {
    box-sizing: border-box;
    margin: 0px;
    min-width: 0px;
    font-size: 12px;
    color: rgb(112, 122, 138);
    line-height: 1.5;
}
            .css-rd5pjd {
                font-size: 32px;
            }

            .css-rd5pjd {
                font-size: 32px;
            }

            .css-rd5pjd {
                font-size: 32px;
                line-height: 40px;
            }

            .css-rd5pjd {
                font-size: 28px;
                line-height: 32px;
            }

            .css-rd5pjd {
                box-sizing: border-box;
                margin: 0px;
                min-width: 0px;
                font-weight: 600;
                line-height: 30px;
                font-size: 24px;
                color: rgb(255, 255, 255);
            }

            .css-45f3jl {
                font-size: 16px;
            }

            .css-45f3jl {
                font-size: 16px;
            }

            .css-45f3jl {
                box-sizing: border-box;
                margin: 0px;
                min-width: 0px;
                font-weight: 400;
                line-height: 30px;
                font-size: 14px;
                color: rgba(255, 255, 255, 0.5);
            }

            .css-11grwh5 {
                margin-top: 24px;
            }

            .css-11grwh5 {
                margin-top: 24px;
            }

            .css-11grwh5 {
                box-sizing: border-box;
                margin: 0px;
                margin-top: 0px;
                min-width: 0px;
                display: flex;
                position: relative;
                flex-direction: row;
            }

            .css-1r1a9yt {
                top: 10px;
                left: 10px;
                width: 160px;
            }

            .css-1r1a9yt {
                box-sizing: border-box;
                margin: 0px;
                min-width: 0px;
                position: absolute;
                top: 26px;
                left: 26px;
                width: 180px;
                border-bottom: 1px dotted rgb(240, 185, 11);
                border-bottom-color: rgb(240, 185, 11);
                border-color: rgb(240, 185, 11);
                z-index: 1;
            }

            .css-tq0shg {
                box-sizing: border-box;
                margin: 0;
                min-width: 0;
                display: -webkit-box;
                display: -webkit-flex;
                display: -ms-flexbox;
                display: flex;
                -webkit-flex-direction: column;
                -ms-flex-direction: column;
                flex-direction: column;
                min-height: 100vh;
            }

            .css-j6gp5y {
                -webkit-flex-direction: row;
                -ms-flex-direction: row;
                flex-direction: row;
            }

            .css-j6gp5y {
                display: -webkit-box;
                display: -webkit-flex;
                display: -ms-flexbox;
                display: flex;
            }

            .css-j6gp5y {
                box-sizing: border-box;
                margin: 0;
                min-width: 0;
                display: block;
                -webkit-flex-direction: column;
                -ms-flex-direction: column;
                flex-direction: column;
                -webkit-align-items: center;
                -webkit-box-align: center;
                -ms-flex-align: center;
                align-items: center;
            }

            .css-1uj9b6u {
                -webkit-flex: 1;
                -ms-flex: 1;
                flex: 1;
            }

            .css-1uj9b6u {
                -webkit-flex: 2;
                -ms-flex: 2;
                flex: 2;
            }

            .css-1uj9b6u {
                box-sizing: border-box;
                margin: 0;
                min-width: 0;
                -webkit-flex: 1;
                -ms-flex: 1;
                flex: 1;
            }

            html body {
                font-family: BinancePlex, Arial, sans-serif !important;
            }

            body {
                font-family: BinancePlex, Arial, sans-serif !important;
            }

            html {
                line-height: 1.15;
            }

            .css-127q0z3 {
                padding-bottom: 72%;
                background-image: url('https://bin.bnbstatic.com/static/images/download/desktop-trade.png');
            }

            .css-127q0z3 {
                box-sizing: border-box;
                margin: 0;
                min-width: 0;
                display: -webkit-box;
                display: -webkit-flex;
                display: -ms-flexbox;
                display: flex;
                position: relative;
                width: 100%;
                height: 0;
                padding-bottom: 53%;
                background-size: 92% auto;
                background-position: left;
                background-repeat: no-repeat;

            }

            html body {
                font-family: BinancePlex, Arial, sans-serif !important;
            }

            body {
                font-family: BinancePlex, Arial, sans-serif !important;
            }

            html {
                line-height: 1.15;
            }

            html body {
                font-family: BinancePlex, Arial, sans-serif !important;
            }

            body {
                font-family: BinancePlex, Arial, sans-serif !important;
            }

            html {
                line-height: 1.15;
            }

            BinancePlex Binance PLEX Regular normal .css-127q0z3 {
                box-sizing: border-box;
                margin: 0;
                min-width: 0;
                display: -webkit-box;
                display: -webkit-flex;
                display: -ms-flexbox;
                display: flex;
                position: relative;
                width: 100%;
                height: 0;
                padding-bottom: 53%;
                background-size: 92% auto;
                background-position: left;
                background-repeat: no-repeat;
                background-image: url('https://bin.bnbstatic.com/static/images/download/desktop-trade.png');
            }

            .css-1woe67z {
                width: 25%;
            }

            .css-1woe67z {
                width: 50%;
            }

            .css-1woe67z {
                box-sizing: border-box;
                margin: 0;
                min-width: 0;
                width: 100%;
            }

            html body {
                font-family: BinancePlex, Arial, sans-serif !important;
            }

            body {
                font-family: BinancePlex, Arial, sans-serif !important;
            }
    </style>
    <style data-emotion-css="1rj0lsg">
        .css-1rj0lsg {
            box-sizing: border-box;
            margin: 0;
            min-width: 0;
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex;
            position: relative;
            top: 0;
            left: 0;
            z-index: 1001;
            color: #fff;
            height: 64px;
            background-color: #12161C;
            -webkit-align-items: center;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            width: 100%;
            outline: none !important;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        .css-1uzvpxr {
            margin-left: 12px;
            margin-right: 12px;
            padding-left: 12px;
            padding-right: 12px;
        }

        .css-1uzvpxr {
            margin-left: 8px;
            margin-right: 8px;
            padding-left: 8px;
            padding-right: 8px;
        }

        .css-1uzvpxr {
            box-sizing: border-box;
            margin: 0;
            margin-right: 0px;
            margin-left: 0px;
            min-width: 0;
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex;
            border-radius: 6px;
            cursor: pointer;
            margin-left: 4px;
            margin-right: 4px;
            padding-left: 4px;
            padding-right: 4px;
            padding-top: 32px;
            padding-bottom: 32px;
            -webkit-flex-direction: column;
            -ms-flex-direction: column;
            flex-direction: column;
        }

        .css-1wr4jig {
            box-sizing: border-box;
            margin: 0px;
            min-width: 0px;
            display: flex;
            flex-direction: column;
            flex: 1 1 0%;
        }

        .css-xry4yv {
            flex-direction: row;
        }

        .css-xry4yv {
            box-sizing: border-box;
            margin: 0px;
            min-width: 0px;
            display: flex;
            min-height: 600px;
            flex: 1 1 0%;
            flex-direction: column;
        }

        .css-qq5x5r {
            box-sizing: border-box;
            margin: 0px;
            min-width: 0px;
            background-color: rgb(18, 22, 28);
            padding: 16px 16px 8px;
            display: block;
        }

        .css-vurnku {
            box-sizing: border-box;
            margin: 0px;
            min-width: 0px;
        }

        .css-udfbh4 {
            box-sizing: border-box;
            margin: 0px;
            min-width: 0px;
            width: 100%;
            white-space: nowrap;
            display: flex;
            flex-direction: row;
            overflow: scroll;
            scrollbar-width: none;
            height: 35px;
        }

        .css-ov54vn {
            box-sizing: border-box;
            margin: 0px;
            cursor: pointer;
            min-width: auto;
        }

        .css-udfbh4 {
            white-space: nowrap;
        }

        .css-f6q5ro {
            box-sizing: border-box;
            margin: 0px 24px 0px 0px;
            min-width: 0px;
            display: flex;
            -moz-box-align: center;
            align-items: center;
            color: rgb(112, 122, 138);
        }

        .css-ov54vn {
            cursor: pointer;
        }

        .css-udfbh4 {
            white-space: nowrap;
        }

        .css-f6q5ro>svg {
            color: rgb(240, 185, 11);
        }

        .css-f6q5ro>svg {
            margin-right: 4px;
        }

        .css-1iztezc {
            box-sizing: border-box;
            margin: 0px;
            margin-right: 0px;
            min-width: 0px;
            color: currentcolor;
            font-size: 24px;
            fill: currentcolor;
            width: 1em;
            height: 1em;
        }

        .css-f6q5ro {
            color: rgb(112, 122, 138);
        }

        .css-ov54vn {
            cursor: pointer;
        }

        .css-udfbh4 {
            white-space: nowrap;
        }

        .css-f6q5ro>div {
            color: rgb(255, 255, 255);
        }

        .css-f6q5ro>div {
            flex-direction: column;
            font-size: 16px;
            line-height: 1.5;
            position: relative;
        }

        .css-4cffwv {
            box-sizing: border-box;
            margin: 0px;
            min-width: 0px;
            display: flex;
        }

        .css-f6q5ro {
            color: rgb(112, 122, 138);
        }

        .css-ov54vn {
            cursor: pointer;
        }

        .css-udfbh4 {
            white-space: nowrap;
        }

        .css-f6q5ro>div>div {
            position: absolute;
            bottom: -2px;
            height: 2px;
            width: 100%;
            background-color: rgb(240, 185, 11);
        }

        .css-vurnku {
            box-sizing: border-box;
            margin: 0px;
            min-width: 0px;
        }

        .css-f6q5ro>div {
            color: rgb(255, 255, 255);
        }

        .css-f6q5ro>div {
            font-size: 16px;
            line-height: 1.5;
        }

        .css-f6q5ro {
            color: rgb(112, 122, 138);
        }

        .css-ov54vn {
            cursor: pointer;
        }

        .css-udfbh4 {
            white-space: nowrap;
        }

        .css-1fduat {
            box-sizing: border-box;
            margin: 0px 24px 0px 0px;
            min-width: 0px;
            display: flex;
            -moz-box-align: center;
            align-items: center;
            color: rgb(112, 122, 138);
        }

        .css-ov54vn {
            cursor: pointer;
        }

        .css-udfbh4 {
            white-space: nowrap;
        }

        .css-1fduat>svg {
            margin-right: 4px;
        }

        .css-1iztezc {
            box-sizing: border-box;
            margin: 0px;
            margin-right: 0px;
            min-width: 0px;
            color: currentcolor;
            font-size: 24px;
            fill: currentcolor;
            width: 1em;
            height: 1em;
        }

        .css-1fduat {
            color: rgb(112, 122, 138);
        }

        .css-ov54vn {
            cursor: pointer;
        }

        .css-udfbh4 {
            white-space: nowrap;
        }

        .css-1fduat>div {
            flex-direction: column;
            font-size: 16px;
            line-height: 1.5;
            position: relative;
        }

        .css-4cffwv {
            box-sizing: border-box;
            margin: 0px;
            min-width: 0px;
            display: flex;
        }

        .css-1fduat {
            color: rgb(112, 122, 138);
        }

        .css-ov54vn {
            cursor: pointer;
        }

        .css-udfbh4 {
            white-space: nowrap;
        }

        .css-gnqbje {
            box-sizing: border-box;
            margin: 0px;
            min-width: 0px;
            display: block;
        }

        .css-1bzb8nq {
            box-sizing: border-box;
            margin: 0px;
            min-width: 0px;
            display: none;
        }

        .css-3miali {
            display: block;
        }

        .css-3miali {
            box-sizing: border-box;
            margin: 0px;
            min-width: 0px;
            box-shadow: rgba(0, 0, 0, 0.08) 0px 2px 4px, rgba(0, 0, 0, 0.08) 0px 0px 4px;
            position: relative;
            z-index: 1;

            width: 200px;
        }

        a,
        a:active,
        a:visited {
            text-decoration: none;
        }

        .css-z87e9z {
            box-sizing: border-box;
            margin: 0px;
            min-width: 0px;
            text-decoration: none;
            color: rgb(201, 148, 0);
            border-left: 4px solid rgb(240, 185, 11);
            height: 48px;
            background-color: rgb(245, 245, 245);
            font-weight: 500;
            display: flex;
            -moz-box-align: center;
            align-items: center;
            -moz-box-pack: justify;
            justify-content: space-between;
        }

        .css-10j588g {
            box-sizing: border-box;
            margin: 0px;
            min-width: 0px;
            display: flex;
            flex: 1 1 0%;
            height: 100%;
            -moz-box-align: center;
            align-items: center;
        }

        .css-z87e9z {
            color: rgb(201, 148, 0);
            font-weight: 500;
        }

        .css-14thuu2 {
            box-sizing: border-box;
            margin: 0px 8px;
            min-width: 0px;
            color: rgb(240, 185, 11);
            font-size: 24px;
            fill: rgb(240, 185, 11);
            width: 1em;
            height: 1em;
            flex-shrink: 0;
        }

        .css-z87e9z {
            color: rgb(201, 148, 0);
            font-weight: 500;
        }

        .css-iizq59 {
            box-sizing: border-box;
            margin: 0px;
            min-width: 0px;
            font-weight: 500;
            font-size: 14px;
            line-height: 20px;
            word-break: break-word;
            display: flex;
            flex: 1 1 0%;
            height: 100%;
            -moz-box-align: center;
            align-items: center;
            color: rgb(33, 40, 51);
        }

        .css-z87e9z {
            color: rgb(201, 148, 0);
            font-weight: 500;
        }

        .css-6ijtmk {
            box-sizing: border-box;
            margin: 0px;
            min-width: 0px;
            text-decoration: none;
            color: rgb(201, 148, 0);
            border-left: 4px solid transparent;
            height: 48px;
            display: flex;
            -moz-box-align: center;
            align-items: center;
            -moz-box-pack: justify;
            justify-content: space-between;
        }

        a {
            background-color: transparent;
        }

        a,
        a:active,
        a:visited {
            text-decoration: none;
        }

        .css-10j588g {
            box-sizing: border-box;
            margin: 0px;
            min-width: 0px;
            display: flex;
            flex: 1 1 0%;
            height: 100%;
            -moz-box-align: center;
            align-items: center;
        }

        .css-6ijtmk {
            color: rgb(201, 148, 0);
        }

        .css-hd27fe {
            box-sizing: border-box;
            margin: 0px 8px;
            min-width: 0px;
            color: rgb(132, 142, 156);
            font-size: 24px;
            fill: rgb(132, 142, 156);
            width: 1em;
            height: 1em;
            flex-shrink: 0;
        }

        .css-6ijtmk {
            color: rgb(201, 148, 0);
        }

        .css-hd27fe {
            color: rgb(132, 142, 156);
            font-size: 24px;
            fill: rgb(132, 142, 156);
        }

        .css-6ijtmk {
            color: rgb(201, 148, 0);
        }

        .css-1n0484q {
            box-sizing: border-box;
            margin: 0px;
            min-width: 0px;
            font-weight: 400;
            font-size: 14px;
            line-height: 20px;
            word-break: break-word;
            display: flex;
            flex: 1 1 0%;
            height: 100%;
            -moz-box-align: center;
            align-items: center;
            color: rgb(33, 40, 51);
        }

        .css-uliqdc {
            box-sizing: border-box;
            margin: 0px;
            min-width: 0px;
            display: flex;
            flex-direction: column;
        }

        .css-1jm49l2 {
            box-sizing: border-box;
            margin: 0px;
            min-width: 0px;
            cursor: pointer;
        }

        .css-6ijtmk {
            box-sizing: border-box;
            margin: 0px;
            min-width: 0px;
            text-decoration: none;
            color: rgb(201, 148, 0);
            border-left: 4px solid transparent;
            height: 48px;
            display: flex;
            -moz-box-align: center;
            align-items: center;
            -moz-box-pack: justify;
            justify-content: space-between;
        }

        a {
            background-color: transparent;
        }

        a,
        a:active,
        a:visited {
            text-decoration: none;
        }

        .css-1jm49l2 {
            cursor: pointer;
        }

        .css-10j588g {
            box-sizing: border-box;
            margin: 0px;
            min-width: 0px;
            display: flex;
            flex: 1 1 0%;
            height: 100%;
            -moz-box-align: center;
            align-items: center;
        }

        .css-6ijtmk {
            color: rgb(201, 148, 0);
        }

        .css-1jm49l2 {
            cursor: pointer;
        }

        .css-1n0484q {
            box-sizing: border-box;
            margin: 0px;
            min-width: 0px;
            font-weight: 400;
            font-size: 14px;
            line-height: 20px;
            word-break: break-word;
            display: flex;
            flex: 1 1 0%;
            height: 100%;
            -moz-box-align: center;
            align-items: center;
            color: rgb(33, 40, 51);
        }

        .css-6ijtmk {
            color: rgb(201, 148, 0);
        }

        .css-1jm49l2 {
            cursor: pointer;
        }

        .css-1p2k4r6 {
            box-sizing: border-box;
            margin: 0px 4px;
            min-width: 0px;
            font-size: 16px;
            fill: currentcolor;
            color: rgb(132, 142, 156);
            transition: all 0.1s ease 0s;
            transform: rotate(0deg);
            width: 1em;
            height: 1em;
        }

        .css-6ijtmk {
            color: rgb(201, 148, 0);
        }

        .css-1jm49l2 {
            cursor: pointer;
        }

        .css-1wr4jig {
            box-sizing: border-box;
            margin: 0px;
            min-width: 0px;
            display: flex;
            flex-direction: column;
            flex: 1 1 0%;
        }

        main {
            display: block;
        }

        .css-xry4yv {
            flex-direction: row;
        }

        .css-xry4yv {
            box-sizing: border-box;
            margin: 0px;
            min-width: 0px;
            display: flex;
            min-height: 600px;
            flex: 1 1 0%;

        }

        main {
            display: block;
        }

        .lozad-load.lozad-loaded {
            opacity: 1;
        }

        .css-dqakkt {
            margin-bottom: 24px;
        }

        .css-dqakkt {
            box-sizing: border-box;
            margin: 0;
            margin-right: 0px;
            margin-bottom: 0px;
            margin-left: 0px;
            min-width: 0;
            width: 80px;
            height: 80px;
            margin-left: auto;
            margin-right: auto;
            margin-bottom: 16px;
        }

        .lozad-load {
            opacity: 0;
            transition: opacity 0.375s ease 0s;
        }

        img {
            border-style: none;
        }

        .css-1uzvpxr {
            cursor: pointer;
        }

        .css-1rj0lsg .icon {
            width: 1em;
            height: 1em;
            vertical-align: -0.15em;
            fill: currentColor;
            overflow: hidden;
        }
    </style>
    <style data-emotion-css="tsyi71">
        .css-tsyi71 {
            box-sizing: border-box;
            margin: 0;
            min-width: 0;
            cursor: pointer;
            width: 120px;
            min-width: 120px;
            fill: #1E2329;
            fill: #F0B90B;
            height: 24px;
            margin-right: 16px;
            margin-left: 24px;
        }
    </style>
    <style data-emotion-css="1w2cmbz">
        .css-1w2cmbz {
            box-sizing: border-box;
            margin: 0;
            min-width: 0;
            outline: none;
            display: none;
        }

        .css-1w2cmbz:hover .hoverstatus {
            color: #F0B90B;
        }

        .css-1w2cmbz:hover .hoverstatus .icon-dropdown-arrow {
            fill: #F0B90B;
            -webkit-transform: rotate(180deg);
            -ms-transform: rotate(180deg);
            transform: rotate(180deg);
        }

        @media screen and (min-width:767px) {
            .css-1w2cmbz {
                display: -webkit-box;
                display: -webkit-flex;
                display: -ms-flexbox;
                display: flex;
            }
        }

        @media screen and (min-width:1023px) {
            .css-1w2cmbz {
                display: -webkit-box;
                display: -webkit-flex;
                display: -ms-flexbox;
                display: flex;
            }
        }
    </style>
    <style data-emotion-css="yu8bgj">
        .css-yu8bgj {
            box-sizing: border-box;
            margin: 0;
            min-width: 0;
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex;
            position: relative;
            top: -1px;
            color: #fff;
            background-color: #1E2126;
            -webkit-flex-direction: column;
            -ms-flex-direction: column;
            flex-direction: column;
        }
    </style>
    <style data-emotion-css="bynj8">
        .css-bynj8 {
            box-sizing: border-box;
            margin: 0;
            min-width: 0;
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex;
            padding-left: 16px;
            padding-right: 16px;
            padding-top: 12px;
            padding-bottom: 12px;
            -webkit-align-items: center;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            font-size: 14px;
            -webkit-text-decoration: none;
            text-decoration: none;
            color: #fff;
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex;
        }

        .css-bynj8:active,
        .css-bynj8:visited {
            color: #fff;
        }

        .css-160vccy {
            box-sizing: border-box;
            margin: 0px;
            min-width: 0px;
            flex: 1 1 0%;
            background-color: rgb(250, 250, 250);
        }

        .css-146q23 {
            box-sizing: border-box;
            margin: 0px;
            min-width: 0px;
            flex: 1 1 0%;
            background-color: rgb(255, 255, 255);
        }

        .css-1e6doj4 {
            box-sizing: border-box;
            margin: 0px;
            min-width: 0px;
            display: flex;
            box-shadow: rgba(0, 0, 0, 0.05) 0px 0px 4px;
            flex: 1 1 0%;
            padding: 24px;
        }

        .css-1rj0lsg {
            box-sizing: border-box;
            margin: 0px;
            min-width: 0px;
            display: flex;
            position: relative;
            top: 0px;
            left: 0px;
            z-index: 1001;
            color: rgb(255, 255, 255);
            height: 64px;
            background-color: rgb(18, 22, 28);
            -moz-box-align: center;
            align-items: center;
            width: 100%;
            outline: currentcolor none medium !important;
            user-select: none;
        }

        .css-bynj8:hover {
            color: #F0B90B;
            background-color: rgba(255, 255, 255, 0.04);
        }

        .css-bynj8 span {
            margin-top: 4px;
            font-size: 12px;
            color: rgba(255, 255, 255, 0.3);
        }
        .css-1dfql01 {
    min-height: 24px;
}
.css-1dfql01 {
    min-height: 24px;
}
.css-1dfql01 {
    margin: 0px 4px;
    min-width: 0px;
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
    line-height: 20px;
    word-break: keep-all;
    color: rgb(33, 40, 51);
    border-radius: 4px;
    padding: 4px 16px;
    border: medium none;
    background-color: transparent;
    box-shadow: rgb(234, 236, 239) 0px 0px 0px 1px inset;
    flex: 1 1 0%;
    min-height: 32px;
    font-size: 12px;
}
button, [type="button"], [type="reset"], [type="submit"] {
    appearance: button;
}
button, select {
    text-transform: none;
}.css-gnqbje {
    box-sizing: border-box;
    margin: 0px;
    min-width: 0px;
    display: block;
}.css-ysetcg {
    padding-top: 48px;
    padding-bottom: 48px;
}

.css-ysetcg {
    box-sizing: border-box;
    margin: 0px;
    min-width: 0px;
    
}.css-ct0qa6 {
    flex-direction: row;
}
.css-ct0qa6 {
    flex-direction: column;
}
.css-ct0qa6 {
    box-sizing: border-box;
    margin: 0px;
    min-width: 0px;
    display: flex;
    flex: 1 1 0%;
    flex-flow: column wrap;
        flex-direction: column;
}.css-1bliacb {
    margin-bottom: 24px;
}
.css-1bliacb {
    margin-bottom: 0px;
}
.css-1bliacb {
    box-sizing: border-box;
    margin: 0px;
        margin-bottom: 0px;
    min-width: 250px;
    flex: 1 1 0%;
}.css-vurnku {
    box-sizing: border-box;
    margin: 0px;
    min-width: 0px;
}.css-1f978ju {
    box-sizing: border-box;
    margin: 0px 0px 8px;
    min-width: 0px;
}.css-ize0sl {
    box-sizing: border-box;
    margin: 0px 0px 4px;
    min-width: 0px;
    display: flex;
    -moz-box-align: center;
    align-items: center;
}.css-1kbdyxh {
    font-size: 14px;
}
.css-1kbdyxh {
    font-size: 14px;
}
.css-1kbdyxh {
    box-sizing: border-box;
    margin: 0px;
    min-width: 0px;
    font-size: 12px;
    color: rgb(112, 122, 138);
    display: inline-block;
}element {
    line-height: 22px;
    user-select: none;
}.dropbtn {
  background-color: #04AA6D;
  color: white;
  
  font-size: 7px;
  border: 2px;
  
}

/* The container <div> - needed to position the dropdown content */
.dropdown {
   
margin: 0px 5px 0px 4px;
min-width: 0px;
display: inline-block;

position: relative;


}

/* Dropdown Content (Hidden by Default) */
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

.css-1atcjr2 {
    margin: 0px 0px 0px 8px;
        margin-left: 8px;
    min-width: 0px;
    appearance: none;
    user-select: none;
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
    line-height: 20px;
    word-break: keep-all;
    color: rgb(33, 40, 51);
    padding: 4px;
    border: medium none;
    background-color: transparent;
    box-shadow: rgb(234, 236, 239) 0px 0px 0px 1px inset;
    font-size: 12px;
    cursor: pointer;
    border-radius: 4px;
    height: 22px;
    min-height: 22px;
}.css-czxcdk {
    box-sizing: border-box;
    margin: 0px;
    min-width: 0px;
    color: rgb(132, 142, 156);
    font-size: 20px;
    fill: rgb(132, 142, 156);
    width: 1em;
    height: 1em;
}
element {
    line-height: 22px;
}
.css-1atcjr2 {
    white-space: nowrap;
    font-family: inherit;
    text-align: center;
    font-weight: 500;
    line-height: 20px;
    word-break: keep-all;
    color: rgb(33, 40, 51);
    font-size: 12px;
    cursor: pointer;
}
button, select {
    text-transform: none;
}.css-n5mzgu {
    font-size: 14px;
    line-height: 24px;
}
.css-n5mzgu {
    font-size: 14px;
    line-height: 24px;
}
.css-n5mzgu {
    box-sizing: border-box;
    margin: 0px;
    min-width: 0px;
    display: flex;
    align-items: flex-end;
    flex-wrap: wrap;
    color: rgb(30, 35, 41);
    font-size: 12px;
    line-height: 100%;
}.css-off8uh {
    box-sizing: border-box;
    margin: 0px 4px 0px 0px;
    min-width: 0px;
    display: flex;
    align-items: flex-end;
}
.css-n5mzgu {
    font-size: 14px;
    line-height: 24px;
}
.css-n5mzgu {
    font-size: 14px;
    line-height: 24px;
}
.css-n5mzgu {
    color: rgb(30, 35, 41);
    font-size: 12px;
    line-height: 100%;
}.css-1t9tl2o {
    font-size: 32px;
    line-height: 36px;
}
.css-1t9tl2o {
    font-size: 32px;
    line-height: 36px;
}
.css-1t9tl2o {
    box-sizing: border-box;
    margin: 0px;
    min-width: 0px;
    font-size: 24px;
    line-height: 22px;
}
.css-n5mzgu {
    font-size: 14px;
    line-height: 24px;
}
.css-n5mzgu {
    font-size: 14px;
    line-height: 24px;
}
.css-n5mzgu {
    color: rgb(30, 35, 41);
    font-size: 12px;
    line-height: 100%;
}
.css-n5mzgu {
    color: rgb(30, 35, 41);
    font-size: 12px;
    line-height: 100%;
}.css-jmlio4 {
    box-sizing: border-box;
    margin: 16px 0px 0px;
    min-width: 0px;
}.css-67pg7t {
    font-size: 14px;
}
.css-67pg7t {
    font-size: 14px;
}
.css-67pg7t {
    box-sizing: border-box;
    margin: 0px 0px 8px;
    min-width: 0px;
    font-size: 12px;
    color: rgb(112, 122, 138);
    display: inline-block;
}.css-2psl {
    font-size: 14px;
}
.css-2psl {
    font-size: 14px;
}
.css-2psl {
    box-sizing: border-box;
    margin: 0px;
    min-width: 0px;
    display: flex;
    align-items: flex-end;
    flex-wrap: wrap;
    color: rgb(30, 35, 41);
    font-size: 12px;
    flex: 1 1 0%;
    -moz-box-pack: justify;
    place-content: center space-between;
}.css-11bw57b {
    font-size: 20px;
    line-height: 20px;
}
.css-11bw57b {
    font-size: 20px;
    line-height: 20px;
}
.css-11bw57b {
    box-sizing: border-box;
    margin: 0px;
    min-width: 0px;
    font-size: 16px;
    line-height: 16px;
}
.css-2psl {
    font-size: 14px;
}
.css-2psl {
    font-size: 14px;
}
.css-2psl {
    color: rgb(30, 35, 41);
    font-size: 12px;
}
    </style>
    <style data-emotion-css="4oedyv">
        .css-4oedyv {
            box-sizing: border-box;
            margin: 0;
            min-width: 0;
            color: #F0B90B;
            width: 34px;
            height: 34px;
            font-size: 34px;
            fill: #1E2329;
            fill: #F0B90B;
            margin-right: 16px;
        }
    </style>
    <style data-emotion-css="uliqdc">
        .css-uliqdc {
            box-sizing: border-box;
            margin: 0;
            min-width: 0;
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex;
            -webkit-flex-direction: column;
            -ms-flex-direction: column;
            flex-direction: column;
        }
    </style>
    <style data-emotion-css="10nf7hq">
        .css-10nf7hq {
            box-sizing: border-box;
            margin: 0;
            min-width: 0;
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex;
            -webkit-align-items: center;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
        }
    </style>
    <style data-emotion-css="3fz18">
        .css-3fz18 {
            box-sizing: border-box;
            margin: 0;
            min-width: 0;
            color: #3375BB;
            width: 34px;
            height: 34px;
            font-size: 34px;
            fill: #1E2329;
            fill: #3375BB;
            margin-right: 16px;
        }
    </style>
    <style data-emotion-css="1qqh4qo">
        .css-1qqh4qo {
            box-sizing: border-box;
            margin: 0;
            min-width: 0;
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex;
            padding-left: 8px;
            padding-right: 16px;
            height: 64px;
            -webkit-align-items: center;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            font-size: 14px;
            -webkit-text-decoration: none;
            text-decoration: none;
            -webkit-flex-shrink: 0;
            -ms-flex-negative: 0;
            flex-shrink: 0;
            color: #fff;
            cursor: pointer;
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex;
            line-height: 64px;
        }

        .css-1qqh4qo:active,
        .css-1qqh4qo:visited {
            color: #fff;
        }

        .css-1qqh4qo:hover {
            color: #F0B90B;
        }
    </style>
    <style data-emotion-css="10tvpu7">
        .css-10tvpu7 {
            box-sizing: border-box;
            margin: 0;
            min-width: 0;
            min-width: 24px;
            width: 24px;
            height: 24px;
            fill: #1E2329;
            fill: currentColor;
        }
    </style>
    <style data-emotion-css="qy1c27">
        .css-qy1c27 {
            box-sizing: border-box;
            margin: 0;
            min-width: 0;
            margin: auto;
            width: 16px;
            height: 16px;
            fill: #1E2329;
            fill: #848E9C;
        }
    </style>
    <style data-emotion-css="1ke7bwx">
        .css-1ke7bwx {
            box-sizing: border-box;
            margin: 0;
            min-width: 0;
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex;
            padding-left: 8px;
            padding-right: 16px;
            font-size: 14px;
            -webkit-text-decoration: none;
            text-decoration: none;
            cursor: pointer;
            -webkit-flex-shrink: 0;
            -ms-flex-negative: 0;
            flex-shrink: 0;
            -webkit-align-items: center;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            color: #fff;
            display: none;
        }

        .css-1ke7bwx:active,
        .css-1ke7bwx:visited {
            color: #fff;
        }

        .css-1ke7bwx:hover {
            color: #F0B90B;
        }

        @media screen and (min-width:767px) {
            .css-1ke7bwx {
                display: -webkit-box;
                display: -webkit-flex;
                display: -ms-flexbox;
                display: flex;
            }
        }

        @media screen and (min-width:1023px) {
            .css-1ke7bwx {
                display: -webkit-box;
                display: -webkit-flex;
                display: -ms-flexbox;
                display: flex;
            }
        }
    </style>
    <style data-emotion-css="13h7jkt">
        .css-13h7jkt {
            box-sizing: border-box;
            margin: 0;
            min-width: 0;
            display: inline-block;
            background-color: #F0B90B;
            width: 6px;
            height: 6px;
            position: relative;
            -webkit-transform: rotate(45deg);
            -ms-transform: rotate(45deg);
            transform: rotate(45deg);
            margin-right: 10px;
            margin-left: 8px;
        }
    </style>
    <style data-emotion-css="6lpvsz">
        .css-6lpvsz {
            box-sizing: border-box;
            margin: 0;
            min-width: 0;
            display: inline-block;
            background-color: transparent;
            width: 6px;
            height: 6px;
            position: relative;
            -webkit-transform: rotate(45deg);
            -ms-transform: rotate(45deg);
            transform: rotate(45deg);
            margin-right: 10px;
            margin-left: 8px;
        }
    </style>
    <style data-emotion-css="1rktosy">
        .css-1rktosy {
            box-sizing: border-box;
            margin: 0;
            min-width: 0;
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex;
            position: relative;
            border-radius: 4px;
            -webkit-align-items: center;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            height: 16px;
            background-color: #F0B90B;
            color: #212822;
            line-height: 16px;
            padding-left: 4px;
            padding-right: 4px;
            margin-left: 8px;
            font-size: 12px;
        }

        .css-1rktosy::before {
            content: "";
            position: absolute;
            width: 0;
            height: 0;
            left: -3px;
            top: 2px;
            border-style: solid;
            border-top-width: 6px;
            border-right-width: 6px;
            border-bottom-width: 6px;
            border-left-width: 0;
            border-top-color: transparent;
            border-right-color: #F0B90B;
            border-bottom-color: transparent;
            border-left-color: transparent;
        }
    </style>
    <style data-emotion-css="1h690ep">
        .css-1h690ep {
            box-sizing: border-box;
            margin: 0;
            min-width: 0;
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex;
            -webkit-flex: 1;
            -ms-flex: 1;
            flex: 1;
        }
    </style>
    <style data-emotion-css="109r71v">
        .css-109r71v {
            box-sizing: border-box;
            margin: 0;
            min-width: 0;
            outline: none;
            display: none;
        }

        .css-109r71v:hover .hoverstatus {
            color: #F0B90B;
        }

        .css-109r71v:hover .hoverstatus svg {
            fill: #F0B90B;
        }

        @media screen and (min-width:767px) {
            .css-109r71v {
                display: none;
            }
        }

        @media screen and (min-width:1023px) {
            .css-109r71v {
                display: -webkit-box;
                display: -webkit-flex;
                display: -ms-flexbox;
                display: flex;
            }
        }
    </style>
    <style data-emotion-css="1wkenai">
        .css-1wkenai {
            box-sizing: border-box;
            margin: 0;
            min-width: 0;
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex;
            padding-top: 16px;
            padding-bottom: 8px;
            padding-left: 8px;
            padding-right: 8px;
            -webkit-flex-direction: column;
            -ms-flex-direction: column;
            flex-direction: column;
            -webkit-box-pack: center;
            -webkit-justify-content: center;
            -ms-flex-pack: center;
            justify-content: center;
            -webkit-align-items: center;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
        }
    </style>
    <style data-emotion-css="mgi5dh">
        .css-mgi5dh {
            box-sizing: border-box;
            margin: 0;
            min-width: 0;
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex;
            width: 140px;
            height: 140px;
            -webkit-align-items: center;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            background-color: white;
            -webkit-box-pack: center;
            -webkit-justify-content: center;
            -ms-flex-pack: center;
            justify-content: center;
            margin-top: 8px;
            margin-bottom: 8px;
            border-radius: 4px;
        }
    </style>
    <style data-emotion-css="um0za2">
        .css-um0za2 {
            box-sizing: border-box;
            margin: 0;
            min-width: 0;
            max-width: 100%;
            height: auto;
            position: absolute;
            display: inline-block;
            border: 2px solid #fff;
            width: 20px;
            height: 20px;
        }
    </style>
    <style data-emotion-css="i8jtky">
        .css-i8jtky {
            box-sizing: border-box;
            margin: 0;
            min-width: 0;
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex;
            width: 140px;
            font-size: 12px;
            line-height: 16px;
            -webkit-align-items: center;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            text-align: center;
            -webkit-box-pack: center;
            -webkit-justify-content: center;
            -ms-flex-pack: center;
            justify-content: center;
            -webkit-letter-spacing: 0.32px;
            -moz-letter-spacing: 0.32px;
            -ms-letter-spacing: 0.32px;
            letter-spacing: 0.32px;
            color: #FFFFFF;
            opacity: 0.8;
        }
    </style>
    <style data-emotion-css="a3aj8l">
        .css-a3aj8l {
            box-sizing: border-box;
            margin: 0;
            min-width: 0;
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex;
            width: 100%;
            height: 1px;
            margin-top: 8px;
            margin-bottom: 8px;
            background-color: #474D57;
        }
    </style>
    <style data-emotion-css="17f30nx">
        .css-17f30nx {
            box-sizing: border-box;
            margin: 0;
            min-width: 0;
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex;
            padding-left: 8px;
            padding-right: 16px;
            font-size: 14px;
            -webkit-text-decoration: none;
            text-decoration: none;
            cursor: pointer;
            -webkit-flex-shrink: 0;
            -ms-flex-negative: 0;
            flex-shrink: 0;
            -webkit-align-items: center;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            color: #fff;
            -webkit-text-decoration: none;
            text-decoration: none;
            padding-left: 0px;
            padding-right: 0px;
        }

        .css-17f30nx:active,
        .css-17f30nx:visited {
            color: #fff;
        }

        .css-17f30nx:hover {
            color: #F0B90B;
        }
    </style>
    <style data-emotion-css="1xiq7m8">
        .css-1xiq7m8 {
            box-sizing: border-box;
            margin: 0;
            min-width: 0;
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            cursor: pointer;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
            display: -webkit-inline-box;
            display: -webkit-inline-flex;
            display: -ms-inline-flexbox;
            display: inline-flex;
            -webkit-align-items: center;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            -webkit-box-pack: center;
            -webkit-justify-content: center;
            -ms-flex-pack: center;
            justify-content: center;
            box-sizing: border-box;
            font-size: inherit;
            font-family: inherit;
            text-align: center;
            -webkit-text-decoration: none;
            text-decoration: none;
            outline: none;
            font-weight: 500;
            font-size: 14px;
            line-height: 20px;
            word-break: keep-all;
            color: #212833;
            border-radius: 4px;
            padding-top: 6px;
            padding-bottom: 6px;
            min-height: 24px;
            border: none;
            padding-left: 12px;
            padding-right: 12px;
            background-image: linear-gradient(180deg, #F8D12F 0%, #F0B90B 100%);
            min-width: 52px;
            font-size: 12px;
            line-height: 16px;
            min-width: 156px;
            height: 28px;
            min-height: 28px;
        }

        .css-1xiq7m8:disabled {
            cursor: not-allowed;
            background-image: none;
            background-color: #EAECEF;
            color: #B7BDC6;
        }

        .css-1xiq7m8:hover:not(:disabled):not(:active) {
            box-shadow: none;
        }

        .css-1xiq7m8.inactive {
            opacity: 0.3;
            cursor: not-allowed;
        }

        .css-1xiq7m8:active:not(:disabled):not(.inactive) {
            background-image: none;
            background-color: #F0B90B;
        }

        .css-1xiq7m8:hover:not(:disabled):not(:active):not(.inactive) {
            box-shadow: none;
            background-image: linear-gradient(180deg, #FFE251 0%, #EDC423 100%);
        }
    </style>
    <style data-emotion-css="g73q87">
        .css-g73q87 {
            box-sizing: border-box;
            margin: 0;
            min-width: 0;
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex;
            padding-left: 8px;
            padding-right: 16px;
            font-size: 14px;
            -webkit-text-decoration: none;
            text-decoration: none;
            cursor: pointer;
            -webkit-flex-shrink: 0;
            -ms-flex-negative: 0;
            flex-shrink: 0;
            -webkit-align-items: center;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            color: #fff;
            -webkit-text-decoration: none;
            text-decoration: none;
            height: 64px;
        }

        .css-g73q87:active,
        .css-g73q87:visited {
            color: #fff;
        }

        .css-g73q87:hover {
            color: #F0B90B;
        }
    </style>
    <style data-emotion-css="6ok8fu">
        .css-6ok8fu {
            box-sizing: border-box;
            margin: 0;
            min-width: 0;
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex;
            cursor: pointer;
            font-size: 14px;
            height: 64px;
            -webkit-align-items: center;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            padding-left: 8px;
            padding-right: 16px;
        }
    </style>
    <style data-emotion-css="1se4h0w">
        .css-1se4h0w {
            box-sizing: border-box;
            margin: 0;
            min-width: 0;
            display: none;
        }

        @media screen and (min-width:767px) {
            .css-1se4h0w {
                display: none;
            }
        }

        @media screen and (min-width:1023px) {
            .css-1se4h0w {
                display: -webkit-box;
                display: -webkit-flex;
                display: -ms-flexbox;
                display: flex;
            }
        }

        .css-1se4h0w:hover {
            color: #F0B90B;
        }
    </style>
    <style data-emotion-css="1xuvfhq">
        .css-1xuvfhq {
            box-sizing: border-box;
            margin: 0;
            min-width: 0;
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex;
            display: none;
            width: 1px;
            height: 13px;
            background-color: #929AA5;
            margin-left: 8px;
            margin-right: 8px;
        }

        @media screen and (min-width:767px) {
            .css-1xuvfhq {
                display: -webkit-box;
                display: -webkit-flex;
                display: -ms-flexbox;
                display: flex;
            }
        }
    </style>
    <style data-emotion-css="1wr4jig">
        .css-1wr4jig {
            box-sizing: border-box;
            margin: 0;
            min-width: 0;
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex;
            -webkit-flex-direction: column;
            -ms-flex-direction: column;
            flex-direction: column;
            -webkit-flex: 1;
            -ms-flex: 1;
            flex: 1;
        }
    </style>
    <style data-emotion-css="1nl8q33">
        .css-1nl8q33 {
            box-sizing: border-box;
            margin: 0;
            min-width: 0;
            background-color: #0B0E11;
            background-size: auto 100%;
            background-position: center;
            background-repeat: no-repeat;
            background-image: url('https://bin.bnbstatic.com/static/images/home/top-bg.png');
        }
    </style>
    <style data-emotion-css="1jjblr2">
        .css-1jjblr2 {
            box-sizing: border-box;
            margin: 0;
            min-width: 0;
            margin-left: auto;
            margin-right: auto;
            padding-left: 16px;
            padding-right: 16px;
            max-width: 1248px;
            color: #fff;
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex;
            position: relative;
            -webkit-align-items: center;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            -webkit-box-pack: center;
            -webkit-justify-content: center;
            -ms-flex-pack: center;
            justify-content: center;
        }

        @media screen and (min-width:767px) {
            .css-1jjblr2 {
                padding-left: 24px;
                padding-right: 24px;
            }
        }
    </style>
    <style data-emotion-css="u7yhtb">
        .css-u7yhtb {
            box-sizing: border-box;
            margin: 0;
            min-width: 0;
            text-align: center;
            line-height: 1.25;
            width: 100%;
            padding-top: 32px;
            padding-bottom: 32px;
        }

        @media screen and (min-width:767px) {
            .css-u7yhtb {
                line-height: 1.25;
            }
        }

        @media screen and (min-width:1023px) {
            .css-u7yhtb {
                line-height: 1.16;
            }
        }

        @media screen and (min-width:767px) {
            .css-u7yhtb {
                padding-top: 32px;
                padding-bottom: 32px;
            }
        }

        @media screen and (min-width:1023px) {
            .css-u7yhtb {
                padding-top: 48px;
                padding-bottom: 48px;
            }
        }
    </style>
    <style data-emotion-css="vurnku">
        .css-vurnku {
            box-sizing: border-box;
            margin: 0;
            min-width: 0;
        }
    </style>
    <style data-emotion-css="au8uqh">
        .css-au8uqh {
            box-sizing: border-box;
            margin: 0;
            min-width: 0;
            font-weight: 500;
            font-size: 28px;
        }

        @media screen and (min-width:767px) {
            .css-au8uqh {
                font-size: 32px;
            }
        }

        @media screen and (min-width:1023px) {
            .css-au8uqh {
                font-size: 40px;
            }
        }
    </style>
    <style data-emotion-css="1gmkfzs">
        .css-1gmkfzs {
            box-sizing: border-box;
            margin: 0;
            min-width: 0;
            font-size: 16px;
            margin-top: 16px;
            color: #707A8A;
        }

        @media screen and (min-width:767px) {
            .css-1gmkfzs {
                margin-top: 16px;
            }
        }

        @media screen and (min-width:1023px) {
            .css-1gmkfzs {
                margin-top: 24px;
            }
        }
    </style>
    <style data-emotion-css="qelhuh">
        .css-qelhuh {
            box-sizing: border-box;
            margin: 0;
            min-width: 0;
            margin-top: 24px;
            display: block;
            -webkit-box-pack: center;
            -webkit-justify-content: center;
            -ms-flex-pack: center;
            justify-content: center;
        }

        @media screen and (min-width:767px) {
            .css-qelhuh {
                display: -webkit-box;
                display: -webkit-flex;
                display: -ms-flexbox;
                display: flex;
            }
        }

        .css-qelhuh [aria-label=register] {
            margin-top: 16px;
            margin-left: 0;
        }

        @media screen and (min-width:767px) {
            .css-qelhuh [aria-label=register] {
                margin-top: 0;
                margin-left: 8px;
            }
        }

        @media screen and (min-width:1023px) {
            .css-qelhuh [aria-label=register] {
                margin-left: 0;
            }
        }
    </style>
    <style data-emotion-css="o3h2xh">
        .css-o3h2xh {
            box-sizing: border-box;
            margin: 0;
            min-width: 0;
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            cursor: pointer;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
            display: -webkit-inline-box;
            display: -webkit-inline-flex;
            display: -ms-inline-flexbox;
            display: inline-flex;
            -webkit-align-items: center;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            -webkit-box-pack: center;
            -webkit-justify-content: center;
            -ms-flex-pack: center;
            justify-content: center;
            box-sizing: border-box;
            font-size: inherit;
            font-family: inherit;
            text-align: center;
            -webkit-text-decoration: none;
            text-decoration: none;
            outline: none;
            font-weight: 500;
            font-size: 14px;
            line-height: 20px;
            word-break: keep-all;
            color: #212833;
            border-radius: 4px;
            padding-top: 4px;
            padding-bottom: 4px;
            min-height: 24px;
            border: none;
            padding-left: 8px;
            padding-right: 8px;
            background-image: linear-gradient(180deg, #F8D12F 0%, #F0B90B 100%);
            padding-left: 24px;
            padding-right: 24px;
            height: 40px;
            width: 100%;
        }

        .css-o3h2xh:disabled {
            cursor: not-allowed;
            background-image: none;
            background-color: #EAECEF;
            color: #B7BDC6;
        }

        .css-o3h2xh:hover:not(:disabled):not(:active) {
            box-shadow: none;
        }

        .css-o3h2xh.inactive {
            opacity: 0.3;
            cursor: not-allowed;
        }

        .css-o3h2xh:active:not(:disabled):not(.inactive) {
            background-image: none;
            background-color: #F0B90B;
        }

        .css-o3h2xh:hover:not(:disabled):not(:active):not(.inactive) {
            box-shadow: none;
            background-image: linear-gradient(180deg, #FFE251 0%, #EDC423 100%);
        }

        @media screen and (min-width:767px) {
            .css-o3h2xh {
                height: 48px;
                width: auto;
            }
        }
    </style>
    <style data-emotion-css="lmyrvm">
        .css-lmyrvm {
            box-sizing: border-box;
            margin: 0;
            min-width: 0;
            background-color: #181A20;
        }

        @media screen and (min-width:767px) {
            .css-lmyrvm {
                background-color: #181A20;
            }
        }

        @media screen and (min-width:1023px) {
            .css-lmyrvm {
                background-color: #0B0E11;
            }
        }
    </style>
    <style data-emotion-css="mor7t4">
        .css-mor7t4 {
            box-sizing: border-box;
            margin: 0;
            min-width: 0;
            margin-left: auto;
            margin-right: auto;
            padding-left: 16px;
            padding-right: 16px;
            max-width: 1248px;
            height: 112px;
        }

        @media screen and (min-width:767px) {
            .css-mor7t4 {
                padding-left: 24px;
                padding-right: 24px;
            }
        }

        @media screen and (min-width:767px) {
            .css-mor7t4 {
                height: 64px;
            }
        }
    </style>
    <style data-emotion="css-global"></style>
    <style data-emotion-css="1b8ituo">
        .css-1b8ituo {
            box-sizing: border-box;
            margin: 0;
            min-width: 0;
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex;
            -webkit-align-items: center;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            margin-left: 0;
            margin-right: 0;
            -webkit-flex-wrap: wrap;
            -ms-flex-wrap: wrap;
            flex-wrap: wrap;
        }

        @media screen and (min-width:767px) {
            .css-1b8ituo {
                margin-left: 0;
                margin-right: 0;
                -webkit-flex-wrap: noWrap;
                -ms-flex-wrap: noWrap;
                flex-wrap: noWrap;
            }
        }

        @media screen and (min-width:1023px) {
            .css-1b8ituo {
                margin-left: -8px;
                margin-right: -8px;
            }
        }
    </style>
    <style data-emotion-css="d6us4o">
        .css-d6us4o {
            box-sizing: border-box;
            margin: 0;
            min-width: 0;
            -webkit-flex: none;
            -ms-flex: none;
            flex: none;
            padding-left: 0;
            padding-right: 0;
            width: 50%;
        }

        @media screen and (min-width:767px) {
            .css-d6us4o {
                padding-left: 0;
                padding-right: 0;
            }
        }

        @media screen and (min-width:1023px) {
            .css-d6us4o {
                padding-left: 8px;
                padding-right: 8px;
            }
        }

        @media screen and (min-width:767px) {
            .css-d6us4o {
                width: 25%;
            }
        }

        @media screen and (min-width:1023px) {
            .css-d6us4o {
                width: 20%;
            }
        }
    </style>
    <style data-emotion-css="1vjihve">
        .css-1vjihve {
            box-sizing: border-box;
            margin: 0;
            min-width: 0;
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex;
            -webkit-align-items: center;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            padding-top: 0;
            padding-bottom: 0;
            padding-left: 8px;
            padding-right: 8px;
            height: 52px;
        }

        @media screen and (min-width:767px) {
            .css-1vjihve {
                height: 64px;
            }
        }

        .css-1vjihve:hover {
            background-color: #181A20;
        }
    </style>
    <style data-emotion-css="5z21bn">
        .css-5z21bn {
            box-sizing: border-box;
            margin: 0;
            min-width: 0;
            -webkit-flex: none;
            -ms-flex: none;
            flex: none;
            background-color: #1E2329;
            width: 24px;
            height: 24px;
            border-radius: 99999px;
        }

        @media screen and (min-width:767px) {
            .css-5z21bn {
                width: 32px;
                height: 32px;
            }
        }
    </style>
    <style data-emotion-css="mk1ym5">
        .css-mk1ym5 {
            box-sizing: border-box;
            margin: 0;
            min-width: 0;
            -webkit-flex: 1;
            -ms-flex: 1;
            flex: 1;
            margin-left: 8px;
        }

        .css-mk1ym5>div {
            background-color: #1E2329;
            overflow: hidden;
        }
    </style>
    <style data-emotion-css="1im65t9">
        .css-1im65t9 {
            box-sizing: border-box;
            margin: 0;
            min-width: 0;
            height: 16px;
            margin-bottom: 8px;
            width: 100%;
        }
    </style>
    <style data-emotion-css="32u6pu animation-eq72hh">
        .css-32u6pu {
            width: 100%;
            height: 100%;
            background: linear-gradient(281.02deg, transparent, #474d57 51.74%, transparent);
            -webkit-animation: animation-eq72hh 0.5s infinite linear;
            animation: animation-eq72hh 0.5s infinite linear;
        }

        @-webkit-keyframes animation-eq72hh {
            0% {
                -webkit-transform: translateX(-40%);
                -ms-transform: translateX(-40%);
                transform: translateX(-40%);
            }

            100% {
                -webkit-transform: translateX(40%);
                -ms-transform: translateX(40%);
                transform: translateX(40%);
            }
        }

        @keyframes animation-eq72hh {
            0% {
                -webkit-transform: translateX(-40%);
                -ms-transform: translateX(-40%);
                transform: translateX(-40%);
            }

            100% {
                -webkit-transform: translateX(40%);
                -ms-transform: translateX(40%);
                transform: translateX(40%);
            }
        }
    </style>
    <style data-emotion-css="1y3uaem">
        .css-1y3uaem {
            box-sizing: border-box;
            margin: 0;
            min-width: 0;
            height: 16px;
            width: 100%;
        }
    </style>
    <style data-emotion-css="1ljhw37">
        .css-1ljhw37 {
            box-sizing: border-box;
            margin: 0;
            min-width: 0;
            background-color: #FFFFFF;
            padding-top: 24px;
            padding-bottom: 24px;
            overflow: hidden;
        }

        @media screen and (min-width:767px) {
            .css-1ljhw37 {
                padding-top: 24px;
                padding-bottom: 24px;
            }
        }

        @media screen and (min-width:1023px) {
            .css-1ljhw37 {
                padding-top: 24px;
                padding-bottom: 24px;
            }
        }
    </style>
    <style data-emotion-css="6sm2ml">
        .css-6sm2ml {
            box-sizing: border-box;
            margin: 0;
            min-width: 0;
            margin-left: auto;
            margin-right: auto;
            padding-left: 16px;
            padding-right: 16px;
            max-width: 1248px;
        }

        @media screen and (min-width:767px) {
            .css-6sm2ml {
                padding-left: 24px;
                padding-right: 24px;
            }
        }
    </style>
    <style data-emotion-css="5inp6q">
        .css-5inp6q {
            box-sizing: border-box;
            margin: 0;
            min-width: 0;
            position: relative;
        }

        .css-5inp6q .mica-slider {
            overflow: hidden;
        }
    </style>
    <style data-emotion="css-global"></style>
    <style data-emotion-css="1tfe3jg">
        .css-1tfe3jg {
            box-sizing: border-box;
            margin: 0;
            min-width: 0;
            min-height: 100px;
            display: block;
            position: relative;
            overflow: hidden;
            border-radius: 4px;
        }

        .css-1tfe3jg:hover::after {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(255, 255, 255, 0.1);
        }
    </style>
    <style data-emotion-css="1xtmnyf">
        .css-1xtmnyf {
            box-sizing: border-box;
            margin: 0;
            min-width: 0;
            width: 100%;
            height: 0;
            padding-bottom: 50%;
            position: relative;
        }
    </style>
    <style data-emotion-css="118yoda">
        .css-118yoda {
            box-sizing: border-box;
            margin: 0;
            min-width: 0;
            display: none;
            top: 0;
            bottom: 0;
            width: 32px;
            cursor: pointer;
            position: absolute;
            -webkit-align-items: center;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            -webkit-box-pack: center;
            -webkit-justify-content: center;
            -ms-flex-pack: center;
            justify-content: center;
            color: #fff;
            background-color: rgba(0, 0, 0, 0.3);
            right: 0;
        }

        @media screen and (min-width:767px) {
            .css-118yoda {
                display: -webkit-box;
                display: -webkit-flex;
                display: -ms-flexbox;
                display: flex;
            }
        }

        .css-118yoda:hover {
            color: #F0B90B;
        }
    </style>
    <style data-emotion-css="1iztezc">
        .css-1iztezc {
            box-sizing: border-box;
            margin: 0;
            min-width: 0;
            color: currentColor;
            width: 24px;
            height: 24px;
            font-size: 24px;
            fill: #1E2329;
            fill: currentColor;
            width: 1em;
            height: 1em;
        }
    </style>
    <style data-emotion-css="nk63nc">
        .css-nk63nc {
            box-sizing: border-box;
            margin: 0;
            min-width: 0;
            background-color: #FAFAFA;
            padding-top: 24px;
            padding-bottom: 24px;
            font-size: 14px;
        }

        @media screen and (min-width:767px) {
            .css-nk63nc {
                padding-top: 24px;
                padding-bottom: 24px;
            }
        }

        @media screen and (min-width:1023px) {
            .css-nk63nc {
                padding-top: 24px;
                padding-bottom: 24px;
            }
        }
    </style>
    <style data-emotion-css="1bitxb8">
        .css-1bitxb8 {
            box-sizing: border-box;
            margin: 0;
            min-width: 0;
            margin-left: auto;
            margin-right: auto;
            padding-left: 16px;
            padding-right: 16px;
            max-width: 1248px;
            -webkit-box-pack: center;
            -webkit-justify-content: center;
            -ms-flex-pack: center;
            justify-content: center;
        }

        @media screen and (min-width:767px) {
            .css-1bitxb8 {
                padding-left: 24px;
                padding-right: 24px;
            }
        }

        .css-1bitxb8>a {
            -webkit-align-items: center;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
        }

        .css-1bitxb8>a:hover,
        .css-1bitxb8>a:hover>svg {
            color: #F0B90B;
        }
    </style>
    <style data-emotion-css="fb4d44">
        .css-fb4d44 {
            box-sizing: border-box;
            margin: 0;
            min-width: 0;
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex;
            box-sizing: border-box;
            margin: 0;
            min-width: 0;
            margin-left: auto;
            margin-right: auto;
            padding-left: 16px;
            padding-right: 16px;
            max-width: 1248px;
            -webkit-box-pack: center;
            -webkit-justify-content: center;
            -ms-flex-pack: center;
            justify-content: center;
        }

        @media screen and (min-width:767px) {
            .css-fb4d44 {
                padding-left: 24px;
                padding-right: 24px;
            }
        }

        .css-fb4d44>a {
            -webkit-align-items: center;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
        }

        .css-fb4d44>a:hover,
        .css-fb4d44>a:hover>svg {
            color: #F0B90B;
        }
    </style>
    <style data-emotion-css="n876bn">
        .css-n876bn {
            box-sizing: border-box;
            margin: 0;
            min-width: 0;
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex;
            color: #212833;
        }
    </style>
    <style data-emotion-css="1mjkd2n">
        .css-1mjkd2n {
            box-sizing: border-box;
            margin: 0;
            min-width: 0;
            color: #848E9C;
            width: 20px;
            height: 20px;
            font-size: 20px;
            fill: #1E2329;
            fill: #848E9C;
            margin-right: 8px;
            -webkit-flex: none;
            -ms-flex: none;
            flex: none;
            width: 1em;
            height: 1em;
        }
    </style>
    <style data-emotion-css="waz29z">
        .css-waz29z {
            box-sizing: border-box;
            margin: 0;
            min-width: 0;
            margin-left: 16px;
            -webkit-flex: none;
            -ms-flex: none;
            flex: none;
        }
    </style>
    <style data-emotion-css="wq41h3">
        .css-wq41h3 {
            box-sizing: border-box;
            margin: 0;
            min-width: 0;
            height: 90%;
            width: 1px;
            margin-left: 16px;
            margin-right: 16px;
            -webkit-flex: none;
            -ms-flex: none;
            flex: none;
            background-color: #d8d8d8;
        }

        @media screen and (min-width:767px) {
            .css-wq41h3 {
                margin-left: 24px;
                margin-right: 24px;
            }
        }
    </style>
    <style data-emotion-css="mmpluh">
        .css-mmpluh {
            box-sizing: border-box;
            margin: 0;
            min-width: 0;
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex;
            color: #848E9C;
            -webkit-flex: none;
            -ms-flex: none;
            flex: none;
        }
    </style>
    <style data-emotion-css="16enr5p">
        .css-16enr5p {
            box-sizing: border-box;
            margin: 0;
            min-width: 0;
            white-space: nowrap;
        }
    </style>
    <style data-emotion-css="9ykz47">
        .css-9ykz47 {
            box-sizing: border-box;
            margin: 0;
            min-width: 0;
            color: currentColor;
            width: 16px;
            height: 16px;
            font-size: 16px;
            fill: #1E2329;
            fill: currentColor;
            margin-left: 4px;
            font-weight: 600;
            width: 1em;
            height: 1em;
        }
    </style>
    <style data-emotion-css="1imen1g">
        .css-1imen1g {
            box-sizing: border-box;
            margin: 0;
            min-width: 0;
            background-color: #FAFAFA;
            padding-top: 0px;
            padding-bottom: 0px;
        }

        @media screen and (min-width:767px) {
            .css-1imen1g {
                padding-top: 0px;
                padding-bottom: 0px;
            }
        }

        @media screen and (min-width:1023px) {
            .css-1imen1g {
                padding-top: 0px;
                padding-bottom: 0px;
            }
        }
    </style>
    <style data-emotion-css="qycuxc">
        .css-qycuxc {
            box-sizing: border-box;
            margin: 0;
            min-width: 0;
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex;
            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.08);
            border-radius: 0px;
            -webkit-flex-direction: column;
            -ms-flex-direction: column;
            flex-direction: column;
        }

        @media screen and (min-width:767px) {
            .css-qycuxc {
                border-radius: 4px;
            }
        }
    </style>
    <style data-emotion-css="1gi15ra">
        .css-1gi15ra {
            box-sizing: border-box;
            margin: 0;
            min-width: 0;
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex;
            padding-top: 8px;
            padding-bottom: 8px;
            padding-left: 8px;
            padding-right: 8px;
            line-height: 1.3;
            border-radius: 4px;
            -webkit-align-items: center;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            -webkit-box-pack: justify;
            -webkit-justify-content: space-between;
            -ms-flex-pack: justify;
            justify-content: space-between;
            background-color: #fff;
            border-bottom: 1px solid rgb(242, 242, 242);
            color: #707A8A;
            line-height: 18px;
            font-size: 12px;
        }

        @media screen and (min-width:767px) {
            .css-1gi15ra {
                padding-top: 16px;
                padding-bottom: 16px;
                padding-left: 16px;
                padding-right: 16px;
            }
        }

        @media screen and (min-width:1023px) {
            .css-1gi15ra {
                padding-left: 24px;
                padding-right: 24px;
            }
        }

        @media screen and (min-width:767px) {
            .css-1gi15ra {
                font-size: 14px;
            }
        }
    </style>
    <style data-emotion-css="aytv4b">
        .css-aytv4b {
            box-sizing: border-box;
            margin: 0;
            min-width: 0;
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex;
            -webkit-align-items: center;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            -webkit-box-pack: start;
            -webkit-justify-content: flex-start;
            -ms-flex-pack: start;
            justify-content: flex-start;
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex;
        }
    </style>
    <style data-emotion-css="1i04fkn">
        .css-1i04fkn {
            box-sizing: border-box;
            margin: 0;
            min-width: 0;
            display: -webkit-box;
            word-break: break-word;
            -webkit-box-orient: vertical;
        }
    </style>
    <style data-emotion-css="1g1okzg">
        .css-1g1okzg {
            box-sizing: border-box;
            margin: 0;
            min-width: 0;
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex;
            -webkit-align-items: center;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            -webkit-box-pack: end;
            -webkit-justify-content: flex-end;
            -ms-flex-pack: end;
            justify-content: flex-end;
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex;
        }

        @media screen and (min-width:767px) {
            .css-1g1okzg {
                -webkit-box-pack: start;
                -webkit-justify-content: flex-start;
                -ms-flex-pack: start;
                justify-content: flex-start;
            }
        }
    </style>
    <style data-emotion-css="1bwmq4t">
        .css-1bwmq4t {
            box-sizing: border-box;
            margin: 0;
            min-width: 0;
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex;
            -webkit-align-items: center;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            -webkit-box-pack: start;
            -webkit-justify-content: flex-start;
            -ms-flex-pack: start;
            justify-content: flex-start;
            display: none;
        }

        @media screen and (min-width:767px) {
            .css-1bwmq4t {
                display: -webkit-box;
                display: -webkit-flex;
                display: -ms-flexbox;
                display: flex;
            }
        }
    </style>
    <style data-emotion-css="xsglxf">
        .css-xsglxf {
            box-sizing: border-box;
            margin: 0;
            min-width: 0;
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex;
            padding-top: 8px;
            padding-bottom: 8px;
            padding-left: 8px;
            padding-right: 8px;
            line-height: 1.3;
            border-radius: 4px;
            -webkit-align-items: center;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            -webkit-box-pack: justify;
            -webkit-justify-content: space-between;
            -ms-flex-pack: justify;
            justify-content: space-between;
            background-color: #fff;
            border-bottom: 1px solid rgb(242, 242, 242);
            font-size: 14px;
            font-weight: 400;
            color: #1E2329;
        }

        @media screen and (min-width:767px) {
            .css-xsglxf {
                padding-top: 16px;
                padding-bottom: 16px;
                padding-left: 16px;
                padding-right: 16px;
            }
        }

        @media screen and (min-width:1023px) {
            .css-xsglxf {
                padding-left: 24px;
                padding-right: 24px;
            }
        }

        @media screen and (min-width:767px) {
            .css-xsglxf {
                font-size: 18px;
            }
        }

        .css-xsglxf:hover {
            background-color: #F5F5F5;
        }
    </style>
    <style data-emotion-css="n9v9v">
        .css-n9v9v {
            box-sizing: border-box;
            margin: 0;
            min-width: 0;
            width: 24px;
            height: 24px;
            border-radius: 99999px;
        }

        @media screen and (min-width:767px) {
            .css-n9v9v {
                width: 36px;
                height: 36px;
            }
        }
    </style>
    <style data-emotion-css="1q7503z">
        .css-1q7503z {
            box-sizing: border-box;
            margin: 0;
            min-width: 0;
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex;
            -webkit-flex: 1;
            -ms-flex: 1;
            flex: 1;
            -webkit-flex-direction: column;
            -ms-flex-direction: column;
            flex-direction: column;
        }

        @media screen and (min-width:767px) {
            .css-1q7503z {
                -webkit-flex-direction: row;
                -ms-flex-direction: row;
                flex-direction: row;
            }
        }
    </style>
    <style data-emotion-css="1sgz1lk">
        .css-1sgz1lk {
            box-sizing: border-box;
            margin: 0;
            min-width: 0;
            margin-left: 16px;
        }
    </style>
    <style data-emotion-css="1o2ukii">
        .css-1o2ukii {
            box-sizing: border-box;
            margin: 0;
            min-width: 0;
            margin-left: 16px;
            color: #707A8A;
        }
    </style>
    <style data-emotion-css="1gg6y75">
        .css-1gg6y75 {
            box-sizing: border-box;
            margin: 0;
            min-width: 0;
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex;
            -webkit-align-items: center;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            -webkit-box-pack: end;
            -webkit-justify-content: flex-end;
            -ms-flex-pack: end;
            justify-content: flex-end;
        }

        @media screen and (min-width:767px) {
            .css-1gg6y75 {
                -webkit-box-pack: start;
                -webkit-justify-content: flex-start;
                -ms-flex-pack: start;
                justify-content: flex-start;
            }
        }
    </style>
    <style data-emotion-css="g80xfv">
        .css-g80xfv {
            box-sizing: border-box;
            margin: 0;
            min-width: 0;
            box-sizing: border-box;
            margin: 0;
            min-width: 0;
        }
    </style>
    <style data-emotion-css="1q869vv">
        .css-1q869vv {
            box-sizing: border-box;
            margin: 0;
            min-width: 0;
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex;
            display: none;
            -webkit-box-pack: justify;
            -webkit-justify-content: space-between;
            -ms-flex-pack: justify;
            justify-content: space-between;
        }

        @media screen and (min-width:767px) {
            .css-1q869vv {
                display: -webkit-box;
                display: -webkit-flex;
                display: -ms-flexbox;
                display: flex;
            }
        }
    </style>
    <style data-emotion-css="d0rdh6">
        .css-d0rdh6 {
            box-sizing: border-box;
            margin: 0;
            min-width: 0;
            width: 127px;
            height: 38px;
        }
    </style>
    <style data-emotion-css="1ltwx0z">
        .css-1ltwx0z {
            box-sizing: border-box;
            margin: 0;
            min-width: 0;
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-pack: center;
            -webkit-justify-content: center;
            -ms-flex-pack: center;
            justify-content: center;
            padding-top: 24px;
            padding-bottom: 24px;
            border-radius: 4px;
            background-color: #fff;
        }
    </style>
    <style data-emotion-css="1dhxpmb">
        .css-1dhxpmb {
            box-sizing: border-box;
            margin: 0;
            min-width: 0;
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex;
            font-size: 14px;
            color: #707A8A;
            -webkit-align-items: center;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
        }

        .css-1dhxpmb:hover {
            color: #F0B90B;
        }
    </style>
    <style data-emotion-css="15rw9wm">
        .css-15rw9wm {
            box-sizing: border-box;
            margin: 0;
            min-width: 0;
            color: currentColor;
            width: 16px;
            height: 16px;
            font-size: 16px;
            fill: #1E2329;
            fill: currentColor;
            margin-left: 4px;
            width: 1em;
            height: 1em;
        }
    </style>
    <style data-emotion-css="inn0bn">
        .css-inn0bn {
            box-sizing: border-box;
            margin: 0;
            min-width: 0;
            background-color: #FAFAFA;
            padding-top: 40px;
            padding-bottom: 40px;
        }

        @media screen and (min-width:767px) {
            .css-inn0bn {
                padding-top: 48px;
                padding-bottom: 48px;
            }
        }

        @media screen and (min-width:1023px) {
            .css-inn0bn {
                padding-top: 80px;
                padding-bottom: 80px;
            }
        }
    </style>
    <style data-emotion-css="1l1j6yu">
        .css-1l1j6yu {
            box-sizing: border-box;
            margin: 0;
            min-width: 0;
            margin-bottom: 24px;
        }

        @media screen and (min-width:767px) {
            .css-1l1j6yu {
                margin-bottom: 32px;
            }
        }

        @media screen and (min-width:1023px) {
            .css-1l1j6yu {
                margin-bottom: 40px;
            }
        }
    </style>
    <style data-emotion-css="aqagph">
        .css-aqagph {
            box-sizing: border-box;
            margin: 0;
            min-width: 0;
            color: #1E2329;
            font-weight: 700;
            line-height: 1.25;
            font-size: 24px;
        }

        @media screen and (min-width:767px) {
            .css-aqagph {
                font-size: 40px;
            }
        }

        @media screen and (min-width:1023px) {
            .css-aqagph {
                font-size: 40px;
            }
        }
    </style>
    <style data-emotion-css="ckp53r">
        .css-ckp53r {
            box-sizing: border-box;
            margin: 0;
            min-width: 0;
            line-height: 1.5;
            color: #474D57;
            margin-top: 8px;
            font-size: 14px;
        }

        @media screen and (min-width:767px) {
            .css-ckp53r {
                margin-top: 16px;
                font-size: 16px;
            }
        }

        @media screen and (min-width:1023px) {
            .css-ckp53r {
                margin-top: 16px;
                font-size: 16px;
            }
        }
    </style>
    <style data-emotion-css="j6gp5y">
        .css-j6gp5y {
            box-sizing: border-box;
            margin: 0;
            min-width: 0;
            display: block;
            -webkit-flex-direction: column;
            -ms-flex-direction: column;
            flex-direction: column;
            -webkit-align-items: center;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
        }

        @media screen and (min-width:767px) {
            .css-j6gp5y {
                display: -webkit-box;
                display: -webkit-flex;
                display: -ms-flexbox;
                display: flex;
            }
        }

        @media screen and (min-width:767px) {
            .css-j6gp5y {
                -webkit-flex-direction: row;
                -ms-flex-direction: row;
                flex-direction: row;
            }
        }
    </style>
    <style data-emotion-css="1uj9b6u">
        .css-1uj9b6u {
            box-sizing: border-box;
            margin: 0;
            min-width: 0;
            -webkit-flex: 1;
            -ms-flex: 1;
            flex: 1;
        }

        @media screen and (min-width:767px) {
            .css-1uj9b6u {
                -webkit-flex: 2;
                -ms-flex: 2;
                flex: 2;
            }
        }

        @media screen and (min-width:1023px) {
            .css-1uj9b6u {
                -webkit-flex: 1;
                -ms-flex: 1;
                flex: 1;
            }
        }
    </style>
    <style data-emotion-css="127q0z3">
        @media screen and (min-width:767px) {
            .css-127q0z3 {
                padding-bottom: 100%;
                background-image: none;
            }
        }

        @media screen and (min-width:1023px) {
            .css-127q0z3 {
                padding-bottom: 72%;
                background-image: url('https://bin.bnbstatic.com/static/images/download/desktop-trade.png');
            }
        }

        .css-127q0z3::after {
            content: "";
            position: absolute;
            background-color: #EAECEF;
            left: 50%;
            bottom: 0px;
            -webkit-transform: translate(-50%);
            -ms-transform: translate(-50%);
            transform: translate(-50%);
            width: 66%;
            height: 2px;
            z-index: 10;
        }

        @media screen and (min-width:767px) {
            .css-127q0z3::after {
                content: none;
            }
        }
    </style>
    <style data-emotion-css="1sm6ir6">
        .css-1sm6ir6 {
            box-sizing: border-box;
            margin: 0;
            min-width: 0;
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex;
            position: absolute;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            -webkit-box-pack: center;
            -webkit-justify-content: center;
            -ms-flex-pack: center;
            justify-content: center;
        }

        @media screen and (min-width:767px) {
            .css-1sm6ir6 {
                -webkit-box-pack: center;
                -webkit-justify-content: center;
                -ms-flex-pack: center;
                justify-content: center;
            }
        }

        @media screen and (min-width:1023px) {
            .css-1sm6ir6 {
                -webkit-box-pack: end;
                -webkit-justify-content: flex-end;
                -ms-flex-pack: end;
                justify-content: flex-end;
            }
        }
    </style>
    <style data-emotion-css="1cu8elw">
        .css-1cu8elw {
            box-sizing: border-box;
            margin: 0;
            min-width: 0;
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex;
            position: relative;
            width: 0;
            height: 100%;
            padding-right: 100%;
            background-repeat: no-repeat;
            background-size: auto 170%;
            background-position: top center;
            background-image: url('https://bin.bnbstatic.com/static/images/download/mobile-trade.png?t=1');
        }

        @media screen and (min-width:767px) {
            .css-1cu8elw {
                padding-right: 50%;
                background-size: auto 95%;
                background-position: center;
            }
        }

        @media screen and (min-width:1023px) {
            .css-1cu8elw {
                padding-right: 36%;
                background-position: right center;
            }
        }
    </style>
    <style data-emotion-css="1htrs1h">
        .css-1htrs1h {
            box-sizing: border-box;
            margin: 0;
            min-width: 0;
            position: absolute;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            right: 0;
            -webkit-transform: scale(0);
            -ms-transform: scale(0);
            transform: scale(0);
            background-size: 100% auto;
            background-position: center 65%;
            background-repeat: no-repeat;
            background-image: none;
            -webkit-transition: -webkit-transform 0.5s linear;
            -webkit-transition: transform 0.5s linear;
            transition: transform 0.5s linear;
        }

        @media screen and (min-width:767px) {
            .css-1htrs1h {
                right: 0;
                background-image: url('https://bin.bnbstatic.com/static/images/download/mobile-fiat.png');
            }
        }

        @media screen and (min-width:1023px) {
            .css-1htrs1h {
                right: -4px;
            }
        }
    </style>
    <style data-emotion-css="13bmsul">
        .css-13bmsul {
            box-sizing: border-box;
            margin: 0;
            min-width: 0;
            -webkit-flex: 1;
            -ms-flex: 1;
            flex: 1;
        }

        @media screen and (min-width:767px) {
            .css-13bmsul {
                -webkit-flex: 3;
                -ms-flex: 3;
                flex: 3;
            }
        }

        @media screen and (min-width:1023px) {
            .css-13bmsul {
                -webkit-flex: 1;
                -ms-flex: 1;
                flex: 1;
            }
        }
    </style>
    <style data-emotion-css="18c6lki">
        .css-18c6lki {
            box-sizing: border-box;
            margin: 0;
            min-width: 0;
            display: none;
            margin-bottom: 16px;
            margin-left: 0;
        }

        @media screen and (min-width:767px) {
            .css-18c6lki {
                display: block;
            }
        }

        @media screen and (min-width:767px) {
            .css-18c6lki {
                margin-left: 40px;
            }
        }

        @media screen and (min-width:1023px) {
            .css-18c6lki {
                margin-left: 80px;
            }
        }
    </style>
    <style data-emotion-css="1n2fhb3">
        .css-1n2fhb3 {
            box-sizing: border-box;
            margin: 0;
            min-width: 0;
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex;
            -webkit-align-items: center;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            -webkit-flex-direction: column;
            -ms-flex-direction: column;
            flex-direction: column;
        }

        @media screen and (min-width:767px) {
            .css-1n2fhb3 {
                -webkit-flex-direction: row;
                -ms-flex-direction: row;
                flex-direction: row;
            }
        }
    </style>
    <style data-emotion-css="15owl46">
        .css-15owl46 {
            box-sizing: border-box;
            margin: 0;
            min-width: 0;
            position: relative;
        }
    </style>
    <style data-emotion-css="1qblt3o">
        .css-1qblt3o {
            box-sizing: border-box;
            margin: 0;
            min-width: 0;
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex;
            width: 100px;
            height: 100px;
            border: 1px solid;
            border-color: #EAECEF;
            background-color: #FFFFFF;
            border-radius: 2px;
            -webkit-align-items: center;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            -webkit-box-pack: center;
            -webkit-justify-content: center;
            -ms-flex-pack: center;
            justify-content: center;
        }
    </style>
    <style data-emotion-css="qslk1h">
        .css-qslk1h {
            box-sizing: border-box;
            margin: 0;
            min-width: 0;
            left: 50%;
            top: 50%;
            padding: 4px;
            background-color: #FFFFFF;
            position: absolute;
            -webkit-transform: translate(-50%, -50%);
            -ms-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
        }
    </style>
    <style data-emotion-css="pum6yp">
        .css-pum6yp {
            box-sizing: border-box;
            margin: 0;
            min-width: 0;
            width: 16px;
            height: 16px;
            border-radius: 4px;
            background-size: 75%;
            background-position: center;
            background-repeat: no-repeat;
            background-image: url('https://bin.bnbstatic.com/static/images/common/logo.png');
            background-color: #000000;
        }
    </style>
    <style data-emotion-css="16ytl5k">
        .css-16ytl5k {
            box-sizing: border-box;
            margin: 0;
            min-width: 0;
            -webkit-flex: 1;
            -ms-flex: 1;
            flex: 1;
            margin-left: 0;
            margin-top: 16px;
        }

        @media screen and (min-width:767px) {
            .css-16ytl5k {
                margin-left: 16px;
                margin-top: 0;
            }
        }
    </style>
    <style data-emotion-css="vr1wsl">
        .css-vr1wsl {
            box-sizing: border-box;
            margin: 0;
            min-width: 0;
            color: #1E2329;
            font-size: 14px;
        }
    </style>
    <style data-emotion-css="1sc31uf">
        .css-1sc31uf {
            box-sizing: border-box;
            margin: 0;
            min-width: 0;
            margin-top: 12px;
            font-size: 12px;
            color: #474D57;
            display: none;
        }

        @media screen and (min-width:767px) {
            .css-1sc31uf {
                display: block;
            }
        }
    </style>
    <style data-emotion-css="3u9fv1">
        .css-3u9fv1 {
            box-sizing: border-box;
            margin: 0;
            min-width: 0;
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex;
            -webkit-flex-wrap: wrap;
            -ms-flex-wrap: wrap;
            flex-wrap: wrap;
            margin-left: 0;
        }

        @media screen and (min-width:767px) {
            .css-3u9fv1 {
                margin-left: 40px;
            }
        }

        @media screen and (min-width:1023px) {
            .css-3u9fv1 {
                margin-left: 80px;
            }
        }
    </style>
    <style data-emotion-css="27yakf">
        .css-27yakf {
            box-sizing: border-box;
            margin: 0;
            min-width: 0;
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex;
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-pack: center;
            -webkit-justify-content: center;
            -ms-flex-pack: center;
            justify-content: center;
            width: 50%;
        }

        @media screen and (min-width:767px) {
            .css-27yakf {
                display: -webkit-box;
                display: -webkit-flex;
                display: -ms-flexbox;
                display: flex;
                -webkit-box-pack: start;
                -webkit-justify-content: flex-start;
                -ms-flex-pack: start;
                justify-content: flex-start;
            }
        }

        @media screen and (min-width:767px) {
            .css-27yakf {
                width: 50%;
            }
        }

        @media screen and (min-width:1023px) {
            .css-27yakf {
                width: 33.33333333333333%;
            }
        }
    </style>
    <style data-emotion-css="j4ke5o">
        .css-j4ke5o {
            box-sizing: border-box;
            margin: 0;
            min-width: 0;
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex;
            -webkit-flex-direction: column;
            -ms-flex-direction: column;
            flex-direction: column;
            min-width: 100px;
            padding-top: 16px;
            padding-bottom: 16px;
            -webkit-align-items: center;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
        }

        .css-j4ke5o:hover {
            background-color: #F5F5F5;
        }
    </style>
    <style data-emotion-css="knosvp">
        .css-knosvp {
            box-sizing: border-box;
            margin: 0;
            min-width: 0;
            color: #1E2329;
            width: 26px;
            height: 26px;
            font-size: 26px;
            fill: #1E2329;
            fill: #1E2329;
            margin-bottom: 8px;
            width: 1em;
            height: 1em;
        }

        @media screen and (min-width:767px) {
            .css-knosvp {
                width: 30px;
                height: 30px;
                font-size: 30px;
            }
        }
    </style>
    <style data-emotion-css="lngs8z">
        .css-lngs8z {
            box-sizing: border-box;
            margin: 0;
            min-width: 0;
            font-size: 16px;
            color: #1E2329;
        }
    </style>
    <style data-emotion-css="1lhd3r9">
        .css-1lhd3r9 {
            box-sizing: border-box;
            margin: 0;
            min-width: 0;
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex;
            display: none;
            -webkit-box-pack: center;
            -webkit-justify-content: center;
            -ms-flex-pack: center;
            justify-content: center;
            width: 50%;
        }

        @media screen and (min-width:767px) {
            .css-1lhd3r9 {
                display: -webkit-box;
                display: -webkit-flex;
                display: -ms-flexbox;
                display: flex;
                -webkit-box-pack: start;
                -webkit-justify-content: flex-start;
                -ms-flex-pack: start;
                justify-content: flex-start;
            }
        }

        @media screen and (min-width:767px) {
            .css-1lhd3r9 {
                width: 50%;
            }
        }

        @media screen and (min-width:1023px) {
            .css-1lhd3r9 {
                width: 33.33333333333333%;
            }
        }
    </style>
    <style data-emotion-css="12cij45">
        .css-12cij45 {
            box-sizing: border-box;
            margin: 0;
            min-width: 0;
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex;
            display: none;
            -webkit-box-pack: center;
            -webkit-justify-content: center;
            -ms-flex-pack: center;
            justify-content: center;
            width: 50%;
        }

        @media screen and (min-width:767px) {
            .css-12cij45 {
                display: none;
                -webkit-box-pack: start;
                -webkit-justify-content: flex-start;
                -ms-flex-pack: start;
                justify-content: flex-start;
            }
        }

        @media screen and (min-width:1023px) {
            .css-12cij45 {
                display: -webkit-box;
                display: -webkit-flex;
                display: -ms-flexbox;
                display: flex;
            }
        }

        @media screen and (min-width:767px) {
            .css-12cij45 {
                width: 50%;
            }
        }

        @media screen and (min-width:1023px) {
            .css-12cij45 {
                width: 33.33333333333333%;
            }
        }
    </style>
    <style data-emotion-css="1bdiso5">
        .css-1bdiso5 {
            box-sizing: border-box;
            margin: 0;
            min-width: 0;
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex;
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-pack: center;
            -webkit-justify-content: center;
            -ms-flex-pack: center;
            justify-content: center;
            width: 50%;
        }

        @media screen and (min-width:767px) {
            .css-1bdiso5 {
                -webkit-box-pack: start;
                -webkit-justify-content: flex-start;
                -ms-flex-pack: start;
                justify-content: flex-start;
            }
        }

        @media screen and (min-width:767px) {
            .css-1bdiso5 {
                width: 50%;
            }
        }

        @media screen and (min-width:1023px) {
            .css-1bdiso5 {
                width: 33.33333333333333%;
            }
        }
    </style>
    <style data-emotion-css="15t6wp0">
        .css-15t6wp0 {
            box-sizing: border-box;
            margin: 0;
            min-width: 0;
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-pack: center;
            -webkit-justify-content: center;
            -ms-flex-pack: center;
            justify-content: center;
            padding-top: 24px;
            padding-bottom: 24px;
            border-radius: 4px;
        }
    </style>
    <style data-emotion-css="aukhqv">
        .css-aukhqv {
            box-sizing: border-box;
            margin: 0;
            min-width: 0;
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex;
            display: block;
        }

        @media screen and (min-width:767px) {
            .css-aukhqv {
                display: none;
            }
        }
    </style>
    <style data-emotion-css="1ekkx2i">
        .css-1ekkx2i {
            box-sizing: border-box;
            margin: 0;
            min-width: 0;
            background-color: #FFFFFF;
            padding-top: 40px;
            padding-bottom: 40px;
        }

        @media screen and (min-width:767px) {
            .css-1ekkx2i {
                padding-top: 48px;
                padding-bottom: 48px;
            }
        }

        @media screen and (min-width:1023px) {
            .css-1ekkx2i {
                padding-top: 80px;
                padding-bottom: 80px;
            }
        }
    </style>
    <style data-emotion-css="1jra5hy">
        .css-1jra5hy {
            box-sizing: border-box;
            margin: 0;
            min-width: 0;
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex;
            -webkit-flex-direction: row;
            -ms-flex-direction: row;
            flex-direction: row;
            -webkit-flex-wrap: wrap;
            -ms-flex-wrap: wrap;
            flex-wrap: wrap;
            margin-left: -4p;
            margin-right: -4p;
        }

        @media screen and (min-width:767px) {
            .css-1jra5hy {
                -webkit-flex-wrap: wrap;
                -ms-flex-wrap: wrap;
                flex-wrap: wrap;
                margin-left: -8px;
                margin-right: -8px;
            }
        }

        @media screen and (min-width:1023px) {
            .css-1jra5hy {
                -webkit-flex-wrap: nowrap;
                -ms-flex-wrap: nowrap;
                flex-wrap: nowrap;
                margin-left: -16px;
                margin-right: -16px;
            }
        }
    </style>
    <style data-emotion-css="1woe67z">
        .css-1woe67z {
            box-sizing: border-box;
            margin: 0;
            min-width: 0;
            width: 100%;
        }

        @media screen and (min-width:767px) {
            .css-1woe67z {
                width: 50%;
            }
        }

        @media screen and (min-width:1023px) {
            .css-1woe67z {
                width: 25%;
            }
        }
    </style>
    <style data-emotion-css="1uzvpxr">
        .css-1uzvpxr {
            box-sizing: border-box;
            margin: 0;
            min-width: 0;
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex;
            border-radius: 6px;
            cursor: pointer;
            margin-left: 4px;
            margin-right: 4px;
            padding-left: 4px;
            padding-right: 4px;
            padding-top: 32px;
            padding-bottom: 32px;
            -webkit-flex-direction: column;
            -ms-flex-direction: column;
            flex-direction: column;
        }

        .css-1uzvpxr:hover {
            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.08);
        }

        @media screen and (min-width:767px) {
            .css-1uzvpxr {
                margin-left: 8px;
                margin-right: 8px;
                padding-left: 8px;
                padding-right: 8px;
            }
        }

        @media screen and (min-width:1023px) {
            .css-1uzvpxr {
                margin-left: 12px;
                margin-right: 12px;
                padding-left: 12px;
                padding-right: 12px;
            }
        }
    </style>
    <style data-emotion-css="dqakkt">
        .css-dqakkt {
            box-sizing: border-box;
            margin: 0;
            min-width: 0;
            width: 80px;
            height: 80px;
            margin-left: auto;
            margin-right: auto;
            margin-bottom: 16px;
        }

        @media screen and (min-width:767px) {
            .css-dqakkt {
                margin-bottom: 24px;
            }
        }
    </style>
    <style data-emotion-css="17iz4jd">
        .css-17iz4jd {
            box-sizing: border-box;
            margin: 0;
            min-width: 0;
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex;
            font-size: 20px;
            color: #1E2329;
            line-height: 28px;
            margin-bottom: 16px;
            text-align: center;
            -webkit-box-pack: center;
            -webkit-justify-content: center;
            -ms-flex-pack: center;
            justify-content: center;
        }

        @media screen and (min-width:767px) {
            .css-17iz4jd {
                line-height: 24px;
            }
        }
    </style>
    <style data-emotion-css="hxtdot">
        .css-hxtdot {
            box-sizing: border-box;
            margin: 0;
            min-width: 0;
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex;
            font-size: 14px;
            line-height: 20px;
            -webkit-box-pack: center;
            -webkit-justify-content: center;
            -ms-flex-pack: center;
            justify-content: center;
            text-align: center;
            color: #474D57;
        }
    </style>
    <style data-emotion-css="cpn49t">
        .css-cpn49t {
            box-sizing: border-box;
            margin: 0;
            min-width: 0;
            background-color: #0B0E11;
        }
    </style>
    <style data-emotion-css="12onrwt">
        .css-12onrwt {
            box-sizing: border-box;
            margin: 0;
            min-width: 0;
            margin-left: auto;
            margin-right: auto;
            padding-left: 16px;
            padding-right: 16px;
            max-width: 1248px;
            color: #fff;
            padding-top: 40px;
            padding-bottom: 48px;
        }

        @media screen and (min-width:767px) {
            .css-12onrwt {
                padding-left: 24px;
                padding-right: 24px;
            }
        }

        @media screen and (min-width:767px) {
            .css-12onrwt {
                padding-top: 40px;
            }
        }

        @media screen and (min-width:1023px) {
            .css-12onrwt {
                padding-top: 64px;
            }
        }
    </style>
    <style data-emotion-css="18f7v97">
        .css-18f7v97 {
            box-sizing: border-box;
            margin: 0;
            min-width: 0;
            padding-bottom: 33px;
            text-align: center;
            font-size: 28px;
            font-weight: 400;
        }

        @media screen and (min-width:767px) {
            .css-18f7v97 {
                font-size: 32px;
            }
        }

        @media screen and (min-width:1023px) {
            .css-18f7v97 {
                font-size: 40px;
            }
        }
    </style>
    <style data-emotion-css="81xrsn">
        .css-81xrsn {
            box-sizing: border-box;
            margin: 0;
            min-width: 0;
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-pack: center;
            -webkit-justify-content: center;
            -ms-flex-pack: center;
            justify-content: center;
        }
    </style>
    <style data-emotion-css="ao077r">
        .css-ao077r {
            box-sizing: border-box;
            margin: 0;
            min-width: 0;
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            cursor: pointer;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
            display: -webkit-inline-box;
            display: -webkit-inline-flex;
            display: -ms-inline-flexbox;
            display: inline-flex;
            -webkit-align-items: center;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            -webkit-box-pack: center;
            -webkit-justify-content: center;
            -ms-flex-pack: center;
            justify-content: center;
            box-sizing: border-box;
            font-size: inherit;
            font-family: inherit;
            text-align: center;
            -webkit-text-decoration: none;
            text-decoration: none;
            outline: none;
            font-weight: 500;
            font-size: 14px;
            line-height: 20px;
            word-break: keep-all;
            color: #212833;
            border-radius: 4px;
            padding-top: 4px;
            padding-bottom: 4px;
            min-height: 24px;
            border: none;
            padding-left: 8px;
            padding-right: 8px;
            background-image: linear-gradient(180deg, #F8D12F 0%, #F0B90B 100%);
            margin-right: 16px;
            width: 130px;
            height: 40px;
        }

        .css-ao077r:disabled {
            cursor: not-allowed;
            background-image: none;
            background-color: #EAECEF;
            color: #B7BDC6;
        }

        .css-ao077r:hover:not(:disabled):not(:active) {
            box-shadow: none;
        }

        .css-ao077r.inactive {
            opacity: 0.3;
            cursor: not-allowed;
        }

        .css-ao077r:active:not(:disabled):not(.inactive) {
            background-image: none;
            background-color: #F0B90B;
        }

        .css-ao077r:hover:not(:disabled):not(:active):not(.inactive) {
            box-shadow: none;
            background-image: linear-gradient(180deg, #FFE251 0%, #EDC423 100%);
        }

        @media screen and (min-width:767px) {
            .css-ao077r {
                width: 150px;
            }
        }
    </style>
    <style data-emotion-css="po5tlu">
        .css-po5tlu {
            box-sizing: border-box;
            margin: 0;
            min-width: 0;
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            cursor: pointer;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
            display: -webkit-inline-box;
            display: -webkit-inline-flex;
            display: -ms-inline-flexbox;
            display: inline-flex;
            -webkit-align-items: center;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            -webkit-box-pack: center;
            -webkit-justify-content: center;
            -ms-flex-pack: center;
            justify-content: center;
            box-sizing: border-box;
            font-size: inherit;
            font-family: inherit;
            text-align: center;
            -webkit-text-decoration: none;
            text-decoration: none;
            outline: none;
            font-weight: 500;
            font-size: 14px;
            line-height: 20px;
            word-break: keep-all;
            color: #F0B90B;
            border-radius: 4px;
            padding-top: 5px;
            padding-bottom: 5px;
            min-height: 24px;
            border: 1px solid;
            padding-left: 11px;
            padding-right: 11px;
            background-color: transparent;
            box-shadow: none;
            border-color: #F0B90B;
            min-width: 52px;
            width: 130px;
            height: 40px;
        }

        .css-po5tlu:disabled {
            cursor: not-allowed;
            background-image: none;
            background-color: #EAECEF;
            color: #B7BDC6;
        }

        .css-po5tlu:hover:not(:disabled):not(:active) {
            background-color: rgba(0, 0, 0, 0.02);
        }

        .css-po5tlu.inactive {
            opacity: 0.3;
            cursor: not-allowed;
        }

        .css-po5tlu:active:not(:disabled) {
            background-color: rgba(0, 0, 0, 0.02);
        }

        @media screen and (min-width:767px) {
            .css-po5tlu {
                width: 150px;
            }
        }
    </style>
    <style data-emotion-css="2qpcvm">
        .css-2qpcvm {
            box-sizing: border-box;
            margin: 0;
            min-width: 0;
            overflow: hidden;
            padding-top: 48px;
            background-color: #0B0E11;
            padding-left: 40px;
            padding-right: 40px;
            width: 100%;
        }
    </style>
    <style data-emotion-css="kpar8n">
        .css-kpar8n {
            box-sizing: border-box;
            margin: 0;
            min-width: 0;
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex;
            -webkit-flex-direction: column;
            -ms-flex-direction: column;
            flex-direction: column;
            width: 100%;
            padding-left: 24px;
            padding-right: 24px;
        }

        @media screen and (min-width:767px) {
            .css-kpar8n {
                display: none;
            }
        }

        @media screen and (min-width:1023px) {
            .css-kpar8n {
                display: none;
            }
        }
    </style>
    <style data-emotion-css="w7l0py">
        .css-w7l0py {
            box-sizing: border-box;
            margin: 0;
            min-width: 0;
            overflow: hidden;
            -webkit-transition: 0.5s;
            transition: 0.5s;
            max-height: 48px;
        }
    </style>
    <style data-emotion-css="1hc1bzm">
        .css-1hc1bzm {
            box-sizing: border-box;
            margin: 0;
            min-width: 0;
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex;
            -webkit-align-items: center;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            height: 48px;
        }
    </style>
    <style data-emotion-css="1ofolr4">
        .css-1ofolr4 {
            box-sizing: border-box;
            margin: 0;
            min-width: 0;
            font-weight: 500;
            font-size: 16px;
            line-height: 22px;
            color: #fff;
        }

        @media screen and (min-width:767px) {
            .css-1ofolr4 {
                font-size: 18px;
                line-height: 24px;
            }
        }
    </style>
    <style data-emotion-css="1pysja1">
        .css-1pysja1 {
            box-sizing: border-box;
            margin: 0;
            min-width: 0;
            -webkit-flex: 1;
            -ms-flex: 1;
            flex: 1;
        }
    </style>
    <style data-emotion-css="1myvhw3">
        .css-1myvhw3 {
            box-sizing: border-box;
            margin: 0;
            min-width: 0;
            -webkit-text-decoration: none;
            text-decoration: none;
            margin-bottom: 8px;
            display: block;
            color: #707A8A;
            -webkit-align-items: center;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
        }

        .css-1myvhw3:visited,
        .css-1myvhw3:active {
            color: #707A8A;
        }

        .css-1myvhw3:hover {
            color: #fff;
        }
    </style>
    <style data-emotion-css="1cjl26j">
        .css-1cjl26j {
            box-sizing: border-box;
            margin: 0;
            min-width: 0;
            font-weight: 400;
            font-size: 14px;
            line-height: 20px;
        }
    </style>
    <style data-emotion-css="1tr0qpm">
        .css-1tr0qpm {
            box-sizing: border-box;
            margin: 0;
            min-width: 0;
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex;
            width: 100%;
        }
    </style>
    <style data-emotion-css="138yzuf">
        .css-138yzuf {
            box-sizing: border-box;
            margin: 0;
            min-width: 0;
            -webkit-flex-wrap: wrap;
            -ms-flex-wrap: wrap;
            flex-wrap: wrap;
            display: none;
            -webkit-flex: 1;
            -ms-flex: 1;
            flex: 1;
            padding-bottom: 24px;
            width: 80%;
            height: 0px;
            padding-left: 0px;
            padding-right: 0px;
            -webkit-flex-direction: column;
            -ms-flex-direction: column;
            flex-direction: column;
        }

        @media screen and (min-width:767px) {
            .css-138yzuf {
                display: -webkit-box;
                display: -webkit-flex;
                display: -ms-flexbox;
                display: flex;
                width: 100%;
                height: 530px;
                padding-left: 24px;
                padding-right: 24px;
            }
        }

        @media screen and (min-width:1023px) {
            .css-138yzuf {
                display: -webkit-box;
                display: -webkit-flex;
                display: -ms-flexbox;
                display: flex;
                width: 80%;
                height: 440px;
                padding-left: 0px;
                padding-right: 0px;
            }
        }
    </style>
    <style data-emotion-css="19ph8gz">
        .css-19ph8gz {
            box-sizing: border-box;
            margin: 0;
            min-width: 0;
            width: 20%;
        }

        @media screen and (min-width:767px) {
            .css-19ph8gz {
                width: 25%;
            }
        }

        @media screen and (min-width:1023px) {
            .css-19ph8gz {
                width: 20%;
            }
        }
    </style>
    <style data-emotion-css="1jsf87b">
        .css-1jsf87b {
            box-sizing: border-box;
            margin: 0;
            min-width: 0;
            font-weight: 500;
            font-size: 16px;
            line-height: 22px;
            color: #fff;
            margin-top: 32px;
            margin-bottom: 16px;
        }

        @media screen and (min-width:767px) {
            .css-1jsf87b {
                font-size: 18px;
                line-height: 24px;
            }
        }
    </style>
    <style data-emotion-css="1ti7za9">
        .css-1ti7za9 {
            box-sizing: border-box;
            margin: 0;
            min-width: 0;
            display: none;
            -webkit-flex-direction: column;
            -ms-flex-direction: column;
            flex-direction: column;
            width: 20%;
        }

        @media screen and (min-width:767px) {
            .css-1ti7za9 {
                display: none;
            }
        }

        @media screen and (min-width:1023px) {
            .css-1ti7za9 {
                display: -webkit-box;
                display: -webkit-flex;
                display: -ms-flexbox;
                display: flex;
            }
        }
    </style>
    <style data-emotion-css="wyeq5d">
        .css-wyeq5d {
            box-sizing: border-box;
            margin: 0;
            min-width: 0;
            -webkit-flex-shrink: 0;
            -ms-flex-negative: 0;
            flex-shrink: 0;
            -webkit-text-decoration: none;
            text-decoration: none;
            color: #707A8A;
            display: -webkit-inline-box;
            display: -webkit-inline-flex;
            display: -ms-inline-flexbox;
            display: inline-flex;
            -webkit-align-items: center;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            margin-right: 32px;
        }

        .css-wyeq5d:visited,
        .css-wyeq5d:active {
            color: #707A8A;
        }

        .css-wyeq5d:hover {
            color: #fff;
        }

        .css-wyeq5d svg {
            display: inline-block;
        }
    </style>
    <style data-emotion-css="1ok5vaw">
        .css-1ok5vaw {
            box-sizing: border-box;
            margin: 0;
            min-width: 0;
            color: currentColor;
            width: 18px;
            height: 18px;
            font-size: 18px;
            fill: #1E2329;
            fill: currentColor;
            margin-bottom: 24px;
        }
    </style>
    <style data-emotion-css="ybbx55">
        .css-ybbx55 {
            box-sizing: border-box;
            margin: 0;
            min-width: 0;
            position: relative;
            display: inline-block;
            outline: none;
        }
    </style>
    <style data-emotion-css="1w92vad">
        .css-1w92vad {
            box-sizing: border-box;
            margin: 0;
            min-width: 0;
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            cursor: pointer;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
            display: -webkit-inline-box;
            display: -webkit-inline-flex;
            display: -ms-inline-flexbox;
            display: inline-flex;
            -webkit-align-items: center;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            -webkit-box-pack: center;
            -webkit-justify-content: center;
            -ms-flex-pack: center;
            justify-content: center;
            box-sizing: border-box;
            font-size: inherit;
            font-family: inherit;
            text-align: center;
            -webkit-text-decoration: none;
            text-decoration: none;
            outline: none;
            font-weight: 500;
            font-size: 14px;
            line-height: 20px;
            word-break: keep-all;
            color: #212833;
            border-radius: 4px;
            padding-top: 4px;
            padding-bottom: 4px;
            min-height: 24px;
            border: none;
            padding-left: 8px;
            padding-right: 8px;
            background-image: linear-gradient(180deg, #F8D12F 0%, #F0B90B 100%);
            outline: none;
            padding-top: 8px;
            padding-bottom: 8px;
            color: #48515D;
            height: auto;
            line-height: auto;
            background: transparent !important;
            border: 1px solid #48515D;
        }

        .css-1w92vad:disabled {
            cursor: not-allowed;
            background-image: none;
            background-color: #EAECEF;
            color: #B7BDC6;
        }

        .css-1w92vad:hover:not(:disabled):not(:active) {
            box-shadow: none;
        }

        .css-1w92vad.inactive {
            opacity: 0.3;
            cursor: not-allowed;
        }

        .css-1w92vad:active:not(:disabled):not(.inactive) {
            background-image: none;
            background-color: #F0B90B;
        }

        .css-1w92vad:hover:not(:disabled):not(:active):not(.inactive) {
            box-shadow: none;
            background-image: linear-gradient(180deg, #FFE251 0%, #EDC423 100%);
        }

        .css-1w92vad:hover {
            border: 1px solid #48515D;
            background: transparent !important;
        }
    </style>
    <style data-emotion-css="1gdy6l7">
        .css-1gdy6l7 {
            box-sizing: border-box;
            margin: 0;
            min-width: 0;
            color: white;
            width: 18px;
            height: 18px;
            font-size: 18px;
            fill: #1E2329;
            fill: white;
            margin-right: 8px;
        }
    </style>
    <style data-emotion-css="n8a3xt">
        .css-n8a3xt {
            box-sizing: border-box;
            margin: 0;
            min-width: 0;
            font-weight: 400;
            font-size: 14px;
            line-height: 20px;
            color: white;
        }
    </style>
    <style data-emotion-css="hg0irb">
        .css-hg0irb {
            box-sizing: border-box;
            margin: 0;
            min-width: 0;
            color: white;
            width: 16px;
            height: 16px;
            font-size: 16px;
            fill: #1E2329;
            fill: white;
            -webkit-transition: -webkit-transform 0.5s;
            -webkit-transition: transform 0.5s;
            transition: transform 0.5s;
            margin-left: 24px;
        }
    </style>
    <style data-emotion-css="gv1gi9">
        .css-gv1gi9 {
            box-sizing: border-box;
            margin: 0;
            min-width: 0;
            display: none;
            pointer-events: none;
            visibility: hidden;
            z-index: 1100;
        }
    </style>
    <style data-emotion-css="1cuoy00">
        .css-1cuoy00 {
            box-sizing: border-box;
            margin: 0;
            min-width: 0;
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex;
            background-color: rgb(30, 33, 38);
            width: auto;
            padding-top: 8px;
            padding-bottom: 8px;
            border-radius: 4px;
        }
    </style>
    <style data-emotion-css="1jcqx7s">
        .css-1jcqx7s {
            box-sizing: border-box;
            margin: 0;
            min-width: 0;
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex;
            -webkit-flex-direction: column;
            -ms-flex-direction: column;
            flex-direction: column;
            width: 100%;
            padding-left: 24px;
            padding-right: 24px;
        }

        @media screen and (min-width:767px) {
            .css-1jcqx7s {
                display: -webkit-box;
                display: -webkit-flex;
                display: -ms-flexbox;
                display: flex;
            }
        }

        @media screen and (min-width:1023px) {
            .css-1jcqx7s {
                display: none;
            }
        }
    </style>
    <style data-emotion-css="90tmb0">
        .css-90tmb0 {
            box-sizing: border-box;
            margin: 0;
            min-width: 0;
            font-weight: 500;
            font-size: 16px;
            line-height: 22px;
            color: #fff;
            height: 48px;
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex;
            -webkit-align-items: center;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
        }

        @media screen and (min-width:767px) {
            .css-90tmb0 {
                font-size: 18px;
                line-height: 24px;
            }
        }
    </style>
    <style data-emotion-css="136a9lx">
        .css-136a9lx {
            box-sizing: border-box;
            margin: 0;
            min-width: 0;
            -webkit-flex-wrap: wrap;
            -ms-flex-wrap: wrap;
            flex-wrap: wrap;
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex;
            -webkit-align-items: center;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
        }
    </style>
    <style data-emotion-css="1c0vxpt">
        .css-1c0vxpt {
            box-sizing: border-box;
            margin: 0;
            min-width: 0;
            color: currentColor;
            width: 24px;
            height: 24px;
            font-size: 24px;
            fill: #1E2329;
            fill: currentColor;
            width: 18px;
            margin-bottom: 24px;
            height: 18px;
        }
    </style>
    <style data-emotion-css="1bbpiq1">
        .css-1bbpiq1 {
            box-sizing: border-box;
            margin: 0;
            min-width: 0;
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            cursor: pointer;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
            display: -webkit-inline-box;
            display: -webkit-inline-flex;
            display: -ms-inline-flexbox;
            display: inline-flex;
            -webkit-align-items: center;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            -webkit-box-pack: center;
            -webkit-justify-content: center;
            -ms-flex-pack: center;
            justify-content: center;
            box-sizing: border-box;
            font-size: inherit;
            font-family: inherit;
            text-align: center;
            -webkit-text-decoration: none;
            text-decoration: none;
            outline: none;
            font-weight: 500;
            font-size: 14px;
            line-height: 20px;
            word-break: keep-all;
            color: #212833;
            border-radius: 4px;
            padding-top: 4px;
            padding-bottom: 4px;
            min-height: 24px;
            border: none;
            padding-left: 8px;
            padding-right: 8px;
            background-image: linear-gradient(180deg, #F8D12F 0%, #F0B90B 100%);
            outline: none;
            padding-top: 8px;
            padding-bottom: 8px;
            color: #48515D;
            height: auto;
            line-height: auto;
            background: transparent !important;
            border: 1px solid #48515D;
            display: none;
            margin-bottom: 24px;
        }

        .css-1bbpiq1:disabled {
            cursor: not-allowed;
            background-image: none;
            background-color: #EAECEF;
            color: #B7BDC6;
        }

        .css-1bbpiq1:hover:not(:disabled):not(:active) {
            box-shadow: none;
        }

        .css-1bbpiq1.inactive {
            opacity: 0.3;
            cursor: not-allowed;
        }

        .css-1bbpiq1:active:not(:disabled):not(.inactive) {
            background-image: none;
            background-color: #F0B90B;
        }

        .css-1bbpiq1:hover:not(:disabled):not(:active):not(.inactive) {
            box-shadow: none;
            background-image: linear-gradient(180deg, #FFE251 0%, #EDC423 100%);
        }

        .css-1bbpiq1:hover {
            border: 1px solid #48515D;
            background: transparent !important;
        }

        @media screen and (min-width:767px) {
            .css-1bbpiq1 {
                display: -webkit-box;
                display: -webkit-flex;
                display: -ms-flexbox;
                display: flex;
            }
        }

        @media screen and (min-width:1023px) {
            .css-1bbpiq1 {
                display: none;
            }
        }
    </style>
    <style data-emotion-css="1vzfcz1">
        .css-1vzfcz1 {
            box-sizing: border-box;
            margin: 0;
            min-width: 0;
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            cursor: pointer;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
            display: -webkit-inline-box;
            display: -webkit-inline-flex;
            display: -ms-inline-flexbox;
            display: inline-flex;
            -webkit-align-items: center;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            -webkit-box-pack: center;
            -webkit-justify-content: center;
            -ms-flex-pack: center;
            justify-content: center;
            box-sizing: border-box;
            font-size: inherit;
            font-family: inherit;
            text-align: center;
            -webkit-text-decoration: none;
            text-decoration: none;
            outline: none;
            font-weight: 500;
            font-size: 14px;
            line-height: 20px;
            word-break: keep-all;
            color: #212833;
            border-radius: 4px;
            padding-top: 4px;
            padding-bottom: 4px;
            min-height: 24px;
            border: none;
            padding-left: 8px;
            padding-right: 8px;
            background-image: linear-gradient(180deg, #F8D12F 0%, #F0B90B 100%);
            outline: none;
            padding-top: 8px;
            padding-bottom: 8px;
            color: #48515D;
            height: auto;
            line-height: auto;
            background: transparent !important;
            border: 1px solid #48515D;
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex;
            margin-bottom: 24px;
        }

        .css-1vzfcz1:disabled {
            cursor: not-allowed;
            background-image: none;
            background-color: #EAECEF;
            color: #B7BDC6;
        }

        .css-1vzfcz1:hover:not(:disabled):not(:active) {
            box-shadow: none;
        }

        .css-1vzfcz1.inactive {
            opacity: 0.3;
            cursor: not-allowed;
        }

        .css-1vzfcz1:active:not(:disabled):not(.inactive) {
            background-image: none;
            background-color: #F0B90B;
        }

        .css-1vzfcz1:hover:not(:disabled):not(:active):not(.inactive) {
            box-shadow: none;
            background-image: linear-gradient(180deg, #FFE251 0%, #EDC423 100%);
        }

        .css-1vzfcz1:hover {
            border: 1px solid #48515D;
            background: transparent !important;
        }

        @media screen and (min-width:767px) {
            .css-1vzfcz1 {
                display: none;
            }
        }

        @media screen and (min-width:1023px) {
            .css-1vzfcz1 {
                display: none;
            }
        }
    </style>
    <style data-emotion-css="qe0qko">
        .css-qe0qko {
            box-sizing: border-box;
            margin: 0;
            min-width: 0;
            border-top: 1px solid rgba(242, 242, 242, 0.1);
            padding-top: 16px;
            padding-bottom: 16px;
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex;
            -webkit-align-items: center;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            width: 100%;
            -webkit-box-pack: center;
            -webkit-justify-content: center;
            -ms-flex-pack: center;
            justify-content: center;
            -webkit-flex-direction: column;
            -ms-flex-direction: column;
            flex-direction: column;
        }

        @media screen and (min-width:767px) {
            .css-qe0qko {
                padding-top: 24px;
                padding-bottom: 24px;
            }
        }

        @media screen and (min-width:1023px) {
            .css-qe0qko {
                padding-top: 24px;
                padding-bottom: 24px;
            }
        }
    </style>
    <style data-emotion-css="1ez451f">
        .css-1ez451f {
            box-sizing: border-box;
            margin: 0;
            min-width: 0;
            font-weight: 400;
            font-size: 12px;
            line-height: 16px;
            color: #707A8A;
        }
    </style>
    <style data-emotion="css"></style>
    <style type="text/css">
        .wrapperLayer__z_PKn {
            position: fixed;
            margin: 0;
            padding: 0;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            z-index: 999;
        }
    </style>
    <style type="text/css">
        /* 与 anim.js 同步 */
        .baseButton__2AV5J {
            z-index: 1000;
            box-sizing: border-box;
            cursor: pointer;
        }

        .baseButton__2AV5J>svg {
            display: block;
            width: 2rem;
            height: 2rem;
        }

        .controls__NTVNu {
            box-sizing: border-box;
            position: absolute;
            top: 0.6rem;
            right: 0.6rem;
            opacity: 0;
            display: -webkit-box;
            display: flex;
            z-index: 1000;
            border-radius: 5rem;
            -webkit-transform: translateX(100%);
            transform: translateX(100%);
            -webkit-transition: opacity 350ms, -webkit-transform 350ms cubic-bezier(0.6, 0, 0.1, 1);
            transition: opacity 350ms, -webkit-transform 350ms cubic-bezier(0.6, 0, 0.1, 1);
            transition: transform 350ms cubic-bezier(0.6, 0, 0.1, 1), opacity 350ms;
            transition: transform 350ms cubic-bezier(0.6, 0, 0.1, 1), opacity 350ms, -webkit-transform 350ms cubic-bezier(0.6, 0, 0.1, 1);
        }

        .controls__NTVNu.show__2Pu4e {
            opacity: 0.8;
            -webkit-transform: translateX(0);
            transform: translateX(0);
        }

        .controls__NTVNu .pinButton__pLhHH {
            z-index: 1000;
            box-sizing: border-box;
            cursor: pointer;
            margin: 0.4em 0;
            width: 2rem;
            height: 2rem;
            -webkit-transition: opacity 350ms cubic-bezier(0.6, 0, 0.1, 1), -webkit-transform 175ms cubic-bezier(0.6, 0, 0.1, 1);
            transition: opacity 350ms cubic-bezier(0.6, 0, 0.1, 1), -webkit-transform 175ms cubic-bezier(0.6, 0, 0.1, 1);
            transition: transform 175ms cubic-bezier(0.6, 0, 0.1, 1), opacity 350ms cubic-bezier(0.6, 0, 0.1, 1);
            transition: transform 175ms cubic-bezier(0.6, 0, 0.1, 1), opacity 350ms cubic-bezier(0.6, 0, 0.1, 1), -webkit-transform 175ms cubic-bezier(0.6, 0, 0.1, 1);
        }

        .controls__NTVNu .pinButton__pLhHH>svg {
            display: block;
            width: 2rem;
            height: 2rem;
        }

        .controls__NTVNu .pinButton__pLhHH:hover {
            opacity: 0.8 !important;
            -webkit-transform: scale(1.1) !important;
            transform: scale(1.1) !important;
        }

        .controls__NTVNu .pinButton__pLhHH:active {
            opacity: 1 !important;
            -webkit-transform: scale(1) !important;
            transform: scale(1) !important;
        }

        .controls__NTVNu .pinButton__pLhHH:first-of-type {
            margin-left: 0.4rem;
        }

        .controls__NTVNu .pinButton__pLhHH:last-of-type {
            margin-right: 0.4rem;
        }

        .controls__NTVNu .rotate__18SVA {
            z-index: 1000;
            box-sizing: border-box;
            cursor: pointer;
            margin: 0.4em 0;
            width: 2rem;
            height: 2rem;
            -webkit-transition: opacity 350ms cubic-bezier(0.6, 0, 0.1, 1), -webkit-transform 175ms cubic-bezier(0.6, 0, 0.1, 1);
            transition: opacity 350ms cubic-bezier(0.6, 0, 0.1, 1), -webkit-transform 175ms cubic-bezier(0.6, 0, 0.1, 1);
            transition: transform 175ms cubic-bezier(0.6, 0, 0.1, 1), opacity 350ms cubic-bezier(0.6, 0, 0.1, 1);
            transition: transform 175ms cubic-bezier(0.6, 0, 0.1, 1), opacity 350ms cubic-bezier(0.6, 0, 0.1, 1), -webkit-transform 175ms cubic-bezier(0.6, 0, 0.1, 1);
        }

        .controls__NTVNu .rotate__18SVA>svg {
            display: block;
            width: 2rem;
            height: 2rem;
        }

        .controls__NTVNu .rotate__18SVA:hover {
            opacity: 0.8 !important;
            -webkit-transform: scale(1.1) !important;
            transform: scale(1.1) !important;
        }

        .controls__NTVNu .rotate__18SVA:active {
            opacity: 1 !important;
            -webkit-transform: scale(1) !important;
            transform: scale(1) !important;
        }

        .controls__NTVNu .rotate__18SVA:first-of-type {
            margin-left: 0.4rem;
        }

        .controls__NTVNu .rotate__18SVA:last-of-type {
            margin-right: 0.4rem;
        }

        .controls__NTVNu .rotate__18SVA svg {
            width: 1.75rem;
            -webkit-transition: -webkit-transform 350ms cubic-bezier(0.6, 0, 0.1, 1);
            transition: -webkit-transform 350ms cubic-bezier(0.6, 0, 0.1, 1);
            transition: transform 350ms cubic-bezier(0.6, 0, 0.1, 1);
            transition: transform 350ms cubic-bezier(0.6, 0, 0.1, 1), -webkit-transform 350ms cubic-bezier(0.6, 0, 0.1, 1);
        }

        .controls__NTVNu .rotateLeft__1y4kO {
            z-index: 1000;
            box-sizing: border-box;
            cursor: pointer;
            margin: 0.4em 0;
            width: 2rem;
            height: 2rem;
            -webkit-transition: opacity 350ms cubic-bezier(0.6, 0, 0.1, 1), -webkit-transform 175ms cubic-bezier(0.6, 0, 0.1, 1);
            transition: opacity 350ms cubic-bezier(0.6, 0, 0.1, 1), -webkit-transform 175ms cubic-bezier(0.6, 0, 0.1, 1);
            transition: transform 175ms cubic-bezier(0.6, 0, 0.1, 1), opacity 350ms cubic-bezier(0.6, 0, 0.1, 1);
            transition: transform 175ms cubic-bezier(0.6, 0, 0.1, 1), opacity 350ms cubic-bezier(0.6, 0, 0.1, 1), -webkit-transform 175ms cubic-bezier(0.6, 0, 0.1, 1);
        }

        .controls__NTVNu .rotateLeft__1y4kO>svg {
            display: block;
            width: 2rem;
            height: 2rem;
        }

        .controls__NTVNu .rotateLeft__1y4kO:hover {
            opacity: 0.8 !important;
            -webkit-transform: scale(1.1) !important;
            transform: scale(1.1) !important;
        }

        .controls__NTVNu .rotateLeft__1y4kO:active {
            opacity: 1 !important;
            -webkit-transform: scale(1) !important;
            transform: scale(1) !important;
        }

        .controls__NTVNu .rotateLeft__1y4kO:first-of-type {
            margin-left: 0.4rem;
        }

        .controls__NTVNu .rotateLeft__1y4kO:last-of-type {
            margin-right: 0.4rem;
        }

        .controls__NTVNu .rotateLeft__1y4kO svg {
            width: 1.75rem;
            -webkit-transition: -webkit-transform 350ms cubic-bezier(0.6, 0, 0.1, 1);
            transition: -webkit-transform 350ms cubic-bezier(0.6, 0, 0.1, 1);
            transition: transform 350ms cubic-bezier(0.6, 0, 0.1, 1);
            transition: transform 350ms cubic-bezier(0.6, 0, 0.1, 1), -webkit-transform 350ms cubic-bezier(0.6, 0, 0.1, 1);
        }

        .controls__NTVNu .rotateLeft__1y4kO:hover svg {
            -webkit-transform: rotate(-30deg);
            transform: rotate(-30deg);
        }

        .controls__NTVNu .rotateRight__1GeTD {
            z-index: 1000;
            box-sizing: border-box;
            cursor: pointer;
            margin: 0.4em 0;
            width: 2rem;
            height: 2rem;
            -webkit-transition: opacity 350ms cubic-bezier(0.6, 0, 0.1, 1), -webkit-transform 175ms cubic-bezier(0.6, 0, 0.1, 1);
            transition: opacity 350ms cubic-bezier(0.6, 0, 0.1, 1), -webkit-transform 175ms cubic-bezier(0.6, 0, 0.1, 1);
            transition: transform 175ms cubic-bezier(0.6, 0, 0.1, 1), opacity 350ms cubic-bezier(0.6, 0, 0.1, 1);
            transition: transform 175ms cubic-bezier(0.6, 0, 0.1, 1), opacity 350ms cubic-bezier(0.6, 0, 0.1, 1), -webkit-transform 175ms cubic-bezier(0.6, 0, 0.1, 1);
        }

        .controls__NTVNu .rotateRight__1GeTD>svg {
            display: block;
            width: 2rem;
            height: 2rem;
        }

        .controls__NTVNu .rotateRight__1GeTD:hover {
            opacity: 0.8 !important;
            -webkit-transform: scale(1.1) !important;
            transform: scale(1.1) !important;
        }

        .controls__NTVNu .rotateRight__1GeTD:active {
            opacity: 1 !important;
            -webkit-transform: scale(1) !important;
            transform: scale(1) !important;
        }

        .controls__NTVNu .rotateRight__1GeTD:first-of-type {
            margin-left: 0.4rem;
        }

        .controls__NTVNu .rotateRight__1GeTD:last-of-type {
            margin-right: 0.4rem;
        }

        .controls__NTVNu .rotateRight__1GeTD svg {
            width: 1.75rem;
            -webkit-transition: -webkit-transform 350ms cubic-bezier(0.6, 0, 0.1, 1);
            transition: -webkit-transform 350ms cubic-bezier(0.6, 0, 0.1, 1);
            transition: transform 350ms cubic-bezier(0.6, 0, 0.1, 1);
            transition: transform 350ms cubic-bezier(0.6, 0, 0.1, 1), -webkit-transform 350ms cubic-bezier(0.6, 0, 0.1, 1);
        }

        .controls__NTVNu .rotateRight__1GeTD:hover svg {
            -webkit-transform: rotate(30deg);
            transform: rotate(30deg);
        }

        .controls__NTVNu .download__TnaVI {
            z-index: 1000;
            box-sizing: border-box;
            cursor: pointer;
            margin: 0.4em 0;
            width: 2rem;
            height: 2rem;
            -webkit-transition: opacity 350ms cubic-bezier(0.6, 0, 0.1, 1), -webkit-transform 175ms cubic-bezier(0.6, 0, 0.1, 1);
            transition: opacity 350ms cubic-bezier(0.6, 0, 0.1, 1), -webkit-transform 175ms cubic-bezier(0.6, 0, 0.1, 1);
            transition: transform 175ms cubic-bezier(0.6, 0, 0.1, 1), opacity 350ms cubic-bezier(0.6, 0, 0.1, 1);
            transition: transform 175ms cubic-bezier(0.6, 0, 0.1, 1), opacity 350ms cubic-bezier(0.6, 0, 0.1, 1), -webkit-transform 175ms cubic-bezier(0.6, 0, 0.1, 1);
        }

        .controls__NTVNu .download__TnaVI>svg {
            display: block;
            width: 2rem;
            height: 2rem;
        }

        .controls__NTVNu .download__TnaVI:hover {
            opacity: 0.8 !important;
            -webkit-transform: scale(1.1) !important;
            transform: scale(1.1) !important;
        }

        .controls__NTVNu .download__TnaVI:active {
            opacity: 1 !important;
            -webkit-transform: scale(1) !important;
            transform: scale(1) !important;
        }

        .controls__NTVNu .download__TnaVI:first-of-type {
            margin-left: 0.4rem;
        }

        .controls__NTVNu .download__TnaVI:last-of-type {
            margin-right: 0.4rem;
        }

        .controls__NTVNu .download__TnaVI svg {
            margin-top: -0.06rem;
            width: 1.75rem;
        }

        .controls__NTVNu .zoom__1W2_u {
            z-index: 1000;
            box-sizing: border-box;
            cursor: pointer;
            margin: 0.4em 0;
            width: 2rem;
            height: 2rem;
            -webkit-transition: opacity 350ms cubic-bezier(0.6, 0, 0.1, 1), -webkit-transform 175ms cubic-bezier(0.6, 0, 0.1, 1);
            transition: opacity 350ms cubic-bezier(0.6, 0, 0.1, 1), -webkit-transform 175ms cubic-bezier(0.6, 0, 0.1, 1);
            transition: transform 175ms cubic-bezier(0.6, 0, 0.1, 1), opacity 350ms cubic-bezier(0.6, 0, 0.1, 1);
            transition: transform 175ms cubic-bezier(0.6, 0, 0.1, 1), opacity 350ms cubic-bezier(0.6, 0, 0.1, 1), -webkit-transform 175ms cubic-bezier(0.6, 0, 0.1, 1);
        }

        .controls__NTVNu .zoom__1W2_u>svg {
            display: block;
            width: 2rem;
            height: 2rem;
        }

        .controls__NTVNu .zoom__1W2_u:hover {
            opacity: 0.8 !important;
            -webkit-transform: scale(1.1) !important;
            transform: scale(1.1) !important;
        }

        .controls__NTVNu .zoom__1W2_u:active {
            opacity: 1 !important;
            -webkit-transform: scale(1) !important;
            transform: scale(1) !important;
        }

        .controls__NTVNu .zoom__1W2_u:first-of-type {
            margin-left: 0.4rem;
        }

        .controls__NTVNu .zoom__1W2_u:last-of-type {
            margin-right: 0.4rem;
        }

        .controls__NTVNu .close__h79Tx {
            z-index: 1000;
            box-sizing: border-box;
            cursor: pointer;
            margin: 0.4em 0;
            width: 2rem;
            height: 2rem;
            -webkit-transition: opacity 350ms cubic-bezier(0.6, 0, 0.1, 1), -webkit-transform 175ms cubic-bezier(0.6, 0, 0.1, 1);
            transition: opacity 350ms cubic-bezier(0.6, 0, 0.1, 1), -webkit-transform 175ms cubic-bezier(0.6, 0, 0.1, 1);
            transition: transform 175ms cubic-bezier(0.6, 0, 0.1, 1), opacity 350ms cubic-bezier(0.6, 0, 0.1, 1);
            transition: transform 175ms cubic-bezier(0.6, 0, 0.1, 1), opacity 350ms cubic-bezier(0.6, 0, 0.1, 1), -webkit-transform 175ms cubic-bezier(0.6, 0, 0.1, 1);
        }

        .controls__NTVNu .close__h79Tx>svg {
            display: block;
            width: 2rem;
            height: 2rem;
        }

        .controls__NTVNu .close__h79Tx:hover {
            opacity: 0.8 !important;
            -webkit-transform: scale(1.1) !important;
            transform: scale(1.1) !important;
        }

        .controls__NTVNu .close__h79Tx:active {
            opacity: 1 !important;
            -webkit-transform: scale(1) !important;
            transform: scale(1) !important;
        }

        .controls__NTVNu .close__h79Tx:first-of-type {
            margin-left: 0.4rem;
        }

        .controls__NTVNu .close__h79Tx:last-of-type {
            margin-right: 0.4rem;
        }

        .sideButton__25vo1 {
            z-index: 1000;
            box-sizing: border-box;
            cursor: pointer;
            opacity: 0;
            position: absolute;
            top: 50%;
            padding: 0.4rem;
            -webkit-transition: opacity 350ms cubic-bezier(0.6, 0, 0.1, 1), -webkit-transform 175ms cubic-bezier(0.6, 0, 0.1, 1);
            transition: opacity 350ms cubic-bezier(0.6, 0, 0.1, 1), -webkit-transform 175ms cubic-bezier(0.6, 0, 0.1, 1);
            transition: transform 175ms cubic-bezier(0.6, 0, 0.1, 1), opacity 350ms cubic-bezier(0.6, 0, 0.1, 1);
            transition: transform 175ms cubic-bezier(0.6, 0, 0.1, 1), opacity 350ms cubic-bezier(0.6, 0, 0.1, 1), -webkit-transform 175ms cubic-bezier(0.6, 0, 0.1, 1);
        }

        .sideButton__25vo1>svg {
            display: block;
            width: 2rem;
            height: 2rem;
        }

        .sideButton__25vo1:hover {
            opacity: 0.8 !important;
            -webkit-transform: translateX(0) translateY(-50%) !important;
            transform: translateX(0) translateY(-50%) !important;
        }

        .sideButton__25vo1:active {
            opacity: 1 !important;
        }

        .sideButton__25vo1.show__2Pu4e {
            opacity: 0.8;
        }

        .flipLeft__fhip_ {
            z-index: 1000;
            box-sizing: border-box;
            cursor: pointer;
            opacity: 0;
            position: absolute;
            top: 50%;
            padding: 0.4rem;
            -webkit-transition: opacity 350ms cubic-bezier(0.6, 0, 0.1, 1), -webkit-transform 175ms cubic-bezier(0.6, 0, 0.1, 1);
            transition: opacity 350ms cubic-bezier(0.6, 0, 0.1, 1), -webkit-transform 175ms cubic-bezier(0.6, 0, 0.1, 1);
            transition: transform 175ms cubic-bezier(0.6, 0, 0.1, 1), opacity 350ms cubic-bezier(0.6, 0, 0.1, 1);
            transition: transform 175ms cubic-bezier(0.6, 0, 0.1, 1), opacity 350ms cubic-bezier(0.6, 0, 0.1, 1), -webkit-transform 175ms cubic-bezier(0.6, 0, 0.1, 1);
            left: 0;
            padding-left: 0.6rem;
            border-radius: 0 0.5em 0.5em 0;
            -webkit-transform: translateX(-100%) translateY(-50%);
            transform: translateX(-100%) translateY(-50%);
        }

        .flipLeft__fhip_>svg {
            display: block;
            width: 2rem;
            height: 2rem;
        }

        .flipLeft__fhip_:hover {
            opacity: 0.8 !important;
            -webkit-transform: translateX(0) translateY(-50%) !important;
            transform: translateX(0) translateY(-50%) !important;
        }

        .flipLeft__fhip_:active {
            opacity: 1 !important;
        }

        .flipLeft__fhip_.show__2Pu4e {
            opacity: 0.8;
        }

        .flipLeft__fhip_:active {
            -webkit-transform: translate(-0.2em) translateY(-50%) !important;
            transform: translate(-0.2em) translateY(-50%) !important;
        }

        .flipLeft__fhip_.show__2Pu4e {
            opacity: 0.8;
            -webkit-transform: translate(-0.2em) translateY(-50%);
            transform: translate(-0.2em) translateY(-50%);
        }

        .flipRight__2T92B {
            z-index: 1000;
            box-sizing: border-box;
            cursor: pointer;
            opacity: 0;
            position: absolute;
            top: 50%;
            padding: 0.4rem;
            -webkit-transition: opacity 350ms cubic-bezier(0.6, 0, 0.1, 1), -webkit-transform 175ms cubic-bezier(0.6, 0, 0.1, 1);
            transition: opacity 350ms cubic-bezier(0.6, 0, 0.1, 1), -webkit-transform 175ms cubic-bezier(0.6, 0, 0.1, 1);
            transition: transform 175ms cubic-bezier(0.6, 0, 0.1, 1), opacity 350ms cubic-bezier(0.6, 0, 0.1, 1);
            transition: transform 175ms cubic-bezier(0.6, 0, 0.1, 1), opacity 350ms cubic-bezier(0.6, 0, 0.1, 1), -webkit-transform 175ms cubic-bezier(0.6, 0, 0.1, 1);
            right: 0;
            padding-right: 0.6rem;
            border-radius: 0.5rem 0 0 0.5rem;
            -webkit-transform: translateX(100%) translateY(-50%);
            transform: translateX(100%) translateY(-50%);
        }

        .flipRight__2T92B>svg {
            display: block;
            width: 2rem;
            height: 2rem;
        }

        .flipRight__2T92B:hover {
            opacity: 0.8 !important;
            -webkit-transform: translateX(0) translateY(-50%) !important;
            transform: translateX(0) translateY(-50%) !important;
        }

        .flipRight__2T92B:active {
            opacity: 1 !important;
        }

        .flipRight__2T92B.show__2Pu4e {
            opacity: 0.8;
        }

        .flipRight__2T92B:active {
            -webkit-transform: translate(0.2em) translateY(-50%) !important;
            transform: translate(0.2em) translateY(-50%) !important;
        }

        .flipRight__2T92B.show__2Pu4e {
            opacity: 0.8;
            -webkit-transform: translate(0.2em) translateY(-50%);
            transform: translate(0.2em) translateY(-50%);
        }

        .pages__2jlej {
            box-sizing: border-box;
            display: -webkit-box;
            display: flex;
            position: absolute;
            left: 50%;
            bottom: 0.6rem;
            z-index: 110;
            opacity: 0;
            border-radius: 2rem;
            -webkit-transform: translate(-50%, 100px);
            transform: translate(-50%, 100px);
            -webkit-transition: opacity 350ms cubic-bezier(0.6, 0, 0.1, 1), -webkit-transform 350ms cubic-bezier(0.6, 0, 0.1, 1);
            transition: opacity 350ms cubic-bezier(0.6, 0, 0.1, 1), -webkit-transform 350ms cubic-bezier(0.6, 0, 0.1, 1);
            transition: transform 350ms cubic-bezier(0.6, 0, 0.1, 1), opacity 350ms cubic-bezier(0.6, 0, 0.1, 1);
            transition: transform 350ms cubic-bezier(0.6, 0, 0.1, 1), opacity 350ms cubic-bezier(0.6, 0, 0.1, 1), -webkit-transform 350ms cubic-bezier(0.6, 0, 0.1, 1);
        }

        .pages__2jlej.show__2Pu4e {
            opacity: 0.8;
            -webkit-transform: translate(-50%, 0);
            transform: translate(-50%, 0);
        }

        .pages__2jlej.mobile__3HB5p {
            bottom: 2rem;
        }

        .pages__2jlej .dot__p50eg {
            cursor: pointer;
            margin: 0.45rem 0.25rem;
            display: block;
            width: 0.6rem;
            height: 0.6rem;
            border-radius: 1.2rem;
            background: black;
            -webkit-transition: opacity 350ms cubic-bezier(0.6, 0, 0.1, 1), width 350ms cubic-bezier(0.6, 0, 0.1, 1), -webkit-transform 350ms cubic-bezier(0.6, 0, 0.1, 1);
            transition: opacity 350ms cubic-bezier(0.6, 0, 0.1, 1), width 350ms cubic-bezier(0.6, 0, 0.1, 1), -webkit-transform 350ms cubic-bezier(0.6, 0, 0.1, 1);
            transition: transform 350ms cubic-bezier(0.6, 0, 0.1, 1), opacity 350ms cubic-bezier(0.6, 0, 0.1, 1), width 350ms cubic-bezier(0.6, 0, 0.1, 1);
            transition: transform 350ms cubic-bezier(0.6, 0, 0.1, 1), opacity 350ms cubic-bezier(0.6, 0, 0.1, 1), width 350ms cubic-bezier(0.6, 0, 0.1, 1), -webkit-transform 350ms cubic-bezier(0.6, 0, 0.1, 1);
        }

        .pages__2jlej .dot__p50eg:first-of-type {
            margin-left: 0.6rem;
        }

        .pages__2jlej .dot__p50eg:last-of-type {
            margin-right: 0.6rem;
        }

        .pages__2jlej .blackDot__TTF7k {
            cursor: pointer;
            margin: 0.45rem 0.25rem;
            display: block;
            width: 0.6rem;
            height: 0.6rem;
            border-radius: 1.2rem;
            -webkit-transition: opacity 350ms cubic-bezier(0.6, 0, 0.1, 1), width 350ms cubic-bezier(0.6, 0, 0.1, 1), -webkit-transform 350ms cubic-bezier(0.6, 0, 0.1, 1);
            transition: opacity 350ms cubic-bezier(0.6, 0, 0.1, 1), width 350ms cubic-bezier(0.6, 0, 0.1, 1), -webkit-transform 350ms cubic-bezier(0.6, 0, 0.1, 1);
            transition: transform 350ms cubic-bezier(0.6, 0, 0.1, 1), opacity 350ms cubic-bezier(0.6, 0, 0.1, 1), width 350ms cubic-bezier(0.6, 0, 0.1, 1);
            transition: transform 350ms cubic-bezier(0.6, 0, 0.1, 1), opacity 350ms cubic-bezier(0.6, 0, 0.1, 1), width 350ms cubic-bezier(0.6, 0, 0.1, 1), -webkit-transform 350ms cubic-bezier(0.6, 0, 0.1, 1);
            cursor: initial;
            width: 1rem;
            background: black;
        }

        .pages__2jlej .blackDot__TTF7k:first-of-type {
            margin-left: 0.6rem;
        }

        .pages__2jlej .blackDot__TTF7k:last-of-type {
            margin-right: 0.6rem;
        }

        .pages__2jlej .whiteDot__3iAb5 {
            cursor: pointer;
            margin: 0.45rem 0.25rem;
            display: block;
            width: 0.6rem;
            height: 0.6rem;
            border-radius: 1.2rem;
            background: black;
            -webkit-transition: opacity 350ms cubic-bezier(0.6, 0, 0.1, 1), width 350ms cubic-bezier(0.6, 0, 0.1, 1), -webkit-transform 350ms cubic-bezier(0.6, 0, 0.1, 1);
            transition: opacity 350ms cubic-bezier(0.6, 0, 0.1, 1), width 350ms cubic-bezier(0.6, 0, 0.1, 1), -webkit-transform 350ms cubic-bezier(0.6, 0, 0.1, 1);
            transition: transform 350ms cubic-bezier(0.6, 0, 0.1, 1), opacity 350ms cubic-bezier(0.6, 0, 0.1, 1), width 350ms cubic-bezier(0.6, 0, 0.1, 1);
            transition: transform 350ms cubic-bezier(0.6, 0, 0.1, 1), opacity 350ms cubic-bezier(0.6, 0, 0.1, 1), width 350ms cubic-bezier(0.6, 0, 0.1, 1), -webkit-transform 350ms cubic-bezier(0.6, 0, 0.1, 1);
            background: #999;
        }

        .pages__2jlej .whiteDot__3iAb5:first-of-type {
            margin-left: 0.6rem;
        }

        .pages__2jlej .whiteDot__3iAb5:last-of-type {
            margin-right: 0.6rem;
        }

        .pages__2jlej .whiteDot__3iAb5:hover {
            opacity: 0.8 !important;
            -webkit-transform: scale(1.1) !important;
            transform: scale(1.1) !important;
        }

        .pages__2jlej .whiteDot__3iAb5:active {
            opacity: 1 !important;
            -webkit-transform: scale(1) !important;
            transform: scale(1) !important;
        }
    </style>
    <style type="text/css">
        /* 与 anim.js 同步 */
        .imageLayer__1NyU2 {
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            -webkit-transition: opacity 350ms cubic-bezier(0.6, 0, 0.1, 1), -webkit-transform 350ms cubic-bezier(0.6, 0, 0.1, 1), -webkit-clip-path 350ms cubic-bezier(0.6, 0, 0.1, 1);
            transition: opacity 350ms cubic-bezier(0.6, 0, 0.1, 1), -webkit-transform 350ms cubic-bezier(0.6, 0, 0.1, 1), -webkit-clip-path 350ms cubic-bezier(0.6, 0, 0.1, 1);
            transition: transform 350ms cubic-bezier(0.6, 0, 0.1, 1), opacity 350ms cubic-bezier(0.6, 0, 0.1, 1), clip-path 350ms cubic-bezier(0.6, 0, 0.1, 1);
            transition: transform 350ms cubic-bezier(0.6, 0, 0.1, 1), opacity 350ms cubic-bezier(0.6, 0, 0.1, 1), clip-path 350ms cubic-bezier(0.6, 0, 0.1, 1), -webkit-transform 350ms cubic-bezier(0.6, 0, 0.1, 1), -webkit-clip-path 350ms cubic-bezier(0.6, 0, 0.1, 1);
            position: absolute;
            left: 50%;
            top: 50%;
            will-change: transform, top, opacity, clip-path;
        }

        .imageLayer__1NyU2.zooming__3TFmo {
            -webkit-transition-timing-function: cubic-bezier(0, 0.1, 0.1, 1);
            transition-timing-function: cubic-bezier(0, 0.1, 0.1, 1);
            transition-duration: 0ms;
        }

        .imageLayer__1NyU2.invalidate__1wygJ {
            opacity: 0 !important;
            pointer-events: none;
        }
    </style>
    <style type="text/css">
        /* 与 anim.js 同步 */
        .loadingContainer__33QBo {
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            position: absolute;
            left: 50%;
            top: 50%;
            opacity: 0;
            -webkit-transition: opacity cubic-bezier(0.6, 0, 0.1, 1) 175ms;
            transition: opacity cubic-bezier(0.6, 0, 0.1, 1) 175ms;
        }

        .loadingContainer__33QBo.show__1Bu8R {
            opacity: 1;
        }

        .loadingContainer__33QBo .reload__3KDuO {
            border: 2px solid;
            border-radius: 5px;
            font-size: 1rem;
            padding: 0.5rem;
            cursor: pointer;
            outline: none;
            -webkit-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
        }

        .loadingContainer__33QBo .reload__3KDuO:hover {
            opacity: 0.8;
        }

        .loadingContainer__33QBo .reload__3KDuO:hover svg {
            -webkit-transform: rotate(30deg);
            transform: rotate(30deg);
        }

        .loadingContainer__33QBo .reload__3KDuO:active {
            opacity: 1;
        }

        .loadingContainer__33QBo .reload__3KDuO svg {
            display: block;
            -webkit-transition: -webkit-transform 350ms cubic-bezier(0.6, 0, 0.1, 1);
            transition: -webkit-transform 350ms cubic-bezier(0.6, 0, 0.1, 1);
            transition: transform 350ms cubic-bezier(0.6, 0, 0.1, 1);
            transition: transform 350ms cubic-bezier(0.6, 0, 0.1, 1), -webkit-transform 350ms cubic-bezier(0.6, 0, 0.1, 1);
        }

        .loadingContainer__33QBo .loading__3UcNS {
            width: 24px;
            height: 24px;
            -webkit-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
            -webkit-animation: spin__2VDbe 1s linear infinite;
            animation: spin__2VDbe 1s linear infinite;
        }

        @-webkit-keyframes fadeIn__3TpcC {
            0% {
                opacity: 0;
            }

            50% {
                opacity: 0;
            }

            100% {
                opacity: 1;
            }
        }

        @keyframes fadeIn__3TpcC {
            0% {
                opacity: 0;
            }

            50% {
                opacity: 0;
            }

            100% {
                opacity: 1;
            }
        }

        @-webkit-keyframes fadeOut__9PHOR {
            0% {
                opacity: 1;
            }

            50% {
                opacity: 0;
            }

            100% {
                opacity: 0;
            }
        }

        @keyframes fadeOut__9PHOR {
            0% {
                opacity: 1;
            }

            50% {
                opacity: 0;
            }

            100% {
                opacity: 0;
            }
        }

        @-webkit-keyframes spin__2VDbe {
            0% {
                -webkit-transform: translate(-50%, -50%) rotate(0deg);
                transform: translate(-50%, -50%) rotate(0deg);
            }

            100% {
                -webkit-transform: translate(-50%, -50%) rotate(360deg);
                transform: translate(-50%, -50%) rotate(360deg);
            }
        }

        @keyframes spin__2VDbe {
            0% {
                -webkit-transform: translate(-50%, -50%) rotate(0deg);
                transform: translate(-50%, -50%) rotate(0deg);
            }

            100% {
                -webkit-transform: translate(-50%, -50%) rotate(360deg);
                transform: translate(-50%, -50%) rotate(360deg);
            }
        }
    </style>
    <style type="text/css">
        /* 与 anim.js 同步 */
        .backgroundLayer__36t43 {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            cursor: -webkit-zoom-out;
            cursor: zoom-out;
            background-color: #ffffff;
            -webkit-transition: opacity 0.2s;
            transition: opacity 0.2s;
            will-change: opacity;
            -webkit-tap-highlight-color: transparent;
        }
    </style>
    <style type="text/css">
        .image-slides-overlay {
            position: fixed;
            top: 0;
            left: 0;
            z-index: 999;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.9);
        }
    </style>
    <style type="text/css">
        @-webkit-keyframes line-scale-pulse-out {
            0% {
                transform: scaleY(1);
            }

            50% {
                transform: scaleY(0.4);
            }

            100% {
                transform: scaleY(1);
            }
        }

        @keyframes line-scale-pulse-out {
            0% {
                transform: scaleY(1);
            }

            50% {
                transform: scaleY(0.4);
            }

            100% {
                transform: scaleY(1);
            }
        }

        .image-slides-loading>div {
            display: inline-block;
            width: 4px;
            height: 35px;
            margin: 2px;
            border-radius: 2px;
            background-color: #fff;
            -webkit-animation: line-scale-pulse-out 0.9s -0.6s infinite cubic-bezier(0.85, 0.25, 0.37, 0.85);
            animation: line-scale-pulse-out 0.9s -0.6s infinite cubic-bezier(0.85, 0.25, 0.37, 0.85);
            -webkit-animation-fill-mode: both;
            animation-fill-mode: both
        }

        .image-slides-loading>div:nth-child(2),
        .image-slides-loading>div:nth-child(4) {
            -webkit-animation-delay: -0.4s !important;
            animation-delay: -0.4s !important;
        }

        .image-slides-loading>div:nth-child(1),
        .image-slides-loading>div:nth-child(5) {
            -webkit-animation-delay: -0.2s !important;
            animation-delay: -0.2s !important;
        }

        .image-slides-view-port {
            overflow: hidden;
            width: 100%;
            height: 100%;
            background-color: #000;
            touch-action: none;
        }

        .image-slides-container {
            display: inline-block;
            position: relative;
            overflow: visible;
            width: 100%;
            height: 100%;
            white-space: nowrap;
            will-change: transform;
            touch-action: none;
        }

        .image-slides-close {
            position: absolute;
            top: 10px;
            right: 10px;
            z-index: 100;
            padding-top: 6px;
            border: 0;
            border-radius: 2px;
            outline: none;
            background-color: rgba(0, 0, 0, 0.15);
            cursor: pointer;
        }

        .image-slides-blackboard {
            display: inline-flex;
            position: relative;
            overflow: hidden;
            align-items: center;
            justify-content: center;
            width: 100%;
            height: 100%;
            margin-right: 10px;
            text-align: center;
            vertical-align: middle;
        }

        .image-slides-content {
            will-change: transform;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        .image-slides-page-button {
            position: absolute;
            top: 50%;
            z-index: 100;
            width: 32px;
            height: 75px;
            border: none;
            border-radius: 2px;
            outline: none;
            background: rgba(100, 100, 100, 0.2);
            transform: translateY(-50%);
            cursor: pointer;
        }

        .image-slides-page-button svg {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .image-slides-prev {
            left: 0;
        }

        .image-slides-next {
            right: 0;
        }

        .css-tq0shg {
            box-sizing: border-box;
            margin: 0px;
            min-width: 0px;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
    </style>
    <style data-emotion="css"></style>
    <style data-emotion="css"></style><iframe hidden=""></iframe>
    <link rel="stylesheet" type="text/css" href="https://bin.bnbstatic.com/uc/v3/static/css/a4c009d0.chunk.css">
    <title>Dashboard - WeCoin Trade</title>
</head>

<body dir="ltr" style="overflow: auto; position: static;"><svg aria-hidden="true"
        style="position: absolute; width: 0px; height: 0px; overflow: hidden;">
        
    </svg>
    <div id="__APP">

        <div class="css-tq0shg">
            <header class="css-1rj0lsg">&nbsp;&nbsp;&nbsp;<a href="https://www.Wecoin Trade.com/en">
                    <img src="/wecoin/logo.png">
                </a>

                <div class="css-1w2cmbz"><span class="hoverstatus css-1qqh4qo">&nbsp;&nbsp;&nbsp;&nbsp;Buy Crypto<div
                            class="css-1rktosy">USD
                        </div><svg xmlns="http://www.w3.org/2000/svg" class="icon-dropdown-arrow css-qy1c27"
                            fill="currentColor">
                            <use xlink:href="#icon-h-dropdown-arrow"></use>
                        </svg></span></div><a target="_self" id="ba-tableMarkets"
                    href="https://www.Wecoin Trade.com/en/markets" class="css-1ke7bwx">Market</a>
                <div class="dropdown"><a target="_self" id="ba-tableMarkets" href="https://www.Wecoin Trade.com/en/markets"
                    class="css-1ke7bwx">Live Trade</a>
                <div class="dropdown-content"><a href="/wecoin/user/spot/">Spot</a><a href="/wecoin/user/margin/">Margin</a></div></div>

                <div class="dropdown"><a target="_self" id="ba-tableMarkets" href="https://www.Wecoin Trade.com/en/markets"
                    class="css-1ke7bwx">Demo Trade</a>
                <div class="dropdown-content"><a href="/wecoin/user/spot/">Spot</a><a href="/wecoin/user/margin/">Margin</a></div></div>
                <div class="css-1h690ep"></div>
                    <div class="css-1h690ep"></div><div class="dropdown"><a id="header_login" href="../wecoin/login/" class="css-1ke7bwx">Wallet
                    </a><div class="dropdown-content"><a href="/wecoin/user/wallet/spot/">Spot Balance</a><a href="/wecoin/user/wallet/margin/">Margin Balance</a></div></div>
                    <div class="dropdown"><a href="../wecoin/register/" class="css-1ke7bwx">Orders</a><div class="dropdown-content"><a href="/wecoin/user/spot#openorder">Spot Order</a>
                        <a href="/wecoin/user/margin#openorder">Margin Order</a></div></div>

                    <div class="dropdown"><a href="/wecoin/user/profile.html" class="css-1ke7bwx"><img src="/wecoin/profile.png" height="20"
                        width="20" /></a><div class="dropdown-content"><a href="../user/">Dashboard
                    <br/><?php echo $email; ?></a>
                            <a href="../user/">Fee Structure</a><a href="../user/logout.php">Logout</a></div></div>
                <div class="css-109r71v">
                    <div style="display:none">
                        <div class="css-yu8bgj">
                            <div class="css-1wkenai">
                                <div class="css-mgi5dh"><canvas style="height:124px;width:124px" height="124"
                                        width="124"></canvas><img
                                        src="data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjAiIGhlaWdodD0iMjAiIHZpZXdCb3g9IjAgMCAyMCAyMCIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPHBhdGggZmlsbC1ydWxlPSJldmVub2RkIiBjbGlwLXJ1bGU9ImV2ZW5vZGQiIGQ9Ik0xOCA2Ljk4MzA1QzE4IDYuNzkzMTEgMTguMDAwMSA2LjYwMzE1IDE3Ljk5ODkgNi40MTMxOUMxNy45OTggNi4yNTMxNyAxNy45OTYxIDYuMDkzMTkgMTcuOTkxOCA1LjkzMzI1QzE3Ljk4MjQgNS41ODQ2NSAxNy45NjE4IDUuMjMzMDYgMTcuODk5OCA0Ljg4ODM0QzE3LjgzNjkgNC41Mzg2NSAxNy43MzQzIDQuMjEzMiAxNy41NzI0IDMuODk1NDdDMTcuNDEzNCAzLjU4MzE4IDE3LjIwNTYgMy4yOTc0MSAxNi45NTc3IDMuMDQ5NjdDMTYuNzA5OCAyLjgwMTkyIDE2LjQyNCAyLjU5NDI3IDE2LjExMTYgMi40MzUzQzE1Ljc5MzUgMi4yNzM0NiAxNS40Njc3IDIuMTcwODEgMTUuMTE3NiAyLjEwNzk2QzE0Ljc3MjkgMi4wNDYwNiAxNC40MjEyIDIuMDI1NTMgMTQuMDcyNiAyLjAxNjEyQzEzLjkxMjUgMi4wMTE3OSAxMy43NTI1IDIuMDA5OTYgMTMuNTkyNCAyLjAwODk3QzEzLjQwMjMgMi4wMDc4MSAxMy4yMTIzIDIuMDA3OSAxMy4wMjIyIDIuMDA3OUwxMC44MTU1IDJIOS4xNjVMNi45OTczIDIuMDA3OUM2LjgwNjg4IDIuMDA3OSA2LjYxNjQ1IDIuMDA3ODEgNi40MjYwMyAyLjAwODk3QzYuMjY1NiAyLjAwOTk2IDYuMTA1MjUgMi4wMTE3OSA1Ljk0NDg4IDIuMDE2MTJDNS41OTU0NyAyLjAyNTUzIDUuMjQyOTkgMi4wNDYwOCA0Ljg5NzQyIDIuMTA4MDZDNC41NDY4NyAyLjE3MDg5IDQuMjIwNTkgMi4yNzM0OSAzLjkwMjEgMi40MzUyMkMzLjU4OTA0IDIuNTk0MjEgMy4zMDI1NyAyLjgwMTg4IDMuMDU0MTkgMy4wNDk2N0MyLjgwNTg0IDMuMjk3MzkgMi41OTc2NyAzLjU4MzEgMi40MzgzMSAzLjg5NTMzQzIuMjc2MDYgNC4yMTMyMiAyLjE3MzE4IDQuNTM4ODYgMi4xMTAxNSA0Ljg4ODc1QzIuMDQ4MSA1LjIzMzMzIDIuMDI3NTMgNS41ODQ4IDIuMDE4MDggNS45MzMyNUMyLjAxMzc3IDYuMDkzMjEgMi4wMTE5IDYuMjUzMTkgMi4wMTA5MyA2LjQxMzE5QzIuMDA5NzcgNi42MDMxNyAyIDYuODM5MTUgMiA3LjAyOTExTDIuMDAwMDYgOS4xNjY3N0wyIDEwLjgzNDlMMi4wMDk4NiAxMy4wMThDMi4wMDk4NiAxMy4yMDgyIDIuMDA5NzkgMTMuMzk4NCAyLjAxMDkzIDEzLjU4ODZDMi4wMTE5IDEzLjc0ODkgMi4wMTM3NyAxMy45MDkxIDIuMDE4MSAxNC4wNjkyQzIuMDI3NTMgMTQuNDE4MyAyLjA0ODE0IDE0Ljc3MDQgMi4xMTAyNSAxNS4xMTU2QzIuMTczMjYgMTUuNDY1NyAyLjI3NjExIDE1Ljc5MTYgMi40MzgyMyAxNi4xMDk4QzIuNTk3NjEgMTYuNDIyNSAyLjgwNTgyIDE2LjcwODYgMy4wNTQxOSAxNi45NTY3QzMuMzAyNTUgMTcuMjA0OCAzLjU4ODk0IDE3LjQxMjggMy45MDE5NSAxNy41NzJDNC4yMjA2MiAxNy43MzQgNC41NDcwNyAxNy44MzY4IDQuODk3ODIgMTcuODk5N0M1LjI0MzI0IDE3Ljk2MTcgNS41OTU2IDE3Ljk4MjMgNS45NDQ4OCAxNy45OTE3QzYuMTA1MjUgMTcuOTk2IDYuMjY1NjIgMTcuOTk3OSA2LjQyNjA0IDE3Ljk5ODlDNi42MTY0NyAxOCA2LjgwNjg4IDE3Ljk5OTkgNi45OTczIDE3Ljk5OTlMOS4xODQ1OSAxOEgxMC44MzkyTDEzLjAyMjIgMTcuOTk5OUMxMy4yMTIzIDE3Ljk5OTkgMTMuNDAyMyAxOCAxMy41OTI0IDE3Ljk5ODlDMTMuNzUyNSAxNy45OTc5IDEzLjkxMjUgMTcuOTk2IDE0LjA3MjYgMTcuOTkxN0MxNC40MjEzIDE3Ljk4MjMgMTQuNzczMSAxNy45NjE3IDE1LjExOCAxNy44OTk3QzE1LjQ2NzkgMTcuODM2NyAxNS43OTM1IDE3LjczNCAxNi4xMTE0IDE3LjU3MkMxNi40MjM5IDE3LjQxMjggMTYuNzA5OCAxNy4yMDQ5IDE2Ljk1NzcgMTYuOTU2N0MxNy4yMDU2IDE2LjcwODcgMTcuNDEzMyAxNi40MjI2IDE3LjU3MjQgMTYuMTA5OUMxNy43MzQzIDE1Ljc5MTYgMTcuODM3IDE1LjQ2NTUgMTcuODk5OSAxNS4xMTUyQzE3Ljk2MTggMTQuNzcwMSAxNy45ODI0IDE0LjQxODEgMTcuOTkxOCAxNC4wNjkyQzE3Ljk5NjEgMTMuOTA5IDE3Ljk5OCAxMy43NDg5IDE3Ljk5ODkgMTMuNTg4NkMxOC4wMDAxIDEzLjM5ODQgMTggMTMuMjA4MiAxOCAxMy4wMThDMTggMTMuMDE4IDE3Ljk5OTkgMTAuODczNSAxNy45OTk5IDEwLjgzNDlWOS4xNjUwMkMxNy45OTk5IDkuMTM2NTYgMTggNi45ODMwNSAxOCA2Ljk4MzA1IiBmaWxsPSIjMEIwRTExIi8+CjxwYXRoIGQ9Ik02LjYzMTIyIDkuOTk5ODhMNS4yMzU1OSA4LjYwNDI2TDMuODM5OTcgOS45OTk4OEw1LjIzNTU5IDExLjM5NTVMNi42MzEyMiA5Ljk5OTg4Wk05Ljk5OTk3IDEzLjM3ODNMMTIuMzg3IDEwLjk5MTNMMTMuNzgyNiAxMi4zODY5TDExLjM5NTYgMTQuNzY0M0w5Ljk5OTk3IDE2LjE1OTlMOC42MTM5NyAxNC43NjQzTDYuMjI2OTcgMTIuMzg2OUw3LjYyMjU5IDEwLjk5MTNMOS45OTk5NyAxMy4zNzgzWk0xNC43NjQzIDExLjM4NTlMMTMuMzc4MyA5Ljk5OTg4TDE0Ljc3NCA4LjYwNDI2TDE2LjE2IDkuOTk5ODhMMTQuNzY0MyAxMS4zODU5Wk05Ljk5OTk3IDYuNjIxNTFMNy42MTI5NyA5LjAwODUxTDYuMjI2OTcgNy42MTI4OEw4LjYxMzk3IDUuMjI1ODhMOS45OTk5NyAzLjgzOTg4TDExLjM5NTYgNS4yMzU1MUwxMy43ODI2IDcuNjIyNTFMMTIuMzg3IDkuMDA4NTFMOS45OTk5NyA2LjYyMTUxWk05Ljk5OTk3IDguNjEzODhMMTEuMzk1NiA5Ljk5OTg4TDkuOTk5OTcgMTEuMzk1NUw4LjYxMzk3IDkuOTk5ODhMOS45OTk5NyA4LjYxMzg4WiIgZmlsbD0idXJsKCNwYWludDBfbGluZWFyKSIvPgo8cmVjdCB4PSIxIiB5PSIxIiB3aWR0aD0iMTgiIGhlaWdodD0iMTgiIHJ4PSI1IiBzdHJva2U9IndoaXRlIiBzdHJva2Utd2lkdGg9IjIiLz4KPGRlZnM+CjxsaW5lYXJHcmFkaWVudCBpZD0icGFpbnQwX2xpbmVhciIgeDE9IjkuOTk5OTciIHkxPSIxNi4xNTk5IiB4Mj0iOS45OTk5NyIgeTI9IjMuODM5ODgiIGdyYWRpZW50VW5pdHM9InVzZXJTcGFjZU9uVXNlIj4KPHN0b3Agc3RvcC1jb2xvcj0iI0YwQjkwQiIvPgo8c3RvcCBvZmZzZXQ9IjEiIHN0b3AtY29sb3I9IiNGOEQzM0EiLz4KPC9saW5lYXJHcmFkaWVudD4KPC9kZWZzPgo8L3N2Zz4K"
                                        class="css-um0za2"></div>
                                <div class="css-i8jtky">Scan to Download App IOS &amp; Android</div>
                                <div class="css-a3aj8l"></div><a href="https://www.Wecoin Trade.com/en/download"
                                    class="css-17f30nx"><button data-bn-type="button" class=" css-1xiq7m8">More Download
                                        Options</button></a>
                            </div>
                        </div>
                    </div><a class="css-g73q87"></a>
                </div>
                <div class="hoverstatus css-6ok8fu">
                    <div class="css-1se4h0w">English</div>
                    <div class="css-1xuvfhq"></div>
                    <div class="css-1se4h0w">USD</div>
                </div>
            </header>
            <main class="css-1wr4jig">
                <main class="css-xry4yv">

                    <div class="css-3miali"><a data-bn-type="link" class="css-z87e9z" href="/wecoin/user/">
                            <div class="css-10j588g"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                    fill="none" class="css-14thuu2">
                                    <path
                                        d="M12 11.673c1.914 0 3.465-1.494 3.465-3.337C15.465 6.494 13.914 5 12 5S8.535 6.494 8.535 8.336c0 1.843 1.551 3.337 3.465 3.337zM15.089 13.008H8.91c-2.161 0-3.9 1.673-3.911 3.755v3.03h14v-3.03c-.012-2.082-1.75-3.755-3.911-3.755zm1.562 4.524H7.349v-.77c.012-.825.705-1.492 1.562-1.492h6.178c.857 0 1.55.667 1.562 1.492v.77z"
                                        fill="currentColor"></path>
                                </svg>
                                <div data-bn-type="text" class="css-iizq59">Dashboard</div>
                            </div>
                        </a><a data-bn-type="link" href="/wecoin/user/payment" class="css-6ijtmk">
                            <div class="css-10j588g"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                    fill="none" class="css-hd27fe">
                                    <g clip-path="url(#sidebar-payment-s24_svg__clip0)" fill="currentColor">
                                        <path
                                            d="M12.589 11.251v-1.88a2.17 2.17 0 011.15.688l.031.032 1.126-1.024-.024-.032a3.208 3.208 0 00-2.14-1.065V6.858h-1.42V7.97c-1.486.184-2.332 1.008-2.332 2.273 0 1.208.806 1.968 2.483 2.32v2.05a2.724 2.724 0 01-1.589-.873l-.032-.024-1.086.992-.032.024.032.032a3.781 3.781 0 002.555 1.249V17.1h1.421v-1.136a2.448 2.448 0 001.624-.765 2.457 2.457 0 00.668-1.668c0-1.185-.75-1.889-2.435-2.28zm.734 2.417a.938.938 0 01-.734.912v-1.76c.654.216.734.584.734.848zm-1.86-2.673c-.559-.168-.783-.392-.783-.8 0-.456.256-.728.783-.848v1.648z">
                                        </path>
                                        <path
                                            d="M11.973 5.6c1.263 0 2.497.376 3.547 1.079a6.397 6.397 0 012.352 2.872 6.413 6.413 0 01-1.384 6.974 6.38 6.38 0 01-6.958 1.387 6.388 6.388 0 01-2.866-2.357A6.41 6.41 0 015.588 12 6.414 6.414 0 017.46 7.477 6.385 6.385 0 0111.973 5.6zm0-1.6a7.97 7.97 0 00-4.435 1.348 7.996 7.996 0 00-2.94 3.59 8.017 8.017 0 001.73 8.719 7.965 7.965 0 008.699 1.734 7.985 7.985 0 003.583-2.946 8.013 8.013 0 00-.993-10.102A7.98 7.98 0 0011.973 4z">
                                        </path>
                                    </g>
                                    <defs>
                                        <clipPath id="sidebar-payment-s24_svg__clip0">
                                            <path fill="#fff" d="M0 0h24v24H0z"></path>
                                        </clipPath>
                                    </defs>
                                </svg>
                                <div data-bn-type="text" class="css-1n0484q">Payment</div>
                            </div>
                        </a><a data-bn-type="link" href="/wecoin/user/security" class="css-6ijtmk">
                            <div class="css-10j588g"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                    fill="none" class="css-hd27fe">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M4 5h16v9.58l-8 4.572-8-4.572V5zm2 2v6.42l6 3.428 6-3.428V7H6z"
                                        fill="currentColor"></path>
                                </svg>
                                <div data-bn-type="text" class="css-1n0484q">Security</div>
                            </div>
                        </a>

                        <a data-bn-type="link" href="/wecoin/user/settings" class="css-6ijtmk">
                            <div class="css-10j588g"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                    fill="none" class="css-hd27fe">
                                    <path
                                        d="M20 10.982v2.036h-3v1.659h-2v-1.66H4v-2.035h11V9.333h2v1.65h3zM4 7.695V5.659h3V4h2v1.659h11v2.036H9v1.649H7v-1.65H4zM20 16.316v2.035h-7V20h-2v-1.649H4v-2.035h7v-1.66h2v1.66h7z"
                                        fill="currentColor"></path>
                                </svg>
                                <div data-bn-type="text" class="css-1n0484q">Settings</div>
                            </div>
                        </a>
                        <a data-bn-type="link" href="/wecoin/user/tps" class="css-6ijtmk">
                            <div class="css-10j588g"><img style="width:28px;height:28px; margin-left: 8px;" src="https://img.icons8.com/carbon-copy/100/000000/bot.png"/>
                                <div data-bn-type="text" class="css-1n0484q">Third-Party Software</div>
                            </div>
                        </a>
                        <a data-bn-type="link" href="/wecoin/user/referrals" rel="noopener noreferrer"
                            class="css-6ijtmk">
                            <div class="css-10j588g"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                    fill="none" class="css-hd27fe">
                                    <path
                                        d="M18.554 13.309H16.49v-2.346h-2.446V8.976h2.446V6.62h2.064v2.356H21v1.987h-2.446v2.346zM9.151 10.864c1.682 0 3.045-1.313 3.045-2.932C12.196 6.312 10.833 5 9.151 5 7.47 5 6.107 6.313 6.107 7.932c0 1.62 1.363 2.932 3.044 2.932zM11.866 12.037h-5.43c-1.898 0-3.426 1.47-3.436 3.3V18h12.303v-2.664c-.01-1.828-1.538-3.3-3.437-3.3zm1.373 3.975H5.063v-.676c.01-.725.62-1.312 1.373-1.312h5.429c.753 0 1.362.587 1.373 1.312v.676z"
                                        fill="currentColor"></path>
                                </svg>
                                <div data-bn-type="text" class="css-1n0484q">Referral</div>
                            </div>
                        </a>
                    </div>
                    <div class="css-160vccy">
                        <div class="css-146q23">
                            <div class="css-1e6doj4">
                                <div class="css-6vt7sa">-</div>
                                <div class="css-1sgz1lk">
                                    <div class="css-ize0sl">
                                        <div class="css-1124n14">Welcome, <?=$_SESSION['fname'];?>!</div>
                                        <div class="css-1uoge8i">
                                            <div class="css-180eiyx">
                                                <div data-bn-type="text" class="css-1ap5wc6">User ID: </div><?=$_SESSION['userid'];?>
                                            </div>
                                        </div>
                                       
                                        
                                    </div>
                                    <div class="css-1ry7rnu">
                                        <div data-bn-type="text" class="css-9cwl6c">Last login time - <?=$_SESSION['lastlogin'];?>
                                        </div>
                                       
                                    </div>
                                </div>
                            </div>
                        </div>
                      
                        <div class="css-jlbk6n">
                            <div class="css-kvkii2">
                                <div class="css-1p01izn">
                                    <div class="css-1hythwr">
                                        <div class="css-1hz1mz6">
                                            <div class="css-5x6ly7">
                                                <div class="css-5x6ly7"><a data-bn-type="link"
                                                        href=""
                                                        id="click_dashboard_balance_details_balance"
                                                        class="css-181kvgz">Balance Details</a></div>
                                                <div class="css-10nf7hq">
                                                    <div class="css-4cffwv">
                                                        <div class="css-noqr05">
                                                            <button data-bn-type="button"
                               onclick="window.location.href='../user/payment';"    id="click_dashboard_balance_details_deposit"
                                                                class=" css-d732j0">Deposit</button><button
                                                                data-bn-type="button"
                                onclick="window.location.href='../user/payment/withdrawal';"                                   id="click_dashboard_balance_details_withdraw"
                                                                class=" css-1dfql01">Withdraw</button>
                                                                </div>
                                                    </div><a data-bn-type="link" href="/wecoin/user/wallet/exchange/balance"
                                                        id="click_dashboard_balance_details_balance"
                                                        class="css-1s6nhe2"><svg xmlns="http://www.w3.org/2000/svg"
                                                            viewBox="0 0 24 24" fill="none" class="mirror css-155meta">
                                                            <path
                                                                d="M14.65 12.24l-4.24 4.24L9 15.06l2.82-2.82L9 9.42 10.41 8l4.24 4.24z"
                                                                fill="currentColor"></path>
                                                        </svg></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="css-vurnku">
                                            <div class="css-4sk89q">
                                                <a href="/wecoin/user/">  <div id="tab-mainbalance" class="css-yv6506">
                                                    <div class="active css-d3ui9e">Main Balance</div>
                                                </div></a>
                                              <a href="/wecoin/user/wallet/spot">  <div id="tab-spot" class="css-yv6506">
                                                    <div class="css-d3ui9e">Spot</div>
                                                </div></a>
                                                <a href="/wecoin/user/wallet/margin"> <div id="tab-margin" class="css-yv6506">
                                                    <div class=" css-d3ui9e">Margin</div>
                                                </div></a>
                                                
                                            </div>
                                            <div class="css-gnqbje">
                                                <div class="css-ysetcg">
                                                    <div class="css-ct0qa6">
                                                        <div class="css-1bliacb">
                                                            <div class="css-vurnku">
                                                                <div class="css-1f978ju">
                                                                    <div class="css-ize0sl"><span data-bn-type="text"
                                                                            dir="ltr" class="css-1kbdyxh">Account
                                                                            balance: &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;</span>
                                                                            <span data-bn-type="text"
                                                                            dir="ltr" class="css-1kbdyxh" style="text-align:right !important;"> Demo
                                                                            balance: </span></div>
                                                                    <div class="css-n5mzgu">
                                                                        <div dir="ltr" class="css-off8uh">
                                                                            <div data-bn-type="text"
                                                                                class="css-1t9tl2o"><span>$</span><?=$_SESSION['mainbalance'] ?><span style="font-size:12px;">&emsp;<?php echo $btcval; echo 'BTC';?></span>&emsp;&emsp;&emsp;&emsp;&emsp;</div>

                                                                                <div data-bn-type="text"
                                                                                class="css-1t9tl2o" style="text-align:right;"><span >$</span><?=$_SESSION['demobalance']?><span style="font-size:12px;">&emsp;<?php echo $btcdemo; echo 'BTC';?></span></div>
                                                                            <div style="width: 4px;"></div>
                                                                            
                                                                        </div>
                                                                    </div>
<br/>
<br/>
<br/>
<div style="display:flex;">
                                                                    <form action="" onkeydown="return event.key != 'Enter';" method="post" >
                                                                    <div class="css-n5mzgu">
                                                                        <div dir="ltr" class="css-off8uh">
                                                                            <div data-bn-type="text"
                                                                                class="css-1t9tl2o" style="font-size:13px; !important;"><input name="maininput" step="0.01" required="required" type="number">  &emsp; &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;</div>

                                                                               
                                                                            
                                                                        </div>
                                                                    </div>
                                                                    <br/>
<br/>

                                                                    <div class="css-n5mzgu">
                                                                        <div dir="ltr" class="css-off8uh">
                                                                            <div data-bn-type="text"
                                                                                class="css-1t9tl2o" style="font-size:11px; !important;"><button type="submit" name="tspotmain"><b>Transfer to Spot</b></button>&emsp;&emsp; &emsp;&emsp;&emsp;&emsp;&emsp; &emsp;&emsp;&emsp;&emsp;&emsp; &emsp;&emsp;&emsp;</div>

                                                                              
                                                                            
                                                                        </div>
                                                                    </div>
                                                                    <br/>
<br/>

                                                                    <div class="css-n5mzgu">
                                                                        <div dir="ltr" class="css-off8uh">
                                                                            <div data-bn-type="text"
                                                                                class="css-1t9tl2o" style="font-size:11px; !important;"><button type="submit" name="tmarginmain"><b> Transfer to Margin</b></button>&nbsp;&nbsp;&emsp; &emsp;&emsp;&emsp;</div>

                                                                                
                                                                            
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                                <form action="" onkeydown="return event.key != 'Enter';" method="post">
                                                                    <div class="css-n5mzgu">
                                                                        <div dir="ltr" class="css-off8uh">
                                                                            <div data-bn-type="text"
                                                                                class="css-1t9tl2o" style="font-size:13px; !important;"><input step="0.01" name="demoinput" required="required" type="number"> &emsp;&emsp;&emsp;</div>

                                                                               
                                                                            
                                                                        </div>
                                                                    </div>
                                                                    <br/>
<br/>

                                                                    <div class="css-n5mzgu">
                                                                        <div dir="ltr" class="css-off8uh">
                                                                            <div data-bn-type="text"
                                                                                class="css-1t9tl2o" style="font-size:11px; !important;"><button type="submit" name="tspotdemo"><b>Transfer to Spot</b></button>&emsp;&emsp; &emsp;&emsp;&emsp;</div>

                                                                              
                                                                            
                                                                        </div>
                                                                    </div>
                                                                    <br/>
<br/>

                                                                    <div class="css-n5mzgu">
                                                                        <div dir="ltr" class="css-off8uh">
                                                                            <div data-bn-type="text"
                                                                                class="css-1t9tl2o" style="font-size:11px; !important;"><button type="submit" name="tmargindemo"> <b>Transfer to Margin</b></button>&nbsp;&nbsp;&emsp; &emsp;&emsp;&emsp;</div>

                                                                                
                                                                            
                                                                        </div>
                                                                    </div>
                                                                </form>
    </div>
                                                                </div>
                                                                <div class="css-jmlio4">
                                                                    <div class="css-2psl">
                                                                        
                                                                            
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                       
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="css-1bzb8nq"></div>
                                            <div class="css-1bzb8nq"></div>
                                            <div class="css-1bzb8nq"></div>
                                            <div class="css-1bzb8nq"></div>
                                            <div class="css-1bzb8nq"></div>
                                            <div class="css-1bzb8nq"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                           
                            
                          
                            <div class="css-ei3nni">
                                <div class="css-1p01izn">
                                    <div class="css-1hythwr">
                                        <div class="css-hwv82q">
                                            <div class="css-5x6ly7">
                                                <div class="css-5x6ly7"><a data-bn-type="link"
                                                        href="/wecoin/user/orders/exchange/openorder"
                                                        id="click_dashboard_open_orders" class="css-181kvgz">Open
                                                        Orders</a></div>
                                                <div class="css-10nf7hq"><a data-bn-type="link"
                                                        href="/wecoin/user/orders/exchange/openorder"
                                                        id="click_dashboard_open_orders" class="css-1s6nhe2"><svg
                                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                            fill="none" class="mirror css-155meta">
                                                            <path
                                                                d="M14.65 12.24l-4.24 4.24L9 15.06l2.82-2.82L9 9.42 10.41 8l4.24 4.24z"
                                                                fill="currentColor"></path>
                                                        </svg></a></div>
                                            </div>
                                        </div>
                                        <div class="row">
                                                  <div class="col-md-12">
                                        <div class="css-1dcd6pv">
                                            <div class="css-1h690ep">
                                              
                                            <?php  
                echo "<table  class='table' style='font-size:12px !important;'>
                           <tr style='color: Black;'>";
                            
                      $tid = "Transaction ID";
                      $dt = "Date";
                      $ot = "OpenTime";
                      $pr  =" Pair";
                      $amt = " Amount";
                      $sts = " Status";
                      $ttp = " Trade Type";
                      $opt = "Options";
                      $querys = "SELECT * FROM `openorder` WHERE `email`='$email' "; //You don't need a ; like you do in SQL
                      $results = mysqli_query($conn,$querys);
                      $rows = 0;
                      echo" <th>" .$tid."</th> 
                               <th>" .$dt."</th> 
                               <th>".$ot."</th> 
                               <th>" .$pr."</th> 
                               <th>".$amt."</th> 
                                
                               <th>" .$sts."</th> 
                               <th>" .$ttp."</th> 
                               
                             
                                
                           
                           
                           </tr>";
                           
                           
                           
                            while($row = mysqli_fetch_array($results)){
                                $rows = $rows +1;
                                echo "<tr style='color:Black;'><td>".$row['Transaction ID']. "</td>
                                <td>" .$row['Date']."</td>
                                <td>".$row['Open Time']."</td>
                                <td>" .$row['Pair'] ."</td>
                                <td>$" . $row['Amount'] ."</td>
                                <td>"  .$row['Status'] ."</td>
                                <td>"  .$row['Trade Type']."</td>
                                <td>
                            
                               
                        </tr>";}
                        ?>

                            </table>          
                            </div>
                            </div>
                                                
                                            </div>
                                            
                                    </div>
                                </div>
                            </div>
                           
                        </div>
                    </div>
                </main>
            </main>
            <footer class="css-2qpcvm">
                <div class="css-kpar8n">
                    <div class="css-w7l0py">
                        <div class="css-1hc1bzm">
                            <div data-bn-type="text" class="css-1ofolr4">About Us</div>
                            <div class="css-1pysja1"></div>
                            <div data-bn-type="text" class="css-1ofolr4">+</div>
                        </div><a href="https://www.Wecoin Trade.com/en/about" class="css-1myvhw3">
                            <div data-bn-type="text" class="css-1cjl26j">About
                                <!-- -->
                            </div>
                        </a><a href="https://www.Wecoin Trade.com/en/career" class="css-1myvhw3">
                            <div data-bn-type="text" class="css-1cjl26j">Careers
                                <!-- -->
                            </div>
                        </a><a href="https://www.Wecoin Trade.com/en/about#email" class="css-1myvhw3">
                            <div data-bn-type="text" class="css-1cjl26j">Business Contacts
                                <!-- -->
                            </div>
                        </a><a href="https://www.Wecoin Trade.com/en/community" class="css-1myvhw3">
                            <div data-bn-type="text" class="css-1cjl26j">Community
                                <!-- -->
                            </div>
                        </a><a href="https://www.Wecoin Trade.com/en/blog" class="css-1myvhw3">
                            <div data-bn-type="text" class="css-1cjl26j">Wecoin Trade Blog
                                <!-- -->
                            </div>
                        </a><a href="https://www.Wecoin Trade.com/en/terms" class="css-1myvhw3">
                            <div data-bn-type="text" class="css-1cjl26j">Terms
                                <!-- -->
                            </div>
                        </a><a href="https://www.Wecoin Trade.com/en/privacy" class="css-1myvhw3">
                            <div data-bn-type="text" class="css-1cjl26j">Privacy
                                <!-- -->
                            </div>
                        </a><a href="https://www.Wecoin Trade.com/en/support/announcement" class="css-1myvhw3">
                            <div data-bn-type="text" class="css-1cjl26j">Announcements
                                <!-- -->
                            </div>
                        </a><a href="https://www.Wecoin Trade.com/en/news" class="css-1myvhw3">
                            <div data-bn-type="text" class="css-1cjl26j">News
                                <!-- -->
                            </div>
                        </a>
                    </div>

                    <div class="css-w7l0py">
                        <div class="css-1hc1bzm">
                            <div data-bn-type="text" class="css-1ofolr4">Service</div>
                            <div class="css-1pysja1"></div>
                            <div data-bn-type="text" class="css-1ofolr4">+</div>
                        </div><a href="https://www.Wecoin Trade.com/en/download" class="css-1myvhw3">
                            <div data-bn-type="text" class="css-1cjl26j">Downloads
                                <!-- -->
                            </div>
                        </a><a href="https://www.Wecoin Trade.com/en/buy-sell-crypto" class="css-1myvhw3">
                            <div data-bn-type="text" class="css-1cjl26j">Buy Crypto
                                <!-- -->
                            </div>
                        </a><a href="https://www.Wecoin Trade.com/en/fee/schedule" class="css-1myvhw3">
                            <div data-bn-type="text" class="css-1cjl26j">Fees
                                <!-- -->
                            </div>
                        </a><a href="https://www.Wecoin Trade.com/en/vip-institutional-services" class="css-1myvhw3">
                            <div data-bn-type="text" class="css-1cjl26j">Institutional Services
                                <!-- -->
                            </div>
                        </a><a href="https://www.Wecoin Trade.com/en/activity/referral" class="css-1myvhw3">
                            <div data-bn-type="text" class="css-1cjl26j">Referral
                                <!-- -->
                            </div>
                        </a><a href="https://www.Wecoin Trade.com/en/bnb" class="css-1myvhw3">
                            <div data-bn-type="text" class="css-1cjl26j">BNB
                                <!-- -->
                            </div>
                        </a><a href="https://www.Wecoin Trade.com/en/busd" class="css-1myvhw3">
                            <div data-bn-type="text" class="css-1cjl26j">Buy BUSD
                                <!-- -->
                            </div>
                        </a><a href="https:///www.Wecoin Trade.com/en/otc-trading" class="css-1myvhw3">
                            <div data-bn-type="text" class="css-1cjl26j">OTC Trading
                                <!-- -->
                            </div>
                        </a><a href="https://www.Wecoin Trade.com/en/usercenter/coin-apply" class="css-1myvhw3">
                            <div data-bn-type="text" class="css-1cjl26j">Listing Application
                                <!-- -->
                            </div>
                        </a><a href="https://www.Wecoin Trade.com/en/trade-rule" class="css-1myvhw3">
                            <div data-bn-type="text" class="css-1cjl26j">Trading Rules
                                <!-- -->
                            </div>
                        </a><a
                            href="https://docs.google.com/forms/d/e/1FAIpQLSeeaZzHatVVE2TLLQoYIBLkuynbRpnsTK6Hs3IzkPf_0ZP7Aw/viewform?usp=sf_link"
                            class="css-1myvhw3">
                            <div data-bn-type="text" class="css-1cjl26j">Fiat Gateway Application
                                <!-- -->
                            </div>
                        </a><a href="https://www.Wecoin Trade.com/en/support/announcement/360039019631"
                            class="css-1myvhw3">
                            <div data-bn-type="text" class="css-1cjl26j">P2P Merchant Application
                                <!-- -->
                            </div>
                        </a><a href="https://www.Wecoin Trade.com/en/landing/data" class="css-1myvhw3">
                            <div data-bn-type="text" class="css-1cjl26j">Historical Market Data
                                <!-- -->
                            </div>
                        </a>
                    </div>
                    <div class="css-w7l0py">
                        <div class="css-1hc1bzm">
                            <div data-bn-type="text" class="css-1ofolr4">Support</div>
                            <div class="css-1pysja1"></div>
                            <div data-bn-type="text" class="css-1ofolr4">+</div>
                        </div><a href="https://www.Wecoin Trade.com/wecoin/user/user-support/feedback/entry"
                            class="css-1myvhw3">
                            <div data-bn-type="text" class="css-1cjl26j">Give Us Feedback
                                <!-- -->
                            </div>
                        </a><a href="https://www.Wecoin Trade.com/en/support" class="css-1myvhw3">
                            <div data-bn-type="text" class="css-1cjl26j">Support Center
                                <!-- -->
                            </div>
                        </a><a href="https://www.Wecoin Trade.com/en/chat" class="css-1myvhw3">
                            <div data-bn-type="text" class="css-1cjl26j">Submit a request
                                <!-- -->
                            </div>
                        </a><a href="https://Wecoin Trade-docs.github.io/apidocs/spot/en/" class="css-1myvhw3">
                            <div data-bn-type="text" class="css-1cjl26j">API Documentation
                                <!-- -->
                            </div>
                        </a><a href="https://www.Wecoin Trade.com/en/official-verification" class="css-1myvhw3">
                            <div data-bn-type="text" class="css-1cjl26j">Wecoin Trade Verify
                                <!-- -->
                            </div>
                        </a>
                    </div>
                    <div class="css-w7l0py">
                        <div class="css-1hc1bzm">
                            <div data-bn-type="text" class="css-1ofolr4">Learn</div>
                            <div class="css-1pysja1"></div>
                            <div data-bn-type="text" class="css-1ofolr4">+</div>
                        </div><a href="https://www.Wecoin Trade.com/en/buy-BNB" class="css-1myvhw3">
                            <div data-bn-type="text" class="css-1cjl26j">Buy BNB
                                <!-- -->
                            </div>
                        </a><a href="https://www.Wecoin Trade.com/en/buy-Bitcoin" class="css-1myvhw3">
                            <div data-bn-type="text" class="css-1cjl26j">Buy Bitcoin
                                <!-- -->
                            </div>
                        </a><a href="https://www.Wecoin Trade.com/en/buy-Ethereum" class="css-1myvhw3">
                            <div data-bn-type="text" class="css-1cjl26j">Buy Ethereum
                                <!-- -->
                            </div>
                        </a><a href="https://www.Wecoin Trade.com/en/buy-Ripple" class="css-1myvhw3">
                            <div data-bn-type="text" class="css-1cjl26j">Buy Ripple
                                <!-- -->
                            </div>
                        </a><a href="https://www.Wecoin Trade.com/en/buy-Litecoin" class="css-1myvhw3">
                            <div data-bn-type="text" class="css-1cjl26j">Buy Litecoin
                                <!-- -->
                            </div>
                        </a><a href="https://www.Wecoin Trade.com/en/buy-Bitcoin-Cash" class="css-1myvhw3">
                            <div data-bn-type="text" class="css-1cjl26j">Buy Bitcoin Cash
                                <!-- -->
                            </div>
                        </a><a href="https://www.Wecoin Trade.com/en/buy-Dogecoin-Doge" class="css-1myvhw3">
                            <div data-bn-type="text" class="css-1cjl26j">Buy Dogecoin
                                <!-- -->
                            </div>
                        </a><a href="https://www.Wecoin Trade.com/en/buy-DeFi-tokens" class="css-1myvhw3">
                            <div data-bn-type="text" class="css-1cjl26j">Buy DeFi
                                <!-- -->
                            </div>
                        </a>
                    </div>
                </div>
                <div class="css-1tr0qpm">
                    <div class="css-138yzuf">
                        <div class="css-19ph8gz">
                            <div class="css-vurnku">
                                <div data-bn-type="text" class="css-1jsf87b">Resources</div><a
                                    href="https://www.Wecoin Trade.com/en/about" class="css-1myvhw3">
                                    <div data-bn-type="text" class="css-1cjl26j">Terms & Conditions
                                        <!-- -->
                                    </div>
                                </a><a href="https://www.Wecoin Trade.com/en/career" class="css-1myvhw3">
                                    <div data-bn-type="text" class="css-1cjl26j">Refund Policy
                                        <!-- -->
                                    </div>
                                </a><a href="https://www.Wecoin Trade.com/en/about#email" class="css-1myvhw3">
                                    <div data-bn-type="text" class="css-1cjl26j">Privacy Policy
                                        <!-- -->
                                    </div>
                                </a><a href="https://www.Wecoin Trade.com/en/community" class="css-1myvhw3">
                                    <div data-bn-type="text" class="css-1cjl26j">Policy & Resources
                                        <!-- -->
                                    </div>
                                </a><a href="https://www.Wecoin Trade.com/en/blog" class="css-1myvhw3">
                                    <div data-bn-type="text" class="css-1cjl26j">How It Works
                                        <!-- -->
                                    </div>
                                </a>
                                <br />
                                <br /><br />
                                <br />
                                <br />
                                <br /><br />
                                <br />
                            </div>
                        </div>

                        <div class="css-19ph8gz">
                            <div class="css-vurnku">
                                <div data-bn-type="text" class="css-1jsf87b">About Us</div><a
                                    href="https://www.Wecoin Trade.com/en/download" class="css-1myvhw3">
                                    <div data-bn-type="text" class="css-1cjl26j">Our Mission
                                        <!-- -->
                                    </div>
                                </a><a href="https://www.Wecoin Trade.com/en/buy-sell-crypto" class="css-1myvhw3">
                                    <div data-bn-type="text" class="css-1cjl26j">Our Team
                                        <!-- -->
                                    </div>
                                </a>
                                <a href="https://www.Wecoin Trade.com/en/buy-sell-crypto" class="css-1myvhw3">
                                    <div data-bn-type="text" class="css-1cjl26j">Contact Us
                                        <!-- -->
                                    </div>
                                </a><a href="https://www.Wecoin Trade.com/en/buy-sell-crypto" class="css-1myvhw3">
                                    <div data-bn-type="text" class="css-1cjl26j">Help Centre
                                        <!-- -->
                                    </div>
                                </a>
                            </div>
                        </div>


                    </div>
                    <div class="css-1ti7za9">
                        <div data-bn-type="text" class="css-1jsf87b">Community</div>
                        <div class="css-vurnku"><a href="https://www.wecointrade.com/en/community"
                                class="css-wyeq5d"><svg xmlns="http://www.w3.org/2000/svg" class="css-1ok5vaw"
                                    fill="currentColor">
                                    <use xlink:href="#icon-h-telegram"></use>
                                </svg></a><a href="https://www.facebook.com/wecointrade" class="css-wyeq5d"><svg
                                    xmlns="http://www.w3.org/2000/svg" class="css-1ok5vaw" fill="currentColor">
                                    <use xlink:href="#icon-h-facebook"></use>
                                </svg></a><a href="https://twitter.com/wecointrade" class="css-wyeq5d"><svg
                                    xmlns="http://www.w3.org/2000/svg" class="css-1ok5vaw" fill="currentColor">
                                    <use xlink:href="#icon-h-twitter"></use>
                                </svg></a><br /><a href="https://www.reddit.com/r/wecointrade" class="css-wyeq5d"><svg
                                    xmlns="http://www.w3.org/2000/svg" class="css-1ok5vaw" fill="currentColor">
                                    <use xlink:href="#icon-h-reddit"></use>
                                </svg></a><a href="https://www.instagram.com/wecointrade/" class="css-wyeq5d"><svg
                                    xmlns="http://www.w3.org/2000/svg" class="css-1ok5vaw" fill="currentColor">
                                    <use xlink:href="#icon-h-instagram"></use>
                                </svg></a><a href="https://www.youtube.com/wecointrade" class="css-wyeq5d"><svg
                                    xmlns="http://www.w3.org/2000/svg" class="css-1ok5vaw" fill="currentColor">
                                    <use xlink:href="#icon-h-youtube"></use>
                                </svg></a></div>
                        <div class="css-ybbx55"><button data-bn-type="button" class=" css-1w92vad"><svg
                                    xmlns="http://www.w3.org/2000/svg" class="css-1gdy6l7" fill="currentColor">
                                    <use xlink:href="#icon-h-diqiu"></use>
                                </svg>
                                <div data-bn-type="text" class="css-n8a3xt">English</div><svg
                                    xmlns="http://www.w3.org/2000/svg" id="i" class="css-hg0irb" fill="currentColor">
                                    <use xlink:href="#icon-h-dropdown-arrow"></use>
                                </svg>
                            </button>
                            <div style="position: fixed; inset: auto auto 0px 0px; transform: translate(1055px, 2248px);"
                                class="css-gv1gi9" data-popper-reference-hidden="true" data-popper-escaped="true"
                                data-popper-placement="top-start">
                                <div class="css-1cuoy00">
                                    <div class="css-uliqdc">
                                        <div class="css-4m887f">English</div>
                                        <div class="css-4m887f">Norsk</div>
                                        <div class="css-4m887f">简体中文</div>
                                        <div class="css-4m887f">繁體中文 (台灣)</div>
                                        <div class="css-4m887f">Русский</div>
                                        <div class="css-4m887f">Español (Latinoamérica)</div>
                                        <div class="css-4m887f">Deutsch</div>
                                        <div class="css-4m887f">Türkçe</div>
                                        <div class="css-4m887f">Italiano</div>
                                        <div class="css-4m887f">Bahasa Indonesia</div>
                                        <div class="css-4m887f">Filipino</div>
                                        <div class="css-4m887f">العربية</div>
                                        <div class="css-4m887f">Português (Brasil)</div>
                                        <div class="css-4m887f">English (India)</div>
                                        <div class="css-4m887f">Română</div>
                                        <div class="css-4m887f">Čeština</div>
                                        <div class="css-4m887f">latviešu valoda</div>
                                        <div class="css-4m887f">Svenska</div>
                                        <div class="css-4m887f">Español (México)</div>
                                        <div class="css-4m887f">Slovenčina</div>
                                        <div class="css-4m887f">اردو</div>
                                    </div>
                                    <div class="css-uliqdc">
                                        <div class="css-4m887f">Suomi</div>
                                        <div class="css-4m887f">हिंदी</div>
                                        <div class="css-4m887f">繁體中文 (香港)</div>
                                        <div class="css-4m887f">한국어</div>
                                        <div class="css-4m887f">Español (Internacional)</div>
                                        <div class="css-4m887f">Français</div>
                                        <div class="css-4m887f">Tiếng Việt</div>
                                        <div class="css-4m887f">Vlaams</div>
                                        <div class="css-4m887f">Polski</div>
                                        <div class="css-4m887f">Українська</div>
                                        <div class="css-4m887f">日本語</div>
                                        <div class="css-4m887f">English (Australia)</div>
                                        <div class="css-4m887f">ไทย</div>
                                        <div class="css-4m887f">English (Nigeria)</div>
                                        <div class="css-4m887f">български</div>
                                        <div class="css-4m887f">עברית</div>
                                        <div class="css-4m887f">বাংলা</div>
                                        <div class="css-4m887f">Português (Portugal)</div>
                                        <div class="css-4m887f">Ελληνικά</div>
                                        <div class="css-4m887f">Slovenščina</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="css-1jcqx7s">
                    <h4 data-bn-type="text" class="css-90tmb0">Community</h4>
                    <div class="css-136a9lx"><a href="https://www.Wecoin Trade.com/en/community" class="css-wyeq5d"><svg
                                xmlns="http://www.w3.org/2000/svg" class="css-1c0vxpt" fill="currentColor">
                                <use xlink:href="#icon-h-telegram"></use>
                            </svg></a><a href="https://www.facebook.com/Wecoin Trade" class="css-wyeq5d"><svg
                                xmlns="http://www.w3.org/2000/svg" class="css-1c0vxpt" fill="currentColor">
                                <use xlink:href="#icon-h-facebook"></use>
                            </svg></a><a href="https://twitter.com/Wecoin Trade" class="css-wyeq5d"><svg
                                xmlns="http://www.w3.org/2000/svg" class="css-1c0vxpt" fill="currentColor">
                                <use xlink:href="#icon-h-twitter"></use>
                            </svg></a><a href="https://www.reddit.com/r/Wecoin Trade" class="css-wyeq5d"><svg
                                xmlns="http://www.w3.org/2000/svg" class="css-1c0vxpt" fill="currentColor">
                                <use xlink:href="#icon-h-reddit"></use>
                            </svg></a><a href="https://www.instagram.com/Wecoin Trade/" class="css-wyeq5d"><svg
                                xmlns="http://www.w3.org/2000/svg" class="css-1c0vxpt" fill="currentColor">
                                <use xlink:href="#icon-h-instagram"></use>
                            </svg></a><a href="https://coinmarketcap.com/exchanges/Wecoin Trade/"
                            class="css-wyeq5d"><svg xmlns="http://www.w3.org/2000/svg" class="css-1c0vxpt"
                                fill="currentColor">
                                <use xlink:href="#icon-h-coinmarketcap"></use>
                            </svg></a><a href="https://vk.com/Wecoin Trade" class="css-wyeq5d"><svg
                                xmlns="http://www.w3.org/2000/svg" class="css-1c0vxpt" fill="currentColor">
                                <use xlink:href="#icon-h-vk"></use>
                            </svg></a><a href="https://www.youtube.com/Wecoin Tradeyoutube" class="css-wyeq5d"><svg
                                xmlns="http://www.w3.org/2000/svg" class="css-1c0vxpt" fill="currentColor">
                                <use xlink:href="#icon-h-youtube"></use>
                            </svg></a>
                        <div class="css-1pysja1"></div>
                        <div class="css-ybbx55"><button data-bn-type="button" class=" css-1bbpiq1"><svg
                                    xmlns="http://www.w3.org/2000/svg" class="css-1gdy6l7" fill="currentColor">
                                    <use xlink:href="#icon-h-diqiu"></use>
                                </svg>
                                <div data-bn-type="text" class="css-n8a3xt">English</div><svg
                                    xmlns="http://www.w3.org/2000/svg" id="i" class="css-hg0irb" fill="currentColor">
                                    <use xlink:href="#icon-h-dropdown-arrow"></use>
                                </svg>
                            </button>
                            <div style="position: fixed; inset: auto auto 0px 0px; transform: translate(0px, -654px);"
                                class="css-gv1gi9" data-popper-reference-hidden="true" data-popper-escaped="true"
                                data-popper-placement="top-start">
                                <div class="css-1cuoy00">
                                    <div class="css-uliqdc">
                                        <div class="css-4m887f">English</div>
                                        <div class="css-4m887f">Norsk</div>
                                        <div class="css-4m887f">简体中文</div>
                                        <div class="css-4m887f">繁體中文 (台灣)</div>
                                        <div class="css-4m887f">Русский</div>
                                        <div class="css-4m887f">Español (Latinoamérica)</div>
                                        <div class="css-4m887f">Deutsch</div>
                                        <div class="css-4m887f">Türkçe</div>
                                        <div class="css-4m887f">Italiano</div>
                                        <div class="css-4m887f">Bahasa Indonesia</div>
                                        <div class="css-4m887f">Filipino</div>
                                        <div class="css-4m887f">العربية</div>
                                        <div class="css-4m887f">Português (Brasil)</div>
                                        <div class="css-4m887f">English (India)</div>
                                        <div class="css-4m887f">Română</div>
                                        <div class="css-4m887f">Čeština</div>
                                        <div class="css-4m887f">latviešu valoda</div>
                                        <div class="css-4m887f">Svenska</div>
                                        <div class="css-4m887f">Español (México)</div>
                                        <div class="css-4m887f">Slovenčina</div>
                                        <div class="css-4m887f">اردو</div>
                                    </div>
                                    <div class="css-uliqdc">
                                        <div class="css-4m887f">Suomi</div>
                                        <div class="css-4m887f">हिंदी</div>
                                        <div class="css-4m887f">繁體中文 (香港)</div>
                                        <div class="css-4m887f">한국어</div>
                                        <div class="css-4m887f">Español (Internacional)</div>
                                        <div class="css-4m887f">Français</div>
                                        <div class="css-4m887f">Tiếng Việt</div>
                                        <div class="css-4m887f">Vlaams</div>
                                        <div class="css-4m887f">Polski</div>
                                        <div class="css-4m887f">Українська</div>
                                        <div class="css-4m887f">日本語</div>
                                        <div class="css-4m887f">English (Australia)</div>
                                        <div class="css-4m887f">ไทย</div>
                                        <div class="css-4m887f">English (Nigeria)</div>
                                        <div class="css-4m887f">български</div>
                                        <div class="css-4m887f">עברית</div>
                                        <div class="css-4m887f">বাংলা</div>
                                        <div class="css-4m887f">Português (Portugal)</div>
                                        <div class="css-4m887f">Ελληνικά</div>
                                        <div class="css-4m887f">Slovenščina</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="css-ybbx55"><button data-bn-type="button" class=" css-1vzfcz1"><svg
                                xmlns="http://www.w3.org/2000/svg" class="css-1gdy6l7" fill="currentColor">
                                <use xlink:href="#icon-h-diqiu"></use>
                            </svg>
                            <div data-bn-type="text" class="css-n8a3xt">English</div><svg
                                xmlns="http://www.w3.org/2000/svg" id="i" class="css-hg0irb" fill="currentColor">
                                <use xlink:href="#icon-h-dropdown-arrow"></use>
                            </svg>
                        </button>
                        <div style="position: fixed; inset: auto auto 0px 0px; transform: translate(0px, -654px);"
                            class="css-gv1gi9" data-popper-reference-hidden="true" data-popper-escaped="true"
                            data-popper-placement="top-start">
                            <div class="css-1cuoy00">
                                <div class="css-uliqdc">
                                    <div class="css-4m887f">English</div>
                                    <div class="css-4m887f">Norsk</div>
                                    <div class="css-4m887f">简体中文</div>
                                    <div class="css-4m887f">繁體中文 (台灣)</div>
                                    <div class="css-4m887f">Русский</div>
                                    <div class="css-4m887f">Español (Latinoamérica)</div>
                                    <div class="css-4m887f">Deutsch</div>
                                    <div class="css-4m887f">Türkçe</div>
                                    <div class="css-4m887f">Italiano</div>
                                    <div class="css-4m887f">Bahasa Indonesia</div>
                                    <div class="css-4m887f">Filipino</div>
                                    <div class="css-4m887f">العربية</div>
                                    <div class="css-4m887f">Português (Brasil)</div>
                                    <div class="css-4m887f">English (India)</div>
                                    <div class="css-4m887f">Română</div>
                                    <div class="css-4m887f">Čeština</div>
                                    <div class="css-4m887f">latviešu valoda</div>
                                    <div class="css-4m887f">Svenska</div>
                                    <div class="css-4m887f">Español (México)</div>
                                    <div class="css-4m887f">Slovenčina</div>
                                    <div class="css-4m887f">اردو</div>
                                </div>
                                <div class="css-uliqdc">
                                    <div class="css-4m887f">Suomi</div>
                                    <div class="css-4m887f">हिंदी</div>
                                    <div class="css-4m887f">繁體中文 (香港)</div>
                                    <div class="css-4m887f">한국어</div>
                                    <div class="css-4m887f">Español (Internacional)</div>
                                    <div class="css-4m887f">Français</div>
                                    <div class="css-4m887f">Tiếng Việt</div>
                                    <div class="css-4m887f">Vlaams</div>
                                    <div class="css-4m887f">Polski</div>
                                    <div class="css-4m887f">Українська</div>
                                    <div class="css-4m887f">日本語</div>
                                    <div class="css-4m887f">English (Australia)</div>
                                    <div class="css-4m887f">ไทย</div>
                                    <div class="css-4m887f">English (Nigeria)</div>
                                    <div class="css-4m887f">български</div>
                                    <div class="css-4m887f">עברית</div>
                                    <div class="css-4m887f">বাংলা</div>
                                    <div class="css-4m887f">Português (Portugal)</div>
                                    <div class="css-4m887f">Ελληνικά</div>
                                    <div class="css-4m887f">Slovenščina</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="css-qe0qko">
                    <div data-bn-type="text" class="css-1ez451f">WeCoinTrade ©
                        <!-- -->2021
                    </div>
                </div>
            </footer>
        </div>
    </div>

   
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
