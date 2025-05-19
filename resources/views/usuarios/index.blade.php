@extends('layouts.app')

@section('title', 'Usuários Cadastrados')

@section('head')
    <link rel="stylesheet" href="{{ asset('css/usuarios/style2.css') }}">
    <link rel="stylesheet" href="{{ asset('css/usuarios/modal.css') }}">
@endsection

@section('content')

<!-- Adicione este CSS no seu arquivo de estilos -->

<main class="content">
    @if(session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger" role="alert">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <section class="top-header">
        <h1>Usuários</h1>
        <button class="btn-add" onclick="abrirModal('modalCadastro')">
            + Cadastrar
        </button>
    </section>

    <section aria-label="Tabela de usuários">
        <table class="user-table">
            <thead>
                <tr>
                    <th>Matricula</th>
                    <th>Usuário</th>
                    <th>E-mail</th>
                    <th>Situação</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($usuarios as $usuario)
                    <tr onclick="abrirModal('modalDetalhes{{ $usuario->id }}')" style="cursor: pointer;">
                        <td>{{ $usuario->matricula }}</td>
                        <td>{{ $usuario->name }}</td>
                        <td>{{ $usuario->email }}</td>
                        <td>
                            @if($usuario->status === 'ativo')
                                <span class="status ativo">🟢 Ativo</span>
                            @else
                                <span class="status inativo">🔴 Inativo</span>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="4">Nenhum usuário encontrado.</td></tr>
                @endforelse
            </tbody>
        </table>
        <!-- Paginação -->
        <div class="d-flex justify-content-center">
            {{ $usuarios->links('pagination::bootstrap-4') }}
        </div>
    </section>

    <!-- Modal de Cadastro de Usuário -->
    <div id="modalCadastro" class="modal hidden">
        <div class="modal-box">
            <form action="{{ route('usuarios.store') }}" method="POST" id="formUsuario">
                @csrf
                <div class="modal-header">
                    <h5>Cadastrar novo usuário</h5>
                    <span class="modal-close" onclick="fecharModal('modalCadastro')">&times;</span>
                </div>
                <div class="modal-body">
                    <label>Matricula:</label>
                    <input type="text" name="matricula" required>

                    <label>Nome:</label>
                    <input type="text" name="name" required>

                    <label>E-mail:</label>
                    <input type="email" name="email" required>

                    <label id="labelSenha">Senha:</label>
                    <input type="password" name="password">

                    <div class="input-group">
                        <label for="status">Status:</label>
                        <select id="status" name="status" required>
                            <option value="ativo" selected>Ativo</option>
                            <option value="inativo">Inativo</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" onclick="fecharModal('modalCadastro')">Cancelar</button>
                    <button type="submit" class="btn-confirmar">Cadastrar</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modais de Detalhes e Edição -->
    @foreach($usuarios as $user)
        <!-- Modal Detalhes -->
        <div id="modalDetalhes{{ $user->id }}" class="modal hidden">
            <div class="modal-box">
                <div class="modal-header">
                    <h2>Detalhes de usuário</h2>
                    <span class="modal-close" onclick="fecharModal('modalDetalhes{{ $user->id }}')">&times;</span>
                </div>
                <div class="modal-body">
                    <p>Nome: {{ $user->name }}</p>
                    <p>Matricula: {{ $user->matricula }}</p>
                    <p>Email: {{ $user->email }}</p>
                    <p>Status: {{ ucfirst($user->status) }}</p>
                    <p>Data de Entrada: {{ \Carbon\Carbon::parse($user->created_at)->format('d/m/Y')}}</p>
                </div>
                <div class="modal-footer">
                    <form action="{{ route('usuarios.destroy', $user->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button onclick="return confirm('Tem certeza que deseja excluir este usuário?')">Deletar</button>
                    </form>
                    <button onclick="fecharModal('modalDetalhes{{ $user->id }}'); abrirModal('modalEditar{{ $user->id }}')">Editar</button>
                </div>
            </div>
        </div>

        <!-- Modal Edição -->
        <div id="modalEditar{{ $user->id }}" class="modal hidden">
            <div class="modal-box">
                <form method="POST" action="{{ route('usuarios.update', $user->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="modal-header">
                        <h5>Editar usuário</h5>
                        <span class="modal-close" onclick="fecharModal('modalEditar{{ $user->id }}')">&times;</span>
                    </div>
                    <div class="modal-body">
                        <label>Matricula:</label>
                        <input type="text" name="matricula" value="{{ $user->matricula }}" required>

                        <label>Nome:</label>
                        <input type="text" name="name" value="{{ $user->name }}" required>

                        <label>Email:</label>
                        <input type="email" name="email" value="{{ $user->email }}" required>

                        <label>Senha:</label>
                        <input type="password" name="password">

                        <div class="input-group">
                            <label for="status">Status:</label>
                            <select name="status" required>
                                <option value="ativo" {{ $user->status === 'ativo' ? 'selected' : '' }}>Ativo</option>
                                <option value="inativo" {{ $user->status === 'inativo' ? 'selected' : '' }}>Inativo</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" onclick="cancelarEdicao('{{ $user->id }}')">Cancelar</button>
                        <button type="submit">Salvar</button>
                    </div>
                </form>
            </div>
        </div>
    @endforeach

    <!-- Scripts -->
    <script src="{{ asset('js/usuarios/script.js')}}"></script>
    <script src="{{ asset('js/usuarios/cancelar.js')}}"></script>
</main>
@endsection
