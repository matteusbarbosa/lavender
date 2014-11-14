<?php
namespace Lavender;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Attribute extends Eloquent
{

    protected $table = 'attribute';

    public $timestamps = false;
}