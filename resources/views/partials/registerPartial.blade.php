
<h2>Register</h2>
<div class="gl-cover-250-c"><span class="b-margin-l-10 g-logo-cover gl-cover-250"></span></div>
{!! Form::open(['url' => '/auth/register', 'method' => 'POST']) !!}
<div class="form-group"><input type="text" placeholder="Your Email" class="glob-control noBwdTab" name="email"/></div>
<div class="form-group"><input type="text" placeholder="Your Password" class="glob-control" name="password"/></div>
<div class="form-group"><input type="text" placeholder="Confirm Password" class="glob-control" name="password_confirmation"/></div>
<div class="form-group"><button class="glob-control">Register</button></div>
{!! Form::close() !!}