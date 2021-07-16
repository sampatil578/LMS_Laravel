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
                    <th>Email</th>
                    <th>Return</th>
                </tr>
                @foreach($data as $data)
                    <tr>
                        <td>{{$data['bid']}}</td>
                        <td>{{$data['bookname']}}</td>
                        <td><a href="profile/{{$data['adm_no']}}">{{$data['name']}}</a></td>
                        <td>{{$data['adm_no']}}</td>
                        <td>{{$data['email']}}</td>
                        <td>
                            <form action="returnbook/{{$data['bid']}}_{{$data['adm_no']}}">
                                <button class="btn btn-primary" type="submit">Return</button>
                            </form>    
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>