<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Veiculo $veiculo
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Veiculo'), ['action' => 'edit', $veiculo->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Veiculo'), ['action' => 'delete', $veiculo->id], ['confirm' => __('Are you sure you want to delete # {0}?', $veiculo->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Veiculos'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Veiculo'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="veiculos view content">
            <h3><?= h($veiculo->nome) ?></h3>
            <table>
                <tr>
                    <th><?= __('Nome') ?></th>
                    <td><?= h($veiculo->nome) ?></td>
                </tr>
                <tr>
                    <th><?= __('Marca') ?></th>
                    <td><?= $veiculo->has('marca') ? $this->Html->link($veiculo->marca->nome, ['controller' => 'Marcas', 'action' => 'view', $veiculo->marca->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($veiculo->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Ano') ?></th>
                    <td><?= $this->Number->format($veiculo->ano) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($veiculo->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Updated') ?></th>
                    <td><?= h($veiculo->updated) ?></td>
                </tr>
                <tr>
                    <th><?= __('Deleted') ?></th>
                    <td><?= h($veiculo->deleted) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
