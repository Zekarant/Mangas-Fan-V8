<?php

namespace App\Entity\Webhook\Embed;

use App\Entity\Webhook\DiscordWebhookInterface;

class EmbedDiscordWebhook implements DiscordWebhookInterface {
    private ?string $title = null;
    private ?string $type = null;
    private ?string $description = null;
    private ?int $color = null;
    private ?string $url = null;

    private ?AuthorEmbedDiscordWebhook $author = null;

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

    public function getColor(): ?string {
        return $this->color;
    }

    public function setColor(string $color): void {
        $this->color = $color;
    }

    public function setAuthor(AuthorEmbedDiscordWebhook $author): void {
        $this->author = $author;
    }

    public function convertToJson(): array {
        return [
            "title" => $this->getTitle(),
            "type" => $this->getType(),
            "description" => $this->getDescription(),
            "url" => $this->getUrl(),
            "color" => $this->getColor(),
            "author" => $this->author->convertToJson()
        ];
    }
}