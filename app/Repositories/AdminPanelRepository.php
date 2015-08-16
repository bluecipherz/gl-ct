<?php namespace App\Repositories;
/**
 * Created by PhpStorm.
 * User: bazi
 * Date: 30-Jul-15
 * Time: 11:24 PM
 */

class AdminPanelRepository {

    /**
     *	ADMIN ROUTE DEFINITIONS
     */
    protected $pages = [
        'dashboard' => ['title' => 'Dashboard', 'map' => 'admin.dashboard', 'request' => 'admin/dashboard'],
        'products' => ['title' => 'Products', 'map' => 'admin.products', 'request' => 'admin/products'],
        'categories' => ['title' => 'Categories', 'map' => 'admin.categories', 'request' => 'admin/categories'],
        'advertisements' => ['title' => 'Ads', 'map' => 'admin.advertisements', 'request' => 'admin/advertisements'],
        'homepage' => ['title' => 'Homepage Management', 'map' => 'admin.homepage', 'request' => 'admin/homepage'],
        'messages' => ['title' => 'Messages', 'map' => 'admin.messages', 'request' => 'admin/messages'],
        'reports' => ['title' => 'Reports', 'map' => 'admin.reports', 'request' => 'admin/reports'],
        'orders' => ['title' => 'Orders', 'map' => 'admin.orders', 'request' => 'admin/orders'],
        'transactions' => ['title' => 'Transactions', 'map' => 'admin.transactions', 'request' => 'admin/transactions'],
        'customers' => ['title' => 'Customers', 'map' => 'admin.customers', 'request' => 'admin/customers'],
        'priceRules' => ['title' => 'Price Rules', 'map' => 'admin.price-rules', 'request' => 'admin/price-rules'],
        'shipping' => ['title' => 'Shipping', 'map' => 'admin.shipping', 'request' => 'admin/shipping'],
        'administration' => ['title' => 'Administration', 'map' => 'admin.administration', 'request' => 'admin/administration'],
    ];

    public function getPages()
    {
        return $this->pages;
    }

}