<?php

namespace Symfony\Cmf\Bundle\TaxonomyBundle\Model;

use Symfony\Cmf\Bundle\TaxonomyBundle\Model\Taxon;

interface TaxonAccessInterface
{
    public function getTaxons();

    public function setTaxons($taxons);

    public function addTaxon(Taxon $taxon);
}
