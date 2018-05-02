
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

<body class="login" style="overflow-y:auto;">

<div class="well col-md-12" style=" background:#2f384b;">
    
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
<div class="well col-md-12" style="padding:50px; background:#2f384b; border:0px;" >
<form enctype="multipart/form-data" action="{{ url(Auth::guard('schstaff')->user()->school_name.'/staff/Batch') }}" method="post">
{{ csrf_field() }}
<div class="form-group form-group-default" >
    <label>Grade</label>
    <div class="well col-md-12">
        <div class="mdc-form-field" style="width:15%;">
            <div class="mdc-checkbox">
                <input input type="radio" name="batch" value="1" id="my-checkbox" class="mdc-checkbox__native-control"/>
                <div class="mdc-checkbox__background">
                    <svg class="mdc-checkbox__checkmark" viewBox="0 0 24 24">
                        <path class="mdc-checkbox__checkmark-path" fill="none" stroke="white" d="M1.73,12.91 8.1,19.28 22.79,4.59"/>
                    </svg>
                    <div class="mdc-checkbox__mixedmark"></div>
                </div>
            </div>
            <label for="my-checkbox" id="my-checkbox-label" style="margin-top:6px; ">grade 1</label>
        </div> 
        <div class="mdc-form-field"  style="width:15%;">
            <div class="mdc-checkbox">
                <input input type="radio" name="batch" value="2" id="my-checkbox" class="mdc-checkbox__native-control"/>
                <div class="mdc-checkbox__background">
                    <svg class="mdc-checkbox__checkmark" viewBox="0 0 24 24">
                        <path class="mdc-checkbox__checkmark-path" fill="none" stroke="white" d="M1.73,12.91 8.1,19.28 22.79,4.59"/>
                    </svg>
                    <div class="mdc-checkbox__mixedmark"></div>
                </div>
            </div>
            <label for="my-checkbox" id="my-checkbox-label" style="margin-top:6px;">grade 2</label>
        </div> 
        <div class="mdc-form-field"  style="width:15%;">
            <div class="mdc-checkbox">
                <input input type="radio"name="batch" value="3" id="my-checkbox" class="mdc-checkbox__native-control"/>
                <div class="mdc-checkbox__background">
                    <svg class="mdc-checkbox__checkmark" viewBox="0 0 24 24">
                        <path class="mdc-checkbox__checkmark-path" fill="none" stroke="white" d="M1.73,12.91 8.1,19.28 22.79,4.59"/>
                    </svg>
                    <div class="mdc-checkbox__mixedmark"></div>
                </div>
            </div>
            <label for="my-checkbox" id="my-checkbox-label" style="margin-top:6px;">grade 3</label>
        </div> 
        <div class="mdc-form-field"  style="width:15%;">
            <div class="mdc-checkbox">
                <input input type="radio" name="batch" value="4" id="my-checkbox" class="mdc-checkbox__native-control"/>
                <div class="mdc-checkbox__background">
                    <svg class="mdc-checkbox__checkmark" viewBox="0 0 24 24">
                        <path class="mdc-checkbox__checkmark-path" fill="none" stroke="white" d="M1.73,12.91 8.1,19.28 22.79,4.59"/>
                    </svg>
                    <div class="mdc-checkbox__mixedmark"></div>
                </div>
            </div>
            <label for="my-checkbox" id="my-checkbox-label" style="margin-top:6px;">grade 4</label>
        </div> 
        <div class="mdc-form-field"  style="width:15%;">
            <div class="mdc-checkbox">
                <input input type="radio" name="batch" value="5" id="my-checkbox" class="mdc-checkbox__native-control"/>
                <div class="mdc-checkbox__background">
                    <svg class="mdc-checkbox__checkmark" viewBox="0 0 24 24">
                        <path class="mdc-checkbox__checkmark-path" fill="none" stroke="white" d="M1.73,12.91 8.1,19.28 22.79,4.59"/>
                    </svg>
                    <div class="mdc-checkbox__mixedmark"></div>
                </div>
            </div>
            <label for="my-checkbox" id="my-checkbox-label" style="margin-top:6px;">grade 5</label>
        </div> 
        <div class="mdc-form-field"  style="width:15%;">
            <div class="mdc-checkbox">
                <input input type="radio" name="batch" value="6" id="my-checkbox" class="mdc-checkbox__native-control"/>
                <div class="mdc-checkbox__background">
                    <svg class="mdc-checkbox__checkmark" viewBox="0 0 24 24">
                        <path class="mdc-checkbox__checkmark-path" fill="none" stroke="white" d="M1.73,12.91 8.1,19.28 22.79,4.59"/>
                    </svg>
                    <div class="mdc-checkbox__mixedmark"></div>
                </div>
            </div>
            <label for="my-checkbox" id="my-checkbox-label" style="margin-top:6px;">grade 6</label>
        </div>
        <div class="mdc-form-field" style="width:15%;">
            <div class="mdc-checkbox">
                <input input type="radio" name="batch" value="7" id="my-checkbox" class="mdc-checkbox__native-control"/>
                <div class="mdc-checkbox__background">
                    <svg class="mdc-checkbox__checkmark" viewBox="0 0 24 24">
                        <path class="mdc-checkbox__checkmark-path" fill="none" stroke="white" d="M1.73,12.91 8.1,19.28 22.79,4.59"/>
                    </svg>
                    <div class="mdc-checkbox__mixedmark"></div>
                </div>
            </div>
            <label for="my-checkbox" id="my-checkbox-label" style="margin-top:6px; ">grade 7</label>
        </div> 
        <div class="mdc-form-field"  style="width:15%;">
            <div class="mdc-checkbox">
                <input input type="radio" name="batch" value="8" id="my-checkbox" class="mdc-checkbox__native-control"/>
                <div class="mdc-checkbox__background">
                    <svg class="mdc-checkbox__checkmark" viewBox="0 0 24 24">
                        <path class="mdc-checkbox__checkmark-path" fill="none" stroke="white" d="M1.73,12.91 8.1,19.28 22.79,4.59"/>
                    </svg>
                    <div class="mdc-checkbox__mixedmark"></div>
                </div>
            </div>
            <label for="my-checkbox" id="my-checkbox-label" style="margin-top:6px;">grade 8</label>
        </div> 
        <div class="mdc-form-field"  style="width:15%;">
            <div class="mdc-checkbox">
                <input input type="radio" name="batch" value="9" id="my-checkbox" class="mdc-checkbox__native-control"/>
                <div class="mdc-checkbox__background">
                    <svg class="mdc-checkbox__checkmark" viewBox="0 0 24 24">
                        <path class="mdc-checkbox__checkmark-path" fill="none" stroke="white" d="M1.73,12.91 8.1,19.28 22.79,4.59"/>
                    </svg>
                    <div class="mdc-checkbox__mixedmark"></div>
                </div>
            </div>
            <label for="my-checkbox" id="my-checkbox-label" style="margin-top:6px;">grade 9</label>
        </div> 
        <div class="mdc-form-field"  style="width:15%;">
            <div class="mdc-checkbox">
                <input input type="radio" name="batch" value="10" id="my-checkbox" class="mdc-checkbox__native-control"/>
                <div class="mdc-checkbox__background">
                    <svg class="mdc-checkbox__checkmark" viewBox="0 0 24 24">
                        <path class="mdc-checkbox__checkmark-path" fill="none" stroke="white" d="M1.73,12.91 8.1,19.28 22.79,4.59"/>
                    </svg>
                    <div class="mdc-checkbox__mixedmark"></div>
                </div>
            </div>
            <label for="my-checkbox" id="my-checkbox-label" style="margin-top:6px;">grade 10</label>
        </div> 
        <div class="mdc-form-field"  style="width:15%;">
            <div class="mdc-checkbox">
                <input input type="radio" name="batch" value="11" id="my-checkbox" class="mdc-checkbox__native-control"/>
                <div class="mdc-checkbox__background">
                    <svg class="mdc-checkbox__checkmark" viewBox="0 0 24 24">
                        <path class="mdc-checkbox__checkmark-path" fill="none" stroke="white" d="M1.73,12.91 8.1,19.28 22.79,4.59"/>
                    </svg>
                    <div class="mdc-checkbox__mixedmark"></div>
                </div>
            </div>
            <label for="my-checkbox" id="my-checkbox-label" style="margin-top:6px;">grade 11</label>
        </div> 
        <div class="mdc-form-field"  style="width:15%;">
            <div class="mdc-checkbox">
                <input input type="radio" name="batch" value="12" id="my-checkbox" class="mdc-checkbox__native-control"/>
                <div class="mdc-checkbox__background">
                    <svg class="mdc-checkbox__checkmark" viewBox="0 0 24 24">
                        <path class="mdc-checkbox__checkmark-path" fill="none" stroke="white" d="M1.73,12.91 8.1,19.28 22.79,4.59"/>
                    </svg>
                    <div class="mdc-checkbox__mixedmark"></div>
                </div>
            </div>
            <label for="my-checkbox" id="my-checkbox-label" style="margin-top:6px;">grade 12</label>
        </div>  
    </div>
