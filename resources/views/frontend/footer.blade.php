<div class="social-links">
    @foreach($footers as $footer)
    <a href="{{ $footer->url }}" target="_blank">
        <i class="{{ $footer->icon }}"></i>
    </a>
    @endforeach
</div>
<p class="copyright">© {{ date('Y') }} Nizar Khan.</p>
