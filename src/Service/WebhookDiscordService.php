<?php

namespace App\Service;

use App\Entity\Webhook\DiscordWebhook;
use App\Entity\Webhook\Embed\AuthorEmbedDiscordWebhook;
use App\Entity\Webhook\Embed\ImageEmbedDiscordWebhook;
use App\Entity\Webhook\Embed\EmbedDiscordWebhook;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class WebhookDiscordService
{
    final public const MF_NEWS_TITLE_AUTHOR = "Mangas'Fan - Nouvelle news !";
    final public const MF_NEWS_URL_AUTHOR = 'https://www.mangasfan.fr';
    final public const MF_NEWS_ICON_AUTHOR = 'https://zupimages.net/up/21/03/hjkk.png';
    final public const MF_NEWS_URL_IMAGE = 'https://www.mangasfan.fr/hebergeur/uploads/1656883720.jpeg';

    public function __construct(
        private readonly HttpClientInterface $client,
        private readonly string $idWebhookDiscord,
        private readonly string $tokenWebhookDiscord
    ) {
    }

    /**
     * Method who send a signal to our discord webhook.
     *
     * @param string $content - content of message
     *
     * @throws TransportExceptionInterface
     */
    public function sendMessage(string $content): void
    {
        $discordWebhook = new DiscordWebhook();
        $discordWebhook->setContent($content);

        $this->sendRequest($discordWebhook->convertToJson());
    }

    /**
     * @throws TransportExceptionInterface
     */
    public function sendMessageEmbed(string $title, string $description, string $url, int $color, bool $showAuthor = true): void
    {
        $discordWebhook = new DiscordWebhook();

        $embed = new EmbedDiscordWebhook();
        $embed->setTitle($title);
        $embed->setDescription($description);
        $embed->setUrl('https://127.0.0.1:8000/news/'.$url);
        $embed->setColor($color);
        if ($showAuthor) {
            $embed->setAuthor($this->mangasFanSignature());
        }
        $embed->setImage($this->imageNews());

        $discordWebhook->addEmbed($embed);

        $this->sendRequest($discordWebhook->convertToJson());
    }

    /**
     * @throws TransportExceptionInterface
     *
     * @see https://discord.com/developers/docs/resources/webhook
     */
    private function sendRequest(array $json): void
    {
        $url = "https://discordapp.com/api/webhooks/{$this->idWebhookDiscord}/{$this->tokenWebhookDiscord}";

        $this->client->request('POST', $url, [
            'headers' => [
                'content-type' => 'application/json',
            ],
            'json' => $json,
        ]);
    }

    private function mangasFanSignature(): AuthorEmbedDiscordWebhook
    {
        $author = new AuthorEmbedDiscordWebhook(self::MF_NEWS_TITLE_AUTHOR);

        $author->setIconUrl(self::MF_NEWS_ICON_AUTHOR);
        $author->setUrl(self::MF_NEWS_URL_AUTHOR);

        return $author;
    }

    private function imageNews(): ImageEmbedDiscordWebhook
    {
        $image = new ImageEmbedDiscordWebhook();

        $image->setUrl(self::MF_NEWS_URL_IMAGE);

        return $image;
    }
}