</div>
<div class="form-group form-group-default {{ $errors->has('test') ? ' has-error' : '' }}" >
    <label>Number of test Persemister</label>
    <div class="controls">
        <input type="number" name="test" value="{{ old('test') }}" placeholder="Number of test Persemister" class="form-control" required>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group form-group-default {{ $errors->has('nosubject') ? ' has-error' : '' }}" >
            <label>Number of subject</label>
            <div class="controls">
                <input type="number" name="nosubject" value="{{ old('nosubject') }}" placeholder="Number of Subject" class="form-control" required>
            </div>
        </div>
    </div>  
    <div class="col-md-6">  
        <div class="form-group form-group-default {{ $errors->has('section') ? ' has-error' : '' }}" >
            <label>Number of Section</label>
            <div class="controls">
                <input type="number" name="section" value="{{ old('section') }}"  placeholder="Number of Section" class="form-control" required>
            </div>
        </div>
    </div>
</div>    
<div class="row">
    <div class="col-md-4">
        <div class="form-group form-group-default" >
            <label>Subject 1</label>
            <div class="controls">
                <input type="text" name="subject1"value="{{ old('subject1') }}" placeholder="Subject 1" class="form-control" >
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group form-group-default" >
            <label>Subject 2</label>
            <div class="controls">
                <input type="text" name="subject2"value="{{ old('subject2') }}" placeholder="Subject 2" class="form-control" >
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group form-group-default" >
            <label>Subject 3</label>
            <div class="controls">
                <input type="text" name="subject3"value="{{ old('subject3') }}" placeholder="Subject 3" class="form-control" >
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group form-group-default" >
            <label>Subject 4</label>
            <div class="controls">
                <input type="text" name="subject4"value="{{ old('subject4') }}" placeholder="Subject 4" class="form-control" >
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group form-group-default" >
            <label>Subject 5</label>
            <div class="controls">
                <input type="text" name="subject5"value="{{ old('subject5') }}" placeholder="Subject 5" class="form-control" >
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group form-group-default" >
            <label>Subject 6</label>
            <div class="controls">
                <input type="text" name="subject6"value="{{ old('subject6') }}" placeholder="Subject 6" class="form-control" >
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group form-group-default" >
            <label>Subject 7</label>
            <div class="controls">
                <input type="text" name="subject7"value="{{ old('subject7') }}" placeholder="Subject 7" class="form-control" >
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group form-group-default" >
            <label>Subject 8</label>
            <div class="controls">
                <input type="text" name="subject8"value="{{ old('subject8') }}" placeholder="Subject 8" class="form-control" >
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group form-group-default" >
            <label>Subject 9</label>
            <div class="controls">
                <input type="text" name="subject9"value="{{ old('subject9') }}" placeholder="Subject 9" class="form-control" >
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group form-group-default" >
            <label>Subject 10</label>
            <div class="controls">
                <input type="text" name="subject10"value="{{ old('subject10') }}" placeholder="Subject 10" class="form-control" >
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group form-group-default" >
            <label>Subject 11</label>
            <div class="controls">
                <input type="text" name="subject11"value="{{ old('subject11') }}" placeholder="Subject 11" class="form-control" >
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group form-group-default" >
            <label>Subject 12</label>
            <div class="controls">
                <input type="text" name="subject12"value="{{ old('subject12') }}" placeholder="Subject 12" class="form-control" >
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group form-group-default" >
            <label>Subject 13</label>
            <div class="controls">
                <input type="text" name="subject13"value="{{ old('subject13') }}" placeholder="Subject 13" class="form-control" >
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group form-group-default" >
            <label>Subject 14</label>
            <div class="controls">
                <input type="text" name="subject14"value="{{ old('subject14') }}" placeholder="Subject 14" class="form-control" >
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group form-group-default" >
            <label>Subject 15</label>
            <div class="controls">
                <input type="text" name="subject15"value="{{ old('subject15') }}" placeholder="Subject 15" class="form-control" >
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group form-group-default" >
            <label>Subject 16</label>
            <div class="controls">
                <input type="text" name="subject16"value="{{ old('subject16') }}" placeholder="Subject 16" class="form-control" >
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group form-group-default" >
            <label>Subject 17</label>
            <div class="controls">
                <input type="text" name="subject17"value="{{ old('subject17') }}" placeholder="Subject 17" class="form-control" >
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group form-group-default" >
            <label>Subject 18</label>
            <div class="controls">
                <input type="text" name="subject18"value="{{ old('subject18') }}" placeholder="Subject 18" class="form-control" >
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group form-group-default" >
            <label>Subject 19</label>
            <div class="controls">
                <input type="text" name="subject19"value="{{ old('subject19') }}" placeholder="Subject 19" class="form-control" >
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group form-group-default" >
            <label>Subject 20</label>
            <div class="controls">
                <input type="text" name="subject20"value="{{ old('subject20') }}" placeholder="Subject 20" class="form-control" >
            </div>
        </div>
    </div>
