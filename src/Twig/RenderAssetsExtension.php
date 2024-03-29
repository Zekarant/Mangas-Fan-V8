<?php

namespace App\Twig;

use Symfony\Component\HttpKernel\KernelInterface;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class RenderAssetsExtension extends AbstractExtension
{
    final public const ASSETS_ROUTE = '/assets/images/render/';

    public function __construct(private readonly KernelInterface $appKernel)
    {
    }

    public function getFunctions(): array
    {
        return [
            new TwigFunction('render_assets', $this->getAllRenderAssets(...)),
        ];
    }

    public function getAllRenderAssets(): array
    {
        $directory = $this->appKernel->getProjectDir().self::ASSETS_ROUTE;
        $allFiles = array_diff(scandir($directory), ['.', '..']);

        return array_map(fn ($file): string => 'build/images/render/'.$file, $allFiles);
    }
}
