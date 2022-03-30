<h1>Data from <a href="https://jsonplaceholder.typicode.com/posts">https://jsonplaceholder.typicode.com/posts</a></h1>

@foreach ($json as $item)
    <br>UserId: {{$item['userId']}}, id: {{$item['id']}} <br>Title: {{$item['title']}}<br>Body: {{$item['body']}}<br>
@endforeach