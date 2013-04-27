<?php

namespace Symfony\Cmf\Bundle\TaxonomyBundle\Persistance\PHPCR\EventListener;

use Doctrine\ODM\PHPCR\Event\OnFlushEventArgs;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Cmf\Bundle\TagBundle\Document\Tag;

/**
 * Doctrine PHPCR ODM listener for automatically managing
 * Document taxons.
 *
 * @author Daniel Leech <daniel@dantleech.com>
 */
class TaxonomyListener
{
    public function __construct(ContainerInterface $container)
    {
        throw new \Exception('Implement me');
        $this->container = $container;
    }

    protected function getTm()
    {
        return $this->container->get('symfony_cmf_tag.tag_manager');
    }

    public function onFlush(OnFlushEventArgs $args)
    {
        $dm = $args->getDocumentManager();
        $uow = $dm->getUnitOfWork();

        $scheduledInserts = $uow->getScheduledInserts();
        $scheduledUpdates = $uow->getScheduledUpdates();
        $updates = array_merge($scheduledInserts, $scheduledUpdates);

        foreach ($updates as $document) {
            if ($this->getTm()->isTagable($document)) {
                $tags = $this->getTm()->updateTagsForDocument($document);
                foreach ($tags as $tag) {
                    $dm->persist($tag);
                    $uow->computeSingleDocumentChangeSet($tag);
                }
            }
        }

        $removes = $uow->getScheduledRemovals();

        foreach ($removes as $document) {
            if ($this->getTm()->isTagable($document)) {
                $referrers = $dm->getReferrers($document);
                $referrers = $referrers->filter(function ($referrer) {
                    if ($referrer instanceof Tag) {
                        return true;
                    }

                    return false;
                });

                foreach ($referrers as $tag) {
                    $uow->scheduleRemove($tag);
                }
            }
        }
    }
}
