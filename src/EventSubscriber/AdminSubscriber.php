<?php

namespace App\EventSubscriber;

use App\Entity\News;
use App\Model\TimestampedInterface;
use App\Service\WebhookDiscordService;
use EasyCorp\Bundle\EasyAdminBundle\Event\AfterEntityPersistedEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use EasyCorp\Bundle\EasyAdminBundle\Event\BeforeEntityUpdatedEvent;
use EasyCorp\Bundle\EasyAdminBundle\Event\BeforeEntityPersistedEvent;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;

class AdminSubscriber implements EventSubscriberInterface {

    const RED_BORDER_DISCORD = 8388980;
    private WebhookDiscordService $webhookDiscordService;

    public function __construct(WebhookDiscordService $webhookDiscordService) {
        $this->webhookDiscordService = $webhookDiscordService;
    }

    public static function getSubscribedEvents(): array
    {
        return [
            BeforeEntityPersistedEvent::class => ['setEntityCreatedAt'],
            BeforeEntityUpdatedEvent::class => ['setEntityUpdatedAt'],
            AfterEntityPersistedEvent::class => ['sendWebhookAfterPersist'],
        ];
    }

    public function setEntityCreatedAt(BeforeEntityPersistedEvent $event): void
    {
        $entity = $event->getEntityInstance();

        if (!$entity instanceof TimestampedInterface) {
            return;
        }

        $entity->setCreatedAt(new \DateTime());
    }

    public function setEntityUpdatedAt(BeforeEntityUpdatedEvent $event): void
    {
        $entity = $event->getEntityInstance();

        if (!$entity instanceof TimestampedInterface) {
            return;
        }

        $entity->setUpdatedAt(new \DateTime());
    }

    /**
     * @throws TransportExceptionInterface
     */
    public function sendWebhookAfterPersist(AfterEntityPersistedEvent $event): void
    {
        $entity = $event->getEntityInstance();

        if ($entity instanceof News) {
            $news = $entity;

            $messageParams = [
                'title' => $news->getTitleNews(),
                'description' => $news->getDescriptionNews(),
                'slug' => $news->getSlug(),
            ];

            $this->webhookDiscordService->sendMessageEmbed($messageParams, self::RED_BORDER_DISCORD, true, 'https://www.mangasfan.fr/lib/images/logoblanc.png');
        }
    }
}
