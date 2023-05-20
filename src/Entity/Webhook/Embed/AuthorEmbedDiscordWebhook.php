<?php

namespace App\Entity\Webhook\Embed;

use App\Entity\Webhook\DiscordWebhookInterface;

class AuthorEmbedDiscordWebhook implements DiscordWebhookInterface
{
    private ?string $url = null;
    private ?string $iconUrl = null;
    private ?string $proxyIconUrl = null;

    public function __construct(private readonly string $name)
    {
    }

    public function setUrl(string $url): void
    {
        $this->url = $url;
    }

    public function setIconUrl(string $iconUrl): void
    {
        $this->iconUrl = $iconUrl;
    }

    public function setProxyIconUrl(string $proxyIconUrl): void
    {
        $this->proxyIconUrl = $proxyIconUrl;
    }

    public function convertToJson(): array
    {
        return [
            'name' => $this->name,
            'url' => $this->url,
            'icon_url' => $this->iconUrl,
            'proxy_icon_url' => $this->proxyIconUrl,
        ];
    }
}
