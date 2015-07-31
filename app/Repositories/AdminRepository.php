<?php namespace App\Repositories;
/**
 * Created by PhpStorm.
 * User: bazi
 * Date: 30-Jul-15
 * Time: 6:06 PM
 */

use App\Repositories\Eloquent\Repository;

class AdminRepository extends Repository {

    protected $showPage;

    public function setShowPage($page)
    {
        $this->showPage = $page;
    }

    /**
     * @return string
     */
    public function model()
    {
        return 'App\Admin';
    }

    /**
     * @param $id
     * @return mixed
     */
    public function cribbbs($id)
    {
        $user = $this->find($id);
        if ($user) {
            return $user->cribbbs();
        }
    }

    /**
     * @param $id
     * @return mixed
     */
    public function navItems($id)
    {
        $key = md5('globex.' . $id);
        if ($this->cache->has($key)) {
            return $this->cache->get($key);
        }
        $navItems = $this->admin->navItems($id);
        $this->cache->put($key, $navItems);
        return $navItems;
        $admin = $this->find($id);
    }

}