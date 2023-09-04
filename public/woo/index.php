<?php


require __DIR__ . '/vendor/autoload.php';

use Automattic\WooCommerce\Client;

$woocommerce = new Client(
    'https://fysio.link/',
    'ck_f86e34c0c3985a9e7aecf362316c25b2d3fa4f7a',
    'cs_0e8a16d27674d4b0d4fc048b3bf00608e9f130c9',
    [
        'wp_api' => true,
        'version' => 'wc/v3',
        'query_string_auth' => true
    ]
);

print_r($woocommerce->get('orders')); 

?>
<?php //print_r($woocommerce->get('')); ?>





<?php
$data = [
    'code' => '10off',
    'discount_type' => 'percent',
    'amount' => '10',
    'individual_use' => true,
    'exclude_sale_items' => true,
    'minimum_amount' => '100.00'
];

print_r($woocommerce->post('coupons', $data));
?>


<?php
// $store_url = 'https://fysio.link/';
// $endpoint = '/wc-auth/v1/authorize';
// $params = [
//     'app_name' => 'My App Name',
//     'scope' => 'write',
//     'user_id' => 123,
//     'return_url' => 'localhost/arj/woo',
//     'callback_url' => 'localhost/arj/woo'
// ];
// $query_string = http_build_query( $params );

// echo $store_url . $endpoint . '?' . $query_string;

?>

<hr>
<!-- <?php //print_r($woocommerce->get('products/794')); ?> -->