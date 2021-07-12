<x-master/>
<x-header/>
<div class="container">
    <div class="row">
        <div class="col-sm-12">
        <table>
                <tr>
                    <th>Book ID </th>
                    <th>Book Name</th>
                    <th>Author</th>
                    <th>Quantity</th>
                    @if(!session('admin'))
                        <th>Action</th>
                    @endif
                </tr>
                @foreach($book as $book)
                    <tr>
                        <td>{{$book['bid']}}</td>
                        <td>{{$book['bookname']}}</td>
                        <td>{{$book['author']}}</td>
                        <td>{{$book['quantity']}}</td>
                        <td>
                        @if(session('student'))
                            @if($book['quantity']>=0)
                                <form action="requestbooks/{{$book['bid']}}">
                                    <button class="btn btn-primary" type="submit">Request</button>
                                </form>
                            @else
                                <button class="btn btn-danger" type="submit">Unavailable</button>
                            @endif
                        @elseif(!session('admin'))
                            <form action="student_login">
                                <button class="btn btn-primary" type="submit">Request</button>
                            </form>
                        @endif
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>