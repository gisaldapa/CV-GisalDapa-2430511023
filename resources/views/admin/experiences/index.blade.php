@extends('layouts.admin')

@section('title', 'Experience Management')

@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h1 class="font-rpg text-2xl font-bold text-white flex items-center gap-2">
                <i class="fa-solid fa-briefcase text-[#D6AC55]"></i> CAMPAIGN LOGS (EXPERIENCES)
            </h1>
            <p class="text-xs text-[#B8B4AC]">Manage professional employment, guild positions, and engineering campaigns</p>
        </div>
        <a href="{{ route('admin.experiences.create') }}" class="btn-gold !py-2.5 text-xs">
            <i class="fa-solid fa-plus mr-1"></i> Add New Campaign
        </a>
    </div>

    <!-- Search & Filter Bar -->
    <div class="rpg-panel p-4 rounded-xl flex items-center justify-between gap-4">
        <div class="relative flex-1 max-w-sm">
            <i class="fa-solid fa-magnifying-glass absolute left-3 top-1/2 -translate-y-1/2 text-xs text-[#B8B4AC]"></i>
            <input type="text" id="table-search" placeholder="Search company or position..." class="rpg-input !pl-9 text-xs">
        </div>
        <div class="text-xs text-[#B8B4AC] font-mono">
            Total: <span class="text-[#D6AC55] font-bold">{{ $experiences->total() }}</span> campaigns
        </div>
    </div>

    <!-- Records Table -->
    <div class="rpg-panel rounded-xl overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="border-b border-[#D6AC55]/20 bg-[#141A28] text-xs font-rpg text-[#D6AC55] uppercase tracking-wider">
                        <th class="py-3.5 px-4">Company / Guild</th>
                        <th class="py-3.5 px-4">Rank / Position</th>
                        <th class="py-3.5 px-4">Duration</th>
                        <th class="py-3.5 px-4">Location</th>
                        <th class="py-3.5 px-4">Artifacts</th>
                        <th class="py-3.5 px-4 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-[#D6AC55]/10 text-xs">
                    @forelse($experiences as $exp)
                        <tr class="hover:bg-[#1B2233]/50 transition-colors" data-searchable>
                            <td class="py-4 px-4 font-semibold text-white">
                                {{ $exp->company_name }}
                            </td>
                            <td class="py-4 px-4 text-[#54D5E8] font-medium">
                                {{ $exp->position }}
                            </td>
                            <td class="py-4 px-4 font-mono text-[#B8B4AC]">
                                {{ $exp->start_date ? $exp->start_date->format('M Y') : '-' }} - 
                                {{ $exp->end_date ? $exp->end_date->format('M Y') : 'Present' }}
                            </td>
                            <td class="py-4 px-4 text-[#B8B4AC]">
                                {{ $exp->location ?: '-' }}
                            </td>
                            <td class="py-4 px-4">
                                <span class="badge-gold text-[10px]">
                                    <i class="fa-solid fa-camera mr-1"></i> {{ $exp->photos->count() }} Photos
                                </span>
                            </td>
                            <td class="py-4 px-4 text-right space-x-2">
                                <a href="{{ route('admin.experiences.edit', $exp) }}" class="btn-cyan !py-1 !px-2.5 text-[11px]" title="Edit">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </a>
                                <form action="{{ route('admin.experiences.destroy', $exp) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                            class="btn-danger !py-1 !px-2.5 text-[11px]" 
                                            data-confirm-delete="Are you sure you want to delete this campaign? All connected photos will also be banished!"
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
                                    <div class="empty-state-icon">🛡️</div>
                                    <p class="text-sm">No campaign records recorded yet.</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($experiences->hasPages())
            <div class="p-4 border-t border-[#D6AC55]/20 bg-[#141A28]">
                {{ $experiences->links() }}
            </div>
        @endif
    </div>
</div>
@endsection
