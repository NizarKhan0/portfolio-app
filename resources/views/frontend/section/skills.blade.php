<div class="container">
    <div class="section-title">
        <h2>Technical Skills</h2>
    </div>

    <div class="skills-container">
        @forelse ($skillCategories as $category)
            <div class="skill-category">
                <h3>
                    <i class="{{ $category->icon }}"></i>
                    {{ $category->name ?? 'N/A' }}
                </h3>
                @forelse($category->skills as $skill)
                    <div class="skill-item">
                        <div class="skill-header">
                            <span>{{ $skill->name ?? 'N/A' }}</span>
                            <span>{{ $skill->proficiency ?? '0' }}%</span>
                        </div>
                        <div class="skill-bar">
                            <div class="skill-progress" style="width: {{ $skill->proficiency ?? 0 }}%"></div>
                        </div>
                    </div>
                @empty
                    <p style="text-align: center; color: #6c757d; font-style: italic;">No skills in this category.</p>
                @endforelse
            </div>
        @empty
            <div style="width: 100%; text-align: center; padding: 40px 0; color: #6c757d; font-style: italic;">
                No skills available.
            </div>
        @endforelse
    </div>

    <!-- Mobile Skills Slider -->
    <div class="skills-slider">
        <div class="slider-container" id="sliderContainer">
            @forelse ($skillCategories as $category)
                <div class="slider-item">
                    <div class="skill-category">
                        <h3>
                            <i class="{{ $category->icon }}"></i>
                            {{ $category->name ?? 'N/A' }}
                        </h3>
                        @forelse($category->skills as $skill)
                            <div class="skill-item">
                                <div class="skill-header">
                                    <span>{{ $skill->name ?? 'N/A' }}</span>
                                    <span>{{ $skill->proficiency ?? '0' }}%</span>
                                </div>
                                <div class="skill-bar">
                                    <div class="skill-progress" style="width: {{ $skill->proficiency ?? 0 }}%"></div>
                                </div>
                            </div>
                        @empty
                            <p style="text-align: center; color: #6c757d; font-style: italic;">
                                No skills in this category.
                            </p>
                        @endforelse
                    </div>
                </div>
            @empty
                <p style="text-align: center; color: #6c757d; font-style: italic;">No skills available.</p>
            @endforelse
        </div>

        <div class="slider-nav">
            <button class="slider-btn prev-btn"><i class="fas fa-chevron-left"></i></button>
            <button class="slider-btn next-btn"><i class="fas fa-chevron-right"></i></button>
        </div>
    </div>
</div>
