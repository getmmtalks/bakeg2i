<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Marca $marca
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Ações') ?></h4>
            <?= $this->Html->link(__('Listar Marcas'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="marcas form content">
            <?= $this->Form->create($marca) ?>
            <fieldset>
                <legend><?= __('+ Nova Marca') ?></legend>
                <?php
                    echo $this->Form->control('nome');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Criar')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
