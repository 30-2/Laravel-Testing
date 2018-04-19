@foreach($links as $link)
<tr >
    <td >{{$link->id}}</td>
    <td >{{$link->title}}</td>
    <td >{{$link->url}}</td>
</tr>
@endforeach