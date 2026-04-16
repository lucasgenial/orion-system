<?php

declare(strict_types=1);

function carregarJson(string $arquivo): array
{
    $conteudo = file_get_contents(__DIR__ . '/../public/mocks/' . $arquivo);

    return $conteudo ? json_decode($conteudo, true, flags: JSON_THROW_ON_ERROR) : [];
}

function paginaUrl(string $pagina): string
{
    return '/?pagina=' . urlencode($pagina);
}

function renderBadge(string $texto, string $tipo = 'muted'): string
{
    return '<span class="admin-badge admin-badge--' . htmlspecialchars($tipo) . '">' . htmlspecialchars($texto) . '</span>';
}

function renderAcoes(): string
{
    return '<div class="admin-table-actions">'
        . '<a href="#" class="admin-btn admin-btn-secondary">Visualizar</a>'
        . '<a href="#" class="admin-btn admin-btn-muted">Editar</a>'
        . '</div>';
}

function h(?string $valor): string
{
    return htmlspecialchars((string) $valor, ENT_QUOTES, 'UTF-8');
}

function assetBuildPath(string $entrada, string $fallback): string
{
    $manifesto = __DIR__ . '/../public/build/manifest.json';

    if (!is_file($manifesto)) {
        return $fallback;
    }

    $conteudo = file_get_contents($manifesto);

    if ($conteudo === false) {
        return $fallback;
    }

    $manifest = json_decode($conteudo, true);

    if (!is_array($manifest) || !isset($manifest[$entrada]['file'])) {
        return $fallback;
    }

    return '/build/' . ltrim((string) $manifest[$entrada]['file'], '/');
}

$ocorrencias = carregarJson('ocorrencias.json');
$produtividade = carregarJson('produtividade.json');
$unidades = carregarJson('unidades.json');
$usuarios = carregarJson('usuarios.json');
$configuracoes = carregarJson('configuracoes.json');
$dashboard = carregarJson('dashboard.json');

$pagina = $_GET['pagina'] ?? 'dashboard';

$titulos = [
    'dashboard' => ['Dashboard inicial', 'Visão rápida da operação diária, produtividade resumida e atividade recente da unidade.'],
    'dashboard-interno' => ['Dashboard interno', 'Comparativos simples, desempenho recente e sinais administrativos para gestão operacional.'],
    'ocorrencias' => ['Listagem de ocorrências', 'Consulta administrativa com filtros, busca textual, status e ações por linha.'],
    'ocorrencias-form' => ['Cadastro de ocorrência', 'Formulário fluido em blocos para identificação, localização, envolvidos, providências e equipe responsável.'],
    'ocorrencias-show' => ['Visualização detalhada da ocorrência', 'Leitura consolidada do registro, histórico de movimentação, envolvidos, providências e anexos.'],
    'produtividade' => ['Listagem de produtividade', 'Consulta por período e unidade com resumo superior, tabela administrativa e exportação simulada.'],
    'produtividade-form' => ['Cadastro de produtividade policial', 'Lançamento de dados operacionais complementares por data, unidade e natureza de resultado.'],
    'unidades' => ['Gestão de unidades e companhias', 'Cadastro e acompanhamento de companhias, pelotões, setores e responsáveis operacionais.'],
    'unidades-form' => ['Cadastro de unidade', 'Configuração visual de companhia, pelotão, setor, município e responsável administrativo.'],
    'usuarios' => ['Gestão de usuários', 'Perfis administrativos, vínculo por unidade, permissões básicas e controle de acesso visual.'],
    'usuarios-form' => ['Cadastro de usuário', 'Configuração visual de nome, perfil, unidade, status e permissões básicas.'],
    'configuracoes' => ['Configurações do sistema', 'Parâmetros institucionais, identidade visual, naturezas de ocorrência, status e perfis de acesso.'],
    'login' => ['Entrar no App Operacional', 'Tela visual de autenticação para prototipação do fluxo inicial.'],
];

[$tituloPagina, $subtituloPagina] = $titulos[$pagina] ?? $titulos['dashboard'];

