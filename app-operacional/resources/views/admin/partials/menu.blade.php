@php
    $paginaAtual = $paginaAtual ?? 'dashboard';

    $menu = [
        [
            'titulo' => 'Visão geral',
            'itens' => [
                ['chave' => 'dashboard', 'titulo' => 'Dashboard inicial', 'icone' => 'ri-dashboard-line', 'href' => route('orion.dashboard')],
                ['chave' => 'dashboard-interno', 'titulo' => 'Dashboard interno', 'icone' => 'ri-line-chart-line', 'href' => route('orion.dashboard.interno')],
            ],
        ],
        [
            'titulo' => 'Operação',
            'itens' => [
                ['chave' => 'ocorrencias', 'titulo' => 'Ocorrências', 'icone' => 'ri-alarm-warning-line', 'href' => route('orion.ocorrencias.index')],
                ['chave' => 'produtividade', 'titulo' => 'Produtividade', 'icone' => 'ri-bar-chart-grouped-line', 'href' => route('orion.produtividade.index')],
            ],
        ],
        [
            'titulo' => 'Cadastros',
            'itens' => [
                ['chave' => 'unidades', 'titulo' => 'Unidades e companhias', 'icone' => 'ri-community-line', 'href' => route('orion.unidades.index')],
                ['chave' => 'tipificacoes', 'titulo' => 'Tipificações', 'icone' => 'ri-booklet-line', 'href' => route('orion.tipificacoes.index')],
                ['chave' => 'usuarios', 'titulo' => 'Usuários', 'icone' => 'ri-user-settings-line', 'href' => route('orion.usuarios.index')],
            ],
        ],
        [
            'titulo' => 'Governança',
            'itens' => [
                ['chave' => 'auditoria', 'titulo' => 'Auditoria', 'icone' => 'ri-file-search-line', 'href' => route('orion.auditoria.index')],
                ['chave' => 'seguranca', 'titulo' => 'Segurança e acesso', 'icone' => 'ri-shield-keyhole-line', 'href' => route('orion.seguranca.index')],
                ['chave' => 'configuracoes', 'titulo' => 'Configurações', 'icone' => 'ri-settings-3-line', 'href' => route('orion.configuracoes.index')],
            ],
        ],
    ];
@endphp

<aside class="orion-sidebar" data-orion-sidebar>
    <div class="orion-sidebar__brand">
        <div class="orion-brand-mark">
            <img src="{{ asset('assets/img/logo-orion-v1.png') }}" alt="Logo ORION" class="orion-brand-logo">
        </div>
        <div class="orion-brand-copy">
            <strong>ORION</strong>
            <span>Operações, Registro e Inteligência Operacional em Rede</span>
        </div>
    </div>

    <div class="orion-sidebar__nav">
        @foreach ($menu as $grupo)
            <div class="orion-nav-section">
                <div class="orion-nav-section__title">{{ $grupo['titulo'] }}</div>
                @foreach ($grupo['itens'] as $item)
                    <a href="{{ $item['href'] }}" class="orion-nav-link {{ $paginaAtual === $item['chave'] ? 'is-active' : '' }}">
                        <span class="orion-nav-link__icon"><i class="{{ $item['icone'] }}"></i></span>
                        <span>{{ $item['titulo'] }}</span>
                    </a>
                @endforeach
            </div>
        @endforeach
    </div>
</aside>
