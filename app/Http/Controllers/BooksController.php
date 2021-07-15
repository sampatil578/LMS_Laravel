<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Book;
use App\Models\bookreq;
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
        $data1=Book::join('requests', 'books.bid', '=', 'requests.rbid')
        ->where('sadm_no','=',session('student'))
        ->where('status','=','requested')
        ->get();
        $student = Student::where(["adm_no"=>session('student')])->first();
        return view('books',['book'=>$data,'student'=>$student,'data'=>$data1]);
    }

    /*function books(){
        $data=Book::leftJoin('requests', 'books.bid', '=', 'requests.rbid')
        ->orderBy('bid', 'ASC')
        ->get();
        $data = $data->groupBy('bid');
        //$data = $data->unique('bid');
        //->where('requests.sadm_no',session('student'))
        //->orWhere('requests.sadm_no',null)
        foreach($data as $item){
            echo $item;
            $item1 = $item->where('sadm_no','=',session('student'));
            echo $item1;
            echo "<br><br><br><br>";
            if($item1==null)
            echo $item;
            else
            echo $item1;
            echo "<br><br><br><br>";
        }
        echo $data;
        return count($data);
        $student = Student::where(["adm_no"=>session('student')])->first();
        $num = $student->book_num;
        return view('books',['book'=>$data,'num'=>$num]);
    }*/

    function requestbooks($bid){
        $req = new bookreq;
        $req->rbid = $bid;
        $req->sadm_no = session('student');
        $req->status = "requested";
        $req->save();
        $data = Book::where(["bid"=>$bid])->first();
        $book = Book::find($data->id);
        $book->quantity = $data->quantity-1;
        $book->save();
        $sid = Student::where(["adm_no"=>session('student')])->first();
        $student = Student::find($sid->id);
        $student->book_num = $student->book_num-1;
        if($student->bid1==0)
        $student->bid1 = $bid;
        else if($student->bid2==0)
        $student->bid2 = $bid;
        else
        $student->bid3 = $bid;
        $student->save();
        return redirect('mybooks');
    }
}
