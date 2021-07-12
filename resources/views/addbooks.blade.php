<x-master/>
<x-header/>
<div class="container custom-signup">
    <div class="row">
        <div class="col-sm-4 col-sm-offset-4">
        <form action="addbooks" method="POST">
        @csrf
            <div class="form-group">
                <label for="bid">Book ID</label>
                <span style="color:red"><br>@error('bid'){{$message}}@enderror</span>
                <input type="number" name="bid" class="form-control"  placeholder="Enter Book ID" value="">
            </div>
            <div class="form-group">
                <label for="bookname">Book Name</label>
                <span style="color:red"><br>@error('bookname'){{$message}}@enderror</span>
                <input type="text" name="bookname" class="form-control"  placeholder="Enter Book Name" value="">
            </div>
            <div class="form-group">
                <label for="author">Author</label>
                <span style="color:red"><br>@error('author'){{$message}}@enderror</span>
                <input type="text" name="author" class="form-control"  placeholder="Enter Author Name" value="">
            </div>
            <div class="form-group">
                <label for="quantity">Quantity</label>
                <span style="color:red"><br>@error('quantity'){{$message}}@enderror</span>
                <input type="number" name="quantity" class="form-control"  placeholder="Enter Quantity" value="">
            </div>
            <button type="submit" class="btn btn-primary">Add Book</button>
        </form>
        </div>
    </div>
</div>