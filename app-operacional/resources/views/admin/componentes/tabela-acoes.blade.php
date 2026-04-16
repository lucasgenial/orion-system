@php
    $contexto = $contexto ?? 'padrao';

    $mapaAcoes = [
        'ocorrencias' => [
            ['titulo' => 'Visualizar ocorrência', 'icone' => 'ri-eye-line', 'href' => route('orion.ocorrencias.show')],
            ['titulo' => 'Editar ocorrência', 'icone' => 'ri-edit-line', 'href' => route('orion.ocorrencias.edit')],
            ['titulo' => 'Validar registro', 'icone' => 'ri-shield-check-line', 'href' => '#'],
            ['titulo' => 'Arquivar', 'icone' => 'ri-inbox-archive-line', 'tipo' => 'button', 'danger' => true],
        ],
        'usuarios' => [
            ['titulo' => 'Ver usuário', 'icone' => 'ri-eye-line', 'href' => '#'],
            ['titulo' => 'Editar usuário', 'icone' => 'ri-edit-line', 'href' => route('orion.usuarios.create')],
            ['titulo' => 'Redefinir senha', 'icone' => 'ri-lock-password-line', 'href' => '#'],
            ['titulo' => 'Bloquear acesso', 'icone' => 'ri-forbid-2-line', 'tipo' => 'button', 'danger' => true],
        ],
        'unidades' => [
            ['titulo' => 'Ver unidade', 'icone' => 'ri-eye-line', 'href' => '#'],
            ['titulo' => 'Editar unidade', 'icone' => 'ri-edit-line', 'href' => route('orion.unidades.create')],
            ['titulo' => 'Ver descendentes', 'icone' => 'ri-node-tree', 'href' => '#'],
            ['titulo' => 'Inativar unidade', 'icone' => 'ri-close-circle-line', 'tipo' => 'button', 'danger' => true],
        ],
        'tipificacoes' => [
            ['titulo' => 'Ver regra', 'icone' => 'ri-eye-line', 'href' => '#'],
            ['titulo' => 'Editar tipificação', 'icone' => 'ri-edit-line', 'href' => '#'],
            ['titulo' => 'Duplicar regra', 'icone' => 'ri-file-copy-line', 'href' => '#'],
            ['titulo' => 'Inativar', 'icone' => 'ri-close-circle-line', 'tipo' => 'button', 'danger' => true],
        ],
        'produtividade' => [
            ['titulo' => 'Ver lançamento', 'icone' => 'ri-eye-line', 'href' => '#'],
            ['titulo' => 'Editar lançamento', 'icone' => 'ri-edit-line', 'href' => route('orion.produtividade.create')],
            ['titulo' => 'Duplicar lançamento', 'icone' => 'ri-file-copy-line', 'href' => '#'],
            ['titulo' => 'Exportar linha', 'icone' => 'ri-download-2-line', 'href' => '#'],
        ],
        'auditoria' => [
            ['titulo' => 'Ver evento', 'icone' => 'ri-eye-line', 'href' => '#'],
            ['titulo' => 'Abrir entidade', 'icone' => 'ri-external-link-line', 'href' => '#'],
            ['titulo' => 'Exportar evento', 'icone' => 'ri-download-2-line', 'href' => '#'],
        ],
        'seguranca' => [
            ['titulo' => 'Ver matriz', 'icone' => 'ri-eye-line', 'href' => '#'],
            ['titulo' => 'Editar permissões', 'icone' => 'ri-edit-line', 'href' => '#'],
            ['titulo' => 'Duplicar perfil', 'icone' => 'ri-file-copy-line', 'href' => '#'],
        ],
        'notificacoes' => [
            ['titulo' => 'Abrir origem', 'icone' => 'ri-external-link-line', 'href' => '#'],
            ['titulo' => 'Marcar como lida', 'icone' => 'ri-check-line', 'href' => '#'],
            ['titulo' => 'Arquivar', 'icone' => 'ri-inbox-archive-line', 'tipo' => 'button', 'danger' => true],
        ],
        'ocorrencia-envolvidos' => [
            ['titulo' => 'Editar envolvido', 'icone' => 'ri-edit-line', 'href' => '#'],
            ['titulo' => 'Excluir envolvido', 'icone' => 'ri-delete-bin-line', 'tipo' => 'button', 'danger' => true],
        ],
        'ocorrencia-itens' => [
            ['titulo' => 'Editar item', 'icone' => 'ri-edit-line', 'href' => '#'],
            ['titulo' => 'Excluir item', 'icone' => 'ri-delete-bin-line', 'tipo' => 'button', 'danger' => true],
        ],
        'ocorrencia-anexos' => [
            ['titulo' => 'Visualizar arquivo', 'icone' => 'ri-eye-line', 'href' => '#'],
            ['titulo' => 'Baixar mock', 'icone' => 'ri-download-2-line', 'href' => '#'],
            ['titulo' => 'Excluir arquivo', 'icone' => 'ri-delete-bin-line', 'tipo' => 'button', 'danger' => true],
        ],
        'padrao' => [
            ['titulo' => 'Visualizar', 'icone' => 'ri-eye-line', 'href' => '#'],
            ['titulo' => 'Editar', 'icone' => 'ri-edit-line', 'href' => '#'],
            ['titulo' => 'Excluir', 'icone' => 'ri-delete-bin-line', 'tipo' => 'button', 'danger' => true],
        ],
    ];

    $itens = $itens ?? ($mapaAcoes[$contexto] ?? $mapaAcoes['padrao']);
@endphp

@include('admin.componentes.dropdown-acoes', [
    'itens' => $itens,
    'rotulo' => 'Ações',
    'icone' => 'ri-more-2-fill',
    'classe' => 'admin-table-actions admin-table-actions--single',
    'classeBotao' => 'admin-btn admin-btn-secondary admin-btn-action',
])