$menu = [
    'Visão geral' => [
        'dashboard' => 'Dashboard inicial',
        'dashboard-interno' => 'Dashboard interno',
    ],
    'Operação' => [
        'ocorrencias' => 'Ocorrências',
        'produtividade' => 'Produtividade',
    ],
    'Cadastros' => [
        'unidades' => 'Unidades e companhias',
        'usuarios' => 'Usuários',
    ],
    'Administração' => [
        'configuracoes' => 'Configurações',
        'login' => 'Login visual',
    ],
];
?><!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= h($tituloPagina) ?> | ORION Preview</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon@4.9.1/fonts/remixicon.css">
    <link rel="stylesheet" href="<?= h(assetBuildPath('resources/css/admin.css', '/resources/css/admin.css')) ?>">
</head>
<body>
    <?php if ($pagina === 'login'): ?>
        <div class="orion-auth" style="min-height: 100vh; display: grid; grid-template-columns: minmax(0, 1.1fr) minmax(360px, 520px); background: linear-gradient(135deg, #f7fafb 0%, #eef5f7 56%, #dce9ee 100%);">
            <section style="padding: 64px; display: grid; align-content: center; gap: 22px;">
                <div class="admin-kicker">ORION</div>
                <h1 style="margin: 0; font-family: var(--font-display); font-size: clamp(2.4rem, 4vw, 4.2rem); line-height: 1;">Operações, Registro e Inteligência Operacional em Rede</h1>
                <p style="margin: 0; max-width: 620px; color: var(--color-text-soft); font-size: 1.05rem;">Ambiente administrativo para cadastro de ocorrências, produtividade policial, controle de unidades e leitura operacional integrada.</p>
                <div class="dashboard-grid dashboard-grid--2">
                    <div class="admin-stat-card"><strong>Registro operacional</strong><div class="admin-stat-note">Padronização do fluxo de ocorrências e produtividade.</div></div>
                    <div class="admin-stat-card"><strong>Leitura estratégica</strong><div class="admin-stat-note">Indicadores claros para gestão e supervisão diária.</div></div>
                    <div class="admin-stat-card"><strong>Escalável</strong><div class="admin-stat-note">Preparado para múltiplas companhias e unidades.</div></div>
                    <div class="admin-stat-card"><strong>Institucional</strong><div class="admin-stat-note">Visual claro, técnico e compatível com ambiente público.</div></div>
                </div>
            </section>
            <aside style="display: grid; align-items: center; padding: 28px;">
                <div class="admin-card" style="padding: 28px;">
                    <div class="admin-kicker">Acesso ao sistema</div>
                    <h2 class="admin-section-title">Entrar no App Operacional</h2>
                    <p class="admin-section-copy">Tela visual de autenticação para prototipação do fluxo inicial.</p>
                    <div class="admin-field" style="margin-top: 22px;"><label class="admin-label">E-mail institucional</label><input class="admin-input" value="helena.duarte@orion.gov"></div>
                    <div class="admin-field" style="margin-top: 16px;"><label class="admin-label">Senha</label><input type="password" class="admin-input" value="123456"></div>
                    <div class="orion-page-actions" style="margin-top: 22px; width: 100%;"><button class="admin-btn admin-btn-primary" style="width: 100%;">Entrar</button></div>
                    <div class="orion-page-actions" style="margin-top: 12px;"><a class="admin-btn admin-btn-secondary" href="<?= h(paginaUrl('dashboard')) ?>">Abrir preview do painel</a></div>
                </div>
            </aside>
        </div>
        <script type="module" src="<?= h(assetBuildPath('resources/js/admin-layout.ts', '')) ?>"></script>
    </body>
</html><?php exit; endif; ?>

