<section class="admin-card">
    <div class="admin-card-header">
        <div class="admin-kicker">Filtros superiores</div>
        <h2 class="admin-section-title">Painel de consulta</h2>
        <p class="admin-section-copy">Componente base para filtros de listagem e dashboards administrativos.</p>
    </div>
    <div class="admin-card-body">
        {{ $slot ?? 'Espaço reservado para filtros.' }}
    </div>
</section>
