<?php

namespace Higherror\RelokiaTestProject;
class Contact
{
    public ?int $id = null;
    public string $name = "";
    public string $email = "";

    public function __construct(?int $id){
        if ($id != null){
            $this->id = $id;
            $array = Http::get_data("contacts/$id");
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