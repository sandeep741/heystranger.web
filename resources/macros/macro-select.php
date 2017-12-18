<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


Form::macro('fancyselect', function($name, $list = array(), $selected = null, $options = array()) {
    $selected = $this->getValueAttribute($name, $selected);

    $options['id'] = $this->getIdAttribute($name, $options);

    if (!isset($options['name']))
        $options['name'] = $name;

    $html = array();


    foreach ($list as $list_el) {
        $selectedAttribute = $this->getSelectedValue($list_el['value'], $selected);
        $option_attr = array('value' => e($list_el['value']), 'selected' => $selectedAttribute, 'data-icon' => $list_el['data-icon']);
        $html[] = '<option' . $this->html->attributes($option_attr) . '>' . e($list_el['display']) . '</option>';
    }

    $options = $this->html->attributes($options);

    $list = implode('', $html);

    return "<select{$options}>{$list}</select>";
});



Form::macro('multiselect', function($name, $list = array(), $selected = null, $options = array()) {
    $selected = $this->getValueAttribute($name, $selected);

    $options['id'] = $this->getIdAttribute($name, $options);

    if (!isset($options['name']))
        $options['name'] = $name;

    $html = array();

    $html[] = '<optgroup label="' . $options['placeholder'] . '">';
    foreach ($list as $list_el) {
        $selectedAttribute = $this->getSelectedValue($list_el['value'], $selected);
        $option_attr = array('value' => e($list_el['value']), 'selected' => $selectedAttribute, 'data-icon' => $list_el['data-icon']);
        $html[] = '<option' . $this->html->attributes($option_attr) . '>' . e($list_el['display']) . '</option>';
    }
    $html[] = '</optgroup>';

    $options = $this->html->attributes($options);

    $list = implode('', $html);

    return "<select{$options}>{$list}</select>";
});
