<div id="customerDetail">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<customer-detail v-bind:customer_id="customerId"></customer-detail>
		</div>
	</div>
</div>

<script src="<?php echo base_url();?>assets/js/vue/vue.min.js"></script>
<script src="<?php echo base_url();?>assets/js/vue/axios.min.js"></script>
<script src="<?php echo base_url();?>assets/js/vue/components/customerDetail.js"></script>
<script src="<?php echo base_url();?>assets/js/moment.min.js"></script>
<script>
	new Vue({
		el: '#customerDetail',
		components: {
			customerDetail
		},
		data(){
			return {
				customerId: parseInt('<?php echo $customerId;?>')
			}
		}
	})
</script>