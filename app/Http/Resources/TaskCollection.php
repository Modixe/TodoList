<?php

namespace App\Http\Resources;

use App\Http\Controllers\Api\TaskListController;
use App\Models\TasksModel;
use Illuminate\Http\Resources\Json\ResourceCollection;

class TaskCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
//    public function toArray($request)
//    {
//
//        return [
////            'data' => $this->collection,
//////            'links' => [
//////                'self' => route(TaskListController.index)
//////            ]
//        ];
////        return parent::toArray($request);
//    }
}
