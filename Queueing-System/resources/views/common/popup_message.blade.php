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