</div>    
<input type="hidden" name="_token" value="{{ Session::token() }}">
<button type="submit" class="btn mdc-button--raised btn-primary col-md-12" style="background:#3895ac; font-size:15px; text-transform: uppercase;" >
   ADD BATCH FOR {{ Auth::guard('schstaff')->user()->school_name }}
</button> 


</form>
<div class="well col-md-12" style=" background:#2f384b; overflow-x:auto;"> 
@if(session('subfailtable'))   
<div class="alert " style="  padding: 20px;  background-color: #f44336; /* Red */ color: white; border-left:6px solid #6b1905;  margin-bottom: 5px;">
    <span style="margin-left: 15px;  color: white;  font-weight: bold;  font-size:20px; float: right;  font-size: 22px;  line-height: 20px;  cursor: pointer;"
    onclick="this.parentElement.style.display='none';">&times;</span>
<p style="color: white; text-align:center; font-size:20px;"> {{session('subfailtable')}} </p>
</div> 
@endif 
@if(session('successtable'))
<div class="alert " style="  padding: 15px;  background-color: #44f436;  border-left:6px solid #0ca120; margin-bottom: 5px;">
        <span style="margin-left: 15px;  color: white;  font-weight: bold;  float: right;  font-size: 22px;  line-height: 20px;  cursor: pointer;"
              onclick="this.parentElement.style.display='none';">&times;</span>
    <p class="sute" > {{session('successtable')}} </p>
