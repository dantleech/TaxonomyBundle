<?php

namespace Symfony\Cmf\Bundle\TaxonomyBundle\Tests\Functional\Subscriber;

use Symfony\Cmf\Bundle\TaxonomyBundle\Tests\Functional\app\Document\Post;
use Symfony\Cmf\Bundle\TaxonomyBundle\Tests\Functional\BaseTestCase;

class TagListenerTest extends BaseTestCase
{
    protected function createPost($tags = array())
    {
        $post = new Post;
        $post->path = '/test/test-post';
        $post->title = 'Unit testing post';
        $post->tags = $tags;

        $this->getDm()->persist($post);
        $this->getDm()->flush();

        $this->getDm()->clear();
    }

    public function testPersistPost()
    {
        $this->createPost(array('foo', 'bar'));

        $fooTag = $this->getDm()->find(null, '/test/tags/foo');
        $this->assertNotNull($fooTag);
        $barTag = $this->getDm()->find(null, '/test/tags/bar');
        $this->assertNotNull($barTag);
    }
}
