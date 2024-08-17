<div class="version-history">
    @foreach ($project->versions as $version)
        <div class="version-item">
            <h4>Versão {{ $version->number }}</h4>
            <p>Data: {{ $version->created_at->format('d/m/Y') }}</p>
            <p>Descrição: {{ $version->description }}</p>
        </div>
    @endforeach
</div>
