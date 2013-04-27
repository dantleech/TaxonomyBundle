<?php

namespace Symfony\Cmf\Bundle\TaxonomyBundle\Tests\Functional\app\Document;

use Doctrine\ODM\PHPCR\Mapping\Annotations as PHPCR;

/**
 * @PHPCR\Document(
 *      referenceable=true
 * )
 */
class Post
{
    /**
     * @PHPCR\Id()
     */
    public $path;

    /**
     * @PHPCR\Referrers(
     *   referringDocument="Symfony\Cmf\Bundle\TagBundle\Document\Tag", 
     *   referencedBy="target"
     * )
     */
    public $tags;

    /**
     * @PHPCR\NodeName()
     */
    public $title;
}
