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
        ->where('status','=','requested')
        ->orWhere('status','=','approved')
        ->orderBy('bid')
        ->get();
        $data1 = $data1->where('sadm_no','=',session('student'));
        $student = Student::where(["adm_no"=>session('student')])->first();
        return view('books',['book'=>$data,'student'=>$student,'data'=>$data1]);
    }

    function requestbooks($bid){
        $req = new bookreq;
        $req->rbid = $bid;
        $req->sadm_no = session('student');
        $req->status = "requested";
        $req->save();
        $data = Book::where(["bid"=>$bid])->first();
        $book = Book::find($data->id);
        $book->save();
        $sid = Student::where(["adm_no"=>session('student')])->first();
        $student = Student::find($sid->id);
        if($student->bid1==0)
        $student->bid1 = $bid;
        else if($student->bid2==0)
        $student->bid2 = $bid;
        else
        $student->bid3 = $bid;
        $student->book_num = $student->book_num - 1;
        $student->save();
        return redirect('mybooks');
    }

    function requests(){
        $data=bookreq::join('books', 'books.bid', '=', 'requests.rbid')
        ->join('students', 'students.adm_no', '=', 'requests.sadm_no')
        ->where('status','=','requested')
        ->get();
        return view('bookrequests',['data'=>$data]);
    }

    function bbooks(){
        $data=bookreq::join('books', 'books.bid', '=', 'requests.rbid')
        ->join('students', 'students.adm_no', '=', 'requests.sadm_no')
        ->where('status','=','approved')
        ->get();
        return view('bbooks',['data'=>$data]);
    }

    function mybooks(){
        $data=bookreq::join('books', 'books.bid', '=', 'requests.rbid')
        ->where('sadm_no','=',session('student'))
        ->get();
        return view('mybooks',['data'=>$data]);
    }

    function approve($bid,$adm){
        $fid = bookreq::where(["rbid"=>$bid,"sadm_no"=>$adm,"status"=>"requested"])->first();
        $sid = Book::where(["bid"=>$bid])->first();
        $book = Book::find($sid->id);
        $req = bookreq::find($fid->id);
        $req->status = "approved";
        $req->save();
        $book->quantity = $book->quantity - 1;
        $book->save();
        return redirect('bookrequests');
    }

    function decline($bid,$adm){
        $fid = bookreq::where(["rbid"=>$bid,"sadm_no"=>$adm,"status"=>"requested"])->first();
        $sid = Student::where(["adm_no"=>$adm])->first();
        $student = Student::find($sid->id);
        $req = bookreq::find($fid->id);
        $req->status = "declined";
        $req->save();
        if($student->bid1==$bid){
            $student->bid1 = $student->bid2;
            $student->bid2 = $student->bid3;
            $student->bid3 = 0;
        }
        else if($student->bid2==$bid){
            $student->bid2 = $student->bid3;
            $student->bid3 = 0;
        }
        else
        $student->bid3 = 0;
        $student->book_num = $student->book_num + 1;
        $student->save();
        return redirect('bookrequests');
    }
}
