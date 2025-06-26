<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nizar - Portfolio</title>
    {{--
    <link rel="icon" href="https://img.icons8.com/?size=100&id=BUyCA1Ge5p9C&format=png&color=000000"
        type="image/x-icon"> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Orbitron:wght@400;500;600&display=swap"
        rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/@emailjs/browser@4/dist/email.min.js"></script>
    <link rel="stylesheet" href="css/custom.css">
</head>

<body>
    <!-- Header & Navigation -->
    <header>
        @include('frontend.header')
    </header>

    <!-- Back to Top Button -->
    <div class="back-to-top" id="backToTop">
        <i class="fas fa-arrow-up"></i>
    </div>

    <!-- Hero Section -->
    <section class="hero" id="home">
        @include('frontend.section.home')
    </section>

    <!-- Work Experience Section -->
    <section class="experience" id="experience">
        @include('frontend.section.experience')
    </section>

    <!-- Skills Section -->
    <section class="skills" id="skills">
        @include('frontend.section.skills')
    </section>

    <!-- Projects Section -->
    <section class="projects" id="projects">
        @include('frontend.section.project')
    </section>

    <!-- Projects Overlay -->
    <div class="projects-overlay" id="projectsOverlay">
        @include('frontend.section.project-overlay')
    </div>

    <!-- Contact Section -->
    <section class="contact" id="contact">
        @include('frontend.section.contact')
    </section>

    <!-- Footer -->
    <footer>
        @include('frontend.footer')
    </footer>

    <script src="js/custom.js"></script>
</body>

</html>