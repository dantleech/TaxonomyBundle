<?php

namespace Symfony\Cmf\Bundle\TaxonomyBundle\Model;

/**
 * Taxonomy driver interface
 *
 * @author Daniel Leech <daniel@dantleech.com>
 */
interface DriverInterface
{
    /**
     * Signifies that this driver supports a hierarchical taxonomy
     * structure.
     */
    const CAN_HEIRARCHICAL_STRUCTURE = 'hierarchical_structure';

    /**
     * Signifies that this driver supports mutable taxonomies. (i.e.
     * the ability to dynamically create taxons)
     */
    const CAN_CREATE_TAXONS = 'create_taxons';

    /**
     * Return this drivers capabilities (over the standard capabilities
     * expected of all drivers) as an array containing the
     * values of one of this interfaces CAN_* constants.
     *
     * @return array
     */
    public function getCapabilities();

    /**
     * Retrieve a taxonomy with the given name.
     *
     * @throws TaxonomyNotFoundException
     * @return Taxonomy
     */
    public function getTaxonomy($name);

    /**
     * Return the named Taxon from the given Taxonomy.
     *
     * The path is an array of taxon names in herirachical order.
     *
     * If the taxonomy is flat then it is necessary to pass 
     * an array with a single element.
     *
     * @param Taxonomy $taxonomy
     * @param array    $path
     *
     * @throws TaxonNotFoundException
     *
     * @return Taxon
     */
    public function getTaxon(Taxonomy $taxonomy, array $path);

    /**
     * Create a taxon in the given taxonomy at the given hierachical
     * path.
     *
     * @param Taxonomy $taxonomy
     * @param array    $path
     *
     * @throws TaxonAlreadyExistsException
     * @throws TaxonPathInvalidException
     *
     * @return Taxon
     */
    public function createTaxon(Taxonomy $taxonomy, array $path);

    /**
     * Associate the given object with the given Taxon.
     *
     * @param object $object
     * @param Taxon  $taxon
     *
     * @throws AssociationException
     *
     * @return void
     */
    public function associate($object, Taxon $taxon);
}
