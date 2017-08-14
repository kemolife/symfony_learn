<?php
declare(strict_types=1);

namespace AppBundle\Manager;


class ExamplePhp7
{
    public function test(int $id, string $str) : string
    {
        return $id . $str;
    }
}