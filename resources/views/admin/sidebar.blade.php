
<div class="adm-sidebar">
    <ul class="list-group cust-list-group">
        @foreach($pages as $page)
            <li class="list-group-item"><a href="{{ $page['href'] }}">{{ $page['name'] }}</a></li>
        @endforeach
    </ul>
</div>