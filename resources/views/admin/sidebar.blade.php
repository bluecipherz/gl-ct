
<div class="adm-sidebar">
    <ul class="list-group cust-list-group">
        @foreach($pages as $page)
            <li class="list-group-item {{ Request::is($page['request']) ? 'active' : '' }}">
                <a href="{{ route($page['route']) }}">{{ $page['title'] }}</a>
            </li>
        @endforeach
    </ul>
</div>