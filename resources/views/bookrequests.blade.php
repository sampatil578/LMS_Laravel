<x-master/>
<x-header/>
<div class="container">
    <div class="row">
        <div class="col-sm-12">
        <table>
                <tr>
                    <th>Book ID</th>
                    <th>Bookname </th>
                    <th>Requested By</th>
                    <th>Admission No.</th>
                    <th>Quantity Available</th>
                    <th>Approve</th>
                    <th>Decline</th>
                </tr>
                @foreach($data as $data)
                    <tr>
                        <td>{{$data['bid']}}</td>
                        <td>{{$data['bookname']}}</td>
                        <td>{{$data['name']}}</td>
                        <td>{{$data['adm_no']}}</td>
                        <td>{{$data['quantity']}}</td>
                        <td>
                            <form action="approverequests/{{$data['bid']}}_{{$data['adm_no']}}">
                                <button class="btn btn-success" type="submit">Approve</button>
                            </form>    
                        </td>
                        <td>
                            <form action="declinerequests/{{$data['bid']}}_{{$data['adm_no']}}">
                                <button class="btn btn-danger" type="submit">Decline</button>
                            </form>    
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>