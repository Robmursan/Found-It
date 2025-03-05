@extends('layouts.app')

@section('content')
<div class="p-6">
    <!-- Header -->
    <div class="mb-6">
        <h1 class="text-2xl font-semibold text-foundit-blue">Asignar Ubicación</h1>
        <p class="text-gray-600 mt-1">Seleccione la ubicación para el material</p>
    </div>

    <!-- Formulario -->
    <div class="max-w-4xl mx-auto bg-white rounded-lg shadow-sm border border-gray-200">
        <form action="{{route('registroUbicacion',['id'=>$material->id_material])}}" method="POST" class="p-8">
            @csrf
            <div class="space-y-6">
                <!-- Material No editable -->
                <div class="grid grid-cols-2 gap-6 pb-6 border-b border-gray-200">
                    <div>
                        <label class="block text-sm font-medium text-gray-500 mb-1">
                            Código del Material
                        </label>
                        <input 
                            type="text"
                            name="codigo" 
                            value="{{$material->codigo}}"
                            class="w-full h-12 text-lg rounded-lg bg-gray-50 border-gray-300 text-gray-700"
                            readonly
                        >
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-500 mb-1">
                            Material
                        </label>
                        <input 
                            type="text" 
                            name="nombre"
                            value="{{$material->nombre}}"
                            class="w-full h-12 text-lg rounded-lg bg-gray-50 border-gray-300 text-gray-700"
                            readonly
                        >
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-500 mb-1">
                            Categoría
                        </label>
                        <input 
                            type="text" 
                            name="categoria"
                            value="{{$material->categoria}}"
                            class="w-full h-12 text-lg rounded-lg bg-gray-50 border-gray-300 text-gray-700"
                            readonly
                        >
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-500 mb-1">
                            Cantidad
                        </label>
                        <input 
                            type="text" 
                            name="cantidad"
                            value="{{$material->cantidad}}"
                            class="w-full h-12 text-lg rounded-lg bg-gray-50 border-gray-300 text-gray-700"
                            readonly
                        >
                    </div>
                </div>

                <!-- Selector de Ubicación -->
                <div class="pt-4">
                    <h3 class="text-lg font-medium text-gray-900 mb-6">Seleccionar Nueva Ubicación</h3>
                    <div class="grid grid-cols-2 gap-6">
                        <!-- Selector de Columna -->
                        <div>
                            <label class="block text-base font-medium text-gray-700 mb-2">Columna</label>
                            <select 
                                name="columna"
                                class="w-full h-12 text-lg rounded-lg border-gray-300 focus:border-foundit-blue focus:ring-foundit-blue"
                                required
                            >
                                <option value="">Seleccione columna</option>
                                <option value="A">A</option>
                                <option value="B">B</option>
                                <option value="C">C</option>
                                <option value="D">D</option>
                                
                            </select>
                        </div>

                        <!-- Selector de Fila -->
                        <div>
                            <label class="block text-base font-medium text-gray-700 mb-2">Fila</label>
                            <select 
                                name="fila"
                                class="w-full h-12 text-lg rounded-lg border-gray-300 focus:border-foundit-blue focus:ring-foundit-blue"
                                required
                            >
                                <option value="">Seleccione fila</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Botones -->
            <div class="flex justify-end space-x-4 mt-8 pt-6 border-t border-gray-200">
                <button 
                    type="button"
                    onclick="history.back()" 
                    class="px-6 py-3 text-lg font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50"
                >
                    Cancelar
                </button>
                <button 
                    type="submit"
                    class="px-6 py-3 text-lg font-medium text-white bg-foundit-blue rounded-lg hover:bg-foundit-blue/90"
                >
                    Guardar Ubicación
                </button>
            </div>
        </form>
    </div>
</div>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const form = document.querySelector('form');
        
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            
            console.log('Guardando ubicación...');
        });
    });
</script>
@endpush
@endsection