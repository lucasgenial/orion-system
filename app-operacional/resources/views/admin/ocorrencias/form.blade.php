@extends('admin.layouts.app')

@php
    $paginaAtual = 'ocorrencias';
    $breadcrumbs = [
        ['titulo' => 'App Operacional'],
        ['titulo' => 'Ocorrências'],
        ['titulo' => 'Nova ocorrência'],
    ];

    $territorios = [
        'PE' => [
            'nome' => 'Pernambuco',
            'municipios' => [
                'orionopolis' => [
                    'nome' => 'Orionópolis',
                    'bairros' => ['Centro', 'Nova Esperança', 'Setor Norte'],
                ],
                'vale-seguro' => [
                    'nome' => 'Vale Seguro',
                    'bairros' => ['Lago Azul', 'Zona Leste', 'Distrito Industrial'],
                ],
            ],
        ],
        'PB' => [
            'nome' => 'Paraíba',
            'municipios' => [
                'campina-orion' => [
                    'nome' => 'Campina Orion',
                    'bairros' => ['Centro', 'Liberdade', 'Bela Vista'],
                ],
                'serra-clara' => [
                    'nome' => 'Serra Clara',
                    'bairros' => ['Planalto', 'Mirante', 'São José'],
                ],
            ],
        ],
    ];
@endphp

@section('page-title', 'Cadastro de ocorrência')
@section('page-subtitle', 'Formulário em blocos para identificação, localização estruturada, envolvidos, bens relacionados, anexos e providências da ocorrência.')

@section('page-actions')
    <a href="{{ route('orion.ocorrencias.index') }}" class="admin-btn admin-btn-secondary"><i class="ri-arrow-left-line"></i> Voltar à listagem</a>
@endsection

