<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ $shopId }}呼叫器</title>
    <link href="{{ asset('js/app.js') }}"/>
</head>
<body>
<h1>{{ $shopId }}呼叫器（桌號 {{ $tableId }}）</h1>
<form action="/caller/{{$shopId}}/{{$tableId}}/calls" method="POST">
    <button type="submit">呼叫</button>
</form>

</body>
<script src="{{ asset('js/app.js') }}"></script>
@if (session('success'))
    <script>
        swal({
            title: "{{ session('success') }}",
            icon: "success",
            button: "謝謝",
        });
    </script>
@endif
</html>
