<x-master/>
<x-header/>
<div class="container custom-signup">
    <div class="row">
        <div class="col-sm-4 col-sm-offset-4">
        <form action="student_signup" method="POST">
        @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control"  placeholder="Enter Name" value="">
            </div>
            <div class="form-group">
                <label for="adm_no">Admission No.</label>
                <input type="text" name="adm_no" class="form-control"  placeholder="Enter Adm No." value="">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control" placeholder="Enter Password" value="">
            </div>
            <div class="form-group">
                <label for="cpassword">Confirm Password</label>
                <input type="password" name="cpassword" class="form-control" placeholder="Re-enter Password" value="">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control"  placeholder="Enter Email" value="">
            </div>
            <button type="submit" class="btn btn-primary">Sign Up</button>
        </form>
        </div>
    </div>
</div>