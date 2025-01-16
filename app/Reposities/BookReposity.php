<?php

namespace App\Reposities;

use App\Models\Book;
use App\Interfaces\Reposity\BookReposityInterface;

class BookReposity implements BookReposityInterface
{
    /**
     * Create a new class instance.
     */
  public function books(){
     $books = Book::paginate(5);
     return $books;
  }
  public function createbook($book){
 $kitob = new Book();
 $kitob->author = $book['author'];
 $kitob->fill($book['translations']);
 $kitob->save();
 return $kitob;
  }
  public function show($id){
  $book = Book::findOrFail($id);
  return $book;
  }
  public function updatebook($id, $book){
  $kitob = Book::findOrFail($id);
  $kitob->fill($book['translations']);
  $kitob->author = $book['author'];
  $kitob->save();
  return $kitob;
  }
  public function deletebook($id){
     $kitob = Book::findOrFail($id);
     $kitob->delete();
  }
}
