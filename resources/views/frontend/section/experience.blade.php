<div class="container">
    <div class="section-title">
        <h2>Work Experience</h2>
    </div>

    @if(!empty($experiences) && count($experiences) > 0)
        <div class="timeline">
            @foreach($experiences as $index => $exp)
                <div class="timeline-item {{ $index % 2 == 0 ? 'left' : 'right' }}">
                    <div class="timeline-content">
                        <h3>{{ $exp->job_title ?? '' }}</h3>
                        <h4 class="text">{{ $exp->company ?? '' }}</h4>
                        <h4 class="text">{{ $exp->location ?? '' }}</h4>
                        <div class="date">
                            <i class="far fa-calendar-alt"></i>
                            {{ $exp->start_date ? $exp->start_date->format('M Y') : '' }} -
                            {{ $exp->is_current ? 'Present' : ($exp->end_date ? $exp->end_date->format('M Y') : '') }}
                        </div>
                        <p>{{ $exp->description ?? ''}}</p>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <p style="text-align: center; color: #6c757d; padding: 40px 0; font-style: italic;">
            No work experience available.
        </p>

    @endif
</div>