<style>
	.v-select{
		margin-bottom: 5px;
	}
	.v-select.open .dropdown-toggle{
		border-bottom: 1px solid #ccc;
	}
	.v-select .dropdown-toggle{
		padding: 0px;
		height: 25px;
	}
	.v-select input[type=search], .v-select input[type=search]:focus{
		margin: 0px;
	}
	.v-select .vs__selected-options{
		overflow: hidden;
		flex-wrap:nowrap;
	}
	.v-select .selected-tag{
		margin: 2px 0px;
		white-space: nowrap;
		position:absolute;
		left: 0px;
	}
	.v-select .vs__actions{
		margin-top:-5px;
	}
	.v-select .dropdown-menu{
		width: auto;
		overflow-y:auto;
	}
	#customers label{
		font-size:13px;
	}
	#customers select{
		border-radius: 3px;
	}
	#customers .add-button{
		padding: 2.5px;
		width: 28px;
		background-color: #298db4;
		display:block;
		text-align: center;
		color: white;
	}
	#customers .add-button:hover{
		background-color: #41add6;
		color: white;
	}
	#customers input[type="file"] {
		display: none;
	}
	#customers .custom-file-upload {
		border: 1px solid #ccc;
		display: inline-block;
		padding: 5px 12px;
		cursor: pointer;
		margin-top: 5px;
		background-color: #298db4;
		border: none;
		color: white;
	}
	#customers .custom-file-upload:hover{
		background-color: #41add6;
	}

	#customerImage{
		height: 100%;
	}
