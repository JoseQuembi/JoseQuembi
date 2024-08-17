<div class="resource-dashboard">
    @foreach ($resources as $resource)
        <div class="resource-item">
            <h4>{{ $resource->name }}</h4>
            <p>Tipo: {{ $resource->type }}</p>
            <p>Quantidade Disponível: {{ $resource->available_quantity }}</p>
            <p>Quantidade Alocada: {{ $resource->allocated_quantity }}</p>
        </div>
    @endforeach
</div>
