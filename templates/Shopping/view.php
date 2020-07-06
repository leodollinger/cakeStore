<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Shopping $shopping
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Shopping'), ['action' => 'edit', $shopping->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Shopping'), ['action' => 'delete', $shopping->id], ['confirm' => __('Are you sure you want to delete # {0}?', $shopping->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Shopping'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Shopping'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="shopping view content">
            <h3><?= h($shopping->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $shopping->has('user') ? $this->Html->link($shopping->user->name, ['controller' => 'Users', 'action' => 'view', $shopping->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Product') ?></th>
                    <td><?= $shopping->has('product') ? $this->Html->link($shopping->product->name, ['controller' => 'Products', 'action' => 'view', $shopping->product->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($shopping->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Quantity') ?></th>
                    <td><?= $this->Number->format($shopping->quantity) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($shopping->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($shopping->modified) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
