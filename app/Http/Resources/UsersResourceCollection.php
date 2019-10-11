<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class UsersResourceCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     * Attention: using foreach loop instead of map to handle pagination on users collection
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        foreach ($this->resource as $resource) :
            $resource->username   = substr_replace($resource->username, '...', 13);
//            $resource->email      = array_combine(
//                ['address', 'host'],
//                explode('@', $resource->email)
//            );
        endforeach;

        return $this->resource;
    }
}
