<?php

Breadcrumbs::for('admin.dashboard', function ($trail) {
    $trail->push(__('strings.backend.dashboard.title'), route('admin.dashboard'));
});



require __DIR__.'/auth.php';
require __DIR__.'/log-viewer.php';

Breadcrumbs::for('admin.contact_us.index', function ($trail) {
    $trail->push('Contact Us', route('admin.contact_us.index'));
});
Breadcrumbs::for('admin.contact_us.edit', function ($trail) {
    $trail->push('Edit Contact Us', route('admin.contact_us.edit',1));
});

Breadcrumbs::for('admin.training.index', function ($trail) {
    $trail->push('Training', route('admin.training.index'));
});
Breadcrumbs::for('admin.training.edit', function ($trail) {
    $trail->push('Edit Training', route('admin.training.edit',1));
});

Breadcrumbs::for('admin.blog.index', function ($trail) {
    $trail->push('Blog', route('admin.blog.index'));
});

Breadcrumbs::for('admin.blog.create', function ($trail) {
    $trail->push('Create Blog', route('admin.blog.create'));
});

Breadcrumbs::for('admin.blog.edit', function ($trail) {
    $trail->push('Edit Blog', route('admin.blog.edit',1));
});

