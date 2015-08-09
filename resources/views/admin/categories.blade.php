@extends('layouts.admin')

@section('content')
			<div>
				<div class="col-lg-12 col-md-12">
					<div class="panel panel-default">
						<div class="panel-heading">
							Categories
						</div>
						<div class="panel-body">
							<ul class="list-group">
								@forelse($cats as $category)
								<li class="list-group-item">{{ $category->name }}</li>
								@empty>
								<li class="list-group-item">Empty</li>
								@endforelse
							</ul>
							<div class="panel panel-default">
								<div class="panel-heading">
									Add Categories
								</div>
								<div class="panel-body">
									{!! Form::open(['route' => 'categories.store', 'method' => 'POST', 'class' => 'form-horizontal']) !!}
										<div class="form-group">
											{!! Form::label('name', 'Name', ['class' => 'col-lg-2 col-md-2 control-label']) !!}
											<div class="col-lg-6 col-md-6">	
											{!! Form::text('name', null, ['class' => 'form-control', 'required' => 'true']) !!}
											</div>
										</div>
										<div class="form-group">
											<div class="col-lg-2 col-md-2 col-md-offset-2 col-lg-offset-2">
											{!! Form::submit('Create Category', ['class' => 'btn btn-default']) !!}
											</div>
										</div>
									{!! Form::close() !!}
								</div>
							</div>
						</div>						
					</div>
				</div>
			</div>
@stop