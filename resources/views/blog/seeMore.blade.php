<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/blog/headerAndFooter.css">
    <link rel="stylesheet" href="/css/blog/seeMore.css">
    <title>More</title>
</head>
<body>
    @include('blogLayouts.header')
    <main>
        <h3>{{ strip_tags($article->title) }}</h3>
        <div class="underTitle">
            <span id="by">By Ulrich Boss</span>
            <span>{{ $article->created_at }}</span>
        </div>
        <img src="/storage/articles/{{ $article->imagePath }}" alt="{{ strip_tags($article->title) }}" id="ImageSeeMore" alt="">
        <p>{!! $article->content !!}</p>
        <form action="{{ route('seeMore', $article->id) }}" method="post" id="addCommentForm">
            @csrf
            <input type="text" name="pseudo" id="" placeholder="Pseudo" required="required">
            <textarea name="comment" id="" cols="30" rows="10" placeholder="Comment" required="required"></textarea>
            <button type="submit">Comment</button>
        </form>
        <h2>{{ count($article->comments) }} <span>{{ count($article->comments)>0 ? 'Comments' : 'Comment' }}</span></h2>
        @if (count($article->comments)>0)
            <div class="bloc-Comments">
                @foreach ($article->comments as $comment)
                    <div class="bloc-Comment">
                        <div class="bloc-profileAndPseudo">
                            <img src="/storage/profil.png" alt="">
                            <h3>{{ $comment->user->pseudo }}</h3>
                        </div>
                        <p>{{ strip_tags($comment->description) }}</p>
                        <span>{{ $comment->created_at }}</span>
                        @if (Auth::check())
                            <a href="{{ route('deleteComment', $comment->id) }}">Supprimer</a>
                        @endif
                    </div>
                @endforeach
            </div>
        @endif
    </main>
    @include('blogLayouts.footer')
</body>
</html>