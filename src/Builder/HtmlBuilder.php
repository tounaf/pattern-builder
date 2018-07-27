<?php

namespace App\Builder;

use Symfony\Component\HttpFoundation\Response;

class HtmlBuilder implements StatusBuilderInterface
{
    /**
     * @var \Twig_Environment
     */
    private $templating;

    /**
     * @param \Twig_Environment $templating
     */
    public function __construct(\Twig_Environment $templating)
    {
        $this->templating = $templating;
    }
    /**
     * @param array $results
     *
     * @return Response
     *
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    public function getReport(array $results)
    {
        return new Response($this->templating->render('index.html.twig', ['results' => $results]));
    }

    /**
     * @param string $format
     *
     * @return StatusBuilderInterface|string
     */
    public function isFormatMatch(string $format)
    {
        return 'html' === $format;
    }
}