</div>
@endif


<table class="table table-bordered" >
        <thead class="thead-light">
            <tr>
                <th  scope="col" >school name</th>
                <th  scope="col" >school code</th> 
                <th  scope="col" >test number </th>
                <th  scope="col" >number section </th>
                <th  scope="col" >batch</th> 
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
        @foreach($bats as $bat)   
            @if( $bat->school_name  == (Auth::guard('schstaff')->user()->school_name)  )     
            <tbody>
                <tr>
                    <th >{{ $bat->school_name }}</th>
                    <th >{{$bat->school_code}}</th> 
                    <th >{{$bat->testno}} </th>
                    <th >{{$bat->no_section}} </th>
                    <th >{{$bat->batch}}</th> 
                    <th >{{$bat->subj1}} </th>
                    <th >{{$bat->subj2}} </th>
                    <th >{{$bat->subj3}} </th> 
                    <th >{{$bat->subj4}} </th>
                    <th >{{$bat->subj5}} </th>
                    <th >{{$bat->subj6}} </th> 
                    <th >{{$bat->subj7}} </th>
                    <th >{{$bat->subj8}} </th>
                    <th >{{$bat->subj9}} </th> 
                    <th >{{$bat->subj10}} </th>
                    <th >{{$bat->subj11}} </th>
                    <th >{{$bat->subj12}} </th>
                    <th >{{$bat->subj13}} </th> 
                    <th >{{$bat->subj14}} </th>
                    <th >{{$bat->subj15}} </th>
                    <th >{{$bat->subj16}} </th> 
                    <th >{{$bat->subj17}} </th>
                    <th >{{$bat->subj18}} </th>
                    <th >{{$bat->subj19}} </th> 
                    <th >{{$bat->subj20}} </th>
                    <th>
                        <form  action="{{ url(Auth::guard('schstaff')->user()->school_name.'/Staff/Batch/tableadded') }}" method="POST">
                            <input type="hidden" name="see" value="{{$bat->id}}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">  
                            <input type="submit" class="btn btn-lg btn-success col-md-12 col-sm-12 col-xs-12  " value="add table" >
                        </form>
                    </th>
                    <th>
                        <a type="button" href="{{ URL::to(Auth::guard('schstaff')->user()->school_name.'/staff/Batch/edit', $bat->id) }}" class="btn btn-lg btn-warning col-md-12 col-sm-12 col-xs-12 " >Edit table</a>
                    </th>
                    <th>
                        <a type="button" href="{{ url(Auth::guard('schstaff')->user()->school_name.'/staff/Batch', $bat->id) }}" class="btn btn-lg btn-danger col-md-12 col-sm-12 col-xs-12 " >Update table</a>
                    </th>
                </tr>
            </tbody>
            @endif
        @endforeach
      </table>
    </div>  
