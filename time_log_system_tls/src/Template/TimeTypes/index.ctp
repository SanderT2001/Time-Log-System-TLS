<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Log[]|\Cake\Collection\CollectionInterface $timeTypes
 */
?>
<style>
	#center-action-buttons {
		text-align: center;
	}

	textarea {
		resize: vertical;
	}
</style>

<?php $this->assign('page', 'Time types'); ?>

<div class= "container-full">
	<div class= "row">
		<div class= "col-md-12">
			<table class= "table table-bordred table-striped">
				<thead>
					<th scope="col"><?= $this->Paginator->sort('type_name', 'Name') ?></th>
					<th scope="col"><?= $this->Paginator->sort('type_description', 'Description') ?></th>
					<th scope="col"><?= $this->Paginator->sort('type_global_name', 'Global name') ?></th>
				</thead>
				<tbody>
					<?php foreach ($timeTypes as $timeType): ?>
						<tr id= <?= $timeType->ID ?>>
							<td><?= ($timeType->type_name) ?></td>
							<td><?= ($timeType->type_description) ?></td>
							<td><?= ($timeType->type_global_name) ?></td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>			

			<div class= "paginator">
				<ul class= "pagination">
					<?= $this->Paginator->first('<< ' . __('First')) ?>
					<?= $this->Paginator->prev('< ' . __('Previous')) ?>
					<?= $this->Paginator->numbers() ?>
					<?= $this->Paginator->next(__('Next') . ' >') ?>
					<?= $this->Paginator->last(__('Last') . ' >>') ?>
				</ul>
				<!-- <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p> -->
			</div>
		</div>		
	</div>
</div>

