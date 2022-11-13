<?php

namespace App\Entity\Webhook;

interface DiscordWebhookInterface {
    /**
     * Method who convert php object on array for json export
     * @return array
     */
    public function convertToJson(): array;
}