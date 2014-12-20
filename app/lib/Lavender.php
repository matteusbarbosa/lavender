<?php

class Lavender
{
    //todo move to lavender/multisite
    // Attribute Scopes
    const SCOPE_GLOBAL     = 'global';
    const SCOPE_STORE      = 'store';
    const SCOPE_DEPARTMENT = 'department';

    //todo move to lavender/entity
    // Attribute Data Types
    const ATTRIBUTE_DATE    = 'date';
    const ATTRIBUTE_DECIMAL = 'decimal';
    const ATTRIBUTE_INTEGER = 'int';
    const ATTRIBUTE_TEXT    = 'text';
    const ATTRIBUTE_VARCHAR = 'varchar';

    //todo move to lavender/entity
    // Entity Relationship Types
    const HAS_PIVOT  = 'pivot';
    const HAS_MANY   = 'many';
    const HAS_ONE    = 'one';
    const BELONGS_TO = 'belongs';

    //todo move to lavender/cms
    const LAYOUT_APPEND  = 'append';
    const LAYOUT_REPLACE = 'replace';
}