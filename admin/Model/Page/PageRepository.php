<?php

namespace Admin\Model\Page;
use Engine\Model;

class PageRepository extends Model
{
    public function getPages()
    {
        $sql = $this->queryBuilder->select()
        ->from('page')
        ->orderBy('id', 'DESC')
        ->sql();

        return $this->db->query($sql);
    }

}
