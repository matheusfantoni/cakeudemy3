<div class="d-flex">
    <div class="mr-auto p-2">
        <h2 class="display-4 titulo">Editar Imagem da Promoção</h2>
    </div>
        <div class="p-2">
            <span class="d-none d-md-block">
                <?= $this->Html->link(__('Listar'), ['controller' => 'Promocoes', 'action' => 'index'], ['class' => 'btn btn-outline-info btn-sm']) ?>

                <?= $this->Html->link(__('Visualizar'), ['controller' => 'Promocoes', 'action' => 'view', $promocao->id], ['class' => 'btn btn-outline-primary btn-sm']) ?>

                <?= $this->Form->postLink(__('Apagar'), ['controller' => 'Promocoes', 'action' => 'delete', $promocao->id], ['class' => 'btn btn-outline-danger btn-sm', 'confirm' => __('Realmente deseja apagar a promoção # {0}?', $promocao->id)]) ?>
            </span>
            <div class="dropdown d-block d-md-none">
                <button class="btn btn-primary dropdown-toggle btn-sm" type="button" id="acoesListar" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Ações
                </button>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="acoesListar">
                    <?= $this->Html->link(__('Listar'), ['controller' => 'Promocoes', 'action' => 'index'], ['class' => 'dropdown-item']) ?>

                    <?= $this->Html->link(__('Visualizar'), ['controller' => 'Promocoes', 'action' => 'view', $promocao->id], ['class' => 'dropdown-item']) ?>

                    <?= $this->Form->postLink(__('Apagar'), ['controller' => 'Promocoes', 'action' => 'delete', $promocao->id], ['class' => 'dropdown-item', 'confirm' => __('Realmente deseja apagar a promoção # {0}?', $promocao->id)]) ?>                                    
                </div>
            </div>
        </div>
</div><hr>
<?= $this->Flash->render() ?>

<?= $this->Form->create($promocao, ['enctype' => 'multipart/form-data']) ?>

<div class="form-row">
    <div class="form-group col-md-6">
        <label><span class="text-danger">*</span> Foto (948x481)</label>
        <?= $this->Form->control('imagem', ['type' => 'file', 'label' => false, 'onchange'=>'previewImagem()']) ?>
    </div>

    <div class="form-group col-md-6">
        <?php
        if(($promocao->imagem !== null) OR (!empty($promocao->imagem))){
            $imagem_antiga = '../../../files/promocao/'.$promocao->id.'/'.$promocao->imagem;
        }else{
            $imagem_antiga = '../../../files/promocao/preview_img.jpg';
        }
        ?>

        <img src='<?= $imagem_antiga ?>' alt='<?= $promocao->name ?>' id='preview-img' class='img-thumbnail' style="width: 250px; height: 127px;">
    </div>
</div>

<p>
    <span class="text-danger">* </span>Campo obrigatório
</p>
<?= $this->Form->button(__('Salvar'), ['class' => 'btn btn-warning']) ?>
<?= $this->Form->end() ?>