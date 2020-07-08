<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Shopping[]|\Cake\Collection\CollectionInterface $shopping
 */
?>
<div class="shopping index content">
	<?= $this->Html->link(__('New Shopping'), ['action' => 'add'], ['class' => 'button float-right']) ?>
	<h3><?= __('Shopping') ?></h3>
	<div class="table-responsive">
		<table>
			<thead>
				<tr>
					<th><?= $this->Paginator->sort('id') ?></th>
					<th><?= $this->Paginator->sort('user_id') ?></th>
					<th><?= $this->Paginator->sort('product_id') ?></th>
					<th><?= $this->Paginator->sort('quantity') ?></th>
					<th><?= $this->Paginator->sort('created') ?></th>
					<th><?= $this->Paginator->sort('modified') ?></th>
					<th class="actions"><?= __('Actions') ?></th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($shopping as $shopping): ?>
				<tr>
					<td><?= $this->Number->format($shopping->id) ?></td>
					<td><?= $shopping->has('user') ? $this->Html->link($shopping->user->name, ['controller' => 'Users', 'action' => 'view', $shopping->user->id]) : '' ?></td>
					<td><?= $shopping->has('product') ? $this->Html->link($shopping->product->name, ['controller' => 'Products', 'action' => 'view', $shopping->product->id]) : '' ?></td>
					<td><?= $this->Number->format($shopping->quantity) ?></td>
					<td><?= h($shopping->created) ?></td>
					<td><?= h($shopping->modified) ?></td>
					<td class="actions">
						<?= $this->Html->link(__('View'), ['action' => 'view', $shopping->id]) ?>
						<?= $this->Html->link(__('Edit'), ['action' => 'edit', $shopping->id]) ?>
						<?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $shopping->id], ['confirm' => __('Are you sure you want to delete # {0}?', $shopping->id)]) ?>
					</td>
				</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
	<div class="paginator">
		<ul class="pagination">
			<?= $this->Paginator->first('<< ' . __('first')) ?>
			<?= $this->Paginator->prev('< ' . __('previous')) ?>
			<?= $this->Paginator->numbers() ?>
			<?= $this->Paginator->next(__('next') . ' >') ?>
			<?= $this->Paginator->last(__('last') . ' >>') ?>
		</ul>
		<p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
	</div>
</div>
