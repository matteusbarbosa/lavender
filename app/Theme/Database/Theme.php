<?php
namespace Lavender\Theme\Database;

use Lavender\Entity\Database\Entity;

class Theme extends Entity
{

    protected $entity = 'theme';

    protected $table = 'theme';

    public $timestamps = false;
}