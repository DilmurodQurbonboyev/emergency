<?php

use App\Services\MessageService;
use Diglactic\Breadcrumbs\Breadcrumbs;

Breadcrumbs::for('admin', function ($trail) {
    $trail->push(MessageService::tr("Dashboard"), route('admin.dashboard'));
});

Breadcrumbs::for('menus-category', function ($trail) {
    $trail->parent('admin');
    $trail->push(MessageService::tr('Menu Categories'), route('menus-category.index'));
});
Breadcrumbs::for('menus-category/create', function ($trail) {
    $trail->parent('menus-category');
    $trail->push(MessageService::tr('Create Menu Category'), route('menus-category.create'));
});
Breadcrumbs::for('menus-category/edit', function ($trail, $id) {
    $trail->parent('menus-category');
    $trail->push(MessageService::tr('Update Menu Category'), route('menus-category.edit', $id));
});
Breadcrumbs::for('menus-category/show', function ($trail, $id) {
    $trail->parent('menus-category');
    $trail->push(MessageService::tr('About Menu Category'), route('menus-category.show', $id));
});

Breadcrumbs::for('applications', function ($trail) {
    $trail->parent('admin');
    $trail->push(tr('Appeals'), route('applications.index'));
});
Breadcrumbs::for('applications/create', function ($trail) {
    $trail->parent('applications');
    $trail->push(tr('Create Appeal'), route('applications.create'));
});
Breadcrumbs::for('applications/edit', function ($trail, $id) {
    $trail->parent('applications');
    $trail->push(tr('Update Appeal'), route('applications.edit', $id));
});
Breadcrumbs::for('applications/show', function ($trail, $id) {
    $trail->parent('applications');
    $trail->push(tr('About Appeal'), route('applications.show', $id));
});


Breadcrumbs::for('stats', function ($trail) {
    $trail->parent('admin');
    $trail->push(MessageService::tr('Statistics'), route('stats.index'));
});
Breadcrumbs::for('stats/create', function ($trail) {
    $trail->parent('stats');
    $trail->push(MessageService::tr('Create Statistic'), route('stats.create'));
});
Breadcrumbs::for('stats/edit', function ($trail, $id) {
    $trail->parent('stats');
    $trail->push(MessageService::tr('Update Statistic'), route('stats.edit', $id));
});
Breadcrumbs::for('stats/show', function ($trail, $id) {
    $trail->parent('stats');
    $trail->push(MessageService::tr('About Statistic'), route('stats.show', $id));
});


Breadcrumbs::for('menus', function ($trail) {
    $trail->parent('admin');
    $trail->push(MessageService::tr('Menus'), route('menus.index'));
});
Breadcrumbs::for('menus/create', function ($trail) {
    $trail->parent('menus');
    $trail->push(MessageService::tr('Create Menu'), route('menus.create'));
});
Breadcrumbs::for('menus/edit', function ($trail, $id) {
    $trail->parent('menus');
    $trail->push(MessageService::tr('Update Menu'), route('menus.edit', $id));
});
Breadcrumbs::for('menus/show', function ($trail, $id) {
    $trail->parent('menus');
    $trail->push(MessageService::tr('About Menu'), route('menus.show', $id));
});

Breadcrumbs::for('news-category', function ($trail) {
    $trail->parent('admin');
    $trail->push(MessageService::tr('News Categories'), route('news-category.index'));
});
Breadcrumbs::for('news-category/create', function ($trail) {
    $trail->parent('news-category');
    $trail->push(MessageService::tr('Create News Category'), route('news-category.create'));
});
Breadcrumbs::for('news-category/edit', function ($trail, $id) {
    $trail->parent('news-category');
    $trail->push(MessageService::tr('Update News Category'), route('news-category.edit', $id));
});
Breadcrumbs::for('news-category/show', function ($trail, $id) {
    $trail->parent('news-category');
    $trail->push(MessageService::tr('About News Category'), route('news-category.show', $id));
});

