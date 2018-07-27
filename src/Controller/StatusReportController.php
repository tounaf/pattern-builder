<?php

namespace App\Controller;

use App\Builder\BuilderResolver;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class StatusReportController extends Controller
{
    /**
     * @param Request $request
     * @param BuilderResolver $builderResolver
     *
     * @Route(
     *     "/monitoring/status.{_format}",
     *     methods={"GET"},
     *     defaults={"_format": "html"},
     *     requirements={
     *         "_format": "html|json"
     *     }
     * )
     *
     * @return JsonResponse|Response
     *
     * @throws \Exception
     */
    public function renderAction(Request $request, BuilderResolver $builderResolver)
    {
        // bien sûr, ici, c'est un service qui va aller chercher ces informations et les transformer en tableau
        $monitoring = [
            ['name' => "connection mysql", "status" => 1, "message" => "The mysql connection succeeded."],
            ['name' => "connection mongoDB", "status" => 0, "message" => "The mongodb connection failed."],
        ];

        $builder = $builderResolver->getBuilder($request->getRequestFormat());

        return $builder->getReport($monitoring);
    }
}