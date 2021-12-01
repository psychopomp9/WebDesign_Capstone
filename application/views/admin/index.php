<?php include 'includes/header.php'; ?>

<div class="page-content-wrapper">
				<div class="page-content">
					<div class="page-bar">
						<div class="page-title-breadcrumb">
							<div class=" pull-left">
								<div class="page-title">Dashboard</div>
							</div>
							<ol class="breadcrumb page-breadcrumb pull-right">
								<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
										href="<?php echo base_url()?>Clinic_controller/index">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
								</li>
								<li class="active">Dashboard</li>
							</ol>
						</div>
					</div>
					
					<div class="state-overview">
						<div class="row">
							<div class="col-xl-6 col-md-6 col-12">
								<div class="info-box bg-blue">
									<span class="info-box-icon push-bottom"><i class="material-icons">group</i></span>
									<div class="info-box-content">
										<?php $cnt=$this->appointment_model->countappointment(); ?>

										<span class="info-box-text">Appointments</span>
										<span class="info-box-number"><?php echo $cnt;?></span>
										<div class="progress">
											<div class="progress-bar"><?php echo $cnt;?>
												
											</div>
										</div>
										
									</div>
								
								</div>
							
							</div>
							
							<div class="col-xl-6 col-md-6 col-12">
								<div class="info-box bg-orange">
								
									<span class="info-box-icon push-bottom"><i class="fa fa-group"></i></span>
									<div class="info-box-content">
										<?php $cnt=$this->patient_model->countpatient(); 
									?>
										<span class="info-box-text">New Patients</span>
										<span class="info-box-number"> 
											<?php echo $cnt;?></span>
										<div class="progress">
											<div class="progress-bar"> <?php echo $cnt;?></div>
										</div>
										
									</div>
								
									
								</div>

								
							</div>
							
							<div class="col-xl-6 col-md-6 col-12">
								<div class="info-box bg-purple">
									<span class="info-box-icon push-bottom"><i
											class="fa fa-user-md"></i></span>
									<div class="info-box-content">
										<?php $cnt=$this->doctor_model->countdoctor(); ?>
										<span class="info-box-text">Doctors</span>
										<span class="info-box-number"><?php echo $cnt;?></span>
										<div class="progress">
											<div class="progress-bar"><?php echo $cnt;?></div>
										</div>
										
									</div>
									
								</div>
								
							</div>
						</div>
					</div>
					
					<div class="row">
						
					</div>
					
					<div class="row">
						<div class="col-md-8 col-sm-12">
							<div class="card  card-box">
								<div class="card-head">
									<header>BOOKED APPOINTMENT</header>
									<div class="tools">
										<a class="fa fa-repeat btn-color box-refresh" href="javascript:;"></a>
										<a class="t-collapse btn-color fa fa-chevron-down" href="javascript:;"></a>
										<a class="t-close btn-color fa fa-times" href="javascript:;"></a>
									</div>
								</div>
								<div class="card-body ">
									<div class="row table-padding">
										<div class="col-md-6 col-sm-6 col-xs-6">
											<div class="btn-group">
												<a href="book_appointment_material.html" id="addRow"
													class="btn btn-info">
													Add New <i class="fa fa-plus"></i>
												</a>
											</div>
										</div>
										<div class="col-md-6 col-sm-6 col-xs-6">
											<div class="btn-group pull-right">
												<button class="btn deepPink-bgcolor  btn-outline dropdown-toggle"
													data-toggle="dropdown">Tools
													<i class="fa fa-angle-down"></i>
												</button>
												<ul class="dropdown-menu pull-right">
													<li>
														<a href="javascript:;">
															<i class="fa fa-print"></i> Print </a>
													</li>
													<li>
														<a href="javascript:;">
															<i class="fa fa-file-pdf-o"></i> Save as PDF </a>
													</li>
													<li>
														<a href="javascript:;">
															<i class="fa fa-file-excel-o"></i> Export to Excel </a>
													</li>
												</ul>
											</div>
										</div>
									</div>
									<div class="table-responsive">
										<table
											class="table table-striped table-bordered table-hover table-checkable order-column"
											id="example4">
											<thead>
												<tr>
													<th>NO</th>
													<th>Patient Name</th>
													<th>Assigned Doctor</th>
													<th>Date</th>
													<th>Time</th>
													<th>Actions </th>
												</tr>
											</thead>
											<tbody>
												<?php $no=1;
												$appointment_data=$this->appointment_book_model->topbookappointmentlist();
													foreach($appointment_data as $appointment)
														{ ?>
												<tr class="odd gradeX">						
													<td><?php echo $no++;?></td>
													<td><?php echo $appointment['patient_name'];?> </td>
													<td>
														<a href="mailto:shuxer@gmail.com"> <?php echo $appointment['doctor_name'];?></a>
													</td>
													<td class="center"><?php echo $appointment['date'];?></td>
													<td class="center"> <?php echo $appointment['time'];?> </td>
													<td class="center">
														<div class="btn-group">
														<a href="<?php echo base_url();?>Clinic_controller/deletebookappointment/<?php echo $appointment['ap_book_id_pk'];?>"
						                                 class="btn btn-danger btn-xs">
						                                 <i class="fa fa-trash-o "></i>
						                                </a>
														</div>
													</td>
												
												</tr>
												<?php } ?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-4 col-sm-12">
							<div class="card  card-box">
								<div class="card-head">
									<header>DOCTORS LIST</header>
									<div class="tools">
										<a class="fa fa-repeat btn-color box-refresh" href="javascript:;"></a>
										<a class="t-collapse btn-color fa fa-chevron-down" href="javascript:;"></a>
										<a class="t-close btn-color fa fa-times" href="javascript:;"></a>
									</div>
								</div>
								<div class="card-body no-padding height-9">
									<div class="row">
										<div class="text-left full-width">
										<?php $doctor_data=$this->doctor_model->doctorlist();
										foreach($doctor_data as $doctor)
														{ ?>
										<ul class="docListWindow">
											<li>
												<div class="prog-avatar">
													<img src="<?php echo base_url().$doctor['doctor_image'];?>" alt="" width="40" height="40">
												</div>
												
													<div class="details">
														<div class="title">
															<?php echo $doctor['doctor_name'];?> <br> (<?php echo $doctor['degree'];?>)
															(<?php echo $doctor['mobile_no'];?>)
															
														</div>
														
														
													


													
													<div class="text-left full-width">
														<span class="clsAvailable">Available</span>
													</div>
													
												</div>
											
										</li>	
										</ul>
										
									<?php } ?>
								</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- start admited patient list -->
					
					<!-- end admited patient list -->
				</div>
			</div>
		</div>
<?php include 'includes/footer.php'; ?>
