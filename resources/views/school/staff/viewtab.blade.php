
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
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/voyage/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/material-components-web.css') }}" rel="stylesheet" >
</head>

<body >
<h1>grade table</h1>

@if(session('subfail'))   
<div class="alert " style="  padding: 20px;  background-color: #f44336; /* Red */ color: white; border-left:6px solid #6b1905;  margin-bottom: 5px;">
    <span style="margin-left: 15px;  color: white;  font-weight: bold;  font-size:20px; float: right;  font-size: 22px;  line-height: 20px;  cursor: pointer;"
    onclick="this.parentElement.style.display='none';">&times;</span>
<p style="color: white; text-align:center; font-size:20px;"> {{session('subfail')}} </p>
</div> 
@endif 
@if(session('success'))
<div class="alert " style="  padding: 15px;  background-color: #44f436;  border-left:6px solid #0ca120; margin-bottom: 5px;">
        <span style="margin-left: 15px;  color: white;  font-weight: bold;  float: right;  font-size: 22px;  line-height: 20px;  cursor: pointer;"
              onclick="this.parentElement.style.display='none';">&times;</span>
    <p class="sute" > {{session('success')}} </p>
</div>
@endif


<table class="table table-bordered" >
        <thead class="thead-light">
            <tr>
                <th  scope="col" >school_name</th>
                <th  scope="col" >school_code</th> 
                <th  scope="col" >testno </th>
                <th  scope="col" >no_section </th>
                <th  scope="col" >grade</th> 
                <th  scope="col" >subj1 </th>
                <th  scope="col" >subj2 </th>
                <th  scope="col" >subj3 </th> 
                <th  scope="col" >subj4 </th>
                <th  scope="col" >subj5 </th>
                <th  scope="col" >subj6 </th> 
                <th  scope="col" >subj7 </th>
                <th  scope="col" >subj8</th>
                <th  scope="col" >subj9</th> 
                <th  scope="col" >subj10</th>
                <th  scope="col" >subj11</th>
                <th  scope="col" >subj12</th>
                <th  scope="col" >subj13</th> 
                <th  scope="col" >subj14</th>
                <th  scope="col" >subj15</th>
                <th  scope="col" >subj16</th> 
                <th  scope="col" >subj17</th>
                <th  scope="col" >subj18</th>
                <th  scope="col" >subj19</th> 
                <th  scope="col" >subj20</th>
                <th  scope="col" >ADD</th>
                <th  scope="col" >Edit</th>
                <th  scope="col" >Delet</th>
            </tr>
        </thead>
        @foreach($tabs as $tab)          
        <tbody>
            <tr>
                <th >{{ $tab->school_name }}</th>
                <th >{{$tab->school_code}}</th> 
                <th >{{$tab->testno}} </th>
                <th >{{$tab->no_section}} </th>
                <th >{{$tab->batch}}</th> 
                <th >{{$tab->subj1}} </th>
                <th >{{$tab->subj2}} </th>
                <th >{{$tab->subj3}} </th> 
                <th >{{$tab->subj4}} </th>
                <th >{{$tab->subj5}} </th>
                <th >{{$tab->subj6}} </th> 
                <th >{{$tab->subj7}} </th>
                <th >{{$tab->subj8}} </th>
                <th >{{$tab->subj9}} </th> 
                <th >{{$tab->subj10}} </th>
                <th >{{$tab->subj11}} </th>
                <th >{{$tab->subj12}} </th>
                <th >{{$tab->subj13}} </th> 
                <th >{{$tab->subj14}} </th>
                <th >{{$tab->subj15}} </th>
                <th >{{$tab->subj16}} </th> 
                <th >{{$tab->subj17}} </th>
                <th >{{$tab->subj18}} </th>
                <th >{{$tab->subj19}} </th> 
                <th >{{$tab->subj20}} </th>
                <th>
                    <form  action="{{ url(Auth::guard('schstaff')->user()->school_name.'/batch/tableadded') }}" method="POST">
                        <input type="hidden" name="see" value="{{$tab->id}}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">  
                        <input type="submit" class="btn btn-lg btn-success col-md-12 col-sm-12 col-xs-12 hidden-sm hidden-xs  " value="add table" >
                    </form>
                </th>
                <th>
                    <form  action="{{ url(Auth::guard('schstaff')->user()->school_name.'/batch/tableadded') }}" method="POST">
                        <input type="hidden" name="see" value="{{$tab->id}}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">  
                        <input type="submit" class="btn btn-lg btn-warning col-md-12 col-sm-12 col-xs-12 hidden-sm hidden-xs  " value="Edit table" >
                    </form>
                </th>
                <th>
                    <form  action="{{ url(Auth::guard('schstaff')->user()->school_name.'/batch/tableadded') }}" method="POST">
                        <input type="hidden" name="see" value="{{$tab->id}}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">  
                        <input type="submit" class="btn btn-lg btn-danger col-md-12 col-sm-12 col-xs-12 hidden-sm hidden-xs  " value="Delat table" >
                    </form>
                </th>
            </tr>
        </tbody>
        @endforeach
      </table>
    </div>


</body>
</html>
