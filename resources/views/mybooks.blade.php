<x-master/>
<x-header/>
<div class="container">
    <div class="row">
        <div class="col-sm-12">
        <table>
                <tr>
                    <th>Book ID</th>
                    <th>Bookname </th>
                    <th>Status</th>
                </tr>
                @foreach($data as $data)
                    <tr>
                        <td>{{$data['bid']}}</td>
                        <td>{{$data['bookname']}}</td>
                        @if($data['status']=='requested')
                        <td><button class="btn btn-warning" type="submit">Requested</button></td>
                        @elseif($data['status']=='approved')
                        <td><button class="btn btn-success" type="submit">Approved</button></td>
                        @elseif($data['status']=='declined')
                        <td><button class="btn btn-danger" type="submit">Declined</button></td>
                        @elseif($data['status']=='returned')
                        <td><button class="btn btn-primary" type="submit">Returned</button></td>
                        @endif
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>