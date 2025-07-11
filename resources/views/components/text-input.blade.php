<div class="relative">
    @if ('textarea' !== $type)
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
            type="{{ $type }}" 
            placeholder="{{ $placeholder }}"
            name="{{ $name }}"
            value="{{ old($name, $value) }}"
            id="{{ $name }}"
            @class([
                'w-full rounded-md border-0 py-1.5 px-2.5 text-sm ring-1 placeholder:text-slate-400 focus:ring-2',
                'pr-8' => $formRef,
                'ring-slate-300' => !$errors->has($name),
                'ring-red-300' => $errors->has($name),
            ])
        >
    @else
        <textarea 
            id="{{ $name }}"
            name="{{ $name }}"
            @class([
                'w-full rounded-md border-0 py-1.5 px-2.5 text-sm ring-1 placeholder:text-slate-400 focus:ring-2',
                'pr-8' => $formRef,
                'ring-slate-300' => !$errors->has($name),
                'ring-red-300' => $errors->has($name),
            ])
        >
            {{ old($name, $value) }}
        </textarea>
    @endif
    
    @error($name)
        <div class="mt-1 text-xs text-red-500">
            {{ $message }}
        </div>
    @enderror
</div>
