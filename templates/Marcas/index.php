<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Marca[]|\Cake\Collection\CollectionInterface $marcas
 */
?>
<div class="marcas index content">
    <?= $this->Html->link(__('+ Nova Marca'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Marcas') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('nome') ?></th>
                    <th><?= $this->Paginator->sort('created', _('Criado em')) ?></th>
                    <th><?= $this->Paginator->sort('updated', _('Atualizado em')) ?></th>
                    <th class="actions"><?= __('Ações') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($marcas as $marca): ?>
                <tr>
                    <td><?= $this->Number->format($marca->id) ?></td>
                    <td><?= h($marca->nome) ?></td>
                    <td><?= h($marca->created) ?></td>
                    <td><?= h($marca->updated) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('Ver'), ['action' => 'view', $marca->id]) ?>
                        <?= $this->Html->link(__('Editar'), ['action' => 'edit', $marca->id]) ?>
                        <?= $this->Form->postLink(__('Deletar'), ['action' => 'delete', $marca->id], ['confirm' => __('Are you sure you want to delete # {0}?', $marca->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('primeira')) ?>
            <?= $this->Paginator->prev('< ' . __('anterior')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('próxima') . ' >') ?>
            <?= $this->Paginator->last(__('última') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Página {{page}} de {{pages}}, mostrando {{current}} registro(s) do total de {{count}}')) ?></p>
    </div>
</div>
