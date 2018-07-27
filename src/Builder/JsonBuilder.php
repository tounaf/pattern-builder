<?php

namespace App\Builder;

use Symfony\Component\HttpFoundation\JsonResponse;

class JsonBuilder implements StatusBuilderInterface
{
    /**
     * @param array $results
     *
     * @return JsonResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function getReport(array $results)
    {
        return new JsonResponse($results);
    }

    /**
     * @param string $format
     *
     * @return StatusBuilderInterface|string
     */
    public function isFormatMatch(string $format)
    {
        return 'json' === $format;
    }
}