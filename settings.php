<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * @package local_metadata
 * @author Mike Churchward <mike.churchward@poetgroup.org>
 * @license http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @copyright 2016 The POET Group
 */

defined('MOODLE_INTERNAL') || die;

$ADMIN->add('localplugins', new admin_category('metadatafolder', get_string('metadata', 'local_metadata')));

$settings = new admin_settingpage('local_metadata', get_string('settings'));
if ($ADMIN->fulltree) {
    $item = new admin_setting_configcheckbox('local_metadata/usermetadataenabled',
        new lang_string('usermetadataenabled', 'local_metadata'), '', 0);
    $settings->add($item);
    $item = new admin_setting_configcheckbox('local_metadata/coursemetadataenabled',
        new lang_string('coursemetadataenabled', 'local_metadata'), '', 1);
    $settings->add($item);
}
$ADMIN->add('metadatafolder', $settings);

$ADMIN->add('metadatafolder',
    new admin_externalpage('usermetadata', get_string('usermetadata', 'local_metadata'),
        new moodle_url('/local/metadata/index.php', ['contextlevel' => CONTEXT_USER]), ['moodle/course:create']
    )
);
$ADMIN->add('metadatafolder',
    new admin_externalpage('coursemetadata', get_string('coursemetadata', 'local_metadata'),
        new moodle_url('/local/metadata/index.php', ['contextlevel' => CONTEXT_COURSE]), ['moodle/course:create']
    )
);

$settings = null;