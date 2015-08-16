<div class="col-md-12 col-lg-12">
    <div class="panel panel-default">
        <div class="panel-heading">
            Administrators
        </div>
        <div class="panel-body">
            <table class="table">
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Active</th>
                </tr>
                @forelse($admins as $admin)
                    <tr>
                        <td>{{ $admin->name }}</td>
                        <td>{{ $admin->email }}</td>
                        <td>{{ $admin->active }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3">No admins</td>
                    </tr>
                @endforelse
            </table>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            Roles
        </div>
        <div class="panel-body">
            <table class="table">
                <tr>
                    <th>Name</th>
                    <th>Members</th>
                </tr>
                @forelse($roles as $role)
                    <tr>
                        <td>{{ $role->name }}</td>
                        <td>{{ $role->admins()->count() }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="2">No roles</td>
                    </tr>
                @endforelse
            </table>
        </div>
    </div>
    <div class="panel panel-danger">
        <div class="panel-heading">
            Register New Admin
        </div>
        <div class="panel-body">
            {!! Form::open(['action' => 'AuthController@registerAdmin', 'method' => 'POST', 'class' => 'form-horizontal']) !!}
            <div class="form-group">
                {!! Form::label('username', 'Username', ['class' => 'control-label col-md-2 col-lg-2']) !!}
                <div class="col-md-8 col-lg-8">
                    {!! Form::text('username', null, ['class' => 'form-control']) !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('password', 'Password', ['class' => 'control-label col-md-2 col-lg-2']) !!}
                <div class="col-md-8 col-lg-8">
                    {!! Form::password('password', ['class' => 'form-control']) !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('password_confirmation', 'Confirm Password', ['class' => 'control-label col-md-2 col-lg-2']) !!}
                <div class="col-md-8 col-lg-8">
                    {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
                </div>
            </div>
            <div class="form-group">
                <div class="col-lg-2 col-md-2 col-md-offset-2 col-lg-offset-2">
                    {!! Form::submit('Submit', ['class' => 'btn btn-danger']) !!}
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>