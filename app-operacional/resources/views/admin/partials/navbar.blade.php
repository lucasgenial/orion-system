@php
    $topbarTitulo = $topbarTitulo ?? trim($__env->yieldContent('page-title', 'Painel operacional'));
    $totalNotificacoes = $totalNotificacoes ?? 3;
    $usuarioPainel = $usuarioPainel ?? [
        'nome' => 'Cap. Helena Duarte',
        'email' => 'helena.duarte@orion.gov',
        'perfil' => 'Gestor Operacional',
        'unidade' => '2ª Companhia Integrada',
        'tipo_acesso' => 'Web interno',
    ];

    $iniciaisUsuario = collect(explode(' ', $usuarioPainel['nome']))
        ->filter()
        ->take(2)
        ->map(fn ($parte) => mb_strtoupper(mb_substr($parte, 0, 1)))
        ->implode('');
@endphp

<header class="orion-topbar">
    <button type="button" class="orion-topbar__button admin-mobile-toggle" data-sidebar-open aria-label="Abrir menu">
        <i class="ri-menu-line"></i>
    </button>

    <div class="orion-topbar__context">
        <div class="orion-topbar__kicker">App Operacional</div>
        <div class="orion-topbar__title">{{ $topbarTitulo }}</div>
    </div>

    @hasSection('topbar-filters')
        <div class="orion-page-actions">
            @yield('topbar-filters')
        </div>
    @endif

    <div class="orion-topbar__actions">
        <a href="{{ route('orion.minha-conta.notificacoes') }}" class="orion-topbar__button" aria-label="Notificações">
            <i class="ri-notification-3-line"></i>
            @if ($totalNotificacoes > 0)
                <span class="orion-topbar__badge">{{ $totalNotificacoes > 99 ? '99+' : $totalNotificacoes }}</span>
            @endif
        </a>
        <details class="admin-user-menu">
            <summary class="admin-user-chip admin-user-chip--button">
                <div class="admin-user-chip__meta">
                    <span>{{ $usuarioPainel['nome'] }}</span>
                    <small>{{ $usuarioPainel['unidade'] }} · {{ $usuarioPainel['tipo_acesso'] }}</small>
                </div>
                <span class="admin-user-avatar">{{ $iniciaisUsuario }}</span>
                <i class="ri-arrow-down-s-line"></i>
            </summary>
            <div class="admin-user-links admin-user-dropdown">
                <div class="admin-user-dropdown__header">
                    <strong>{{ $usuarioPainel['nome'] }}</strong>
                    <span>{{ $usuarioPainel['email'] }}</span>
                    <small>{{ $usuarioPainel['perfil'] }}</small>
                </div>
                <a href="{{ route('orion.minha-conta.perfil') }}"><i class="ri-user-line"></i> Meu perfil</a>
                <a href="{{ route('orion.minha-conta.senha') }}"><i class="ri-lock-password-line"></i> Senha</a>
                <a href="{{ route('orion.auditoria.index') }}"><i class="ri-file-search-line"></i> Auditoria</a>
                <form method="post" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="admin-link-button"><i class="ri-logout-box-r-line"></i> Sair</button>
                </form>
            </div>
        </details>
    </div>
</header>
