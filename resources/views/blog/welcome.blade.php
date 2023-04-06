<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome</title>
    <link rel="stylesheet" href="/css/blog/welcome.css">
    <link rel="stylesheet" href="/css/blog/headerAndFooter.css">
</head>
<body>
    @include('blogLayouts.header')
    <main>
        <div class="titleAndIcon">
            <h1>Articles</h1>
            {{-- <i class="fas fa-plus plusIcon"></i> --}}
            <a href="{{ route('addArticle') }}"><img src="/storage/plus.png" alt="Ajouter un article"></a>
        </div>
        <div class="articlesBox">
            @forelse ($articles as $article)
                <div class="imageAndContent">
                    <img src="/storage/articles/{{ $article->imagePath }}" alt="{{ strip_tags($article->title) }}">
                    <h4>{{ str_replace(array('\n', '\r'), '', substr(strip_tags($article->title),0, 40)).' ...'  }}</h4>
                    <p>{{ str_replace(array('\n', '\r'), '', substr(strip_tags($article->content),0, 155)).' ...' }}</p>
                    <span><a href="{{ route('seeMore', $article->id) }}">See More</a>@if (Auth::check())<a href="{{ route('updateArticle', $article->id) }}">Update</a><a href="{{ route('deleteArticle', $article->id) }}">Delete</a>@endif</span>
                </div>
            @empty
                <marquee behavior="" direction=""><h1>Aucune reservation n'a ete faite pour l'instant</h1></marquee>
            @endforelse
        </div>
    </main>
    @include('blogLayouts.footer')
</body>
</html>