<div id="orion-sidebar-overlay"></div>
<div class="orion-shell">
    <aside class="orion-sidebar" data-orion-sidebar>
        <div class="orion-sidebar__brand">
            <div class="orion-brand-mark">OR</div>
            <div class="orion-brand-copy">
                <strong>ORION</strong>
                <span>Operações, Registro e Inteligência Operacional em Rede</span>
            </div>
        </div>
        <div class="orion-sidebar__nav">
            <?php foreach ($menu as $secao => $itens): ?>
                <div class="orion-nav-section">
                    <div class="orion-nav-section__title"><?= h($secao) ?></div>
                    <?php foreach ($itens as $chave => $rotulo): ?>
                        <a href="<?= h(paginaUrl($chave)) ?>" class="orion-nav-link <?= $pagina === $chave ? 'is-active' : '' ?>">
                            <span class="orion-nav-link__icon"><i class="ri-arrow-right-s-line"></i></span>
                            <span><?= h($rotulo) ?></span>
                        </a>
                    <?php endforeach; ?>
                </div>
            <?php endforeach; ?>
        </div>
    </aside>

    <div class="orion-main">
        <header class="orion-topbar">
            <button type="button" class="orion-topbar__button admin-mobile-toggle" data-sidebar-open aria-label="Abrir menu"><i class="ri-menu-line"></i></button>
            <div class="orion-topbar__context">
                <div class="orion-topbar__kicker">App Operacional</div>
                <div class="orion-topbar__title"><?= h($tituloPagina) ?></div>
            </div>
            <div class="orion-topbar__actions">
                <button type="button" class="orion-topbar__button"><i class="ri-notification-3-line"></i></button>
                <button type="button" class="orion-topbar__button"><i class="ri-command-line"></i></button>
                <div class="admin-user-chip"><span>Cap. Helena Duarte</span></div>
            </div>
        </header>

        <main class="orion-content">
            <div class="admin-flash-stack">
                <div class="admin-alert admin-alert--success">Preview local carregado com dados mockados do ORION.</div>
                <div class="admin-alert admin-alert--warning">Este ambiente usa PHP puro para visualização; a integração Laravel continua pendente.</div>
            </div>

            <div class="orion-page-header">
                <div>
                    <div class="orion-breadcrumbs"><span>App Operacional</span><span><?= h($tituloPagina) ?></span></div>
                    <h1><?= h($tituloPagina) ?></h1>
                    <p><?= h($subtituloPagina) ?></p>
                </div>
                <div class="orion-page-actions">
                    <a href="<?= h(paginaUrl('dashboard')) ?>" class="admin-btn admin-btn-secondary">Início</a>
                </div>
            </div>

            <?php if ($pagina === 'dashboard'): ?>
                <section class="dashboard-grid dashboard-grid--4">
                    <article class="admin-stat-card"><div class="admin-kicker">Ocorrências hoje</div><div class="admin-stat-value"><?= h((string) ($dashboard['total_ocorrencias_hoje'] ?? 0)) ?></div><div class="admin-stat-note"><?= h(($dashboard['alertas_operacionais'][1] ?? '')) ?></div></article>
                    <article class="admin-stat-card"><div class="admin-kicker">Armas apreendidas</div><div class="admin-stat-value"><?= h((string) ($dashboard['total_armas_apreendidas'] ?? 0)) ?></div><div class="admin-stat-note">Acumulado do período demonstrativo</div></article>
                    <article class="admin-stat-card"><div class="admin-kicker">Prisões</div><div class="admin-stat-value"><?= h((string) ($dashboard['total_prisoes'] ?? 0)) ?></div><div class="admin-stat-note">Produção consolidada no mock</div></article>
                    <article class="admin-stat-card"><div class="admin-kicker">Veículos recuperados</div><div class="admin-stat-value"><?= h((string) ($dashboard['total_veiculos_recuperados'] ?? 0)) ?></div><div class="admin-stat-note">Recorte interno demonstrativo</div></article>
                </section>
                <div class="admin-split" style="margin-top: 22px;">
                    <div>
                        <section class="admin-card">
                            <div class="admin-card-header"><div class="admin-kicker">Ocorrências recentes</div><h2 class="admin-section-title">Atividade das últimas horas</h2></div>
                            <div class="admin-card-body"><div class="timeline-list">
                                <?php foreach ($ocorrencias as $ocorrencia): ?>
                                    <div class="admin-list-row"><div><strong><?= h($ocorrencia['protocolo'] . ' · ' . $ocorrencia['natureza']) ?></strong><div class="admin-stat-note"><?= h($ocorrencia['municipio'] . ' · ' . $ocorrencia['bairro'] . ' · ' . $ocorrencia['status']) ?></div></div><span class="admin-kicker"><?= h($ocorrencia['hora']) ?></span></div>
                                <?php endforeach; ?>
                            </div></div>
                        </section>
                    </div>
                    <aside>
                        <section class="admin-card"><div class="admin-card-header"><div class="admin-kicker">Atalhos rápidos</div><h2 class="admin-section-title">Fluxos mais usados</h2></div><div class="admin-card-body"><div class="quick-links"><a href="<?= h(paginaUrl('ocorrencias-form')) ?>" class="quick-link"><strong>Registrar ocorrência</strong><i class="ri-arrow-right-line"></i></a><a href="<?= h(paginaUrl('produtividade-form')) ?>" class="quick-link"><strong>Lançar produtividade</strong><i class="ri-arrow-right-line"></i></a><a href="<?= h(paginaUrl('usuarios')) ?>" class="quick-link"><strong>Gerir usuários</strong><i class="ri-arrow-right-line"></i></a></div></div></section>
                    </aside>
                </div>
            <?php elseif ($pagina === 'dashboard-interno'): ?>
                <section class="dashboard-grid dashboard-grid--4">
                    <article class="admin-stat-card"><div class="admin-kicker">CVLI no mês</div><div class="admin-stat-value"><?= h((string) ($dashboard['total_cvli_mes'] ?? 0)) ?></div><div class="admin-stat-note">Indicador interno mockado</div></article>
                    <article class="admin-stat-card"><div class="admin-kicker">Roubos no mês</div><div class="admin-stat-value"><?= h((string) ($dashboard['total_roubos_mes'] ?? 0)) ?></div><div class="admin-stat-note">Leitura comparativa</div></article>
                    <article class="admin-stat-card"><div class="admin-kicker">Furtos no mês</div><div class="admin-stat-value"><?= h((string) ($dashboard['total_furtos_mes'] ?? 0)) ?></div><div class="admin-stat-note">Acumulado sintético</div></article>
                    <article class="admin-stat-card"><div class="admin-kicker">Ranking líder</div><div class="admin-stat-value"><?= h($dashboard['ranking_unidades'][0] ?? '-') ?></div><div class="admin-stat-note">Unidade com melhor resposta</div></article>
                </section>
                <div class="dashboard-grid dashboard-grid--2" style="margin-top: 22px;">
                    <section class="admin-card"><div class="admin-card-header"><div class="admin-kicker">Comparativo por unidade</div><h2 class="admin-section-title">Volume de ocorrências registradas</h2></div><div class="admin-card-body"><div class="dashboard-chart"><div class="dashboard-bar"><strong>2ª CIA</strong><div class="dashboard-bar__track"><div class="dashboard-bar__fill" data-bar-width="91"></div></div><span>128</span></div><div class="dashboard-bar"><strong>3ª CIA</strong><div class="dashboard-bar__track"><div class="dashboard-bar__fill" data-bar-width="73"></div></div><span>102</span></div><div class="dashboard-bar"><strong>PATRES</strong><div class="dashboard-bar__track"><div class="dashboard-bar__fill" data-bar-width="48"></div></div><span>67</span></div></div></div></section>
                    <section class="admin-card"><div class="admin-card-header"><div class="admin-kicker">Registros recentes</div><h2 class="admin-section-title">Linha de atividade</h2></div><div class="admin-card-body"><div class="timeline-list"><?php foreach (($dashboard['alertas_operacionais'] ?? []) as $indice => $alerta): ?><div class="timeline-item"><div><strong>Evento <?= h((string) ($indice + 1)) ?></strong><div class="admin-stat-note"><?= h($alerta) ?></div></div><span class="admin-kicker">agora</span></div><?php endforeach; ?></div></div></section>
                </div>
            <?php elseif ($pagina === 'ocorrencias'): ?>
                <section class="admin-card"><div class="admin-card-header"><div class="admin-kicker">Tabela geral</div><h2 class="admin-section-title">Ocorrências cadastradas</h2></div><div class="admin-table-shell"><table class="admin-table"><thead><tr><th>Protocolo</th><th>Tipo / natureza</th><th>Local</th><th>Unidade</th><th>Status</th><th>Prioridade</th><th>Ações</th></tr></thead><tbody><?php foreach ($ocorrencias as $ocorrencia): ?><tr><td><strong><?= h($ocorrencia['protocolo']) ?></strong><div class="admin-stat-note"><?= h($ocorrencia['data'] . ' · ' . $ocorrencia['hora']) ?></div></td><td><strong><?= h($ocorrencia['natureza']) ?></strong><div class="admin-stat-note"><?= h($ocorrencia['tipo']) ?></div></td><td><?= h($ocorrencia['bairro'] . ' · ' . $ocorrencia['local_referencia']) ?></td><td><?= h($ocorrencia['unidade'] . ' · ' . $ocorrencia['guarnicao']) ?></td><td><?= renderBadge($ocorrencia['status'], $ocorrencia['status'] === 'Concluída' ? 'success' : ($ocorrencia['status'] === 'Em atendimento' ? 'warning' : 'info')) ?></td><td><?= renderBadge($ocorrencia['prioridade'], $ocorrencia['prioridade'] === 'Alta' ? 'danger' : 'warning') ?></td><td><?= renderAcoes() ?></td></tr><?php endforeach; ?></tbody></table></div></section>
            <?php elseif ($pagina === 'ocorrencias-form'): ?>
                <div class="admin-split"><section class="admin-card"><div class="admin-card-header"><div class="admin-kicker">Registro principal</div><h2 class="admin-section-title">Dados da ocorrência</h2></div><div class="admin-card-body"><div class="admin-grid admin-grid--2"><div class="admin-field"><label class="admin-label">Protocolo</label><input class="admin-input" value="OR-2026-00492"></div><div class="admin-field"><label class="admin-label">Status</label><select class="admin-select"><option>Em atendimento</option><option>Concluída</option></select></div><div class="admin-field"><label class="admin-label">Tipo</label><input class="admin-input" value="Ocorrência policial"></div><div class="admin-field"><label class="admin-label">Natureza</label><input class="admin-input" value="Roubo"></div><div class="admin-field" style="grid-column: 1 / -1;"><label class="admin-label">Descrição</label><textarea class="admin-textarea">Registro visual de ocorrência para prototipação do fluxo operacional.</textarea></div></div></div><div class="admin-card-footer"><button class="admin-btn admin-btn-primary">Salvar ocorrência</button></div></section><aside><section class="admin-card"><div class="admin-card-header"><div class="admin-kicker">Anexos</div><h2 class="admin-section-title">Área visual mockada</h2></div><div class="admin-card-body"><div class="anexo-list"><div class="anexo-item"><div><strong>foto-local-01.jpg</strong><div class="admin-stat-note">Imagem · 2,1 MB</div></div><?= renderBadge('Mockado', 'info') ?></div><div class="anexo-item"><div><strong>boletim-preliminar.pdf</strong><div class="admin-stat-note">Documento · 340 KB</div></div><?= renderBadge('Mockado', 'info') ?></div></div></div></section></aside></div>
            <?php elseif ($pagina === 'ocorrencias-show'): $principal = $ocorrencias[0] ?? []; ?>
                <section class="admin-card"><div class="admin-card-header"><div class="admin-kicker"><?= h($principal['protocolo'] ?? 'OR-2026-00000') ?></div><h2 class="admin-section-title"><?= h(($principal['natureza'] ?? 'Ocorrência') . ' em ' . ($principal['bairro'] ?? 'Centro')) ?></h2><div class="orion-page-actions" style="margin-top: 12px;"><?= renderBadge($principal['status'] ?? 'Em análise', 'warning') ?><?= renderBadge(($principal['prioridade'] ?? 'Média') . ' prioridade', 'danger') ?></div></div><div class="admin-card-body"><div class="admin-summary-grid"><div class="admin-list-row"><div><strong>Localização</strong><div class="admin-stat-note"><?= h(($principal['municipio'] ?? '') . ' · ' . ($principal['local_referencia'] ?? '')) ?></div></div><span class="admin-kicker">Geo</span></div><div class="admin-list-row"><div><strong>Guarnição</strong><div class="admin-stat-note"><?= h(($principal['unidade'] ?? '') . ' · ' . ($principal['guarnicao'] ?? '')) ?></div></div><span class="admin-kicker">Responsável</span></div></div></div></section><div class="admin-split" style="margin-top: 22px;"><section class="admin-card"><div class="admin-card-header"><div class="admin-kicker">Histórico</div><h2 class="admin-section-title">Linha do tempo da ocorrência</h2></div><div class="admin-card-body"><div class="timeline-list"><?php foreach (($principal['historico'] ?? []) as $evento): ?><div class="timeline-item"><div><strong>Movimentação</strong><div class="admin-stat-note"><?= h($evento) ?></div></div><span class="admin-kicker">registro</span></div><?php endforeach; ?></div></div></section><aside><section class="admin-card"><div class="admin-card-header"><div class="admin-kicker">Anexos</div><h2 class="admin-section-title">Arquivos vinculados</h2></div><div class="admin-card-body"><div class="anexo-list"><?php foreach (($principal['anexos'] ?? []) as $anexo): ?><div class="anexo-item"><div><strong><?= h($anexo) ?></strong><div class="admin-stat-note">Arquivo demonstrativo</div></div><?= renderBadge('Mockado', 'info') ?></div><?php endforeach; ?></div></div></section></aside></div>
            <?php elseif ($pagina === 'produtividade'): ?>
                <section class="dashboard-grid dashboard-grid--4"><?php foreach ($produtividade as $linha): ?><article class="admin-stat-card"><div class="admin-kicker"><?= h($linha['unidade']) ?></div><div class="admin-stat-value"><?= h((string) $linha['conducoes']) ?></div><div class="admin-stat-note">Conduções em <?= h($linha['data']) ?></div></article><?php endforeach; ?></section><section class="admin-card" style="margin-top: 22px;"><div class="admin-card-header"><div class="admin-kicker">Tabela consolidada</div><h2 class="admin-section-title">Lançamentos por data e unidade</h2></div><div class="admin-table-shell"><table class="admin-table"><thead><tr><th>Data</th><th>Unidade</th><th>Município</th><th>Indicadores</th><th>Observações</th><th>Ações</th></tr></thead><tbody><?php foreach ($produtividade as $linha): ?><tr><td><strong><?= h($linha['data']) ?></strong></td><td><?= h($linha['unidade']) ?></td><td><?= h($linha['municipio']) ?></td><td><?= h($linha['armas_apreendidas'] . ' armas · ' . $linha['veiculos_recuperados'] . ' veículos · ' . $linha['conducoes'] . ' conduções') ?></td><td><?= h($linha['observacoes']) ?></td><td><?= renderAcoes() ?></td></tr><?php endforeach; ?></tbody></table></div></section>
            <?php elseif ($pagina === 'produtividade-form'): ?>
                <section class="admin-card"><div class="admin-card-header"><div class="admin-kicker">Lançamento operacional</div><h2 class="admin-section-title">Indicadores do período</h2></div><div class="admin-card-body"><div class="admin-grid admin-grid--2"><div class="admin-field"><label class="admin-label">Data</label><input type="date" class="admin-input" value="2026-04-16"></div><div class="admin-field"><label class="admin-label">Unidade</label><input class="admin-input" value="2ª Companhia Integrada"></div><div class="admin-field"><label class="admin-label">Armas apreendidas</label><input type="number" class="admin-input" value="3"></div><div class="admin-field"><label class="admin-label">Veículos recuperados</label><input type="number" class="admin-input" value="2"></div><div class="admin-field" style="grid-column: 1 / -1;"><label class="admin-label">Observações</label><textarea class="admin-textarea">Lançamento demonstrativo para visualização do formulário.</textarea></div></div></div><div class="admin-card-footer"><button class="admin-btn admin-btn-primary">Salvar produtividade</button></div></section>
            <?php elseif ($pagina === 'unidades' || $pagina === 'usuarios'): $linhas = $pagina === 'unidades' ? $unidades : $usuarios; ?>
                <section class="admin-card"><div class="admin-card-header"><div class="admin-kicker">Tabela administrativa</div><h2 class="admin-section-title"><?= h($tituloPagina) ?></h2></div><div class="admin-table-shell"><table class="admin-table"><thead><?php if ($pagina === 'unidades'): ?><tr><th>Unidade</th><th>Tipo</th><th>Município</th><th>Setor</th><th>Responsável</th><th>Status</th><th>Ações</th></tr><?php else: ?><tr><th>Nome</th><th>Perfil</th><th>Unidade</th><th>Status</th><th>Último acesso</th><th>Ações</th></tr><?php endif; ?></thead><tbody><?php foreach ($linhas as $linha): ?><?php if ($pagina === 'unidades'): ?><tr><td><strong><?= h($linha['nome']) ?></strong><div class="admin-stat-note"><?= h($linha['sigla']) ?></div></td><td><?= h($linha['tipo']) ?></td><td><?= h($linha['municipio']) ?></td><td><?= h($linha['setor']) ?></td><td><?= h($linha['responsavel']) ?></td><td><?= renderBadge($linha['status'], $linha['status'] === 'Ativa' ? 'success' : 'info') ?></td><td><?= renderAcoes() ?></td></tr><?php else: ?><tr><td><strong><?= h($linha['nome']) ?></strong><div class="admin-stat-note"><?= h($linha['email']) ?></div></td><td><?= h($linha['perfil']) ?></td><td><?= h($linha['unidade']) ?></td><td><?= renderBadge($linha['status'], $linha['status'] === 'Ativo' ? 'success' : 'warning') ?></td><td><?= h($linha['ultimo_acesso']) ?></td><td><?= renderAcoes() ?></td></tr><?php endif; ?><?php endforeach; ?></tbody></table></div></section>
            <?php elseif ($pagina === 'unidades-form' || $pagina === 'usuarios-form'): ?>
                <section class="admin-card"><div class="admin-card-header"><div class="admin-kicker">Cadastro visual</div><h2 class="admin-section-title"><?= h($tituloPagina) ?></h2></div><div class="admin-card-body"><div class="admin-grid admin-grid--2"><?php if ($pagina === 'unidades-form'): ?><div class="admin-field"><label class="admin-label">Nome</label><input class="admin-input" value="2ª Companhia Integrada"></div><div class="admin-field"><label class="admin-label">Sigla</label><input class="admin-input" value="CIA-02"></div><div class="admin-field"><label class="admin-label">Tipo</label><input class="admin-input" value="Companhia"></div><div class="admin-field"><label class="admin-label">Município</label><input class="admin-input" value="Orionópolis"></div><?php else: ?><div class="admin-field"><label class="admin-label">Nome</label><input class="admin-input" value="Helena Duarte"></div><div class="admin-field"><label class="admin-label">E-mail</label><input class="admin-input" value="helena.duarte@orion.gov"></div><div class="admin-field"><label class="admin-label">Perfil</label><input class="admin-input" value="Gestor Operacional"></div><div class="admin-field"><label class="admin-label">Unidade</label><input class="admin-input" value="2ª Companhia Integrada"></div><?php endif; ?></div></div><div class="admin-card-footer"><button class="admin-btn admin-btn-primary">Salvar</button></div></section>
            <?php elseif ($pagina === 'configuracoes'): ?>
                <div class="dashboard-grid dashboard-grid--2"><section class="admin-card"><div class="admin-card-header"><div class="admin-kicker">Dados institucionais</div><h2 class="admin-section-title">Organização</h2></div><div class="admin-card-body"><div class="admin-list-clean"><div class="admin-list-row"><div><strong>Nome do sistema</strong><div class="admin-stat-note"><?= h($configuracoes['nome_sistema'] ?? '') ?></div></div><span class="admin-kicker">Sistema</span></div><div class="admin-list-row"><div><strong>Tema</strong><div class="admin-stat-note"><?= h($configuracoes['tema'] ?? '') ?></div></div><span class="admin-kicker">Visual</span></div><div class="admin-list-row"><div><strong>Companhia padrão</strong><div class="admin-stat-note"><?= h($configuracoes['companhia_padrao'] ?? '') ?></div></div><span class="admin-kicker">Base</span></div></div></div></section><section class="admin-card"><div class="admin-card-header"><div class="admin-kicker">Catálogo operacional</div><h2 class="admin-section-title">Naturezas, status e perfis</h2></div><div class="admin-card-body"><div class="timeline-list"><?php foreach (($configuracoes['naturezas_disponiveis'] ?? []) as $natureza): ?><div class="timeline-item"><div><strong><?= h($natureza) ?></strong><div class="admin-stat-note">Natureza disponível no sistema</div></div><span class="admin-kicker">Catálogo</span></div><?php endforeach; ?></div></div></section></div>
            <?php endif; ?>
        </main>
    </div>
</div>
<script type="module" src="<?= h(assetBuildPath('resources/js/admin-layout.ts', '')) ?>"></script>
</body>
</html>
