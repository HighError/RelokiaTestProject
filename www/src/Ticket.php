<?php

namespace Higherror\RelokiaTestProject;

class Ticket
{
    private int $id;
    private string $description;
    private int $status;
    private int $priority;
    private Agent $agent;
    private Contact $contact;
    private Group $group;
    private Company $company;
    private array $comments;

    function __construct(array $json_element)
    {
        $this->id = $json_element["id"];
        $this->description = $this->fixDescription($json_element["description_text"]);
        $this->status = $json_element["status"];
        $this->priority = $json_element["priority"];
        $this->agent = new Agent($json_element["responder_id"]);
        $this->contact = new Contact($json_element["requester_id"]);
        $this->group = new Group($json_element["group_id"]);
        $this->company = new Company($json_element["company_id"]);
        $this->comments = Http::get_data("tickets/{$this->id}/conversations");
    }

    public function getId()
    {
        return $this->id;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function getPriority()
    {
        return $this->priority;
    }

    public function getAgent()
    {
        return $this->agent;
    }

    public function getContact()
    {
        return $this->contact;
    }

    public function getGroup()
    {
        return $this->group;
    }

    public function getCompany()
    {
        return $this->company;
    }

    public function getComments()
    {
        return $this->comments;
    }

    private function fixDescription(string $str)
    {
        $fix_str = str_replace("\n", " ", $str);
        $fix_str = str_replace("“", "\"", $fix_str);
        $fix_str = str_replace("”", "\"", $fix_str);
        return str_replace("’", "'", $fix_str);
    }
}