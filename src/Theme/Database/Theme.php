<?php
namespace Lavender\Theme\Database;

use Lavender\Entity\Database\Entity;
use Lavender\Support\Traits\BootableEntity;

class Theme extends Entity
{
    use BootableEntity;

    protected $entity = 'theme';

    protected $table = 'theme';

    public $timestamps = false;
}