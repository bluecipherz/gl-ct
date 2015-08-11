<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

use Illuminate\Http\Request;

Route::get('/', 'HomeController@index');

Route::get('home', 'HomeController@index');

Route::post('search', 'HomeController@search');

// Route::controllers([
//	 'auth' => 'Auth\AuthController',
	// 'password' => 'Auth\PasswordController',
// ]);

Route::post('/auth/register', 'AuthController@registerCustomer');
Route::post('/auth/login', 'AuthController@loginCustomer');
Route::get('/auth/logout', 'AuthController@logoutCustomer');


Route::get('login', function() {
    return view('pages.login');
});

Route::get('cart', function() {
	return view('pages.cart');
});

Route::get('register', function() {
	return view('pages.register');
});

Route::get('dealsoftheday', function() {
	return view('pages.static.dealsoftheday');
});

Route::get('superdeals', function() {
	return view('pages.static.superdeals');
});

Route::get('proview', function() {
    $products = App\Product::all();
	return view('pages.proview', compact('products'));
});

Route::get('editprofile', function() {
	return view('pages.editprofile');
});

Route::get('admin-x965', function() {
	return view('admin.login');
});

Route::get('help', function() { return view('pages.static.help'); });
Route::get('contact-us', function() { return view('pages.contact-us'); });
Route::get('about-us', function() { return view('pages.static.about-us'); });
Route::get('terms-of-use', function() { return view('pages.static.terms-of-use'); });
Route::get('privacy-policy', function() { return view('pages.static.privacy-policy'); });

Route::post('categories/{category}/children', 'CategoryController@children');
Route::resource('categories', 'CategoryController');
Route::resource('advertisements', 'AdvertisementController', ['only' => ['create', 'store']]);
Route::post('products/all-products', 'ProductController@allProducts');
Route::get('products/search', 'ProductController@search');
Route::resource('products', 'ProductController');
Route::post('resellerimages/all', 'ResellerImageController@all');
Route::resource('resellerimages', 'ResellerImageController', ['only' => ['store', 'destroy']]);
Route::resource('categories', 'CategoryController');

Route::group(['prefix' => 'admin'], function () {
    Route::get('dashboard', ['uses' => 'AdminPanelController@dashboard', 'as' => 'admin.dashboard']);
    Route::get('products', ['uses' => 'AdminPanelController@products', 'as' => 'admin.products']);
    Route::get('categories', ['uses' => 'AdminPanelController@categories', 'as' => 'admin.categories']);
    Route::get('advertisements', ['uses' => 'AdminPanelController@advertisements', 'as' => 'admin.advertisements']);
    Route::get('orders', ['uses' => 'AdminPanelController@orders', 'as' => 'admin.orders']);
    Route::get('transactions', ['uses' => 'AdminPanelController@transactions', 'as' => 'admin.transactions']);
    Route::get('customers', ['uses' => 'AdminPanelController@customers', 'as' => 'admin.customers']);
    Route::get('price-rules', ['uses' => 'AdminPanelController@priceRules', 'as' => 'admin.price-rules']);
    Route::get('shipping', ['uses' => 'AdminPanelController@shipping', 'as' => 'admin.shipping']);
    Route::get('preferences', ['uses' => 'AdminPanelController@preferences', 'as' => 'admin.preferences']);
    Route::get('administration', ['uses' => 'AdminPanelController@administration', 'as' => 'admin.administration']);
    Route::get('statistics', ['uses' => 'AdminPanelController@statistics', 'as' => 'admin.statistics']);
    Route::get('messages', ['uses' => 'AdminPanelController@messages', 'as' => 'admin.messages']);
    Route::get('reports', ['uses' => 'AdminPanelController@reports', 'as' => 'admin.reports']);
});

Route::post('/support/contact-us', 'HomeController@contactUs');
Route::post('/feedback/report-image', 'HomeController@reportImage');

Route::get('test', function(\App\Repositories\CategoryRepository $repository) {
    $root = App\Category::whereIsRoot()->first();
//    $cats = $root->children->all();
//    foreach($cats as $cat) {
//        echo $cat . '<br>';
//        $subcats = $cat->children->all();
//        foreach($subcats as $subcat) {
//            echo '<span>&nbsp;&nbsp;&nbsp;&nbsp;</span>' . $subcat . '<br>';
//            $postsubcats = $subcat->children->all();
//            foreach ($postsubcats as $postsubcat) {
//                echo '<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>' . $postsubcat . '<br>';
//            }
//        }
//    }

//    $root = App\Category::reversed()->get();
//    echo $root;
//    if($root->hasChildren()) {
//        return 'woo';
//    }

//    $node = App\Category::find(122);
//    echo $node->name . '<br>';
//    if($node->children->count()) {
//        echo 'shitzu<br>';
//        foreach ($node->children->all() as $n) {
//            echo '&nbsp;&nbsp;&nbsp;&nbsp;' . $n->name . '<br>';
//        }
//    }
    $cattree = $repository->getTree();

//    foreach ($cattree as $catkey => $cat) {
//        echo $catkey . '<br>';
//        foreach($cat as $subcatkey => $subcat) {
//            echo '&nbsp;&nbsp;&nbsp;&nbsp;' . $subcatkey . '<br>';
//            foreach($subcat as $postcatkey => $postcat) {
//                echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' . $postcat . '<br>';
//            }
//        }
//    }

    $name = 'Category';
    $selected = null;
    $options = ['class' => 'cust-input w2-inp-btn addCat'];

    $list = array(
        'Cats' => array('leopard' => 'Leopard'),
        'Dogs' => array('spaniel' => 'Spaniel'),
    );

    $html = [];

    foreach ($cattree as $catkey => $cat) {
//        $html .= '<optgroup label="' . $catkey . '"></optgroup>';

        foreach($cat as $subcatkey => $subcat) {
//            $html .= '<optgroup label="' . $subcatkey . '"></optgroup>';
            $html[] = Form::getSelectOption($subcat, $subcatkey, $selected);
//            foreach($subcat as $postcatkey => $postcat) {
//                $html .= '<option value="' . $postcatkey . '">' . $postcat . '</option>';
//                $html[] = Form::getSelectOption($postcat, $postcatkey, $selected);
//            }
        }
    }
//    foreach ($list as $value => $display)
//    {
//        $html[] = Form::getSelectOption($display, $value, $selected);
//    }

    $list = implode('', $html);

    $options = HTML::attributes($options);

    $categories = $root->children->all();

    $category = $categories[rand(0, 11)];

//    return "<select{$options}>{$list}</select>";
    $descendents = $category->descendants()->get();
    $count = count($descendents);
    foreach($categories as $cat) {
        echo $cat->id . ' : ' . $cat->name . '<br/>';
    }
    echo 'descendants of root : ' . App\Category::descendantsOf(1)->count() . '<br/>';
    echo 'total cats :' . App\Category::all()->count() . '<br/>';
    echo 'category : ' . $category->name . ', ' . $category->id . '<br/>';
    echo 'descendents : ' . $count . '<br/>';
    return $descendents[rand(0, $count - 1)]->name;
});

Route::get('hell', function (Request $request) {
//    $this->app['auth']->admin()->setUser(\App\Customer::find(1));
//    throw new \App\Exceptions\LoginException($request);
//    $credentials = [
//        'email' => 'basith@gmail.com',
//        'password' => 'asd123.'
//    ];
//    $re = Auth::customer()->attempt($credentials);
//    echo 'ok ' . $re;
    $cat = App\Category::find(2);
    $cats = [];
    echo response()->json(App\Category::hasChildren()->get());
});

Route::get('ajax', function () {
    return 'ookay';
});