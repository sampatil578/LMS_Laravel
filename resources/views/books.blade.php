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
                @if(session('student'))
                    @foreach($data as $data)
                        <tr>
                            <td>{{$data['bid']}}</td>
                            <td>{{$data['bookname']}}</td>
                            <td>{{$data['author']}}</td>
                            <td>{{$data['quantity']}}</td>
                            <td>
                                @if(session('student'))
                                    @if(($student['adm_no']==session('student'))&&($data['status']=='requested'))
                                        <button class="btn btn-warning" type="submit">Requested</button>
                                    @endif
                                @endif
                            </td>
                        </tr>
                    @endforeach
                @endif
                    @foreach($book as $book)
                        @if(session('student'))
                            @if($book['bid']!=$student['bid1'] && $book['bid']!=$student['bid2'] && $book['bid']!=$student['bid3'])
                                <tr>
                                    <td>{{$book['bid']}}</td>
                                    <td>{{$book['bookname']}}</td>
                                    <td>{{$book['author']}}</td>
                                    <td>{{$book['quantity']}}</td>
                                    <td>
                                    @if(session('student'))
                                        @if($student['book_num']<=0)
                                            <button class="btn btn-danger" type="submit">Book Limit Reached</button>
                                        @elseif($book['quantity']<=0)
                                            <button class="btn btn-danger" type="submit">Unavailable</button>
                                        @elseif(($student['adm_no']==session('student'))&&($book['status']=='requested'))
                                            <button class="btn btn-warning" type="submit">Requested</button>
                                        @else
                                            <form action="requestbooks/{{$book['bid']}}">
                                                <button class="btn btn-primary" type="submit">Request</button>
                                            </form>    
                                        @endif
                                    @else
                                        <form action="student_login">
                                            <button class="btn btn-primary" type="submit">Request</button>
                                        </form>
                                    @endif
                                    </td>
                                </tr>
                            @endif
                        @elseif(session('admin'))
                        <tr>
                            <td>{{$book['bid']}}</td>
                            <td>{{$book['bookname']}}</td>
                            <td>{{$book['author']}}</td>
                            <td>{{$book['quantity']}}</td>
                        </tr>
                        @else
                        <tr>
                            <td>{{$book['bid']}}</td>
                            <td>{{$book['bookname']}}</td>
                            <td>{{$book['author']}}</td>
                            <td>{{$book['quantity']}}</td>
                            <td>
                                <form action="student_login">
                                    <button class="btn btn-primary" type="submit">Request</button>
                                </form>
                            </td>
                        </tr>
                        @endif
                    @endforeach
            </table>
        </div>
    </div>
</div>