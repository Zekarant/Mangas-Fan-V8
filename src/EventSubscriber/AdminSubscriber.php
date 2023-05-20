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

class AdminSubscriber implements EventSubscriberInterface
{
    public function __construct(private readonly WebhookDiscordService $webhookDiscordService)
    {
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

            $this->webhookDiscordService->sendMessageEmbed($news->getTitleNews(), $news->getDescriptionNews(), $news->getSlug(), 8_388_980);
        }
    }
}
