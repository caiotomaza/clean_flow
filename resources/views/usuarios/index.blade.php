@extends('layouts.app')

@section('title', 'Usuários Cadastrados')

@section('head')

    {{-- As linhas abaixo seriam removidas ou substituídas pela integração do Tailwind CSS --}}
    {{-- <link rel="stylesheet" href="{{ asset('css/usuarios/style2.css') }}">
    <link rel="stylesheet" href="{{ asset('css/usuarios/modal.css') }}"> --}}
    <script src="https://cdn.tailwindcss.com"></script> {{-- Para demonstração --}}
    <style>
        /* Adicionando um fallback de fonte mais agradável e melhorias na renderização */
        body {
            font-family: 'Inter', sans-serif; /* Ou outra fonte moderna de sua escolha */
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }
        /* Para transições de modal mais suaves se não estiver usando 'hidden' diretamente para display:none */
        .modal-transition {
            transition: opacity 0.3s ease-out, transform 0.3s ease-out;
        }
        .modal-closed {
            opacity: 0;
            transform: scale(0.95);
            pointer-events: none; /* Impede interação quando escondido */
        }
        .modal-open {
            opacity: 1;
            transform: scale(1);
        }
    </style>
@endsection

@section('content')

<main class="bg-slate-100 min-h-screen p-4 sm:p-6 lg:p-8">
    <div class="container mx-auto">

        @if(session('success'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded-md shadow-sm" role="alert">
                {{ session('success') }}
            </div>
        @endif

        @if($errors->any())
            <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded-md shadow-sm" role="alert">
                <ul class="list-disc list-inside">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <section class="flex flex-col sm:flex-row justify-between items-center mb-8 pb-4 border-b border-slate-300">
            <h1 class="text-3xl font-bold text-slate-800 mb-4 sm:mb-0">Usuários</h1>            
                 <button
                     class="flex items-center space-x-2 bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-5 rounded-lg shadow-md hover:shadow-lg transition duration-300 ease-in-out focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50"
                     onclick="abrirModal('modalCadastro')">
                     <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                         <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
                     </svg>
                     <span>Cadastrar</span>
                 </button>
        </section>

        <section aria-label="Tabela de usuários" class="bg-white shadow-xl rounded-lg overflow-x-auto">
            <table class="w-full text-left min-w-full">
                <thead class="bg-slate-200 text-slate-600 uppercase text-sm leading-normal">
                    <tr>
                        <th class="py-3 px-6">Matricula</th>
                        <th class="py-3 px-6">Usuário</th>
                        <th class="py-3 px-6">E-mail</th>
                        <th class="py-3 px-6">Situação</th>
                    </tr>
                </thead>
                <tbody class="text-slate-700 text-sm font-light">
                    @forelse ($usuarios as $usuario)
                        <tr class="border-b border-slate-200 hover:bg-slate-50 cursor-pointer transition duration-150 ease-in-out"
                            onclick="abrirModal('modalDetalhes{{ $usuario->id }}')">
                            <td class="py-3 px-6">{{ $usuario->matricula }}</td>
                            <td class="py-3 px-6">{{ $usuario->name }}</td>
                            <td class="py-3 px-6">{{ $usuario->email }}</td>
                            <td class="py-3 px-6">
                                @if($usuario->status === 'ativo')
                                    <span class="inline-flex items-center px-3 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-700">
                                        <span class="inline-block w-2 h-2 bg-green-500 rounded-full mr-2"></span>
                                        Ativo
                                    </span>
                                @else
                                    <span class="inline-flex items-center px-3 py-1 text-xs font-semibold rounded-full bg-red-100 text-red-700">
                                        <span class="inline-block w-2 h-2 bg-red-500 rounded-full mr-2"></span>
                                        Inativo
                                    </span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center py-6 text-slate-500">Nenhum usuário encontrado.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </section>

        @if ($usuarios->hasPages())
            <div class="mt-8">
                <div class="flex justify-center">
                    {{ $usuarios->links('pagination::tailwind') }} 
                </div>
            </div>
        @endif

    </div>

    {{-- Modal de Cadastro de Usuário --}}
    <div id="modalCadastro" class="fixed inset-0 bg-black bg-opacity-60 flex items-center justify-center z-50 p-4 hidden modal-transition modal-closed">
        <div class="bg-white p-6 sm:p-8 rounded-xl shadow-2xl w-full max-w-lg">
            <form action="{{ route('usuarios.store') }}" method="POST" id="formUsuario">
                @csrf
                <div class="flex justify-between items-center pb-4 mb-4 border-b border-slate-200">
                    <h5 class="text-xl font-semibold text-slate-800">Cadastrar Novo Usuário</h5>
                    <button type="button" class="text-slate-400 hover:text-slate-600 text-2xl" onclick="fecharModal('modalCadastro')">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
                <div class="space-y-4 mb-6">
                    <div>
                        <label for="matricula_cad" class="block text-sm font-medium text-slate-700 mb-1">Matricula:</label>
                        <input id="matricula_cad" type="text" name="matricula" required class="w-full px-3 py-2 border border-slate-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">
                    </div>
                    <div>
                        <label for="name_cad" class="block text-sm font-medium text-slate-700 mb-1">Nome:</label>
                        <input id="name_cad" type="text" name="name" required class="w-full px-3 py-2 border border-slate-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">
                    </div>
                    <div>
                        <label for="email_cad" class="block text-sm font-medium text-slate-700 mb-1">E-mail:</label>
                        <input id="email_cad" type="email" name="email" required class="w-full px-3 py-2 border border-slate-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">
                    </div>
                    <div>
                        <label for="password_cad" class="block text-sm font-medium text-slate-700 mb-1">Senha:</label>
                        <input id="password_cad" type="password" name="password" class="w-full px-3 py-2 border border-slate-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition" placeholder="Deixe em branco para não alterar">
                    </div>
                    <div>
                        <label for="status_cad" class="block text-sm font-medium text-slate-700 mb-1">Status:</label>
                        <select id="status_cad" name="status" required class="w-full px-3 py-2 border border-slate-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition bg-white">
                            <option value="ativo" selected>Ativo</option>
                            <option value="inativo">Inativo</option>
                        </select>
                    </div>
                </div>
                <div class="flex justify-end space-x-3 pt-4 border-t border-slate-200">
                    <button type="button" class="py-2 px-4 bg-slate-200 text-slate-700 rounded-md hover:bg-slate-300 transition duration-150" onclick="fecharModal('modalCadastro')">Cancelar</button>
                    <button type="submit" class="py-2 px-4 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition duration-150 shadow-sm">Cadastrar</button>
                </div>
            </form>
        </div>
    </div>

    {{-- Modais de Detalhes e Edição --}}
    @foreach($usuarios as $user)
        {{-- Modal Detalhes --}}
        <div id="modalDetalhes{{ $user->id }}" class="fixed inset-0 bg-black bg-opacity-60 flex items-center justify-center z-50 p-4 hidden modal-transition modal-closed">
            <div class="bg-white p-6 sm:p-8 rounded-xl shadow-2xl w-full max-w-lg">
                <div class="flex justify-between items-center pb-4 mb-4 border-b border-slate-200">
                    <h2 class="text-xl font-semibold text-slate-800">Detalhes do Usuário</h2>
                    <button type="button" class="text-slate-400 hover:text-slate-600 text-2xl" onclick="fecharModal('modalDetalhes{{ $user->id }}')">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
                <div class="space-y-3 text-slate-700 mb-6">
                    <p><strong class="font-medium text-slate-600">Nome:</strong> {{ $user->name }}</p>
                    <p><strong class="font-medium text-slate-600">Matricula:</strong> {{ $user->matricula }}</p>
                    <p><strong class="font-medium text-slate-600">Email:</strong> {{ $user->email }}</p>
                    <p><strong class="font-medium text-slate-600">Status:</strong> {{ ucfirst($user->status) }}</p>
                    <p><strong class="font-medium text-slate-600">Data de Entrada:</strong> {{ \Carbon\Carbon::parse($user->created_at)->format('d/m/Y')}}</p>
                </div>
                <div class="flex flex-col sm:flex-row justify-end space-y-2 sm:space-y-0 sm:space-x-3 pt-4 border-t border-slate-200">
                    <form action="{{ route('usuarios.destroy', $user->id) }}" method="POST" class="w-full sm:w-auto">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="w-full py-2 px-4 bg-red-600 text-white rounded-md hover:bg-red-700 transition duration-150 shadow-sm" onclick="return confirm('Tem certeza que deseja excluir este usuário?')">Deletar</button>
                    </form>
                    <button type="button" class="w-full sm:w-auto py-2 px-4 bg-yellow-500 text-white rounded-md hover:bg-yellow-600 transition duration-150 shadow-sm" onclick="fecharModal('modalDetalhes{{ $user->id }}'); abrirModal('modalEditar{{ $user->id }}')">Editar</button>
                </div>
            </div>
        </div>

        {{-- Modal Edição --}}
        <div id="modalEditar{{ $user->id }}" class="fixed inset-0 bg-black bg-opacity-60 flex items-center justify-center z-50 p-4 hidden modal-transition modal-closed">
            <div class="bg-white p-6 sm:p-8 rounded-xl shadow-2xl w-full max-w-lg">
                <form method="POST" action="{{ route('usuarios.update', $user->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="flex justify-between items-center pb-4 mb-4 border-b border-slate-200">
                        <h5 class="text-xl font-semibold text-slate-800">Editar Usuário</h5>
                        <button type="button" class="text-slate-400 hover:text-slate-600 text-2xl" onclick="fecharModal('modalEditar{{ $user->id }}')">
                             <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                    <div class="space-y-4 mb-6">
                        <div>
                            <label for="matricula_edit_{{ $user->id }}" class="block text-sm font-medium text-slate-700 mb-1">Matricula:</label>
                            <input id="matricula_edit_{{ $user->id }}" type="text" name="matricula" value="{{ $user->matricula }}" required class="w-full px-3 py-2 border border-slate-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">
                        </div>
                        <div>
                            <label for="name_edit_{{ $user->id }}" class="block text-sm font-medium text-slate-700 mb-1">Nome:</label>
                            <input id="name_edit_{{ $user->id }}" type="text" name="name" value="{{ $user->name }}" required class="w-full px-3 py-2 border border-slate-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">
                        </div>
                        <div>
                            <label for="email_edit_{{ $user->id }}" class="block text-sm font-medium text-slate-700 mb-1">Email:</label>
                            <input id="email_edit_{{ $user->id }}" type="email" name="email" value="{{ $user->email }}" required class="w-full px-3 py-2 border border-slate-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">
                        </div>
                        <div>
                            <label for="password_edit_{{ $user->id }}" class="block text-sm font-medium text-slate-700 mb-1">Senha:</label>
                            <input id="password_edit_{{ $user->id }}" type="password" name="password" class="w-full px-3 py-2 border border-slate-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition" placeholder="Deixe em branco para não alterar">
                            <p class="text-xs text-slate-500 mt-1">Deixe em branco para não alterar a senha.</p>
                        </div>
                        <div>
                            <label for="status_edit_{{ $user->id }}" class="block text-sm font-medium text-slate-700 mb-1">Status:</label>
                            <select id="status_edit_{{ $user->id }}" name="status" required class="w-full px-3 py-2 border border-slate-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition bg-white">
                                <option value="ativo" {{ $user->status === 'ativo' ? 'selected' : '' }}>Ativo</option>
                                <option value="inativo" {{ $user->status === 'inativo' ? 'selected' : '' }}>Inativo</option>
                            </select>
                        </div>
                    </div>
                    <div class="flex justify-end space-x-3 pt-4 border-t border-slate-200">
                        {{-- A função cancelarEdicao precisaria ser definida no seu JS --}}
                        <button type="button" class="py-2 px-4 bg-slate-200 text-slate-700 rounded-md hover:bg-slate-300 transition duration-150" onclick="fecharModal('modalEditar{{ $user->id }}')">Cancelar</button>
                        <button type="submit" class="py-2 px-4 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition duration-150 shadow-sm">Salvar</button>
                    </div>
                </form>
            </div>
        </div>
    @endforeach

    {{-- Scripts --}}
    <script src="{{ asset('js/usuarios/script.js')}}"></script>
    <script src="{{ asset('js/usuarios/cancelar.js')}}"></script>
    <script>
        function abrirModal(id) {
            const modal = document.getElementById(id);
            if (modal) {
                modal.classList.remove('hidden', 'modal-closed');
                modal.classList.add('modal-open');
            }
        }

        function fecharModal(id) {
            const modal = document.getElementById(id);
            if (modal) {
                modal.classList.remove('modal-open');
                modal.classList.add('modal-closed');
                setTimeout(() => modal.classList.add('hidden'), 300);
            }
        }
    </script>

</main>
@endsection