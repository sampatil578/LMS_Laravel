<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class BooksController extends Controller
{
    //
    function addbook(Request $req){
        $req->validate([
            'bid' => 'required',
            'bookname'=>'required',
            'author'=>'required',
            'quantity' => 'required',
        ]);
        $data = Book::where(["bid"=>$req->bid])->first();
        if($data==NULL){
            $book = new book;
            $book->bid = $req->bid;
            $book->bookname = $req->bookname;
            $book->author = $req->author;
            $book->quantity = $req->quantity;
            $book->save();
            return redirect('books');
        }
        $book = Book::find($data->id);
        $book->quantity = $data->quantity+$req->quantity;
        $book->save();
        return redirect('books');
    }

    function books(){
        $data = Book::select("*")->get();
        return view('books',['book'=>$data]);
    }
}
