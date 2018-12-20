<?php


Breadcrumbs::register('home', function ($trail) {
    $trail->push('Home', route('home'));
});

Breadcrumbs::register('about', function ($trail) {
	$trail->parent('home');
    $trail->push('About', route('about'));
});
Breadcrumbs::register('contact', function ($trail) {
    $trail->parent('home');
    $trail->push('Contact', route('contact'));
});
Breadcrumbs::register('terms', function ($trail) {
    $trail->parent('home');
    $trail->push('Terms And Conditions', route('terms'));
});
Breadcrumbs::register('policy', function ($trail) {
    $trail->parent('home');
    $trail->push('Privacy Policy', route('policy'));
});

Breadcrumbs::register('profile', function ($trail) {
    $trail->parent('home');
    $trail->push('Profile', route('profile'));
});
Breadcrumbs::register('wishlist', function ($trail) {
    $trail->parent('home');
    $trail->push('Wishlist', route('wishlist'));
});

Breadcrumbs::register('search', function ($trail) {
    $trail->parent('home');
    $trail->push('Search', route('search'));
});

Breadcrumbs::register('cart', function ($trail) {
	$trail->parent('home');
    $trail->push('Cart', route('cart'));
});

Breadcrumbs::register('occasion', function ($trail) {
    $trail->parent('home');
    $trail->push('Occasion', route('occasion'));
});
Breadcrumbs::register('occasions', function ($trail,$ocname) {
	$trail->parent('occasion');
    $trail->push($ocname, route('occasions',$ocname));
});

Breadcrumbs::register('product', function ($trail) {
    $trail->parent('home');
    $trail->push('Product', route('product'));
});

Breadcrumbs::register('products', function ($trail,$meta) {
     $trail->parent('product');
    $trail->push($meta, route('product',$meta));
});


Breadcrumbs::register('flowers', function ($trail) {
	 $trail->parent('home');
    $trail->push('Flowers', route('flowers'));
});

Breadcrumbs::register('flower', function ($trail,$catname) {
     $trail->parent('flowers');
    $trail->push($catname, route('flower',$catname));
});

Breadcrumbs::register('flowerss', function ($trail,$meta) {
     $trail->parent('flower');
    $trail->push($meta, route('flower',$meta));
});


// Breadcrumbs::register('products', function ($trail,$catname) {
// 	 $trail->parent('home');
//     $trail->push($catname, route('products',$catname));
// });

//================plants===============//


Breadcrumbs::register('plants', function ($trail) {
	 $trail->parent('home');
    $trail->push('Plants', route('plants'));
});

Breadcrumbs::register('plant', function ($trail,$catname) {
     $trail->parent('plants');
    $trail->push($catname, route('plant',$catname));
});

Breadcrumbs::register('plantss', function ($trail,$meta) {
     $trail->parent('plant');
    $trail->push($meta, route('plant',$meta));
});
//================cakes===============//


Breadcrumbs::register('cakes', function ($trail) {
	 $trail->parent('home');
    $trail->push('Cakes', route('cakes'));
});

Breadcrumbs::register('cake', function ($trail,$catname) {
     $trail->parent('cakes');
    $trail->push($catname, route('cake',$catname));
});

Breadcrumbs::register('cakess', function ($trail,$meta) {
     $trail->parent('cake');
    $trail->push($meta, route('cake',$meta));
});
// ===============gifts====================

Breadcrumbs::register('gifts', function ($trail) {
     $trail->parent('home');
    $trail->push('Gifts', route('gifts'));
});

Breadcrumbs::register('gift', function ($trail,$catname) {
     $trail->parent('gifts');
    $trail->push($catname, route('gift',$catname));
});

Breadcrumbs::register('giftss', function ($trail,$meta) {
     $trail->parent('gift');
    $trail->push($meta, route('gift',$meta));
});


Breadcrumbs::register('checkout', function ($trail) {
    $trail->parent('home');
    $trail->push('Checkout', route('checkout'));
});

?>