Breadcrumbs::for('news', function ($trail) {
    $trail->parent('admin');
    $trail->push(MessageService::tr('News'), route('news.index'));
});
Breadcrumbs::for('news/create', function ($trail) {
    $trail->parent('news');
    $trail->push(MessageService::tr('Create News'), route('news.create'));
});
Breadcrumbs::for('news/edit', function ($trail, $id) {
    $trail->parent('news');
    $trail->push(MessageService::tr('Update News'), route('news.edit', $id));
});
Breadcrumbs::for('news/show', function ($trail, $id) {
    $trail->parent('news');
    $trail->push(MessageService::tr('About News'), route('news.show', $id));
});

Breadcrumbs::for('pages-category', function ($trail) {
    $trail->parent('admin');
    $trail->push(MessageService::tr('Page Categories'), route('pages-category.index'));
});
Breadcrumbs::for('pages-category/create', function ($trail) {
    $trail->parent('pages-category');
    $trail->push(MessageService::tr('Create Page Category'), route('pages-category.create'));
});
Breadcrumbs::for('pages-category/edit', function ($trail, $id) {
    $trail->parent('pages-category');
    $trail->push(MessageService::tr('Update Page Category'), route('pages-category.edit', $id));
});
Breadcrumbs::for('pages-category/show', function ($trail, $id) {
    $trail->parent('pages-category');
    $trail->push(MessageService::tr('About Page Category'), route('pages-category.show', $id));
});

Breadcrumbs::for('pages', function ($trail) {
    $trail->parent('admin');
    $trail->push(MessageService::tr('Pages'), route('pages.index'));
});
Breadcrumbs::for('pages/create', function ($trail) {
    $trail->parent('pages');
    $trail->push(MessageService::tr('Create Page'), route('pages.create'));
});
Breadcrumbs::for('pages/edit', function ($trail, $id) {
    $trail->parent('pages');
    $trail->push(MessageService::tr('Update Page'), route('pages.edit', $id));
});
Breadcrumbs::for('pages/show', function ($trail, $id) {
    $trail->parent('pages');
    $trail->push(MessageService::tr('About Page'), route('pages.show', $id));
});

Breadcrumbs::for('useful-category', function ($trail) {
    $trail->parent('admin');
    $trail->push(MessageService::tr('Useful Categories'), route('useful-category.index'));
});
Breadcrumbs::for('useful-category/create', function ($trail) {
    $trail->parent('useful-category');
    $trail->push(MessageService::tr('Create Useful Category'), route('useful-category.create'));
});
Breadcrumbs::for('useful-category/edit', function ($trail, $id) {
    $trail->parent('useful-category');
    $trail->push(MessageService::tr('Update Useful Category'), route('useful-category.edit', $id));
});
Breadcrumbs::for('useful-category/show', function ($trail, $id) {
    $trail->parent('useful-category');
    $trail->push(MessageService::tr('About Useful Category'), route('useful-category.show', $id));
});

Breadcrumbs::for('useful', function ($trail) {
    $trail->parent('admin');
    $trail->push(MessageService::tr('Useful'), route('useful.index'));
});
Breadcrumbs::for('useful/create', function ($trail) {
    $trail->parent('useful');
    $trail->push(MessageService::tr('Create Useful'), route('useful.create'));
});
Breadcrumbs::for('useful/edit', function ($trail, $id) {
    $trail->parent('useful');
    $trail->push(MessageService::tr('Update Useful'), route('useful.edit', $id));
});
Breadcrumbs::for('useful/show', function ($trail, $id) {
    $trail->parent('useful');
    $trail->push(MessageService::tr('About Useful'), route('useful.show', $id));
});

Breadcrumbs::for('photos-category', function ($trail) {
    $trail->parent('admin');
    $trail->push(MessageService::tr('Photo Categories'), route('photos-category.index'));
});
Breadcrumbs::for('photos-category/create', function ($trail) {
    $trail->parent('photos-category');
    $trail->push(MessageService::tr('Create Photo Category'), route('photos-category.create'));
});
Breadcrumbs::for('photos-category/edit', function ($trail, $id) {
    $trail->parent('photos-category');
    $trail->push(MessageService::tr('Update Photo Category'), route('photos-category.edit', $id));
});
Breadcrumbs::for('photos-category/show', function ($trail, $id) {
    $trail->parent('photos-category');
    $trail->push(MessageService::tr('About Photo Category'), route('photos-category.show', $id));
});

