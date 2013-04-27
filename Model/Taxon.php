<?php

namespace Symfony\Cmf\Bundle\TaxonomyBundle\Model;

class Taxon implements TaxonAccessInterface
{
    protected $name;

    protected $parent;

    protected $children = array();

    protected $referrerCount = 0;

    protected $referrers;

    public function getTaxons()
    {
        return $this->children;
    }

    public function setTaxons($taxons)
    {
        $this->children = array();
        foreach ($taxons as $taxon) {
            $this->addTaxon($taxon);
        }
    }

    public function addTaxon(Taxon $taxon)
    {
        $this->children[] = $taxon;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function updateReferrerCount()
    {
        $this->referrerCount = count($this->referrers);
    }

    public function getReferrers()
    {
        return $this->referrers;
    }

    public function getReferrerCount()
    {
        return $this->referrerCount;
    }
}
