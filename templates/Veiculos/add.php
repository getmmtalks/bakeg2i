<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Veiculo $veiculo
 * @var \Cake\Collection\CollectionInterface|string[] $marcas
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Ações') ?></h4>
            <?= $this->Html->link(__('Listar Veiculos'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="veiculos form content">
            <?= $this->Form->create($veiculo) ?>
            <fieldset>
                <legend><?= __('+ Novo Veículo') ?></legend>
                <?php
                    echo $this->Form->control('nome');
                    echo $this->Form->control('marca_id', ['options' => $marcas]);
                    echo $this->Form->control('ano');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Criar')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
