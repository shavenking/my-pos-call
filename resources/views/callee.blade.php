<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ $shopId }}呼叫器</title>
    <link href="{{ asset('js/app.js') }}"/>
</head>
<body>
<h1>{{ $shopId }}呼叫器主機</h1>
<button id="sound-testing" type="button">測試音效</button>
<div x-data="{tableIds: []}" @calls.window="tableIds.unshift($event.detail.tableId)">
    <template x-for="tableId in tableIds">
        <p>
            <span x-text="tableId"></span> 呼叫！
        </p>
    </template>
</div>

</body>
<script src="{{ asset('js/app.js') }}"></script>
<script>
    const sound = new Howl({
        src: ['{{ asset('alert.mp3') }}'],
    });

    document.getElementById('sound-testing').addEventListener('click', function () {
        sound.play()
    })

    Echo.channel('calls.{{md5($shopId)}}')
        .listen('TableCall', function (e) {
            sound.play();

            window.dispatchEvent(new CustomEvent('calls', {
                detail: {
                    tableId: e.tableId,
                },
            }))
        })
</script>
</html>
