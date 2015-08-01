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
        'dashboard' => ['title' => 'Dashboard', 'route' => 'admin.dashboard', 'request' => 'admin/dashboard'],
        'products' => ['title' => 'Products', 'route' => 'admin.products', 'request' => 'admin/products'],
        'categories' => ['title' => 'Categories', 'route' => 'admin.categories', 'request' => 'admin/categories'],
        'advertisements' => ['title' => 'Ads', 'route' => 'admin.advertisements', 'request' => 'admin/advertisements'],
        'orders' => ['title' => 'Orders', 'route' => 'admin.orders', 'request' => 'admin/orders'],
        'transactions' => ['title' => 'Transactions', 'route' => 'admin.transactions', 'request' => 'admin/transactions'],
        'customers' => ['title' => 'Customers', 'route' => 'admin.customers', 'request' => 'admin/customers'],
        'priceRules' => ['title' => 'Price Rules', 'route' => 'admin.price-rules', 'request' => 'admin/price-rules'],
        'shipping' => ['title' => 'Shipping', 'route' => 'admin.shipping', 'request' => 'admin/shipping'],
        'preferences' => ['title' => 'Preferences', 'route' => 'admin.preferences', 'request' => 'admin/preferences'],
        'administration' => ['title' => 'Administration', 'route' => 'admin.administration', 'request' => 'admin/administration'],
        'statistics' => ['title' => 'Statistics', 'route' => 'admin.statistics', 'request' => 'admin/statistics'],
    ];

    public function getPages()
    {
        return $this->pages;
    }

}