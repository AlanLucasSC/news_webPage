<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Schema;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        // Componentes
        Blade::component('shared.components.header', 'header');
        Blade::component('shared.components.menu.index', 'menu');
        Blade::component('shared.components.menu.linkMenu', 'linkMenu');
        Blade::component('shared.components.spotlight', 'spotlight');
        Blade::component('shared.components.carrosel.index', 'carrosel');
        Blade::component('shared.components.carrosel.image', 'carroselImage');
        Blade::component('shared.components.list.group', 'listGroup');
        Blade::component('shared.components.list.groupItem', 'groupItem');
        Blade::component('shared.components.news', 'news');
        Blade::component('shared.components.advertising', 'advertising');
        Blade::component('shared.components.category.index', 'category');
        Blade::component('shared.components.footer', 'footer');
        Blade::component('shared.components.author', 'author');
        Blade::component('shared.components.newsText', 'newsText');
        Blade::component('shared.components.newsTitle', 'newsTitle');
        Blade::component('shared.components.newsPhoto', 'newsPhoto');
        Blade::component('shared.components.socialLink', 'socialLink');
        Blade::component('shared.components.feedback', 'feedback');   
        Blade::component('shared.components.catalog.catalog', 'catalog');   
        Blade::component('shared.components.catalog.catalogItem', 'catItems');   

        // Containers
        Blade::component('shared.container.news', 'showNews');
        Blade::component('shared.container.main', 'main');

        Route::resourceVerbs([
            'create'    => 'criar',
            'store'     => 'guardar',
            'edit'      => 'editar',
            'update'    => 'atualizar',
            'destroy'   => 'deletar'
        ]);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
