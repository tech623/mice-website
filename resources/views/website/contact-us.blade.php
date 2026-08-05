@extends('layouts.app')
@section('content')

<div class="row contact-detail">
    <div class="col-md-10 offset-md-1">
        <div style="padding-bottom: 40px; padding-top:40px">
            <h1 class="text-center">Contact Us</h1>
        </div>
        <div class="row">
            <div class="col-md-5 mb-4">
                <div style="background:#4B296B; border-radius:16px; padding:24px; color:#fff; margin-bottom:20px; display:flex; align-items:center; gap:20px; box-shadow:0 4px 20px rgba(0,0,0,0.08);">
                    <div style="background:rgba(255,255,255,0.15); border-radius:50%; width:56px; height:56px; display:flex; align-items:center; justify-content:center; flex-shrink:0;">
                        <i class="fas fa-phone-alt" style="font-size:22px; color:#F47E27;"></i>
                    </div>
                    <div>
                        <h4 style="color:#fff; margin:0;">Call</h4>
                        <a href="tel:08023341122" style="color:#ddd; text-decoration:none;">080 2334 1122</a><br>
                        <a href="tel:+919820518090" style="color:#ddd; text-decoration:none;">+91 98205 18090</a>
                    </div>
                </div>
                <div style="background:#4B296B; border-radius:16px; padding:24px; color:#fff; margin-bottom:20px; display:flex; align-items:center; gap:20px; box-shadow:0 4px 20px rgba(0,0,0,0.08);">
                    <div style="background:rgba(255,255,255,0.15); border-radius:50%; width:56px; height:56px; display:flex; align-items:center; justify-content:center; flex-shrink:0;">
                        <i class="fas fa-envelope" style="font-size:22px; color:#F47E27;"></i>
                    </div>
                    <div>
                        <h4 style="color:#fff; margin:0;">Email</h4>
                        <a href="mailto:info@micehospitality.com" style="color:#ddd; text-decoration:none;">info@micehospitality.com</a>
                    </div>
                </div>
                <div style="background:#4B296B; border-radius:16px; padding:24px; color:#fff; margin-bottom:20px; display:flex; align-items:flex-start; gap:20px; box-shadow:0 4px 20px rgba(0,0,0,0.08);">
                    <div style="background:rgba(255,255,255,0.15); border-radius:50%; width:56px; height:56px; display:flex; align-items:center; justify-content:center; flex-shrink:0;">
                        <i class="fas fa-map-marker-alt" style="font-size:22px; color:#F47E27;"></i>
                    </div>
                    <div>
                        <h4 style="color:#fff; margin:0;">Address</h4>
                        <span style="color:#ddd;">#1/4, Hanumanthappa Layout, 2nd Floor, Off Ulsoor Road, Bengaluru – 560042.</span>
                    </div>
                </div>
                <div style="background:#4B296B; border-radius:16px; padding:24px; color:#fff; box-shadow:0 4px 20px rgba(0,0,0,0.08);">
                    <h4 style="color:#fff; margin:0 0 16px;">Follow Us</h4>
                    <div style="display:flex; gap:12px;">
                        <a href="https://www.facebook.com/MiceHospitality16" target="_blank" style="background:#F47E27; border-radius:50%; width:42px; height:42px; display:flex; align-items:center; justify-content:center; color:#fff;"><i class="fab fa-facebook-f"></i></a>
                        <a href="https://www.instagram.com/micehospitalityservices/" target="_blank" style="background:#F47E27; border-radius:50%; width:42px; height:42px; display:flex; align-items:center; justify-content:center; color:#fff;"><i class="fab fa-instagram"></i></a>
                        <a href="https://www.linkedin.com/company/micehospitalityservices/" target="_blank" style="background:#F47E27; border-radius:50%; width:42px; height:42px; display:flex; align-items:center; justify-content:center; color:#fff;"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-md-7 mb-4">
                <div style="border:1px solid #eee; border-radius:16px; padding:30px; box-shadow:0 4px 20px rgba(0,0,0,0.08);">
                    <h3 style="margin-bottom:20px;">Get In Touch</h3>
                    <div class="form-group">
                        <input type="text" id="cq_name" class="form-control" placeholder="Name *">
                    </div>
                    <div class="form-group">
                        <input type="text" id="cq_company" class="form-control" placeholder="Company">
                    </div>
                    <div class="form-group">
                        <input type="email" id="cq_email" class="form-control" placeholder="Email *">
                    </div>
                    <div class="form-group">
                        <input type="text" id="cq_phone" class="form-control" placeholder="Phone *">
                    </div>
                    <div class="form-group">
                        <select id="cq_event" class="form-control">
                            <option value="">Select Event Type *</option>
                            <option value="Residential Conference">Residential Conference</option>
                            <option value="International Travel">International Travel</option>
                            <option value="Family Vacation">Family Vacation</option>
                            <option value="Day Outing">Day Outing</option>
                            <option value="Day Conference">Day Conference</option>
                            <option value="Wedding Planning">Wedding Planning</option>
                            <option value="Social Events">Social Events</option>
                            <option value="Event Management">Event Management</option>
                            <option value="Corporate Gifting">Corporate Gifting</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label style="font-size:14px;">Start Date *</label>
                        <input type="date" id="cq_from" class="form-control" min="{{\Carbon\Carbon::now()->format('Y-m-d')}}">
                    </div>
                    <div class="form-group">
                        <label style="font-size:14px;">End Date</label>
                        <input type="date" id="cq_to" class="form-control" min="{{\Carbon\Carbon::now()->format('Y-m-d')}}">
                    </div>
                    <p id="cq_error" class="text-danger" style="display:none;"></p>
                    <button type="button" class="btn btn-submit" onclick="sendContactQuote()">Send on WhatsApp</button>
                </div>
            </div>
            <div class="col-md-12" style="margin-top:2rem;">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3887.9324419812233!2d77.6166363!3d12.976172799999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bae169b4fdc2fb1%3A0x42bfdc8626bd5497!2sMICE%20HOSPITALITY!5e0!3m2!1sen!2sin!4v1679388674945!5m2!1sen!2sin" style="border:0; height:400px; width:100%; border-radius:16px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>
</div>
<script>
function sendContactQuote() {
    var name = document.getElementById('cq_name').value.trim();
    var company = document.getElementById('cq_company').value.trim();
    var email = document.getElementById('cq_email').value.trim();
    var phone = document.getElementById('cq_phone').value.trim();
    var event = document.getElementById('cq_event').value;
    var from = document.getElementById('cq_from').value;
    var to = document.getElementById('cq_to').value;
    var err = document.getElementById('cq_error');
    if (!name || !email || !phone || !event || !from) {
        err.textContent = 'Please fill Name, Email, Phone, Event Type and Start Date.';
        err.style.display = 'block';
        return;
    }
    err.style.display = 'none';
    var msg = "New Quote Request%0A" +
        "Name: " + encodeURIComponent(name) + "%0A" +
        "Company: " + encodeURIComponent(company || '-') + "%0A" +
        "Email: " + encodeURIComponent(email) + "%0A" +
        "Phone: " + encodeURIComponent(phone) + "%0A" +
        "Event Type: " + encodeURIComponent(event) + "%0A" +
        "Dates: " + from + " to " + (to || from);
    window.open("https://wa.me/919611804368?text=" + msg, "_blank");
}
</script>
@include('website.blocks.contact-detail-block')

@endsection
