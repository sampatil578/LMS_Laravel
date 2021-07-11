<x-master/>
<x-header/>
<div class="container custom-login">
    <div class="row">
        <div class="col-sm-4 col-sm-offset-4">
        <form action="student_login" method="POST">
        @csrf
            <div class="form-group">
                <label for="email">Admission No.</label>
                <input type="text" name="adm_no" class="form-control"  placeholder="Enter Adm No." value="">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control" placeholder="Password" value="">
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
        </div>
    </div>
</div>