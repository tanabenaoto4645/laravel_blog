<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">

        <title>blog</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

    </head>
    <body>
        <h1>Blog Name</h1>
        <a href="posts/create">投稿</a>
        <div class='posts'>
            @foreach($posts as $post)
            <div class='post'>
                <h2 class='title'>
                    <a href="/posts/{{$post->id}}">{{$post->title}}</a>
                </h2>
                <p class='body'>{{$post->body}}</p>
                <p class="edit">[<a href="/posts/{{ $post->id }}/edit">edit</a>]</p>
                <form action="/posts/{{ $post->id }}" id="delete_{{ $post->id }}" method="post" style="display:inline">
                    @csrf
                    @method('DELETE')
                    <input type="button" value="delete" onclick='buttonClick({{ $post->id }}, "{{$post->title}}")'>
                </form>
                <script>
                function buttonClick(id, title){
                    if(window.confirm(title+"を削除しますか？")){
                        document.getElementById('delete_'+id).submit();
                        console.log('delete_'+id );
                    }
                }
                </script>
            </div>
            @endforeach
        </div>
        <div class='paginate'>
            {{ $posts->links() }}
        </div>
    </body>
</html>
