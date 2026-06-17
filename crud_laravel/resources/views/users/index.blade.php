@extends('layouts.app')

@section('title', 'Lista de Usuários')

@section('header')
    <div class="text-center mb-8 animate-fade-in">
        <h1 class="bbai-title">Gestão de Usuários</h1>
        <div class="bbai-subtitle">Cadastro, edição e remoção.</div>
    </div>
@endsection

@section('content')
    <div class="animate-fade-in" style="animation-delay: 0.1s">
        <!-- List Header actions -->
        <div class="flex flex-col sm:flex-row justify-between items-center gap-4 mb-6">
            <h2 class="text-lg font-semibold text-white/95 tracking-tight">Registros Salvos</h2>
            
            <a href="{{ route('users.create') }}" class="bbai-link bbai-link--primary w-full sm:w-auto">
                <!-- Plus Icon SVG -->
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                </svg>
                <span>Novo usuário</span>
            </a>
        </div>

        <!-- Table Container for glass scrolling -->
        <div class="bbai-table-container">
            <table class="bbai-table">
                <thead>
                    <tr>
                        <th class="w-16">ID</th>
                        <th>Nome</th>
                        <th>Email</th>
                        <th class="w-24">Idade</th>
                        <th class="w-48 text-right">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($users as $user)
                        <tr>
                            <td class="font-mono text-xs text-white/40">{{ $user->id }}</td>
                            <td class="font-medium text-white/90">{{ $user->name }}</td>
                            <td class="text-white/60 text-sm">{{ $user->email }}</td>
                            <td>
                                <span class="px-2.5 py-0.5 text-xs font-semibold rounded-full bg-white/5 border border-white/10 text-white/80">
                                    {{ $user->age }} anos
                                </span>
                            </td>
                            <td>
                                <div class="flex justify-end items-center gap-2">
                                    <!-- Edit Link -->
                                    <a href="{{ route('users.edit', $user) }}" class="bbai-link text-xs !h-8 !px-3" title="Editar Usuário">
                                        <svg class="w-3.5 h-3.5 mr-1 opacity-70" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/>
                                        </svg>
                                        Editar
                                    </a>

                                    <!-- Delete Button -->
                                    <form
                                        action="{{ route('users.destroy', $user) }}"
                                        method="POST"
                                        onsubmit="return confirm('Tem certeza que deseja excluir este usuário?')"
                                        class="inline"
                                    >
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bbai-btn bbai-btn--danger text-xs !h-8 !px-3" title="Excluir Usuário">
                                            <svg class="w-3.5 h-3.5 mr-1 opacity-70" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                            </svg>
                                            Excluir
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center py-8 text-white/40 text-sm">
                                <div class="flex flex-col items-center justify-center gap-2 py-4">
                                    <svg class="w-8 h-8 text-white/20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                                    </svg>
                                    <span>Nenhum usuário cadastrado no momento.</span>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination Section -->
        @if ($users->hasPages())
            <div class="bbai-pagination-container">
                {{ $users->links() }}
            </div>
        @endif
    </div>
@endsection



