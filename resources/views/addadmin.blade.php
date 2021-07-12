<x-master/>
<x-header/>
<div class="container custom-signup">
    <div class="row">
        <div class="col-sm-4 col-sm-offset-4">
        <form action="addadmin" method="POST">
        @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <span style="color:red"><br>@error('name'){{$message}}@enderror</span>
                <input type="text" name="name" class="form-control"  placeholder="Enter Name" value="">
            </div>
            <div class="form-group">
                <label for="username">Username</label>
                <span style="color:red"><br>@error('username'){{$message}}@enderror</span>
                <input type="text" name="username" class="form-control"  placeholder="Enter Username" value="">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <span style="color:red"><br>@error('password'){{$message}}@enderror</span>
                <input type="password" name="password" class="form-control" placeholder="Enter Password" value="">
            </div>
            <div class="form-group">
                <label for="cpassword">Confirm Password</label>
                <span style="color:red"><br>@error('cpassword'){{$message}}@enderror</span>
                <input type="password" name="cpassword" class="form-control" placeholder="Re-enter Password" value="">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <span style="color:red"><br>@error('email'){{$message}}@enderror</span>
                <input type="email" name="email" class="form-control"  placeholder="Enter Email" value="">
            </div>
            <button type="submit" class="btn btn-primary">Add Admin</button>
        </form>
        </div>
    </div>
</div>