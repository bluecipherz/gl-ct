
<h2>Login</h2>
<div class="gl-cover-250-c"><span class="b-margin-l-10 g-logo-cover gl-cover-250"></span></div>
{!! Form::open(['url' => '/auth/login', 'method' => 'POST']) !!}
<div class="form-group"><input type="text" placeholder="Your Email" class="glob-control" name="email"/></div>
<div class="form-group"><input type="text" placeholder="Your Password" class="glob-control noFwdTab" name="password"/></div>
<div class="form-group"><button class="glob-control">Login</button></div>
{!! Form::close() !!}
