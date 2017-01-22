@extends('layout.login')

@section('content')
            <div class="form-fields">
            
                        
                          <form method="post" name="registration_form" action="/register">
              
               <div class="company-story-content"><h2 class="story-title">Create <span class="color-text">Account</span></h2></div>
               <span class="error" id="regError"></span>
                <div class="form-group">
                  <label>Email<span>*</span></label>
                  <input class="form-control txt-fc info" id="1" type="text" name="email" id="email" maxlength="50" required />
                   <span id="limit1" class="limiter"><span>
                
                </div>

              {!! csrf_field() !!}
                <div class="form-group">
                  <label>Username<span>*</span></label>
                  <input  class="form-control txt-fc info" id="2" maxlength="20" type='text' name='username' id='username' required />
                   <span id="limit2" class="limiter"><span>
                </div>
                <div class="form-group">
                  <label>Password<span>*</span></label>
                  <input class="form-control txt-fc" type="password" name="password" id="password" />
                </div>
                <div class="form-group">
                  <label>Confirm Password</label>
                  <input class="form-control txt-fc" type="password" name="confirmpwd" id="confirmpwd" />
                </div>
                <input class="hidden" name="priv" value="Owner"/>
                <div class="form-action clearfix">
                  <input type="button" class="btn-fc" onclick="location.href='/'" value="Go Back" style="width: 49.5%; background-color: lightgrey;"/>&nbsp;&nbsp;<input class="btn-fc" style="width: 49.68%" type="submit" value="Continue" onclick="return regformhash(this.form,this.form.username,this.form.email,this.form.password,this.form.confirmpwd);" />
                </div>
                </form>
                                

              
              
            </div>

@stop
         
     

           