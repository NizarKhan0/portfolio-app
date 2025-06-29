<div class="container hero-content">
    @php
        use App\Models\Profile;

        $profile = \App\Models\Profile::first();
        $phone = $profile->phone ?? null;
        $cleanPhone = $phone ? preg_replace('/[^0-9]/', '', $phone) : null;
        $whatsappLink = $cleanPhone ? 'https://wa.me/6' . $cleanPhone : null;
     @endphp
    <div class="hero-image">
        <img src="{{ isset($profile) && $profile->image ? asset('storage/' . $profile->image) : asset('default.jpg') }}"
            alt="{{ $profile->name ?? '' }}">
    </div>
    <div class="hero-text">
        <h1>
            Hi, I'm <span>{{ $profile->name ?? '' }}</span><br>
            {{ $profile->job_title ?? '' }}
        </h1>
        <p>{{ $profile->description ?? '' }}</p>

        <div class="btn-container">
            <a href="#projects" class="btn">View Projects</a>
            @if ($whatsappLink)
                <a href="{{ $whatsappLink }}" class="btn btn-outline" target="_blank">Contact Me</a>
            @else
                <a class="btn btn-outline disabled" style="pointer-events: none; opacity: 0.5;">No Contact</a>
            @endif
        </div>
    </div>
</div>