// photos category
Breadcrumbs::for('photos', function ($trail) {
    $trail->parent('admin');
    $trail->push(MessageService::tr('Photos'), route('photos.index'));
});
Breadcrumbs::for('photos/create', function ($trail) {
    $trail->parent('photos');
    $trail->push(MessageService::tr('Create Photo'), route('photos.create'));
});
Breadcrumbs::for('photos/edit', function ($trail, $id) {
    $trail->parent('photos');
    $trail->push(MessageService::tr('Update Photo'), route('photos.edit', $id));
});
Breadcrumbs::for('photos/show', function ($trail, $id) {
    $trail->parent('photos');
    $trail->push(MessageService::tr('About Photo'), route('photos.show', $id));
});

Breadcrumbs::for('videos-category', function ($trail) {
    $trail->parent('admin');
    $trail->push(MessageService::tr('Video Categories'), route('videos-category.index'));
});
Breadcrumbs::for('videos-category/create', function ($trail) {
    $trail->parent('videos-category');
    $trail->push(MessageService::tr('Create Video Category'), route('videos-category.create'));
});
Breadcrumbs::for('videos-category/edit', function ($trail, $id) {
    $trail->parent('videos-category');
    $trail->push(MessageService::tr('Update Video Category'), route('videos-category.edit', $id));
});
Breadcrumbs::for('videos-category/show', function ($trail, $id) {
    $trail->parent('videos-category');
    $trail->push(MessageService::tr('About Video Category'), route('videos-category.show', $id));
});

Breadcrumbs::for('videos', function ($trail) {
    $trail->parent('admin');
    $trail->push(MessageService::tr('Videos'), route('videos.index'));
});
Breadcrumbs::for('videos/create', function ($trail) {
    $trail->parent('videos');
    $trail->push(MessageService::tr('Create Video'), route('videos.create'));
});
Breadcrumbs::for('videos/edit', function ($trail, $id) {
    $trail->parent('videos');
    $trail->push(MessageService::tr('Update Video'), route('videos.edit', $id));
});
Breadcrumbs::for('videos/show', function ($trail, $id) {
    $trail->parent('videos');
    $trail->push(MessageService::tr('About Video'), route('videos.show', $id));
});

Breadcrumbs::for('users', function ($trail) {
    $trail->parent('admin');
    $trail->push(MessageService::tr('Users'), route('users.index'));
});
Breadcrumbs::for('users/edit', function ($trail, $id) {
    $trail->parent('users');
    $trail->push(MessageService::tr('Update User'), route('users.edit', $id));
});
Breadcrumbs::for('users/show', function ($trail, $id) {
    $trail->parent('users');
    $trail->push(MessageService::tr('About User'), route('users.show', $id));
});

Breadcrumbs::for('logs', function ($trail) {
    $trail->parent('admin');
    $trail->push(MessageService::tr('Logs'), route('logs.index'));
});
Breadcrumbs::for('logs/create', function ($trail) {
    $trail->parent('logs');
    $trail->push(MessageService::tr('Create Logs'), route('logs.create'));
});
Breadcrumbs::for('logs/edit', function ($trail, $id) {
    $trail->parent('logs');
    $trail->push(MessageService::tr('Update Logs'), route('logs.edit', $id));
});
Breadcrumbs::for('logs/show', function ($trail, $id) {
    $trail->parent('logs');
    $trail->push(MessageService::tr('About Logs'), route('logs.show', $id));
});

