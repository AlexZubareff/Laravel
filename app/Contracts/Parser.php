<?php
declare(strict_types=1);

namespace App\Contracts;

use App\Models\Source;

interface Parser
{
    /**
     * @param string $url
     * @return Parser
     */
    public function setUrl(string $url):self;

    /**
     * @return array
     */
    public function getData(): array;

    public function saveParseData($dataParse, Source $source):array;

}