</style>
<div id="customers">
		<form @submit.prevent="saveCustomer">
		<div class="row" style="margin-top: 10px;margin-bottom:15px;border-bottom: 1px solid #ccc;padding-bottom:15px;">
			<div class="col-md-5">
				<div class="form-group clearfix">
					<label class="control-label col-md-4">Student Id:</label>
					<div class="col-md-7">
						<input type="text" class="form-control" v-model="customer.Customer_Code" required readonly>
					</div>
				</div>

				<div class="form-group clearfix">
					<label class="control-label col-md-4">Name:</label>
					<div class="col-md-7">
						<input type="text" class="form-control" v-model="customer.Customer_Name" required>
					</div>
				</div>

				<div class="form-group clearfix">
					<label class="control-label col-md-4">Father's Name:</label>
					<div class="col-md-7">
						<input type="text" class="form-control" v-model="customer.Father_Name" required>
					</div>
				</div>

				<div class="form-group clearfix">
					<label class="control-label col-md-4">Mother's Name:</label>
					<div class="col-md-7">
						<input type="text" class="form-control" v-model="customer.Mother_Name" required>
					</div>
				</div>

				<div class="form-group clearfix">
					<label class="control-label col-md-4">Spouse Name:</label>
					<div class="col-md-7">
						<input type="text" class="form-control" v-model="customer.Spouse_Name">
					</div>
				</div>

				<div class="form-group clearfix">
					<label class="control-label col-md-4">Date of Birth:</label>
					<div class="col-md-7">
						<input type="date" class="form-control" v-model="customer.Birth_Date">
					</div>
				</div>

				<div class="form-group clearfix">
					<label class="control-label col-md-4">Nationality:</label>
					<div class="col-md-7">
						<input type="text" class="form-control" v-model="customer.Nationality">
					</div>
				</div>

				<div class="form-group clearfix">
					<label class="control-label col-md-4">Religion:</label>
					<div class="col-md-7">
						<input type="text" class="form-control" v-model="customer.Religion">
					</div>
				</div>

				<div class="form-group clearfix">
					<label class="control-label col-md-4">Reference/job:</label>
					<div class="col-md-7">
						<input type="text" class="form-control" v-model="customer.Reference_Job">
					</div>
				</div>
			</div>	

			<div class="col-md-5">
				<div class="form-group clearfix">
					<label class="control-label col-md-4">Present Address:</label>
					<div class="col-md-7">
						<input type="text" class="form-control" v-model="customer.Customer_Address">
					</div>
				</div>

				<div class="form-group clearfix">
					<label class="control-label col-md-4">Parmanent Address:</label>
					<div class="col-md-7">
						<input type="text" class="form-control" v-model="customer.Parmanent_Address">
					</div>
				</div>

				<div class="form-group clearfix">
					<label class="control-label col-md-4">Blood Group:</label>
					<div class="col-md-7">
						<input type="text" class="form-control" v-model="customer.Blood_Group">
					</div>
				</div>

				<div class="form-group clearfix">
					<label class="control-label col-md-4">Contact Number:</label>
					<div class="col-md-7">
						<input type="text" class="form-control" v-model="customer.Customer_Mobile" required>
					</div>
				</div>

				<div class="form-group clearfix">
					<label class="control-label col-md-4">Email Address:</label>
					<div class="col-md-7">
						<input type="text" class="form-control" v-model="customer.Customer_Email" required>
					</div>
				</div>


				<div class="form-group clearfix">
					<label class="control-label col-md-4">Website(If Any):</label>
					<div class="col-md-7">
						<textarea type="text" class="form-control" v-model="customer.Customer_Web"></textarea>
					</div>
				</div>

				<div class="form-group clearfix">
					<label class="control-label col-md-4">Other Detail:</label>
					<div class="col-md-7">
						<textarea type="text" class="form-control" v-model="customer.Other_Details"></textarea>
					</div>
				</div>
				
				<div class="form-group clearfix">
					<div class="col-md-7 col-md-offset-4">
						<input type="submit" class="btn btn-success btn-sm" value="Save">
					</div>
				</div>
			</div>	
			<div class="col-md-2 text-center;">
				<div class="form-group clearfix">
					<div style="width: 100px;height:100px;border: 1px solid #ccc;overflow:hidden;">
						<img id="customerImage" v-if="imageUrl == '' || imageUrl == null" src="/assets/no_image.gif">
                        <img id="customerImage" v-if="imageUrl != '' && imageUrl != null" v-bind:src="imageUrl">
					</div>
					<div style="text-align:center;">
						<label class="custom-file-upload">
							<input type="file" @change="previewImage"/>
							Select Image
						</label>
					</div>
				</div>
			</div>		
		</div>
		</form>

		<div class="row">
			<div class="col-sm-12 form-inline">
				<div class="form-group">
					<label for="filter" class="sr-only">Filter</label>
					<input type="text" class="form-control" v-model="filter" placeholder="Filter">
				</div>
			</div>
			<div class="col-md-12">
				<div class="table-responsive">
					<datatable :columns="columns" :data="customers" :filter-by="filter" style="margin-bottom: 5px;">
						<template scope="{ row }">
							<tr>
								<td>{{ row.AddTime | dateOnly('DD-MM-YYYY') }}</td>
								<td>{{ row.Customer_Code }}</td>
								<td>{{ row.Customer_Name }}</td>
								<td>{{ row.Father_Name }}</td>
								<td>{{ row.Nationality }}</td>
								<td>{{ row.Customer_Mobile }}</td>
								<td>{{ row.Customer_Address }}</td>
								<td>{{ row.Blood_Group }}</td>
								<td>
									<?php if($this->session->userdata('accountType') != 'u'){?>
									<button type="button" class="button edit" @click="editCustomer(row)">
										<i class="fa fa-pencil"></i>
									</button>
									<button type="button" class="button" @click="deleteCustomer(row.Customer_SlNo)">
										<i class="fa fa-trash"></i>
									</button>
									<?php }?>
								</td>
							</tr>
						</template>
					</datatable>
					<datatable-pager v-model="page" type="abbreviated" :per-page="per_page" style="margin-bottom: 50px;"></datatable-pager>
				</div>
			</div>
		</div>
</div>

<script src="<?php echo base_url();?>assets/js/vue/vue.min.js"></script>
<script src="<?php echo base_url();?>assets/js/vue/axios.min.js"></script>
<script src="<?php echo base_url();?>assets/js/vue/vuejs-datatable.js"></script>
<script src="<?php echo base_url();?>assets/js/vue/vue-select.min.js"></script>
<script src="<?php echo base_url();?>assets/js/moment.min.js"></script>

