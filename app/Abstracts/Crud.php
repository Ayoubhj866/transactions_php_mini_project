<?php 
namespace App\Abstracts ;

abstract class Crud 
{

    abstract public function readAll(): array ;
    
    abstract public function create(array $data) : bool ;

    abstract public function read(int $id) : object|array ;

    abstract public function where( string $column , mixed $value ) : object|bool ;

    abstract public function update(int $id , array  $data) : bool ;

    abstract public function delete(int $id) : bool ;
    
}