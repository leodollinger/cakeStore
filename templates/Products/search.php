<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Product[]|\Cake\Collection\CollectionInterface $products
 */
$type = ['Artificial', 'Natural'];
?>
<div class="container">
    <div class="products index content">
        <h3><?= __('Produtos') ?></h3>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col"><?= __('Nome') ?></th>
                        <th scope="col"><?= __('Preço') ?></th>
                        <th scope="col"><?= __('Tipo') ?></th>
                        <th scope="col" class="actions"><?= __('Ações') ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($products as $product): ?>
                    <tr>
                        <td><?= h($product->name) ?></td>
                        <td><?= $this->Number->format($product->price) ?></td>
                        <td><?= $type[$product->type] ?></td>
                        <td class="actions">
                            <?= $this->Html->link(__('Comprar'), ['controller' => 'shopping', 'action' => 'addCart', $product->id]) ?>                            
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <div class="paginator">
            <ul class="pagination">
                <?= $this->Paginator->first('<< ' . __('-first-')) ?>
                <?= $this->Paginator->prev('< ' . __('-previous-')) ?>
                <?= $this->Paginator->numbers() ?>
                <?= $this->Paginator->next(__('-next-') . ' >') ?>
                <?= $this->Paginator->last(__('-last-') . ' >>') ?>
            </ul>
            <p><?= $this->Paginator->counter(__('Pagina {{page}} de {{pages}}, mostrando {{current}} produto(s) de {{count}}')) ?></p>
        </div>
    </div>
</div>
