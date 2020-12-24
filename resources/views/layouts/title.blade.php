<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="pe-7s-{{ $icon }} icon-gradient bg-mean-fruit">
                </i>
            </div>
            <div>{{ $title }}
                <div class="page-title-subheading">{{ $description }}
                </div>
            </div>
        </div>
        @if (!empty($button))
        <div class="page-title-actions">
            <div class="d-inline-block dropdown">
                <a href="{{route($href)}}" class="btn-shadow btn btn-info">
                    <span class="btn-icon-wrapper pr-1 opacity-8">
                        <i class="fa fa-plus"></i>
                    </span>
                    {{ $button }}
                </a>
            </div>
        </div>
        @endif
    </div>
</div>
