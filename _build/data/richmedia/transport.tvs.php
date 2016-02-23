<?php
/**
 * templateVars transport file for richmedia extra
 *
 * Copyright 2016 by DANNY HARDING <danny@stuntrocket.co>
 * Created on 02-23-2016
 *
 * @package richmedia
 * @subpackage build
 */

if (! function_exists('stripPhpTags')) {
    function stripPhpTags($filename) {
        $o = file_get_contents($filename);
        $o = str_replace('<' . '?' . 'php', '', $o);
        $o = str_replace('?>', '', $o);
        $o = trim($o);
        return $o;
    }
}
/* @var $modx modX */
/* @var $sources array */
/* @var xPDOObject[] $templateVars */


$templateVars = array();

$templateVars[1] = $modx->newObject('modTemplateVar');
$templateVars[1]->fromArray(array (
  'id' => 1,
  'property_preprocess' => false,
  'type' => 'image',
  'name' => 'BannerImage',
  'caption' => 'Banner Image',
  'description' => '',
  'elements' => '',
  'rank' => 0,
  'display' => 'default',
  'default_text' => '/assets/images/night-work-small.jpg',
  'properties' => 
  array (
  ),
  'input_properties' => 
  array (
    'allowBlank' => 'true',
    'maxLength' => '',
    'minLength' => '',
  ),
  'output_properties' => 
  array (
  ),
), '', true, true);
$templateVars[2] = $modx->newObject('modTemplateVar');
$templateVars[2]->fromArray(array (
  'id' => 2,
  'property_preprocess' => false,
  'type' => 'text',
  'name' => 'BannerColour',
  'caption' => 'Banner Colour as HEX (eg, #111111)',
  'description' => '',
  'elements' => '',
  'rank' => 0,
  'display' => 'default',
  'default_text' => '#384951',
  'properties' => 
  array (
  ),
  'input_properties' => 
  array (
    'allowBlank' => 'true',
    'maxLength' => '',
    'minLength' => '',
    'regex' => '',
    'regexText' => '',
  ),
  'output_properties' => 
  array (
  ),
), '', true, true);
$templateVars[3] = $modx->newObject('modTemplateVar');
$templateVars[3]->fromArray(array (
  'id' => 3,
  'property_preprocess' => false,
  'type' => 'url',
  'name' => 'VideoUrl',
  'caption' => 'VideoUrl',
  'description' => '',
  'elements' => '',
  'rank' => 0,
  'display' => 'default',
  'default_text' => '',
  'properties' => 
  array (
  ),
  'input_properties' => 
  array (
  ),
  'output_properties' => 
  array (
  ),
), '', true, true);
$templateVars[4] = $modx->newObject('modTemplateVar');
$templateVars[4]->fromArray(array (
  'id' => 4,
  'property_preprocess' => false,
  'type' => 'url',
  'name' => 'AudioUrl',
  'caption' => 'AudioUrl',
  'description' => '',
  'elements' => '',
  'rank' => 0,
  'display' => 'default',
  'default_text' => '',
  'properties' => 
  array (
  ),
  'input_properties' => 
  array (
  ),
  'output_properties' => 
  array (
  ),
), '', true, true);
$templateVars[5] = $modx->newObject('modTemplateVar');
$templateVars[5]->fromArray(array (
  'id' => 5,
  'property_preprocess' => false,
  'type' => 'listbox',
  'name' => 'IsFeatured',
  'caption' => 'Is Featured',
  'description' => '',
  'elements' => 'Yes==1||No==0',
  'rank' => 0,
  'display' => 'default',
  'default_text' => '0',
  'properties' => 
  array (
  ),
  'input_properties' => 
  array (
    'allowBlank' => 'true',
    'listWidth' => '',
    'title' => '',
    'typeAhead' => 'false',
    'typeAheadDelay' => '250',
    'forceSelection' => 'false',
    'listEmptyText' => '',
  ),
  'output_properties' => 
  array (
  ),
), '', true, true);
$templateVars[6] = $modx->newObject('modTemplateVar');
$templateVars[6]->fromArray(array (
  'id' => 6,
  'property_preprocess' => false,
  'type' => 'listbox',
  'name' => 'IsPromoted',
  'caption' => 'Is Promoted',
  'description' => '',
  'elements' => 'Yes==1||No==0',
  'rank' => 0,
  'display' => 'default',
  'default_text' => '0',
  'properties' => 
  array (
  ),
  'input_properties' => 
  array (
    'allowBlank' => 'true',
    'listWidth' => '',
    'title' => '',
    'typeAhead' => 'false',
    'typeAheadDelay' => '250',
    'forceSelection' => 'false',
    'listEmptyText' => '',
  ),
  'output_properties' => 
  array (
  ),
), '', true, true);
return $templateVars;
