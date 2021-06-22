<?php
session_start();
$email = $_SESSION['user'];
$userid = $_SESSION['userid'];
$conn=mysqli_connect('remotemysql.com','AI9hgEKDPt','nS6lsKdyHE','AI9hgEKDPt') or die('Could not Connect My Sql:'.mysql_error());
if(!isset($_SESSION['user'])){
    header("location: /login");  

}
if(isset($_SESSION['user'])){
        if(isset($_POST['updatefname']) && !empty($_POST['updatefname']) ){
            $fname = $_POST['updatefname'];
                $queryfname= "UPDATE `users` SET `first name` = '$fname' WHERE `email` = '$email'";
                mysqli_query($conn,$queryfname) or die("Could Not Perform the Query");
        }
        if(isset($_POST['updatelname']) && !empty($_POST['updatelname'])){
            $lname = $_POST['updatelname'];
                $querylname = "UPDATE `users` SET `last name` = '$lname' WHERE `email` = '$email'";
                mysqli_query($conn,$querylname) or die("Could Not Perform the Query");
        }
        if(isset($_POST['updateno']) && !empty($_POST['updateno'])){
            $no = $_POST['updateno'];
                $queryno = "UPDATE `users` SET `phone number` = '$no' WHERE `email` = '$email'";
                mysqli_query($conn,$queryno) or die("Could Not Perform the Query");
        }
        if(isset($_POST['upload'])){
            $imagename=$_FILES['uploadfile1']['name']; 

            //Get the content of the image and then add slashes to it 
            $imagetmp=addslashes (file_get_contents($_FILES['uploadfile1']['tmp_name']));
            
            //Insert the image name and image content in image_table
            $insert_image="UPDATE `users` SET `vid`= '$imagetmp + $imagename' WHERE `email` = '$email' ";
            
          
           
            mysqli_query($conn,$insert_image) or die("Could Not Perform the Query");


            $imagenames=$_FILES['uploadfile2']['name']; 

        //Get the content of the image and then add slashes to it 
        $imagetmps=addslashes (file_get_contents($_FILES['uploadfile2']['tmp_name']));
        
        //Insert the image name and image content in image_table
        $insert_images="UPDATE `users` SET `photo`= '$imagetmps + $imagenames' WHERE `email` = '$email' ";
        
      
       
        mysqli_query($conn,$insert_images) or die("Could Not Perform the Query");

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
    <link rel="manifest" href="https://bin.bnbstatic.com/uc/v3/manifest.json">
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
    <link rel="shortcut icon" type="image/x-icon" href="https://bin.bnbstatic.com/static/images/common/favicon.ico">
    <script async="" src="https://bin.bnbstatic.com/static/sensors/sensorsdata@1.15.26.js"></script>
    <script async="" src="https://www.googletagmanager.com/gtm.js?id=GTM-WW2RRZX"></script>
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
    <link rel="preload" href="https://bin.bnbstatic.com/static/fonts/index.min.css" as="style">
    <link rel="stylesheet" type="text/css" href="https://bin.bnbstatic.com/static/fonts/index.min.css">
    <link rel="preload" href="https://bin.bnbstatic.com/static/fonts/font.min.css" as="style">
    <link rel="stylesheet" type="text/css" href="https://bin.bnbstatic.com/static/fonts/font.min.css">
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
        }

        .css-kvkii2 {
            width: 66.6667%;
        }

        .css-kvkii2 {
            box-sizing: border-box;
            margin: 0px;
            min-width: 0px;
            display: flex;

            padding: 8px;
        }

        .css-vurnku {
            box-sizing: border-box;
            margin: 0px;
            min-width: 0px;
        }

        .css-4sk89q {
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
        }

        .css-yv6506 {
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
        }

        .css-yv6506>div.active {
            color: rgb(30, 35, 41);
            font-weight: 500;
        }

        .css-d3ui9e.active {
            border-bottom: 3px solid rgb(240, 185, 11);
            border-bottom-color: rgb(240, 185, 11);
            border-color: rgb(240, 185, 11);
            color: rgb(240, 185, 11);
        }

        .css-yv6506>div {
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
        }

        .css-1s6nhe2 {
            box-sizing: border-box;
            margin: 0px 0px 0px 16px;
            min-width: 0px;
            text-decoration: none;
            color: rgb(201, 148, 0);
            display: flex;
        }

        a {
            background-color: transparent;
        }

        .css-155meta {
            box-sizing: border-box;
            margin: 0px;
            min-width: 0px;
            color: rgb(0, 0, 0);
            font-size: 24px;
            fill: rgb(0, 0, 0);
            width: 1em;
            height: 1em;
        }

        .css-1p01izn {
            box-sizing: border-box;
            margin: 0px;
            min-width: 0px;
            box-shadow: rgba(20, 21, 26, 0.04) 0px 1px 2px, rgba(71, 77, 87, 0.04) 0px 3px 6px, rgba(20, 21, 26, 0.1) 0px 0px 1px;
            border-radius: 4px;
            background-color: rgb(255, 255, 255);
            padding: 0px 16px;
            width: 100%;
        }

        .css-1hythwr {
            box-sizing: border-box;
            margin: 0px;
            min-width: 0px;
            display: flex;

            flex-direction: column;
        }

        .css-1hz1mz6 {
            box-sizing: border-box;
            margin: 0px;
            min-width: 0px;
            flex: 1 1 0%;
            padding-top: 16px;
            padding-bottom: 16px;
        }

        .css-5x6ly7 {
            box-sizing: border-box;
            margin: 0px;
            min-width: 0px;
            display: flex;
            flex: 1 1 0%;
            -moz-box-align: stretch;

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
        }

        .css-4cffwv {
            box-sizing: border-box;
            margin: 0px;
            min-width: 0px;
            display: flex;
        }.css-1ug0pze input {
    color: #1E2329;
    font-size: 14px;
    border-radius: 4px;
    padding-left: 12px;
    padding-right: 12px;
}
.css-16fg16t {
    box-sizing: border-box;
    margin: 0;
    min-width: 0;
    width: 100%;
    height: 100%;
    padding: 0;
        padding-right: 0px;
        padding-left: 0px;
    outline: none;
    border: none;
    background-color: inherit;
    opacity: 1;
}
button, input {
    overflow: visible;
}
button, input, optgroup, select, textarea {
    font-family: inherit;
    
    line-height: 1.15;
    
}

        .css-noqr05 {
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
        }

        .css-d732j0 {
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

        button,
        [type="button"],
        [type="reset"],
        [type="submit"] {
            appearance: button;
        }

        button,
        select {
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
        .css-1wr4jig {
    box-sizing: border-box;
    margin: 0px;
    min-width: 0px;
    display: flex;
    flex-direction: column;
    flex: 1 1 0%;
}.css-15owl46 {
    box-sizing: border-box;
    margin: 0px;
    min-width: 0px;
    position: relative;
}.css-egsqt7 {
    flex: 1 1 0%;
    height: auto;
}
.css-1sstzk2 {
    box-sizing: border-box;
    margin: 0px;
    min-width: 0px;
    display: flex;
    flex-direction: column;
    width: 100%;
}.css-ekwbtp {
    margin-bottom: 24px;
    padding: 24px;
}
.css-ekwbtp {
    box-sizing: border-box;
    margin: 0px 0px 16px;
        margin-bottom: 16px;
    min-width: 0px;
    display: flex;
    box-shadow: rgba(0, 0, 0, 0.1) 2px 0px 4px;
   
    -moz-box-pack: justify;
    justify-content: space-between;
    -moz-box-align: center;
    align-items: center;
    background-color: rgb(255, 255, 255);
}.css-1260v1g {
    font-size: 32px;
}
.css-1260v1g {
    box-sizing: border-box;
    margin: 0px;
    min-width: 0px;
    color: rgb(30, 35, 41);
    font-weight: 500;
    
}.css-156k7dn {
    display: none;
}
.css-g6j1vn {
    margin-left: 24px;
    margin-right: 24px;
    margin-bottom: 24px;
    padding-top: 24px;
}
.css-g6j1vn {
    
    padding: 16px 24px 24px;
        padding-top: 16px;
    background-color: rgb(255, 255, 255);
}
.css-g6j1vn {
    box-shadow: rgba(11, 14, 17, 0.08) 0px 2px 4px;
}
.css-g6j1vn {
    box-sizing: border-box;
    margin: 0px;
        margin-right: 0px;
        margin-bottom: 0px;
        margin-left: 0px;
    min-width: 0px;
    display: flex;
    
    border-radius: 4px;
    flex-direction: column;
   
}.css-dsyltk {
    flex-direction: row;
    -moz-box-pack: initial;
    justify-content: initial;
}
.css-15nm7oo {
    width: 280px;
}

.css-15nm7oo {
    margin-right: 24px;
}

.css-15nm7oo {
    box-sizing: border-box;
    margin: 0px 0px 24px;
        margin-right: 0px;
    min-width: 0px;
    position: relative;
    outline: currentcolor none medium;
    display: inline-block;
    
}
.css-1ej5pym.bn-input-md {
    height: 40px;
}
.css-1ej5pym {
    box-sizing: border-box;
    margin: 32px 0px 0px;
    min-width: 0px;
    display: inline-flex;
    position: relative;
    -moz-box-align: center;
    align-items: center;
    line-height: 1.6;
    background-color: rgb(245, 245, 245);
    border-radius: 4px;
    border-width: 1px;
    border-style: solid;
    border-color: transparent;
    
    width: 100%;
    cursor: pointer;
}.css-1ej5pym input {
    color: rgb(30, 35, 41);
    font-size: 14px;
    border-radius: 4px;
    padding-left: 12px;
    padding-right: 12px;
}
.css-1jpgac0 {
    box-sizing: border-box;
    margin: 0px;
    min-width: 0px;
    width: 100%;
    height: 100%;
    padding: 0px;
        padding-right: 0px;
        padding-left: 0px;
    outline: currentcolor none medium;
    border: medium none;
    opacity: 1;
    visibility: hidden;
    cursor: pointer;
    background-color: transparent;
}
button, input {
    overflow: visible;
}
button, input, optgroup, select, textarea {
    font-family: inherit;
   
    line-height: 1.15;
    
}.css-1nlwvj5 {
    box-sizing: border-box;
    margin: 0px;
    min-width: 0px;
    font-size: 16px;
    fill: currentcolor;
    transform: rotate(0deg);
    color: rgb(112, 122, 138);
    width: 1em;
    height: 1em;
}
.css-6lqe90 {
    box-sizing: border-box;
    margin: 0px;
    min-width: 0px;
    position: absolute;
    pointer-events: none;
    top: -32px;
    left: 0px;
    line-height: 32px;
    z-index: 1;
    cursor: text;
    color: rgb(71, 77, 87);
    font-size: 14px;
}.css-15nm7oo .bn-sdd-value {
    min-height: 40px;
    padding: 12px 24px 12px 12px;
}
.css-1h4bkt6 {
    box-sizing: border-box;
    margin: 0px;
    min-width: 0px;
    height: 40px;
    position: absolute;
    display: flex;
    -moz-box-align: center;
    align-items: center;
    left: 0px;
    bottom: 0px;
    right: 0px;
    pointer-events: none;
    word-break: keep-all;
    font-size: 14px;
    line-height: 1;
    color: rgb(30, 35, 41);
}.css-15nm7oo .bn-sdd-dropdown {
    position: absolute;
    z-index: 1100;
    transition: height 0.2s ease 0s;
    background-color: rgb(255, 255, 255);
    box-shadow: rgba(20, 21, 26, 0.08) 0px 3px 6px, rgba(71, 77, 87, 0.08) 0px 7px 14px, rgba(20, 21, 26, 0.1) 0px 0px 1px;
    border-radius: 4px;
}
.css-1wfi04i {
    box-sizing: border-box;
    margin: 4px 0px 0px;
    outline: currentcolor none medium;
    height: auto;
    display: none;
    width: auto !important;
    min-width: 100% !important;
}
.css-dsyltk {
    font-size: 14px;
}
.css-1ej5pym {
    line-height: 1.6;
    cursor: pointer;
}
.css-dsyltk {
    font-size: 14px;
}
.css-dsyltk {
    font-size: 14px;
}
.css-dsyltk {
    display: flex;
    padding-right: 128px;
}


.css-dsyltk {
    box-sizing: border-box;
    margin: 0px;
    min-width: 0px;
    position: relative;
    flex-flow: column wrap;
        flex-direction: column;
    font-size: 14px;
    
    width: 100%;
}
.css-156k7dn {
    box-sizing: border-box;
    margin: 0px;
    min-width: 0px;
    color: rgb(132, 142, 156);
    font-size: 24px;
    fill: rgb(132, 142, 156);
    width: 1em;
    height: 1em;
    
}
.css-egsqt7 {
    box-sizing: border-box;
    margin: 0px;
    min-width: 0px;
    overflow-y: auto;
    position: relative;
    background-color: rgb(250, 250, 250);
    
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
.btn-info{
    color: #1E2329;
font-size: 14px;
border-radius: 4px;
padding-left: 12px;
padding-right: 12px;
padding-top: 15px;
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
        }

        .css-1hythwr {
            box-sizing: border-box;
            margin: 0px;
            min-width: 0px;
            display: flex;
            flex: 1 1 0%;
            flex-direction: column;
        }

        .css-2ypmf8 {
            box-sizing: border-box;
            margin: 0px;
            min-width: 0px;
            display: flex;
            flex: 1 1 0%;
            -moz-box-pack: center;
            justify-content: center;
            color: rgb(112, 122, 138);
        }

        .css-cvp9q5 {
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
        }

        .css-1lzksdc {
            margin: 24px;
        }

        .css-1lzksdc {
            width: 96px;
            height: 96px;
            font-size: 96px;
        }

        .css-1lzksdc {
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
        }

        .css-1p01izn {
            box-sizing: border-box;
            margin: 0px;
            min-width: 0px;
            box-shadow: rgba(20, 21, 26, 0.04) 0px 1px 2px, rgba(71, 77, 87, 0.04) 0px 3px 6px, rgba(20, 21, 26, 0.1) 0px 0px 1px;
            border-radius: 4px;
            background-color: rgb(255, 255, 255);
            padding: 0px 16px;
            width: 100%;
        }

        .css-1hythwr {
            box-sizing: border-box;
            margin: 0px;
            min-width: 0px;
            display: flex;
            flex: 1 1 0%;
            flex-direction: column;
        }

        .css-hwv82q {
            box-sizing: border-box;
            margin: 0px;
            min-width: 0px;
            border-width: 0px 0px 1px;
            border-style: solid;
            border-color: rgb(234, 236, 239);
            flex: 1 1 0%;
            padding-top: 16px;
            padding-bottom: 16px;
        }

        .css-5x6ly7 {
            box-sizing: border-box;
            margin: 0px;
            min-width: 0px;
            display: flex;
            flex: 1 1 0%;
            -moz-box-align: center;
            align-items: center;
        }

        .css-5x6ly7 {
            box-sizing: border-box;
            margin: 0px;
            min-width: 0px;
            display: flex;
            flex: 1 1 0%;
            -moz-box-align: center;
            align-items: center;
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
            font-size: 14px;
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
        }

        .css-1s6nhe2 {
            box-sizing: border-box;
            margin: 0px 0px 0px 16px;
            min-width: 0px;
            text-decoration: none;
            color: rgb(201, 148, 0);
            display: flex;
        }

        a {
            background-color: transparent;
        }

        .css-155meta {
            box-sizing: border-box;
            margin: 0px;
            min-width: 0px;
            color: rgb(0, 0, 0);
            font-size: 24px;
            fill: rgb(0, 0, 0);
            width: 1em;
            height: 1em;
        }

        .css-1dcd6pv {
            box-sizing: border-box;
            margin: 0px;
            min-width: 0px;
            display: flex;
            flex: 1 1 0%;
            padding-top: 16px;
            padding-bottom: 16px;
            flex-direction: column;
        }

        .css-1h690ep {
            box-sizing: border-box;
            margin: 0px;
            min-width: 0px;
            display: flex;
            flex: 1 1 0%;
        }

        .css-phax11 {
            box-sizing: border-box;
            margin: 0px;
            min-width: 0px;
            display: flex;
            padding: 8px;
            flex-direction: column;
            width: 20%;
        }

        .css-9b6x94 {
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

        .dropbtn {
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

            box-shadow: 10px 4px 8px 10px rgba(0, 0, 0, 0.2);
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
        .dropdown-content a:hover {
            background-color: rgb(184, 122, 8);
        }

        /* Show the dropdown menu on hover */
        .dropdown:hover .dropdown-content {
            display: block;
        }

        /* Change the background color of the dropdown button when the dropdown content is shown */
        .dropdown:hover .dropbtn {
            background-color: #3e8e41;
        }

        .css-1atcjr2 {
            margin-left: 16px;
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

        button,
        [type="button"],
        [type="reset"],
        [type="submit"] {
            appearance: button;
        }

        button,
        select {
            text-transform: none;
        }

        .css-gnqbje {
            box-sizing: border-box;
            margin: 0px;
            min-width: 0px;
            display: block;
        }

        .css-ysetcg {
            padding-top: 48px;
            padding-bottom: 48px;
        }

        .css-ysetcg {
            box-sizing: border-box;
            margin: 0px;
            min-width: 0px;

        }

        .css-ct0qa6 {
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
        }

        .css-1bliacb {
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
        }

        .css-vurnku {
            box-sizing: border-box;
            margin: 0px;
            min-width: 0px;
        }

        .css-1f978ju {
            box-sizing: border-box;
            margin: 0px 0px 8px;
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

        .css-1kbdyxh {
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
        }

        element {
            line-height: 22px;
            user-select: none;
        }

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
        }

        .css-czxcdk {
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

        button,
        select {
            text-transform: none;
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
            box-sizing: border-box;
            margin: 0px;
            min-width: 0px;
            display: flex;
            align-items: flex-end;
            flex-wrap: wrap;
            color: rgb(30, 35, 41);
            font-size: 12px;
            line-height: 100%;
        }

        .css-off8uh {
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
        }

        .css-1t9tl2o {
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
        }

        .css-jmlio4 {
            box-sizing: border-box;
            margin: 16px 0px 0px;
            min-width: 0px;
        }

        .css-67pg7t {
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
        }

        .css-2psl {
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
        }

        .css-11bw57b {
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
    <title>Settings - WeCoin Trade</title>
</head>

<body dir="ltr" style="overflow: auto; position: static;"><svg aria-hidden="true"
        style="position: absolute; width: 0px; height: 0px; overflow: hidden;">
        <symbol id="icon-subaccount-s24" viewBox="0 0 1024 1024">
            <path
                d="M384 498.048c81.664 0 147.84-63.744 147.84-142.378667C531.84 277.077333 465.664 213.333333 384 213.333333S236.16 277.077333 236.16 355.669333c0 78.634667 66.176 142.378667 147.84 142.378667zM515.797333 555.008H252.16c-92.202667 0-166.4 71.381333-166.869333 160.170667v129.322666h597.333333v-129.28c-0.512-88.832-74.666667-160.256-166.869333-160.256z m66.645334 192.981333H185.557333v-32.810666c0.512-35.2 30.08-63.658667 66.645334-63.658667h263.594666c36.565333 0 66.133333 28.458667 66.645334 63.658667v32.853333zM938.666667 588.8h-170.666667v85.333333h170.666667v-85.333333zM938.666667 418.133333h-170.666667v85.333334h170.666667v-85.333334zM938.666667 759.466667h-170.666667v85.333333h170.666667v-85.333333z">
            </path>
        </symbol>
        <symbol id="icon-task-s24" viewBox="0 0 1024 1024">
            <path
                d="M554.666667 128V42.666667h-85.333334v85.333333H341.333333v85.333333h341.333334V128h-128zM256 853.333333V128H170.666667v810.666667h682.666666V128h-85.333333v725.333333H256z m170.666667-512H341.333333v85.333334h85.333334V341.333333z m-85.333334 170.666667h85.333334v85.333333H341.333333v-85.333333z m341.333334-170.666667h-170.666667v85.333334h170.666667V341.333333z m-170.666667 170.666667h170.666667v85.333333h-170.666667v-85.333333z">
            </path>
        </symbol>
        <symbol id="icon-appstore" viewBox="0 0 1024 1024">
            <path
                d="M692.992 85.312c5.824 50.56-15.168 100.224-45.952 136.832-32.128 35.968-83.52 63.488-133.504 59.968-6.592-48.576 18.752-100.224 47.168-131.712 32.064-35.84 87.744-63.232 132.288-65.088z m163.776 291.2c-5.888 3.392-98.048 55.872-97.024 162.56 1.152 129.28 119.04 172.032 120.32 172.48-0.64 3.008-18.368 61.632-62.528 121.152-36.928 52.48-75.584 103.68-136.96 104.576-29.248 0.64-48.96-7.296-69.504-15.616-21.44-8.704-43.776-17.728-78.72-17.728-36.992 0-60.288 9.344-82.816 18.368-19.456 7.744-38.272 15.296-64.768 16.32-58.496 2.048-103.168-56-141.44-107.904-76.416-106.048-135.872-298.88-56.128-430.08a221.056 221.056 0 0 1 184.512-106.944c33.152-0.64 65.024 11.52 92.864 22.144 21.376 8.128 40.384 15.424 56 15.424 13.696 0 32.256-7.04 53.76-15.104 34.048-12.8 75.584-28.48 117.952-24.32 28.992 0.832 111.488 10.88 164.608 84.608l-0.128 0.064z">
            </path>
        </symbol>
        <symbol id="icon-windows" viewBox="0 0 1024 1024">
            <path
                d="M64 64h418.112v418.112H64zM541.888 64H960v418.112H541.888zM64 541.888h418.112V960H64zM541.888 541.888H960V960H541.888z">
            </path>
        </symbol>
        <symbol id="icon-lunix" viewBox="0 0 1024 1024">
            <path
                d="M505.283882 247.078062c1.98276 0.9594 3.581759 3.389879 6.012238 3.389879 2.174639 0 5.564519-0.83148 5.756399-3.006119 0.44772-2.814239-3.837599-4.605119-6.395998-5.756399-3.389879-1.40712-7.803118-2.04672-11.001118-0.25584-0.76752 0.44772-1.599 1.40712-1.15128 2.2386 0.57564 2.558399 4.605119 2.174639 6.779759 3.389879z m-43.74863 3.389879c2.366519 0 3.965519-2.430479 5.948279-3.389879 2.238599-1.21524 6.204119-0.83148 7.035598-3.197999 0.38376-0.83148-0.44772-1.79088-1.2792-2.2386-3.197999-1.79088-7.547278-1.15128-10.873197 0.25584-2.686319 1.15128-6.843718 2.942159-6.395999 5.756399 0.12792 1.98276 3.517799 3.006119 5.564519 2.814239z m441.835577 557.21939c-7.163518-7.994998-10.553398-23.217475-14.390997-39.399351-3.581759-16.181876-7.739158-33.578992-20.978875-44.77199a53.982227 53.982227 0 0 0-16.181876-9.785877c18.420476-54.557867 11.192997-108.923855-7.355399-158.109083-22.833715-60.122386-62.552865-112.697494-92.933858-148.643006-34.218592-42.98111-67.349864-83.78758-66.774224-143.909966 1.02336-91.718619 10.233598-262.235939-151.521205-262.427819-204.671952-0.38376-153.503964 206.654712-155.678603 270.230937-3.389879 46.690789-12.791997 83.53174-44.96387 129.26313-37.736391 44.963869-90.951099 117.558452-116.087373 193.287075-12.024477 35.817592-17.588996 72.146863-12.408237 106.493375-12.983877 11.640717-22.769755 29.421593-33.195232 40.42271-8.378758 8.570638-20.595115 11.768637-33.962752 16.565636-13.431597 4.796999-27.950513 12.024477-36.968871 28.973874a51.167988 51.167988 0 0 0-5.628479 24.816474c0 7.739158 1.2792 15.734156 2.430479 23.537274 2.366519 16.181876 4.988879 31.340393 1.599 41.573991-10.425478 28.781993-11.768637 48.801469-4.413239 63.320385 7.611238 14.646837 22.769755 21.042835 40.166871 24.624594 34.538392 7.227478 81.548981 5.436599 118.517852 24.944394 39.591231 20.850955 79.758101 28.206353 111.738094 20.850955 23.153515-5.180759 42.21359-19.187996 51.807588-40.35875 24.944394-0.25584 52.511148-10.873197 96.451657-13.239717 29.805353-2.366519 67.157984 10.617358 110.139094 8.186878a63.512265 63.512265 0 0 0 4.988879 13.431597v0.19188c16.629596 33.387112 47.586229 48.609589 80.589581 45.987229 33.131272-2.622359 68.117384-22.002235 96.515618-55.773107 27.182994-32.811472 71.954983-46.370989 101.696376-64.343745 14.838717-9.018358 26.863194-20.211355 27.822593-36.585111 0.76752-16.373756-8.826478-34.538392-31.020592-59.354866zM511.04028 175.123079c19.635715-44.38823 68.437184-43.55675 87.94498-0.83148 13.047837 28.398233 7.227478 61.785346-8.570638 80.781461a247.205342 247.205342 0 0 0-25.200234-9.785878c2.238599-2.430479 6.204119-5.436599 7.803118-9.210238 9.593998-23.601234-0.38376-53.982227-18.164636-54.557867-14.582877-1.02336-27.822593 21.554515-23.601234 45.987229a142.310967 142.310967 0 0 0-25.967754-8.826478 79.630181 79.630181 0 0 1 5.756398-43.556749z m-81.293141-23.025595c20.147395 0 41.57399 28.398233 38.184112 66.966104-7.035598 2.04672-14.199117 4.988879-20.467196 9.210238 2.430479-17.780876-6.523918-40.166871-19.187995-39.143511-16.757516 1.40712-19.507795 42.34151-3.517799 56.156867 1.9188 1.599 3.773639-0.44772-11.832598 11.001118-31.148513-29.229713-20.978875-104.126856 16.821476-104.126856z m-27.182993 121.332092c12.408237-9.146278 27.182994-19.955515 28.142393-20.978875 9.402118-8.762518 26.991114-28.398233 55.773107-28.398234 14.199117 0 31.212473 4.605119 51.807588 17.844836 12.536157 8.186878 22.577875 8.762518 45.155749 18.548396 16.757516 7.035598 27.374874 19.379875 20.978876 36.393231-5.180759 14.199117-22.002235 28.781993-45.41159 36.137392-22.130155 7.227478-39.527271 31.979993-76.304262 29.805353a55.645187 55.645187 0 0 1-19.187995-4.221359c-15.989996-6.971638-24.368754-20.786995-39.974991-29.933273-17.205236-9.593998-26.415474-20.786995-29.421593-30.572873-2.750279-9.785878 0-18.036716 8.442718-24.624594z m6.587878 667.550363c-5.372639 70.164104-87.753099 68.756984-150.497845 35.945512-59.738626-31.532273-137.130208-12.983877-152.864364-43.74863-4.796999-9.402118-4.796999-25.392114 5.116799-52.766987v-0.38376c4.860959-15.222476 1.2792-31.979993-1.15128-47.778109-2.366519-15.606236-3.581759-29.997233 1.79088-39.974991 7.035598-13.431597 17.013356-18.164636 29.613473-22.577874 20.531155-7.419358 23.537274-6.779758 39.143511-19.827596 11.001117-11.384877 18.996116-25.711914 28.590113-35.945511 10.233598-11.001117 19.955515-16.181876 35.369872-13.751397 16.181876 2.366519 30.189113 13.559517 43.74863 31.979992l39.20747 71.123504c18.996116 39.783111 86.1541 96.707497 81.868781 137.705847z m-2.814239-51.807587a428.5319 428.5319 0 0 0-28.781993-39.143511c14.199117 0 28.398233-4.413239 33.387112-17.780876 4.605119-12.408237 0-29.805353-14.774757-49.760868-26.991114-36.393231-76.560102-64.919385-76.560102-64.919385-26.991114-16.821476-42.21359-37.416591-49.185228-59.802586-6.971638-22.385995-5.948279-46.562869-0.6396-70.355984 10.425478-45.731389 37.224711-90.311499 54.365987-118.325972 4.669079-3.389879 1.66296 6.395999-17.333156 41.57399-17.013356 32.171872-48.737509 106.557335-5.180759 164.696962a345.128079 345.128079 0 0 1 27.566754-122.931092c23.984994-54.749747 74.577343-149.666365 78.542862-225.203107 2.174639 1.599 9.210238 6.395999 12.408237 8.186878 9.146278 5.372639 16.181876 13.431597 25.136274 20.595115 24.816474 19.955515 56.988347 18.356516 84.74698 2.36652 12.408237-7.035598 22.385995-14.966636 31.788113-17.908796 19.827595-6.268079 35.561752-17.269196 44.580109-30.061193 15.350396 60.761986 51.359868 148.515085 74.321503 191.240355 12.216357 22.833715 36.585111 70.995583 47.202469 129.19917 6.587878-0.25584 14.007237 0.76752 21.746395 2.750279 27.630714-71.315383-23.345395-148.323205-46.56287-169.68584-9.338158-9.210238-9.785878-13.175757-5.116798-12.983877 25.136274 22.385995 58.331506 67.349864 70.292023 117.942212 5.628479 23.153515 6.587878 47.330389 0.76752 71.315384 32.811472 13.623477 71.763103 35.817592 61.401586 69.588464-4.413239-0.19188-6.395999 0-8.378758 0 6.395999-20.211355-7.803118-35.177992-45.60347-52.191348-39.143511-17.205236-71.954983-17.205236-76.560102 24.944394-24.176874 8.442718-36.521151 29.421593-42.72527 54.621827-5.628479 22.385995-7.227478 49.313148-8.826478 79.694141-0.9594 15.414356-7.163518 36.009472-13.559517 58.011707-64.151865 45.731389-153.312084 65.750865-228.465066 14.390997z m514.43016-22.961635c-1.79088 33.578992-82.316501 39.783111-126.320971 92.933858-26.351514 31.340393-58.715266 48.801469-87.1135 50.976108-28.398233 2.174639-52.958868-9.593998-67.349864-38.567871-9.402118-22.194115-4.796999-46.179109 2.17464-72.530623 7.419358-28.398233 18.420476-57.563987 19.827595-81.165221 1.599-30.380993 3.389879-56.924387 8.314798-77.391582 5.244719-20.531155 13.239717-34.346512 27.438834-42.14963 0.6396-0.38376 1.40712-0.57564 1.982759-0.9594 1.599 26.351514 14.582877 53.150748 37.608471 58.971107 25.136274 6.587878 61.337626-15.030596 76.751983-32.619593 17.908796-0.6396 31.340393-1.79088 45.155749 10.233598 19.827595 16.949396 14.199117 60.570106 34.154632 83.14798 21.170755 23.153515 28.014473 38.951631 27.374874 49.121269z m-510.400681-568.348427c3.965519 3.773639 9.338158 8.954398 15.989996 14.135157 13.175757 10.425478 31.532273 21.234715 54.557867 21.234715 23.153515 0 44.963869-11.832597 63.512266-21.618475 9.785878-5.180759 21.746395-14.007237 29.613473-20.786995 7.803118-6.779758 11.768637-12.600117 6.204118-13.175757-5.628479-0.6396-5.244719 5.180759-12.024477 10.233597-8.762518 6.395999-19.379875 14.710797-27.758633 19.507796-14.774757 8.442718-39.015591 20.467195-59.738626 20.467195-20.786995 0-37.416591-9.593998-49.824829-19.443836-6.140159-4.988879-11.384877-9.977758-15.350396-13.815356-3.006119-2.750279-3.837599-9.146278-8.570638-9.785878-2.814239-0.19188-3.645719 7.419358 3.389879 13.047837z">
            </path>
        </symbol>
        <symbol id="icon-search" viewBox="0 0 1024 1024">
            <path
                d="M128 468.565333c0 164.053333 133.845333 297.898667 297.898667 297.898667 64.768 0 129.536-21.589333 177.024-60.416L792.874667 896 853.333333 835.541333l-189.952-189.952c34.56-47.488 60.416-112.256 60.416-177.024 0-82.005333-34.56-155.434667-86.314666-211.541333C585.642667 205.226667 507.946667 170.666667 425.898667 170.666667 261.845333 170.666667 128 304.512 128 468.565333zM572.714667 317.44a205.610667 205.610667 0 0 1 60.416 146.816c0 56.106667-21.589333 107.946667-60.416 146.773333a205.610667 205.610667 0 0 1-146.773334 60.458667 205.610667 205.610667 0 0 1-146.816-60.458667c-43.178667-34.56-64.768-86.314667-64.768-142.464 0-56.106667 21.589333-107.946667 60.416-146.773333 38.869333-43.178667 95.018667-64.768 151.125334-64.768 56.149333 0 107.946667 21.589333 146.773333 60.416z">
            </path>
        </symbol>
        <symbol id="icon-broker" viewBox="0 0 1024 1024">
            <path
                d="M0 0m180.705882 0l662.588236 0q180.705882 0 180.705882 180.705882l0 662.588236q0 180.705882-180.705882 180.705882l-662.588236 0q-180.705882 0-180.705882-180.705882l0-662.588236q0-180.705882 180.705882-180.705882Z"
                fill="#F0B90B" opacity=".1"></path>
            <path
                d="M227.659294 227.629176h406.196706v406.226824H227.689412V227.629176z m81.227294 81.257412v243.712h243.742118v-243.712h-243.742118z"
                fill="#F0B90B"></path>
            <path
                d="M390.144 390.144h406.226824V796.310588H390.144V390.144z m81.227294 81.227294v243.742118h243.742118V471.341176h-243.742118z"
                fill="#F0B90B"></path>
            <path
                d="M698.277647 268.257882L755.742118 210.823529 813.176471 268.257882l-57.434353 57.464471-57.464471-57.464471zM210.823529 755.712l57.434353-57.434353 57.464471 57.434353L268.257882 813.176471 210.823529 755.681882z"
                fill="#F0B90B"></path>
        </symbol>
        <symbol id="icon-DEX" viewBox="0 0 1024 1024">
            <path
                d="M0 0m180.705882 0l662.588236 0q180.705882 0 180.705882 180.705882l0 662.588236q0 180.705882-180.705882 180.705882l-662.588236 0q-180.705882 0-180.705882-180.705882l0-662.588236q0-180.705882 180.705882-180.705882Z"
                fill="#F0B90B" opacity=".1"></path>
            <path
                d="M278.768941 512.030118l0.210824 139.866353 116.585411 69.933176v81.618824L210.823529 693.007059v-221.786353l67.945412 40.839529z m0-139.926589v81.618824L210.823529 412.882824v-81.618824l67.945412-40.719059 67.945412 40.719059-67.945412 40.839529z m165.195294-40.839529l68.005647-40.719059 67.885177 40.719059-67.97553 40.839529-67.915294-40.839529z m-116.34447 291.478588v-81.618823l67.945411 40.809411v81.618824l-67.945411-40.809412z m116.34447 128.240941l67.915294 40.83953 67.97553-40.83953v81.618824L511.879529 873.411765l-67.915294-40.809412v-81.618824z m233.261177-419.719529l67.915294-40.719059 67.975529 40.719059v81.648941l-67.975529 40.809412v-81.648941L677.225412 331.294118z m67.915294 320.662588l0.090353-139.89647L813.176471 471.220706v221.786353l-184.621177 110.441412v-81.618824l116.585412-69.933176v0.030117z m-48.549647-29.214117l-67.945412 40.839529v-81.618824l67.945412-40.809411v81.618823z m0-221.455059l0.12047 81.618823-116.615529 69.872941v140.257883l-67.915294 40.809412-67.97553-40.809412v-140.227765l-116.555294-69.872941v-81.679059l67.945412-40.779294 116.374588 69.963294 116.705883-69.963294 67.915294 40.809412zM327.649882 261.421176L511.939765 150.588235l184.621176 110.802824-67.945412 40.779294-116.675764-69.963294-116.374589 69.993412-67.975529-40.83953h0.060235z"
                fill="#F0B90B"></path>
        </symbol>
        <symbol id="icon-h-future-s" viewBox="0 0 1024 1024">
            <path
                d="M789.333333 448V315.733333l-204.8 209.066667 204.8 209.066667v-128h85.333334v273.066666H597.333333v-85.333333h132.266667l-226.133333-226.133333H128v-85.333334h375.466667L729.6 256h-128V170.666667h273.066667v277.333333h-85.333334zM213.333333 324.266667H128v85.333333h85.333333v-85.333333zM213.333333 170.666667H128v85.333333h85.333333V170.666667zM213.333333 793.6H128v85.333333h85.333333v-85.333333zM371.2 793.6h-85.333333v85.333333h85.333333v-85.333333z">
            </path>
            <path
                d="M529.066667 793.6h-85.333334v85.333333h85.333334v-85.333333zM213.333333 640H128v85.333333h85.333333v-85.333333z">
            </path>
        </symbol>
        <symbol id="icon-h-myaccount" viewBox="0 0 1024 1024">
            <path
                d="M512 96c213.344 0 416 202.656 416 416s-202.656 416-416 416C298.688 928 96 725.344 96 512S298.688 96 512 96z m0-53.344A467.968 467.968 0 0 0 42.688 512 467.968 467.968 0 0 0 512 981.344 467.968 467.968 0 0 0 981.344 512 467.968 467.968 0 0 0 512 42.656z">
            </path>
            <path
                d="M512 469.536c61.216 0 110.88-47.808 110.88-106.784C622.88 303.808 573.216 256 512 256c-61.248 0-110.88 47.808-110.88 106.752 0 58.976 49.632 106.784 110.88 106.784zM610.848 512.256H413.12c-69.152 0-124.8 53.536-125.152 120.128v97.024h448v-97.024c-0.384-66.56-56-120.16-125.152-120.16z m49.984 144.768h-297.664v-24.64c0.384-26.4 22.56-47.744 49.984-47.744h197.696c27.424 0 49.6 21.344 49.984 47.744v24.64z">
            </path>
        </symbol>
        <symbol id="icon-h-coupons" viewBox="0 0 1024 1024">
            <path
                d="M896 810.666667H128v-256h42.666667c21.333333 0 42.666667-17.066667 42.666666-42.666667s-17.066667-42.666667-42.666666-42.666667H128V213.333333h768v256h-42.666667c-21.333333 0-42.666667 17.066667-42.666666 42.666667s17.066667 42.666667 42.666666 42.666667h42.666667v256zM213.333333 725.333333h597.333334v-93.866666c-51.2-17.066667-85.333333-64-85.333334-119.466667 0-55.466667 34.133333-102.4 85.333334-119.466667V298.666667H213.333333v93.866666c51.2 17.066667 85.333333 64 85.333334 119.466667 0 55.466667-34.133333 102.4-85.333334 119.466667V725.333333z">
            </path>
            <path
                d="M640 384h-85.333333v85.333333h85.333333V384zM640 554.666667h-85.333333v85.333333h85.333333v-85.333333z">
            </path>
        </symbol>
        <symbol id="icon-h-hot" viewBox="0 0 1984 1024">
            <path
                d="M384 0a192 192 0 0 0-192 192v128L0 510.72 192 704v128a192 192 0 0 0 192 192h1408a192 192 0 0 0 192-192V192a192 192 0 0 0-192-192H384z"
                fill="#F0B90B"></path>
            <path
                d="M843.52 832h86.784V295.936H843.52v225.792H600.832V295.936H514.048V832h86.784V598.528h242.688V832z m369.28 9.216c111.36 0 183.552-81.408 183.552-208.896 0-127.488-72.192-208.896-183.552-208.896s-183.552 81.408-183.552 208.896c0 127.488 72.192 208.896 183.552 208.896z m0-69.12c-56.832 0-95.232-35.328-95.232-105.984V598.528c0-70.656 38.4-105.984 95.232-105.984s95.232 35.328 95.232 105.984v67.584c0 70.656-38.4 105.984-95.232 105.984zM1671.04 832v-68.352h-77.568V500.992h83.712V432.64h-83.712V323.584H1518.08v69.888c0 27.648-9.216 39.168-36.864 39.168h-33.792v68.352h62.208v244.224c0 54.528 30.72 86.784 88.32 86.784h72.96z"
                fill="#212833"></path>
        </symbol>
        <symbol id="icon-h-futures" viewBox="0 0 4010 1024">
            <path
                d="M1443.84 511.573333h-188.416V115.370667h184.32c81.237333 0 130.773333 40.576 130.773333 102.314666v1.621334c0 44.672-23.552 69.845333-51.968 85.248 45.482667 17.877333 73.898667 43.861333 73.898667 97.450666v0.853334c-0.853333 73.045333-59.306667 108.8-148.608 108.8z m38.954667-279.338666c0-25.984-20.266667-40.576-56.832-40.576h-86.058667v83.626666h80.384c38.144 0 62.506667-12.16 62.506667-42.24v-0.810666z m22.741333 159.146666c0-26.752-19.456-43.008-64.128-43.008h-101.546667V435.2h103.978667c38.144 0 61.696-13.781333 61.696-43.008v-0.853333z m181.930667 120.234667V115.328h86.869333v396.288H1687.466667z m481.536 0l-191.658667-251.733333v251.733333h-86.058667V115.328h80.384l185.941334 244.394667V115.328h86.101333v396.288h-74.709333z m466.133333 0l-36.565333-88.533333h-167.253334l-35.754666 88.533333h-89.344l169.728-399.573333h80.384l170.538666 399.573333h-91.733333zM2514.944 217.6l-52.778667 128.298667h105.557334L2514.944 217.6z m552.96 293.973333l-191.573333-251.733333v251.733333h-86.101334V115.328h80.384l185.941334 244.394667V115.328h86.101333v396.288h-74.709333z m362.24 7.253334c-116.949333 0-203.050667-90.112-203.050667-203.776v-0.853334c0-112.853333 85.290667-204.629333 207.061334-204.629333 74.752 0 119.381333 25.173333 155.946666 60.928L3534.890667 234.666667c-30.890667-27.605333-61.738667-44.629333-101.546667-44.629334-66.56 0-115.285333 55.210667-115.285333 123.434667v0.810667c0 68.181333 47.104 124.245333 115.328 124.245333 45.44 0 73.045333-17.92 103.936-46.293333l55.210666 56.021333c-40.618667 43.050667-86.101333 70.656-162.432 70.656z m232.234667-7.253334V115.328h298.837333V193.28h-211.968v80.384h186.794667v77.952h-186.794667v83.626667h215.210667v76.373333h-302.08z m-1447.893334 160.768h-159.146666v76.330667h141.269333v44.672h-141.312v114.474667h-49.493333v-280.96h208.64v45.482666z m301.226667 113.706667c0 83.626667-47.061333 125.866667-120.96 125.866667-73.088 0-119.381333-42.24-119.381333-123.434667v-161.621333h49.536v159.146666c0 52.010667 26.794667 80.426667 70.656 80.426667s70.656-26.794667 70.656-77.952v-161.621333h49.493333v159.146666z m198.997333 121.770667h-49.536v-234.666667H2575.786667v-45.482667h227.413333v45.482667h-89.344v234.666667h0.810667z m388.949334-121.770667c0 83.626667-47.104 125.866667-121.002667 125.866667-73.088 0-119.338667-42.24-119.338667-123.434667v-161.621333h49.493334v159.146666c0 52.010667 26.837333 80.426667 70.656 80.426667 43.861333 0 70.656-26.794667 70.656-77.952v-161.621333h49.536v159.146666z m265.557333 121.770667l-69.034667-97.450667h-61.696v97.450667H3188.906667v-280.96h125.013333c64.170667 0 103.978667 34.133333 103.978667 89.344 0 46.293333-27.605333 74.666667-66.56 85.248l75.52 106.368h-57.685334z m-58.453333-235.52H3239.253333v94.250666h72.277334c34.901333 0 57.6-18.688 57.6-47.104-0.768-30.848-21.888-47.104-58.453334-47.104z m392.192-0.768h-158.336v73.088h140.501333v43.861333h-140.501333v75.52h160.768v43.818667h-210.346667v-280.96h207.914667v44.672z m185.173333 73.898666c59.306667 14.592 90.112 35.712 90.112 82.816 0 52.778667-41.386667 84.48-99.84 84.48a171.477333 171.477333 0 0 1-116.949333-44.672l30.037333-34.944c26.794667 23.552 53.589333 36.565333 88.490667 36.565334 30.890667 0 49.536-13.824 49.536-35.754667 0-20.266667-11.349333-31.658667-63.317334-43.008-60.117333-14.634667-93.397333-31.701333-93.397333-84.48 0-48.725333 39.808-82.005333 95.829333-82.005333 40.576 0 73.088 12.202667 101.504 34.901333l-26.794666 37.376c-25.173333-18.688-50.346667-29.226667-76.373334-29.226667-29.184 0-45.44 14.592-45.44 33.28 0.810667 21.930667 13.013333 31.658667 66.56 44.672z m-2063.445333-0.853333h-570.026667v47.146667h570.026667v-47.104zM115.328 396.330667L0 511.573333l115.328 115.285334 116.096-115.285334-116.096-115.328z m396.288-164.864l198.101333 198.144 115.328-115.285334-197.333333-198.954666L511.616 0 396.288 115.328 198.144 313.472l115.328 115.285333 198.144-197.333333z m396.245333 164.864l-115.285333 115.328 115.285333 115.285333L1024 511.616l-116.138667-115.328z m-396.245333 396.288l-198.144-198.144-115.328 115.285333 198.144 198.144L511.573333 1024l115.285334-115.328 198.144-198.101333-115.328-116.138667-198.101334 198.144z m0-164.864l116.096-116.096-116.096-115.328-115.328 115.328 115.328 116.096z">
            </path>
        </symbol>
        <symbol id="icon-h-deposit" viewBox="0 0 1024 1024">
            <path
                d="M810.666667 853.333333H213.333333v85.333334h597.333334v-85.333334zM465.664 244.48L267.946667 441.344 209.066667 382.677333 507.733333 85.333333l298.666667 297.386667-58.88 58.624-197.717333-196.864V768h-84.138667V244.48z">
            </path>
        </symbol>
        <symbol id="icon-h-info" viewBox="0 0 1024 1024">
            <path
                d="M0 0m240.941176 0l542.117648 0q240.941176 0 240.941176 240.941176l0 542.117648q0 240.941176-240.941176 240.941176l-542.117648 0q-240.941176 0-240.941176-240.941176l0-542.117648q0-240.941176 240.941176-240.941176Z"
                fill="#F0B90B" opacity=".1"></path>
            <path
                d="M632.470588 218.533647L271.058824 271.058824l361.411764-120.470589v67.945412zM752.941176 271.058824v481.882352h-51.892705V333.010824L271.058824 271.058824h481.882352z"
                fill="#F0B90B"></path>
            <path
                d="M271.058824 271.058824v477.756235l3.975529 0.451765 2.770823 0.421647 6.746353 1.295058h-10.721882L632.470588 873.411765V394.360471L271.058824 271.058824z m134.896941 137.005176l74.179764 25.690353v78.757647l-74.179764-25.268706v-79.209412z m74.179764 327.920941l-74.179764-25.268706 1.204706-164.803764 74.571294 25.238588-1.596236 164.833882z"
                fill="#F0B90B"></path>
        </symbol>
        <symbol id="icon-h-launchpad" viewBox="0 0 1024 1024">
            <path
                d="M0 0m180.705882 0l662.588236 0q180.705882 0 180.705882 180.705882l0 662.588236q0 180.705882-180.705882 180.705882l-662.588236 0q-180.705882 0-180.705882-180.705882l0-662.588236q0-180.705882 180.705882-180.705882Z"
                fill="#F0B90B" opacity=".1"></path>
            <path
                d="M353.28 640.421647l55.898353 55.898353v93.424941l-195.855059 46.531765 46.08-195.855059h93.876706zM567.476706 213.323294l-102.821647 103.273412h-128l-110.531765 110.501647 333.673412 333.643294 63.548235 64 0.873412 0.421647 110.08-110.501647v-128.421647l102.821647-103.243294V213.323294h-269.643294z m166.821647 292.713412h-78.095059V394.24h-111.344941v-77.643294h189.44v189.44z"
                fill="#F0B90B"></path>
        </symbol>
        <symbol id="icon-h-binancecloud" viewBox="0 0 1024 1024">
            <path
                d="M0 0m189.620706 0l644.758588 0q189.620706 0 189.620706 189.620706l0 644.758588q0 189.620706-189.620706 189.620706l-644.758588 0q-189.620706 0-189.620706-189.620706l0-644.758588q0-189.620706 189.620706-189.620706Z"
                fill="#F0B90B" fill-opacity=".1"></path>
            <path
                d="M326.806588 400.745412l123.964236-125.83153 132.367058 0.030118 123.482353 125.801412h69.51153l97.40047 106.526117v155.01553L776.131765 768H256.060235L150.618353 662.287059v-155.01553l105.441882-106.526117h70.776471z m194.680471 23.732706l-154.292706 156.912941 54.784 56.199529 99.508706-101.104941L620.423529 637.590588l55.597177-56.199529-154.533647-156.912941z"
                fill="#F0B90B"></path>
        </symbol>
        <symbol id="icon-h-new" viewBox="0 0 2355 1024">
            <path
                d="M188.2112 738.4064L0 512l188.2112-223.5392v-69.0176c0-58.1632 23.04-114.0736 64-155.136C293.1712 23.1424 348.672 0 406.528 0h1730.3552a217.2928 217.2928 0 0 1 154.4192 64.3072A219.5456 219.5456 0 0 1 2355.2 219.4432v585.1136a220.2624 220.2624 0 0 1-63.8976 155.136 218.2144 218.2144 0 0 1-154.4192 64.3072H406.528a217.7024 217.7024 0 0 1-154.3168-64.3072 219.9552 219.9552 0 0 1-64-155.136v-66.1504z"
                fill="#F0B90B"></path>
            <path
                d="M767.5904 817.4592l-183.296-314.2656-62.976-127.2832h-2.56v441.5488H409.6V204.8h126.6688l183.296 314.2656 62.8736 127.1808h2.6624V204.8h109.1584v612.6592H767.5904z m447.0784 10.5472c-134.4512 0-214.8352-93.9008-214.8352-240.5376 0-144.7936 77.7216-238.6944 211.3536-238.6944 142.336 0 207.872 105.2672 207.872 230.8096v36.864h-303.104v11.3664c0 65.8432 37.5808 110.592 110.8992 110.592 54.9888 0 88.1664-26.3168 116.1216-62.2592l60.3136 67.584c-37.5808 51.8144-103.936 84.2752-188.6208 84.2752z m-1.7408-394.9568c-58.5728 0-96.9728 43.8272-96.9728 107.008v7.0656h186.88v-7.8848c0-63.1808-32.3584-106.1888-89.9072-106.1888z m385.9456 384.4096l-125.7472-458.1376h107.4176l46.2848 188.6208 35.84 157.184h3.4816l41.8816-157.184 53.248-188.6208h101.376l54.9888 188.6208 42.7008 157.184h3.584l35.84-157.184 45.2608-188.6208h103.936l-124.928 458.1376H1903.616L1845.248 615.424l-34.0992-124.6208h-2.56l-33.28 124.6208-57.5488 201.9328h-118.784z"
                fill="#212833"></path>
        </symbol>
        <symbol id="icon-h-Markallasread" viewBox="0 0 1024 1024">
            <path
                d="M769.22302895 133.87054901a29.71569494 29.71569494 0 0 1 41.70139242 0v0.11046684a28.83195638 28.83195638 0 0 1 0 41.14905695l-514.55652473 535.26913709-0.05523277 0.16570089a29.49475998 29.49475998 0 0 1-20.87831325 8.45074584 29.38429315 29.38429315 0 0 1-20.87831323-8.45074584l-0.11046814-0.22093496-175.6429527-173.43360693a28.88719045 28.88719045 0 0 1 0-41.14905698 29.77092771 29.77092771 0 0 1 41.64615966 0l154.98557441 152.99716364 493.78867833-514.88792654z m163.76772075 221.15546581h-233.52779913l64.01577969-60.64652896h169.56725351c16.90149168 0 30.65466627 13.5874737 30.65466627 30.37849853a30.54419945 30.54419945 0 0 1-30.70990034 30.26803043z m-317.04105211 121.34829194h316.98581933c16.01775312 0.66280359 28.83195638 13.31130596 29.49476 29.10812412a30.54419945 30.54419945 0 0 1-29.49476 31.59363889h-380.94636625l63.96054692-60.70176301zM468.36542957 658.36912767h464.51485329a30.54419945 30.54419945 0 0 1 28.99765729 28.61102143 30.48896537 30.48896537 0 0 1-28.94242323 32.03550752h-528.53063429l63.96054694-60.64652895z m-368.02169617 179.67500704a30.26803041 30.26803041 0 0 0 0 60.59129617h841.59486483a30.26803041 30.26803041 0 1 0 0-60.59129617H100.39896747z">
            </path>
        </symbol>
        <symbol id="icon-h-dropdown-right" viewBox="0 0 1024 1024">
            <path d="M564.8 512L252.8 828.8 320 896l384-384-384-384-67.2 67.2L564.8 512z"></path>
        </symbol>
        <symbol id="icon-h-logout" viewBox="0 0 1024 1024">
            <path d="M535.893333 170.666667h-89.216v361.173333h89.173334V170.666667z"></path>
            <path
                d="M490.837333 853.333333C313.344 852.906667 170.24 708.437333 170.666667 530.517333a321.194667 321.194667 0 0 1 93.653333-225.621333L327.168 368.213333a231.296 231.296 0 0 0 0.426667 327.722667 231.296 231.296 0 0 0 327.765333-0.426667 231.68 231.68 0 0 0 0-327.765333l62.890667-63.317333a321.706667 321.706667 0 0 1-0.896 454.826666A319.146667 319.146667 0 0 1 490.794667 853.333333z">
            </path>
        </symbol>
        <symbol id="icon-new-logout" viewBox="0 0 1024 1024">
            <path d="M535.893333 170.666667h-89.216v361.173333h89.173334V170.666667z"></path>
            <path
                d="M490.837333 853.333333C313.344 852.906667 170.24 708.437333 170.666667 530.517333a321.194667 321.194667 0 0 1 93.653333-225.621333L327.168 368.213333a231.296 231.296 0 0 0 0.426667 327.722667 231.296 231.296 0 0 0 327.765333-0.426667 231.68 231.68 0 0 0 0-327.765333l62.890667-63.317333a321.706667 321.706667 0 0 1-0.896 454.826666A319.146667 319.146667 0 0 1 490.794667 853.333333z">
            </path>
        </symbol>
        <symbol id="icon-h-account-security" viewBox="0 0 1024 1024">
            <path
                d="M170.666667 213.333333h682.666666v408.746667l-341.333333 195.072-341.333333-195.072V213.333333z m85.333333 85.333334v273.92l256 146.261333 256-146.261333V298.666667H256z">
            </path>
        </symbol>
        <symbol id="icon-h-api-management" viewBox="0 0 1024 1024">
            <path
                d="M725.546667 469.333333V384h-128V298.666667h-154.88c-101.12 0-188.586667 71.253333-208.64 170.666666h-106.24v85.333334h106.24c20.053333 99.413333 107.52 170.666667 208.64 170.666666h154.88v-85.333333h128v-85.333333h-128v-85.333334h128z m-213.333334 170.666667h-69.546666c-70.826667 0-128-57.173333-128-128s57.173333-128 128-128h69.546666v256zM896.213333 298.666667h-85.333333v426.666666h85.333333V298.666667z">
            </path>
        </symbol>
        <symbol id="icon-h-IdentityVeritication" viewBox="0 0 1024 1024">
            <path
                d="M743.850667 571.306667h-167.509334v78.848h167.509334V571.306667zM743.850667 413.653333h-167.509334v78.848h167.509334V413.653333zM416.426667 393.941333c35.114667 0 62.421333 27.605333 62.421333 63.061334 0 35.498667-27.306667 59.136-62.421333 63.061333-35.114667 3.968-62.421333-27.562667-62.421334-63.061333 0-35.456 27.306667-63.061333 62.421334-63.061334z m85.802666 256.213334H326.698667V571.306667h175.530666v78.848z">
            </path>
            <path
                d="M170.666667 256v543.914667h725.333333V256H170.666667z m651.221333 465.066667H248.704V334.890667H817.92V721.066667h3.925333z">
            </path>
        </symbol>
        <symbol id="icon-h-referral1" viewBox="0 0 1024 1024">
            <path
                d="M791.637333 567.850667H703.573333v-100.096h-104.362666V382.976h104.362666V282.453333h88.064v100.522667H896v84.778667h-104.362667v100.096zM390.442667 463.530667c71.765333 0 129.92-56.021333 129.92-125.098667C520.362667 269.312 462.208 213.333333 390.442667 213.333333 318.72 213.333333 260.565333 269.354667 260.565333 338.432c0 69.12 58.154667 125.098667 129.877334 125.098667zM506.282667 513.578667h-231.68c-80.981333 0-146.176 62.72-146.602667 140.8V768h524.928v-113.664c-0.426667-77.994667-65.621333-140.8-146.645333-140.8z m58.581333 169.6H216.021333v-28.842667c0.426667-30.933333 26.453333-55.978667 58.581334-55.978667h231.637333c32.128 0 58.112 25.045333 58.581333 55.978667v28.842667z">
            </path>
        </symbol>
        <symbol id="icon-h-dropdown-arrow" viewBox="0 0 1024 1024">
            <path d="M704 360.448v89.6L524.8 640 345.6 450.048v-89.6H704z"></path>
        </symbol>
        <symbol id="icon-h-youtube" viewBox="0 0 1024 1024">
            <path
                d="M880.085333 335.701333c-8.789333-31.317333-34.773333-56.32-67.882666-64.64C752.298667 256 512.213333 256 512.213333 256s-240.512 0-300.416 15.061333a95.317333 95.317333 0 0 0-67.84 64.64C128 392.832 128 511.786667 128 511.786667s0 118.997333 15.914667 176.085333c8.789333 31.744 34.773333 56.32 67.882666 64.64 59.904 15.104 299.989333 15.104 299.989334 15.104s240.085333 0 299.989333-15.104c32.682667-8.32 59.093333-32.896 67.882667-64.64 15.914667-57.088 15.914667-176.085333 15.914666-176.085333s0.426667-118.954667-15.488-176.085334z m-446.634666 284.373334V403.925333l200.704 107.861334-200.704 108.288z">
            </path>
        </symbol>
        <symbol id="icon-h-us-l" viewBox="0 0 6400 1024">
            <path
                d="M231.125 511.36L115.5 626.901 0 511.36l115.499-115.499L231.125 511.36zM511.36 230.912l197.973 198.016 115.499-115.499L511.36 0 197.973 313.43l115.499 115.498 197.973-198.016z m395.99 164.95L791.85 511.36l115.5 115.541 115.413-115.541-115.414-115.499zM511.402 791.807L313.429 593.92 197.931 709.333l313.429 313.43 313.472-313.43L709.333 593.92 511.36 791.85z m0-164.907L626.9 511.36 511.36 395.861 395.861 511.36 511.36 626.901z m1218.986 11.094v-1.622c0-75.349-39.978-113.024-104.96-137.813 39.979-22.443 73.771-57.728 73.771-120.96v-1.621c0-88.107-70.57-145.067-185.173-145.067H1253.76v560.939h266.795c126.592 0 209.92-51.243 209.92-153.899h-0.086z m-153.813-239.787c0 41.643-34.432 59.307-89.003 59.307h-113.621v-118.4h121.813c52.054 0 80.939 20.778 80.939 57.642l-0.128 1.408z m31.19 224.384c0 41.643-32.769 60.843-87.34 60.843h-146.474V560.213h142.592c63.36 0 91.307 23.296 91.307 60.971l-0.086 1.408z m381.866 169.259V230.912h-123.776v560.939h123.776z m663.381 0V230.912h-122.197v345.43l-262.912-345.43H2154.24v560.939h121.813V435.2l271.574 356.608h105.386z m683.52 0l-240.81-564.907h-113.75L2741.59 791.851h125.782l51.541-125.824h237.099l51.37 125.824h129.152z m-224.426-234.795h-149.334l74.496-181.845 74.838 181.845z m812.629 234.795V230.912h-122.197v345.43l-262.87-345.43h-113.792v560.939h121.771V435.2l271.701 356.608h105.387z m636.97-90.539l-78.506-79.36c-44.075 40.021-83.328 65.707-147.37 65.707-96.129 0-162.689-79.958-162.689-176.299v-1.579c0-96.128 68.139-174.677 162.688-174.677 56.022 0 99.883 23.979 143.36 63.275l78.336-90.539c-52.053-51.243-115.413-86.528-221.098-86.528-172.288 0-292.48 130.56-292.48 289.75v1.62c0 161.067 122.581 288.427 287.658 288.427 107.904 0.342 172.075-38.144 229.718-99.797h0.384z m526.465 90.539V681.94H4783.36V563.925h264.448V454.016H4783.36v-113.28h300.416v-109.91h-423.04v560.897l427.435 0.128zM5235.37 791.936v-84.224h73.814v84.224h-73.813z m649.26-239.701c0 163.541-93.825 248.49-234.113 248.49s-233.685-84.906-233.685-243.712V230.7h63.317v322.346c0 121.003 64.043 189.142 171.563 189.142 103.424 0 169.173-62.464 169.173-185.174V230.7h63.36l0.384 321.536z m332.458-71.424c125.099 27.264 182.87 73.002 182.87 159.829 0 97.024-79.958 159.872-191.66 159.872-89.002 0-161.962-29.952-229.802-89.899l39.765-46.762c58.539 52.906 114.603 79.36 192.427 79.36 75.35-0.256 125.312-39.424 125.312-96.342 0-52.992-28.075-82.645-145.963-107.52-129.109-28.074-188.458-69.973-188.458-162.773 0-89.941 77.824-153.856 184.448-153.856a292.565 292.565 0 0 1 197.248 68.95l-37.291 48.853c-52.139-42.496-104.192-60.971-161.963-60.971-72.917 0-119.893 39.979-119.893 91.435 0.597 53.76 29.483 83.029 152.96 109.824z"
                fill="#F0B90B"></path>
        </symbol>
        <symbol id="icon-h-Hanburger" viewBox="0 0 1024 1024">
            <path
                d="M170.666667 853.333333h682.666666v-120.448H170.666667V853.333333z m0-281.088h682.666666v-120.490666H170.666667v120.490666zM170.666667 170.666667v120.490666h682.666666V170.666667H170.666667z">
            </path>
        </symbol>
        <symbol id="icon-h-trust-wallet1" viewBox="0 0 1024 1024">
            <path
                d="M0 0m180.705882 0l662.588236 0q180.705882 0 180.705882 180.705882l0 662.588236q0 180.705882-180.705882 180.705882l-662.588236 0q-180.705882 0-180.705882-180.705882l0-662.588236q0-180.705882 180.705882-180.705882Z"
                fill="#3375BB" opacity=".1"></path>
            <path
                d="M839.198118 228.352l-23.461647 410.714353-128.602353 103.664941L524.980706 873.411765l-162.093177-130.710589-128.63247-103.604705L210.823529 228.321882l150.287059 1.024 1.656471-1.024L526.034824 150.588235l161.069176 77.763765 1.626353 1.024 150.467765-1.024z"
                fill="#3375BB"></path>
        </symbol>
        <symbol id="icon-h-academy1" viewBox="0 0 1024 1024">
            <path
                d="M0 0m180.705882 0l662.588236 0q180.705882 0 180.705882 180.705882l0 662.588236q0 180.705882-180.705882 180.705882l-662.588236 0q-180.705882 0-180.705882-180.705882l0-662.588236q0-180.705882 180.705882-180.705882Z"
                fill="#F0B90B" opacity=".1"></path>
            <path
                d="M873.411765 404.901647L538.021647 210.823529l-123.060706 71.378824 199.348706 116.043294-76.288 44.333177-199.077647-116.525177-136.312471 78.848 335.390118 193.957647L873.411765 404.931765zM150.588235 591.872L227.207529 668.611765l76.619295-76.739765-76.619295-76.739765L150.588235 591.872z m240.941177 121.584941V596.329412l156.611764 99.719529 156.611765-99.719529v117.127529L548.141176 813.176471 391.529412 713.456941z"
                fill="#F0B90A"></path>
        </symbol>
        <symbol id="icon-h-bcf1" viewBox="0 0 1024 1024">
            <path
                d="M0 0m180.705882 0l662.588236 0q180.705882 0 180.705882 180.705882l0 662.588236q0 180.705882-180.705882 180.705882l-662.588236 0q-180.705882 0-180.705882-180.705882l0-662.588236q0-180.705882 180.705882-180.705882Z"
                fill="#F0B90B" opacity=".1"></path>
            <path
                d="M511.939765 332.378353l121.283764-121.434353L873.411765 451.282824 511.457882 813.176471 150.588235 451.282824 390.776471 210.823529l121.163294 121.554824zM499.712 644.517647l0.602353-0.602353 156.250353-153.449412-64.060235-62.795294-92.16 90.50353-0.632471 0.602353-92.310588-90.624-64.060236 62.795294 156.370824 153.569882z"
                fill="#F0B90B"></path>
        </symbol>
        <symbol id="icon-h-exchange2" viewBox="0 0 1024 1024">
            <path
                d="M0 0m180.705882 0l662.588236 0q180.705882 0 180.705882 180.705882l0 662.588236q0 180.705882-180.705882 180.705882l-662.588236 0q-180.705882 0-180.705882-180.705882l0-662.588236q0-180.705882 180.705882-180.705882Z"
                fill="#F0B90B" opacity=".1"></path>
            <path
                d="M512 319.216941L375.115294 463.811765 295.152941 379.422118l136.975059-144.534589L512 150.588235l79.962353 84.329412 136.884706 144.504471-79.872 84.389647L512 319.216941z m361.411765 192.722824l-81.618824-81.618824-81.618823 81.618824 81.618823 81.618823 81.618824-81.618823z m-641.204706-81.618824l81.618823 81.618824-81.618823 81.618823L150.588235 511.909647l81.618824-81.618823z m279.792941 274.371765l136.975059-144.504471 79.872 84.329412-136.884706 144.564706L512 873.411765l-79.872-84.329412L295.152941 644.517647l79.962353-84.329412L512 704.692706z m0-274.371765l81.618824 81.618824-81.618824 81.618823-81.618824-81.618823 81.618824-81.618824z"
                fill="#F0B90B"></path>
        </symbol>
        <symbol id="icon-h-labs1" viewBox="0 0 1024 1024">
            <path
                d="M0 0m180.705882 0l662.588236 0q180.705882 0 180.705882 180.705882l0 662.588236q0 180.705882-180.705882 180.705882l-662.588236 0q-180.705882 0-180.705882-180.705882l0-662.588236q0-180.705882 180.705882-180.705882Z"
                fill="#F0B90B" opacity=".1"></path>
            <path
                d="M587.986824 239.224471L542.117647 194.831059 587.986824 150.588235l45.839058 44.393412-45.839058 44.242824zM750.531765 536.094118l-80.715294-78.546824 80.715294-78.095059 80.685176 78.095059-80.715294 78.546824zM252.506353 387.373176L191.216941 329.185882 252.506353 271.058824l61.289412 58.127058-61.289412 58.187294z m362.014118-20.660705H583.68v157.515294L831.247059 761.072941 712.884706 873.411765H299.068235L180.705882 761.072941l249.344-236.875294v-157.515294h-30.780235v-52.013177h215.220706v52.043295z m-27.497412 422.881882l56.32-53.308235-137.456941-130.258824-137.426824 130.831059 56.32 53.458823 81.136941-76.980705 81.106824 76.257882z"
                fill="#F0B90B"></path>
        </symbol>
        <symbol id="icon-h-research1" viewBox="0 0 1024 1024">
            <path
                d="M0 0m180.705882 0l662.588236 0q180.705882 0 180.705882 180.705882l0 662.588236q0 180.705882-180.705882 180.705882l-662.588236 0q-180.705882 0-180.705882-180.705882l0-662.588236q0-180.705882 180.705882-180.705882Z"
                fill="#F0B90B" opacity=".1"></path>
            <path
                d="M536.033882 120.470588h-72.884706v93.665883h72.884706V120.470588zM241.423059 513.415529v16.655059H150.588235v-92.79247h90.834824v76.137411z m607.894588 0v16.655059h-88.244706v-92.79247h88.244706v76.137411zM337.618824 264.463059l5.722352-5.722353L277.383529 192.752941 222.870588 247.265882l6.53553 6.53553-2.469647 2.620235 62.373647 66.258824 51.561411-54.753883-3.282823-3.463529z m383.186823-62.85553l-62.403765 66.258824 51.561412 54.693647 62.403765-66.228706-51.561412-54.723765z m-77.492706 125.138824L501.248 265.035294l-142.034824 61.711059-59.090823 148.419765 59.090823 148.389647 142.034824 61.741176 142.064941-61.741176 59.090824-148.389647-59.090824-148.419765zM580.517647 505.976471l-108.784941-113.664 51.591529-53.910589 108.784941 113.664-51.591529 53.910589zM501.248 891.482353l99.087059-45.688471v-100.773647h-198.144v100.773647l99.087059 45.688471z"
                fill="#F0B90B"></path>
        </symbol>
        <symbol id="icon-h-nav-collapse-s" viewBox="0 0 1024 1024">
            <path d="M170.666667 469.333333h682.666666v85.333334H170.666667z"></path>
        </symbol>
        <symbol id="icon-h-nav-expand-s" viewBox="0 0 1024 1024">
            <path d="M170.666667 469.333333h682.666666v85.333334H170.666667v-85.333334z"></path>
            <path d="M554.666667 170.666667v682.666666h-85.333334V170.666667h85.333334z"></path>
        </symbol>
        <symbol id="icon-h-diqiu" viewBox="0 0 1024 1024">
            <path
                d="M328.96 614.698667H142.08A379.221333 379.221333 0 0 1 128 512c0-35.541333 4.821333-69.76 14.08-102.698667h186.88A1127.296 1127.296 0 0 0 324.650667 512c0 34.218667 1.28 68.906667 4.394666 102.698667zM338.218667 691.498667c10.965333 71.509333 29.397333 136.490667 53.973333 185.6a384.554667 384.554667 0 0 1-219.434667-185.6h165.461334zM392.192 146.858667c-24.576 49.152-43.008 114.133333-53.973333 185.642666H172.757333a384.554667 384.554667 0 0 1 219.434667-185.6zM607.658667 691.498667c-21.034667 125.056-62.293333 195.712-89.941334 204.501333h-11.434666c-27.648-8.789333-68.906667-79.445333-89.941334-204.501333h191.317334zM607.658667 332.501333H416.341333c21.034667-125.056 62.293333-195.712 89.941334-204.501333h11.434666c27.648 8.789333 68.906667 79.445333 89.941334 204.501333zM618.24 409.301333c2.56 31.573333 4.352 65.834667 4.352 102.698667 0 36.437333-1.749333 70.656-4.394667 102.698667H405.802667A1232 1232 0 0 1 401.408 512c0-36.437333 1.749333-70.656 4.394667-102.698667h212.394666zM685.781333 691.498667h165.461334a384.554667 384.554667 0 0 1-219.434667 185.6c24.576-49.109333 43.008-114.090667 53.973333-185.6zM685.781333 332.501333c-10.965333-71.509333-29.397333-136.490667-53.973333-185.6a384.554667 384.554667 0 0 1 219.434667 185.6h-165.461334zM896 512c0 35.541333-4.821333 69.76-14.08 102.698667h-186.88c3.029333-33.365333 4.352-68.010667 4.352-102.698667 0-34.218667-1.28-68.906667-4.394667-102.698667h186.965334c9.216 32.938667 14.037333 67.157333 14.037333 102.698667z">
            </path>
        </symbol>
        <symbol id="icon-h-weibo" viewBox="0 0 1024 1024">
            <path
                d="M788.821333 397.610667c13.952-44.458667-24.533333-86.698667-68.565333-77.226667-40.32 8.874667-52.778667-52.053333-13.013333-60.757333 91.861333-20.181333 169.216 68.693333 140.245333 157.013333-12.458667 39.296-71.125333 20.053333-58.666667-19.029333zM436.48 896C241.578667 896 42.666667 800.810667 42.666667 643.584c0-82.048 51.328-176.725333 139.904-266.154667 182.784-184.661333 372.48-186.88 318.250666-10.581333-7.338667 24.277333 22.570667 10.581333 22.570667 11.093333 145.749333-62.208 257.578667-31.104 208.981333 95.232-6.784 17.408 2.005333 20.181333 15.232 24.277334C996.352 575.786667 811.392 896 436.48 896z m263.424-270.933333c-9.898667-103.168-143.914667-174.122667-299.52-158.72-155.477333 15.914667-272.853333 111.658667-262.912 214.826666 9.898667 103.168 143.914667 174.08 299.52 158.72 155.477333-15.957333 272.853333-111.701333 262.912-214.869333zM680.533333 133.632c-47.488 10.368-30.805333 80.938667 15.232 70.954667 132.522667-28.16 247.125333 97.792 204.8 229.632-13.610667 44.8 53.333333 68.522667 68.522667 22.229333 58.496-184.832-100.992-362.794667-288.554667-322.816z m-143.914666 576c-31.36 71.850667-122.453333 111.146667-200.021334 85.76-74.794667-24.277333-106.325333-98.901333-73.898666-166.144 32.426667-65.536 115.712-102.613333 189.568-83.541333 77.013333 20.053333 115.712 93.013333 84.352 163.925333z m-158.208-55.552c-23.68-9.984-55.04 0.554667-69.674667 23.893333-15.232 23.893333-7.893333 51.84 15.786667 62.976 23.978667 11.093333 56.448 0.554667 71.68-23.893333 14.634667-24.277333 6.741333-52.437333-17.792-62.976z m59.733333-24.832a23.04 23.04 0 0 0-26.197333 10.026667c-5.333333 9.429333-2.56 19.626667 6.784 23.893333a22.4 22.4 0 0 0 26.752-10.026667c5.12-9.6 2.048-20.181333-7.296-23.893333z">
            </path>
        </symbol>
        <symbol id="icon-h-vk" viewBox="0 0 1024 1024">
            <path
                d="M512 128a384 384 0 1 0 384 384c0-212.053333-172.373333-384-384-384z m235.818667 547.754667h-55.68c-21.333333 0-27.434667-17.194667-65.493334-55.253334-33.194667-31.957333-47.488-36.437333-55.68-36.437333-11.477333 0-14.762667 2.858667-14.762666 18.816v50.346667c0 13.525333-4.48 21.717333-40.106667 21.717333-58.965333 0-124.458667-35.626667-170.709333-102.357333-69.589333-97.450667-88.448-171.093333-88.448-185.856 0-8.192 2.901333-15.573333 18.858666-15.573334h56.490667c13.909333 0 19.626667 6.144 24.96 21.717334 27.434667 79.786667 73.685333 149.418667 92.544 149.418666 6.954667 0 10.24-3.285333 10.24-21.290666v-81.877334c-2.090667-38.058667-22.144-41.344-22.144-54.869333 0-6.528 5.333333-13.098667 13.952-13.098667h87.594667c11.861333 0 16.384 6.570667 16.384 20.48v110.933334c0 11.904 4.906667 16.384 8.576 16.384 6.954667 0 13.098667-4.48 26.197333-17.194667 40.106667-45.013333 68.778667-114.218667 68.778667-114.218667 3.669333-8.192 10.24-15.530667 24.576-15.530666h55.68c16.768 0 20.48 8.576 16.768 20.48-6.954667 32.298667-74.922667 128.085333-74.922667 128.938666-6.144 9.813333-8.192 13.909333 0 24.96 6.144 8.192 25.386667 24.96 38.485333 40.106667 23.765333 27.008 42.197333 49.92 47.104 65.493333 4.48 15.573333-3.285333 23.765333-19.242666 23.765334z">
            </path>
        </symbol>
        <symbol id="icon-h-coinmarketcap" viewBox="0 0 1024 1024">
            <path
                d="M795.946667 586.794667c-13.610667 8.661333-29.44 9.514667-41.685334 2.602666-15.36-8.661333-24.149333-28.544-24.149333-56.661333V449.28c0-40.618667-16.213333-69.162667-43.434667-76.970667-46.08-13.397333-80.768 42.410667-93.482666 63.146667L512 565.162667V406.528c-0.853333-36.309333-13.184-58.368-35.968-64.853333-14.933333-4.352-37.76-2.602667-59.733333 30.293333L234.666667 659.882667A315.818667 315.818667 0 0 1 197.76 512c0-173.397333 140.885333-314.368 314.24-314.368 173.354667 0 314.24 140.970667 314.24 314.368v1.706667c1.28 33.749333-9.685333 60.16-30.293333 73.088zM896 512v-1.706667C894.72 299.264 723.072 128 512 128c-211.968 0-384 172.117333-384 384s172.032 384 384 384a382.506667 382.506667 0 0 0 261.12-102.485333 34.901333 34.901333 0 0 0-46.933333-51.456l-0.426667 0.426666A314.154667 314.154667 0 0 1 512 826.368c-92.586667 0-176-40.618667-233.898667-104.618667l164.138667-259.498666v119.808c0 57.514667 22.784 76.117333 41.685333 81.28 18.858667 5.632 47.786667 1.706667 78.506667-47.104l90.026667-144c3.029333-4.778667 5.674667-8.661333 7.893333-12.117334v72.618667c0 53.632 21.930667 96.426667 59.648 117.632 34.261333 19.029333 77.226667 17.322667 112.384-4.309333C875.392 619.690667 898.133333 570.794667 896 512z">
            </path>
        </symbol>
        <symbol id="icon-h-medium" viewBox="0 0 1024 1024">
            <path
                d="M128 128v768h768V128H128z m637.952 181.888l-41.301333 39.552a11.434667 11.434667 0 0 0-4.394667 11.434667v290.389333c-0.853333 4.394667 0.853333 8.789333 4.394667 11.434667l40.405333 39.552v8.789333h-202.538667v-8.789333l41.770667-40.448c4.352-3.925333 4.352-5.248 4.352-11.392v-234.666667l-115.968 293.973333h-15.786667l-134.912-293.973333v197.290667a28.586667 28.586667 0 0 0 7.466667 22.442666l54.485333 65.877334v8.362666H250.154667v-8.362666l54.016-65.877334a26.752 26.752 0 0 0 7.04-22.442666V385.024a19.498667 19.498667 0 0 0-6.570667-17.152L256.725333 309.888v-8.789333h149.376l115.541334 253.952 101.546666-253.952h142.762667v8.789333z">
            </path>
        </symbol>
        <symbol id="icon-h-steemit" viewBox="0 0 1024 1024">
            <path
                d="M804.266667 359.893333a319.232 319.232 0 0 0-111.36-70.314666c23.765333-67.712 108.629333-92.757333 108.629333-92.757334S606.72 97.493333 391.68 137.514667c-71.850667 10.965333-140.970667 53.589333-190.378667 110.762666-109.098667 123.050667-94.72 309.418667 32.341334 414.933334 19.754667 16.213333 63.274667 41.301333 63.274666 42.624-27.818667 72.106667-119.893333 91.434667-119.893333 91.434666s121.728 74.709333 283.776 94.037334a585.386667 585.386667 0 0 0 136.064 1.322666c74.538667-5.717333 149.504-45.696 207.402667-99.754666a301.226667 301.226667 0 0 0 0-432.981334z m-55.253334 385.92c-46.250667 44.373333-114.048 72.106667-167.893333 76.074667-38.186667 4.394667-77.696 4.394667-115.84 0-56.576-6.613333-97.450667-21.973333-138.325333-37.376 19.754667-19.328 40.874667-45.269333 49.408-68.992 5.376-13.653333 4.053333-29.013333-1.365334-41.344-43.946667-87.466667-24.234667-191.189333 46.250667-258.901333 51.2-49.664 121.685333-71.637333 193.536-63.274667a247.296 247.296 0 0 1 138.709333 64.597333c90.24 90.112 87.552 240.896-4.48 329.216z">
            </path>
        </symbol>
        <symbol id="icon-h-instagram" viewBox="0 0 1024 1024">
            <path
                d="M512 197.333333c102.698667 0 114.56 0.426667 155.349333 2.218667 37.290667 1.706667 57.941333 7.893333 71.082667 13.141333 18.005333 7.04 30.72 15.36 44.373333 28.544 13.568 13.610667 21.930667 26.325333 28.501334 44.330667 5.248 13.568 11.392 33.792 13.141333 71.082667 1.792 40.362667 2.218667 52.650667 2.218667 155.349333s-0.426667 114.56-2.218667 155.349333c-1.706667 37.290667-7.893333 57.941333-13.141333 71.082667-7.04 18.005333-15.36 30.72-28.544 44.373333a113.493333 113.493333 0 0 1-44.330667 28.501334c-13.568 5.248-33.792 11.392-71.082667 13.141333-40.362667 1.792-52.650667 2.218667-155.349333 2.218667s-114.56-0.426667-155.349333-2.218667c-37.290667-1.706667-57.941333-7.893333-71.082667-13.141333a124.202667 124.202667 0 0 1-44.373333-28.544 113.450667 113.450667 0 0 1-28.501334-44.330667c-5.248-13.568-11.392-33.792-13.141333-71.082667-1.792-40.362667-2.218667-52.650667-2.218667-155.349333s0.426667-114.56 2.218667-155.349333c1.706667-37.290667 7.893333-57.941333 13.141333-71.082667 7.04-18.005333 15.36-30.72 28.544-44.373333a113.408 113.408 0 0 1 44.330667-28.501334c13.568-5.248 33.792-11.392 71.082667-13.141333 40.789333-1.792 52.650667-2.218667 155.349333-2.218667zM512 128c-104.448 0-117.162667 0.426667-158.421333 2.176-40.832 2.218667-68.906667 8.362667-93.013334 18.005333a183.936 183.936 0 0 0-68.053333 44.330667 183.936 183.936 0 0 0-44.330667 68.010667c-9.642667 24.149333-15.786667 52.224-18.005333 93.013333C128.469333 394.88 128 407.594667 128 512s0.426667 117.162667 2.176 158.421333c1.792 40.832 8.362667 68.906667 18.005333 93.013334 9.642667 25.472 22.826667 46.549333 44.330667 68.053333 21.504 21.504 42.581333 34.688 68.010667 44.330667 24.576 9.642667 52.224 15.786667 93.013333 18.005333 40.832 1.706667 54.016 2.176 158.464 2.176s117.162667-0.426667 158.421333-2.176c40.832-1.792 68.906667-8.362667 93.013334-18.005333a183.936 183.936 0 0 0 68.053333-44.330667 183.936 183.936 0 0 0 44.330667-68.010667c9.642667-24.576 15.786667-52.224 18.005333-93.013333 1.706667-40.832 2.176-54.016 2.176-158.464s-0.426667-117.162667-2.176-158.421333c-1.792-40.832-8.362667-68.906667-18.005333-93.013334a183.978667 183.978667 0 0 0-44.330667-68.053333 183.936 183.936 0 0 0-68.010667-44.330667c-24.576-9.642667-52.224-15.786667-93.013333-18.005333C629.12 128.469333 616.405333 128 512 128z">
            </path>
            <path
                d="M512 314.965333a197.034667 197.034667 0 1 0 0 394.069334 197.034667 197.034667 0 0 0 0-394.069334z m0 325.162667A128.298667 128.298667 0 0 1 383.872 512 128.298667 128.298667 0 0 1 512 383.872 128.298667 128.298667 0 0 1 640.128 512 128.298667 128.298667 0 0 1 512 640.128zM716.928 353.152a46.08 46.08 0 1 0 0-92.16 46.08 46.08 0 0 0 0 92.16z">
            </path>
        </symbol>
        <symbol id="icon-h-reddit" viewBox="0 0 1024 1024">
            <path
                d="M592.469333 643.285333c-17.194667 17.194667-54.058667 23.338667-80.256 23.338667-26.24 0-63.104-6.144-80.298666-23.338667a10.368 10.368 0 0 0-14.72 0 10.368 10.368 0 0 0 0 14.72c27.434667 27.050667 79.445333 29.098667 95.018666 29.098667 15.573333 0 67.584-2.048 95.018667-29.482667a10.368 10.368 0 0 0 0-14.762666 10.794667 10.794667 0 0 0-14.762667 0.426666zM464.298667 551.936a40.192 40.192 0 0 0-40.149334-40.106667 40.192 40.192 0 0 0-40.149333 40.106667c0 22.101333 18.005333 40.106667 40.106667 40.106667 22.186667 0 40.192-18.005333 40.192-40.106667z">
            </path>
            <path
                d="M512.213333 128a384.213333 384.213333 0 0 0 0 768.426667 384 384 0 0 0 384.213334-384.213334C896 300.032 724.394667 128 512.213333 128z m222.805334 435.413333c0.853333 5.333333 1.237333 11.050667 1.237333 16.768 0 86.442667-100.352 156.074667-224.042667 156.074667-123.733333 0-224.042667-69.632-224.042666-156.074667 0-5.717333 0.426667-11.434667 1.194666-16.768a55.594667 55.594667 0 0 1-33.152-51.2 56.192 56.192 0 0 1 95.018667-40.533333c38.912-28.288 92.586667-45.909333 152.362667-47.530667 0-0.853333 28.288-133.973333 28.288-133.973333 0-2.432 1.621333-4.906667 3.669333-6.101333 2.048-1.664 4.906667-2.048 7.765333-1.664l93.013334 20.053333a40.234667 40.234667 0 0 1 35.626666-22.485333c22.101333 0 40.106667 17.578667 40.106667 40.106666s-18.005333 40.149333-40.106667 40.149334a39.68 39.68 0 0 1-39.722666-38.101334l-83.584-18.005333-25.386667 120.021333c58.965333 2.048 111.786667 20.053333 149.930667 47.488a55.893333 55.893333 0 0 1 95.018666 40.149334c0 23.338667-13.952 42.624-33.194666 51.626666z">
            </path>
            <path
                d="M600.277333 512.213333a40.192 40.192 0 0 0-40.149333 40.106667c0 22.144 18.005333 40.149333 40.106667 40.149333 22.186667 0 40.192-18.005333 40.192-40.106666a40.746667 40.746667 0 0 0-40.149334-40.149334z">
            </path>
        </symbol>
        <symbol id="icon-h-facebook" viewBox="0 0 1024 1024">
            <path
                d="M896 514.688c0 192.512-140.501333 352.426667-324.010667 381.738667V626.346667h89.728l16.768-111.701334h-106.069333v-72.533333c0-30.549333 14.762667-60.629333 62.293333-60.629333h48.725334V286.72s-44.245333-7.424-86.016-7.424c-87.68 0-145.408 53.589333-145.408 150.058667v85.333333H354.517333v111.701333h97.493334v270.037334A386.688 386.688 0 0 1 128 514.688C128 301.141333 300.032 128 512.213333 128 724.394667 128 896 301.141333 896 514.688z">
            </path>
            <path
                d="M896 514.688c0 192.512-140.501333 352.426667-324.010667 381.738667V626.346667h89.728l16.768-111.701334h-106.069333v-72.533333c0-30.549333 14.762667-60.629333 62.293333-60.629333h48.725334V286.72s-44.245333-7.424-86.016-7.424c-87.68 0-145.408 53.589333-145.408 150.058667v85.333333H354.517333v111.701333h97.493334v270.037334A386.688 386.688 0 0 1 128 514.688C128 301.141333 300.032 128 512.213333 128 724.394667 128 896 301.141333 896 514.688z">
            </path>
        </symbol>
        <symbol id="icon-h-twitter" viewBox="0 0 1024 1024">
            <path
                d="M369.450667 810.666667c289.706667 0 448.298667-246.016 448.298666-459.221334 0-6.826667 0-13.653333-0.426666-20.906666A323.328 323.328 0 0 0 896 247.04c-28.288 12.8-58.709333 21.333333-90.752 25.6a163.157333 163.157333 0 0 0 69.546667-89.6c-30.421333 18.773333-64.128 32-100.352 39.253333A153.6 153.6 0 0 0 659.626667 170.666667c-87.04 0-157.781333 72.490667-157.781334 161.578666 0 12.8 1.664 24.746667 4.181334 36.693334-130.730667-6.4-246.869333-71.210667-324.693334-168.832a164.608 164.608 0 0 0-21.248 81.408c0 55.893333 27.904 105.344 69.973334 134.314666a155.221333 155.221333 0 0 1-71.210667-20.053333v2.133333c0 78.08 54.528 143.701333 126.122667 158.208a148.906667 148.906667 0 0 1-41.642667 5.546667c-9.984 0-19.968-0.853333-29.525333-2.986667 19.968 64.384 78.250667 110.848 147.328 112.128a310.784 310.784 0 0 1-195.626667 69.12c-12.501333 0-25.386667-0.426667-37.461333-2.133333A435.456 435.456 0 0 0 369.450667 810.666667z">
            </path>
        </symbol>
        <symbol id="icon-h-telegram" viewBox="0 0 1024 1024">
            <path
                d="M512 128c-212.053333 0-384 171.946667-384 383.573333C128 723.626667 299.946667 896 512 896s384-172.373333 384-384.426667C896 299.946667 724.053333 128 512 128z m189.141333 241.109333c-2.474667 35.626667-68.352 301.738667-68.352 301.738667s-4.096 15.530667-18.432 15.957333a24.746667 24.746667 0 0 1-18.858666-7.381333c-15.146667-12.672-49.493333-37.248-81.877334-59.733333-1.194667 1.194667-2.432 2.432-4.096 3.669333-7.338667 6.528-18.389333 15.957333-30.293333 27.434667-4.48 4.096-9.386667 8.576-14.293333 13.482666l-0.426667 0.426667a85.632 85.632 0 0 1-7.381333 6.528c-15.957333 13.098667-17.578667 2.048-17.578667-3.669333l8.576-93.738667v-0.853333l0.426667-0.810667c0.426667-1.194667 1.237333-1.621333 1.237333-1.621333s167.424-148.992 171.946667-164.992c0.384-0.810667-0.853333-1.621333-2.901334-0.810667-11.050667 3.669333-203.861333 125.696-225.152 139.178667-1.237333 0.853333-4.906667 0.426667-4.906666 0.426666l-93.738667-30.72s-11.093333-4.48-7.381333-14.72c0.853333-2.048 2.048-4.096 6.570666-6.954666 20.864-14.762667 384-145.322667 384-145.322667s10.24-3.285333 16.341334-1.28c2.858667 1.28 4.522667 2.474667 6.144 6.570667 0.426667 1.664 0.853333 4.949333 0.853333 8.618666 0 2.048-0.426667 4.48-0.426667 8.576z">
            </path>
        </symbol>
        <symbol id="icon-h-Earnbonus" viewBox="0 0 4608 1024">
            <path
                d="M384 0a192 192 0 0 0-192 192v128L0 510.72 192 704v128a192 192 0 0 0 192 192h4032a192 192 0 0 0 192-192V192a192 192 0 0 0-192-192H384z"
                fill="#F0B90B"></path>
            <path
                d="M793.344 824.32v-76.8H536.832V590.848h232.704v-76.8H536.832V365.056h256.512v-76.8H450.048v536.064h343.296zM1238.592 824.32v-68.352h-42.24V555.52c0-89.088-57.6-139.776-160.512-139.776-77.568 0-124.416 33.024-150.528 77.568l49.92 45.312c19.968-31.488 48.384-54.528 95.232-54.528 56.064 0 82.176 28.416 82.176 76.8v33.792h-72.192c-111.36 0-170.496 40.704-170.496 119.808 0 72.192 46.848 119.04 129.024 119.04 58.368 0 101.376-26.112 116.736-76.032h3.84c5.376 39.168 28.416 66.816 72.192 66.816h46.848z m-215.808-54.528c-41.472 0-67.584-18.432-67.584-53.76v-13.824c0-34.56 28.416-53.76 86.784-53.76h70.656v57.6c0 39.168-38.4 63.744-89.856 63.744zM1404.352 824.32V569.344c0-41.472 36.864-63.744 102.912-63.744h33.024V424.96h-22.272c-63.744 0-98.304 36.096-109.824 76.8h-3.84v-76.8h-83.712v399.36h83.712zM1698.368 824.32V557.056c0-46.848 43.008-69.12 86.784-69.12 51.456 0 75.264 31.488 75.264 93.696v242.688h83.712V570.88c0-98.304-48.384-155.136-129.792-155.136-61.44 0-95.232 32.256-112.128 75.264h-3.84V424.96h-83.712v399.36h83.712zM2241.664 824.32h83.712v-66.048h3.84c16.896 46.848 59.136 75.264 112.128 75.264 100.608 0 158.976-77.568 158.976-208.896 0-131.328-58.368-208.896-158.976-208.896-52.992 0-95.232 27.648-112.128 75.264h-3.84V256h-83.712v568.32z m174.336-62.976c-50.688 0-90.624-27.648-90.624-68.352V556.288c0-40.704 39.936-68.352 90.624-68.352 57.6 0 96 40.704 96 102.144v69.12c0 61.44-38.4 102.144-96 102.144zM2852.8 833.536c111.36 0 183.552-81.408 183.552-208.896 0-127.488-72.192-208.896-183.552-208.896s-183.552 81.408-183.552 208.896c0 127.488 72.192 208.896 183.552 208.896z m0-69.12c-56.832 0-95.232-35.328-95.232-105.984V590.848c0-70.656 38.4-105.984 95.232-105.984s95.232 35.328 95.232 105.984v67.584c0 70.656-38.4 105.984-95.232 105.984zM3213.376 824.32V557.056c0-46.848 43.008-69.12 86.784-69.12 51.456 0 75.264 31.488 75.264 93.696v242.688h83.712V570.88c0-98.304-48.384-155.136-129.792-155.136-61.44 0-95.232 32.256-112.128 75.264h-3.84V424.96H3129.6v399.36h83.712zM3817.088 824.32h83.712V424.96h-83.712v267.264c0 46.848-42.24 69.12-85.248 69.12-51.456 0-76.8-32.256-76.8-92.928V424.96h-83.712v254.208c0 98.304 48.384 154.368 130.56 154.368 66.048 0 97.536-36.096 112.128-75.264h3.072v66.048zM4147.392 833.536c96 0 158.208-51.456 158.208-128.256 0-64.512-39.168-102.912-126.72-115.968l-36.864-4.608c-42.24-6.912-61.44-20.736-61.44-51.456 0-29.952 21.504-49.92 67.584-49.92 43.008 0 76.8 20.736 97.536 45.312l51.456-49.152c-36.096-39.936-76.8-63.744-148.992-63.744-87.552 0-148.224 45.312-148.224 122.88 0 73.728 49.92 109.056 131.328 119.04l36.864 4.608c41.472 5.376 56.832 24.576 56.832 49.92 0 33.792-24.576 53.76-72.96 53.76-47.616 0-83.712-21.504-112.896-56.832l-53.76 49.152c37.632 46.848 86.784 75.264 162.048 75.264z"
                fill="#212833"></path>
        </symbol>
        <symbol id="icon-h-exchange" viewBox="0 0 1024 1024">
            <path
                d="M618.666667 192c-89.6 0-166.4 55.466667-196.266667 136.533333 29.866667 0 59.733333 8.533333 85.333333 21.333334 21.333333-42.666667 64-72.533333 110.933334-72.533334 68.266667 0 123.733333 55.466667 123.733333 123.733334 0 51.2-29.866667 93.866667-72.533333 110.933333 12.8 25.6 17.066667 55.466667 21.333333 85.333333 81.066667-29.866667 136.533333-106.666667 136.533333-196.266666 4.266667-115.2-89.6-209.066667-209.066666-209.066667zM401.066667 499.2c68.266667 0 123.733333 55.466667 123.733333 123.733333 0 68.266667-55.466667 123.733333-123.733333 123.733334-68.266667 0-123.733333-55.466667-123.733334-123.733334 0-68.266667 55.466667-123.733333 123.733334-123.733333z m0-85.333333c-115.2 0-209.066667 93.866667-209.066667 209.066666s93.866667 209.066667 209.066667 209.066667 209.066667-93.866667 209.066666-209.066667-93.866667-209.066667-209.066666-209.066666zM870.4 661.333333v213.333334h-213.333333v-85.333334h128v-128h85.333333zM149.333333 149.333333h213.333334v85.333334h-128v128h-85.333334v-213.333334z">
            </path>
            <path
                d="M870.4 874.666667h-213.333333v-85.333334h128v-128h85.333333v213.333334zM362.666667 149.333333v85.333334h-128v128h-85.333334v-213.333334h213.333334z">
            </path>
        </symbol>
        <symbol id="icon-h-Orders" viewBox="0 0 1024 1024">
            <path
                d="M414.165333 543.104h192v-85.333333h-192v85.333333zM414.165333 713.770667h192v-85.333334h-192v85.333334z">
            </path>
            <path
                d="M576 140.8H243.2v746.666667h533.333333V337.066667l-200.533333-196.266667z m115.2 661.333333H328.533333V226.133333h213.333334v149.333334h149.333333v426.666666z">
            </path>
        </symbol>
        <symbol id="icon-h-buycrypto" viewBox="0 0 1066 1024">
            <path
                d="M564.86570704 475.59111111V384.32616334a105.34305223 105.34305223 0 0 1 55.82696221 33.39908665l1.50490112 1.55344668 54.6618789-49.71027-1.16508445-1.55344555a155.73295445 155.73295445 0 0 0-103.88669667-51.65207779V262.33211221h-68.93416335V316.36290333c-72.13814557 8.93231445-113.20737223 48.93354667-113.20737109 110.29466112 0 58.69112889 39.12741888 95.58547001 120.53769444 112.67337443v99.46908445a132.23708445 132.23708445 0 0 1-77.13829888-42.37994667l-1.55344669-1.16508445-52.72007111 48.20536889-1.55344555 1.16508445 1.55344555 1.55344668a183.54934557 183.54934557 0 0 0 124.0329489 60.58439111V759.58044445h68.98270778v-55.14733a118.83861333 118.83861333 0 0 0 78.83738112-37.08852224 119.27552 119.27552 0 0 0 32.42818332-81.02191331c0-57.47749888-36.40888889-91.65331001-118.20752555-110.68302223z m35.63216555 117.33371222a45.53538333 45.53538333 0 0 1-35.63216555 44.32175445v-85.43952555c31.74855111 10.43721443 35.63216555 28.30184334 35.63216555 41.1177711z m-90.29404444-129.71273444c-27.1367589-8.15559111-38.01088-19.07825778-38.01088-38.83614777 0-22.18515001 12.42756779-35.38944 38.01088-41.21486222v80.05100999z">
            </path>
            <path
                d="M534.96187259 201.31081443c61.31256889 0 121.21732779 18.25299001 172.18977223 52.38025558a311.32027221 311.32027221 0 0 1 46.99173888 477.97589333 309.7182811 309.7182811 0 0 1-337.7773989 67.33217109 310.10664334 310.10664334 0 0 1-139.13049998-114.4210011A311.17463666 311.17463666 0 0 1 225.0008648 512 311.36881778 311.36881778 0 0 1 315.87745147 292.43012779 309.96100779 309.96100779 0 0 1 534.96187259 201.31081443z m0-77.67229553a386.90512555 386.90512555 0 0 0-215.29789668 65.43890887 388.16730112 388.16730112 0 0 0-142.72284444 174.27721557 389.18675001 389.18675001 0 0 0 83.98317113 423.26546887 386.6624 386.6624 0 0 0 422.29456555 84.17735112 387.63330333 387.63330333 0 0 0 173.93739889-143.01411556 388.99256889 388.99256889 0 0 0-48.20536889-490.40345998A387.39057778 387.39057778 0 0 0 534.96187259 123.6385189z">
            </path>
        </symbol>
        <symbol id="icon-h-TopWallet" viewBox="0 0 1024 1024">
            <path
                d="M259.968 379.264c-24.192 0-43.989333-18.688-43.989333-41.472 0-22.826667 19.797333-41.514667 43.946666-41.514667h548.096V213.333333H259.968C186.88 213.333333 128 268.928 128 337.792v348.416C128 755.072 186.922667 810.666667 259.968 810.666667H896V379.264H259.968z m548.053333 348.458667H259.968c-24.192 0-43.989333-18.688-43.989333-41.514667v-231.04c14.08 4.565333 29.013333 7.04 43.946666 7.04h548.096v265.514667z">
            </path>
            <path d="M676.053333 536.490667l-61.994666 58.453333 61.994666 58.922667 62.464-58.88-62.464-58.496z">
            </path>
        </symbol>
        <symbol id="icon-h-GooglePlay" viewBox="0 0 1024 1024">
            <path
                d="M144.64 910.72l399.232-398.336L144.64 113.322667C134.826667 129.152 128 154.88 128 191.914667v640.170666c0 37.034667 6.826667 62.72 16.64 78.634667zM712.533333 680.917333l-130.858666-131.498666L193.024 938.666667h3.797333c33.28 0 61.994667-12.117333 108.117334-37.034667l407.594666-220.714667zM761.642667 369.493333l-142.165334 142.890667 142.165334 142.08 86.186666-46.848c31.786667-17.408 80.170667-49.152 80.170667-95.232 0-46.848-48.384-78.634667-80.170667-96l-86.186666-46.848zM193.024 85.333333l388.693333 389.248L712.533333 343.04 304.938667 122.368C258.816 97.408 230.058667 85.333333 196.821333 85.333333h-3.797333z">
            </path>
        </symbol>
        <symbol id="icon-h-Apple" viewBox="0 0 1024 1024">
            <path
                d="M692.992 85.333333c5.845333 50.517333-15.189333 100.181333-45.952 136.789334-32.085333 36.010667-83.498667 63.488-133.546667 59.946666-6.528-48.512 18.816-100.181333 47.189334-131.712 32.085333-35.797333 87.765333-63.146667 132.309333-65.024z m163.797333 291.2c-5.930667 3.370667-98.090667 55.850667-97.066666 162.56 1.152 129.28 119.04 171.946667 120.405333 172.458667-0.682667 2.986667-18.432 61.610667-62.592 121.173333-36.906667 52.394667-75.605333 103.68-136.96 104.533334-29.226667 0.682667-48.938667-7.296-69.504-15.616-21.418667-8.661333-43.733333-17.706667-78.677333-17.706667-37.034667 0-60.373333 9.344-82.858667 18.346667-19.413333 7.765333-38.272 15.317333-64.768 16.341333-58.453333 2.048-103.168-55.978667-141.44-107.904-76.373333-106.026667-135.893333-298.922667-56.106667-430.122667 38.656-64.384 109.141333-105.813333 184.490667-106.922666 33.152-0.64 64.981333 11.52 92.885333 22.186666 21.333333 8.106667 40.405333 15.36 55.978667 15.36 13.696 0 32.213333-6.954667 53.802667-15.061333 34.005333-12.8 75.562667-28.501333 117.930666-24.32 28.928 0.853333 111.445333 10.88 164.608 84.608l-0.128 0.085333z">
            </path>
        </symbol>
        <symbol id="icon-h-andriod" viewBox="0 0 1024 1024">
            <path
                d="M399.829333 150.613333c27.306667-10.453333 59.477333-16.64 98.474667-16.64 37.162667 0 68.394667 6.272 94.592 16.512l39.210667-58.794666c1.834667-3.754667 9.301333-7.466667 13.056-4.992 4.352 2.474667 3.114667 10.581333 0.597333 14.293333l-36.821333 56.490667c99.84 48.896 116.864 157.482667 117.717333 162.986666v0.213334H262.485333s15.530667-114.517333 122.581334-164.266667L345.173333 99.754667c-2.474667-3.114667-3.712-11.178667 0-13.653334 3.754667-2.56 11.221333 1.834667 13.696 4.949334l40.96 59.562666z m0 0l-0.512 0.170667h0.64l-0.128-0.170667z m-3.584 103.466667a24.277333 24.277333 0 1 1 0-48.512 24.277333 24.277333 0 0 1 0 48.512z m175.488-24.234667a24.277333 24.277333 0 1 0 48.512 0 24.277333 24.277333 0 0 0-48.512 0zM262.4 730.197333V353.664h464.298667v379.008c0 22.4-16.810667 40.448-37.333334 40.448h-46.08v126.976c0 21.162667-23.637333 38.570667-52.266666 38.570667s-52.266667-17.408-52.266667-38.570667V773.12h-84.650667v126.976c0 21.162667-23.637333 38.570667-52.266666 38.570667s-52.266667-17.408-52.266667-38.570667V773.12H302.890667c-20.565333 0-40.448-20.522667-40.448-42.922667z m-81.493333-62.250666c-28.629333 0-52.906667-24.277333-52.906667-37.973334l0.64-237.098666c0-14.293333 23.637333-38.570667 52.266667-38.570667 28.586667 0 52.266667 26.752 52.266666 40.448l-0.64 235.221333c0 13.696-23.04 37.973333-51.626666 37.973334z m631.68 0c-28.629333 0-52.906667-24.277333-52.906667-37.973334l0.597333-237.098666c0-14.293333 23.68-38.570667 52.309334-38.570667 28.586667 0 52.266667 26.752 52.266666 40.448l-0.64 235.221333c0 13.696-23.04 37.973333-51.626666 37.973334z">
            </path>
        </symbol>
        <symbol id="icon-h-settings" viewBox="0 0 1024 1024">
            <path
                d="M853.333333 468.565333v86.869334h-128v70.784h-85.333333v-70.784H170.666667v-86.869334h469.333333V398.250667h85.333333v70.314666h128zM170.666667 328.32V241.450667h128V170.666667h85.333333v70.784h469.333333v86.869333H384v70.357333H298.666667v-70.4H170.666667zM853.333333 696.106667v86.869333h-298.666666V853.333333h-85.333334v-70.4H170.666667v-86.826666h298.666666v-70.784h85.333334v70.826666h298.666666z">
            </path>
        </symbol>
        <symbol id="icon-h-Earn" viewBox="0 0 1024 1024">
            <path
                d="M698.624 725.333333H257.450667v85.333334h441.173333v-85.333334z m0-341.333333H257.450667v85.333333h441.173333V384zM654.506667 213.333333H213.333333v85.333334h441.173334V213.333333zM810.666667 554.666667H369.066667v85.333333h441.173333l0.426667-85.333333z">
            </path>
        </symbol>
        <symbol id="icon-h-market" viewBox="0 0 1024 1024">
            <path
                d="M460.8 332.8h-85.333333v503.466667h85.333333V332.8zM648.533333 503.466667h-85.333333v332.8h85.333333v-332.8zM832 192h-85.333333v640h85.333333v-640zM277.333333 704h-85.333333v128h85.333333v-128z">
            </path>
        </symbol>
        <symbol id="icon-h-Notification" viewBox="0 0 1024 1024">
            <path
                d="M788.864 561.066667v-118.613334c0-142.08-102.4-261.12-238.933333-280.32V85.333333H474.026667v80.64c-136.533333 19.2-238.933333 134.4-238.933334 276.48v118.613334L170.666667 626.346667V768h682.666666v-141.653333l-64.469333-65.28z m-11.392 130.133333H246.528v-34.133333l64.426667-65.28v-149.333334c0-111.36 91.050667-207.36 201.045333-207.36s201.002667 92.16 201.002667 207.36v149.333334l64.469333 65.28v34.133333zM682.666667 853.333333H341.333333v85.333334h341.333334v-85.333334z">
            </path>
        </symbol>
        <symbol id="icon-h-vip" viewBox="0 0 1024 1024">
            <path
                d="M767.424 192H254.336L0 446.72 511.424 960 1024 446.72 767.424 192zM158.72 446.72l142.336-142.528h419.712l144.064 143.04-353.28 353.472L158.592 446.72z">
            </path>
        </symbol>
        <symbol id="icon-h-top-menu-s" viewBox="0 0 1024 1024">
            <path
                d="M599.381333 424.618667H424.618667v174.762666h174.762666V424.618667z m0-253.952H424.618667v174.293333h174.762666V170.666667z m0 508.373333H424.618667V853.333333h174.762666v-174.293333zM344.96 424.618667H170.666667v174.762666h174.293333V424.618667zM853.333333 170.666667h-174.293333v174.293333H853.333333V170.666667z m0 508.373333h-174.293333V853.333333H853.333333v-174.293333z m-508.373333 0H170.666667V853.333333h174.293333v-174.293333zM853.333333 424.618667h-174.293333v174.762666H853.333333V424.618667zM344.96 170.666667H170.666667v174.293333h174.293333V170.666667z">
            </path>
        </symbol>
        <symbol id="icon-h-Close" viewBox="0 0 1024 1024">
            <path
                d="M896 811.264l-84.736 84.224-299.712-299.2L212.736 896l-84.224-84.736L427.264 512 128 212.736l84.736-84.288 298.816 299.264L811.264 128l83.84 84.736L596.16 512 896 811.264z">
            </path>
        </symbol>
        <symbol id="icon-h-download" viewBox="0 0 1024 1024">
            <path
                d="M695.466667 209.066667v618.666666H294.4V209.066667h401.066667zM776.533333 128H213.333333v780.8h567.466667V128h-4.266667z">
            </path>
            <path
                d="M648.533333 499.2l-153.6 149.333333L341.333333 499.2l55.466667-55.466667 59.733333 76.8V290.133333h76.8v230.4l59.733334-76.8 55.466666 55.466667zM400.682667 687.317333v76.8h192v-76.8h-192z">
            </path>
        </symbol>
        <symbol id="icon-h-binancecn" viewBox="0 0 2688 1024">
            <path
                d="M1232 418.005333h244.010667V310.016l-256 9.984c-5.973333-34.986667-11.008-66.986667-17.024-96 186.026667-2.005333 400-9.984 644.010666-25.002667l16 93.013334-281.002666 12.970666v112h253.013333v272a138.410667 138.410667 0 0 1-24.021333 88.021334c-14.976 20.010667-38.997333 31.018667-62.976 32.981333-27.008 2.005333-64 2.005333-111.018667 2.005333a1013.504 1013.504 0 0 0-18.986667-89.002666l71.978667 2.986666c32 0 48-15.957333 48-44.970666V509.013333h-157.013333v381.013334h-103.978667v-381.013334h-148.010667v308.992h-96V418.005333h-0.981333zM1952 466.986667h217.002667c16-34.986667 32-70.997333 47.018666-107.946667l114.986667 29.952-42.026667 77.013333h372.053334v90.026667h-131.029334a428.330667 428.330667 0 0 1-95.018666 161.962667l205.994666 77.994666-50.986666 96-244.010667-107.008c-80.981333 45.013333-195.968 80-343.978667 104.021334a1762.474667 1762.474667 0 0 0-50.986666-96c93.013333-9.002667 185.002667-29.013333 272.981333-59.008a6347.52 6347.52 0 0 0-169.984-66.986667c23.978667-36.010667 48-73.002667 67.968-111.018667h-170.965333v-89.002666h0.981333z m283.008-262.997334l117.973333-23.978666 27.008 76.970666h255.018667v157.013334H2530.986667v-66.986667h-448v64.981333h-102.997334V256.981333h276.010667c-6.997333-17.962667-13.994667-35.968-20.992-52.992z m-41.002667 425.002667l136.96 50.986667a271.189333 271.189333 0 0 0 85.034667-122.965334h-178.005333c-16 26.026667-30.976 50.005333-43.989334 71.978667zM230.997333 512L116.053333 628.010667 0 512l116.010667-116.010667L230.997333 512zM512 230.997333l197.973333 197.973334 116.053334-115.968-199.04-196.992L512 0 395.989333 116.010667l-197.973333 197.973333 115.968 116.053333L512 230.954667z m395.989333 164.992L792.021333 512l115.968 116.010667L1024 512l-116.010667-116.010667zM512 791.978667l-198.997333-197.973334L197.973333 709.973333l197.973334 197.973334L512 1024l116.010667-116.010667 196.992-197.973333-114.986667-116.053333L512 792.064z m0-164.992l116.010667-115.968L512 395.946667 395.989333 512 512 626.986667z">
            </path>
        </symbol>
        <symbol id="icon-h-binanceen" viewBox="0 0 5120 1024">
            <path
                d="M230.997333 512L116.053333 626.986667 0 512l116.010667-116.010667L230.997333 512zM512 230.997333l197.973333 197.973334 116.053334-115.968L512 0 197.973333 314.026667l116.053334 115.968L512 230.997333z m395.989333 164.992L793.002667 512l116.010666 116.010667L1024.981333 512l-116.992-116.010667zM512 793.002667l-197.973333-198.997334-116.053334 116.010667L512 1024l314.026667-314.026667-116.053334-115.968L512 793.002667z m0-165.973334l116.010667-116.053333L512 396.032 395.989333 512 512 626.986667z m1220.010667 11.946667v-1.962667c0-75.008-40.021333-113.024-105.002667-138.026666 39.978667-21.973333 73.984-58.026667 73.984-121.002667v-1.962667c0-88.021333-70.997333-145.024-185.002667-145.024h-260.992v561.024h267.008c126.976 0.981333 210.005333-51.029333 210.005334-153.002666z m-154.026667-239.957333c0 41.984-34.005333 58.965333-89.002667 58.965333h-113.962666V338.986667h121.984c52.010667 0 80.981333 20.992 80.981333 58.026666v2.005334z m31.018667 224c0 41.984-32.981333 61.013333-87.04 61.013333h-146.944v-123.050667h142.976c63.018667 0 91.008 23.04 91.008 61.013334v1.024z m381.994666 169.984V230.997333h-123.989333v561.024h123.989333v0.981334z m664.021334 0V230.997333h-122.026667v346.026667l-262.997333-346.026667h-114.005334v561.024h122.026667v-356.010666l272 356.992h104.96z m683.946666 0L3098.026667 228.010667h-113.962667l-241.024 564.992h127.018667l50.986666-125.994667h237.013334l50.986666 125.994667h130.005334z m-224.981333-235.008h-148.992l75.008-181.973334 73.984 181.973334z m814.037333 235.008V230.997333h-122.026666v346.026667l-262.997334-346.026667h-114.005333v561.024h122.026667v-356.010666l272 356.992h104.96z m636.970667-91.008l-78.976-78.976c-44.032 39.978667-83.029333 65.962667-148.010667 65.962666-96 0-162.986667-80-162.986666-176v-2.986666c0-96 67.968-174.976 162.986666-174.976 55.978667 0 100.010667 23.978667 144 62.976l78.976-91.008c-51.968-50.986667-114.986667-86.997333-220.970666-86.997334-171.989333 0-292.992 130.986667-292.992 290.005334V512c0 160.981333 122.965333 288.981333 288 288.981333 107.989333 1.024 171.989333-36.992 229.973333-98.986666z m527.018667 91.008v-109.994667h-305.024v-118.016h265.002666v-109.994667h-265.002666V340.992h301.013333V230.997333h-422.997333v561.024h427.008v0.981334z">
            </path>
        </symbol>
    </svg>
    <div id="__APP">

        <div class="css-tq0shg">
            <header class="css-1rj0lsg">&nbsp;&nbsp;&nbsp;<a href="https://www.Wecoin Trade.com/en">
                    <img src="/logo.png">
                </a>

                <div class="css-1w2cmbz"><span class="hoverstatus css-1qqh4qo">&nbsp;&nbsp;&nbsp;&nbsp;Buy Crypto<div
                            class="css-1rktosy">USD
                        </div><svg xmlns="http://www.w3.org/2000/svg" class="icon-dropdown-arrow css-qy1c27"
                            fill="currentColor">
                            <use xlink:href="#icon-h-dropdown-arrow"></use>
                        </svg></span></div><a target="_self" id="ba-tableMarkets"
                    href="https://www.Wecoin Trade.com/en/markets" class="css-1ke7bwx">Market</a>
                <div class="dropdown"><a target="_self" id="ba-tableMarkets"
                        href="https://www.Wecoin Trade.com/en/markets" class="css-1ke7bwx">Live Trade</a>
                    <div class="dropdown-content"><a href="/user/spot/">Spot</a><a
                            href="/user/margin/">Margin</a></div>
                </div>

                <div class="dropdown"><a target="_self" id="ba-tableMarkets"
                        href="https://www.Wecoin Trade.com/en/markets" class="css-1ke7bwx">Demo Trade</a>
                    <div class="dropdown-content"><a href="/user/spot/">Spot</a><a
                            href="/user/margin/">Margin</a></div>
                </div>

                <div class="css-1h690ep"></div>
                    <div class="css-1h690ep"></div><div class="dropdown"><a id="header_login" href="../login/" class="css-1ke7bwx">Wallet
                    </a><div class="dropdown-content"><a href="/user/wallet/spot/">Spot Balance</a><a href="/user/wallet/margin/">Margin Balance</a></div></div>
                    <div class="dropdown"><a href="../register/" class="css-1ke7bwx">Orders</a><div class="dropdown-content"><a href="/user/spot#openorder">Spot Order</a>
                        <a href="/user/margin#openorder">Margin Order</a></div></div>

                <div class="dropdown"><a href="/user/profile.html" class="css-1ke7bwx"><img
                            src="/profile.png" height="20" width="20" /></a>
                    <div class="dropdown-content"><a href="/user/spot/">Dashboard</a>
                        <a href="/user/margin/">Fee Structure</a><a
                            href="/user/margin/">Logout</a>
                    </div>
                </div>
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

                    <div class="css-3miali"><a data-bn-type="link" class="css-6ijtmk" href="/user/">
                            <div class="css-10j588g"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                    fill="none" class="css-hd27fe">
                                    <path
                                        d="M12 11.673c1.914 0 3.465-1.494 3.465-3.337C15.465 6.494 13.914 5 12 5S8.535 6.494 8.535 8.336c0 1.843 1.551 3.337 3.465 3.337zM15.089 13.008H8.91c-2.161 0-3.9 1.673-3.911 3.755v3.03h14v-3.03c-.012-2.082-1.75-3.755-3.911-3.755zm1.562 4.524H7.349v-.77c.012-.825.705-1.492 1.562-1.492h6.178c.857 0 1.55.667 1.562 1.492v.77z"
                                        fill="currentColor"></path>
                                </svg>
                                <div data-bn-type="text" class="css-iizq59">Dashboard</div>
                            </div>
                        </a><a data-bn-type="link" href="/user/payment" class="css-6ijtmk">
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
                        </a><a data-bn-type="link" href="/user/security" class="css-6ijtmk">
                            <div class="css-10j588g"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                    fill="none" class="css-hd27fe">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M4 5h16v9.58l-8 4.572-8-4.572V5zm2 2v6.42l6 3.428 6-3.428V7H6z"
                                        fill="currentColor"></path>
                                </svg>
                                <div data-bn-type="text" class="css-1n0484q">Security</div>
                            </div>
                        </a>

                        <a data-bn-type="link" href="/user/settings" class="css-z87e9z">
                            <div class="css-10j588g"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                    fill="none" class="css-14thuu2">
                                    <path
                                        d="M20 10.982v2.036h-3v1.659h-2v-1.66H4v-2.035h11V9.333h2v1.65h3zM4 7.695V5.659h3V4h2v1.659h11v2.036H9v1.649H7v-1.65H4zM20 16.316v2.035h-7V20h-2v-1.649H4v-2.035h7v-1.66h2v1.66h7z"
                                        fill="currentColor"></path>
                                </svg>
                                <div data-bn-type="text" class="css-1n0484q">Settings</div>
                            </div>
                        </a>
                        <a data-bn-type="link" href="/user/tps" class="css-6ijtmk">
                            <div class="css-10j588g"><img style="width:28px;height:28px; margin-left: 8px;" src="https://img.icons8.com/carbon-copy/100/000000/bot.png"/>
                                <div data-bn-type="text" class="css-1n0484q">Third-Party Software</div>
                            </div>
                        </a>
                        <a data-bn-type="link" href="/user/referrals" rel="noopener noreferrer"
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
                    <div class="css-1wr4jig">
                        <div class="css-15owl46"></div>
                        <div class="css-egsqt7">
                            <div class="css-1sstzk2">
                                <div class="css-ekwbtp">
                                    <div data-bn-type="text" class="css-1260v1g">USER PROFILE</div><svg
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                        class="css-156k7dn">
                                        <path
                                            d="M3 3v4.5L8.4 13v7h3.3l3.2-3.2V13l5.5-5.5V3H3zm15.4 3.7l-5.5 5.5V16l-2 2h-.5v-5.8L5 6.7V5h13.5v1.7h-.1z"
                                            fill="currentColor"></path>
                                    </svg>
                                </div>
                                <form action="" method="post">
                                <div class="css-g6j1vn">
                                    <div class="css-dsyltk">
                                        <div class="css-15nm7oo">
                                       

                                            <div class="bn-input-md css-1ej5pym"><input data-bn-type="input" value=""
                                        name="updatefname"        placeholder="first name" class="css-16fg16t">
                                                <label class="bn-input-label css-6lqe90"><b>FIRST NAME</b></label>
                                            </div>

                                            <div class="css-15nm7oo"></div>

                                            <div class="bn-input-md css-1ej5pym"><input data-bn-type="input" value=""
                                                name="updatelname"        placeholder="last name" class="css-16fg16t">
                                                <label class="bn-input-label css-6lqe90"><b>LAST NAME</b></label>
                                            </div>

                                            <div class="css-15nm7oo"></div>

                                            <div class="bn-input-md css-1ej5pym"><input data-bn-type="input" value=""
                                                name="updateno"  placeholder="Mobile Number" class="css-16fg16t">
                                                <label class="bn-input-label css-6lqe90"><b>PHONE NUMBER</b></label>
                                            </div>

                                            
                                                
                                            </div>
                                            <div class="btn-info"><button data-bn-type="button" value=""
                                                >UPDATE INFO</button>
                                        </div>
                                   
                                    </div>
                                
                                   
                                  
                                </div>
                            </form>
                                <form action="" method="post" enctype="multipart/form-data">
                                <div class="css-ekwbtp">
                                    <div data-bn-type="text" class="css-1260v1g">KYC VERIFICATION</div><svg
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                        class="css-156k7dn">
                                        <path
                                            d="M3 3v4.5L8.4 13v7h3.3l3.2-3.2V13l5.5-5.5V3H3zm15.4 3.7l-5.5 5.5V16l-2 2h-.5v-5.8L5 6.7V5h13.5v1.7h-.1z"
                                            fill="currentColor"></path>
                                    </svg>
                                </div>
                                <div class="css-g6j1vn">
                                    
                                    <div class="css-dsyltk">
                                        <div class="css-15nm7oo">
                                            <div class="bn-input-md css-1ej5pym"><input type="file" data-bn-type="input" 
                                     name="uploadfile1" placeholder="Enter a new email address" class="css-16fg16t" required="required">
                                                <label class="bn-input-label css-6lqe90"><b>SCAN YOUR VERIFICATION ID</b></label>
                                            </div>
                                           <div class="css-15nm7oo"></div>

                                            <div class="bn-input-md css-1ej5pym"><input type="file" data-bn-type="input" 
                                        name="uploadfile2" placeholder="first name" class="css-16fg16t" required="required">
                                                <label class="bn-input-label css-6lqe90"><b>UPLOAD YOUR PHOTO</b></label>
                                            </div>

                                           
                                           

                                        </div><div clas="btn-info"><input name ="upload" type="submit" value="UPLOAD FILES" >
                                        </div>
                                   
                                    </div>
                                
                                   
                                  
                                </div>
                            </form>
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
                        </div><a href="https://www.Wecoin Trade.com/user/user-support/feedback/entry"
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
   


   
    <div class="LinesEllipsis-canvas " aria-hidden="true"
        style="box-sizing: content-box; width: 329.667px; font-size: 12px; font-weight: 400; font-family: BinancePlex, Arial, sans-serif; font-style: normal; letter-spacing: normal; text-indent: 0px; white-space: normal; word-break: normal; overflow-wrap: normal; padding: 0px; position: absolute; bottom: 0px; left: 0px; height: 0px; overflow: hidden; border: medium none;">
       
    </div>
    <div class="LinesEllipsis-canvas " aria-hidden="true"
        style="box-sizing: content-box; width: 329.667px; font-size: 12px; font-weight: 400; font-family: BinancePlex, Arial, sans-serif; font-style: normal; letter-spacing: normal; text-indent: 0px; white-space: normal; word-break: normal; overflow-wrap: normal; padding: 0px; position: absolute; bottom: 0px; left: 0px; height: 0px; overflow: hidden; border: medium none;">
        
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
