<?php
/**
 * Created by PhpStorm.
 * User: bazi
 * Date: 05-Aug-15
 * Time: 8:50 AM
 */

Form::macro('category', function($name, $cattree = array(), $selected = null, $options = array())
{
    $selected = Form::getValueAttribute($name, $selected);
    $options['id'] = $this->getIdAttribute($name, $options);
    if ( ! isset($options['name'])) $options['name'] = $name;

    $html = [];

    foreach ($cattree as $catkey => $cat) {
//        $html .= '<optgroup label="' . $catkey . '"></optgroup>';
        foreach($cat as $subcatkey => $subcat) {
//            $html .= '<optgroup label="' . $subcatkey . '"></optgroup>';
            $html[] = Form::getSelectOption($subcat, $subcatkey, $selected);
//            foreach($subcat as $postcatkey => $postcat) {
//                $html .= '<option value="' . $postcatkey . '">' . $postcat . '</option>';
//                $html[] = Form::getSelectOption($postcat, $postcatkey, $selected);
//            }
        }
    }
//    foreach ($list as $value => $display)
//    {
//        $html[] = $this->getSelectOption($display, $value, $selected);
//    }

    $list = implode('', $html);

    $options = HTML::attributes($options);

    return "<select{$options}>{$list}</select>";
});;