@extends('layouts.admin')

@section('title', 'Skills Management')

@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h1 class="font-rpg text-2xl font-bold text-white flex items-center gap-2">
                <i class="fa-solid fa-wand-magic-sparkles text-[#D6AC55]"></i> SKILL TREE MANAGEMENT
            </h1>
            <p class="text-xs text-[#B8B4AC]">Configure hero abilities, percentage masteries, and spell categories</p>
        </div>
        <a href="{{ route('admin.skills.create') }}" class="btn-gold !py-2.5 text-xs">
            <i class="fa-solid fa-plus mr-1"></i> Add New Ability
        </a>
    </div>

    <!-- Search & Filter Bar -->
    <div class="rpg-panel p-4 rounded-xl flex items-center justify-between gap-4">
        <div class="relative flex-1 max-w-sm">
            <i class="fa-solid fa-magnifying-glass absolute left-3 top-1/2 -translate-y-1/2 text-xs text-[#B8B4AC]"></i>
            <input type="text" id="table-search" placeholder="Search skill or category..." class="rpg-input !pl-9 text-xs">
        </div>
        <div class="text-xs text-[#B8B4AC] font-mono">
            Total: <span class="text-[#D6AC55] font-bold">{{ $skills->total() }}</span> skills
        </div>
    </div>

    <!-- Records Table -->
    <div class="rpg-panel rounded-xl overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="border-b border-[#D6AC55]/20 bg-[#141A28] text-xs font-rpg text-[#D6AC55] uppercase tracking-wider">
                        <th class="py-3.5 px-4">Ability / Skill Name</th>
                        <th class="py-3.5 px-4">Category</th>
                        <th class="py-3.5 px-4">Rank / Level</th>
                        <th class="py-3.5 px-4">Mastery Bar</th>
                        <th class="py-3.5 px-4 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-[#D6AC55]/10 text-xs">
                    @forelse($skills as $skill)
                        <tr class="hover:bg-[#1B2233]/50 transition-colors" data-searchable>
                            <td class="py-4 px-4 font-semibold text-white">
                                <div class="flex items-center gap-2">
                                    <span class="text-[#D6AC55]">◈</span>
                                    <span>{{ $skill->skill_name }}</span>
                                </div>
                            </td>
                            <td class="py-4 px-4">
                                <span class="badge-gold text-[10px]">{{ $skill->category ?: 'General' }}</span>
                            </td>
                            <td class="py-4 px-4">
                                <span class="badge-cyan text-[10px]">{{ $skill->skill_level ?: 'Intermediate' }}</span>
                            </td>
                            <td class="py-4 px-4 min-w-[160px]">
                                <div class="flex items-center gap-3">
                                    <div class="flex-1 h-2 bg-[#10131D] rounded-full overflow-hidden border border-[#D6AC55]/20">
                                        <div class="h-full bg-gradient-to-r from-[#D6AC55] to-[#54D5E8]" style="width: {{ $skill->percentage }}%"></div>
                                    </div>
                                    <span class="font-mono font-bold text-[#D6AC55] w-9 text-right">{{ $skill->percentage }}%</span>
                                </div>
                            </td>
                            <td class="py-4 px-4 text-right space-x-2">
                                <a href="{{ route('admin.skills.edit', $skill) }}" class="btn-cyan !py-1 !px-2.5 text-[11px]" title="Edit">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </a>
                                <form action="{{ route('admin.skills.destroy', $skill) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                            class="btn-danger !py-1 !px-2.5 text-[11px]" 
                                            data-confirm-delete="Are you sure you want to delete this skill?"
                                            title="Delete">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="py-12 text-center text-[#B8B4AC]">
                                <div class="empty-state">
                                    <div class="empty-state-icon">🔮</div>
                                    <p class="text-sm">No skills found in the spellbook.</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($skills->hasPages())
            <div class="p-4 border-t border-[#D6AC55]/20 bg-[#141A28]">
                {{ $skills->links() }}
            </div>
        @endif
    </div>
</div>
@endsection
