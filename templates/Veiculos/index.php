<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Veiculo[]|\Cake\Collection\CollectionInterface $veiculos
 */
?>
<div class="veiculos index content">
    <?= $this->Html->link(__('+ Novo Veículo'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Veiculos') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('nome') ?></th>
                    <th><?= $this->Paginator->sort('marca_id') ?></th>
                    <th><?= $this->Paginator->sort('ano') ?></th>
                    <th><?= $this->Paginator->sort('created', _('Criado em')) ?></th>
                    <th><?= $this->Paginator->sort('updated', _('Atualizado em')) ?></th>
                    <th class="actions"><?= __('Ações') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($veiculos as $veiculo): ?>
                <tr>
                    <td><?= $this->Number->format($veiculo->id) ?></td>
                    <td><?= h($veiculo->nome) ?></td>
                    <td><?= $veiculo->has('marca') ? $this->Html->link($veiculo->marca->nome, ['controller' => 'Marcas', 'action' => 'view', $veiculo->marca->id]) : '' ?></td>
                    <td><?= $this->Number->format($veiculo->ano) ?></td>
                    <td><?= h($veiculo->created) ?></td>
                    <td><?= h($veiculo->updated) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('Ver'), ['action' => 'view', $veiculo->id]) ?>
                        <?= $this->Html->link(__('Editar'), ['action' => 'edit', $veiculo->id]) ?>
                        <?= $this->Form->postLink(__('Deletar'), ['action' => 'delete', $veiculo->id], ['confirm' => __('Are you sure you want to delete # {0}?', $veiculo->id)]) ?>
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
