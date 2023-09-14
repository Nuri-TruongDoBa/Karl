<?php
return [
    'dir' => __DIR__,
    'layout' => '',
    'database' => [
        'host' => 'localhost',
        'port' => 3306,
        'user' => 'root',
        'password' => '',
        'name' => 'karl'
    ],
    'timezone' => 'Asia/Ho_Chi_Minh',
    'store_url' => 'https://karl.dev.com/',
    'admin_sidebar' => [
        [
            'id' => 1,
            'name' => 'Dashboard',
            'slug' => 'dashboard',
            'icon' => 'fa fa-solid fa-tachometer-alt',
            'url' => '/',
            'items' => null
        ],
        [
            'id' => 2,
            'name' => 'Sales',
            'slug' => 'sales',
            'icon' => 'fa fa-solid fa-dollar-sign',
            'url' => null,
            'items' => [
                [
                    'id' => 21,
                    'name' => 'Orders',
                    'slug' => 'orders',
                    'icon' => null,
                    'url' => null,
                    'items' => null
                ],
                [
                    'id' => 22,
                    'name' => 'Invoices',
                    'slug' => 'invoices',
                    'icon' => null,
                    'url' => null,
                    'items' => null
                ],
                [
                    'id' => 23,
                    'name' => 'Shipments',
                    'slug' => 'shipments',
                    'icon' => null,
                    'url' => null,
                    'items' => null
                ],
                [
                    'id' => 24,
                    'name' => 'Credit Memos',
                    'slug' => 'credit-memos',
                    'icon' => null,
                    'url' => null,
                    'items' => null
                ],
                [
                    'id' => 25,
                    'name' => 'Returns',
                    'slug' => 'returns',
                    'icon' => null,
                    'url' => null,
                    'items' => null
                ]
            ]
        ],
        [
            'id' => 3,
            'name' => 'Catalog',
            'slug' => 'catalog',
            'icon' => 'fa fa-solid fa-box',
            'url' => null,
            'items' => [
                [
                    'id' => 31,
                    'name' => 'Categories',
                    'slug' => 'category',
                    'icon' => null,
                    'url' => 'catalog/category/index',
                    'items' => null
                ],
                [
                    'id' => 32,
                    'name' => 'Products',
                    'slug' => 'product',
                    'icon' => null,
                    'url' => null,
                    'items' => null
                ]
            ]
        ],
        [
            'id' => 4,
            'name' => 'Customers',
            'slug' => 'customers',
            'icon' => 'fa fa-solid fa-users',
            'url' => null,
            'items' => [
                [
                    'id' => 41,
                    'name' => 'All Customers',
                    'slug' => 'list-customers',
                    'icon' => null,
                    'url' => null,
                    'items' => null
                ],
                [
                    'id' => 42,
                    'name' => 'Now Online',
                    'slug' => 'online-customers',
                    'icon' => null,
                    'url' => null,
                    'items' => null
                ]
            ]
        ],
        [
            'id' => 5,
            'name' => 'Marketing',
            'slug' => 'marketing',
            'icon' => 'fa fa-solid fa-bullhorn',
            'url' => null,
            'items' => [
                [
                    'id' => 51,
                    'name' => 'Coupons',
                    'slug' => 'coupons',
                    'icon' => null,
                    'url' => null,
                    'items' => null
                ],                
                [
                    'id' => 52,
                    'name' => 'Events',
                    'slug' => 'events',
                    'icon' => null,
                    'url' => null,
                    'items' => null
                ],
                [
                    'id' => 53,
                    'name' => 'Newsletter',
                    'slug' => 'newsletter',
                    'icon' => null,
                    'url' => null,
                    'items' => null
                ],
                [
                    'id' => 54,
                    'name' => 'Chat',
                    'slug' => 'chat',
                    'icon' => null,
                    'url' => null,
                    'items' => null
                ]
            ]
        ],
        [
            'id' => 6,
            'name' => 'Settings',
            'slug' => 'settings',
            'icon' => 'fa fa-solid fa-cog',
            'url' => null,
            'items' => null
        ],
        [
            'id' => 7,
            'name' => 'Collapse',
            'icon' => 'fa fas fa-angle-double-left',
            'url' => null,
            'items' => null
        ]
    ]
];
