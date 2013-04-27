<?php

namespace Symfony\Cmf\Bundle\TaxonomyBundle\Persistance\PHPCR\Document;

use Symfony\Cmf\Bundle\TaxonomyBundle\Model\Taxonomy as BaseTaxonomy;

class Taxonomy extends BaseTaxonomy
{
    protected $parent;
}
