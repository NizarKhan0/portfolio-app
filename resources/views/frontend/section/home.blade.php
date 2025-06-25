<div class="container hero-content">
    <div class="hero-image">
        <img src="{{ $profile && $profile->image ? asset('storage/' . $profile->image) : asset('storage/default.jpg') }}"
             alt="{{ $profile->name ?? 'N/A' }}">
    </div>
    <div class="hero-text">
        <h1>
            Hi, I'm <span>{{ $profile->name ?? 'N/A' }}</span><br>
            {{ $profile->job_title ?? 'N/A' }}
        </h1>
        <p>{{ $profile->description ?? 'N/A' }}</p>

        <div class="btn-container">
            <a href="#projects" class="btn">View Projects</a>

            @php
                $phone = $profile->phone ?? null;
                $cleanPhone = $phone ? preg_replace('/[^0-9]/', '', $phone) : null;
                $whatsappLink = $cleanPhone ? 'https://wa.me/' . $cleanPhone : null;
            @endphp

            @if ($whatsappLink)
                <a href="{{ $whatsappLink }}" class="btn btn-outline" target="_blank">Contact Me</a>
            @else
                <a class="btn btn-outline disabled" style="pointer-events: none; opacity: 0.5;">No Contact</a>
            @endif
        </div>
    </div>
</div>
