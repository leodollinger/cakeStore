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
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $shopping->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $shopping->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Shopping'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="shopping form content">
            <?= $this->Form->create($shopping) ?>
            <fieldset>
                <legend><?= __('Edit Shopping') ?></legend>
                <?php
                    echo $this->Form->control('user_id', ['options' => $users]);
                    echo $this->Form->control('product_id', ['options' => $products]);
                    echo $this->Form->control('quantity');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
