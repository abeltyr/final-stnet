<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/voyage/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/material-components-web.css') }}" rel="stylesheet" >
</head>
<body class="login" style="overflow-y:auto;">
    <div class="well col-md-12" style="background:#2f384b;">
        @if(count($errors) > 0)   
        @foreach($errors->all() as $error)
            <div class="alert " style="  padding: 20px;  background-color: #f44336; /* Red */ color: white; border-left:6px solid #6b1905;  margin-bottom: 5px;">
                <span style="margin-left: 15px;  color: white;  font-weight: bold;  float: right;  font-size: 22px;  line-height: 20px;  cursor: pointer;"
                onclick="this.parentElement.style.display='none';">&times;</span>
                <p style="color: white; text-align:center;"> {{$error}} </p>
            </div> 
        @endforeach 
        @endif 
        @if(session('success'))   
        <div class="alert " style="  padding: 15px;  background-color: #44f436;  border-left:6px solid #0ca120; margin-bottom: 5px;">
            <span style="margin-left: 15px;  color: white;  font-weight: bold;  float: right;  font-size: 22px;  line-height: 20px;  cursor: pointer;"
            onclick="this.parentElement.style.display='none';">&times;</span>
            <p class="sute" > {{session('success')}} </p>
        </div> 
        @endif 
            <div class="row">
                <div class="container">
                    <div class="well jumbotron" style="text-align:center;  padding:0px; background:#161b25; color:#2d9baf; border:2px solid #000;" >
                        <h2><label> ADD SCHOOL</label> </h2> 
                    </div>
                </div>
            </div>    
            <div class="row">
            <form enctype="multipart/form-data" action="{{url('Admin/School')}}" method="post">
                <div class="col-md-4">
                    <div class="well" style=" padding-top:2px; padding-bottom:2px; ">
                        <div class="row">
                            <img src="/uploads/admin/default.jpg" alt="img" style="width:100%; height:100%; border-radius:9px;">  
                        </div>
                        <div class="row">
                            <input type="file" class="col-md-12 btn btn-primary" style="margin-top:10px;" name="logo">
                        </div>      
                    </div>
                </div> 
                <div class="col-md-8">
                    <div class="form-group form-group-default col-md-12" >
                        <label>SCHOOL Name</label>
                        <div class="controls">
                             <input type="text" name="name"value="{{ old('name') }}" placeholder="SCHOOL NAME" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group form-group-default col-md-12" >
                        <label>SCHOOL REPRESENTATIVE</label>
                        <div class="controls">
                            <input type="text" name="srep"   value="{{ old('srep') }}" placeholder="SCHOOL REPRESENTATIVE" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group form-group-default col-md-12" >
                        <label>E-Mail</label>
                        <div class="controls">
                            <input type="email" name="email"value="{{ old('email') }}" placeholder="Representative E-Mail" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group form-group-default col-md-12" >
                        <label>PHONE</label>
                        <div class="controls">
                                <input type="tel" name="phone" value="{{ old('phone') }}" placeholder="PHONE NUMBER" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group form-group-default col-md-12" >
                        <label>SCHOOL ADDRESS</label>
                        <div class="controls">
                            <input type="text" name="saddress"value="{{ old('saddress') }}" placeholder="SCHOOL ADDRESS" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group form-group-default col-md-12" >
                        <label>NUMBER OF STUDENTS</label>
                        <div class="controls">
                            <input type="number" name="nstud"value="{{ old('nstud') }}" placeholder="NUMBER OF STUDENTS" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group form-group-default col-md-12" >
                        <label>SCHOOL OWNER</label>
                        <div class="controls">
                            <input type="text" name="sowner"value="{{ old('sowner') }}" placeholder="SCHOOL OWNER" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group form-group-default col-md-12" >
                        <label>SUBSCRIBTION TYPE</label>
                        <div class="controls">
                            <div class="mdc-form-field" style="width:25%;">
                                <div class="mdc-checkbox">
                                    <input input type="radio" name="sub_type" value="1" id="my-checkbox" class="mdc-checkbox__native-control"/>
                                    <div class="mdc-checkbox__background">
                                        <svg class="mdc-checkbox__checkmark" viewBox="0 0 24 24">
                                            <path class="mdc-checkbox__checkmark-path" fill="none" stroke="white" d="M1.73,12.91 8.1,19.28 22.79,4.59"/>
                                        </svg>
                                        <div class="mdc-checkbox__mixedmark"></div>
                                    </div>
                                </div>
                                <label for="my-checkbox" id="my-checkbox-label" style="font-size:15px; ">premiue Subscibtion</label>
                            </div> 
                            <div class="mdc-form-field"  style="width:25%;">
                                <div class="mdc-checkbox">
                                    <input input type="radio" name="sub_type" value="2" id="my-checkbox" class="mdc-checkbox__native-control"/>
                                    <div class="mdc-checkbox__background">
                                        <svg class="mdc-checkbox__checkmark" viewBox="0 0 24 24">
                                            <path class="mdc-checkbox__checkmark-path" fill="none" stroke="white" d="M1.73,12.91 8.1,19.28 22.79,4.59"/>
                                        </svg>
                                        <div class="mdc-checkbox__mixedmark"></div>
                                    </div>
                                </div>
                                <label for="my-checkbox" id="my-checkbox-label" style="font-size:15px;">compact Subscibtion</label>
                            </div> 
                            <div class="mdc-form-field"  style="width:25%;">
                                <div class="mdc-checkbox">
                                    <input input type="radio"name="sub_type" value="3" id="my-checkbox" class="mdc-checkbox__native-control"/>
                                    <div class="mdc-checkbox__background">
                                        <svg class="mdc-checkbox__checkmark" viewBox="0 0 24 24">
                                            <path class="mdc-checkbox__checkmark-path" fill="none" stroke="white" d="M1.73,12.91 8.1,19.28 22.79,4.59"/>
                                        </svg>
                                        <div class="mdc-checkbox__mixedmark"></div>
                                    </div>
                                </div>
                                <label for="my-checkbox" id="my-checkbox-label" style="font-size:15px;">normal Subscibtion</label>
                            </div>   
                        <div>
                    </div>
                </div>
            </div> 
        </div>    
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <button type="submit" class="btn mdc-button--raised btn-primary col-md-offset-3 col-md-6 " style="background:#0861779c; color:#eee; font-size:20px;">ADD SCHOOL </button>
        </form>
    </div>      
</div> 
</body>
</html>