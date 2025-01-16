<?php

namespace App\Services;

use App\Interfaces\Reposity\BookReposityInterface;
use App\Interfaces\Services\BookServiceInterface;
use App\TranslationTrait;

class BookService implements BookServiceInterface
{
    /**
     * Create a new class instance.
     */
    use TranslationTrait;
    public function __construct(protected BookReposityInterface $bookReposityInterface){}
    public function allBooks(){
       return $this->bookReposityInterface->books();
    }
    public function create($bookDTO){
        $translations = $this->prepareTranslations(['translations' => $bookDTO->translations], ['title','description']);
        $book = [
            'translations' => $translations,
            'author' => $bookDTO->author,
        ];
        return $this->bookReposityInterface->createbook($book);
    }
    public function find($id){
   return $this->bookReposityInterface->show($id);
    }
    public function update($id,$bookDTO){
        $translations = $this->prepareTranslations(['translations' => $bookDTO->translations], ['title','description']);
        $book = [
            'translations' => $translations,
            'author' => $bookDTO->author,
        ];
        return $this->bookReposityInterface->updatebook($id,$book);
    }
    public function delete($id){
    return $this->bookReposityInterface->deletebook($id);
    }
}
