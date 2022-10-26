<div class="row">
<div class="col-xs-12">
	<!-- PAGE CONTENT BEGINS -->
	<div class="form-horizontal">
		
		<div class="form-group">
			<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Course Name  </label>
			<label class="col-sm-1 control-label no-padding-right">:</label>
			<div class="col-sm-3">
				<input type="text" id="catname" name="catname" placeholder="Enter Course" value="<?php echo set_value('catname'); ?>" class="form-control" />
				<span id="msg"></span>
			</div>
		</div>

		<div class="form-group">
			<label class="col-sm-3 control-label no-padding-right" for="course_duration"> Course Duration Hour </label>
			<label class="col-sm-1 control-label no-padding-right">:</label>
			<div class="col-sm-3">
				<select id="course_duration" name="course_duration" class="form-control" style="border-radius:4px; padding:1px 6px;">
					<option selected disabled value="<?php echo set_value('course_duration');?>">Select Hour</option>
					<option value="40 Minutes">40 Minutes</option>
					<option value="1:00 hours">1 Hours</option>
					<option value="1:30 hours">1:30 Hours</option>
					<option value="2:00 hours">2 Hours</option>
					<option value="3:00 hours">3 Hours</option>
					<option value="4:00 hours">4 Hours</option>
				</select>
				<span id="course_duration_error"></span>
			</div>
		</div>
		
		<div class="form-group">
			<label class="col-sm-3 control-label no-padding-right" for="course_fee"> Course Fee  </label>
			<label class="col-sm-1 control-label no-padding-right">:</label>
			<div class="col-sm-3">
				<input type="number" id="course_fee" name="course_fee" placeholder="Enter Fee" value="<?php echo set_value('course_fee'); ?>" class="form-control" />
				<span id="course_fee_error"></span>
			</div>
		</div>

		<div class="form-group">
			<label class="col-sm-3 control-label no-padding-right" for="description">Notes</label>
			<label class="col-sm-1 control-label no-padding-right">:</label>
			<div class="col-sm-3">
				<textarea name="catdescrip" id="catdescrip" class="form-control" placeholder="Write Notes" ></textarea>
				<span id="catdescrip_error"></span>
			</div>
		</div>
		
		<div class="form-group clearfix" style="margin-bottom: 8px;">
			<label class="col-sm-3 control-label no-padding-right"> Status </label>
			<label class="col-sm-1 control-label no-padding-right">:</label>
			<div class="col-sm-3">
				<input type="radio" name="status" value="a" checked> Active &nbsp;
				<input type="radio" name="status" value="d"> Inactive

				<br>
				<span id="course_status_error"></span>
			</div>
		</div>

		<div class="form-group">
			<label class="col-sm-3 control-label no-padding-right" for="form-field-1"></label>
			<label class="col-sm-1 control-label no-padding-right"></label>
			<div class="col-sm-8">
				    <button type="button" class="btn btn-sm btn-success" onclick="submit()" name="btnSubmit">
						Submit
						<i class="ace-icon fa fa-arrow-right icon-on-right bigger-110"></i>
					</button>
			</div>
		</div>
		
