<?php

namespace HeppyEkberg\Subtype;

/**
 * The Subtype trait is to split a database table into different models based on a column and it's value.
 * <br><br>
 * To use the trait you have to specify which column and what it's value is with the following attributes:
 *<br>
 * <code>
 * public $subtypeColumn = 'COLUMN_NAME';
 * public $subtypeValue = 'COLUMN_VALUE';
 * </code>
 *
 * @package Elicit\Subtype
 * @user Heppy Karlsson <dennis.karlsson@elicit.se>
 */
trait Subtype
{
    public static function bootSubtype() {
        static::addGlobalScope(new SubtypeScope);
    }

}