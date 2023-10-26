<?php

use App\Controllers\AuthController;

$i = 0; ?>


<div class="d-flex justify-content-between align-content-center">
    <h3 class="text-muted">Users list</h3>
    <div class="btn-container">
        <a href="/users/create" title="Add user" class="btn btn-sm btn-outline-primary">
          <i class="ph-bold ph-plus"></i>  Add user
        </a>
    </div>
</div>
<div class="table-responsive">
    <table class="table table-striped
    table-hover	
    table-borderless
    align-middle">
        <thead class="table-primary">
            <caption>Users liste</caption>
            <tr class="table-primary">
                <th>#</th>
                <th>Username</th>
                <th>Email</th>
                <th>User Role</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
            <?php foreach ($data as $user) : ?>
                <tr class="table-light">
                    <td class="fw-bold" scope="row">
                        <?= ++$i ?>
                    </td>
                    <td class="d-flex justify-content-between">
                        <?= $user->getUsername() ?> <?= AuthController::getCurrentUser()->getId() === $user->getId() ? "<small class='text-muted'>Current</small>" : null ?>
                    </td>

                    <td>
                        <?= $user->getEmail() ?>
                    </td>

                    <td>
                        <?= $user->getRole() ?>
                    </td>

                    <td>
                        <?php $statusColor = $user->getStatus() === true ? "bg-success" : "bg-danger" ?>
                        <span class="status <?= $statusColor ?>"></span>
                    </td>

                    <td class="d-flex gap-4 text-center">
                        <a href="/users/edit/<?= base64_encode($user->getId()) ?>" class="text-success">
                            <i class="ph-bold ph-pencil"></i>
                            <a href="/users/delete/<?= base64_encode($user->getId()) ?>" class="text-danger">
                                <i class="ph-bold ph-trash"></i>
                            </a>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>