@if(session('success') || session('error'))
<div id="Message" onclick="mousedown(event)">
    <div class="area-message">
        <div>
            <span
                style="font-style: italic;"><b>{{ (session('success') !== null) ? session('success') : session('error') }}</b>
            </span>
        </div>
    </div>
</div>
@endif

@if($errors->any())
<div id="Message" onclick="mousedown(event)">
    <div class="area-message">
        <div>
            <span style="font-style: italic;">
                <b>
                    @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </b>
            </span>
        </div>
    </div>
</div>
@endif