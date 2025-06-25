<div class="container hero-content">
    @php
        use App\Models\Profile;

        $profile = \App\Models\Profile::first();
        $phone = $profile->phone ?? null;
        $cleanPhone = $phone ? preg_replace('/[^0-9]/', '', $phone) : null;
        $whatsappLink = $cleanPhone ? 'https://wa.me/6' . $cleanPhone : null;
     @endphp
    <div class="hero-text">
        <h1>
            Hi, I'm <span>{{ $profile->name ?? 'N/A' }}</span><br>
            {{ $profile->job_title ?? 'N/A' }}
        </h1>
        <p>{{ $profile->description ?? 'N/A' }}</p>

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
