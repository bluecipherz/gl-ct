<?php namespace App\Repositories;
/**
 * Created by PhpStorm.
 * User: bazi
 * Date: 30-Jul-15
 * Time: 11:24 PM
 */

use View;

class AdminPanelRepository {

    /**
     *	ADMIN ROUTE DEFINITIONS
     */
    protected $pages = [
        'dashboard' => ['name' => 'Dashboard', 'href' => '/admin/dashboard'],
        'products' => ['name' => 'Products', 'href' => '/admin/products'],
        'categories' => ['name' => 'Categories', 'href' => '/admin/categories'],
        'advertisements' => ['name' => 'Ads', 'href' => '/admin/advertisements'],
        'orders' => ['name' => 'Orders', 'href' => '/admin/orders'],
        'transactions' => ['name' => 'Transactions', 'href' => '/admin/transactions'],
        'customers' => ['name' => 'Customers', 'href' => '/admin/customers'],
        'priceRules' => ['name' => 'Price Rules', 'href' => '/admin/price-rules'],
        'shipping' => ['name' => 'Shipping', 'href' => '/admin/shipping'],
        'preferences' => ['name' => 'Preferences', 'href' => '/admin/preferences'],
        'administration' => ['name' => 'Administration', 'href' => '/admin/administration'],
        'statistics' => ['name' => 'Statistics', 'href' => '/admin/statistics'],
    ];

    public function getPages()
    {
        return $this->pages;
    }

}