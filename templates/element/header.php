<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="/">CakeStore</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
		<div class="navbar-nav">
			<?=$this->Html->link(__('Usuários'),['controller' => 'users', 'action' => 'index'],['class' => 'nav-item nav-link'])?>
			<?=$this->Html->link(__('Produtos'),['controller' => 'products', 'action' => 'index'],['class' => 'nav-item nav-link'])?>
			<?=$this->Html->link(__('Compras'),['controller' => 'shopping', 'action' => 'index'],['class' => 'nav-item nav-link'])?>
		</div>
  </div>
</nav>
<main class="main">
	<div class="container">