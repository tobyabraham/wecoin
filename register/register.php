<?php
extract($_POST);
if(empty($_POST['email'])) {  
     
    header("location: ../register");  
    
}
if(!empty($_POST['email'])) {
    $conn=mysqli_connect('remotemysql.com','AI9hgEKDPt','nS6lsKdyHE','AI9hgEKDPt') or die('Could not Connect My Sql:'.mysql_error());
    $rs=mysqli_query($conn,"select * from users WHERE email='$email'");
   
    
    if (mysqli_num_rows($rs)>0)
    {
    ?>
<!DOCTYPE html>
<html dir="ltr" lang="en-us">

<head>
    <meta charset="utf-8">
    <meta http-equiv="etag" content="841cad6db8e0cc016af1d4ae557662f9dea7ddab">
    <link rel="shortcut icon" type="image/x-icon" href="../logo.ico">
    <meta name="viewport"
        content="width=device-width,initial-scale=1.0,maximum-scale=1.0,minimum-scale=1.0,user-scalable=no">
    <meta name="format-detection" content="telephone=no">
    <meta name="360-site-verification" content="e362348efd31ed6e77bcf0ba4963a6de">
    <meta name="sogou_site_verification" content="tKz9Rld4qH">
    <meta property="og:url" content="https://accounts.Wecoin Trade.com/en">
    <meta name="og:type" content="website">
    <title data-shuvi-head="true">Create Account | WeCoin Trade</title>
    <meta property="og:title" content="Log In | Wecoin Trade" data-shuvi-head="true">
    <meta property="og:site_name" content="Wecoin Trade" data-shuvi-head="true">
    <meta property="og:image" content="https://public.bnbstatic.com/static/images/common/ogImage.jpg"
        data-shuvi-head="true">
    <meta property="twitter:title" content="Log In | Wecoin Trade" data-shuvi-head="true">
    <meta property="twitter:site" content="Wecoin Trade" data-shuvi-head="true">
    <meta property="twitter:image" content="https://public.bnbstatic.com/static/images/common/ogImage.jpg"
        data-shuvi-head="true">
    <meta property="twitter:image:src" content="https://public.bnbstatic.com/static/images/common/ogImage.jpg"
        data-shuvi-head="true">
    <meta property="twitter:card" content="summary_large_image" data-shuvi-head="true">
    <meta name="robots" content="index" data-shuvi-head="true">
    <meta name="description" content="login-description" data-shuvi-head="true">
    <meta property="og:description" content="login-description" data-shuvi-head="true">
    <meta property="twitter:description" content="login-description" data-shuvi-head="true">
    <link rel="preload" href="https://bin.bnbstatic.com/static/chunks/page-0042.473274e1.js" as="script">
    <script async="" src="https://bin.bnbstatic.com/static/sensors/sensorsdata@1.15.26.js"></script>
    <script async="" src="https://www.googletagmanager.com/gtm.js?id=GTM-M86QHGF"></script>
    <script nonce="">window.ga = window.ga || function () { (ga.q = ga.q || []).push(arguments) }; ga.l = +new Date; ga('create', 'UA-162512367-1', 'auto');
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
    <script async="" src="https://www.google-analytics.com/analytics.js" nonce=""></script>
    <script nonce="">(function (w, d, s, l, i) {
            w[l] = w[l] || []; w[l].push({
                'gtm.start':
                    new Date().getTime(), event: 'gtm.js'
            }); var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s), dl = l != 'dataLayer' ? '&l=' + l : ''; j.async = true; j.src =
                    'https://www.googletagmanager.com/gtm.js?id=' + i + dl; f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-M86QHGF');</script>
    <script nonce="">window.dataLayer = []</script>
    <link rel="preload" href="https://bin.bnbstatic.com/static/fonts/index.min.css" as="style">
    <link rel="stylesheet" type="text/css" href="https://bin.bnbstatic.com/static/fonts/index.min.css">
    <link rel="preload" href="https://bin.bnbstatic.com/static/fonts/font.min.css" as="style">
    <link rel="stylesheet" type="text/css" href="https://bin.bnbstatic.com/static/fonts/font.min.css">
    <iframe hidden=""></iframe>
    <style data-emotion="css-global"></style>
    <style data-emotion="css-global"></style>
    <style data-emotion-css="1wsh2kb">
        .css-xvxpe5 {
            box-sizing: border-box;
            margin: 0px 0px 24px;
            min-width: 0px;
            width: 100%;
        }

        .css-hiy16i {
            box-sizing: border-box;
            margin: 0px;
            min-width: 0px;
            width: 100%;
            position: relative;
            min-height: 12px;
        }

        * {
            box-sizing: border-box;
        }

        .css-1i3ha4y {
            color: #1E2329;
        }

        .css-1d61qm3 {
            box-sizing: border-box;
            margin: 0px;
            min-width: 0px;
            display: flex;
            width: 100%;
            color: rgb(71, 77, 87);
            font-size: 14px;
            -moz-box-align: center;
            align-items: center;
        }

        .css-efmwvx {
            box-sizing: border-box;
            margin: 0px 4px 0px 0px;
            margin-right: 4px;
            margin-left: 0px;
            min-width: 0px;
            flex-shrink: 0;
            width: 20px;
            height: 20px;
            position: relative;
            top: -4px;
        }

        * {
            box-sizing: border-box;
        }

        .css-1d61qm3 {
            color: rgb(71, 77, 87);
            font-size: 14px;
        }

        .css-efmwvx input:checked~svg {
            border: medium none;
            background-color: rgb(236, 172, 74);
            fill: rgb(255, 255, 255);
        }

        .css-efmwvx>svg {
            box-sizing: border-box;
            cursor: pointer;
            border: 1px solid rgb(183, 189, 198);
            border-radius: 2px;
            max-width: 100%;
            max-height: 100%;
            background-color: transparent;
            fill: transparent;
        }

        .css-1bumqwn {
            box-sizing: border-box;
            margin: 0px;
            min-width: 0px;
            fill: currentcolor;
        }

        * {
            box-sizing: border-box;
        }

        .css-1d61qm3 {
            color: rgb(71, 77, 87);
            font-size: 14px;
        }

        .css-18wzj0x {
            box-sizing: border-box;
            margin: 0px;
            min-width: 0px;
            line-height: 18px;
            flex: 1 1 0%;
            font-size: 12px;
        }

        * {
            box-sizing: border-box;
        }

        .css-1d61qm3 {
            color: rgb(71, 77, 87);
            font-size: 14px;
        }

        .css-1i3ha4y {
            color: #1E2329;
        }

        .css-18wzj0x a {
            text-decoration: none;
            color: rgb(236, 172, 74);
        }

        .css-vurnku {
            box-sizing: border-box;
            margin: 0;
            min-width: 0;
        }

        a {
            text-decoration: none;
        }

        a {
            background-color: transparent;
        }

        * {
            box-sizing: border-box;
        }

        .css-18wzj0x {
            line-height: 18px;
            font-size: 12px;
        }

        .css-1d61qm3 {
            color: rgb(71, 77, 87);
            font-size: 14px;
        }

        .css-1i3ha4y {
            color: #1E2329;
        }

        .css-uesmnb {
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
            background-color: inherit;
            opacity: 1;
            font-size: 16px;
        }

        button,
        input {
            overflow: visible;
        }

        .css-azvb1b .bn-input-suffix {
            flex-shrink: 0;
            margin-left: 4px;
            margin-right: 4px;
            font-size: 14px;
        }

        .css-hlfj64 .bn-input-suffix {
            margin-right: 0px;
            line-height: 0.9;
        }

        .css-vurnku {
            box-sizing: border-box;
            margin: 0;
            margin-right: 0px;
            margin-left: 0px;
            min-width: 0;
        }

        .css-1gkkq18 {
            box-sizing: border-box;
            margin: 0px 4px 0px 0px;
            min-width: 0px;
            display: flex;
            -moz-box-align: center;
            align-items: center;
        }

        * {
            box-sizing: border-box;
        }

        .css-azvb1b .bn-input-suffix {
            font-size: 14px;
        }

        .css-hlfj64 .bn-input-suffix {
            line-height: 0.9;
        }

        .css-azvb1b {
            line-height: 1.6;
        }

        .css-1i3ha4y {
            color: #1E2329;
        }

        html body {
            font-family: Wecoin TradePlex, Arial, sans-serif !important;
        }

        body {
            font-size: 14px;
        }

        .css-10pzx7y {
            box-sizing: border-box;
            margin: 4px 0px 0px;
            min-width: 0px;
            font-weight: 400;
            font-size: 12px;
            line-height: 16px;
            width: 100%;
            color: rgb(112, 122, 138);
        }

        * {
            box-sizing: border-box;
        }

        .css-1i3ha4y {
            color: #1E2329;
        }

        .css-15651n7 {
            box-sizing: border-box;
            margin: 0px 0px 24px;
            min-width: 0px;
            width: 100%;
        }

        .css-kc8d2n {
            box-sizing: border-box;
            margin: 0px;
            min-width: 0px;
            display: flex;
            height: 16px;
            -moz-box-align: center;
            align-items: center;
            cursor: auto;
            width: 100%;
        }

        html body {
            font-family: Wecoin TradePlex, Arial, sans-serif !important;
        }

        body {
            font-size: 14px;
        }

        body {
            font-family: Wecoin TradePlex, Arial, sans-serif !important;
        }

        .css-hlfj64 {
            box-sizing: border-box;
            margin: 0px;
            min-width: 0px;
        }

        body {
            font-family: Wecoin TradePlex, Arial, sans-serif !important;
        }

        .css-azvb1b {
            box-sizing: border-box;
            margin: 4px 0px 0px;
            min-width: 0px;
            display: inline-flex;
            position: relative;
            -moz-box-align: center;
            align-items: center;
            line-height: 1.6;
            border: 1px solid rgb(234, 236, 239);
            border-radius: 4px;
            width: 100%;
            height: 40px;
        }

        .css-hiy16i {
            box-sizing: border-box;
            margin: 0px;
            min-width: 0px;
            width: 100%;
            position: relative;
            min-height: 12px;
        }

        .css-ur4fg7 {
            margin: 0px;
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
            font-size: 14px;
            line-height: 20px;
            word-break: keep-all;
            color: rgb(33, 40, 51);
            border-radius: 4px;
            padding: 4px 8px;
            min-height: 24px;
            border: medium none;
            background-image: linear-gradient(rgb(236, 172, 74) 0%, rgb(236, 172, 74) 100%);
            width: 100%;
            height: 40px;
        }

        .css-1wsh2kb {
            position: fixed;
            -webkit-align-items: center;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            height: 60px;
            width: 100%;
            background-color: #0b0e11;
            box-sizing: border-box;
            -webkit-box-pack: justify;
            -webkit-justify-content: space-between;
            -ms-flex-pack: justify;
            justify-content: space-between;
            z-index: 9;
        }

        .css-1wsh2kb img {
            width: 138px;
        }
    </style>
    <style data-emotion-css="1s6w302">
        .css-1s6w302 {
            box-sizing: border-box;
            margin: 0;
            min-width: 0;
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex;
            padding-left: 16px;
            padding-right: 0;
            position: fixed;
            -webkit-align-items: center;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            height: 60px;
            width: 100%;
            background-color: #0b0e11;
            box-sizing: border-box;
            -webkit-box-pack: justify;
            -webkit-justify-content: space-between;
            -ms-flex-pack: justify;
            justify-content: space-between;
            z-index: 9;
        }

        @media screen and (min-width:768px) {
            .css-1s6w302 {
                padding-left: 60px;
                padding-right: 60px;
            }
        }

        @media screen and (min-width:1024px) {
            .css-1s6w302 {
                padding-left: 60px;
                padding-right: 60px;
            }
        }

        .css-1s6w302 img {
            width: 138px;
        }
    </style>
    <style data-emotion-css="x84wzl">
        .css-x84wzl {
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
            -webkit-box-pack: end;
            -webkit-justify-content: flex-end;
            -ms-flex-pack: end;
            justify-content: flex-end;
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
    <style data-emotion-css="11yl1bg">
        .css-11yl1bg {
            box-sizing: border-box;
            margin: 0;
            min-width: 0;
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex;
            cursor: pointer;
            color: #fff;
            -webkit-align-items: center;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            margin-right: 16px;
        }

        @media screen and (min-width:768px) {
            .css-11yl1bg {
                margin-right: 0;
            }
        }

        @media screen and (min-width:1024px) {
            .css-11yl1bg {
                margin-right: 0;
            }
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
    <style data-emotion-css="1gybehy">
        .css-1gybehy {
            box-sizing: border-box;
            margin: 0;
            min-width: 0;
            margin-left: 10px;
            margin-right: 10px;
            font-size: 14px;
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
    <style data-emotion-css="1el7y9l">
        .css-1el7y9l {
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.175);
            background-color: #1e2126;
            -webkit-flex-wrap: wrap;
            -ms-flex-wrap: wrap;
            flex-wrap: wrap;
        }

        .css-1el7y9l a {
            cursor: pointer;
            color: #fff;
            -webkit-text-decoration: none;
            text-decoration: none;
            padding: 10px 20px;
            width: 50%;
            display: inline-block;
            box-sizing: border-box;
            font-size: 14px;
        }

        .css-1el7y9l a:hover,
        .css-1el7y9l a.active {
            background: rgba(255, 255, 255, 0.04);
            outline: none;
            -webkit-text-decoration: none;
            text-decoration: none;
            color: rgb(240, 185, 11);
        }
    </style>
    <style data-emotion-css="qqgt01">
        .css-qqgt01 {
            box-sizing: border-box;
            margin: 0;
            min-width: 0;
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex;
            padding-top: 8px;
            padding-bottom: 8px;
            width: 100vw;
            margin-top: 20px;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.175);
            background-color: #1e2126;
            -webkit-flex-wrap: wrap;
            -ms-flex-wrap: wrap;
            flex-wrap: wrap;
        }

        @media screen and (min-width:768px) {
            .css-qqgt01 {
                width: 250px;
            }
        }

        @media screen and (min-width:1024px) {
            .css-qqgt01 {
                width: 250px;
            }
        }

        .css-qqgt01 a {
            cursor: pointer;
            color: #fff;
            -webkit-text-decoration: none;
            text-decoration: none;
            padding: 10px 20px;
            width: 50%;
            display: inline-block;
            box-sizing: border-box;
            font-size: 14px;
        }

        .css-qqgt01 a:hover,
        .css-qqgt01 a.active {
            background: rgba(255, 255, 255, 0.04);
            outline: none;
            -webkit-text-decoration: none;
            text-decoration: none;
            color: rgb(240, 185, 11);
        }
    </style>
    <style data-emotion-css="1i3ha4y">
        .css-1i3ha4y {
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
            color: #1E2329;
            background-color: #fff;
        }

        @media screen and (min-width:768px) {
            .css-1i3ha4y {
                background-color: #FAFAFA;
            }
        }
    </style>
    <style data-emotion-css="13eeyma">
        .css-13eeyma {
            box-sizing: border-box;
            margin: 0;
            min-width: 0;
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex;
            position: fixed;
            -webkit-align-items: center;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            height: 60px;
            width: 100%;
            background-color: #0b0e11;
            box-sizing: borderBox;
            -webkit-box-pack: justify;
            -webkit-justify-content: space-between;
            -ms-flex-pack: justify;
            justify-content: space-between;
            z-index: 9;
            padding-left: 16px;
            padding-right: 0;
        }

        .css-13eeyma img {
            width: 30px;
        }

        @media screen and (min-width:768px) {
            .css-13eeyma {
                padding-left: 60px;
                padding-right: 60px;
            }
        }

        @media screen and (min-width:1024px) {
            .css-13eeyma {
                padding-left: 60px;
                padding-right: 60px;
            }
        }
    </style>
    <style data-emotion-css="168o2sb">
        .css-168o2sb {
            box-sizing: border-box;
            margin: 0;
            min-width: 0;
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.175);
            background-color: #1e2126;
            -webkit-flex-wrap: wrap;
            -ms-flex-wrap: wrap;
            flex-wrap: wrap;
            max-height: calc(100vh - 60px);
            overflow-y: auto;
            padding-top: 8px;
            padding-bottom: 8px;
            width: 100vw;
            margin-top: 20px;
        }

        @media screen and (min-width:768px) {
            .css-168o2sb {
                max-height: 60vh;
            }
        }

        .css-168o2sb a {
            cursor: pointer;
            color: #fff;
            -webkit-text-decoration: none;
            text-decoration: none;
            padding: 10px 20px;
            width: 50%;
            display: inline-block;
            box-sizing: border-box;
            font-size: 14px;
        }

        .css-168o2sb a:hover,
        .css-168o2sb a.active {
            background: rgba(255, 255, 255, 0.04);
            outline: none;
            -webkit-text-decoration: none;
            text-decoration: none;
            color: rgb(240, 185, 11);
        }

        @media screen and (min-width:768px) {
            .css-168o2sb {
                width: 250px;
            }
        }

        @media screen and (min-width:1024px) {
            .css-168o2sb {
                width: 250px;
            }
        }
    </style>
    <style data-emotion-css="1xy7yb4">
        .css-1xy7yb4 {
            box-sizing: border-box;
            margin: 0;
            min-width: 0;
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex;
            overflow-y: auto;
            overflow-x: hidden;
            margin-left: 16px;
            margin-right: 16px;
            margin-top: 60px;
            -webkit-flex: 1;
            -ms-flex: 1;
            flex: 1;
            -webkit-flex-direction: column;
            -ms-flex-direction: column;
            flex-direction: column;
        }
    </style>
    <style data-emotion-css="moj0yw">
        .css-moj0yw {
            box-sizing: border-box;
            margin: 0;
            min-width: 0;
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex;
            width: 100%;
            color: #1E2329;
            -webkit-flex-direction: column;
            -ms-flex-direction: column;
            flex-direction: column;
        }
    </style>
    <style data-emotion-css="yqufh">
        .css-yqufh {
            box-sizing: border-box;
            margin: 0;
            min-width: 0;
            width: 100%;
            margin: 0 auto;
            padding-top: 40px;
            padding-bottom: 40px;
            padding-left: 24px;
            padding-right: 24px;
            border-radius: 2px;
            background-color: #fff;
            padding: 0 8px 32px;
            position: relative;
            margin: 40px auto 0;
        }

        @media screen and (min-width:768px) {
            .css-yqufh {
                width: 384px;
                margin: 40px auto;
                box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.08), 0px 0px 2px rgba(0, 0, 0, 0.08);
            }
        }

        @media screen and (min-width:1024px) {
            .css-yqufh {
                width: 384px;
                margin: 40px auto;
                box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.08), 0px 0px 2px rgba(0, 0, 0, 0.08);
            }
        }

        @media screen and (min-width:768px) {
            .css-yqufh {
                padding: 24px 24px 32px;
                margin: 40px auto 24px;
            }
        }
    </style>
    <style data-emotion-css="leflpn">
        .css-leflpn {
            box-sizing: border-box;
            margin: 0;
            min-width: 0;
            text-align: center;
            margin-bottom: 24px;
        }
    </style>
    <style data-emotion-css="tb94u7">
        .css-tb94u7 {
            box-sizing: border-box;
            margin: 0;
            min-width: 0;
            font-weight: 400;
            font-size: 24px;
            line-height: 30px;
            color: #1E2329;
            margin-bottom: 12px;
        }
    </style>
    <style data-emotion-css="ft5043">
        .css-ft5043 {
            box-sizing: border-box;
            margin: 0;
            min-width: 0;
            font-weight: 400;
            font-size: 12px;
            line-height: 16px;
            color: #707A8A;
            margin-bottom: 12px;
        }
    </style>
    <style data-emotion-css="gflt22">
        .css-gflt22 {
            box-sizing: border-box;
            margin: 0;
            min-width: 0;
            font-weight: 400;
            font-size: 12px;
            line-height: 16px;
            border: 1px solid #f5f5f5;
            border-radius: 23px;
            display: -webkit-inline-box;
            display: -webkit-inline-flex;
            display: -ms-inline-flexbox;
            display: inline-flex;
            margin: 0 auto 8px;
            width: auto;
            padding: 8px 24px;
            -webkit-align-items: center;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
        }
    </style>
    <style data-emotion-css="1ur07bk">
        .css-1ur07bk {
            box-sizing: border-box;
            margin: 0;
            min-width: 0;
            line-height: 18px;
            height: 18px;
        }
    </style>
    <style data-emotion-css="1mb79dz">
        .css-1mb79dz {
            box-sizing: border-box;
            margin: 0;
            min-width: 0;
            color: #0ECB81;
            width: 18px;
            height: 18px;
            font-size: 18px;
            fill: #1E2329;
            fill: #0ECB81;
            width: 1em;
            height: 1em;
            margin-right: 4px;
        }
    </style>
    <style data-emotion-css="vurnku">
        .css-vurnku {
            box-sizing: border-box;
            margin: 0;
            min-width: 0;
        }
    </style>
    <style data-emotion-css="e4p3">
        .css-e4p3 {
            box-sizing: border-box;
            margin: 0;
            min-width: 0;
            color: #0ECB81;
            margin-right: 0;
        }
    </style>
    <style data-emotion-css="e5gsg9">
        .css-e5gsg9 {
            box-sizing: border-box;
            margin: 0;
            min-width: 0;
            position: absolute;
            right: 0;
            top: 0;
            width: 60px;
            height: 60px;
            cursor: pointer;
            text-align: right;
        }

        .css-e5gsg9:hover .scan-recommend {
            display: block;
        }
    </style>
    <style data-emotion-css="nhhpej">
        .css-nhhpej {
            box-sizing: border-box;
            margin: 0;
            min-width: 0;
            width: 100%;
            height: auto;
        }
    </style>
    <style data-emotion-css="o0ym41">
        .css-o0ym41 {
            box-sizing: border-box;
            margin: 0;
            min-width: 0;
            display: none;
            position: absolute;
            right: 40px;
            white-space: nowrap;
            top: 50%;
            -webkit-transform: translateY(-50%);
            -ms-transform: translateY(-50%);
            transform: translateY(-50%);
            cursor: pointer;
            text-align: right;
            background-color: #F0B90B;
            color: #1E2329;
            padding: 4px;
            border-radius: 3px;
        }

        .css-o0ym41:after {
            content: "";
            display: block;
            position: absolute;
            right: -6px;
            top: 50%;
            -webkit-transform: translateY(-50%);
            -ms-transform: translateY(-50%);
            transform: translateY(-50%);
            width: 0;
            height: 0;
            border-top: 6px solid transparent;
            border-bottom: 6px solid transparent;
            border-left: 6px solid;
            border-left-color: #F0B90B;
        }
    </style>
    <style data-emotion-css="1cwscra">
        .css-1cwscra {
            box-sizing: border-box;
            margin: 0;
            min-width: 0;
            width: 100%;
            white-space: nowrap;
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex;
            -webkit-flex-direction: row;
            -ms-flex-direction: row;
            flex-direction: row;
            overflow: scroll;
            -ms-overflow-style: none;
            -webkit-scrollbar-width: none;
            -moz-scrollbar-width: none;
            -ms-scrollbar-width: none;
            scrollbar-width: none;
            position: relative;
            margin-bottom: 24px;
        }

        .css-1cwscra::-webkit-scrollbar {
            display: none;
        }

        .css-1cwscra:after {
            content: "";
            display: block;
            position: absolute;
            width: 100%;
            border-bottom: 1px solid #ddd;
            bottom: 0;
            left: 0;
        }
    </style>
    <style data-emotion-css="1eewrf">
        .css-1eewrf {
            box-sizing: border-box;
            margin: 0;
            min-width: 0;
            cursor: pointer;
            min-width: auto;
            position: relative;
            padding-right: 32px;
        }
    </style>
    <style data-emotion-css="1sdjkor">
        .css-1sdjkor {
            box-sizing: border-box;
            margin: 0;
            min-width: 0;
            padding: 10px 90px;
            height: 100%;
            box-sizing: border-box;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            padding: 8px 4px;
            font-size: 16px;
            color: #707A8A;
        }

        .css-1sdjkor.active {
            border-bottom: 3px solid;
            border-color: #F0B90B;
            color: #F0B90B;
        }

        .css-1sdjkor.active {
            color: #1E2329;
            font-weight: 500;
        }
    </style>
    <style data-emotion-css="1bzb8nq">
        .css-1bzb8nq {
            box-sizing: border-box;
            margin: 0;
            min-width: 0;
            display: none;
        }
    </style>
    <style data-emotion-css="1xks0kt">
        .css-1xks0kt {
            box-sizing: border-box;
            margin: 0;
            min-width: 0;
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-pack: justify;
            -webkit-justify-content: space-between;
            -ms-flex-pack: justify;
            justify-content: space-between;
            -webkit-align-items: center;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            margin-top: 24px;
        }
    </style>
    <style data-emotion-css="1uujtu6">
        .css-1uujtu6 {
            box-sizing: border-box;
            margin: 0;
            min-width: 0;
            -webkit-text-decoration: underline;
            text-decoration: underline;
            font-size: 12px;
            cursor: pointer;
        }
    </style>
    <style data-emotion-css="1uwb95w">
        .css-1uwb95w {
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
            font-size: 12px;
            line-height: 16px;
            -webkit-flex-wrap: wrap;
            -ms-flex-wrap: wrap;
            flex-wrap: wrap;
        }
    </style>
    <style data-emotion-css="n2o4s9">
        .css-n2o4s9 {
            box-sizing: border-box;
            margin: 0;
            min-width: 0;
            font-size: 12px;
            color: #C99400;
            -webkit-text-decoration: none;
            text-decoration: none;
            margin-right: 16px;
            cursor: pointer;
        }

        .css-n2o4s9:hover {
            -webkit-text-decoration: underline;
            text-decoration: underline;
            color: #FCD535;
        }
    </style>
    <style data-emotion-css="1d4gjwi">
        .css-1d4gjwi {
            box-sizing: border-box;
            margin: 0;
            min-width: 0;
            font-size: 12px;
            color: #C99400;
            -webkit-text-decoration: none;
            text-decoration: none;
        }

        .css-1d4gjwi:hover {
            -webkit-text-decoration: underline;
            text-decoration: underline;
            color: #FCD535;
        }
    </style>
    <style data-emotion-css="1vg2k4h">
        .css-1vg2k4h {
            box-sizing: border-box;
            margin: 0;
            min-width: 0;
            font-weight: 400;
            font-size: 12px;
            line-height: 16px;
            color: #474D57;
            text-align: center;
            padding: 12px;
        }
    </style>
    <style data-emotion="css"></style>
    <script charset="UTF-8" async=""
        src="https://api.geetest.com/gettype.php?gt=d53f889c544ed54937b43d49e8a64ac1&amp;callback=geetest_1621907591676"></script>
    <script charset="UTF-8" async="" crossorigin="anonymous"
        src="https://static.geetest.com/static/js/fullpage.8.6.1.js"></script>
    <script charset="UTF-8"
        src="https://api.geetest.com/get.php?gt=d53f889c544ed54937b43d49e8a64ac1&amp;challenge=932360c363eeffc5f1b47c5a01f7b969&amp;lang=en&amp;pt=0&amp;w=(UIEP9Bn11TVHdp0oANyYDweVxDxAerVyRVHKc37pHgEmOt0jg5nrfoEha7YC0EvCb2V5DmhS7eeLkSCQ0vmmM2QCD94cjWcMvIBkYTkspCzd1iD0KKXA1y1YNPI0Y7znW7Ieu4csgK9wvjBsyOdWYLk703ElBPyDEbGl6bSR2J0FOE7UtTXzRApzuqDPxkfKENUyVphnMpyOa3v2VFDbM1UG4BESRmWXKSzGt98)e19xZY0u4AfX074jt9bxCBxgDWUXF1gla5CCopUdkq9vauZmWZD8NEk9Sj(QdETBUZ9o)drYkUEtMhYeZtqJrecM)VFx(aoJLwekU4)oGvh5l6FdXvvvUbWYAEDaeOFKrI6t(LV9QOVgze9gSni6Ew54ZtpGELgFH3e(tD5NooewLhpzcAnNECVmCLRdxTs(cGSYMoghMLHx)G6zXPTBaOBhcJfN(ehBp4VjCJMqVkx6jCBdXOjjpWhjybP7L(4bKIddVOfGzTIHTHsXg2)ig7RUee5hMSDPNCQh2AZVVcG6QYnqy0pYDuNToGppTR1qRFlNuafv6tQLcWYABns)JXqY7(DTES5WIqKtLBxDw9VCnvNr79S6t)C08FlbS7QKYjaH94Rn0KiogvXydCirEzmzZTXRKXZ3V5U8qzrLAsxxRVVrJJcCBCHoyzhlGkc3qHP8jnNRMun91VIDvdGMuwxZ5RmEwDR8v(zUkxe4XZH8Ff7ft6Vd0bRgFdwuIwadYvKC)zGVLpeX7NQZqQftxO3(cklv)92NxURBz4EaxLosbLZ9QwbsZyp5AQyDIOQkKyr1BbXXP(SHZ8SGCY0WlT(5R5mXm0sY3(y0dlLTP9dfOWhobkdq4JXFFYY7o1kGDpP2e)fOAfc7dVu9PYW(ZR6zmxEZfNlyQTaRS1d9Bys0RRb8MjD2YYjqzqDIfWUubraJFJYXv0WNN4tNmcrLKqGf)jyoMP9kXkGrCx5h8fD(2GqBYFhHTRKZtyEkC3vZ26lJcXbNuLYolVONcOtFHyzIxdCTLS)DdERWdctPlGzAWSkRdqyie10iEWGFse4e(LR(ZtIQ9jL0hVI59DJZencL9smXHHifgaH9E3K9L8joYnuUVD(1KsxhCA13U7o1Px6lBh4QCSm1G9QYAgmljBGmWdSGqwn0hmGZHSm4uI5yvmOS5BV(5(e4zsPMSzGUVbh2dJefu5WCj37nv6hXOMKcc()08XxEJ6VBQB3fGEuhsL8ExvFQwGJchZiOJMRmSkw0M(2vOTWSWfZjpt8RVuxptd7tpre3uyYAhgxOl)(Y4u0pMJFmQYvHq(fm6CHK3itAulgS8No3gYJInuKtbmGu1t3NiIZdtu(rpl8IzoCi9K(qojfciaJ0wsMxVcwX)CgQ96R)UNT5xXzNpn6FxqCl3uTFvScv5q9cTZJAZ1bpb7DS)o6cBUUVj(TJioZIJlAAG5iIMzjJ2ikPyDvAtIMYhWYhzvunUPkFZKZagxU7dIPbGtJlRaUeTC6wOihe6Af)j7QwbHSCsUdjGSYm79isMB4rCtHvGfPolkqlPVvptlE1PlCBBTNqY1rHkIxzZn866K0TEcguzhfS8ehHwgj7i9hUwmvfWx6afjCEYuSVpsy44sabwFDv8xK5HLKGXI5rMkcEvpOib2v7tsU8znqelEo5XFiXCDhGnhHodcgzLTR32NKFnmvjMob(z54fp49tJSG9pyux8LE(2yaemn0sv3tuU3Wj(RBUqay0V3zMWLgHVsahlOjtgS8AZd93rZ1itvxmr8Y6PN8g3qTKvX144P3F7wr8Xpr13ickEtRC(5OYoCLvK1depXkBQFIyLdgTFxX1v2jPQ5f(r4E0YRTQbPrfnJpzOuPRPg8sJqOn0ydQrHZ)lNlDZBO5CpgDJnsPJqZdHaNWUpx))29CjoGC2foAucVS0dAcTzN3GqX7ebMjdemVYcVc9j9TMMODYDEAvdPfgRZ5Yty6yK8k0PH)rngn2Weu8L63ULVqAydO1nnGCLU9Kt5HEkbb8pYc4M4VTjofen5cDKfD2POc4r9mR(YlwbBufeWb(D2bbtAe0M3Rc3R50pBVV4Cme16GIXDdIAG554ebYcIG5NqigNnTOZJGR(u(TNWIAJ3j8yyS6Ry8UhoL0)15Exqoy6k3ZADO1w2re1(KpHPWS57)bO9AWi17ZBEmbs3i(zV6IJHU8epU8V2iBbPXcfXJbe0JZ2bBBOGZuqprZsqqNRZ7NZJ6lQcrYEl32W8JMj8oo90F7VPTxdICUUyj(YAcqt0FSj7qzVPfMycHhhfDsOe4G9gyuy3jb5votT9wsVt0wZ)i0TAFRfyqF5Hx8kHj3bafd0.19382bf561a953270befb8fbe4df09e1f6d18b8bbb8523ff82b43781949e1d7707322637192d6e901f1ae20dbe1891dea679b3f7556c72547f243b4ef4699e14f8b96ea57cc38b6b430aad30d26f42e25f895fab39afe49a3c0143278b6d198c3abfc4e6f2ff7d2177c57a2d6bebde7475884482736b6bfb3155c355cb366e86&amp;callback=geetest_1621907594657"></script>
    <link href="https://static.geetest.com/static/wind/style_https.1.5.8.css" rel="stylesheet">
</head>

<body>
    <script id="__APP_DATA">
    </script>
    <div id="__APP">
        <div class="css-1s6w302">
            <div class="css-x84wzl">
                <div class="css-ybbx55">
                   
                    <div class="css-11yl1bg">
                        <div data-bn-type="text" class="css-1gybehy">English</div><svg
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" class="css-1iztezc">
                            <path d="M16 9v1.2L12 15l-4-4.8V9h8z" fill="currentColor"></path>
                        </svg>
                    </div>
                    <div style="position: fixed; inset: 0px auto auto 0px; transform: translate(1175px, 42px);"
                        class="css-gv1gi9" data-popper-reference-hidden="false" data-popper-escaped="false"
                        data-popper-placement="bottom-start">
                        <div class="css-qqgt01"><a class="active">English</a><a class="">简体中文</a><a class="">繁體中文
                                (台灣)</a><a class="">繁體中文 (香港)</a><a class="">한국어</a><a class="">Русский</a><a
                                class="">Español (Internacional)</a><a class="">Español (Latinoamérica)</a><a
                                class="">Español (México)</a><a class="">Français</a><a class="">Deutsch</a><a
                                class="">Tiếng Việt</a><a class="">Türkçe</a><a class="">Vlaams</a><a
                                class="">Português</a><a class="">Italiano</a><a class="">Polski</a><a class="">Bahasa
                                Indonesia</a><a class="">Українська</a><a class="">Filipino</a><a class="">日本</a><a
                                class="">English (Australia)</a><a class="">Português (Brasil)</a><a class="">ไทย</a><a
                                class="">English (India)</a><a class="">English (Nigeria)</a><a class="">Română</a><a
                                class="">български</a><a class="">Čeština</a><a class="">latviešu valoda</a><a
                                class="">বাংলা</a><a class="">svenska</a><a class="">Português (Portugal)</a><a
                                class="">العربية</a><a class="">Suomi</a><a class="">Norsk</a><a class="">हिंदी</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="css-1i3ha4y">
            <div class="css-13eeyma"><a href="#"><img src="../logo.png" alt="WeCoinTrade" ></a>
                <div class="css-x84wzl">
                    <div class="css-ybbx55">
                        <div class="css-11yl1bg"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                class="css-1iztezc">
                                <path
                                    d="M7.71 14.407H3.33A8.888 8.888 0 013 12c0-.833.113-1.635.33-2.407h4.38A26.421 26.421 0 007.609 12c0 .802.03 1.615.103 2.407zM7.927 16.207c.257 1.677.689 3.199 1.265 4.35a9.013 9.013 0 01-5.143-4.35h3.878zM9.192 3.442c-.576 1.152-1.008 2.675-1.265 4.351H4.049a9.013 9.013 0 015.143-4.35zM14.242 16.207c-.494 2.931-1.46 4.587-2.108 4.793h-.268c-.648-.206-1.615-1.862-2.108-4.793h4.484zM14.242 7.793H9.758c.493-2.931 1.46-4.587 2.108-4.793h.268c.648.206 1.614 1.862 2.108 4.793zM14.49 9.593c.06.74.102 1.543.102 2.407 0 .854-.041 1.656-.103 2.407H9.511A28.875 28.875 0 019.408 12c0-.854.041-1.656.103-2.407h4.978zM16.073 16.207h3.878a9.013 9.013 0 01-5.143 4.35c.576-1.151 1.008-2.673 1.265-4.35zM16.073 7.793c-.257-1.676-.689-3.199-1.265-4.35a9.013 9.013 0 015.143 4.35h-3.878zM21 12c0 .833-.113 1.635-.33 2.407h-4.38c.071-.782.102-1.594.102-2.407 0-.802-.03-1.615-.103-2.407h4.382c.216.772.329 1.574.329 2.407z"
                                    fill="currentColor"></path>
                            </svg>
                            <div data-bn-type="text" class="css-1gybehy">English</div><svg
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" class="css-1iztezc">
                                <path d="M16 9v1.2L12 15l-4-4.8V9h8z" fill="currentColor"></path>
                            </svg>
                        </div>
                        <div style="position: fixed; inset: 0px auto auto 0px; transform: translate(1175px, 42px);"
                            class="css-gv1gi9" data-popper-reference-hidden="false" data-popper-escaped="false"
                            data-popper-placement="bottom-start">
                            <div class="css-168o2sb"><a class="active">English</a><a class="">简体中文</a><a class="">繁體中文
                                    (台灣)</a><a class="">繁體中文 (香港)</a><a class="">한국어</a><a class="">Русский</a><a
                                    class="">Español (Internacional)</a><a class="">Español (Latinoamérica)</a><a
                                    class="">Español (México)</a><a class="">Français</a><a class="">Deutsch</a><a
                                    class="">Tiếng Việt</a><a class="">Türkçe</a><a class="">Vlaams</a><a
                                    class="">Português</a><a class="">Italiano</a><a class="">Polski</a><a
                                    class="">Bahasa Indonesia</a><a class="">Українська</a><a class="">Filipino</a><a
                                    class="">日本</a><a class="">English (Australia)</a><a class="">Português
                                    (Brasil)</a><a class="">ไทย</a><a class="">English (India)</a><a class="">English
                                    (Nigeria)</a><a class="">Română</a><a class="">български</a><a
                                    class="">Čeština</a><a class="">latviešu valoda</a><a class="">বাংলা</a><a
                                    class="">svenska</a><a class="">Português (Portugal)</a><a class="">العربية</a><a
                                    class="">Suomi</a><a class="">Norsk</a><a class="">हिंदी</a></div>
                        </div>
                    </div>
                </div>
            </div>
            <main class="main css-1xy7yb4">
                <div class="css-moj0yw">
                    <div class="css-yqufh">
                        <div data-bn-type="text" class="css-leflpn">
                            <div data-bn-type="text" class="css-tb94u7">Create Account</div>
                            <div data-bn-type="text" class="css-ft5043">Please check that you are visiting the correct
                                URL</div>
                                <h4>Email Address Exists! Try a new one</h4>
                            <div data-bn-type="text" class="css-gflt22">
                                <div class="css-1ur07bk"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                        fill="none" class="css-1mb79dz">
                                        <path
                                            d="M16.27 10.5V8.07C16.27 5.82 14.45 4 12.2 4S8.13 5.82 8.13 8.07v2.43H6v8.94h12.43V10.5h-2.16zm-3.07 6.46h-2v-4h2v4zm1.07-6.46h-4.14V8.07c0-1.14.93-2.07 2.07-2.07 1.14 0 2.07.93 2.07 2.07v2.43z"
                                            fill="currentColor"></path>
                                    </svg></div>
                                <div dir="ltr" class="css-vurnku"><span data-bn-type="text"
                                        class="css-e4p3">https://www.wecointrade.com</span></div>
                            </div>
                        </div>

                        <div class="css-vurnku">
                            <div class="css-1cwscra">


                            </div>
                            <div class="css-gnqbje">
                                <form action="" method="post" autocomplete="off">
                                    <div class="css-hlfj64">
                                        <div value="" class="css-15651n7">
                                            <div class="css-kc8d2n">
                                                <div data-bn-type="text" class="css-itrsu7">First Name</div>
                                            </div>
                                            <div class=" css-hiy16i">

                                                <div class=" css-azvb1b"><input data-bn-type="input"
                                                        autocomplete="section-email email" type="text" name="fname"
                                                        class="css-uesmnb" value=""required="required">
                                                    <div class="bn-input-suffix css-vurnku">
                                                        <div class="css-1gkkq18"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div data-bn-type="text" class="help_default css-10pzx7y"></div>
                                        </div>
                                        <div class="css-15651n7">
                                            <div class="css-kc8d2n">
                                                <div data-bn-type="text" class="css-itrsu7">Last Name</div>
                                            </div>
                                            <div class=" css-hiy16i">
                                                <div class=" css-azvb1b"><input data-bn-type="input"
                                                        autocomplete="section-email current-password" name="lname"
                                                        type="text" class="css-uesmnb" value="" required="required">
                                                    <div class="bn-input-suffix css-vurnku">
                                                        <div class="css-1gkkq18"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div data-bn-type="text" class="help_default css-10pzx7y"></div>
                                        </div>
                                        <div value="" class="css-15651n7">
                                            <div class="css-kc8d2n">
                                                <div data-bn-type="text" class="css-itrsu7">Email</div>
                                            </div>
                                            <div class=" css-hiy16i">

                                                <div class=" css-azvb1b"><input data-bn-type="input"
                                                        autocomplete="section-email email" type="email" name="email"
                                                        class="css-uesmnb" value="" required="required">
                                                    <div class="bn-input-suffix css-vurnku">
                                                        <div class="css-1gkkq18"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div data-bn-type="text" class="help_default css-10pzx7y"></div>
                                        </div>
                                        <div value="" class="css-15651n7">
                                            <div class="css-kc8d2n">
                                                <div data-bn-type="text" class="css-itrsu7">Password</div>
                                            </div>
                                            <div class=" css-hiy16i">

                                                <div class=" css-azvb1b"><input data-bn-type="input"
                                                        autocomplete="section-email current-password" name="password"
                                                        type="password" class="css-uesmnb" value="" required="required">
                                                    <div class="bn-input-suffix css-vurnku">
                                                        <div class="css-1gkkq18"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div data-bn-type="text" class="help_default css-10pzx7y"></div>
                                        </div>
                                        <div value="" class="css-15651n7">
                                            <div class="css-kc8d2n">
                                                <div data-bn-type="text" class="css-itrsu7">Verify Password</div>
                                            </div>
                                            <div class=" css-hiy16i">

                                                <div class=" css-azvb1b"><input data-bn-type="input"
                                                        autocomplete="section-email current-password" name="repassword"
                                                        type="password" class="css-uesmnb" value="" required="required">
                                                    <div class="bn-input-suffix css-vurnku">
                                                        <div class="css-1gkkq18"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div data-bn-type="text" class="help_default css-10pzx7y"></div>
                                            <div class="css-xvxpe5">
                                                <div class=" css-hiy16i"><label
                                                        for="click-registration-termAndCondition" class="css-1d61qm3">
                                                        <div class="css-efmwvx"><input type="checkbox"
                                                                data-bn-type="checkbox"
                                                                required="required" id="click-registration-termAndCondition"
                                                                name="agreement" data-indeterminate="false"
                                                                class="css-p19g2b" value="true" checked=""
                                                                hidden=""><svg xmlns="http://www.w3.org/2000/svg"
                                                                viewBox="0 0 16 16" aria-hidden="true"
                                                                data-indeterminate="false" class="css-1bumqwn">
                                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                                    d="M12.7072 6.01431L7.00008 11.7214L3.29297 8.01431L4.70718 6.6001L7.00008 8.89299L11.293 4.6001L12.7072 6.01431Z">
                                                                </path>
                                                            </svg></div>
                                                        <div class="css-18wzj0x">I have read and agree to the Terms of
                                                            Service.&nbsp;<a href="../"
                                                                target="_blank" id="RegisterForm-a-termsOfUse"
                                                                class="css-vurnku">WeCoin''s Terms</a></div>
                                                    </label></div>
                                            </div>
                                        </div>
                                    </div><button data-bn-type="button" id="click-registration-submit"
                                        type="flatprimary" class="css-ur4fg7" >Create Account</button>
                                </form>
                            </div>
                            <div class="css-1bzb8nq"></div>
                        </div>
                        <div></div>
                        <div class="css-1xks0kt">
                            <div data-bn-type="text" class="css-1uujtu6">Forgot Password?</div>
                            <div class="css-1uwb95w"><a data-bn-type="link" class="css-1d4gjwi"
                                    href="../login/">Already have an account?</a></div>
                        </div>
                    </div>
                </div>
            </main>
            <div data-bn-type="text" class="css-1vg2k4h">©2021 WeCoinTrade.com. All rights reserved</div>
        </div>
    </div>
    <script src="https://bin.bnbstatic.com/static/runtime/react/react.production.16.13.0.js"></script>
    <script src="https://bin.bnbstatic.com/static/runtime/react-dom/react-dom.production.16.13.0.js"></script>
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-M86QHGF" height="0" width="0"
            style="display:none;visibility:hidden"></iframe></noscript>
    <script nonce="">__shuvi_ssr_public_path__ = "https://bin.bnbstatic.com/"</script>
    <script src="https://bin.bnbstatic.com/static/runtime/polyfill-bd1f24bc533fed68f49d.js" nonce=""></script>
    <script src="https://bin.bnbstatic.com/static/runtime/webpack-23c1a631a13b718d6882.js" nonce=""></script>
    <script src="https://bin.bnbstatic.com/static/chunks/framework.8cb8f4fc.js" nonce=""></script>
    <script src="https://bin.bnbstatic.com/static/chunks/2edb282b.60630a6f.js" nonce=""></script>
    <script src="https://bin.bnbstatic.com/static/chunks/commons.be61f49e.js" nonce=""></script>
    <script src="https://bin.bnbstatic.com/static/runtime/sentry-6bfba67d84557d2e7c37.js" nonce=""></script>
    <script nonce="">if (typeof Sentry !== 'undefined') {
            window.addEventListener('unhandledrejection', event => {
                console.warn(`UNHANDLED PROMISE REJECTION: ${event.reason}`);
                Sentry.captureMessage(event.reason);
            });
            Sentry.init({
                dsn: 'https://f3051be9709a49a682c5cbc9f63e7cdb@o529943.ingest.sentry.io/5762379',
                release: '841cad6db8e0cc016af1d4ae557662f9dea7ddab',
                attachStacktrace: true,
                environment: 'prod',
                integrations: [new Integrations.BrowserTracing()],
                tracesSampleRate: 0.001,
                sampleRate: 0.01,
            });
            Sentry.configureScope(scope => {
                scope.setExtra('isServer', false);
            });
        }</script>
    <script src="https://bin.bnbstatic.com/static/runtime/main-7484fb9382190887f179.js" nonce=""></script>


    <script type="text/javascript" async="" charset="utf-8"
        src="https://static.geetest.com/static/tools/gt.js?_t=1621907587958"></script>
    <script type="text/javascript" async="" charset="utf-8"
        src="https://static.geetest.com/static/tools/gt.js?_t=1621907588797"></script>
    <div class="geetest_panel geetest_wind" style="display: none;">
        <div class="geetest_panel_ghost"></div>
        <div class="geetest_panel_box">
            <div class="geetest_other_offline geetest_panel_offline"></div>
            <div class="geetest_panel_loading">
                <div class="geetest_panel_loading_icon"></div>
                <div class="geetest_panel_loading_content">Verifying</div>
            </div>
            <div class="geetest_panel_success">
                <div class="geetest_panel_success_box">
                    <div class="geetest_panel_success_show">
                        <div class="geetest_panel_success_pie"></div>
                        <div class="geetest_panel_success_filter"></div>
                        <div class="geetest_panel_success_mask"></div>
                    </div>
                    <div class="geetest_panel_success_correct">
                        <div class="geetest_panel_success_icon"></div>
                    </div>
                </div>
                <div class="geetest_panel_success_title">Verification Succeeded</div>
            </div>
            <div class="geetest_panel_error">
                <div class="geetest_panel_error_icon"></div>
                <div class="geetest_panel_error_title">Timed out</div>
                <div class="geetest_panel_error_content">Retry</div>
                <div class="geetest_panel_error_code"></div>
            </div>
            <div class="geetest_panel_footer" style="display: none;">
                <div class="geetest_panel_footer_logo"></div>
                <div class="geetest_panel_footer_copyright">Powered by WeCoinTrade</div>
            </div>
            <div class="geetest_panel_next"></div>
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
    
} else{
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    
date_default_timezone_set("Africa/Lagos");
$lastlogin = date("Y-m-d h:i:sa");


    $userid = rand(11111111,99999999);
    $mainb = 0.00;
    $spotb = 0.00;
    $marginb = 0.00;
    $demospot = 0.00;
    $demomargin = 0.00;
    $demobal = 20000.00;
    

$query="insert into `users`(`first name`,`last name`,`email`,`password`,`user id`, `main balance`,`spot balance`, `margin balance`,`last login`,`demo balance`,`demo spot`,`demo margin`) 
 VALUES('$fname','$lname','$email','$password','$userid','$mainb','$spotb','$marginb','$lastlogin','$demobal','$demospot','$demomargin')";
mysqli_query($conn,$query) or die("Could Not Perform the Query");
session_start();
$_SESSION['user']= $email;
header('Location: ../user'); 
}
} 
?>
