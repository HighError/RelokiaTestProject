<?php

namespace Higherror\RelokiaTestProject;
class Agent
{
    private ?int $id = null;
    private string $name = "";
    private string $email = "";

    public function __construct(?int $id){
        if ($id != null){
            $this->id = $id;
            $array = Http::get_data("agents/$id")["contact"];
            $this->name = $array["name"];
            $this->email = $array["email"];
        }
    }

    public function getId(){
        return $this->id;
    }
    public function getName(){
        return $this->name;
    }
    public function getEmail(){
        return $this->email;
    }
}