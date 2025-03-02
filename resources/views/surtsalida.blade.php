@extends('layouts.app')

@section('content')
<div class="p-6">
    <!-- Header -->
    <div class="mb-6">
        <h1 class="text-2xl font-semibold text-foundit-blue">Surtir Material</h1>
    </div>

    <!-- Información del Material y Formulario -->
    <div class="max-w-3xl mx-auto">
        <!-- Información del Material -->
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 mb-6 p-6 relative">
            <dl class="grid grid-cols-2 gap-6">
                <div>
                    <dt class="text-sm font-medium text-gray-500">Código</dt>
                    <dd class="text-xl font-medium text-gray-900 mt-1">MAT001</dd>
                </div>
                <div>
                    <dt class="text-sm font-medium text-gray-500">Material</dt>
                    <dd class="text-xl text-gray-900 mt-1">Tornillos M4</dd>
                </div>
                <div>
                    <dt class="text-sm font-medium text-gray-500">Ubicación</dt>
                    <dd class="text-xl text-gray-900 mt-1">A-01-02</dd>
                </div>
                <div class="relative">
                    <dt class="text-sm font-medium text-gray-500">Disponible</dt>
                    <dd class="text-xl font-semibold text-foundit-blue mt-1">1000 unidades</dd>
                    
                    <!-- Botón Localizar movido a la derecha del campo "Disponible" -->
                    <button 
                        type="button" 
                        class="absolute top-0 right-0 px-3 py-1 text-sm font-medium text-white bg-foundit-blue rounded-lg hover:bg-foundit-blue/90 flex items-center gap-1"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-map-pin"><path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/><circle cx="12" cy="10" r="3"/></svg>
                        Localizar
                    </button>
                </div>
            </dl>
        </div>

        <!-- Formulario de Salida  -->
        <div class="bg-white rounded-lg shadow-sm border border-gray-200">
            <div class="p-8">
                <form class="space-y-8">
                    <!-- Cantidad a Surtir  -->
                    <div class="text-center">
                        <label class="block text-lg font-medium text-gray-700 mb-4">
                            ¿Cuántas unidades desea surtir?
                        </label>
                        <div class="flex items-center justify-center gap-4">
                            <input 
                                type="number" 
                                class="w-48 h-16 text-2xl text-center rounded-lg border-gray-300 focus:border-foundit-blue focus:ring-foundit-blue"
                                placeholder="0"
                                min="1"
                                max="1000"
                                required
                            >
                            <span class="text-lg text-gray-500">unidades</span>
                        </div>
                        <p class="mt-3 text-sm text-gray-500">Máximo disponible: 1000 unidades</p>
                    </div>

                    <!-- Botones -->
                    <div class="flex justify-center gap-4 pt-6">
                        <button 
                            type="button"
                            onclick="history.back()" 
                            class="px-8 py-3 text-lg font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50"
                        >
                            Cancelar
                        </button>
                        <button 
                            type="submit"
                            class="px-8 py-3 text-lg font-medium text-white bg-foundit-blue rounded-lg hover:bg-foundit-blue/90"
                        >
                            Confirmar Salida
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection

