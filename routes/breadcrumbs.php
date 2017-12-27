<?php

/////////////////////////////////////////////////////////
/////////////for Admin dashboard breadcrum//////////////
//////////////////////////////////////////////////////////
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

////////////////////////Amenity list//////////////////
Breadcrumbs::register('amenitylist.index', function($breadcrumbs) {

    $breadcrumbs->parent('dashboard');
    $breadcrumbs->push('Amenity List', route('amenitylist.index'));
});

Breadcrumbs::register('amenitylist.create', function($breadcrumbs) {
    $breadcrumbs->parent('amenitylist.index');
    $breadcrumbs->push('Add Amenity', route('amenitylist.create'));
});

Breadcrumbs::register('amenitylist.edit', function($breadcrumbs, $accommolist) {

    $breadcrumbs->parent('amenitylist.index');
    $breadcrumbs->push('Update Amenity', route('amenitylist.edit', $accommolist));
});

////////////////////////Activity list//////////////////
Breadcrumbs::register('activitylist.index', function($breadcrumbs) {

    $breadcrumbs->parent('dashboard');
    $breadcrumbs->push('Activity List', route('activitylist.index'));
});

Breadcrumbs::register('activitylist.create', function($breadcrumbs) {
    $breadcrumbs->parent('activitylist.index');
    $breadcrumbs->push('Add Activity', route('activitylist.create'));
});

Breadcrumbs::register('activitylist.edit', function($breadcrumbs, $accommolist) {

    $breadcrumbs->parent('activitylist.index');
    $breadcrumbs->push('Update Activity', route('activitylist.edit', $accommolist));
});

////////////////////////Room list//////////////////
Breadcrumbs::register('roomlist.index', function($breadcrumbs) {

    $breadcrumbs->parent('dashboard');
    $breadcrumbs->push('Room Type List', route('roomlist.index'));
});

Breadcrumbs::register('roomlist.create', function($breadcrumbs) {
    $breadcrumbs->parent('roomlist.index');
    $breadcrumbs->push('Add Room', route('roomlist.create'));
});

Breadcrumbs::register('roomlist.edit', function($breadcrumbs, $accommolist) {

    $breadcrumbs->parent('roomlist.index');
    $breadcrumbs->push('Update Room', route('roomlist.edit', $accommolist));
});

////////////////////////Payment Mode list//////////////////
Breadcrumbs::register('paymentmodelist.index', function($breadcrumbs) {

    $breadcrumbs->parent('dashboard');
    $breadcrumbs->push('Payment Mode List', route('paymentmodelist.index'));
});

Breadcrumbs::register('paymentmodelist.create', function($breadcrumbs) {
    $breadcrumbs->parent('paymentmodelist.index');
    $breadcrumbs->push('Add Payment Mode', route('paymentmodelist.create'));
});

Breadcrumbs::register('paymentmodelist.edit', function($breadcrumbs, $accommolist) {

    $breadcrumbs->parent('paymentmodelist.index');
    $breadcrumbs->push('Update Payment Mode', route('paymentmodelist.edit', $accommolist));
});

////////////////////////Surrounding list//////////////////
Breadcrumbs::register('surroundinglist.index', function($breadcrumbs) {

    $breadcrumbs->parent('dashboard');
    $breadcrumbs->push('Surrounding List', route('surroundinglist.index'));
});

Breadcrumbs::register('surroundinglist.create', function($breadcrumbs) {
    $breadcrumbs->parent('surroundinglist.index');
    $breadcrumbs->push('Add Surrounding', route('surroundinglist.create'));
});

Breadcrumbs::register('surroundinglist.edit', function($breadcrumbs, $accommolist) {

    $breadcrumbs->parent('surroundinglist.index');
    $breadcrumbs->push('Update Surrounding', route('surroundinglist.edit', $accommolist));
});

/////////////////////////////////////////////////////////
/////////////for partner dashboard breadcrum//////////////
//////////////////////////////////////////////////////////

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

Breadcrumbs::register('accomodation.edit', function($breadcrumbs, $accommodation) {
    $breadcrumbs->parent('accomodation.index');
    $breadcrumbs->push('Update Accommodation', route('accomodation.edit', $accommodation));
});

Breadcrumbs::register('venue_confer_list', function($breadcrumbs) {
    $breadcrumbs->parent('partner');
    $breadcrumbs->push('Venue & Conference Listing', route('venue_confer_list'));
});

Breadcrumbs::register('add_venue_confer', function($breadcrumbs) {
    $breadcrumbs->parent('partner');
    $breadcrumbs->push('Add Venue & Conference', route('add_venue_confer'));
});

Breadcrumbs::register('edit_venue_conference', function($breadcrumbs) {
    $breadcrumbs->parent('partner');
    $breadcrumbs->push('Edit Venue & Conference', route('edit_venue_conference'));
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