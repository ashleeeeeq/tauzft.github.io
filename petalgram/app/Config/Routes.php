<?php

namespace Config;

use CodeIgniter\Config\RoutesConfig;

class Routes extends RoutesConfig
{
    public string $defaultController = 'Home';
    public string $defaultMethod = 'index';

    public array $routes = [
        '' => 'Home::index',

        'shop' => 'Shop::index',
        'product/(:num)' => 'Shop::product/$1',
        'category/(:num)' => 'Shop::category/$1',
        'search' => 'Shop::search',

        'cart' => 'Cart::index',
        'cart/add' => 'Cart::add',
        'cart/update/(:num)' => 'Cart::update/$1',
        'cart/remove/(:num)' => 'Cart::remove/$1',
        'cart/empty' => 'Cart::empty',

        'checkout' => 'Checkout::index',
        'checkout/payment' => 'Checkout::payment',
        'checkout/process' => 'Checkout::process',
        'checkout/success/(:num)' => 'Checkout::success/$1',

        'orders' => 'Order::history',
        'order/(:num)' => 'Order::view/$1',
        'order/track' => 'Order::track',
        'api/order-status/(:num)' => 'Order::status/$1',

        'login' => 'Auth::login',
        'register' => 'Auth::register',
        'logout' => 'Auth::logout',

        'profile' => 'Profile::index',
        'profile/update' => 'Profile::update',

        'messages' => 'Messenger::index',
        'messages/send' => 'Messenger::send',
        'messages/(:num)' => 'Messenger::conversation/$1',

        'admin' => 'Admin\Dashboard::index',
        'admin/products' => 'Admin\Products::index',
        'admin/products/add' => 'Admin\Products::add',
        'admin/products/edit/(:num)' => 'Admin\Products::edit/$1',
        'admin/products/delete/(:num)' => 'Admin\Products::delete/$1',
        'admin/categories' => 'Admin\Categories::index',
        'admin/categories/add' => 'Admin\Categories::add',
        'admin/categories/edit/(:num)' => 'Admin\Categories::edit/$1',
        'admin/categories/delete/(:num)' => 'Admin\Categories::delete/$1',
        'admin/orders' => 'Admin\Orders::index',
        'admin/orders/(:num)' => 'Admin\Orders::view/$1',
        'admin/orders/update/(:num)' => 'Admin\Orders::update/$1',
        'admin/customers' => 'Admin\Customers::index',
        'admin/customers/(:num)' => 'Admin\Customers::view/$1',
        'admin/reports' => 'Admin\Reports::index',
    ];
}
