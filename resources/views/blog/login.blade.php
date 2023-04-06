<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>login</title>
    <link rel="stylesheet" href="/css/blog/headerAndFooter.css">
    <link rel="stylesheet" href="/css/blog/loginAdmin.css">
</head>
<body>
    <header>
        <img src="/storage/logo_blog.png" alt="Richo Blog" id="logo"> 
    </header>
    <main>
        <h1>Login Form</h1>
        <form action="{{ route('AdMin123') }}" method="post" id="loginForm"> 
            @csrf
            <input type="text" name="pseudo" placeholder="Pseudo" required="required" value="{{ old('pseudo') }}">
            <input type="password" name="password" placeholder="Password" required="required">
            <button type="submit">Login</button>
        </form>
    </main>
    @include('blogLayouts.footer')
</body>
</html>