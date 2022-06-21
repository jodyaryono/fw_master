<div class="container">
  <div class="col-md-12">
    <div id="app">
      <div>
        <b-button size="sm" @click="toggle">
          {{ show ? 'Hide' : 'Show' }} Alert
        </b-button>
        <b-alert
          v-model="show"
          class="mt-3"
          dismissible
          @dismissed="dismissed"
        >
          Hello {{ name }}!
        </b-alert>
      </div>
    </div>
  </div>
</div>


<script type="text/javascript">
  <?php include('app2.js') ?>
</script>
