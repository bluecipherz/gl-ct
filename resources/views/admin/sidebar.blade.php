
<div class="adm-sidebar">
    <ul class="list-group cust-list-group">
        @foreach($pages as $page)
            <li class="list-group-item {{ Request::is($page['request']) ? 'active' : '' }}">
                <a href="{{ route($page['map']) }}">{{ $page['title'] }}</a>
            </li>
        @endforeach
    </ul>
</div>