// Mobile Navigation
const hamburger = document.getElementById("hamburger");
const navLinks = document.getElementById("navLinks");

hamburger.addEventListener("click", () => {
    navLinks.classList.toggle("active");
    hamburger.innerHTML = navLinks.classList.contains("active")
        ? '<i class="fas fa-times"></i>'
        : '<i class="fas fa-bars"></i>';
});

// Close mobile menu when clicking a link
document.querySelectorAll(".nav-links a").forEach((link) => {
    link.addEventListener("click", () => {
        navLinks.classList.remove("active");
        hamburger.innerHTML = '<i class="fas fa-bars"></i>';
    });
});

// Back to top button
const backToTopBtn = document.getElementById("backToTop");

window.addEventListener("scroll", () => {
    if (window.pageYOffset > 300) {
        backToTopBtn.classList.add("show");
    } else {
        backToTopBtn.classList.remove("show");
    }
});

backToTopBtn.addEventListener("click", () => {
    window.scrollTo({
        top: 0,
        behavior: "smooth",
    });
});

// Smooth scrolling for anchor links
document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
    anchor.addEventListener("click", function (e) {
        e.preventDefault();
        const target = document.querySelector(this.getAttribute("href"));
        if (target) {
            window.scrollTo({
                top: target.offsetTop - 70,
                behavior: "smooth",
            });
        }
    });
});

// Form submission
const contactForm = document.getElementById("contactForm");
contactForm.addEventListener("submit", (e) => {
    e.preventDefault();
    alert("Thank you for your message! I will get back to you soon.");
    contactForm.reset();
});

// Skills Slider
const sliderContainer = document.getElementById("sliderContainer");
const sliderItems = document.querySelectorAll(".slider-item");
const prevBtn = document.querySelector(".prev-btn");
const nextBtn = document.querySelector(".next-btn");
let currentSlide = 0;
const slideCount = sliderItems.length;

function goToSlide(slideIndex) {
    if (slideIndex < 0) slideIndex = slideCount - 1;
    if (slideIndex >= slideCount) slideIndex = 0;

    sliderContainer.style.transform = `translateX(-${slideIndex * 100}%)`;
    currentSlide = slideIndex;
}

prevBtn.addEventListener("click", () => {
    goToSlide(currentSlide - 1);
});

nextBtn.addEventListener("click", () => {
    goToSlide(currentSlide + 1);
});

// Projects Overlay
const viewAllBtn = document.getElementById("viewAllBtn");
const projectsOverlay = document.getElementById("projectsOverlay");
const closeOverlay = document.getElementById("closeOverlay");

viewAllBtn.addEventListener("click", () => {
    projectsOverlay.classList.add("show");
    document.body.style.overflow = "hidden";
});

closeOverlay.addEventListener("click", () => {
    projectsOverlay.classList.remove("show");
    document.body.style.overflow = "";
});

// Close overlay when clicking outside content
projectsOverlay.addEventListener("click", (e) => {
    if (e.target === projectsOverlay) {
        projectsOverlay.classList.remove("show");
        document.body.style.overflow = "";
    }
});

// Email JS
function sendEmail(event) {
    event.preventDefault();

    // Validate form fields
    const name = document.getElementById("name").value.trim();
    const email = document.getElementById("email").value.trim();
    const message = document.getElementById("message").value.trim();
    const securityCheckbox = document.getElementById("securityCheckbox");

    // Regular expression for validating email format
    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    // Initialize an empty error message
    let errorMessage = "";

    // Check each field and append specific error messages
    if (!name) {
        errorMessage = "Name cannot be empty.";
    } else if (!email) {
        errorMessage = "Email cannot be empty.";
    } else if (!emailPattern.test(email)) {
        errorMessage =
            "Please enter a valid email address (e.g., test@gmail.com).";
    } else if (!message) {
        errorMessage = "Message cannot be empty.";
    } else if (!securityCheckbox.checked) {
        errorMessage = "You must agree to the terms and conditions.";
    }

    // If there's an error, display it and stop the function
    if (errorMessage) {
        Swal.fire({
            icon: "error",
            title: "Oops...",
            text: errorMessage,
        });
        return;
    }

    // Initialize EmailJS
    emailjs.init("HkBkINhJGWtvYu4ST");

    const serviceID = "service_9hdtfbk";
    const templateID = "template_9oqw406";

    const templateParams = {
        name: name,
        email: email,
        message: message,
    };

    emailjs
        .send(serviceID, templateID, templateParams)
        .then(() => {
            // Display a success message using SweetAlert2
            Swal.fire({
                icon: "success",
                title: "Email Sent!",
                text: "Your message has been sent successfully.",
            }).then(() => {
                // Clear the form fields without reloading the page
                document.getElementById("contactForm").reset();
            });
        })
        .catch((err) => {
            console.error("Error sending email:", err);
            // Display an error message using SweetAlert2
            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "Error sending email. Please try again later.",
            });
        });
}
