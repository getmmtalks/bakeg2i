<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Veiculo $veiculo
 * @var string[]|\Cake\Collection\CollectionInterface $marcas
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Ações') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $veiculo->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $veiculo->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Veiculos'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="veiculos form content">
            <?= $this->Form->create($veiculo) ?>
            <fieldset>
                <legend><?= __('Editar Veículo') ?></legend>
                <?php
                    echo $this->Form->control('nome');
                    echo $this->Form->control('marca_id', ['options' => $marcas]);
                    echo $this->Form->control('ano');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Salvar')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
