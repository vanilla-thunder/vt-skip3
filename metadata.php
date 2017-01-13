<?php

/**
 * ___MODULE___
 * Copyright (C) ___YEAR___  ___COMPANY___
 * info:  ___EMAIL___
 *
 * This program is free software;
 * you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation;
 * either version 3 of the License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY;
 * without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.
 * You should have received a copy of the GNU General Public License along with this program; if not, see <http://www.gnu.org/licenses/>
 *
 * author: ___AUTHOR___
 */

$sMetadataVersion = '1.1';
$aModule = [
    'id'          => 'vt-skip3',
    'title'       => '[vt] skip3',
    'description' => '___MODULE___',
    'thumbnail'   => 'oxid-vt.jpg',
    'version'     => '___VERSION___',
    'author'      => '___AUTHOR___',
    'email'       => '___EMAIL___',
    'url'         => '___URL___',
    'extend'      => [
        'oxcmp_user' => 'vt/vt-skip3/extend/oxcmp_user_skip3',
    ],
    'blocks'      => [

        [
            'template' => 'page/checkout/inc/steps.tpl',
            'block'    => 'checkout_steps_main',
            'file'     => '/application/views/blocks/checkout_steps_main.tpl'
        ], [
            'template' => 'page/checkout/inc/steps.tpl',
            'block'    => 'checkout_steps_pay',
            'file'     => '/application/views/blocks/checkout_steps_pay.tpl'
        ], [
            'template' => 'page/checkout/inc/steps.tpl',
            'block'    => 'checkout_steps_order',
            'file'     => '/application/views/blocks/checkout_steps_order.tpl'
        ]

    ],
    'settings'    => [
        ['group' => 'skip3main', 'name' => 'skip3shipsetid', 'type' => 'str', 'value' => ''],
        ['group' => 'skip3main', 'name' => 'skip3paymentid', 'type' => 'str', 'value' => '']
    ]
];
