<div class="container">
	<table class="table">
  <thead>
    <tr>
      <th scope="col">Nome</th>
      <th scope="col" style="text-align: right;">Preço</th>
      <th scope="col" style="text-align: right;">Quantidade</th>
    </tr>
  </thead>
  <tbody>
  	<?php 
  	$tot = 0;
  	foreach ($products as $product) {
	   	echo '<tr>';
	      echo '<td>' . $product['name'] .'</td>';
	      echo '<td style="text-align: right;">' . $product['price'] .'</td>';
	      echo '<td style="text-align: right;">' . $cart[$product['id']] .'</td>';
	   	echo '</tr>';
	   	$tot = $cart[$product['id']] * $product['price'] + $tot;
  	}
  	?>
  </tbody>
  <tfoot>
  	<tr>
  		<td>Total</td>
  		<td style="text-align: right;"><?=$tot?></td>
  		<td style="text-align: right;">
  			<?=$this->Html->link(__('Finalizar Compra'),['controller' => 'shopping', 'action' => 'finishShopping'],['class' => 'nav-item nav-link'])?>
  		</td>
  	</tr>
  </tfoot>
	</table>
</div>