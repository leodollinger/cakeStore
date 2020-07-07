<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<div class="row">
	<div class="col-md-12">
		<div class="users form content" style="margin-top: 20px">
			<?= $this->Form->create($user) ?>
			<fieldset>
				<?php
					echo '<div class="form-group row">
									<label for="username" class="col-lg-2 col-form-label optional" align="right">E-mail</label>
									<div class="col-lg-5">
									'.$this->Form->control('username', ['class'=> 'form-control username', 'placeholder' => 'digite o seu E-mail', 'label' => false]).'
									</div>
								</div>';
						
					echo '<div class="form-group row">
									<label for="password" class="col-lg-2 col-form-label optional" align="right">Senha</label>
									<div class="col-lg-5">
									'.$this->Form->control('password', ['class'=> 'form-control password', 'placeholder' => 'digite a sua senha', 'label' => false]).'
									</div>
								</div>';
				?>
			</fieldset>
			<?= $this->Form->button(__('Logar'), ['class' => 'btn btn-primary']) ?>
			<?= $this->Form->end() ?>
		</div>
	</div>
</div>