@section('content')
    <form class="admin-stack" data-ocorrencia-form>
            <section class="admin-card">
                <div class="admin-card-header">
                    <div class="admin-kicker">Registro principal</div>
                    <h2 class="admin-section-title">Identificação e tipificação</h2>
                </div>
                <div class="admin-card-body">
                    <div class="admin-grid admin-grid--3">
                        <div class="admin-field"><label class="admin-label">Protocolo</label><input class="admin-input" value="OR-2026-00492" /></div>
                        <div class="admin-field"><label class="admin-label">Status</label><select class="admin-select"><option selected>Em atendimento</option><option>Concluída</option><option>Em análise</option><option>Aguardando validação</option></select></div>
                        <div class="admin-field"><label class="admin-label">Prioridade</label><select class="admin-select"><option>Baixa</option><option>Média</option><option selected>Alta</option></select></div>
                        <div class="admin-field"><label class="admin-label">Tipificação</label><select class="admin-select"><option selected>Roubo a transeunte</option><option>Violência doméstica</option><option>Apreensão de arma</option><option>Recuperação de veículo</option></select></div>
                        <div class="admin-field"><label class="admin-label">Classificação primária</label><select class="admin-select"><option selected>Patrimônio</option><option>Pessoa</option><option>Preventiva</option></select></div>
                        <div class="admin-field"><label class="admin-label">Classificação secundária</label><select class="admin-select"><option selected>Com ameaça</option><option>Consumado</option><option>Tentado</option></select></div>
                        <div class="admin-field"><label class="admin-label">Origem do registro</label><select class="admin-select"><option selected>Despacho operacional</option><option>Patrulhamento</option><option>Demanda espontânea</option></select></div>
                        <div class="admin-field"><label class="admin-label">Data do fato</label><input type="date" class="admin-input" value="2026-04-16" /></div>
                        <div class="admin-field"><label class="admin-label">Hora do fato</label><input type="time" class="admin-input" value="18:10" /></div>
                    </div>
                </div>
            </section>

            <section class="admin-card">
                <div class="admin-card-header">
                    <div class="admin-kicker">Localização</div>
                    <h2 class="admin-section-title">Endereço normalizado e georreferência</h2>
                </div>
                <div class="admin-card-body">
                    <div class="admin-grid admin-grid--3" data-localizacao-form>
                        <div class="admin-field">
                            <label class="admin-label">UF</label>
                            <select class="admin-select" id="ocorrencia-uf" data-localizacao-uf>
                                <option value="PE" selected>Pernambuco</option>
                                <option value="PB">Paraíba</option>
                            </select>
                        </div>
                        <div class="admin-field">
                            <label class="admin-label">Município</label>
                            <select class="admin-select" id="ocorrencia-municipio" data-localizacao-municipio data-selected="orionopolis"></select>
                        </div>
                        <div class="admin-field">
                            <label class="admin-label">Bairro</label>
                            <select class="admin-select" id="ocorrencia-bairro" data-localizacao-bairro data-selected="Centro"></select>
                        </div>
                        <div class="admin-field"><label class="admin-label">Logradouro</label><input class="admin-input" value="Rua 7 de Setembro" /></div>
                        <div class="admin-field"><label class="admin-label">Número</label><input class="admin-input" value="180" /></div>
                        <div class="admin-field"><label class="admin-label">Complemento</label><input class="admin-input" value="Calçada da rodoviária" /></div>
                        <div class="admin-field" style="grid-column: 1 / -1;"><label class="admin-label">Ponto de referência</label><input class="admin-input" value="Proximidades da rodoviária central" /></div>
                        <div class="admin-field"><label class="admin-label">Latitude</label><input class="admin-input" value="-8.054021" /></div>
                        <div class="admin-field"><label class="admin-label">Longitude</label><input class="admin-input" value="-34.881211" /></div>
                        <div class="admin-field"><label class="admin-label">Precisão geográfica</label><select class="admin-select"><option selected>Ponto confirmado em campo</option><option>Estimado por referência</option><option>Centroide do bairro</option></select></div>
                    </div>
                </div>
            </section>

            <section class="admin-card">
                <div class="admin-card-header">
                    <div>
                        <div class="admin-kicker">Envolvidos</div>
                        <h2 class="admin-section-title">Cadastro aninhado da ocorrência</h2>
                        <p class="admin-section-copy">Cada envolvido pertence a esta ocorrência e deve ser cadastrado diretamente no subformulário abaixo.</p>
                    </div>
                </div>
                <div class="admin-card-body">
                    <div class="admin-subform">
                        <div class="admin-subform__header">
                            <h3>Novo envolvido</h3>
                            <span class="admin-subform__hint">Subcadastro vinculado somente a esta ocorrência.</span>
                        </div>
                        <div class="admin-grid admin-grid--3">
                            <div class="admin-field"><label class="admin-label">Papel</label><select class="admin-select"><option selected>Vítima</option><option>Suspeito</option><option>Autor</option><option>Testemunha</option><option>Comunicante</option></select></div>
                            <div class="admin-field"><label class="admin-label">Nome</label><input class="admin-input" value="José Carlos N." /></div>
                            <div class="admin-field"><label class="admin-label">Documento</label><input class="admin-input" value="CPF informado" /></div>
                            <div class="admin-field"><label class="admin-label">Sexo</label><select class="admin-select"><option selected>Masculino</option><option>Feminino</option><option>Não informado</option></select></div>
                            <div class="admin-field"><label class="admin-label">Faixa etária</label><input class="admin-input" value="29 anos" /></div>
                            <div class="admin-field"><label class="admin-label">Condição</label><input class="admin-input" value="Sem lesão aparente" /></div>
                            <div class="admin-field" style="grid-column: 1 / -1;"><label class="admin-label">Providência</label><input class="admin-input" value="Orientado e qualificado" /></div>
                        </div>
                        <div class="admin-subform__actions">
                            <button type="button" class="admin-btn admin-btn-primary"><i class="ri-user-add-line"></i> Adicionar envolvido</button>
                            <button type="button" class="admin-btn admin-btn-secondary">Limpar campos</button>
                        </div>
                    </div>
                </div>
                <div class="admin-table-shell">
                    <table class="admin-table">
                        <thead>
                            <tr>
                                <th>Papel</th>
                                <th>Nome</th>
                                <th>Documento</th>
                                <th>Sexo</th>
                                <th>Faixa etária</th>
                                <th>Condição</th>
                                <th>Providência</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr><td>Vítima</td><td><strong>José Carlos N.</strong></td><td>CPF informado</td><td>Masculino</td><td>29 anos</td><td>Sem lesão aparente</td><td>Orientado e qualificado</td><td>@include('admin.componentes.tabela-acoes', ['contexto' => 'ocorrencia-envolvidos'])</td></tr>
                            <tr><td>Suspeito</td><td><strong>Não identificado 01</strong></td><td>Não informado</td><td>Masculino</td><td>Adulto</td><td>Evadiu-se em moto</td><td>Inserido em alerta</td><td>@include('admin.componentes.tabela-acoes', ['contexto' => 'ocorrencia-envolvidos'])</td></tr>
                            <tr><td>Suspeito</td><td><strong>Não identificado 02</strong></td><td>Não informado</td><td>Masculino</td><td>Adulto</td><td>Garupa</td><td>Inserido em alerta</td><td>@include('admin.componentes.tabela-acoes', ['contexto' => 'ocorrencia-envolvidos'])</td></tr>
                            <tr><td>Testemunha</td><td><strong>Maria Eduarda S.</strong></td><td>Contato confirmado</td><td>Feminino</td><td>34 anos</td><td>Presencial</td><td>Oitiva preliminar</td><td>@include('admin.componentes.tabela-acoes', ['contexto' => 'ocorrencia-envolvidos'])</td></tr>
                        </tbody>
                    </table>
                </div>
            </section>

            <section class="admin-card">
                <div class="admin-card-header">
                    <div>
                        <div class="admin-kicker">Bens relacionados</div>
                        <h2 class="admin-section-title">Itens condicionados pela tipificação</h2>
                        <p class="admin-section-copy">Os bens relacionados devem ser cadastrados diretamente nesta ocorrência, com separação por vínculo do item.</p>
                    </div>
                </div>
                <div class="admin-card-body">
                    <div class="admin-subform">
                        <div class="admin-subform__header">
                            <h3>Novo item relacionado</h3>
                            <span class="admin-subform__hint">Subcadastro vinculado à ocorrência conforme o tipo de vínculo do item.</span>
                        </div>
                        <div class="admin-grid admin-grid--3">
                            <div class="admin-field"><label class="admin-label">Vínculo do item</label><select class="admin-select"><option selected>Subtraído</option><option>Apreendido</option><option>Recuperado</option><option>Localizado</option></select></div>
                            <div class="admin-field"><label class="admin-label">Categoria</label><select class="admin-select"><option selected>Celular</option><option>Documento</option><option>Arma</option><option>Veículo</option><option>Droga</option></select></div>
                            <div class="admin-field"><label class="admin-label">Quantidade</label><input class="admin-input" value="1" /></div>
                            <div class="admin-field" style="grid-column: 1 / span 2;"><label class="admin-label">Descrição</label><input class="admin-input" value="Samsung A54 azul" /></div>
                            <div class="admin-field"><label class="admin-label">Situação</label><select class="admin-select"><option selected>Não recuperado</option><option>Recuperado</option><option>Apreendido</option></select></div>
                        </div>
                        <div class="admin-subform__actions">
                            <button type="button" class="admin-btn admin-btn-primary"><i class="ri-add-line"></i> Adicionar item</button>
                            <button type="button" class="admin-btn admin-btn-secondary">Limpar campos</button>
                        </div>
                    </div>
                </div>
                <div class="admin-table-shell">
                    <table class="admin-table">
                        <thead>
                            <tr>
                                <th>Vínculo</th>
                                <th>Categoria</th>
                                <th>Qtd.</th>
                                <th>Descrição</th>
                                <th>Situação</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr><td>Subtraído</td><td>Celular</td><td>1</td><td>Samsung A54 azul</td><td>Não recuperado</td><td>@include('admin.componentes.tabela-acoes', ['contexto' => 'ocorrencia-itens'])</td></tr>
                            <tr><td>Subtraído</td><td>Documento</td><td>1</td><td>Carteira com documentos e cartões</td><td>Não recuperada</td><td>@include('admin.componentes.tabela-acoes', ['contexto' => 'ocorrencia-itens'])</td></tr>
                        </tbody>
                    </table>
                </div>
            </section>

            <section class="admin-card">
                <div class="admin-card-header">
                    <div>
                        <div class="admin-kicker">Anexos</div>
                        <h2 class="admin-section-title">Arquivos da ocorrência</h2>
                        <p class="admin-section-copy">Anexe arquivos relacionados ao atendimento e gerencie a lista de documentos já vinculados.</p>
                    </div>
                </div>
                <div class="admin-card-body">
                    <div class="admin-subform">
                        <div class="admin-subform__header">
                            <h3>Novo anexo</h3>
                            <span class="admin-subform__hint">Fluxo visual mockado para upload desta ocorrência.</span>
                        </div>
                        <div class="admin-grid admin-grid--3">
                            <div class="admin-field" style="grid-column: 1 / span 2;">
                                <label class="admin-label">Arquivo selecionado</label>
                                <div class="admin-file-picker">
                                    <input type="text" class="admin-input" value="Nenhum arquivo selecionado" readonly />
                                    <button type="button" class="admin-btn admin-btn-secondary"><i class="ri-attachment-2"></i> Anexar arquivo</button>
                                </div>
                            </div>
                            <div class="admin-field">
                                <label class="admin-label">Tipo do anexo</label>
                                <select class="admin-select"><option selected>Imagem</option><option>Documento</option><option>Áudio</option><option>Vídeo</option></select>
                            </div>
                        </div>
                        <div class="admin-subform__actions">
                            <button type="button" class="admin-btn admin-btn-primary"><i class="ri-upload-2-line"></i> Adicionar anexo</button>
                        </div>
                    </div>
                </div>
                <div class="admin-table-shell">
                    <table class="admin-table">
                        <thead>
                            <tr>
                                <th>Arquivo</th>
                                <th>Tipo</th>
                                <th>Tamanho</th>
                                <th>Data</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr><td><strong>foto-local-01.jpg</strong></td><td>Imagem</td><td>2,1 MB</td><td>16/04/2026 18:14</td><td>@include('admin.componentes.tabela-acoes', ['contexto' => 'ocorrencia-anexos'])</td></tr>
                            <tr><td><strong>boletim-preliminar.pdf</strong></td><td>Documento</td><td>340 KB</td><td>16/04/2026 18:18</td><td>@include('admin.componentes.tabela-acoes', ['contexto' => 'ocorrencia-anexos'])</td></tr>
                        </tbody>
                    </table>
                </div>
            </section>

            <section class="admin-card">
                <div class="admin-card-header">
                    <div class="admin-kicker">Narrativa e providências</div>
                    <h2 class="admin-section-title">Resumo operacional</h2>
                </div>
                <div class="admin-card-body">
                    <div class="admin-grid admin-grid--2">
                        <div class="admin-field" style="grid-column: 1 / -1;"><label class="admin-label">Descrição objetiva</label><textarea class="admin-textarea">A vítima informou subtração de aparelho celular e carteira após abordagem com ameaça verbal. Patrulha realizou saturação nas imediações, colheu imagens de câmera próxima e registrou dados da testemunha presencial.</textarea></div>
                        <div class="admin-field" style="grid-column: 1 / -1;"><label class="admin-label">Providências adotadas</label><textarea class="admin-textarea">Rondas no perímetro, acionamento do videomonitoramento municipal, coleta de informações, alerta setorial e vinculação de bens subtraídos ao protocolo.</textarea></div>
                        <div class="admin-field"><label class="admin-label">Guarnição</label><input class="admin-input" value="Alfa 02" /></div>
                        <div class="admin-field"><label class="admin-label">Unidade responsável</label><select class="admin-select"><option selected>2ª Companhia Integrada</option><option>3ª Companhia Integrada</option></select></div>
                        <div class="admin-field"><label class="admin-label">Registrado por</label><input class="admin-input" value="Cb. Joana Farias" /></div>
                        <div class="admin-field"><label class="admin-label">Autorizado por</label><input class="admin-input" value="Cap. Helena Duarte" /></div>
                    </div>
                </div>
                <div class="admin-card-footer">
                    <div class="orion-page-actions">
                        <button type="submit" class="admin-btn admin-btn-primary">Salvar ocorrência</button>
                        <button type="button" class="admin-btn admin-btn-secondary">Salvar rascunho</button>
                    </div>
                </div>
            </section>
    </form>
