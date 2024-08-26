<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<style>
    /* body{
        background:url('https://th.bing.com/th/id/OIP.osfhMEcMKq2nZDGmNRdTZgAAAA?pid=ImgDet&rs=1.jpg');
    } */
  .login_form_wrapper {
    float: left;
    width: 100%;
    padding-top: 40px;
    padding-bottom: 100px;
    background-color:grey;
    padding-left: 25%;
}

.login_wrapper {
    padding-bottom: 20px;
    margin-bottom: 20px;
    border-bottom: 1px solid #e4e4e4;
    float: left;
    width: 100%;
    background: #fff;
    padding: 50px;
}

.login_wrapper a.btn {
    color: #fff;
    width: 100%;
    height: 50px;
    padding: 6px 25px;
    line-height: 36px;
    margin-bottom: 20px;
    text-align: left;
    border-radius: 5px;
    background: #4385f5;
    font-size: 16px;
    border: 1px solid #4385f5;
}


.login_wrapper a i {
    float: right;
    margin: 0;
    line-height: 35px;
}

.login_wrapper a.google-plus {
    background: #db4c3e;
    border: 1px solid #db4c3e;
}

.login_wrapper h2 {
    font-size: 18px;
    font-weight: 500;
    margin-bottom: 20px;
    color: #111;
    line-height: 20px;
    text-transform: uppercase;
    text-align: center;
    position: relative;
}

.login_wrapper .formsix-pos, .formsix-e {
    position: relative;
}

.form-group {
    margin-bottom: 15px;
}

.login_wrapper .form-control {
    height: 53px;
    padding: 15px 20px;
    font-size: 14px;
    line-height: 24px;
    border: 1px solid #fafafa;
    border-radius: 3px;
    box-shadow: none;
    font-family: 'Roboto';
    -webkit-transition: all 0.3s ease 0s;
    -moz-transition: all 0.3s ease 0s;
    -o-transition: all 0.3s ease 0s;
    transition: all 0.3s ease 0s;
    background-color: #fafafa;
}

.login_wrapper .form-control:focus {
    color: #999;
    background-color: fafafa;
    border: 1px solid #4285f4 !important;
}

.login_remember_box {
    margin-top: 30px;
    margin-bottom: 30px;
    color: #999;
}

.login_remember_box .control {
    position: relative;
    padding-left: 20px;
    cursor: pointer;
    font-size: 12px;
    font-weight: 500;
    margin: 0;
}

.login_remember_box .control input {
    position: absolute;
    z-index: -1;
    opacity: 0;
}

.login_remember_box .control__indicator {
    position: absolute;
    top: 0;
    left: 0;
    width: 15px;
    height: 15px;
    background: #fff;
    border: 1px solid #999;
}

.login_remember_box .forget_password {
    float: right;
    color: #db4c3e;
    line-height: 12px;
    text-decoration: underline;
}

.login_btn_wrapper {
    padding-bottom: 20px;
    margin-bottom: 30px;
    border-bottom: 1px solid #e4e4e4;
}

.login_btn_wrapper a.login_btn {
    text-align: center;
    text-transform: uppercase;
}

.login_message p {
    text-align: center;
    font-size: 16px;
    margin: 0;
}

p {
    color: #999999;
    font-size: 14px;
    line-height: 24px;
}

.login_wrapper a.login_btn:hover {
    background-color: #2c6ad4;
    border-color: #2c6ad4;
}

.login_wrapper a.btn:hover {
    background-color: #2c6ad4;
    border-color: #2c6ad4;
}

.login_wrapper a.google-plus:hover {
    background: #bd4033;
    border-color: #bd4033;
}

</style>
<body>
    @yield('content_login')


</body>
</html>