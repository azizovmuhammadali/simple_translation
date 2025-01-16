<?php

namespace App\Interfaces\Services;

interface BookServiceInterface
{
    public function allBooks();
    public function create($bookDTO);
    public function find($id);
    public function update($id, $bookDTO);
    public function delete($id);
}
