<x-master/>
<x-header/>
<div class="container">
    <div class="row">
        <div class="col-sm-12">
        <table>
                <tr>
                    <th>Name </th>
                    <th>Admission Number </th>
                    <th>Email </th>
                    <th>Books taken</th>
                    <th>Fine </th>
                </tr>
                @foreach($student as $student)
                    <tr>
                        <td><a href="profile/{{$student['adm_no']}}">{{$student['name']}}</a></td>
                        <td>{{$student['adm_no']}}</td>
                        <td>{{$student['email']}}</td>
                        <td>{{3-$student['book_num']}}</td>
                        <td>{{$student['fine']}}</td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>