</div>
</div>
</div>


			
<div class="row">
	<div class="col-xs-12">

		<div class="clearfix">
			<div class="pull-right tableTools-container"></div>
		</div>
		<div class="table-header">
			Course Information
		</div>

		<!-- div.table-responsive -->

		<!-- div.dataTables_borderWrap -->
		<div id="saveResult">
			<table id="dynamic-table" class="table table-striped table-bordered table-hover">
				<thead>
					<tr>
						<th class="center" style="display:none;">
							<label class="pos-rel">
								<input type="checkbox" class="ace" />
								<span class="lbl"></span>
							</label>
						</th>
						<th>SL No</th>
						<th>Course Name</th>
						<th>Course Duration</th>
						<th>Course Fee</th>
						<th>Course Status</th>
						<th class="hidden-480">Notes</th>
						<th>Action</th>
					</tr>
				</thead>

				<tbody>
					<?php 
					$BRANCHid=$this->session->userdata('BRANCHid');
					$query = $this->db->query("SELECT * FROM tbl_productcategory where status='a' AND category_branchid = '$BRANCHid' order by ProductCategory_Name asc");
					$row = $query->result();
					//while($row as $row){ ?>
					<?php $i=1; foreach($row as $row){ ?>
					<tr>
						<td class="center" style="display:none;">
							<label class="pos-rel">
								<input type="checkbox" class="ace" />
								<span class="lbl"></span>
							</label>
						</td>

						<td><?php echo $i++; ?></td>
						<td><a href="#"><?php echo $row->ProductCategory_Name; ?></a></td>
						<td><a href="#"><?php echo @$row->Course_Duration?$row->Course_Duration:''; ?></a></td>
						<td><a href="#"><?php echo @$row->Course_Fee?$row->Course_Fee:''; ?></a></td>
						<td><a href="#">
						<?php if(@$row->Course_Status=="a"){echo "Active";} elseif(@$row->Course_Status=="d"){echo "Inactive";} else {echo "";}?>
						</a>
						</td>
						<td class="hidden-480"><?php echo $row->ProductCategory_Description; ?></td>
						<td>
						<div class="hidden-sm hidden-xs action-buttons">
								<a class="blue" href="#">
									<i class="ace-icon fa fa-search-plus bigger-130"></i>
								</a>

								<?php if($this->session->userdata('accountType') != 'u'){?>
								<a class="green" href="<?php echo base_url() ?>Administrator/page/catedit/<?php echo $row->ProductCategory_SlNo; ?>" title="Eidt" onclick="return confirm('Are you sure you want to Edit this item?');">
									<i class="ace-icon fa fa-pencil bigger-130"></i>
								</a>

								<a class="red" href="#" onclick="deleted(<?php echo $row->ProductCategory_SlNo; ?>)">
									<i class="ace-icon fa fa-trash-o bigger-130"></i>
								</a>
								<?php }?>
							</div>
						</td>
					</tr>
					
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
					

<script type="text/javascript">
    function submit(){
        var catname= $("#catname").val();
		var course_duration = $("#course_duration").val();
		var course_fee = $("#course_fee").val();
        var catdescrip= $("#catdescrip").val();
		var status = $('input[name="status"]:checked').val();
		// On key function
		$("#catname").keyup(function(){
			$("#msg").html("");
		});
		$("#course_duration").change(function(){
			$("#course_duration_error").html("");
		});
		$("#course_fee").keyup(function(){
			$("#course_fee_error").html("");
		});
		// validation condition
        if(catname==""){
            $("#msg").html("Required Filed").css("color","red");
            return false;
        }
		if(course_duration=="" || course_duration==null) {
			$("#course_duration_error").html("Required Filed").css("color","red");
			return false;
		}
		if(course_fee=="" || course_fee==null) {
			$("#course_fee_error").html("Required Filed").css("color","red");
			return false;
		}
		if(status==""|| status==null) {
			$("#course_status_error").html("Required Filed").css("color","red");
			return false;
		}
        var catname=encodeURIComponent(catname);
        var inputdata = 'catname='+catname+'&course_duration='+course_duration+'&course_fee='+course_fee+'&catdescrip='+catdescrip+'&course_status='+status;
        var urldata = "<?php echo base_url();?>insertcategory";
        $.ajax({
            type: "POST",
            url: urldata,
            data: inputdata,
            success:function(data){   
				$("#catname").val("");
				$("#course_duration").val("");
				$("#course_fee").val("");
				$("#catdescrip").val("");
				$('input[name="status"]:checked').removeAttr("checked");
				// console.log(data)
				alert(data);
				location.reload();
            }
        });
    }
</script>

<script type="text/javascript">
    function deleted(id){
        var deletedd= id;
        var inputdata = 'deleted='+deletedd;
        if(confirm("Are You Sure Want to delete This?")){
        var urldata = "<?php echo base_url();?>catdelete";
        $.ajax({
            type: "POST",
            url: urldata,
            data: inputdata,
            success:function(data){
				// console.log(data)
                alert(data);
				window.location.href='<?php echo base_url(); ?>category';
            }
        });
		};
    }
</script>