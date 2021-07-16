<x-master/>
<x-header/>
<div class="container profile">
    <div class="row">
    <div class="col-sm-4 col-sm-offset-4">
        <table>
                <tr>
                    <td>Name </td>
                    <td>{{$data['name']}}</td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td>{{$data['adm_no']}}</td>
                </tr>
                <tr>
                    <td>Contact</td>
                    <td>{{$data['email']}}</td>
                </tr>
                <tr>
                    <td>Fine</td>
                    <td>
                        {{$data['fine']}}
                    </td>
                </tr>
        </table><br>
                @if($data['fine']>0 && $data['adm_no']==session('student'))
                    <form action="{{route('paytm.payment')}}" method="POST">
                    @csrf
                        <input type="hidden" name="fine" class="form-control"  value="{{$data['fine']}}">
                        <input type="hidden" name="adm_no" class="form-control"  value="{{session('student')}}">
                        <button class="btn btn-primary" type="submit">Pay Fine</button>
                    </form> 
                @endif
        </div>
        <div class="col-sm-12">
        <h3>Books Borrowed</h3>
        <table>
                <tr>
                    <th>Book ID</th>
                    <th>Bookname </th>
                    <th>Status</th>
                </tr>
                @foreach($book as $book)
                    <tr>
                        <td>{{$book['bid']}}</td>
                        <td>{{$book['bookname']}}</td>
                        @if($book['status']=='requested')
                        <td><button class="btn btn-warning" type="submit">Requested</button></td>
                        @elseif($book['status']=='approved')
                        <td><button class="btn btn-success" type="submit">Approved</button></td>
                        @endif
                    </tr>
                @endforeach
        </table>
        </div>
    </div>
</div>