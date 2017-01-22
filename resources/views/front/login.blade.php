@extends('layout.login')

@section('content')
            <div class="form-fields">
            
                        <div class="form-fields" id="loginForm">
            <div class="company-story-content"><h2 class="story-title">Login</h2></div>
            <span class="error" id="regError">{{Session::get('error')}}</span>
              <form action="/login" method="post" name="login_form">

              {!! csrf_field() !!}
                <div class="form-group">
                  <input type="text" class="txt-fc form-control" name="email" placeholder="Email" value="{{old('email')}}" />
                </div>
                <div class="form-group">
                  <input type="password" class="txt-fc form-control" name="password" id="password" placeholder="Password"/>
                </div>
                <div class="form-action clearfix">
                  <input class="btn-fc" type="submit" value="Login" onclick="formhash(this.form, this.form.password);"/>
                </div>
                <br />
                <div>Forgot Password?<a href="/forgot_password"> Reset Here!</a></div>
                <div>Don't own any store?<a href="/register"> Become Owner Now!</a></div>
                <div>Are you unemployeed?<a href="/storelist"> Apply Now!</a></div>
              </form>
            </div>
                        
                            

              
              
            </div>
         
    @stop