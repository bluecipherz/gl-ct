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

use App\Repositories\AdminPanelRepository;
use Illuminate\Http\Request;

Route::get('/', 'HomeController@index');

Route::get('home', 'HomeController@index');

Route::get('search', 'HomeController@search');

// Route::controllers([
//	 'auth' => 'Auth\AuthController',
	// 'password' => 'Auth\PasswordController',
// ]);

Route::post('/auth/register', 'AuthController@registerCustomer');
Route::post('/auth/login', 'AuthController@loginCustomer');
Route::get('/auth/logout', 'AuthController@logoutCustomer');

Route::get('admin-x965', function() {
    return view('admin.login');
});

Route::post(sha1('admin-login'), 'AuthController@loginAdmin');

Route::post('admin', 'AuthController@registerAdmin');

Route::post(sha1('admin-register'), 'AuthController@registerAdmin');

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
    $products = App\Globex::all();
	return view('pages.proview', compact('products'));
});

Route::get('editprofile', function() {
	return view('pages.editprofile');
});


Route::get('help', function() { return view('pages.static.help'); });
Route::get('contact-us', function() { return view('pages.contact-us'); });
Route::get('about-us', function() { return view('pages.static.about-us'); });
Route::get('terms-of-use', function() { return view('pages.static.terms-of-use'); });
Route::get('privacy-policy', function() { return view('pages.static.privacy-policy'); });

Route::post('categories/{category}/children', 'CategoryController@children');
Route::get('categories/all', 'CategoryController@all');
Route::resource('categories', 'CategoryController');
Route::resource('advertisements', 'AdvertisementController', ['only' => ['create', 'store', 'show']]);
Route::post('products/all', 'ProductController@all');
Route::get('products/search', 'ProductController@search');
Route::resource('products', 'ProductController');
//Route::resource('motors', 'MotorController');
Route::post('resellerimages/all', 'ResellerImageController@all');
Route::resource('resellerimages', 'ResellerImageController', ['only' => ['store', 'destroy']]);

Route::group(['prefix' => 'admin'], function () {
    Route::get('dashboard', ['uses' => 'AdminPanelController@dashboard', 'as' => 'admin.dashboard']);
    Route::get('products', ['uses' => 'AdminPanelController@products', 'as' => 'admin.products']);
    Route::get('categories', ['uses' => 'AdminPanelController@categories', 'as' => 'admin.categories']);
    Route::get('advertisements', ['uses' => 'AdminPanelController@advertisements', 'as' => 'admin.advertisements']);
    Route::get('homepage', ['uses' => 'AdminPanelController@homePage', 'as' => 'admin.homepage']);
    Route::get('orders', ['uses' => 'AdminPanelController@orders', 'as' => 'admin.orders']);
    Route::get('transactions', ['uses' => 'AdminPanelController@transactions', 'as' => 'admin.transactions']);
    Route::get('customers', ['uses' => 'AdminPanelController@customers', 'as' => 'admin.customers']);
    Route::get('price-rules', ['uses' => 'AdminPanelController@priceRules', 'as' => 'admin.price-rules']);
    Route::get('shipping', ['uses' => 'AdminPanelController@shipping', 'as' => 'admin.shipping']);
    Route::get('administration', ['uses' => 'AdminPanelController@administration', 'as' => 'admin.administration']);
    Route::get('messages', ['uses' => 'AdminPanelController@messages', 'as' => 'admin.messages']);
    Route::get('reports', ['uses' => 'AdminPanelController@reports', 'as' => 'admin.reports']);
});

Route::post('/support/contact-us', 'HomeController@contactUs');
Route::post('/feedback/report-image', 'HomeController@reportImage');

Route::get('test', function(\App\Repositories\CategoryRepository $repository) {
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
    return "<select{$options}>{$list}</select>";
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

Route::get('slurp', function(App\Repositories\HomeRepository $c) {
    $items =
//        DB::table('advertisements')->
//        join('reseller_images', 'advertisements.id', '=', 'reseller_images.advertisement_id')
        App\Advertisement::
            with('images')
            ->where('id', '>', 100)
            ->select('id', 'title', 'description', 'price', DB::raw('0 as type'))
        ;
    $products = App\Globex::
        with('images')
        ->where('id', '>', 998)
        ->select('id', 'title', 'description', 'price', DB::raw('1 as type'))
    ;

    return response()->json($items->union($products->getQuery())->get());
});

Route::get('ajax', function () {
    return 'ookay';
});

Route::get('motors', function () {
    $data = [
        'cats' => App\Category::whereDepth(2)->lists('name', 'id'),
        'motors' => App\Motor::all()
    ];
    return view('temp.motors', $data);
});
Route::post('motors', function () {
    App\Motor::create([
        'title' => Input::get('title'),
        'price' => Input::get('price'),
        'stock' => Input::get('stock'),
        'brand' => Input::get('brand'),
        'description' => Input::get('description'),
        'category_id' => Input::get('category_id'),
        'chassis_no' => Input::get('chassis_no'),
        'model' => Input::get('model'),
        'color' => Input::get('color')
    ]);
    return redirect()->back();
});
Route::get('shitzu', function (AdminPanelRepository $repository) {
//    return response()->json(array_search('admin/products', array_column($repository->getPages(), 'request', 'title')));
//    return response()->json(array_keys(array_column($repository->getPages(), 'request', 'title'), 'admin/products'));
//    return action('AuthController@registerAdmin');
    return response()->json(App\Product::all());
});