<?php
namespace App\Repositories\Models;

interface ModelRepositoryInterface
{
 
    public function all($columns = ['*']);
 
    public function paginate($perPage = 15, $columns = ['*']);
 
    public function create(array $data);
 
    public function update(array $data, $id);
 
    public function delete($id);
 
    public function find($id, $columns = ['*']);
 
    public function findBy($field, $value, $columns = ['*']);
    
    public function findByMany($field, $value, $columns = ['*']);
}
