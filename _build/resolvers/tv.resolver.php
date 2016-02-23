<?php
/**
* Resolver to connect TVs to templates for richmedia extra
*
* Copyright 2016 by DANNY HARDING <danny@stuntrocket.co>
* Created on 02-23-2016
*
 * richmedia is free software; you can redistribute it and/or modify it under the
 * terms of the GNU General Public License as published by the Free Software
 * Foundation; either version 2 of the License, or (at your option) any later
 * version.
 *
 * richmedia is distributed in the hope that it will be useful, but WITHOUT ANY
 * WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR
 * A PARTICULAR PURPOSE. See the GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along with
 * richmedia; if not, write to the Free Software Foundation, Inc., 59 Temple
 * Place, Suite 330, Boston, MA 02111-1307 USA
* @package richmedia
* @subpackage build
*/

/* @var $object xPDOObject */
/* @var $modx modX */
/* @var $parentObj modResource */
/* @var $templateObj modTemplate */

/* @var array $options */

if (!function_exists('checkFields')) {
    function checkFields($required, $objectFields) {
        global $modx;
        $fields = explode(',', $required);
        foreach ($fields as $field) {
            if (!isset($objectFields[$field])) {
                $modx->log(modX::LOG_LEVEL_ERROR, '[TV Resolver] Missing field: ' . $field);
                return false;
            }
        }
        return true;
    }
}

if ($object->xpdo) {
    $modx =& $object->xpdo;
    switch ($options[xPDOTransport::PACKAGE_ACTION]) {
        case xPDOTransport::ACTION_INSTALL:
        case xPDOTransport::ACTION_UPGRADE:

            $intersects = array (
                0 =>  array (
                  'templateid' => 'default',
                  'tmplvarid' => 'BannerImage',
                  'rank' => 0,
                ),
                1 =>  array (
                  'templateid' => 'HomeTemplate',
                  'tmplvarid' => 'BannerImage',
                  'rank' => 0,
                ),
                2 =>  array (
                  'templateid' => 'tw_ImogenTheme',
                  'tmplvarid' => 'BannerImage',
                  'rank' => 0,
                ),
                3 =>  array (
                  'templateid' => 'CaseStudyTemplate',
                  'tmplvarid' => 'BannerImage',
                  'rank' => 0,
                ),
                4 =>  array (
                  'templateid' => 'EventTemplate',
                  'tmplvarid' => 'BannerImage',
                  'rank' => 0,
                ),
                5 =>  array (
                  'templateid' => 'InformationTemplate',
                  'tmplvarid' => 'BannerImage',
                  'rank' => 0,
                ),
                6 =>  array (
                  'templateid' => 'default',
                  'tmplvarid' => 'BannerColour',
                  'rank' => 0,
                ),
                7 =>  array (
                  'templateid' => 'HomeTemplate',
                  'tmplvarid' => 'BannerColour',
                  'rank' => 0,
                ),
                8 =>  array (
                  'templateid' => 'EventTemplate',
                  'tmplvarid' => 'BannerColour',
                  'rank' => 0,
                ),
                9 =>  array (
                  'templateid' => 'InformationTemplate',
                  'tmplvarid' => 'BannerColour',
                  'rank' => 0,
                ),
                10 =>  array (
                  'templateid' => 'BlogArticleTemplate',
                  'tmplvarid' => 'VideoUrl',
                  'rank' => 0,
                ),
                11 =>  array (
                  'templateid' => 'CaseStudyTemplate',
                  'tmplvarid' => 'VideoUrl',
                  'rank' => 0,
                ),
                12 =>  array (
                  'templateid' => 'BlogArticleTemplate',
                  'tmplvarid' => 'AudioUrl',
                  'rank' => 0,
                ),
                13 =>  array (
                  'templateid' => 'CaseStudyTemplate',
                  'tmplvarid' => 'AudioUrl',
                  'rank' => 0,
                ),
                14 =>  array (
                  'templateid' => 'BlogArticleTemplate',
                  'tmplvarid' => 'IsFeatured',
                  'rank' => 0,
                ),
                15 =>  array (
                  'templateid' => 'CaseStudyTemplate',
                  'tmplvarid' => 'IsFeatured',
                  'rank' => 0,
                ),
                16 =>  array (
                  'templateid' => 'BlogArticleTemplate',
                  'tmplvarid' => 'IsPromoted',
                  'rank' => 0,
                ),
                17 =>  array (
                  'templateid' => 'CaseStudyTemplate',
                  'tmplvarid' => 'IsPromoted',
                  'rank' => 0,
                ),
            );

            if (is_array($intersects)) {
                foreach ($intersects as $k => $fields) {
                    /* make sure we have all fields */
                    if (!checkFields('tmplvarid,templateid', $fields)) {
                        continue;
                    }
                    $tv = $modx->getObject('modTemplateVar', array('name' => $fields['tmplvarid']));
                    if ($fields['templateid'] == 'default') {
                        $template = $modx->getObject('modTemplate', $modx->getOption('default_template'));
                    } else {
                        $template = $modx->getObject('modTemplate', array('templatename' => $fields['templateid']));
                    }
                    if (!$tv || !$template) {
                        $modx->log(xPDO::LOG_LEVEL_ERROR, 'Could not find Template and/or TV ' .
                            $fields['templateid'] . ' - ' . $fields['tmplvarid']);
                        continue;
                    }
                    $tvt = $modx->getObject('modTemplateVarTemplate', array('templateid' => $template->get('id'), 'tmplvarid' => $tv->get('id')));
                    if (! $tvt) {
                        $tvt = $modx->newObject('modTemplateVarTemplate');
                    }
                    if ($tvt) {
                        $tvt->set('tmplvarid', $tv->get('id'));
                        $tvt->set('templateid', $template->get('id'));
                        if (isset($fields['rank'])) {
                            $tvt->set('rank', $fields['rank']);
                        } else {
                            $tvt->set('rank', 0);
                        }
                        if (!$tvt->save()) {
                            $modx->log(xPDO::LOG_LEVEL_ERROR, 'Unknown error creating templateVarTemplate for ' .
                                $fields['templateid'] . ' - ' . $fields['tmplvarid']);
                        }
                    } else {
                        $modx->log(xPDO::LOG_LEVEL_ERROR, 'Unknown error creating templateVarTemplate for ' .
                            $fields['templateid'] . ' - ' . $fields['tmplvarid']);
                    }


                }

            }
            break;

        case xPDOTransport::ACTION_UNINSTALL:
            break;
    }
}

return true;