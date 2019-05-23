<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Log[]|\Cake\Collection\CollectionInterface $clients
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

<?php $this->assign('page', 'Clients'); ?>

<div class= "container-full">
	<div class= "row">
		<div class= "col-md-12">
			<table class= "table table-bordred table-striped">
				<thead>
					<th scope="col"><?= $this->Paginator->sort('client_first_name', 'First name') ?></th>
					<th scope="col"><?= $this->Paginator->sort('client_middle_name', 'Middle name') ?></th>
					<th scope="col"><?= $this->Paginator->sort('client_last_name', 'Last name') ?></th>
					<th scope="col"><?= $this->Paginator->sort('client_email', 'Email') ?></th>
					<th scope="col"><?= $this->Paginator->sort('client_phone', 'Phone') ?></th>
					<th scope="col"><?= $this->Paginator->sort('client_mobile_phone', 'Mobile phone') ?></th>
					<th scope="col"><?= $this->Paginator->sort('client_house_number', 'House number') ?></th>
					<th scope="col"><?= $this->Paginator->sort('client_street', 'Street') ?></th>
					<th scope="col"><?= $this->Paginator->sort('client_place', 'Place') ?></th>
					<th scope="col"><?= $this->Paginator->sort('client_postal_code', 'Postal code') ?></th>
					<th scope="col"><?= $this->Paginator->sort('client_country', 'Country') ?></th>
					<th scope="col"><?= $this->Paginator->sort('client_description', 'Client description') ?></th>
				</thead>
				<tbody>
					<?php foreach ($clients as $client): ?>
						<tr id= <?= $client->ID ?>>
							<td><?= ($client->client_first_name) ?></td>
							<td><?= ($client->client_middle_name) ?></td>
							<td><?= ($client->client_last_name) ?></td>
							<td><?= ($client->client_email) ?></td>
							<td><?= ($client->client_phone) ?></td>
							<td><?= ($client->client_mobile_phone) ?></td>
							<td><?= ($client->client_house_number) ?></td>
							<td><?= ($client->client_street) ?></td>
							<td><?= ($client->client_place) ?></td>
							<td><?= ($client->client_postal_code) ?></td>
							<td><?= ($client->client_country) ?></td>
							<td><?= ($client->client_description) ?></td>
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

