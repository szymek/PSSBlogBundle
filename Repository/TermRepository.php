<?php

namespace PSS\Bundle\BlogBundle\Repository;

use Doctrine\ORM\EntityRepository;
use PSS\Bundle\BlogBundle\Entity\TermTaxonomy;

class TermRepository extends EntityRepository
{
    /**
     * @return array
     */
    public function findAllTags()
    {
        $query = $this->getEntityManager()->createQuery(
            'SELECT t, tt FROM PSS\Bundle\BlogBundle\Entity\Term t
             INNER JOIN t.termTaxonomies tt
             WHERE tt.count > 0 AND tt.taxonomy = :taxonomy
             ORDER by t.name ASC'
        );

        $query->setParameter('taxonomy', TermTaxonomy::POST_TAG);

        return $query->getResult();
    }
}
