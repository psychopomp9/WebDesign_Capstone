<?php include 'includes/header.php'; ?>
<?php include 'includes/indexheader.php';?>
<style type="text/css">
img {
    border-radius: 50%;
}
</style>

<section class="ftco-intro">
    <div class="container">
        <div class="row no-gutters">
            <div class="col-md-4 color-1 p-4">
                <h3 class="mb-4">Emergency Cases</h3>
                <p>you can contact this phone number for emergency</p>
                <span class="phone-number">8511593162</span>
            </div>
            <div class="col-md-4 color-2 p-4">
                <h3 class="mb-4">Opening Hours</h3>
                <p class="openinghours d-flex">
                    <span>Monday - Friday</span>
                    <span>8:00 - 19:00</span>
                </p>
                <p class="openinghours d-flex">
                    <span>Saturday</span>
                    <span>10:00 - 17:00</span>
                </p>
                <p class="openinghours d-flex">
                    <span>Sunday</span>
                    <span>10:00 - 16:00</span>
                </p>
            </div>

            </form>
        </div>
    </div>
    </div>
</section>

<section class="ftco-section ftco-services">
    <div class="container">
        <div class="row justify-content-center mb-5 pb-5">
            <div class="col-md-7 text-center heading-section ftco-animate">
                <h2 class="mb-2">Our Service Keeps you Smile</h2>
                <p></p>
            </div>
        </div>
        <div class="row">
            <?php foreach($toptreatment_data as $treatment)
	{ ?>
            <div class="col-md-3 d-flex align-self-stretch ftco-animate">
                <div class="media block-6 services d-block text-center">
                    <div class="icon d-flex justify-content-center align-items-center">

                        <span><img src="<?php echo base_url().$treatment['treatment_pic'];?>"
                                style="width:150px; height: 130px;"></span>
                    </div>
                    <div class="media-body p-2 mt-3">
                        <h3 class="heading"><?php echo $treatment['treatment_name'];?></h3>
                        <?php echo $treatment['description'];?>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</section>


<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center mb-5 pb-5">
            <div class="col-md-7 text-center heading-section ftco-animate">
                <h2 class="mb-3">Meet Our Experience Dentist</h2>
                <p></p>
            </div>
        </div>

        <div class="row">
            <?php foreach($topdoctor_data as $doctor)
  { ?>
            <div class="col-lg-3 col-md-6 d-flex mb-sm-4 ftco-animate">
                <div class="staff">
                    <div class="img mb-4"><img src="<?php echo base_url().$doctor['doctor_image'];?>"
                            style="width:170px; height: 180px;"></div>
                    <div class="info text-center">
                        <h3><a href="teacher-single.html"><?php echo $doctor['doctor_name'];?></a></h3>
                        <span class="position">Dentist</span>
                        <div class="text">
                            <p><?php echo $doctor['degree'];?></p>
                            <ul class="ftco-social">


                                <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                                <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                                <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
                                <li class="ftco-animate"><a href="#"><span class="icon-google-plus"></span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <?php } ?>
        </div>
    </div>
</section>

<section class="ftco-section ftco-counter img" id="section-counter"
    style="background-image: url(<?= USER_PATH?>images/bg_1.jpg);" data-stellar-background-ratio="0.5">
    <div class="container">
        <div class="row d-flex align-items-center">
            <div class="col-md-3 aside-stretch py-5">
                <div class=" heading-section heading-section-white ftco-animate pr-md-4">
                    <h2 class="mb-3">Achievements</h2>
                    <p>It is with great pride and pleasure that we would like to announce that Tricity’s very own Dr.
                        Aanand Mehta, proprietor of The Dentshine, was awarded the “Smile Centre of the Year” award on
                        November 15th 2017.</p>
                </div>
            </div>
            <div class="col-md-9 py-5 pl-md-5">
                <div class="row">
                    <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
                        <div class="block-18">
                            <div class="text">
                                <strong class="number" data-number="12">0</strong>
                                <span>Years of Experience</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
                        <div class="block-18">
                            <div class="text">
                                <?php $cnt=$this->doctor_model->countdoctor(); ?>
                                <strong class="number" data-number="<?php echo $cnt;?>">0</strong>
                                <span>Qualified Dentist</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
                        <div class="block-18">
                            <div class="text">
                                <?php $cnt=$this->patient_model->countpatient(); ?>
                                <strong class="number" data-number="<?php echo $cnt;?>">0</strong>
                                <span>Happy Smiling Customer</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
                        <div class="block-18">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<br>
<section class="ftco-section-parallax">

    <br>
    <section class="ftco-quote">
        <div class="container" style="text-align: center;">
            <div class="row">
                <div class="col-md-13 pr-md-5 aside-stretch py-5 choose">
                    <div class="heading-section heading-section-white mb-5 ftco-animate">
                        <h2 class="mb-2">Dentshine Procedure &amp; High Quality Services</h2>
                    </div>
                    <div class="ftco-animate">
                        <p>We are committed to offering quality dentshine for the whole family. Whether you are in need
                            of cosmetic dentistry, restorative work, or a regular dental checkup, you are in good hands
                            with our friendly, skilled dental technicians and qualified dentists.</p>
                        <ul class="un-styled my-5">
                            <li><span class="icon-check"></span>Best treatment provide by us</li>
                            <li><span class="icon-check"></span>Dentalshine brings you in-depth experience and knowledge
                                in the art and science of dental medicine.</li>
                            <li><span class="icon-check"></span>Explanation and Price</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6 py-5 pl-md-5">
                    <div class="heading-section mb-5 ftco-animate">
                        <!-- <h2 class="mb-2">Get a Free Quote</h2> -->
                    </div>
                    <!-- <form action="#" class="ftco-animate">
<div class="row">
<div class="col-md-6">
<div class="form-group">
<input type="text" class="form-control" placeholder="Full Name">
</div>
</div>
<div class="col-md-6">
<div class="form-group">
<input type="text" class="form-control" placeholder="Email">
</div>
</div>
<div class="col-md-6">
<div class="form-group">
<input type="text" class="form-control" placeholder="Phone">
</div>
</div>
<div class="col-md-6">
<div class="form-group">
<input type="text" class="form-control" placeholder="Website">
</div>
</div>
<div class="col-md-12">
<div class="form-group">
<textarea name="" id="" cols="30" rows="7" class="form-control" placeholder="Message"></textarea>
</div>
</div>
<div class="col-md-12">
<div class="form-group">
<input type="submit" value="Get a Quote" class="btn btn-primary py-3 px-5">
</div>
</div>
</div>
</form> -->
                </div>
            </div>
        </div>
    </section>

    <?php include 'includes/footer.php'; ?>
