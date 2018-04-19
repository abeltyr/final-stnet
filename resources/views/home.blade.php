@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                
                <form action="Admin" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group form-group-default col-md-6">
                        <input type="file" class="col-md-10  col-md-offset-1 col-sm-10 col-sm-offset-2 col-xs-12 col-xs-offset-0 btn btn-primary" style="margin-top:10px;" name="avatar">
                    </div>
                    <div class="form-group form-group-default {{ $errors->has('email') ? ' has-error' : '' }}" id="emailGroup">
                        <label>First name</label>
                        <div class="controls">
                            <input type="text" name="fname" id="fname" value="{{ old('fname') }}" placeholder="First name" class="form-control" required>
                         </div>
                    </div>
                    <div class="form-group form-group-default {{ $errors->has('email') ? ' has-error' : '' }}" id="emailGroup">
                        <label>Last name</label>
                        <div class="controls">
                            <input type="text" name="lname" id="lname" value="{{ old('lname') }}" placeholder="Last name" class="form-control" required>
                         </div>
                    </div>
                    <div class="form-group form-group-default {{ $errors->has('email') ? ' has-error' : '' }}" id="emailGroup">
                        <label>E-Mail</label>
                        <div class="controls">
                            <input type="email" name="email" id="email" value="{{ old('email') }}" placeholder="E-Mail" class="form-control" required>
                         </div>
                    </div>
                    <div class="form-group form-group-default {{ $errors->has('phone') ? ' has-error' : '' }}" id="phoneGroup">
                        <label>phone</label>
                        <div class="controls">
                            <input type="number" name="phone" id="phone" value="{{ old('phone') }}" placeholder="phone" class="form-control" required>
                         </div>
                    </div>

                    <div class="form-group form-group-default {{ $errors->has('password') ? ' has-error' : '' }}" id="passwordGroup">
                        <label>Password</label>
                        <div class="controls">
                            <input type="password" name="password" placeholder="Password" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group form-group-default {{ $errors->has('password') ? ' has-error' : '' }}" id="passwordGroup">
                        <label>Confirm Password</label>
                        <div class="controls">
                            <input type="password" name="password_confirmation" placeholder="confirm password" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group form-group-default {{ $errors->has('pin') ? ' has-error' : '' }}" id="pinGroup">
                        <label>Pin code</label>
                        <div class="controls">
                            <input type="number" name="pin" placeholder="Pin code" alue="{{ old('pin') }}" class="form-control" required>
                        </div>
                    </div>
                    <input type="hidden" name="_token" value="{{ Session::token() }}">
                    <button type="submit" class="btn mdc-button--raised btn-primary col-md-offset-4 col-md-4 col-xs-8 col-xs-offset-2 col-sm-8 col-md-offset-2 logas" style="background:#3895ac; font-size:15px;" >
                        Create
                    </button>  </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
