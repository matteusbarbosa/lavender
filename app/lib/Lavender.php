<?php

class Lavender
{
    // Attribute Storage Type
    const ENTITY_FLAT =                 'flat';
    const ENTITY_EAV =                  'eav';

    // Attribute Scopes
    const SCOPE_GLOBAL =                'global';
    const SCOPE_STORE =                 'store';
    const SCOPE_DEPARTMENT =            'department';

    // Attribute Data Types
    const ATTRIBUTE_DATE =              'date';
    const ATTRIBUTE_DECIMAL =           'decimal';
    const ATTRIBUTE_INTEGER =           'int';
    const ATTRIBUTE_TEXT =              'text';
    const ATTRIBUTE_VARCHAR =           'varchar';

    public static $eav_types = [
        self::ATTRIBUTE_DATE,
        self::ATTRIBUTE_DECIMAL,
        self::ATTRIBUTE_INTEGER,
        self::ATTRIBUTE_TEXT,
        self::ATTRIBUTE_VARCHAR
    ];
}