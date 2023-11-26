<?php

namespace Classes;

class Offer
{
    use Common\Entity;
    
    private string $title;
    private string|null $description;
    private string|null $city;
    private \DateTimeImmutable|null $publication_date;
    private Employer $employer;
    
    public function __construct($title, $description, $city, $publication_date, $employer)
    {
        $this->title = $title;
        $this->description = $description;
        $this->city = $city;
        $this->publication_date = $publication_date;
        $this->employer = $employer;
    }

    public function getPublicationDate($format = "d/m/Y"): string
    {
        return isset($this->publication_date) ? $this->publication_date->format($format) : "";
    }
    
    public function __toString()
    {
        echo var_dump($this);
        
        return $this->title . " (" . $this->city . ")\n" . $this->description . "\nPublié par " . $this->employer . " le " . $this->getPublicationDate();
    }
}
