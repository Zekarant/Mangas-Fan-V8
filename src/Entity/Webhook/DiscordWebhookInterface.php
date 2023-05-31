<?php

namespace App\Entity\Webhook;

interface DiscordWebhookInterface
{
    /**
     * Method who convert php object on array for json export.
     */
    public function convertToJson(): array;
}
