<x-master/>
<x-header/>
<div class="container custom-login">
    <div class="row">
        <div class="col-sm-4 col-sm-offset-4">
        <form action="admin_login" method="POST">
        @csrf
            <div class="form-group">
                <label for="email">Username</label>
                <input type="text" name="username" class="form-control"  placeholder="Enter username" value="">
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