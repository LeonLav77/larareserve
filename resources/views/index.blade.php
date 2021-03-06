<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Document</title>
    <script>
        function allReservations(){
            $.ajax({
                dataType: 'json',
                url: '/all',
                type: 'get',
                success: function(response) {
                    console.log(response)
                }
            });
                }
        function SpecificDate(date){
            $.ajax({
                dataType: 'json',
                url: '/specific',
                data:{
                    'date':date,
                },
                type: 'get',
                success: function(response) {
                    console.log(response)
                }
            });
                }
        function SpecificTermin(date,time){
            $.ajax({
                dataType: 'json',
                url: '/specificWithTime',
                data:{
                    'date':date,
                    'time':time,
                },
                type: 'get',
                success: function(response) {
                    console.log(response)
                }
            });
                }
        function reserveDate(date,time){
            $.ajax({
                dataType: 'json',
                url: '/reserveDate',
                data:{
                    'date':date,
                    'time':time,
                },
                type: 'post',
                success: function(response) {
                    console.log(response)
                }
            });
                }

        function checkIfLoggedIn(){
                $.ajax({
                    dataType: 'json',
                    url: '/checkIfLoggedIn',
                    type: 'get',
                    success: function(response) {
                        console.log(response)
                    }
                    });
                }
        function ajaxLogin(email,password){
                $.ajax({
                    dataType: 'json',
                    url: '/login',
                    data:{
                        'email':email,
                        'password':password
                    },
                    type: 'post',
                    success: function(response) {
                        console.log(response)
                }
                });
            }
            function logout() {
                $.ajax({
                    dataType: 'json',
                    url: '/logout',
                    type: 'post',
                    success: function(response) {
                        console.log(response)
                    }
                    });
                }
            
        function ajaxRegister(email,password,name){
            $.ajax({
                        dataType: 'json',
                        url: '/register',
                        data: {
                            'email':email,
                            'password':password,
                            'password_confirmation':password,
                            'name':name
                        },
                        type: 'post',
                        success: function(response) {
                            console.log(response)
                        }
                    });
                }
        function myReservations(){
            $.ajax({
                dataType: 'json',
                url: '/myReservations',
                type: 'get',
                success: function(response) {
                    console.log(response)
                }
            });
        }
        function specificReservation(date,time){
            $.ajax({
                dataType: 'json',
                url: '/specificReservation',
                data: {
                    date:date,
                    time:time
                },
                type: 'get',
                success: function(response) {
                    console.log(response)
                }
            });
        }
        function userInfo(id){
            $.ajax({
                dataType: 'json',
                url: '/userInfo',
                type: 'get',
                success: function(response) {
                    console.log(response)
                }
            });
        }


        function ajaxReactLogin(email,password){
                $.ajax({
                    dataType: 'json',
                    url: '/react/login',
                    data:{
                        'email':email,
                        'password':password
                    },
                    type: 'post',
                    success: function(response) {
                        console.log(response)
                }
                });
            }
            function reactLogout() {
                $.ajax({
                    dataType: 'json',
                    url: '/react/logout',
                    type: 'post',
                    success: function(response) {
                        console.log(response)
                    }
                    });
                }
            
        function ajaxReactRegister(email,password,name){
            $.ajax({
                        dataType: 'json',
                        url: '/react/register',
                        data: {
                            'email':email,
                            'password':password,
                            'password_confirmation':password,
                            'name':name
                        },
                        type: 'post',
                        success: function(response) {
                            console.log(response)
                        }
                    });
                }
    </script>
</head>
<body>
    <button onclick="checkIfLoggedIn();">isLoggedIn</button>
    <button onclick="userInfo();">User Info</button>
    <button onclick="ajaxLogin('leonlav77@gmail.com','password');">Login</button>
    <button onclick="ajaxRegister('leonlav77@gmail.com','password','leki');">Register</button>
    <button onclick="logout();">Logout</button>
    <br>
    <br>
    <button onclick="allReservations();">ALL DATES</button>
    <button onclick="SpecificDate('2021-11-20');">SPECIFIC DATE</button>
    <button onclick="SpecificTermin('2021-11-20',12);">SPECIFIC DATE AND TIME</button>
        <button onclick="reserveDate('2021-11-20',12);">RESERVE DATE</button>
    <br>
    <br>
        <button onclick="myReservations();">My Reservations</button>
        <button onclick="specificReservation('2021-11-20',12);">Specific Reservation</button>
    <br>
    <br>
    <button onclick="ajaxReactLogin('leonlav77@gmail.com','password');">React Login</button>
    <button onclick="ajaxReactRegister('leonlav77@gmail.com','password','leki');">React Register</button>
    <button onclick="reactLogout();">React Logout</button>
</body>
</html>