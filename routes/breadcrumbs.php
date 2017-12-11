<?php

/////dashboard for admin/////////
Breadcrumbs::register('dashboard', function($breadcrumbs) {

    $breadcrumbs->push('Admin Dashboard', route('dashboard'));
});

Breadcrumbs::register('accommlist.index', function($breadcrumbs) {

    $breadcrumbs->parent('dashboard');
    $breadcrumbs->push('Accommodation List', route('accommlist.index'));
});

Breadcrumbs::register('accommlist.create', function($breadcrumbs) {
    $breadcrumbs->parent('accommlist.index');
    $breadcrumbs->push('Add Accommodation', route('accommlist.create'));
});

Breadcrumbs::register('accommlist.edit', function($breadcrumbs, $accommolist) {
    
    $breadcrumbs->parent('accommlist.index');
    $breadcrumbs->push('Update Accommodation', route('accommlist.edit', $accommolist));
});


/////////////for partner dashboard breadcrum//////////////

Breadcrumbs::register('partner', function($breadcrumbs) {

    $breadcrumbs->push('Partner Dashboard', route('partner'));
});

Breadcrumbs::register('accomodation.index', function($breadcrumbs) {

    $breadcrumbs->parent('partner');
    $breadcrumbs->push('Accommodation List', route('accomodation.index'));
});

Breadcrumbs::register('accomodation.create', function($breadcrumbs) {
    $breadcrumbs->parent('accomodation.index');
    $breadcrumbs->push('Add Accommodation', route('accomodation.create'));
});

// Home > About
/*Breadcrumbs::register('about', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('About', route('about'));
});

// Home > Blog
Breadcrumbs::register('blog', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Blog', route('blog'));
});

// Home > Blog > [Category]
Breadcrumbs::register('category', function($breadcrumbs, $category)
{
    $breadcrumbs->parent('blog');
    $breadcrumbs->push($category->title, route('category', $category->id));
});

// Home > Blog > [Category] > [Page]
Breadcrumbs::register('page', function($breadcrumbs, $page)
{
    $breadcrumbs->parent('category', $page->category);
    $breadcrumbs->push($page->title, route('page', $page->id));
});*/