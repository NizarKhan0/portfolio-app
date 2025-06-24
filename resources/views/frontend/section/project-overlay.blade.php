<div class="overlay-content">
    <div class="overlay-header">
        <h2>All Projects</h2>
        <button class="close-overlay" id="closeOverlay">
            <i class="fas fa-times"></i>
        </button>
    </div>
    <div class="overlay-grid">
        <!-- All projects -->
        @foreach ($projects as $project)
            <div class="project-card">
                <div class="project-image">
                    <img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->title }}">
                </div>
                <div class="project-content">
                    <h3>{{ $project->title }}</h3>
                    <p>{{ $project->description }}</p>

                    <!-- Dynamic tech stack -->
                    <div class="tech-stack">
                        @foreach ($project->skills as $skill)
                            <span class="tech-item">
                                {{ $skill->name }}
                            </span>
                        @endforeach
                    </div>

                    <!-- Links -->
                    <div class="project-links">
                        @if ($project->demo_link)
                            <a href="{{ $project->demo_link }}" target="_blank"><i class="fas fa-external-link-alt"></i> Live
                                Demo</a>
                        @endif
                        @if ($project->github_link)
                            <a href="{{ $project->github_link }}" target="_blank"><i class="fab fa-github"></i> Source Code</a>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach

    </div>
</div>
