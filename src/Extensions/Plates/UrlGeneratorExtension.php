<?php

namespace App\Extensions\Plates;

use League\Plates\Engine;
use League\Plates\Extension\ExtensionInterface;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class UrlGeneratorExtension implements ExtensionInterface
{
    private UrlGeneratorInterface $urlGenerator;

    public function __construct(
        UrlGeneratorInterface $urlGenerator
    ) {
        $this->urlGenerator = $urlGenerator;
    }

    public function register(Engine $engine)
    {
        $engine->registerFunction('url', [$this, 'url']);
    }

    public function url(string $routeName, array $params = [])
    {
        return $this->urlGenerator->generate($routeName, $params);
    }
}
