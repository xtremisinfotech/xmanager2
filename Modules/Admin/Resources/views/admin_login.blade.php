<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{ route('admin.doLogin') }}" method="POST">
        @csrf
        <input type="text" name="email" id="email" value="{{ old('email') }}">
        <input type="password" name="password" id="password" value="">
        <input type="submit" name="submit" id="submit" value="submit">
    </form>
</body>
</html>