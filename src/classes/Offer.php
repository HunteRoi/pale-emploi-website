<?php

namespace Classes;

use DateTimeImmutable;

class Offer
{
    use Common\Entity;

    public string|null $filepath;
    private int $id;
    private string $title;
    private string|null $description;
    private string|null $city;
    private DateTimeImmutable|null $publication_date;
    private Employer $employer;

    public function __construct($id, $title, $description, $city, $publication_date, $employer)
    {
        $this->id = $id;
        $this->title = $title;
        $this->description = $description;
        $this->city = $city;
        $this->publication_date = $publication_date;
        $this->employer = $employer;
    }

    public function __toString()
    {
        return $this->title . " (" . $this->city . ")\n" . $this->description . "\nPublié par " . $this->employer . " le " . $this->getPublicationDate();
    }

    public function getPublicationDate($format = "d/m/Y"): string
    {
        return isset($this->publication_date) ? $this->publication_date->format($format) : "";
    }
}
