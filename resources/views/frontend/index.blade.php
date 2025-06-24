<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DevNizar - Portfolio</title>
    <link rel="icon" href="https://img.icons8.com/?size=100&id=BUyCA1Ge5p9C&format=png&color=000000" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">/
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Orbitron:wght@400;500;600&display=swap"
        rel="stylesheet">
    <style>
        :root {
            --bg-primary: #0f0c1d;
            --bg-secondary: #1a1630;
            --accent-primary: #8a2be2;
            --accent-secondary: #6a1b9a;
            --text-primary: #f0e6ff;
            --text-secondary: #c2b5d3;
            --card-bg: #1e1838;
            --transition: all 0.4s ease;
            --shadow: 0 4px 15px rgba(138, 43, 226, 0.25);
            --nav-height: 70px;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--bg-primary);
            color: var(--text-primary);
            line-height: 1.6;
            overflow-x: hidden;
            position: relative;
            background-image:
                radial-gradient(circle at 10% 20%, rgba(138, 43, 226, 0.1) 0%, rgba(26, 22, 48, 0) 30%),
                radial-gradient(circle at 90% 80%, rgba(106, 27, 154, 0.1) 0%, rgba(26, 22, 48, 0) 30%);
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        /* Header & Navigation */
        header {
            background-color: rgba(15, 12, 29, 0.95);
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 1000;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
            height: var(--nav-height);
        }

        .nav-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            height: 100%;
        }

        .logo {
            font-family: 'Orbitron', sans-serif;
            font-size: 1.5rem;
            font-weight: 600;
            color: var(--text-primary);
            text-decoration: none;
            display: flex;
            align-items: center;
        }

        .logo span {
            color: var(--accent-primary);
        }

        .nav-links {
            display: flex;
            list-style: none;
        }

        .nav-links li {
            margin-left: 25px;
        }

        .nav-links a {
            color: var(--text-primary);
            text-decoration: none;
            font-size: 1rem;
            font-weight: 500;
            transition: var(--transition);
            position: relative;
        }

        .nav-links a:hover {
            color: var(--accent-primary);
        }

        .nav-links a::after {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 0;
            width: 0;
            height: 2px;
            background: var(--accent-primary);
            transition: var(--transition);
        }

        .nav-links a:hover::after {
            width: 100%;
        }

        .hamburger {
            display: none;
            cursor: pointer;
            background: none;
            border: none;
            color: var(--text-primary);
            font-size: 1.6rem;
        }

        /* Back to top button */
        .back-to-top {
            position: fixed;
            bottom: 25px;
            right: 25px;
            width: 45px;
            height: 45px;
            background: var(--accent-primary);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.1rem;
            cursor: pointer;
            opacity: 0;
            visibility: hidden;
            transition: var(--transition);
            box-shadow: var(--shadow);
            z-index: 99;
        }

        .back-to-top.show {
            opacity: 1;
            visibility: visible;
        }

        .back-to-top:hover {
            background: var(--accent-secondary);
            transform: translateY(-5px);
        }

        /* Section common styles */
        section {
            padding: 80px 0;
        }

        .section-title {
            text-align: center;
            margin-bottom: 50px;
            position: relative;
        }

        .section-title h2 {
            font-size: 2rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 15px;
            display: inline-block;
        }

        .section-title h2::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 70px;
            height: 4px;
            background: var(--accent-primary);
            border-radius: 2px;
        }

        /* Hero Section */
        .hero {
            min-height: 90vh;
            display: flex;
            align-items: center;
            padding-top: var(--nav-height);
            position: relative;
        }

        .hero-content {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 40px;
        }

        .hero-text {
            flex: 1;
        }

        .hero-image {
            flex: 1;
            display: flex;
            justify-content: center;
        }

        .hero-image img {
            max-width: 70%;
            border-radius: 20px;
            box-shadow: var(--shadow);
            border: 3px solid var(--accent-primary);
            transition: transform 0.5s ease;
        }

        .hero-image img:hover {
            transform: scale(1.03);
        }

        .hero h1 {
            font-size: 2.3rem;
            font-weight: 700;
            margin-bottom: 20px;
            line-height: 1.3;
        }

        .hero h1 span {
            color: var(--accent-primary);
        }

        .hero p {
            font-size: 1.1rem;
            max-width: 600px;
            margin-bottom: 25px;
            color: var(--text-secondary);
        }

        .btn {
            display: inline-block;
            background: var(--accent-primary);
            color: white;
            padding: 10px 25px;
            border-radius: 30px;
            text-decoration: none;
            font-weight: 500;
            transition: var(--transition);
            border: 2px solid transparent;
            cursor: pointer;
            font-size: 1rem;
        }

        .btn:hover {
            background: transparent;
            border-color: var(--accent-primary);
            transform: translateY(-3px);
            box-shadow: var(--shadow);
        }

        .btn-outline {
            background: transparent;
            border: 2px solid var(--accent-primary);
            margin-left: 15px;
        }

        .btn-outline:hover {
            background: var(--accent-primary);
        }

        /* Work Experience Section */
        .timeline {
            position: relative;
            max-width: 1000px;
            margin: 0 auto;
        }

        .timeline::after {
            content: '';
            position: absolute;
            width: 4px;
            background: var(--accent-primary);
            top: 0;
            bottom: 0;
            left: 50%;
            margin-left: -2px;
            border-radius: 2px;
        }

        .timeline-item {
            padding: 10px 40px;
            position: relative;
            width: 50%;
            box-sizing: border-box;
        }

        .timeline-item::after {
            content: '';
            position: absolute;
            width: 20px;
            height: 20px;
            background: var(--accent-primary);
            border: 4px solid var(--bg-primary);
            top: 25px;
            border-radius: 50%;
            z-index: 1;
        }

        .timeline-item.left {
            left: 0;
        }

        .timeline-item.left::after {
            right: -12px;
        }

        .timeline-item.right {
            left: 50%;
        }

        .timeline-item.right::after {
            left: -8px;
        }

        .timeline-content {
            padding: 20px;
            background: var(--card-bg);
            border-radius: 15px;
            box-shadow: var(--shadow);
            transition: var(--transition);
        }

        .timeline-content:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(138, 43, 226, 0.3);
        }

        .timeline-content h3 {
            color: var(--accent-primary);
            margin-bottom: 10px;
        }

        .timeline-content .date {
            color: var(--text-secondary);
            font-size: 0.9rem;
            margin-bottom: 10px;
            display: flex;
            align-items: center;
        }

        .timeline-content .date i {
            margin-right: 8px;
        }

        .timeline-content p {
            color: var(--text-secondary);
            font-size: 0.95rem;
        }

        /* Skills Section */
        .skills-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 25px;
        }

        .skill-category {
            background: var(--card-bg);
            border-radius: 15px;
            padding: 25px;
            box-shadow: var(--shadow);
            transition: var(--transition);
        }

        .skill-category:hover {
            transform: translateY(-8px);
            box-shadow: 0 8px 25px rgba(138, 43, 226, 0.3);
        }

        .skill-category h3 {
            font-size: 1.3rem;
            margin-bottom: 15px;
            color: var(--accent-primary);
            display: flex;
            align-items: center;
        }

        .skill-category h3 i {
            margin-right: 10px;
        }

        .skill-item {
            margin-bottom: 12px;
        }

        .skill-header {
            display: flex;
            justify-content: space-between;
            margin-bottom: 5px;
            font-size: 0.95rem;
        }

        .skill-bar {
            height: 8px;
            background: var(--bg-secondary);
            border-radius: 5px;
            overflow: hidden;
        }

        .skill-progress {
            height: 100%;
            background: var(--accent-primary);
            border-radius: 5px;
            position: relative;
        }

        .skill-progress::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            animation: progress-glow 2s infinite;
        }

        @keyframes progress-glow {
            0% {
                transform: translateX(-100%);
            }

            100% {
                transform: translateX(100%);
            }
        }

        /* Skills Slider */
        .skills-slider {
            display: none;
            position: relative;
            max-width: 100%;
            overflow: hidden;
            margin: 0 auto;
        }

        .slider-container {
            display: flex;
            transition: transform 0.5s ease;
        }

        .slider-item {
            min-width: 100%;
            padding: 0 15px;
            box-sizing: border-box;
        }

        .slider-nav {
            display: flex;
            justify-content: center;
            margin-top: 20px;
            gap: 15px;
        }

        .slider-btn {
            background: var(--accent-primary);
            color: white;
            border: none;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
            transition: var(--transition);
        }

        .slider-btn:hover {
            background: var(--accent-secondary);
        }

        /* Projects Section */
        .projects-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
            gap: 25px;
        }

        .project-card {
            background: var(--card-bg);
            border-radius: 15px;
            overflow: hidden;
            box-shadow: var(--shadow);
            transition: var(--transition);
        }

        .project-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 12px 25px rgba(138, 43, 226, 0.3);
        }

        .project-image {
            height: 200px;
            overflow: hidden;
        }

        .project-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: var(--transition);
        }

        .project-card:hover .project-image img {
            transform: scale(1.05);
        }

        .project-content {
            padding: 20px;
        }

        .project-content h3 {
            font-size: 1.3rem;
            margin-bottom: 10px;
            color: var(--accent-primary);
        }

        .project-content p {
            color: var(--text-secondary);
            margin-bottom: 15px;
            font-size: 0.95rem;
        }

        .tech-stack {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            margin-bottom: 15px;
        }

        .tech-item {
            background: rgba(138, 43, 226, 0.15);
            color: var(--accent-primary);
            padding: 4px 10px;
            border-radius: 20px;
            font-size: 0.85rem;
        }

        .project-links {
            display: flex;
            gap: 12px;
        }

        .project-links a {
            color: var(--text-primary);
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 5px;
            transition: var(--transition);
            font-size: 0.95rem;
        }

        .project-links a:hover {
            color: var(--accent-primary);
        }

        .view-all-btn {
            text-align: center;
            margin-top: 40px;
        }

        /* Projects Overlay */
        .projects-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(15, 12, 29, 0.98);
            z-index: 2000;
            overflow-y: auto;
            display: none;
            opacity: 0;
            transition: opacity 0.5s ease;
        }

        .projects-overlay.show {
            display: block;
            opacity: 1;
        }

        .overlay-content {
            max-width: 1200px;
            margin: 80px auto;
            padding: 20px;
        }

        .overlay-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 40px;
        }

        .close-overlay {
            background: var(--accent-primary);
            color: white;
            border: none;
            width: 45px;
            height: 45px;
            border-radius: 50%;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.3rem;
            transition: var(--transition);
        }

        .close-overlay:hover {
            background: var(--accent-secondary);
            transform: rotate(90deg);
        }

        .overlay-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
            gap: 30px;
        }

        /* Contact Section */
        .contact-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 40px;
        }

        .contact-info {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .contact-item {
            display: flex;
            align-items: flex-start;
            gap: 15px;
        }

        .contact-icon {
            width: 45px;
            height: 45px;
            background: rgba(138, 43, 226, 0.15);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--accent-primary);
            font-size: 1.1rem;
        }

        .contact-text h4 {
            font-size: 1.1rem;
            margin-bottom: 5px;
        }

        .contact-text p,
        .contact-text a {
            color: var(--text-secondary);
            text-decoration: none;
            transition: var(--transition);
            font-size: 0.95rem;
        }

        .contact-text a:hover {
            color: var(--accent-primary);
        }

        .contact-form .form-group {
            margin-bottom: 15px;
        }

        .contact-form input,
        .contact-form textarea {
            width: 100%;
            padding: 12px;
            background: var(--card-bg);
            border: 1px solid rgba(138, 43, 226, 0.3);
            border-radius: 8px;
            color: var(--text-primary);
            font-family: 'Poppins', sans-serif;
            font-size: 0.95rem;
            transition: var(--transition);
        }

        .contact-form input:focus,
        .contact-form textarea:focus {
            outline: none;
            border-color: var(--accent-primary);
            box-shadow: 0 0 0 2px rgba(138, 43, 226, 0.2);
        }

        .contact-form textarea {
            height: 140px;
            resize: vertical;
        }

        /* Footer */
        footer {
            background: var(--bg-secondary);
            padding: 30px 0 15px;
            text-align: center;
        }

        .social-links {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin-bottom: 25px;
        }

        .social-links a {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 45px;
            height: 45px;
            background: var(--card-bg);
            color: var(--text-primary);
            border-radius: 50%;
            font-size: 1.2rem;
            transition: var(--transition);
        }

        .social-links a:hover {
            background: var(--accent-primary);
            transform: translateY(-5px);
        }

        .copyright {
            color: var(--text-secondary);
            font-size: 0.85rem;
        }

        /* Responsive Design */
        @media (max-width: 1200px) {
            .timeline::after {
                left: 31px;
            }

            .timeline-item {
                width: 100%;
                padding-left: 70px;
                padding-right: 25px;
            }

            .timeline-item.right {
                left: 0;
            }

            .timeline-item.left::after,
            .timeline-item.right::after {
                left: 21px;
            }
        }

        @media (max-width: 992px) {
            .hero h1 {
                font-size: 2.1rem;
            }

            .section-title h2 {
                font-size: 1.8rem;
            }

            .hero-image {
                flex: 0 0 50%;
            }

            .hero-text {
                flex: 0 0 50%;
            }

            .hero-image img {
                max-width: 80%;
            }

            .skills-container {
                display: none;
            }

            .skills-slider {
                display: block;
            }
        }

        @media (max-width: 750px) {
            .hero-content {
                flex-direction: column;
                text-align: center;
                gap: 30px;
            }

            .hero-text {
                margin-top: 0;
                order: 2;
            }

            .hero-image {
                order: 1;
            }

            .hero p {
                margin: 0 auto 25px;
            }

            .nav-links {
                position: fixed;
                top: var(--nav-height);
                right: -100%;
                width: 70%;
                height: calc(100vh - var(--nav-height));
                background: var(--bg-secondary);
                flex-direction: column;
                align-items: center;
                padding-top: 40px;
                transition: var(--transition);
                box-shadow: -5px 0 15px rgba(0, 0, 0, 0.3);
            }

            .nav-links.active {
                right: 0;
            }

            .nav-links li {
                margin: 15px 0;
            }

            .hamburger {
                display: block;
            }

            .section-title h2 {
                font-size: 1.7rem;
            }

            .hero-image img {
                max-width: 60%;
            }

            .btn-container {
                justify-content: center;
            }
        }

        @media (max-width: 576px) {
            .hero h1 {
                font-size: 1.9rem;
            }

            .btn-container {
                display: flex;
                flex-direction: column;
                gap: 12px;
            }

            .btn-outline {
                margin-left: 0;
            }

            .projects-grid {
                grid-template-columns: 1fr;
            }

            .section-title h2 {
                font-size: 1.6rem;
            }

            .hero {
                min-height: 85vh;
            }

            section {
                padding: 60px 0;
            }

            .hero-image img {
                max-width: 80%;
            }
        }

        .btn-container {
            display: flex;
            flex-wrap: wrap;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .hero-text h1,
        .hero-text p,
        .btn-container {
            animation: fadeInUp 0.8s ease-out forwards;
        }

        .hero-text h1 {
            animation-delay: 0.1s;
        }

        .hero-text p {
            animation-delay: 0.3s;
        }

        .btn-container {
            animation-delay: 0.5s;
        }
    </style>
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

    <script>
        // Mobile Navigation
        const hamburger = document.getElementById('hamburger');
        const navLinks = document.getElementById('navLinks');

        hamburger.addEventListener('click', () => {
            navLinks.classList.toggle('active');
            hamburger.innerHTML = navLinks.classList.contains('active') ?
                '<i class="fas fa-times"></i>' :
                '<i class="fas fa-bars"></i>';
        });

        // Close mobile menu when clicking a link
        document.querySelectorAll('.nav-links a').forEach(link => {
            link.addEventListener('click', () => {
                navLinks.classList.remove('active');
                hamburger.innerHTML = '<i class="fas fa-bars"></i>';
            });
        });

        // Back to top button
        const backToTopBtn = document.getElementById('backToTop');

        window.addEventListener('scroll', () => {
            if (window.pageYOffset > 300) {
                backToTopBtn.classList.add('show');
            } else {
                backToTopBtn.classList.remove('show');
            }
        });

        backToTopBtn.addEventListener('click', () => {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });

        // Smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    window.scrollTo({
                        top: target.offsetTop - 70,
                        behavior: 'smooth'
                    });
                }
            });
        });

        // Form submission
        const contactForm = document.getElementById('contactForm');
        contactForm.addEventListener('submit', (e) => {
            e.preventDefault();
            alert('Thank you for your message! I will get back to you soon.');
            contactForm.reset();
        });

        // Skills Slider
        const sliderContainer = document.getElementById('sliderContainer');
        const sliderItems = document.querySelectorAll('.slider-item');
        const prevBtn = document.querySelector('.prev-btn');
        const nextBtn = document.querySelector('.next-btn');
        let currentSlide = 0;
        const slideCount = sliderItems.length;

        function goToSlide(slideIndex) {
            if (slideIndex < 0) slideIndex = slideCount - 1;
            if (slideIndex >= slideCount) slideIndex = 0;

            sliderContainer.style.transform = `translateX(-${slideIndex * 100}%)`;
            currentSlide = slideIndex;
        }

        prevBtn.addEventListener('click', () => {
            goToSlide(currentSlide - 1);
        });

        nextBtn.addEventListener('click', () => {
            goToSlide(currentSlide + 1);
        });

        // Projects Overlay
        const viewAllBtn = document.getElementById('viewAllBtn');
        const projectsOverlay = document.getElementById('projectsOverlay');
        const closeOverlay = document.getElementById('closeOverlay');

        viewAllBtn.addEventListener('click', () => {
            projectsOverlay.classList.add('show');
            document.body.style.overflow = 'hidden';
        });

        closeOverlay.addEventListener('click', () => {
            projectsOverlay.classList.remove('show');
            document.body.style.overflow = '';
        });

        // Close overlay when clicking outside content
        projectsOverlay.addEventListener('click', (e) => {
            if (e.target === projectsOverlay) {
                projectsOverlay.classList.remove('show');
                document.body.style.overflow = '';
            }
        });
    </script>
</body>

</html>
