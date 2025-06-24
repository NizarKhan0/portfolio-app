<div class="container">
    <div class="section-title">
        <h2>Get In Touch</h2>
    </div>
    <div class="contact-container">
        <div class="contact-info">

            @foreach ($contacts as $contact)
                <div class="contact-item">
                    <div class="contact-icon">
                        <i class="fas fa-map-marker-alt"></i>
                    </div>
                    <div class="contact-text">
                        <h4>Location</h4>
                        <p>{{ $contact->location }}</p>
                    </div>
                </div>
                <div class="contact-item">
                    <div class="contact-icon">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <div class="contact-text">
                        <h4>Email</h4>
                        <a href="mailto:{{ $contact->email }}">{{ $contact->email }}</a>
                    </div>
                </div>
                <div class="contact-item">
                    <div class="contact-icon">
                        <i class="fas fa-phone-alt"></i>
                    </div>
                    <div class="contact-text">
                        <h4>Phone</h4>
                        <a href="https://wa.me/6{{ $contact->phone }}">{{ $contact->phone }}</a>
                    </div>
                </div>
            @endforeach

        </div>
        <div class="contact-form">
            <form id="contactForm">
                @csrf
                <div class="form-group">
                    <input type="text" id="name" placeholder="Your Name" autocomplete="off" required>
                </div>
                <div class="form-group">
                    <input type="email" id="email" placeholder="Your Email" autocomplete="off" required>
                </div>
                <div class="form-group">
                    <textarea placeholder="Your Message" id="message" autocomplete="off" required></textarea>
                </div>

                <div class="form-group" style="margin-top: 20px;">
                    <div id="formErrors" style="color: red; font-size: 14px; margin-bottom: 10px;"></div>

                    <button type="submit" onclick="sendEmail(event)"
                        style="width: 100%; background-color: #8a2be2; color: white; padding: 12px 20px; border: none; border-radius: 6px; cursor: pointer; font-size: 16px; transition: background-color 0.3s;">
                        Send Message
                    </button>

                    <div style="display: flex; align-items: center; margin-top: 15px;">
                        <input type="checkbox" id="securityCheckbox" required
                            style="margin-right: 8px; width: 16px; height: 16px; cursor: pointer;">
                        <label for="securityCheckbox" style="color: white; font-size: 14px; cursor: pointer;">
                            I agree to the terms and conditions
                        </label>
                    </div>
                </div>


            </form>
        </div>
    </div>
</div>
