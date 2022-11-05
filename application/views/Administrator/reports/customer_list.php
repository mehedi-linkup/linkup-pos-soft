<div id="customerListReport">
    <form @submit.prevent="getCustomers">
	<div class="row" style="margin-top: 10px;margin-bottom:15px;border-bottom: 1px solid #ccc;padding-bottom: 15px;">
		<div class="col-md-12">
            <div class="form-group clearfix">
                <label class="control-label col-md-2 no-padding-right">Student Type:</label>
                <div class="col-md-2 no-padding-left">
                    <select class="form-control" v-if="studentTypes.length == 0"></select>
                    <v-select v-bind:options="studentTypes" v-model="selectedStudentType" label="StudentType_Name" v-if="studentTypes.length > 0"></v-select>
                </div>
           
				<div class="col-md-3">
					<input type="submit" class="btn btn-success btn-sm" value="Search">
				</div>
			</div>
        </div>
    </div>
    </form>
    <div style="display:none;" v-bind:style="{display: customers.length > 0 ? '' : 'none'}">
        <div class="row">
            <div class="col-md-12">
                <a href="" @click.prevent="printCustomerList"><i class="fa fa-print"></i> Print</a>
            </div>
        </div>

        <div class="row" style="margin-top:15px;">
            <div class="col-md-12">
                <div class="table-responsive" id="printContent">
                    <table class="table table-bordered table-condensed">
                        <thead>
                            <th>Sl</th>
                            <th>Student Id</th>
                            <th>Student Name</th>
                            <th>Address</th>
                            <th>Contact No.</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            <tr v-for="(customer, sl) in customers">
                                <td>{{ sl + 1 }}</td>
                                <td>{{ customer.Customer_Code }}</td>
                                <td>{{ customer.Customer_Name }}</td>
                                <td>{{ customer.Customer_Address }} {{ customer.District_Name }}</td>
                                <td>{{ customer.Customer_Mobile }}</td>
                                <td style="text-align:center;">
									<a href="" title="Student Detail" v-bind:href="`/customer_detail_print/${customer.Customer_SlNo}`" target="_blank"><i class="fa fa-eye"></i></a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div style="display:none;text-align:center;" v-bind:style="{display: customers.length > 0 ? 'none' : ''}">
        No records found
    </div>
</div>

<script src="<?php echo base_url(); ?>assets/js/vue/vue.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/vue/axios.min.js"></script>
<script src="<?php echo base_url();?>assets/js/vue/vue-select.min.js"></script>

<script>
    Vue.component('v-select', VueSelect.VueSelect);
    new Vue({
        el: '#customerListReport',
        data() {
            return {
                customers: [],
                studentTypes: [
                    {StudentType_Name: 'All', StudentType_value: ''},
                    {StudentType_Name: 'Knocked', StudentType_value: 'knocked'},
                    {StudentType_Name: 'Enrolled', StudentType_value: 'enrolled'},
                    {StudentType_Name: 'Ex Student', StudentType_value: 'ex_student'},
                ],
                selectedStudentType: {
                    StudentType_Name: 'All',
                    StudentType_value: ''
                }
            }
        },
        created() {
            this.getCustomers();
        },
        methods: {
            getCustomers() {
                let data = {
                    customerType: this.selectedStudentType.StudentType_value
                }
                axios.post('/get_customers_all', data).then(res => {
                    this.customers = res.data;
                })
            },

            async printCustomerList() {
                let printContent = `
                    <div class="container">
                        <h4 style="text-align:center">Customer List</h4 style="text-align:center">
						<div class="row">
							<div class="col-xs-12">
								${document.querySelector('#printContent').innerHTML}
							</div>
						</div>
                    </div>
                `;

                let printWindow = window.open('', '', `width=${screen.width}, height=${screen.height}`);
                printWindow.document.write(`
                    <?php $this->load->view('Administrator/reports/reportHeader.php'); ?>
                `);

                printWindow.document.body.innerHTML += printContent;
                printWindow.focus();
                await new Promise(r => setTimeout(r, 1000));
                printWindow.print();
                printWindow.close();
            }
        }
    })
</script>