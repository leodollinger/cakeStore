<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="/">CakeStore</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
		<div class="navbar-nav mr-auto">
	    <?= $this->Form->create(null,['type' => 'get', 'class'=>'form-inline my-2 my-lg-0', 'action' => '/products/search/']) ?>
	      <?php
	          echo $this->Form->control('Pesquisar',['class' => 'form-control mr-sm-2','placeholder' => 'produto', 'label' => false]);
	      ?>
	    <?= $this->Form->button(__('Pesquisar'), ['class'=>'btn btn-outline-info my-2 my-sm-0']) ?>
	    <?= $this->Form->end() ?>
			<?php 
				if($userType !== false){
					if($userType == 1){
						echo $this->Html->link(__('Usuários'),['controller' => 'users', 'action' => 'index'],['class' => 'nav-item nav-link']);
						echo $this->Html->link(__('Produtos'),['controller' => 'products', 'action' => 'index'],['class' => 'nav-item nav-link']);
						echo $this->Html->link(__('Compras'),['controller' => 'shopping', 'action' => 'index'],['class' => 'nav-item nav-link']);
					}
				}
			?>
		</div>
		<div class="navbar-nav">					
			<?php 
				echo $this->Html->link(__('Carrinho'),['controller' => 'shopping', 'action' => 'showCart'],['class' => 'nav-item nav-link']);
				if($userType !== false){
					echo $this->Html->link(__('Logout'),['controller' => 'users', 'action' => 'logout'],['class' => 'nav-item nav-link']);
				}
				else{
					echo $this->Html->link(__('Login'),['controller' => 'users', 'action' => 'login'],['class' => 'nav-item nav-link']);					
					echo $this->Html->link(__('Registrar'),['controller' => 'users', 'action' => 'register'],['class' => 'nav-item nav-link']);					
				}
			?>
		</div>
  </div>
</nav>
<main class="main">