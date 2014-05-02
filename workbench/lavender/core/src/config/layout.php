<?php

return array(
    'default' => "true",
  /*  'block' => array (
        0 =>
            Mage_Core_Model_Layout_Element::__set_state(array(
                '@attributes' =>
                    array (
                        'name' => 'formkey',
                        'type' => 'core/template',
                        'template' => 'core/formkey.phtml',
                    ),
            )),
        1 =>
            Mage_Core_Model_Layout_Element::__set_state(array(
                '@attributes' =>
                    array (
                        'type' => 'page/html',
                        'name' => 'root',
                        'output' => 'toHtml',
                        'template' => 'page/3columns.phtml',
                    ),
                'block' =>
                    array (
                        0 =>
                            Mage_Core_Model_Layout_Element::__set_state(array(
                                '@attributes' =>
                                    array (
                                        'type' => 'page/html_head',
                                        'name' => 'head',
                                        'as' => 'head',
                                    ),
                                'action' =>
                                    array (
                                        0 =>
                                            Mage_Core_Model_Layout_Element::__set_state(array(
                                                '@attributes' =>
                                                    array (
                                                        'method' => 'addJs',
                                                    ),
                                                'script' => 'prototype/prototype.js',
                                            )),
                                        1 =>
                                            Mage_Core_Model_Layout_Element::__set_state(array(
                                                '@attributes' =>
                                                    array (
                                                        'method' => 'addJs',
                                                    ),
                                                'script' => 'lib/ccard.js',
                                            )),
                                        2 =>
                                            Mage_Core_Model_Layout_Element::__set_state(array(
                                                '@attributes' =>
                                                    array (
                                                        'method' => 'addJs',
                                                    ),
                                                'script' => 'prototype/validation.js',
                                            )),
                                        3 =>
                                            Mage_Core_Model_Layout_Element::__set_state(array(
                                                '@attributes' =>
                                                    array (
                                                        'method' => 'addJs',
                                                    ),
                                                'script' => 'scriptaculous/builder.js',
                                            )),
                                        4 =>
                                            Mage_Core_Model_Layout_Element::__set_state(array(
                                                '@attributes' =>
                                                    array (
                                                        'method' => 'addJs',
                                                    ),
                                                'script' => 'scriptaculous/effects.js',
                                            )),
                                        5 =>
                                            Mage_Core_Model_Layout_Element::__set_state(array(
                                                '@attributes' =>
                                                    array (
                                                        'method' => 'addJs',
                                                    ),
                                                'script' => 'scriptaculous/dragdrop.js',
                                            )),
                                        6 =>
                                            Mage_Core_Model_Layout_Element::__set_state(array(
                                                '@attributes' =>
                                                    array (
                                                        'method' => 'addJs',
                                                    ),
                                                'script' => 'scriptaculous/controls.js',
                                            )),
                                        7 =>
                                            Mage_Core_Model_Layout_Element::__set_state(array(
                                                '@attributes' =>
                                                    array (
                                                        'method' => 'addJs',
                                                    ),
                                                'script' => 'scriptaculous/slider.js',
                                            )),
                                        8 =>
                                            Mage_Core_Model_Layout_Element::__set_state(array(
                                                '@attributes' =>
                                                    array (
                                                        'method' => 'addJs',
                                                    ),
                                                'script' => 'varien/js.js',
                                            )),
                                        9 =>
                                            Mage_Core_Model_Layout_Element::__set_state(array(
                                                '@attributes' =>
                                                    array (
                                                        'method' => 'addJs',
                                                    ),
                                                'script' => 'varien/form.js',
                                            )),
                                        10 =>
                                            Mage_Core_Model_Layout_Element::__set_state(array(
                                                '@attributes' =>
                                                    array (
                                                        'method' => 'addJs',
                                                    ),
                                                'script' => 'varien/menu.js',
                                            )),
                                        11 =>
                                            Mage_Core_Model_Layout_Element::__set_state(array(
                                                '@attributes' =>
                                                    array (
                                                        'method' => 'addJs',
                                                    ),
                                                'script' => 'mage/translate.js',
                                            )),
                                        12 =>
                                            Mage_Core_Model_Layout_Element::__set_state(array(
                                                '@attributes' =>
                                                    array (
                                                        'method' => 'addJs',
                                                    ),
                                                'script' => 'mage/cookies.js',
                                            )),
                                        13 =>
                                            Mage_Core_Model_Layout_Element::__set_state(array(
                                                '@attributes' =>
                                                    array (
                                                        'method' => 'addCss',
                                                    ),
                                                'stylesheet' => 'css/styles.css',
                                            )),
                                        14 =>
                                            Mage_Core_Model_Layout_Element::__set_state(array(
                                                '@attributes' =>
                                                    array (
                                                        'method' => 'addItem',
                                                    ),
                                                'type' => 'skin_css',
                                                'name' => 'css/styles-ie.css',
                                                'params' =>
                                                    Mage_Core_Model_Layout_Element::__set_state(array(
                                                    )),
                                                'if' => 'lt IE 8',
                                            )),
                                        15 =>
                                            Mage_Core_Model_Layout_Element::__set_state(array(
                                                '@attributes' =>
                                                    array (
                                                        'method' => 'addCss',
                                                    ),
                                                'stylesheet' => 'css/widgets.css',
                                            )),
                                        16 =>
                                            Mage_Core_Model_Layout_Element::__set_state(array(
                                                '@attributes' =>
                                                    array (
                                                        'method' => 'addCss',
                                                    ),
                                                'stylesheet' => 'css/print.css',
                                                'params' => 'media="print"',
                                            )),
                                        17 =>
                                            Mage_Core_Model_Layout_Element::__set_state(array(
                                                '@attributes' =>
                                                    array (
                                                        'method' => 'addItem',
                                                    ),
                                                'type' => 'js',
                                                'name' => 'lib/ds-sleight.js',
                                                'params' =>
                                                    Mage_Core_Model_Layout_Element::__set_state(array(
                                                    )),
                                                'if' => 'lt IE 7',
                                            )),
                                        18 =>
                                            Mage_Core_Model_Layout_Element::__set_state(array(
                                                '@attributes' =>
                                                    array (
                                                        'method' => 'addItem',
                                                    ),
                                                'type' => 'skin_js',
                                                'name' => 'js/ie6.js',
                                                'params' =>
                                                    Mage_Core_Model_Layout_Element::__set_state(array(
                                                    )),
                                                'if' => 'lt IE 7',
                                            )),
                                    ),
                                'block' =>
                                    Mage_Core_Model_Layout_Element::__set_state(array(
                                        '@attributes' =>
                                            array (
                                                'type' => 'page/js_cookie',
                                                'name' => 'js_cookies',
                                                'template' => 'page/js/cookie.phtml',
                                            ),
                                    )),
                            )),
                        1 =>
                            Mage_Core_Model_Layout_Element::__set_state(array(
                                '@attributes' =>
                                    array (
                                        'type' => 'core/text_list',
                                        'name' => 'after_body_start',
                                        'as' => 'after_body_start',
                                        'translate' => 'label',
                                    ),
                                'label' => 'Page Top',
                            )),
                        2 =>
                            Mage_Core_Model_Layout_Element::__set_state(array(
                                '@attributes' =>
                                    array (
                                        'type' => 'page/html_notices',
                                        'name' => 'global_notices',
                                        'as' => 'global_notices',
                                        'template' => 'page/html/notices.phtml',
                                    ),
                            )),
                        3 =>
                            Mage_Core_Model_Layout_Element::__set_state(array(
                                '@attributes' =>
                                    array (
                                        'type' => 'page/html_header',
                                        'name' => 'header',
                                        'as' => 'header',
                                    ),
                                'block' =>
                                    array (
                                        0 =>
                                            Mage_Core_Model_Layout_Element::__set_state(array(
                                                '@attributes' =>
                                                    array (
                                                        'type' => 'page/template_links',
                                                        'name' => 'top.links',
                                                        'as' => 'topLinks',
                                                    ),
                                            )),
                                        1 =>
                                            Mage_Core_Model_Layout_Element::__set_state(array(
                                                '@attributes' =>
                                                    array (
                                                        'type' => 'page/switch',
                                                        'name' => 'store_language',
                                                        'as' => 'store_language',
                                                        'template' => 'page/switch/languages.phtml',
                                                    ),
                                            )),
                                        2 =>
                                            Mage_Core_Model_Layout_Element::__set_state(array(
                                                '@attributes' =>
                                                    array (
                                                        'type' => 'core/text_list',
                                                        'name' => 'top.menu',
                                                        'as' => 'topMenu',
                                                        'translate' => 'label',
                                                    ),
                                                'label' => 'Navigation Bar',
                                                'block' =>
                                                    Mage_Core_Model_Layout_Element::__set_state(array(
                                                        '@attributes' =>
                                                            array (
                                                                'type' => 'page/html_topmenu',
                                                                'name' => 'catalog.topnav',
                                                                'template' => 'page/html/topmenu.phtml',
                                                            ),
                                                    )),
                                            )),
                                        3 =>
                                            Mage_Core_Model_Layout_Element::__set_state(array(
                                                '@attributes' =>
                                                    array (
                                                        'type' => 'page/html_wrapper',
                                                        'name' => 'top.container',
                                                        'as' => 'topContainer',
                                                        'translate' => 'label',
                                                    ),
                                                'label' => 'Page Header',
                                                'action' =>
                                                    Mage_Core_Model_Layout_Element::__set_state(array(
                                                        '@attributes' =>
                                                            array (
                                                                'method' => 'setElementClass',
                                                            ),
                                                        'value' => 'top-container',
                                                    )),
                                            )),
                                        4 =>
                                            Mage_Core_Model_Layout_Element::__set_state(array(
                                                '@attributes' =>
                                                    array (
                                                        'type' => 'page/html_welcome',
                                                        'name' => 'welcome',
                                                        'as' => 'welcome',
                                                    ),
                                            )),
                                    ),
                            )),
                        4 =>
                            Mage_Core_Model_Layout_Element::__set_state(array(
                                '@attributes' =>
                                    array (
                                        'type' => 'page/html_breadcrumbs',
                                        'name' => 'breadcrumbs',
                                        'as' => 'breadcrumbs',
                                    ),
                            )),
                        5 =>
                            Mage_Core_Model_Layout_Element::__set_state(array(
                                '@attributes' =>
                                    array (
                                        'type' => 'core/text_list',
                                        'name' => 'left',
                                        'as' => 'left',
                                        'translate' => 'label',
                                    ),
                                'label' => 'Left Column',
                            )),
                        6 =>
                            Mage_Core_Model_Layout_Element::__set_state(array(
                                '@attributes' =>
                                    array (
                                        'type' => 'core/messages',
                                        'name' => 'global_messages',
                                        'as' => 'global_messages',
                                    ),
                            )),
                        7 =>
                            Mage_Core_Model_Layout_Element::__set_state(array(
                                '@attributes' =>
                                    array (
                                        'type' => 'core/messages',
                                        'name' => 'messages',
                                        'as' => 'messages',
                                    ),
                            )),
                        8 =>
                            Mage_Core_Model_Layout_Element::__set_state(array(
                                '@attributes' =>
                                    array (
                                        'type' => 'core/text_list',
                                        'name' => 'content',
                                        'as' => 'content',
                                        'translate' => 'label',
                                    ),
                                'label' => 'Main Content Area',
                            )),
                        9 =>
                            Mage_Core_Model_Layout_Element::__set_state(array(
                                '@attributes' =>
                                    array (
                                        'type' => 'core/text_list',
                                        'name' => 'right',
                                        'as' => 'right',
                                        'translate' => 'label',
                                    ),
                                'label' => 'Right Column',
                            )),
                        10 =>
                            Mage_Core_Model_Layout_Element::__set_state(array(
                                '@attributes' =>
                                    array (
                                        'type' => 'page/html_footer',
                                        'name' => 'footer',
                                        'as' => 'footer',
                                        'template' => 'page/html/footer.phtml',
                                    ),
                                'block' =>
                                    array (
                                        0 =>
                                            Mage_Core_Model_Layout_Element::__set_state(array(
                                                '@attributes' =>
                                                    array (
                                                        'type' => 'page/html_wrapper',
                                                        'name' => 'bottom.container',
                                                        'as' => 'bottomContainer',
                                                        'translate' => 'label',
                                                    ),
                                                'label' => 'Page Footer',
                                                'action' =>
                                                    Mage_Core_Model_Layout_Element::__set_state(array(
                                                        '@attributes' =>
                                                            array (
                                                                'method' => 'setElementClass',
                                                            ),
                                                        'value' => 'bottom-container',
                                                    )),
                                            )),
                                        1 =>
                                            Mage_Core_Model_Layout_Element::__set_state(array(
                                                '@attributes' =>
                                                    array (
                                                        'type' => 'page/switch',
                                                        'name' => 'store_switcher',
                                                        'as' => 'store_switcher',
                                                        'template' => 'page/switch/stores.phtml',
                                                    ),
                                            )),
                                        2 =>
                                            Mage_Core_Model_Layout_Element::__set_state(array(
                                                '@attributes' =>
                                                    array (
                                                        'type' => 'page/template_links',
                                                        'name' => 'footer_links',
                                                        'as' => 'footer_links',
                                                        'template' => 'page/template/links.phtml',
                                                    ),
                                            )),
                                    ),
                            )),
                        11 =>
                            Mage_Core_Model_Layout_Element::__set_state(array(
                                '@attributes' =>
                                    array (
                                        'type' => 'core/text_list',
                                        'name' => 'before_body_end',
                                        'as' => 'before_body_end',
                                        'translate' => 'label',
                                    ),
                                'label' => 'Page Bottom',
                                'block' =>
                                    Mage_Core_Model_Layout_Element::__set_state(array(
                                        '@attributes' =>
                                            array (
                                                'type' => 'page/html_cookieNotice',
                                                'name' => 'global_cookie_notice',
                                                'as' => 'global_cookie_notice',
                                                'template' => 'page/html/cookienotice.phtml',
                                                'before' => '-',
                                            ),
                                    )),
                            )),
                    ),
            )),
        2 =>
            Mage_Core_Model_Layout_Element::__set_state(array(
                '@attributes' =>
                    array (
                        'type' => 'core/profiler',
                        'output' => 'toHtml',
                        'name' => 'core_profiler',
                    ),
            )),
        3 =>
            Mage_Core_Model_Layout_Element::__set_state(array(
                '@attributes' =>
                    array (
                        'type' => 'catalog/product_price_template',
                        'name' => 'catalog_product_price_template',
                    ),
            )),
        4 =>
            Mage_Core_Model_Layout_Element::__set_state(array(
                '@attributes' =>
                    array (
                        'type' => 'rss/list',
                        'name' => 'head_rss',
                        'ifconfig' => 'rss/config/active',
                    ),
            )),
    ),
    'label' => array (
        0 => 'All Pages',
        1 => 'Catalog Category (Without Subcategories)',
        2 => 'Catalog Category (Non-Anchor)',
    ),
    'reference' => array (
        0 =>
            Mage_Core_Model_Layout_Element::__set_state(array(
                '@attributes' =>
                    array (
                        'name' => 'head',
                    ),
                'block' =>
                    Mage_Core_Model_Layout_Element::__set_state(array(
                        '@attributes' =>
                            array (
                                'type' => 'core/template',
                                'name' => 'optional_zip_countries',
                                'as' => 'optional_zip_countries',
                                'template' => 'directory/js/optional_zip_countries.phtml',
                            ),
                    )),
            )),
        1 =>
            Mage_Core_Model_Layout_Element::__set_state(array(
                '@attributes' =>
                    array (
                        'name' => 'footer',
                    ),
                'block' =>
                    Mage_Core_Model_Layout_Element::__set_state(array(
                        '@attributes' =>
                            array (
                                'type' => 'cms/block',
                                'name' => 'cms_footer_links',
                                'before' => 'footer_links',
                            ),
                        'action' =>
                            Mage_Core_Model_Layout_Element::__set_state(array(
                                '@attributes' =>
                                    array (
                                        'method' => 'setBlockId',
                                    ),
                                'block_id' => 'footer_links',
                            )),
                    )),
            )),
        2 =>
            Mage_Core_Model_Layout_Element::__set_state(array(
                '@attributes' =>
                    array (
                        'name' => 'top.links',
                    ),
                'action' =>
                    Mage_Core_Model_Layout_Element::__set_state(array(
                        '@attributes' =>
                            array (
                                'method' => 'addLink',
                                'translate' => 'label title',
                                'module' => 'customer',
                            ),
                        'label' => 'My Account',
                        'url' =>
                            Mage_Core_Model_Layout_Element::__set_state(array(
                                '@attributes' =>
                                    array (
                                        'helper' => 'customer/getAccountUrl',
                                    ),
                            )),
                        'title' => 'My Account',
                        'prepare' =>
                            Mage_Core_Model_Layout_Element::__set_state(array(
                            )),
                        'urlParams' =>
                            Mage_Core_Model_Layout_Element::__set_state(array(
                            )),
                        'position' => '10',
                    )),
            )),
        3 =>
            Mage_Core_Model_Layout_Element::__set_state(array(
                '@attributes' =>
                    array (
                        'name' => 'left',
                    ),
                'block' =>
                    Mage_Core_Model_Layout_Element::__set_state(array(
                        '@attributes' =>
                            array (
                                'type' => 'core/template',
                                'name' => 'left.permanent.callout',
                                'template' => 'callouts/left_col.phtml',
                            ),
                        'action' =>
                            array (
                                0 =>
                                    Mage_Core_Model_Layout_Element::__set_state(array(
                                        '@attributes' =>
                                            array (
                                                'method' => 'setImgSrc',
                                            ),
                                        'src' => 'images/media/col_left_callout.jpg',
                                    )),
                                1 =>
                                    Mage_Core_Model_Layout_Element::__set_state(array(
                                        '@attributes' =>
                                            array (
                                                'method' => 'setImgAlt',
                                                'translate' => 'alt',
                                                'module' => 'catalog',
                                            ),
                                        'alt' => 'Our customer service is available 24/7. Call us at (555) 555-0123.',
                                    )),
                                2 =>
                                    Mage_Core_Model_Layout_Element::__set_state(array(
                                        '@attributes' =>
                                            array (
                                                'method' => 'setLinkUrl',
                                            ),
                                        'url' => 'checkout/cart',
                                    )),
                            ),
                    )),
            )),
        4 =>
            Mage_Core_Model_Layout_Element::__set_state(array(
                '@attributes' =>
                    array (
                        'name' => 'right',
                    ),
                'block' =>
                    array (
                        0 =>
                            Mage_Core_Model_Layout_Element::__set_state(array(
                                '@attributes' =>
                                    array (
                                        'type' => 'catalog/product_compare_sidebar',
                                        'before' => 'cart_sidebar',
                                        'name' => 'catalog.compare.sidebar',
                                        'template' => 'catalog/product/compare/sidebar.phtml',
                                    ),
                            )),
                        1 =>
                            Mage_Core_Model_Layout_Element::__set_state(array(
                                '@attributes' =>
                                    array (
                                        'type' => 'core/template',
                                        'name' => 'right.permanent.callout',
                                        'template' => 'callouts/right_col.phtml',
                                    ),
                                'action' =>
                                    array (
                                        0 =>
                                            Mage_Core_Model_Layout_Element::__set_state(array(
                                                '@attributes' =>
                                                    array (
                                                        'method' => 'setImgSrc',
                                                    ),
                                                'src' => 'images/media/col_right_callout.jpg',
                                            )),
                                        1 =>
                                            Mage_Core_Model_Layout_Element::__set_state(array(
                                                '@attributes' =>
                                                    array (
                                                        'method' => 'setImgAlt',
                                                        'translate' => 'alt',
                                                        'module' => 'catalog',
                                                    ),
                                                'alt' => 'Keep your eyes open for our special Back to School items and save A LOT!',
                                            )),
                                    ),
                            )),
                    ),
            )),
        5 =>
            Mage_Core_Model_Layout_Element::__set_state(array(
                '@attributes' =>
                    array (
                        'name' => 'footer_links',
                    ),
                'action' =>
                    Mage_Core_Model_Layout_Element::__set_state(array(
                        '@attributes' =>
                            array (
                                'method' => 'addLink',
                                'translate' => 'label title',
                                'module' => 'catalog',
                                'ifconfig' => 'catalog/seo/site_map',
                            ),
                        'label' => 'Site Map',
                        'url' =>
                            Mage_Core_Model_Layout_Element::__set_state(array(
                                '@attributes' =>
                                    array (
                                        'helper' => 'catalog/map/getCategoryUrl',
                                    ),
                            )),
                        'title' => 'Site Map',
                    )),
            )),

        // ...

    ),
    'remove' =>
        array (
            0 =>
                Mage_Core_Model_Layout_Element::__set_state(array(
                    '@attributes' =>
                        array (
                            'name' => 'right.reports.product.viewed',
                        ),
                )),
            1 =>
                Mage_Core_Model_Layout_Element::__set_state(array(
                    '@attributes' =>
                        array (
                            'name' => 'reorder',
                        ),
                )),
        ),
    'update' =>
        array (
            0 =>
                Mage_Core_Model_Layout_Element::__set_state(array(
                    '@attributes' =>
                        array (
                            'handle' => 'MAP_popup',
                        ),
                )),
            1 =>
                Mage_Core_Model_Layout_Element::__set_state(array(
                    '@attributes' =>
                        array (
                            'handle' => 'SHORTCUT_popup',
                        ),
                )),
            2 =>
                Mage_Core_Model_Layout_Element::__set_state(array(
                    '@attributes' =>
                        array (
                            'handle' => 'SHORTCUT_uk_popup',
                        ),
                )),
        ),*/
);