</div>
<div class="well col-md-12" style=" background:#2f384b; overflow-x:auto;"> 
@if(session('subfail'))   
<div class="alert " style="  padding: 20px;  background-color: #f44336; /* Red */ color: white; border-left:6px solid #6b1905;  margin-bottom: 5px;">
    <span style="margin-left: 15px;  color: white;  font-weight: bold;  font-size:20px; float: right;  font-size: 22px;  line-height: 20px;  cursor: pointer;"
    onclick="this.parentElement.style.display='none';">&times;</span>
<p style="color: white; text-align:center; font-size:20px;"> {{session('subfailtable')}} </p>
</div> 
@endif 
@if(session('successtabledelet'))
<div class="alert " style="  padding: 15px;  background-color: #44f436;  border-left:6px solid #0ca120; margin-bottom: 5px;">
        <span style="margin-left: 15px;  color: white;  font-weight: bold;  float: right;  font-size: 22px;  line-height: 20px;  cursor: pointer;"
              onclick="this.parentElement.style.display='none';">&times;</span>
    <p class="sute" > {{session('successtabledelet')}} </p>
</div>
@endif


<table class="table table-bordered" >
        <thead class="thead-light">
            <tr>
                <th  scope="col" >school_name</th>
                <th  scope="col" >school_code</th> 
                <th  scope="col" >table </th>
                <th  scope="col" >Delete</th>
            </tr>
        </thead>
        @foreach($tabs as $tab)          
        <tbody>
            <tr>
                <th >{{ $tab->schoolname }}</th>
                <th >{{$tab->schoolcode}}</th> 
                <th >{{$tab->tablename}} </th>
                <th>
                    <form  action="{{ url(Auth::guard('schstaff')->user()->school_name.'/Table/delete') }}" method="POST">
                        <input type="hidden" name="see" value="{{ $tab->id }}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">  
                        <input type="submit" class="btn btn-lg btn-danger col-md-12 col-sm-12 col-xs-12  " value="delete table" >
                    </form>
                </th>
            </tr>
        </tbody>
        @endforeach
      </table>
    </div> 
</div>
</main>
</div>
</body>
</html>
