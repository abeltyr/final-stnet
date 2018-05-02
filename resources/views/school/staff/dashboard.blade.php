
<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="robots" content="none" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="admin login">
    <title>Laravel</title>
    <link href="{{ asset('css/material-components-web.css') }}" rel="stylesheet" >
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/voyage/app.css') }}" rel="stylesheet">
    </head>
    <body class="login" >
        <div class="col-md-8 col-md-offset-2" >
    
            <div class="well col-md-12  hidden-sm hidden-xs lightblack" >
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
                        <div class="well jumbotron dark telight" style="text-align:center;  padding:0px;" >
                            <h2><label> Sign Up Teachers and Staff members</label> </h2> 
                        </div>
                    </div>
                </div>    
                <div class="row">
                <form enctype="multipart/form-data" action="{{ url(Auth::guard('schstaff')->user()->school_name.'/'.'Staff') }}" method="post">
                    <div class="col-md-4">
                        <div class="well" >
                            <div class="row">
                                <img src="/uploads/admin/default.png" alt="img" style="width:100%; height:100%;">  
                            </div>
                            <div class="row">
                                <input type="file" class="col-md-10  col-md-offset-1 col-sm-10 col-sm-offset-2 col-xs-12 col-xs-offset-0 btn btn-primary" style="margin-top:10px;" name="photo">
                            </div>      
                        </div>
                    </div> 
                    <div class="col-md-8">
                        <div class="form-group form-group-default col-md-6" id="fnameGroup">
                            <label>First Name</label>
                            <div class="controls">
                                <input type="text" name="fname"  value="{{ old('fname') }}" placeholder="First Name" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group form-group-default col-md-6" id="lnameGroup">
                            <label>Last Name</label>
                            <div class="controls">
                                <input type="text" name="lname"   value="{{ old('lname') }}" placeholder="Last Name" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group form-group-default col-md-12" id="emailGroup">
                            <label>E-Mail</label>
                            <div class="controls">
                                <input type="email" name="email"   value="{{ old('email') }}" placeholder="E-Mail" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group form-group-default col-md-12" id="phoneGroup">
                            <label style="margin-top:-2.5px; margin-bottom:0px;">Phone</label>
                            <div class="controls">
                                <div class="input-group" >
                                    <span class="input-group-addon" style="background:transparent; text-align:center; border:0px; margin:0px; margin-top:-5px; height:20px;"  id="basic-addon1">
                                        +251-
                                    </span>  
                                    <input type="number" name="phone" value="{{ old('phone') }}" placeholder="Phone Number" class="form-control input-group-addon" style="margin-top:1px; margin-left:-11px; text-align:left;" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group form-group-default col-md-12" id="passwordGroup">
                            <label>Password</label>
                            <div class="controls">
                                <input type="password" name="password" placeholder="Password" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group form-group-default col-md-12" id="conpassGroup">
                            <label>Confirm Password</label>
                            <div class="controls">
                                <input type="password" name="password_confirmation" placeholder="Confirm Password" class="form-control" required>
                            </div>
                        </div>
                    </div> 
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <button type="submit" class="btn btn-block btn-primary col-md-12">Add Staff
                    </button>
                    </form>
                </div>      
            
            </div> 
        </div> 
        <form method="POST" action="{{ route('schoolstaffLogout') }}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <button type="submit" class="btn btn-block btn-primary col-md-12">Logout</button>
        </form>
        <a href="{{ url(Auth::guard('schstaff')->user()->school_name.'/Batchs') }}"class="btn mdc-button--raised btn-primary col-md-11" style="background:#3895ac; font-size:20px; margin:2%;"> Batch</a>  
    </body>
</html>    