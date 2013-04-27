# [WIP] Symfony CMF Taxonomy Bundle [![Build Status](https://secure.travis-ci.org/symfony-cmf/TagBundle.png)](http://travis-ci.org/symfony-cmf/TaxonomyBundle)

The aim of this bundle is to provide a complete taxonomy solution. A taxonomy
is a system of classification which can be either hierachical (e.g. a family *tree*)
or flat (e.g. a *list* of HTTP codes).

Taxonomies can also be mutable either upon request (e.g. blog post tags) or by
an administrator (e.g. product categories).

Individual categories are known as *taxons*, and depending on context this
can translated variously as "tag", "category", "type", etc.

The bundle is structured in such a way as to allow it to be adapted easily to
different ORMs and Admin implementations.

## Installation

Add a requirement for ``__/__`` to your
composer.json and instantiate the bundle in your AppKernel.php

    new Symfony\Cmf\Bundle\TaxonomyBundle\SymfonyCmfTaxonomyBundle()

## Running the tests

To initialize the test environment run the initialization script (you only need
to do this once):

    ./Tests/Functional/init_travis.sh

Then run all the tests with:

    phpunit -c phpunit.xml.dist
