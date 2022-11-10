<?php
    namespace App\Service;

    use App\Entity\Webhook\DiscordWebhook;
    use App\Entity\Webhook\EmbedDiscordWebhook;
    use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;
    use Symfony\Contracts\HttpClient\HttpClientInterface;

    class WebhookDiscordService {
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

            $this->sendRequest("POST", $discordWebhook->convertToJson());
        }

        /**
         * @throws TransportExceptionInterface
         */
        public function sendMessageEmbed(string $title, string $description): void {
            $discordWebhook = new DiscordWebhook();

            $embed = new EmbedDiscordWebhook();
            $embed->setTitle($title);
            $embed->setDescription($description);

            $discordWebhook->addEmbed($embed);

            $this->sendRequest("POST", $discordWebhook->convertToJson());
        }

        /**
         * @throws TransportExceptionInterface
         * @link https://discord.com/developers/docs/resources/webhook
         */
        private function sendRequest(string $method, array $json): void {
            $url = "https://discordapp.com/api/webhooks/{$this->idWebhookDiscord}/{$this->tokenWebhookDiscord}";

            $this->client->request($method, $url, [
                'headers' => [
                    'content-type' => 'application/json'
                ],
                'json' => $json
            ]);
        }
    }