<?php include 'includes/header.php'; ?>
<?php include 'includes/main.php';?>
<h1 class="mb-3" data-scrollax=" properties: { translateY: '70%', opacity: .9}">Contact Us</h1>
</div>
</div>
</div>
</section>
<section class="ftco-section contact-section ftco-degree-bg">
<div class="container">
<div class="row d-flex mb-5 contact-info">
<div class="col-md-12 mb-4">
<h2 class="h4">Contact Information</h2>
</div>
<div class="w-100"></div>
<div class="col-md-3">
<p><span>Address:</span> 465 Yonge St, Toronto, ON M4Y 1X4, Canada</p>
</div>
<div class="col-md-3">
<p><span>Phone:</span> <a href="tel://+14164084000">+14164084000</a></p>
</div>
<div class="col-md-3">
<p><span>Email:</span>dentshine@gmail.com</a></p>
</div>
</div>
<div class="row block-9">
<div class="col-md-6 pr-md-5">
<form action="<?php echo base_url()?>Client_controller/insertcontactus" method="post" required>
<div class="form-group">
<input type="text" class="form-control" placeholder="Your Name" name="name" required>
</div>
<div class="form-group">
<input type="text" class="form-control" placeholder="Your Email" name="email" required>
</div>
<div class="form-group">
<input type="text" class="form-control" placeholder="Subject" name="subject" required>
</div>
<div class="form-group">
<textarea cols="30" rows="7" class="form-control" placeholder="Message" name="message" required></textarea>
</div>
<div class="form-group">
<input type="submit" value="Send Message" class="btn btn-primary py-3 px-5">
</div>
</form>
</div>

</div>
</div>
</section>
<?php include 'includes/footer.php'; ?>