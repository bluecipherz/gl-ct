@include('layouts.randImg')
    <div class="adm-h-toppanel">
        <button class="adm-nav-btns" id="AddGrid">New grid</button>
        <button class="adm-nav-btns" id="SaveGrid">Save</button>
        <a class="adm-nav-btns" id="SaveGrid" href="{{ url('/homegrids/reset') }}">Reset</a>
        {!! Form::open(['url' => '/post-home-wall', 'method' => 'POST', 'files' => 'true']) !!}
            <input type="file" class="adm-nav-btns" name="image"/>
            <button type="submit" class="adm-nav-btns">Upload</button>
        {!! Form::close() !!}
    </div>

    <div class=" adm-homeOuter ">
        <div id="adm-homeInner">

        </div>
    </div>