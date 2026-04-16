const dadosPorAba = {
    eventos: [
        ['Operacao Alfa', 'Monitoramento reforcado em corredor urbano', '<span class="badge badge--amber">Em atencao</span>', 'Coord. Regional 02'],
        ['Produtividade Oeste', 'Queda de 8% no fechamento do turno noturno', '<span class="badge badge--blue">Em analise</span>', 'Analise Operacional'],
        ['Unidade Delta', 'Escala reprogramada por indisponibilidade parcial', '<span class="badge badge--green">Controlado</span>', 'Gestao Territorial'],
    ],
    unidades: [
        ['2a Companhia Integrada', 'Cobertura em patamar estavel com 9 equipes ativas', '<span class="badge badge--green">Estavel</span>', 'Comando Setorial'],
        ['Base Leste', 'Demanda acima da media no turno vespertino', '<span class="badge badge--amber">Pressao</span>', 'Supervisor de Area'],
        ['Nucleo Central', 'Produtividade consolidada acima da meta no ciclo', '<span class="badge badge--blue">Destaque</span>', 'Gestao de Desempenho'],
    ],
    agenda: [
        ['Reuniao de comando', 'Validacao do recorte territorial e alertas da semana', '<span class="badge badge--blue">Agendado</span>', 'Gabinete Operacional'],
        ['Janela de publicacao', 'Fechamento do painel semanal para diretoria', '<span class="badge badge--green">Planejado</span>', 'BI Institucional'],
        ['Revisao de parametros', 'Ajuste de thresholds de severidade e recorrencia', '<span class="badge badge--amber">Pendente</span>', 'Arquitetura de Dados'],
    ],
};

const corpoTabela = document.querySelector('#painel-tabela-corpo');
const tabs = document.querySelectorAll('.tab');
const filtros = document.querySelectorAll('.pill');

tabs.forEach((tab) => {
    tab.addEventListener('click', () => {
        tabs.forEach((item) => item.classList.remove('is-active'));
        tab.classList.add('is-active');

        const dados = dadosPorAba[tab.dataset.tab] || [];
        corpoTabela.innerHTML = dados
            .map(
                (linha) => `
                    <tr>
                        <td>${linha[0]}</td>
                        <td>${linha[1]}</td>
                        <td>${linha[2]}</td>
                        <td>${linha[3]}</td>
                    </tr>
                `,
            )
            .join('');
    });
});

filtros.forEach((filtro) => {
    filtro.addEventListener('click', () => {
        filtros.forEach((item) => item.classList.remove('is-active'));
        filtro.classList.add('is-active');
    });
});