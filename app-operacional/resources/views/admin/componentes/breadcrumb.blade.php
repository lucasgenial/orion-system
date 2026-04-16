@php
    $itens = $itens ?? [];
@endphp
<div class="orion-breadcrumbs">
    @foreach ($itens as $item)
        <span>{{ $item['titulo'] }}</span>
    @endforeach
</div>
