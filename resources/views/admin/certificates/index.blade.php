@extends('layouts.admin')

@section('title', 'Certificates Management')

@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h1 class="font-rpg text-2xl font-bold text-white flex items-center gap-2">
                <i class="fa-solid fa-trophy text-[#D6AC55]"></i> TROPHY VAULT (CERTIFICATES)
            </h1>
            <p class="text-xs text-[#B8B4AC]">Manage official licenses, diplomas, and achievement credentials</p>
        </div>
        <a href="{{ route('admin.certificates.create') }}" class="btn-gold !py-2.5 text-xs">
            <i class="fa-solid fa-plus mr-1"></i> Inscribe Trophy
        </a>
    </div>

    <!-- Search & Filter Bar -->
    <div class="rpg-panel p-4 rounded-xl flex items-center justify-between gap-4">
        <div class="relative flex-1 max-w-sm">
            <i class="fa-solid fa-magnifying-glass absolute left-3 top-1/2 -translate-y-1/2 text-xs text-[#B8B4AC]"></i>
            <input type="text" id="table-search" placeholder="Search certificate or issuer..." class="rpg-input !pl-9 text-xs">
        </div>
        <div class="text-xs text-[#B8B4AC] font-mono">
            Total: <span class="text-[#D6AC55] font-bold">{{ $certificates->total() }}</span> trophies
        </div>
    </div>

    <!-- Records Table -->
    <div class="rpg-panel rounded-xl overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="border-b border-[#D6AC55]/20 bg-[#141A28] text-xs font-rpg text-[#D6AC55] uppercase tracking-wider">
                        <th class="py-3.5 px-4">Certificate Name</th>
                        <th class="py-3.5 px-4">Issuer Guild</th>
                        <th class="py-3.5 px-4">Issue Date</th>
                        <th class="py-3.5 px-4">Credential ID</th>
                        <th class="py-3.5 px-4">Artifacts</th>
                        <th class="py-3.5 px-4 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-[#D6AC55]/10 text-xs">
                    @forelse($certificates as $cert)
                        <tr class="hover:bg-[#1B2233]/50 transition-colors" data-searchable>
                            <td class="py-4 px-4 font-semibold text-white">
                                {{ $cert->certificate_name }}
                            </td>
                            <td class="py-4 px-4 text-[#54D5E8]">
                                {{ $cert->issuer ?: '-' }}
                            </td>
                            <td class="py-4 px-4 font-mono text-[#B8B4AC]">
                                {{ $cert->issue_date ? $cert->issue_date->format('d M Y') : '-' }}
                            </td>
                            <td class="py-4 px-4 font-mono text-xs text-[#D6AC55]">
                                {{ $cert->certificate_number ?: '-' }}
                            </td>
                            <td class="py-4 px-4">
                                <span class="badge-gold text-[10px]">
                                    <i class="fa-solid fa-image mr-1"></i> {{ $cert->photos->count() }} Images
                                </span>
                            </td>
                            <td class="py-4 px-4 text-right space-x-2">
                                <a href="{{ route('admin.certificates.edit', $cert) }}" class="btn-cyan !py-1 !px-2.5 text-[11px]" title="Edit">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </a>
                                <form action="{{ route('admin.certificates.destroy', $cert) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                            class="btn-danger !py-1 !px-2.5 text-[11px]" 
                                            data-confirm-delete="Are you sure you want to banish this trophy? All attached photo relics will be purged."
                                            title="Delete">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="py-12 text-center text-[#B8B4AC]">
                                <div class="empty-state">
                                    <div class="empty-state-icon">🏆</div>
                                    <p class="text-sm">No trophy relics inscribed yet.</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($certificates->hasPages())
            <div class="p-4 border-t border-[#D6AC55]/20 bg-[#141A28]">
                {{ $certificates->links() }}
            </div>
        @endif
    </div>
</div>
@endsection
