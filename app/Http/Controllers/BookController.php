<?php

namespace App\Http\Controllers;

use App\DTO\BookDTO;
use App\Http\Requests\BookStoreRequest;
use App\Http\Requests\BookUpdateRequest;
use App\Http\Resources\BookResource;
use App\Interfaces\Services\BookServiceInterface;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct(protected BookServiceInterface $bookServiceInterface){}
    public function index()
    {
        $books = $this->bookServiceInterface->allBooks();
        return $this->responsePagination($books,BookResource::collection($books),__('successes.all'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BookStoreRequest $request)
    {
        $bookDTO = new BookDTO($request->author,$request->translations);
        $book = $this->bookServiceInterface->create($bookDTO);
        return $this->success(new BookResource($book),__('successes.created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $book = $this->bookServiceInterface->find($id);
        return $this->success(new BookResource($book),__('successes.show'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BookUpdateRequest $request, string $id)
    {
        $bookDTO = new BookDTO($request->author,$request->translations);
        $book = $this->bookServiceInterface->update($id,$bookDTO);
        return $this->success(new BookResource($book),__('successes.updated'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $book = $this->bookServiceInterface->delete($id);
        return $this->success([],__('successes.deleted'),204);
    }
}
