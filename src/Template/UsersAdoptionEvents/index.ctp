<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Users Adoption Event'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Adoption Events'), ['controller' => 'AdoptionEvents', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Adoption Event'), ['controller' => 'AdoptionEvents', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="usersAdoptionEvents index large-9 medium-8 columns content">
    <h3><?= __('Users Adoption Events') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('adoption_event_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($usersAdoptionEvents as $usersAdoptionEvent): ?>
            <tr>
                <td><?= $this->Number->format($usersAdoptionEvent->id) ?></td>
                <td><?= $usersAdoptionEvent->has('user') ? $this->Html->link($usersAdoptionEvent->user->id, ['controller' => 'Users', 'action' => 'view', $usersAdoptionEvent->user->id]) : '' ?></td>
                <td><?= $usersAdoptionEvent->has('adoption_event') ? $this->Html->link($usersAdoptionEvent->adoption_event->id, ['controller' => 'AdoptionEvents', 'action' => 'view', $usersAdoptionEvent->adoption_event->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $usersAdoptionEvent->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $usersAdoptionEvent->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $usersAdoptionEvent->id], ['confirm' => __('Are you sure you want to delete # {0}?', $usersAdoptionEvent->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
