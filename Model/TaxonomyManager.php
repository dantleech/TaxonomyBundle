<?php

namespace Symfony\Cmf\Bundle\TaxonomyBundle\Manager;

class TaxonomyManager
{
    protected $driver;

    public function isTaxonable($object)
    {
        return $object instanceof TaxonAccessInterface;
    }

    public function getTaxonomy($name)
    {
        return $this->driver->getTaxonomy($name);
    }

    public function categorize($object, $taxonomy, $taxonPath)
    {
        $taxonomy = $this->getTaxonomy($taxonomy);
        $taxon = $this->driver->getTaxon($taxonomy, $taxonPath);

        if (!$taxon && $taxonomy->isMutable()) {
            $taxon = $this->driver->createTaxon($taxonomy, $taxonPath);
        }

        $this->driver->associate($object, $taxon);
    }
}
