<?php

namespace Higherror\RelokiaTestProject;
class Group
{
    public ?int $id = null;
    public string $name = "";

    public function __construct(?int $id){
        if ($id != null){
            $this->id = $id;
            $array = Http::get_data("groups/$id");
            $this->name = $array["name"];
        }
    }

    public function getId(){
        return $this->id;
    }
    public function getName(){
        return $this->name;
    }
}