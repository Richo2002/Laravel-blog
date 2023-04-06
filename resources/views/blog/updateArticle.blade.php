<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Articles</title>
    <link rel="stylesheet" href="/css/blog/headerAndFooter.css">
    <link rel="stylesheet" href="/css/blog/addArticle.css">
</head>
<body>
    @include('blogLayouts.header')
    <main>
        <h1>Update an article</h1>
        <form action="{{ route('updateArticle', $article->id) }}" method="post" id="addForm" enctype="multipart/form-data">
            @csrf
            <input type="text" name="title" id="" placeholder="Title" required="required" value="{{ isset($article->title)==true ? ($article->title ):  old('title')}}">
            <input type="file" name="image" id="" required="required" class="custom-file-input">
            <textarea name="content" id="" cols="30" rows="10" placeholder="Description" required="required">{{ isset($article->title)==true ?  strip_tags($article->content) : old('content')}}</textarea>
            <button type="submit">Update an article</button>
        </form>
    </main>
    @include('blogLayouts.footer')
</body>
</html>