<?php

namespace App\Entity\Webhook;

class DiscordWebhook {
    private ?string $content = null;
    private ?array $embeds = [];

    public function getContent(): ?string {
        return $this->content;
    }

    public function setContent(string $content): void {
        $this->content = $content;
    }

    public function addEmbed(EmbedDiscordWebhook $embed) {
        $this->embeds[] = $embed;
    }

    public function convertToJson(): array {
        return [
            "content" => $this->getContent(),
            "embeds" => array_map(
                fn(EmbedDiscordWebhook $embed): array => $embed->convertToArray(),
                $this->embeds
            )
        ];
    }
}