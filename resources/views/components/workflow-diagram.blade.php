<!-- components.workflow-diagram -->
<div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6">
    <h2 class="text-2xl font-bold mb-4 text-gray-900 dark:text-white">Fluxo de Trabalho</h2>
    <div id="workflow-diagram" class="w-full h-96"></div>
</div>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        mermaid.initialize({ startOnLoad: true, theme: 'default' });
        let workflowDiagram = `
            graph TD
                A[Start] --> B[Task 1]
                B --> C[Task 2]
                C --> D{Decision}
                D -->|Yes| E[Task 3]
                D -->|No| F[Task 4]
                E --> G[End]
                F --> G[End]
        `;
        mermaid.render('workflow-diagram', workflowDiagram);
    });
</script>
@endpush
