<?php
    namespace App\Service;

    use App\Entity\Webhook\DiscordWebhook;
    use App\Entity\Webhook\Embed\AuthorEmbedDiscordWebhook;
    use App\Entity\Webhook\Embed\EmbedDiscordWebhook;
    use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;
    use Symfony\Contracts\HttpClient\HttpClientInterface;

    class WebhookDiscordService {
        const MF_NEWS_TITLE_AUTHOR = "Mangas'Fan - Nouvelle news !";
        const MF_NEWS_URL_AUTHOR = "https://www.mangasfan.fr";
        const MF_NEWS_ICON_AUTHOR = "https://zupimages.net/up/21/03/hjkk.png";

        private string $idWebhookDiscord;
        private string $tokenWebhookDiscord;
        private HttpClientInterface $client;

        public function __construct(HttpClientInterface $httpClient) {
            $this->client = $httpClient;
            $this->idWebhookDiscord = $_ENV['ID_WEBHOOK_DISCORD'];
            $this->tokenWebhookDiscord = $_ENV['TOKEN_WEBHOOK_DISCORD'];
        }

        /**
         * Method who send a signal to our discord webhook
         * @param string $content - content of message
         * @return void
         * @throws TransportExceptionInterface
         */
        public function sendMessage(string $content): void {
            $discordWebhook = new DiscordWebhook();
            $discordWebhook->setContent($content);

            $this->sendRequest($discordWebhook->convertToJson());
        }

        /**
         * @throws TransportExceptionInterface
         */
        public function sendMessageEmbed(string $title, string $description, bool $showAuthor = true): void {
            $discordWebhook = new DiscordWebhook();

            $embed = new EmbedDiscordWebhook();
            $embed->setTitle($title);
            $embed->setDescription($description);

            if ($showAuthor) {
                $embed->setAuthor($this->mangasFanSignature());
            }

            $discordWebhook->addEmbed($embed);

            $this->sendRequest($discordWebhook->convertToJson());
        }

        /**
         * @throws TransportExceptionInterface
         * @link https://discord.com/developers/docs/resources/webhook
         */
        private function sendRequest(array $json): void {
            $url = "https://discordapp.com/api/webhooks/{$this->idWebhookDiscord}/{$this->tokenWebhookDiscord}";

            $this->client->request("POST", $url, [
                'headers' => [
                    'content-type' => 'application/json'
                ],
                'json' => $json
            ]);
        }

        private function mangasFanSignature(): AuthorEmbedDiscordWebhook {
            $author = new AuthorEmbedDiscordWebhook(self::MF_NEWS_TITLE_AUTHOR);

            $author->setIconUrl(self::MF_NEWS_ICON_AUTHOR);
            $author->setUrl(self::MF_NEWS_URL_AUTHOR);

            return $author;
        }
    }