Breadcrumbs::for('configs', function ($trail) {
    $trail->parent('admin');
    $trail->push(MessageService::tr('configs'), route('configs.index'));
});
Breadcrumbs::for('configs/create', function ($trail) {
    $trail->parent('configs');
    $trail->push(MessageService::tr('Create Config'), route('configs.create'));
});
Breadcrumbs::for('configs/edit', function ($trail, $id) {
    $trail->parent('configs');
    $trail->push(MessageService::tr('Update Config'), route('configs.edit', $id));
});
Breadcrumbs::for('configs/show', function ($trail, $id) {
    $trail->parent('configs');
    $trail->push(MessageService::tr('About Config'), route('configs.show', $id));
});

Breadcrumbs::for('managements-category', function ($trail) {
    $trail->parent('admin');
    $trail->push(MessageService::tr('Management Categories'), route('managements-category.index'));
});
Breadcrumbs::for('managements-category/create', function ($trail) {
    $trail->parent('managements-category');
    $trail->push(MessageService::tr('Create Management Category'), route('managements-category.create'));
});
Breadcrumbs::for('managements-category/edit', function ($trail, $id) {
    $trail->parent('managements-category');
    $trail->push(MessageService::tr('Update Management Category'), route('managements-category.edit', $id));
});
Breadcrumbs::for('managements-category/show', function ($trail, $id) {
    $trail->parent('managements-category');
    $trail->push(MessageService::tr('About Management Category'), route('managements-category.show', $id));
});

Breadcrumbs::for('managements', function ($trail) {
    $trail->parent('admin');
    $trail->push(MessageService::tr('Managements'), route('managements.index'));
});
Breadcrumbs::for('managements/create', function ($trail) {
    $trail->parent('managements');
    $trail->push(MessageService::tr('Create Management'), route('managements.create'));
});
Breadcrumbs::for('managements/edit', function ($trail, $id) {
    $trail->parent('managements');
    $trail->push(MessageService::tr('Update Management'), route('managements.edit', $id));
});
Breadcrumbs::for('managements/show', function ($trail, $id) {
    $trail->parent('managements');
    $trail->push(MessageService::tr('About Management'), route('managements.show', $id));
});

Breadcrumbs::for('messages', function ($trail) {
    $trail->parent('admin');
    $trail->push(MessageService::tr('Messages'), route('messages.index'));
});
Breadcrumbs::for('messages/create', function ($trail) {
    $trail->parent('messages');
    $trail->push(MessageService::tr('Create Message'), route('messages.create'));
});
Breadcrumbs::for('messages/edit', function ($trail, $id) {
    $trail->parent('messages');
    $trail->push(MessageService::tr('Update Message'), route('messages.edit', $id));
});
Breadcrumbs::for('messages/show', function ($trail, $id) {
    $trail->parent('messages');
    $trail->push(MessageService::tr('About Message'), route('messages.show', $id));
});

Breadcrumbs::for('contacts', function ($trail) {
    $trail->parent('admin');
    $trail->push(MessageService::tr('Contacts'), route('contacts.index'));
});
Breadcrumbs::for('contacts/create', function ($trail) {
    $trail->parent('contacts');
    $trail->push(MessageService::tr('Create Contact'), route('contacts.create'));
});
Breadcrumbs::for('contacts/edit', function ($trail, $id) {
    $trail->parent('contacts');
    $trail->push(MessageService::tr('Update Contact'), route('contacts.edit', $id));
});
Breadcrumbs::for('contacts/show', function ($trail, $id) {
    $trail->parent('contacts');
    $trail->push(MessageService::tr('About Contact'), route('contacts.show', $id));
});

Breadcrumbs::for('authorities', function ($trail) {
    $trail->parent('admin');
    $trail->push(MessageService::tr('Authorities'), route('authorities.index'));
});
Breadcrumbs::for('authorities/create', function ($trail) {
    $trail->parent('authorities');
    $trail->push(MessageService::tr('Create Authority'), route('authorities.create'));
});
Breadcrumbs::for('authorities/edit', function ($trail, $id) {
    $trail->parent('authorities');
    $trail->push(MessageService::tr('Update Authority'), route('authorities.edit', $id));
});
Breadcrumbs::for('authorities/show', function ($trail, $id) {
    $trail->parent('authorities');
    $trail->push(MessageService::tr('About Authority'), route('authorities.show', $id));
});
