@extends('layouts.admin')

@section('title', 'Education Management')

@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h1 class="font-rpg text-2xl font-bold text-white flex items-center gap-2">
                <i class="fa-solid fa-graduation-cap text-[#D6AC55]"></i> ACADEMIC RECORDS
            </h1>
            <p class="text-xs text-[#B8B4AC]">Manage universities, schools, degrees, and academic timelines</p>
        </div>
        <a href="{{ route('admin.educations.create') }}" class="btn-gold !py-2.5 text-xs">
            <i class="fa-solid fa-plus mr-1"></i> Add Academic Record
        </a>
    </div>

    <!-- Search & Filter Bar -->
    <div class="rpg-panel p-4 rounded-xl flex items-center justify-between gap-4">
        <div class="relative flex-1 max-w-sm">
            <i class="fa-solid fa-magnifying-glass absolute left-3 top-1/2 -translate-y-1/2 text-xs text-[#B8B4AC]"></i>
            <input type="text" id="table-search" placeholder="Search institution or major..." class="rpg-input !pl-9 text-xs">
        </div>
        <div class="text-xs text-[#B8B4AC] font-mono">
            Total: <span class="text-[#D6AC55] font-bold">{{ $educations->total() }}</span> records
        </div>
    </div>

    <!-- Records Table -->
    <div class="rpg-panel rounded-xl overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="border-b border-[#D6AC55]/20 bg-[#141A28] text-xs font-rpg text-[#D6AC55] uppercase tracking-wider">
                        <th class="py-3.5 px-4">Institution Name</th>
                        <th class="py-3.5 px-4">Level & Major</th>
                        <th class="py-3.5 px-4">Years</th>
                        <th class="py-3.5 px-4">Status</th>
                        <th class="py-3.5 px-4 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-[#D6AC55]/10 text-xs">
                    @forelse($educations as $edu)
                        <tr class="hover:bg-[#1B2233]/50 transition-colors" data-searchable>
                            <td class="py-4 px-4 font-semibold text-white">
                                {{ $edu->institution_name }}
                            </td>
                            <td class="py-4 px-4 text-[#B8B4AC]">
                                <span class="text-[#54D5E8] font-medium">{{ $edu->education_level }}</span>
                                @if($edu->major)
                                    <span class="text-[#B8B4AC]/60"> - {{ $edu->major }}</span>
                                @endif
                            </td>
                            <td class="py-4 px-4 font-mono text-[#D6AC55]">
                                {{ $edu->start_year }} - {{ $edu->end_year ?? 'Present' }}
                            </td>
                            <td class="py-4 px-4">
                                @if(strtolower($edu->status) === 'completed' || strtolower($edu->status) === 'lulus')
                                    <span class="badge-green text-[10px]">Completed</span>
                                @else
                                    <span class="badge-cyan text-[10px]">Ongoing</span>
                                @endif
                            </td>
                            <td class="py-4 px-4 text-right space-x-2">
                                <a href="{{ route('admin.educations.edit', $edu) }}" class="btn-cyan !py-1 !px-2.5 text-[11px]" title="Edit">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </a>
                                <form action="{{ route('admin.educations.destroy', $edu) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                            class="btn-danger !py-1 !px-2.5 text-[11px]" 
                                            data-confirm-delete="Are you sure you want to delete this education record?"
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
                                    <div class="empty-state-icon">📜</div>
                                    <p class="text-sm">No education records found.</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($educations->hasPages())
            <div class="p-4 border-t border-[#D6AC55]/20 bg-[#141A28]">
                {{ $educations->links() }}
            </div>
        @endif
    </div>
</div>
@endsection
