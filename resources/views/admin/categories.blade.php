			<div>
				<div class="col-lg-12 col-md-12">
					<div class="panel panel-default">
                        <ul class="nav nav-tabs">
                            <li role="presentation"><a href="{{ url('/admin/categories?view=hierarchy') }}">Heirarchy</a></li>
                            <li role="presentation"><a href="{{ url('/admin/categories?view=type') }}">Type</a></li>
                            <li role="presentation"><a href="{{ url('/admin/categories?view=all') }}">All</a></li>
                        </ul>
                        @if($view == 'hierarchy')
                            <ol class="breadcrumb">
                                <li><a href="{{ url('/admin/categories?view=hierarchy') }}">Home</a></li>
                                @if($category != null)
                                    @if($category->getLevel() > 1)
                                        <li><a href="{{ url('/admin/categories?view=hierarchy&category=' . $category->parent()->first()->parent()->first()['id']) }}">{{ $category->parent()->first()->parent()->first()['name'] }}</a></li>
                                    @endif
                                    @if($category->getLevel() > 0)
                                        <li><a href="{{ url('/admin/categories?view=hierarchy&category=' . $category->parent()->first()['id']) }}">{{ $category->parent()->first()['name'] }}</a></li>
                                    @endif
                                    <li><a href="{{ url('/admin/categories?view=hierarchy&category=' . $category->id) }}">{{ $category->name }}</a></li>
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
                                        <th>Options</th>
                                    </tr>
                                    @if($category != null)
                                        @forelse($category->children()->get() as $cat)
                                            <tr>
                                                <td><a href="{{ url('/admin/categories?view=hierarchy&category=' . $cat->id ) }}">{{ $cat->name }}</a></td>
                                                <td>{{ $levels[$cat->getLevel()] }}</td>
                                                <td>{{ gettype($cat->parent()->first()['name']) }}</td>
                                                <td>
                                                    <div>
                                                        {!! Form::open(['route' => ['categories.destroy', $cat->id], 'method' => 'DELETE']) !!}
                                                        <button class="btn btn-default btn-xs cat-del-btn" type="submit" title="Delete"><span class="glyphicon glyphicon-remove"></span></button>
                                                        {!! Form::close() !!}
                                                        <button class="btn btn-default btn-xs cat-edit-btn" title="Edit"><span class="glyphicon glyphicon-edit"></span></button>
                                                    </div>
                                                </td>
                                            </tr>
                                        @empty>
                                        <tr>
                                            <td colspan="4">Empty</td>
                                        </tr>
                                        @endforelse
                                    @else
                                        @forelse($cats as $category)
                                            <tr>
                                                <td><a href="{{ url('/admin/categories?view=hierarchy&category=' . $category->id) }}">{{ $category->name }}</a></td>
                                                <td>{{ $levels[$category->getLevel()] }}</td>
                                                <td>{{ $category->parent()->first()['name'] }}</td>
                                                <td>
                                                    <div>
                                                        {!! Form::open(['route' => ['categories.destroy', $category->id], 'method' => 'DELETE']) !!}
                                                        <button class="btn btn-default btn-xs cat-del-btn" type="submit" title="Delete"><span class="glyphicon glyphicon-remove"></span></button>
                                                        {!! Form::close() !!}
                                                        <button class="btn btn-default btn-xs cat-edit-btn" title="Edit"><span class="glyphicon glyphicon-edit"></span></button>
                                                    </div>
                                                </td>
                                            </tr>
                                        @empty>
                                        <tr>
                                            <td colspan="4">Empty</td>
                                        </tr>
                                        @endforelse
                                    @endif
                                </table>
                            @endif
                        @elseif($view == 'type')
                            <ul class="nav nav-pills">
                                <li role="presentation"><a href="{{ url('/admin/categories?view=type&type=main-categories') }}">Main Categories</a></li>
                                <li role="presentation"><a href="{{ url('/admin/categories?view=type&type=sub-categories') }}">Sub Categories</a></li>
                                <li role="presentation"><a href="{{ url('/admin/categories?view=type&type=post-sub-categories') }}">Post Sub Categories</a></li>
                            </ul>
                            <table class="table">
                                <tr>
                                    <th>Name</th>
                                    <th>Type</th>
                                    <th>Parent</th>
                                    <th>Options</th>
                                </tr>
                                @forelse($cats as $category)
                                    <tr>
                                        <td><a href="{{ url('/admin/categories?view=type') }}">{{ $category->name }}</a></td>
                                        <td>{{ $levels[$category->getLevel()] }}</td>
                                        <td>{{ $category->parent()->first()['name'] }}</td>
                                        <td>
                                            <div>
                                                {!! Form::open(['route' => ['categories.destroy', $category->id], 'method' => 'DELETE']) !!}
                                                <button class="btn btn-default btn-xs cat-del-btn" type="submit" title="Delete"><span class="glyphicon glyphicon-remove"></span></button>
                                                {!! Form::close() !!}
                                                <button class="btn btn-default btn-xs cat-edit-btn" title="Edit"><span class="glyphicon glyphicon-edit"></span></button>
                                            </div>
                                        </td>
                                    </tr>
                                @empty>
                                <tr>
                                    <td colspan="4">Empty</td>
                                </tr>
                                @endforelse
                            </table>
                            {!! $cats->render() !!}
                        @elseif($view == 'all')
                            <table class="table">
                                <tr>
                                    <th>Name</th>
                                    <th>Type</th>
                                    <th>Parent</th>
                                    <th>Options</th>
                                </tr>
                                @forelse($cats as $category)
                                    <tr>
                                        <td><a href="{{ url('/admin/categories?view=all') }}">{{ $category->name }}</a></td>
                                        <td>{{ $levels[$category->getLevel()] }}</td>
                                        <td>{{ $category->parent()->first()['name'] }}</td>
                                        <td>
                                            <div>
                                                {!! Form::open(['route' => ['categories.destroy', $category->id], 'method' => 'DELETE']) !!}
                                                <button class="btn btn-default btn-xs cat-del-btn" type="submit" title="Delete"><span class="glyphicon glyphicon-remove"></span></button>
                                                {!! Form::close() !!}
                                                <button class="btn btn-default btn-xs cat-edit-btn" title="Edit"><span class="glyphicon glyphicon-edit"></span></button>
                                            </div>
                                        </td>
                                    </tr>
                                @empty>
                                <tr>
                                    <td colspan="4">Empty</td>
                                </tr>
                                @endforelse
                            </table>
                            {!! $cats->render() !!}
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
                                        <div class="form-group" id="parent_div">
                                            {!! Form::label('parent', 'Parent', ['class' => 'col-lg-2 col-md-2 control-label']) !!}
                                            <div class="col-lg-6 col-md-6">
                                                {!! Form::select('parent', $cats->lists('name'), null, ['class' => 'form-control', 'required' => 'true', 'id' => 'parent_list']) !!}
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