<script>
	Vue.component('v-select', VueSelect.VueSelect);
	new Vue({
		el: '#customers',
		data(){
			return {
				customer: {
					Customer_SlNo: 0,
					Customer_Code: '<?php echo $customerCode;?>',
					Customer_Name: '',
					Father_Name: '',
					Mother_Name: '',
					Spouse_Name: '',
					Birth_Date: '',
					Nationality: '',
					Religion: '',
					Reference_Job: '',
					Customer_Address: '',
					Parmanent_Address: '',
					Blood_Group: '',
					Customer_Mobile: '',
					Customer_Email: '',
					Customer_Web: '',
					Other_Details: '',
					Birth_Date: 'MM-YYYY-DD',
					Customer_Type: 'retail',
					Customer_Credit_Limit: 0,
				},
				customers: [],
				districts: [],
				selectedDistrict: null,
				imageUrl: '',
				selectedFile: null,
				
				columns: [
                    { label: 'Added Date', field: 'AddTime', align: 'center', filterable: false },
                    { label: 'Student Id', field: 'Customer_Code', align: 'center', filterable: false },
                    { label: 'Student Name', field: 'Customer_Name', align: 'center' },
                    { label: 'Father Name', field: 'Father_Name', align: 'center' },
                    { label: 'Nationality', field: 'Nationality', align: 'center' },
                    { label: 'Contact Num.', field: 'Customer_Mobile', align: 'center' },
                    { label: 'Present Add.', field: 'Customer_Address', align: 'center' },
                    { label: 'Blood Group', field: 'Blood_Group', align: 'center' },
                    { label: 'Action', align: 'center', filterable: false }
                ],
                page: 1,
                per_page: 10,
                filter: ''
			}
		},
		filters: {
			dateOnly(datetime, format){
				return moment(datetime).format(format);
			}
		},
		created() {
			// this.getDistricts();
			this.getCustomers();
		},
		methods: {
			// getDistricts(){
			// 	axios.get('/get_districts').then(res => {
			// 		this.districts = res.data;
			// 	})
			// },
			getCustomers(){
				axios.get('/get_customers').then(res => {
					this.customers = res.data;
				})
			},
			previewImage(){
				if(event.target.files.length > 0){
					this.selectedFile = event.target.files[0];
					this.imageUrl = URL.createObjectURL(this.selectedFile);
				} else {
					this.selectedFile = null;
					this.imageUrl = null;
				}
			},
			saveCustomer(){
				let url = '/add_customer';
				if(this.customer.Customer_SlNo != 0){
					url = '/update_customer';
				}

				let fd = new FormData();
				fd.append('image', this.selectedFile);
				fd.append('data', JSON.stringify(this.customer));

				axios.post(url, fd, {
					onUploadProgress: upe => {
						let progress = Math.round(upe.loaded / upe.total * 100);
						console.log(progress);
					}
				}).then(res=>{
					let r = res.data;
					alert(r.message);
					if(r.success){
						this.resetForm();
						this.customer.Customer_Code = r.customerCode;
						this.getCustomers();
					}
				})
			},
			editCustomer(customer){
				let keys = Object.keys(this.customer);
				keys.forEach(key => {
					this.customer[key] = customer[key];
				})

				this.selectedDistrict = {
					District_SlNo: customer.area_ID,
					District_Name: customer.District_Name
				}

				if(customer.image_name == null || customer.image_name == ''){
					this.imageUrl = null;
				} else {
					this.imageUrl = '/uploads/customers/'+customer.image_name;
				}
			},
			deleteCustomer(customerId){
				let deleteConfirm = confirm('Are you sure?');
				if(deleteConfirm == false){
					return;
				}
				axios.post('/delete_customer', {customerId: customerId}).then(res => {
					let r = res.data;
					alert(r.message);
					if(r.success){
						this.getCustomers();
					}
				})
			},
			resetForm(){
				let keys = Object.keys(this.customer);
				keys = keys.filter(key => key != "Customer_Type");
				keys.forEach(key => {
					if(typeof(this.customer[key]) == 'string'){
						this.customer[key] = '';
					} else if(typeof(this.customer[key]) == 'number'){
						this.customer[key] = 0;
					}
				})
				this.imageUrl = '';
				this.selectedFile = null;
			}
		}
	})
</script>