<div class="container">
    <div class="section-title">
        <h2>Featured Projects</h2>
    </div>
    <div class="projects-grid">
        <!-- Initial 3 projects can custom condition from this blade view what
             we want the impoertant is have pass the variable from controller  -->
        @forelse ($projects->where('featured', 1)->take(3) as $project)
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

    <div class="view-all-btn">
        <button class="btn" id="viewAllBtn">View All Projects</button>
    </div>
</div>
