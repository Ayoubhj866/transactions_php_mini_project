<?php
$i = 0;
?>

<div class="d-flex justify-content-between align-content-center">
    <h3 class="text-muted">Transactions list</h3>
    <div class="btn-container">
        <a href="/transactions/create" title="Add transaction" class="btn btn-sm btn-outline-primary">
            <i class="ph-bold ph-plus"></i> Add transaction
        </a>
    </div>
</div>
<div class="table-responsive">
    <table class="table table-striped
    table-hover	
    table-borderless
    align-middle">
        <thead class="table-primary">
            <caption>Transactions list</caption>
            <tr class="table-primary">
                <th>#</th>
                <th>Date</th>
                <th>Check</th>
                <th>Description</th>
                <th>Amount</th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
            <?php if ($data && count($data) > 0) : ?>

                <?php foreach ($data as $transaction) : ?>
                    <tr class="table-light">
                        <td class="fw-bold" scope="row">
                            <?= ++$i ?>
                        </td>
                        <td class="d-flex justify-content-between">
                            <?= $transaction->getDate() ?>
                        </td>

                        <td>
                            <?= $transaction->getCheck() ?>
                        </td>

                        <td>
                            <?= $transaction->getDescription() ?>
                        </td>

                        <td>
                            <?= $transaction->getAmount() ?>
                        </td>
                    </tr>
                <?php endforeach ?>

            <?php else : ?>
                <tr>
                    <td colspan="5" class="text-center text-danger">
                        No Transactions !
                    </td>
                </tr>
            <?php endif ?>
        </tbody>
    </table>
</div>