<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Entrar | ORION</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon@4.9.1/fonts/remixicon.css">
    @vite(['resources/css/admin.css'])
    <style>
        .orion-auth {
            min-height: 100vh;
            display: grid;
            grid-template-columns: minmax(0, 1.1fr) minmax(360px, 520px);
            background: linear-gradient(135deg, #f7fafb 0%, #eef5f7 56%, #dce9ee 100%);
        }
        .orion-auth__hero {
            padding: 64px;
            display: grid;
            align-content: center;
            gap: 22px;
        }
        .orion-auth__hero h1 {
            margin: 0;
            font-family: var(--font-display);
            font-size: clamp(2.4rem, 4vw, 4.2rem);
            line-height: 1;
        }
        .orion-auth__hero p {
            margin: 0;
            max-width: 620px;
            color: var(--color-text-soft);
            font-size: 1.05rem;
        }
        .orion-auth__grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 14px;
            margin-top: 12px;
        }
        .orion-auth__stat {
            padding: 18px;
            border-radius: 18px;
            background: rgba(255, 255, 255, 0.72);
            border: 1px solid rgba(46, 97, 117, 0.08);
        }
        .orion-auth__panel {
            display: grid;
            align-items: center;
            padding: 28px;
        }
        .orion-auth__card {
            padding: 28px;
            background: rgba(255, 255, 255, 0.92);
            border: 1px solid var(--color-border);
            border-radius: 24px;
            box-shadow: var(--shadow-soft);
        }
        @media (max-width: 900px) {
            .orion-auth { grid-template-columns: 1fr; }
            .orion-auth__hero { padding: 32px 20px 12px; }
            .orion-auth__panel { padding: 20px; }
            .orion-auth__grid { grid-template-columns: 1fr; }
        }
    </style>
</head>
<body>
    <div class="orion-auth">
        <section class="orion-auth__hero">
            <div class="admin-kicker">ORION</div>
            <h1>Operações, Registro e Inteligência Operacional em Rede</h1>
            <p>Ambiente administrativo para cadastro de ocorrências, produtividade policial, controle de unidades e leitura operacional integrada.</p>
            <div class="orion-auth__grid">
                <div class="orion-auth__stat"><strong>Registro operacional</strong><div class="admin-stat-note">Padronização do fluxo de ocorrências e produtividade.</div></div>
                <div class="orion-auth__stat"><strong>Leitura estratégica</strong><div class="admin-stat-note">Indicadores claros para gestão e supervisão diária.</div></div>
                <div class="orion-auth__stat"><strong>Escalável</strong><div class="admin-stat-note">Preparado para múltiplas companhias e unidades.</div></div>
                <div class="orion-auth__stat"><strong>Institucional</strong><div class="admin-stat-note">Visual claro, técnico e compatível com ambiente público.</div></div>
            </div>
        </section>
        <aside class="orion-auth__panel">
            <div class="orion-auth__card">
                <div class="admin-kicker">Acesso ao sistema</div>
                <h2 class="admin-section-title">Entrar no App Operacional</h2>
                <p class="admin-section-copy">Tela visual de autenticação para prototipação do fluxo inicial.</p>
                <div class="admin-field" style="margin-top: 22px;"><label class="admin-label">E-mail institucional</label><input class="admin-input" value="helena.duarte@orion.gov" /></div>
                <div class="admin-field" style="margin-top: 16px;"><label class="admin-label">Senha</label><input type="password" class="admin-input" value="123456" /></div>
                <div class="orion-page-actions" style="margin-top: 22px; width: 100%;">
                    <button class="admin-btn admin-btn-primary" style="width: 100%;">Entrar</button>
                </div>
                <div class="timeline-list" style="margin-top: 18px;">
                    <div class="timeline-item"><span>Perfis contemplados</span><strong>Administrador, gestor, supervisor, digitador e visualizador</strong></div>
                </div>
            </div>
        </aside>
    </div>
</body>
</html>
