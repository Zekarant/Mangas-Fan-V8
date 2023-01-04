<?php

namespace App\Entity\Webhook\Embed;

use App\Entity\Webhook\DiscordWebhookInterface;

class ImageEmbedDiscordWebhook implements DiscordWebhookInterface {

    private ?string $url = null;


    public function setUrl(string $url): void {
        $this->url = $url;
    }


    public function convertToJson(): array {
        return [
            "url" => $this->url
        ];
    }
}