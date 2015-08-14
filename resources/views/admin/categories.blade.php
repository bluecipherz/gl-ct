@extends('layouts.admin')

@section('content')
			<div>
				<div class="col-lg-12 col-md-12">
					<div class="panel panel-default">
						<div class="panel-heading">
							Categories
						</div>
						<div class="panel-body">
                            <ol class="breadcrumb">
                                <li><a href="{{ url('/admin/categories') }}">Home</a></li>
                                @if(isset($category))
                                    @if($category->getLevel() > 1)
                                        <li><a href="{{ url('/admin/categories/' . $category->parent()->first()->parent()->first()['id']) }}">{{ $category->parent()->first()->parent()->first()['name'] }}</a></li>
                                    @endif
                                    @if($category->getLevel() > 0)
                                        <li><a href="{{ url('/admin/categories/' . $category->parent()->first()['id']) }}">{{ $category->parent()->first()['name'] }}</a></li>
                                    @endif
                                    <li><a href="{{ url('/admin/categories/' . $category->id) }}">{{ $category->name }}</a></li>
                                @endif
                            </ol>
                            @if(isset($category) && $category->getLevel() == 2)
                                <div class="jumbotron">
                                    <h3>{{ $category->name }}</h3>
                                </div>
                            @else
                                <table class="table">
                                    <tr>
                                        <th>Name</th>
                                        <th>Type</th>
                                        <th>Parent</th>
                                    </tr>
                                    @forelse($cats as $category)
                                        <tr>
                                            <td><a href="{{ url('/admin/categories/' . $category->id) }}">{{ $category->name }}</a></td>
                                            <td>{{ $levels[$category->getLevel()] }}</td>
                                            <td>{{ $category->parent()->first()['name'] }}</td>
                                        </tr>
                                    @empty>
                                    <tr>
                                        <td colspan="3">Empty</td>
                                    </tr>
                                    @endforelse
                                </table>
                            @endif
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
                                            {!! Form::label('level', 'Level', ['class' => 'col-lg-2 col-md-2 control-label']) !!}
                                            <div class="col-lg-6 col-md-6">
                                                {!! Form::select('level', $levels, null, ['class' => 'form-control', 'required' => 'true', 'id' => 'category_level']) !!}
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            {!! Form::label('parent', 'Parent', ['class' => 'col-lg-2 col-md-2 control-label']) !!}
                                            <div class="col-lg-6 col-md-6">
                                                {!! Form::select('parent', $allcats->lists('name'), null, ['class' => 'form-control', 'required' => 'true']) !!}
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