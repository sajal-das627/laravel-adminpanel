<?php

Breadcrumbs::for('admin.clientmanagements.index', function ($trail) {
    $trail->push(__('labels.backend.access.clientmanagements.management'), route('admin.clientmanagements.index'));
});

Breadcrumbs::for('admin.clientmanagements.create', function ($trail) {
    $trail->parent('admin.clientmanagements.index');
    $trail->push(__('labels.backend.access.clientmanagements.management'), route('admin.clientmanagements.create'));
});

Breadcrumbs::for('admin.clientmanagements.edit', function ($trail, $id) {
    $trail->parent('admin.clientmanagements.index');
    $trail->push(__('labels.backend.access.clientmanagements.management'), route('admin.clientmanagements.edit', $id));
});
