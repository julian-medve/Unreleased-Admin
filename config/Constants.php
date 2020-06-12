
<?php

return [

    'userrole' => [
        'super_admin'   => 'Super Administrator',
        'admin'         => 'Administrator',
        'submitter'     => 'Pattern Submitter',
        'customer'      => 'Customer',
    ],

    'custom' => [

        'status' => [
            'default'   => '',
            'enabled'   => 'Enabled',
            'disabled'  => 'Disabled',
        ],

        'approved' => [
            'default'   => '',
            'approved'  => 'Approved',
            'denied'    => 'Denied',
        ],

        'accepted' => [
            'default'   => '',
            'accepted'  => 'Accepted',
            'rejected'  => 'Rejected',
        ],

        'parts'             => 'A:B:C:D:E:F:G:H:I',
        'parts_seperator'   => ':',

        'description_max_length'    => 25,
        'description_more'          => ' ...',
        'size_seperater'            => ':',
    ],

    'cart'  => [
        'image_count'       => 5,
    ],

    'directory' =>[
        'banners'               => 'Uploads/Banners',
        'custom_products'       => 'Uploads/CustomProducts',
        'custom_patterns'       => 'Uploads/CustomPatterns',
        'artisan_categories'    => 'Uploads/ArtisanCategories',
        'artisan_products'      => 'Uploads/ArtisanProducts',
        'seperater'             => ':',
        'custom_parts'          => 'images/CustomParts.jpg',
        'cart'                  => 'Uploads/Cart',
        'user'                  => 'Uploads/User',
    ],

    'api'       => [
        
        // 'payment_sandbox_server_key'        => 'SB-Mid-server-ImTAwOUnwZOeWh2IDKdmYMHD',
        // 'payment_production_server_key'     => 'Mid-server-VYq5gxCuwZFC3kVg0qMROptt',

        'payment_sandbox_server_key'        => 'SB-Mid-server-zbM6R_e6TLc73wi725H5xTHC',
        'payment_production_server_key'     => 'Mid-server-zI2ELz7Z40QM5xwdC9jKWF7p',

        'payment_sandbox_end_points'        => 'https://app.sandbox.midtrans.com/snap/v1/transactions',
        'payment_production_end_points'     => 'https://app.midtrans.com/snap/v1/transactions',

        'custom_products'       => 'https://develop3.kickavenue.com/nevertoolavish/products',
        'checkout_products'     => 'https://develop3.kickavenue.com/nevertoolavish/checkout',
        'custom_products_auth'  => 'Basic  dW5yZWxlYXNlZF9jdXN0b21AZ21haWwuY29tOm50bHhraWNrYXZlbnVl',
        'checkout_products_auth'  => 'Basic  bnRsQGtpY2thdmVudWUuY29tOm50bHhraWNrYXZlbnVl',
    ]
];

?>