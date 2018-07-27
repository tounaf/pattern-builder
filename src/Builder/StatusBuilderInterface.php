<?php

namespace App\Builder;

use Symfony\Component\HttpFoundation\Response;

interface StatusBuilderInterface
{
    /**
     * @param array $results
     *
     * @return Response
     */
    public function getReport(array $results);

    /**
     * @param string $format
     *
     * @return StatusBuilderInterface
     */
    public function isFormatMatch(string $format);
}