<style type="text/css">
  .card-columns {
    padding-top: 50px;
    padding-left: 500px;
  } 
  img{
    height: 100px;
    width: 100px;
  }
</style>

<div class="card-columns">
  <?php $this->Form->create($products); ?>
    <?php foreach ($products as $product) { ?>
    <div class="card">
      <div class="card-body">
        <p class="text-center">
          <?php echo $product->name; ?>
          <br>
          <?php echo $product->price; ?>
        </p>
        <div class="text-center">
          <div class="form-group">
            <?= $this->Form->postButton('Comprar', ['controller' => 'Shopping', 'action' => 'addCart', $product->id]) ?>
          </div>
        </div>
      </div>
    </div>
  <?php }?>
  <?= $this->Form->end() ?>
</div>
