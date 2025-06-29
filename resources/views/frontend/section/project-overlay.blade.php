<div class="overlay-content">
    <div class="overlay-header">
        <h2>All Projects</h2>
        <button class="close-overlay" id="closeOverlay">
            <i class="fas fa-times"></i>
        </button>
    </div>
    <div class="overlay-grid">
        <!-- All projects -->
        @forelse ($projects as $project)
            <div class="project-card">
                <div class="project-image">
                    <img src="{{ $project->image ? asset('storage/' . $project->image) : asset('default.jpg') }}"
                        alt="{{ $project->title ?? '' }}">
                </div>
                <div class="project-content">
                    <h3>{{ $project->title ?? '' }}</h3>
                    <p>{{ $project->description ?? '' }}</p>

                    <!-- Dynamic tech stack -->
                    <div class="tech-stack">
                        @if (!empty($project->skills) && count($project->skills) > 0)
                            @foreach ($project->skills as $skill)
                                <span class="tech-item">
                                    {{ $skill->name ?? '' }}
                                </span>
                            @endforeach
                        @else
                            <span class="tech-item">No Tech Stack</span>
                        @endif
                    </div>

                    <!-- Links -->
                    <div class="project-links">
                        @if (!empty($project->demo_link))
                            <a href="{{ $project->demo_link }}" target="_blank">
                                <i class="fas fa-external-link-alt"></i> Live Demo
                            </a>
                        @endif
                        @if (!empty($project->github_link))
                            <a href="{{ $project->github_link }}" target="_blank">
                                <i class="fab fa-github"></i> Source Code
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        @empty
            <p style="text-align: center; color: #6c757d; font-style: italic;">No projects available.</p>
        @endforelse
    </div>
</div>