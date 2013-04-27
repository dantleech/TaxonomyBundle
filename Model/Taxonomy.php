<?php

namespace Symfony\Cmf\Bundle\TaxonomyBundle\Model;

class Taxonomy implements TaxonAccessInterface
{
    protected $name;
    protected $allowDynamicTags;
    protected $levelDelimiter = '>';
    protected $allowMultipleLevels;
    protected $taxons;

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getAllowDynamicTags()
    {
        return $this->allowDynamicTags;
    }

    public function setAllowDynamicTags($boolean)
    {
        $this->allowDynamicTags = $boolean;
    }

    public function getLevelDelimiter()
    {
        return $this->levelDelimiter;
    }

    public function setLevelDelimiter($delimiter)
    {
        $this->levelDelimiter = $delimiter;
    }

    public function getAllowMultipleLevels()
    {
        return $this->allowMultipleLevels;
    }

    public function setAllowMultipleLevels($boolean)
    {
        $this->allowMultipleLevels = $boolean;
    }

    public function getTaxons()
    {
        return $this->taxons;
    }

    public function setTaxons($taxons)
    {
        $this->taxons = $taxons;
    }

    public function addTaxon(Taxon $taxon)
    {
        $this->taxons[] = $taxon;
    }
}
