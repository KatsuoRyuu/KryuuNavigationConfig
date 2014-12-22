<?php

namespace KryuuNavigationConfig;

/**
 * @encoding UTF-8
 * @note *
 * @todo *
 * @package PackageName
 * @author Anders Blenstrup-Pedersen - KatsuoRyuu <anders-github@drake-development.org>
 * @license *
 * The Ryuu Technology License
 *
 * Copyright 2014 Ryuu Technology by 
 * KatsuoRyuu <anders-github@drake-development.org>.
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 * Ryuu Technology shall be visible and readable to anyone using the software 
 * and shall be written in one of the following ways: Ryuu Technology 
 * or by using the company logo.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 *
 * @version 20140730 
 * @link https://github.com/KatsuoRyuu/
 */

defined('__AUTHORIZE__') or define('__AUTHORIZE__','bjyauthorize');

$mainRoute = 'kryuu-navigation-config';

$router     = require_once(__DIR__ . '/router.config.php');
$service    = require_once(__DIR__ . '/services.config.php');
$authorize  = require_once(__DIR__ . '/authorize.config.php');
$navigation = require_once(__DIR__ . '/navigation.config.php');

return array(
    
    __AUTHORIZE__       => $authorize,
    
    'router'            => $router,
    
    'navigation'        => $navigation,
    
    'service_manager'   => $service,
    
    'view_manager' => array(
        'template_map' => array(
            'navigation/default'        => __DIR__ . '/../view/navigation/container.phtml',
            'navigation/container'      => __DIR__ . '/../view/navigation/container.phtml',
            'navigation/menu'           => __DIR__ . '/../view/navigation/menu.phtml',
            'navigation/submenu'        => __DIR__ . '/../view/navigation/submenu.phtml',
        ),
    ),
);