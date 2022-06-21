<div class="container">
  <div class="col-md-3">
    <div style="height:25px;">

    </div>
    <div id="app">
      <button v-on:click="sign">Tanda Tangan</button>
      <div>
        <input
        type="text"
        size="25"
        placeholder="Type to generate..."
        v-model="text"
        />
      </div>

      <div v-if="text" class="output">
        <img :src="newQRCode" alt="QRCode" />
      </div>
      <hr>
    </div>
  </div>
</div>


<script type="text/javascript">
<?php include('app3.js') ?>
</script>
