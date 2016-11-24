<?php
namespace App\Repositories\Models;

use App;
use Illuminate\Database\Eloquent\Model;

abstract class AbstractModelRepository
{
    protected $model;

    public function __construct()
    {
        $this->makeModel();
    }

    abstract function model();

    public function all($columns = ['*'])
    {
        return $this->model->get($columns);
    }
 
    public function paginate($perPage = 15, $columns = ['*'])
    {
        return $this->model->paginate($perPage, $columns);
    }
 
    public function create(array $data)
    {
        return $this->model->create($data);
    }
 
    public function update(array $data, $id, $attribute = 'id')
    {
        return $this->model->where($attribute, '=', $id)->update($data);
    }
 
    public function delete($id)
    {
        return $this->model->destroy($id);
    }
 
    public function find($id, $columns = ['*'])
    {
        return $this->model->findOrFail($id, $columns);
    }
 
    public function findBy($field, $value, $columns = ['*'])
    {
        return $this->model->where($field, '=', $value)->first($columns);
    }

    public function findByMany($field, $value, $columns = ['*'])
    {
        return $this->model->where($field, '=', $value)->get($columns);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Builder
     * @throws RepositoryException
     */
    protected function makeModel()
    {
        $model = App::make($this->model());

        if (!$model instanceof Model) {
            throw new RepositoryException("Class {$this->model()} must be an instance of Illuminate\\Database\\Eloquent\\Model");
        }
        return $this->model = $model;
    }
}
