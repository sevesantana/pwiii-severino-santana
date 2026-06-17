@extends('layouts.app')

@section('title', 'Editar Usuário')

@section('header')
    <div class="text-center mb-8 animate-fade-in">
        <h1 class="bbai-title">Editar Usuário</h1>
        <div class="bbai-subtitle">Ajuste as informações abaixo para atualizar o cadastro do usuário.</div>
    </div>
@endsection

@section('content')
    <div class="animate-fade-in max-w-xl mx-auto" style="animation-delay: 0.1s">
        <!-- Back action -->
        <div class="flex justify-start mb-6">
            <a href="{{ route('users.index') }}" class="bbai-link text-xs !h-9 !px-3">
                <svg class="w-3.5 h-3.5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
                Voltar para a Lista
            </a>
        </div>

        <form action="{{ route('users.update', $user) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="bbai-form space-y-4">
                <!-- Name Field -->
                <div class="bbai-field">
                    <label for="name" class="bbai-label">Nome Completo</label>
                    <input
                        type="text"
                        id="name"
                        name="name"
                        value="{{ old('name', $user->name) }}"
                        class="bbai-input"
                        placeholder="Ex: Severino Santana"
                        required
                        autofocus
                    />
                    @error('name')
                        <div class="bbai-error-text">
                            <svg class="w-4 h-4 text-rose-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                            </svg>
                            <span>{{ $message }}</span>
                        </div>
                    @enderror
                </div>

                <!-- Email Field -->
                <div class="bbai-field">
                    <label for="email" class="bbai-label">Endereço de E-mail</label>
                    <input
                        type="email"
                        id="email"
                        name="email"
                        value="{{ old('email', $user->email) }}"
                        class="bbai-input"
                        placeholder="Ex: severino@exemplo.com"
                        required
                    />
                    @error('email')
                        <div class="bbai-error-text">
                            <svg class="w-4 h-4 text-rose-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                            </svg>
                            <span>{{ $message }}</span>
                        </div>
                    @enderror
                </div>

                <!-- Age Field -->
                <div class="bbai-field">
                    <label for="age" class="bbai-label">Idade</label>
                    <input
                        type="number"
                        id="age"
                        name="age"
                        value="{{ old('age', $user->age) }}"
                        class="bbai-input"
                        placeholder="Ex: 28"
                        min="0"
                        max="120"
                        required
                    />
                    @error('age')
                        <div class="bbai-error-text">
                            <svg class="w-4 h-4 text-rose-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                            </svg>
                            <span>{{ $message }}</span>
                        </div>
                    @enderror
                </div>

                <!-- Action Buttons -->
                <div class="flex items-center justify-end gap-3 pt-4 border-t border-white/5 mt-6">
                    <a href="{{ route('users.index') }}" class="bbai-link !h-11">
                        Cancelar
                    </a>
                    
                    <button type="submit" class="bbai-btn bbai-btn--primary !h-11 !px-6">
                        <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 1121.21 8H17m-.002 4h.002"/>
                        </svg>
                        Atualizar Usuário
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection



