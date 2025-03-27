<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::get('/', function(){
    $title = "HomePage";
    $products = [
        ['image' => '/storage/images/baju.png', 'title' => 'Baju T-shirt Putih', 'description' => 'T-shirt putih nyaman dan stylish.', 'price' => 'Rp 150.000'],
        ['image' => '/storage/images/baju.png', 'title' => 'Baju Kemeja Biru', 'description' => 'Kemeja biru premium untuk acara formal.', 'price' => 'Rp 200.000'],
        ['image' => '/storage/images/baju.png', 'title' => 'Baju Hoodie Hitam', 'description' => 'Hoodie hitam dengan bahan tebal dan nyaman.', 'price' => 'Rp 250.000'],
        ['image' => '/storage/images/baju.png', 'title' => 'Baju Polo Merah', 'description' => 'Polo merah untuk penampilan santai.', 'price' => 'Rp 180.000'],
    ];

    return view('web.homepage', ['title' => $title, 'products' => $products]);
});


Route::get('products', function(){
    $title = "Products";
    $products = [
        ['image' => '/storage/images/baju.png', 'title' => 'Baju T-shirt Putih', 'description' => 'T-shirt putih nyaman dan stylish.', 'price' => 'Rp 150.000'],
        ['image' => '/storage/images/baju.png', 'title' => 'Baju Kemeja Biru', 'description' => 'Kemeja biru premium untuk acara formal.', 'price' => 'Rp 200.000'],
        ['image' => '/storage/images/baju.png', 'title' => 'Baju Hoodie Hitam', 'description' => 'Hoodie hitam dengan bahan tebal dan nyaman.', 'price' => 'Rp 250.000'],
        ['image' => '/storage/images/baju.png', 'title' => 'Baju Polo Merah', 'description' => 'Polo merah untuk penampilan santai.', 'price' => 'Rp 180.000'],
        ['image' => '/storage/images/baju.png', 'title' => 'Baju Kaos Kaki', 'description' => 'Kaos kaki berbahan lembut, nyaman digunakan.', 'price' => 'Rp 50.000'],
        ['image' => '/storage/images/baju.png', 'title' => 'Baju Jaket Denim', 'description' => 'Jaket denim stylish untuk penampilan keren.', 'price' => 'Rp 300.000'],
        ['image' => '/storage/images/baju.png', 'title' => 'Baju Sweatshirt Abu-abu', 'description' => 'Sweatshirt nyaman untuk cuaca dingin.', 'price' => 'Rp 220.000'],
        ['image' => '/storage/images/baju.png', 'title' => 'Baju Kemeja Kotak-kotak', 'description' => 'Kemeja kotak-kotak yang cocok untuk suasana santai.', 'price' => 'Rp 190.000'],
        ['image' => '/storage/images/baju.png', 'title' => 'Baju Tank Top Hitam', 'description' => 'Tank top hitam nyaman untuk olahraga.', 'price' => 'Rp 120.000'],
        ['image' => '/storage/images/baju.png', 'title' => 'Baju Dress Merah', 'description' => 'Dress merah untuk acara formal atau pesta.', 'price' => 'Rp 350.000'],
    ];
    return view('web.products',['title'=>$title,'products' => $products]);
});

Route::get('product/{slug}', function($slug){
    $title = "Single Product";
    return view('web.single_product',['title'=>$title,'slug'=>$slug]);
});

Route::get('categories', function(){
    $title = "Categories";
    return view('web.categories',['title'=>$title]);
});

Route::get('category/{slug}', function($slug){
    $title = "Single Category";
    return view('web.single_category',['title'=>$title,'slug'=>$slug]);
});

Route::get('cart', function(){
    $title = "Cart";
    return view('web.cart',['title'=>$title]);
});

Route::get('checkout', function(){
    $title = "Checkout";
    return view('web.checkout',['title'=>$title]);
});


Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});

require __DIR__.'/auth.php';