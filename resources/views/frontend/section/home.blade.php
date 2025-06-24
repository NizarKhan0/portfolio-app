<div class="container hero-content">
    <div class="hero-image">
        {{-- <img src="{{ asset('storage/' . $profile->image) }}" alt="{{ $profile->name }}"> --}}
        <img src="{{ asset('storage/' . $profile->image) }}" alt="{{ $profile->name }}">
    </div>
    <div class="hero-text">
        <h1>Hi, I'm <span>{{ $profile->name }}</span><br>{{ $profile->job_title }}</h1>
        <p>{{ $profile->description }}</p>
        <div class="btn-container">
            <a href="#projects" class="btn">View Projects</a>
            <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $profile->phone) }}" class="btn btn-outline"
                target="_blank">
                Contact Me
            </a>
            {{-- <a href="#contact" class="btn btn-outline">Contact Me</a> --}}
        </div>
    </div>
</div>
