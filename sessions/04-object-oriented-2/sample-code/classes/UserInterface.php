<?php
declare(strict_types=1);
interface UserInterface {
    public function getName(): string;
    public function setName(string $name);
    public function getTitle(): string;
    public function setTitle(?string $title);
}