@endsection

@push('scripts')
    <script>
        window.addEventListener('DOMContentLoaded', () => {
            const territorios = @json($territorios);
            const ufSelect = document.querySelector('[data-localizacao-uf]');
            const municipioSelect = document.querySelector('[data-localizacao-municipio]');
            const bairroSelect = document.querySelector('[data-localizacao-bairro]');

            if (!ufSelect || !municipioSelect || !bairroSelect) {
                return;
            }

            const popularMunicipios = (uf, municipioSelecionado = '') => {
                const municipios = territorios[uf]?.municipios ?? {};
                municipioSelect.innerHTML = '';

                Object.entries(municipios).forEach(([valor, municipio]) => {
                    const option = document.createElement('option');
                    option.value = valor;
                    option.textContent = municipio.nome;
                    option.selected = valor === municipioSelecionado;
                    municipioSelect.appendChild(option);
                });

                const valorFinal = municipioSelecionado && municipios[municipioSelecionado]
                    ? municipioSelecionado
                    : Object.keys(municipios)[0] || '';

                if (valorFinal !== '') {
                    municipioSelect.value = valorFinal;
                }

                return valorFinal;
            };

            const popularBairros = (uf, municipio, bairroSelecionado = '') => {
                const bairros = territorios[uf]?.municipios?.[municipio]?.bairros ?? [];
                bairroSelect.innerHTML = '';

                bairros.forEach((bairro) => {
                    const option = document.createElement('option');
                    option.value = bairro;
                    option.textContent = bairro;
                    option.selected = bairro === bairroSelecionado;
                    bairroSelect.appendChild(option);
                });

                const valorFinal = bairros.includes(bairroSelecionado) ? bairroSelecionado : bairros[0] || '';

                if (valorFinal !== '') {
                    bairroSelect.value = valorFinal;
                }
            };

            const atualizarLocalizacao = () => {
                const municipioAtual = popularMunicipios(ufSelect.value, municipioSelect.dataset.selected || municipioSelect.value);
                popularBairros(ufSelect.value, municipioAtual, bairroSelect.dataset.selected || bairroSelect.value);
                municipioSelect.dataset.selected = municipioSelect.value;
                bairroSelect.dataset.selected = bairroSelect.value;
            };

            atualizarLocalizacao();

            ufSelect.addEventListener('change', () => {
                municipioSelect.dataset.selected = '';
                bairroSelect.dataset.selected = '';
                atualizarLocalizacao();
            });

            municipioSelect.addEventListener('change', () => {
                bairroSelect.dataset.selected = '';
                popularBairros(ufSelect.value, municipioSelect.value);
            });
        });
    </script>
@endpush
