<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<div class="container">
	<div class="row">
		<aside class="column">
			<div class="side-nav">
			</div>
		</aside>
		<div class="column-responsive column-80">
			<div class="users form content col-md-12">
				<?= $this->Form->create($user) ?>
				<fieldset>
					<legend><?= __('Cadastro de Usuário') ?></legend>
					<?php							
						echo '<div class="form-group row">
								 <label for="name" class="col-lg-4 col-form-label" align="right">Nome</label>
								 <div class="col-lg-8">
								 '.$this->Form->control('name', ['class'=> 'form-control name', 'placeholder' => 'Nome', 'label' => false]).'
								 </div>
							 </div>';
						echo '<div class="form-group row">
								 <label for="username" class="col-lg-4 col-form-label" align="right">Nome de Usuário</label>
								 <div class="col-lg-8">
								 '.$this->Form->control('username', ['class'=> 'form-control username', 'placeholder' => 'Nome de Usuário', 'label' => false]).'
								 </div>
							 </div>';
						echo '<div class="form-group row">
								 <label for="password" class="col-lg-4 col-form-label" align="right">Senha</label>
								 <div class="col-lg-8">
								 '.$this->Form->control('password', ['class'=> 'form-control password', 'placeholder' => 'Senha', 'label' => false]).'
								 </div>
							 </div>';
						echo '<div class="form-group row">
								 <label for="passwordConf" class="col-lg-4 col-form-label" align="right">Confirmação de senha</label>
								 <div class="col-lg-8">
								 '.$this->Form->control('password', ['name' => 'passwordConf', 'id' => 'passwordConf','class'=> 'form-control password',
								 	'placeholder' => 'Senha', 'label' => false]).'
								 </div>
							 </div>';
						echo '<div class="form-group row">
								 <label for="phone" class="col-lg-4 col-form-label" align="right">Senha</label>
								 <div class="col-lg-8">
								 '.$this->Form->control('phone', ['class'=> 'form-control phone', 'placeholder' => 'Telefone', 'label' => false]).'
								 </div>
							 </div>';
						echo '<div class="form-group row">
								 <label for="email" class="col-lg-4 col-form-label" align="right">Senha</label>
								 <div class="col-lg-8">
								 '.$this->Form->control('email', ['class'=> 'form-control email', 'placeholder' => 'E-mail', 'label' => false]).'
								 </div>
							 </div>';
					?>
				</fieldset>
				<?= $this->Form->button(__('Submit'), ['class'=> 'btn btn-primary']) ?>
				<?= $this->Form->end() ?>
			</div>
		</div>
	</div>
</div>
