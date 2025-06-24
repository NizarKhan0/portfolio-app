<div class="container">
    <div class="section-title">
        <h2>Technical Skills</h2>
    </div>
    <div class="skills-container">
        @foreach ($skillsByCategory as $categoryName => $categoryData)
            <div class="skill-category">
                <h3>
                    <i class="{{ $categoryData['icon'] }}"></i>
                    {{ $categoryName }}
                </h3>
                @foreach ($categoryData['skills'] as $skill)
                    <div class="skill-item">
                        <div class="skill-header">
                            <span>{{ $skill->name }}</span>
                            <span>{{ $skill->proficiency }}%</span>
                        </div>
                        <div class="skill-bar">
                            <div class="skill-progress" style="width: {{ $skill->proficiency }}%"></div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endforeach
    </div>
    <!-- Mobile Skills Slider -->
    <div class="skills-slider">
        <div class="slider-container" id="sliderContainer">
            @foreach ($skillsByCategory as $categoryName => $categoryData)
                <div class="slider-item">
                    <div class="skill-category">
                        <h3>
                            <i class="{{ $categoryData['icon'] }}"></i>
                            {{ $categoryName }}
                        </h3>
                        @foreach ($categoryData['skills'] as $skill)
                            <div class="skill-item">
                                <div class="skill-header">
                                    <span>{{ $skill->name }}</span>
                                    <span>{{ $skill->proficiency }}%</span>
                                </div>
                                <div class="skill-bar">
                                    <div class="skill-progress" style="width: {{ $skill->proficiency }}%"></div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
        <div class="slider-nav">
            <button class="slider-btn prev-btn"><i class="fas fa-chevron-left"></i></button>
            <button class="slider-btn next-btn"><i class="fas fa-chevron-right"></i></button>
        </div>
    </div>
</div>
