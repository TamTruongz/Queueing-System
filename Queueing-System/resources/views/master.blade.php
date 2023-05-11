<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alta Media</title>

    <link rel="shortcut icon" type="image/png/svg" href="/images/logo/alta.svg" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <!-- ===== JQuery ===== -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- ===== MomentJS ===== -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>

    <!-- ===== IconBox ===== -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <!-- ===== Css ===== -->
    <link rel="stylesheet" href="/css/general.css">
    <link rel="stylesheet" href="/css/navigation.css">
    <link rel="stylesheet" href="/css/dashboard.css">
    <link rel="stylesheet" href="/css/device.css">
    <link rel="stylesheet" href="/css/service.css">
    <link rel="stylesheet" href="/css/codes.css">
    <link rel="stylesheet" href="/css/report.css">
    <link rel="stylesheet" href="/css/role.css">
    <link rel="stylesheet" href="/css/user.css">

</head>

<body>
    <!-- ==== Header ===== -->
    @include('common.header')
    <!-- ==== End Header ==== -->

    <!-- Content -->
    @yield('content')
    <!-- ==== End Content ==== -->

    <!-- ==== Menubar ==== -->
    @include('common.menubar')
    <!-- ==== End Menubar ==== -->

    <!-- ==== Popup Message ==== -->
    @include('common.popup_message')
    <!-- ==== End Popup Message ==== -->
</body>
<script src="js/general.js"></script>
<script src="js/PopupMessage.js"></script>

</html>