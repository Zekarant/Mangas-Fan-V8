<?php

namespace App\Entity\Webhook;

class EmbedDiscordWebhook {
    private ?string $title = null;
    private ?string $type = null;
    private ?string $description = null;
    private ?string $url = null;

    public function getTitle(): ?string {
        return $this->title;
    }

    public function setTitle(string $title): void {
        $this->title = $title;
    }

    public function getType(): ?string {
        return $this->type;
    }

    public function setType(string $type): void {
        $this->type = $type;
    }

    public function getDescription(): ?string {
        return $this->description;
    }

    public function setDescription(string $description): void {
        $this->description = $description;
    }

    public function getUrl(): ?string {
        return $this->url;
    }

    public function setUrl(string $url): void {
        $this->url = $url;
    }

    public function convertToArray(): array {
        return [
            "title" => $this->getTitle(),
            "type" => $this->getType(),
            "description" => $this->getDescription(),
            "url" => $this->getUrl()
        ];
    }
}