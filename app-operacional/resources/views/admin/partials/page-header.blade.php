@php
    $breadcrumbs = $breadcrumbs ?? [['titulo' => 'App Operacional'], ['titulo' => trim($__env->yieldContent('page-title', 'Painel'))]];
    $subtituloCabecalho = trim($__env->yieldContent('page-subtitle', ''));
@endphp

<div class="orion-page-header">
    <div>
        <div class="orion-breadcrumbs">
            @foreach ($breadcrumbs as $breadcrumb)
                <span>{{ $breadcrumb['titulo'] }}</span>
            @endforeach
        </div>
        <h1>@yield('page-title', 'Painel operacional')</h1>
        @if ($subtituloCabecalho !== '')
            <p>{{ $subtituloCabecalho }}</p>
        @endif
    </div>

    @hasSection('page-actions')
        <div class="orion-page-actions">
            @yield('page-actions')
        </div>
    @endif
</div>
