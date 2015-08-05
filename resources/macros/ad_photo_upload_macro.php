<?php
/**
 * Created by PhpStorm.
 * User: bazi
 * Date: 05-Aug-15
 * Time: 10:26 AM
 */


Form::macro('adphoto', function($name, $options = array()) {

    if ( ! isset($options['name'])) $options['name'] = $name;

    // We will get the appropriate value for the given field. We will look for the
    // value in the session for the value in the old input data then we'll look
    // in the model instance if one is set. Otherwise we will just use empty.
    $id = $this->getIdAttribute($name, $options);

    if ( ! in_array('file', $this->skipValueTypes))
    {
        $value = $this->getValueAttribute($name, null);
    }

    // Once we have the type, value, and ID we can merge them into the rest of the
    // attributes array so we can convert them into their HTML attribute format
    // when creating the HTML element. Then, we will return the entire input.
    $merge = compact('type', 'value', 'id');

    $options = array_merge($options, $merge);

    return '<div><input type="file" '.$this->html->attributes($options).'></div>';

});

