<div class="relative">
    @if ($formRef)
        <button 
            type="button"
            class="absolute top-0 right-0 flex h-full items-center hover:text-red-500"
            {{-- onclick="document.getElementById('{{ $name }}').value = ''; document.getElementById('{{ $formId }}').submit();" --}}
            @click="$refs['input-{{ $name }}'].value = ''; $refs['{{ $formRef }}'].submit();"
        >
            <i class="bi bi-x-lg w-6 h-6 flex items-center"></i>
        </button>
    @endif
    
    <input 
        x-ref="input-{{ $name }}"
        type="text" 
        placeholder="{{ $placeholder }}"
        name="{{ $name }}"
        value="{{ $value }}"
        id="{{ $name }}"
        class="w-full rounded-md border-0 py-1.5 px-2.5 pr-8 text-sm ring-1 ring-slate-300 placeholder:text-slate-400 focus:ring-2"
    >
</div>
