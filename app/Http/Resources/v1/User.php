<?php

namespace App\Http\Resources\v1;

use Illuminate\Http\Resources\Json\JsonResource;

class User extends JsonResource
{
public $token;
    public function __construct($resource ,$token)
    {
        $this->token=$token;
        parent::__construct($resource);
    }

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [

            'name'=>$this->name,
            'eamil'=>$this->email,
            'api_token'=>$this->token,
        ];
    }
}
