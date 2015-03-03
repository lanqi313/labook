<?php namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Request;
use App\Book;
use App\User;
use Auth;
class BookController extends Controller {

	
	function  alluserBook(){
		$books = Book::all();
		$title = "All  book  database:";
		$bookstat = "borrowbook";
		return view('book')->with('books', $books)->with('title',$title)->with('bookstat',$bookstat);

	 }
	 function  find_book(){

	 	$bookname = Request::input('bookname');
		$book = Book::where(array('bookname' => $bookname)) ->get();
		return view('findbook') -> with('book',$book);
	  }
	 function borrow($name,$isbn ){
		$title = "All  book  database:";
		$bookstat = "borrowbook";
		$books = Book::all();
		$user_id  =User::where('name',  '=',  $name)->first()->id;
		$book_state = Book::where('isbn' , '=', "$isbn") -> first();
		$book_state->state =  'no';
		$book_state->user_id = $user_id;
		$book_state ->save();		
		return view('book')->with('books', $books)->with('title',$title)->with('bookstat',$bookstat);
	 }
	function  back($name,$isbn){

		$title = "The  user's  book  database:";
		$bookstat = "backbook";
		$book = Book::where('isbn' , '=', "$isbn") -> first();
		$book ->state =  'yes';
		$book->user_id = 0;
		$book ->save();
		$user_book  =User::where('name',  '=',  $name)->get();
		foreach ($user_book as $books) {

		return view('users.userbook')->with('books', $books)->with('title',$title)->with('bookstat',$bookstat);
		}
	}	
	function  userBook(){
		$title = "The  user's  book  database:";
		$bookstat = "backbook";
		$name = Auth::user()->name;
		$user_book  =User::where('name',  '=',  $name)->get();
		foreach ($user_book as $books) {
			return view('users.userbook')->with('books', $books)->with('title',$title)->with('bookstat',$bookstat);
		}
		

	}
	function  deleteBook(){
		$isbn  =   Request::input('isbn');
		$book  =  Book::where('isbn',  '=',  $isbn)->delete();
		return  view('auth.delete_book');		
	}
	function  insertBook(){
		$isbn  =  Request::input('isbn');
		$bookname  =  Request::input('bookname');
		$bookstate   =   Request::input('bookstate');
		$user_id   =  Request::input('user_id');
		$book  =  new  Book;
		$book  ->  isbn =  $isbn;
		$book ->  bookname  =  $bookname;
		$book  -> state  =  $bookstate;
		$book  ->  user_id  =  $user_id;
		$book ->  save();
		return  view('auth.insert_book');

	}
	
	function   changePassword(){


		return  view('change_password');
	}
  

}