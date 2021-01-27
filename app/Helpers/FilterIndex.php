<?php


namespace App\Helpers;

use Illuminate\Http\Request;

class FilterIndex
{
    private $sortBy = 'id';
    private $sortOrder = 'asc';
    private $filters = [];
    private $key;
    private $value;
    private $condition;
    private $entity;


    public function __construct(Request $request)
    {
        if ($request->input('sort')) {
            $this->sortBy = $request->input('sort')['key'];
            $this->sortOrder = $request->input('sort')['direction'];
        }
        if ($request->input('filter')) {
            $this->filters = $request->input('filter');
        }

    }

    public function complexFilter($ent)
    {
        $this->entity = $ent;

        if (count($this->filters)) {
            foreach ($this->filters as $v) if (!is_null($v['value'])) {
                $this->key = $v['key'];
                $this->value = is_numeric($v['value']) ? (int)$v['value'] : $v['value'];
                $this->condition = $v['condition'];

                switch ($this->condition) {
                    case 'like':
                        $this->like();
                        break;
                    case 'select':
                        $this->select();
                        break;
                    case 'selectInSet':
                        $this->selectInSet();
                        break;
                    default:
                        $this->defaultCondition();
                        break;
                }
            }
        }

        return $this->entity->orderBy($this->sortBy, $this->sortOrder)->get();

    }


    public function like()
    {
        $this->entity->where($this->key, $this->condition, '%' . $this->value . '%');
    }

    private function select()
    {
        $this->entity->where($this->key, $this->value);
    }

    private function selectInSet()
    {
        $this->entity->whereRaw('FIND_IN_SET("' . $this->value . '", ' . $this->key . ')');
    }

    private function defaultCondition()
    {
        $this->entity->where($this->key, $this->condition, $this->value);
    }


}
