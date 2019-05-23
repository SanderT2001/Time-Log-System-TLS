<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Log[]|\Cake\Collection\CollectionInterface $projects
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

<?php $this->assign('page', 'Projects'); ?>

<div class= "container-full">
	<div class= "row">
		<div class= "col-md-12">
			<table class= "table table-bordred table-striped">
				<thead>
					<th scope="col"><?= $this->Paginator->sort('project_name', 'Name') ?></th>
					<th scope="col"><?= $this->Paginator->sort('project_description', 'Description') ?></th>
					<th scope="col"><?= $this->Paginator->sort('project_retrospective', 'Retrospective') ?></th>
					<th scope="col"><?= $this->Paginator->sort('client_id', 'Client') ?></th>
					<th scope="col"><?= $this->Paginator->sort('project_progress', 'Progress') ?></th>
					<th scope="col"><?= $this->Paginator->sort('project_start_timestamp', 'Start date') ?></th>
					<th scope="col"><?= $this->Paginator->sort('project_end_timestamp', 'End date') ?></th>
				</thead>
				<tbody>
					<?php foreach ($projects as $project): ?>
						<tr id= <?= $project->ID ?>>
							<td><?= ($project->project_name) ?></td>
							<td><?= ($project->project_description) ?></td>
							<td><?= ($project->project_retrospective) ?></td>
							<td><?= $project->has('client') ? $this->Html->link($project->client->client_first_name.' '.$project->client->client_middle_name.' '.$project->client->client_last_name, ['controller' => 'Clients', 'action' => 'view', $project->client->ID]) : '' ?></td>
							<td><?= ($project->project_progress) ?></td>
							<td><?= ($project->project_start_timestamp) ?></td>
							<td><?= ($project->project_end_timestamp) ?></td>
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

