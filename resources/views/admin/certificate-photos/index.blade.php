@extends('layouts.admin')

@section('title', 'Certificate Photos Vault')

@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h1 class="font-rpg text-2xl font-bold text-white flex items-center gap-2">
                <i class="fa-solid fa-file-image text-[#D6AC55]"></i> CERTIFICATE PHOTO VAULT
            </h1>
            <p class="text-xs text-[#B8B4AC]">Manage scanned certificate credentials and trophy images</p>
        </div>
        <a href="{{ route('admin.certificate-photos.create') }}" class="btn-gold !py-2.5 text-xs">
            <i class="fa-solid fa-upload mr-1"></i> Upload Certificate Images
        </a>
    </div>

    @if($certificates->isEmpty())
        <div class="rpg-panel p-12 text-center">
            <div class="empty-state">
                <div class="empty-state-icon">🏆</div>
                <h3 class="font-rpg text-lg text-white mb-2">No Certificates Found</h3>
                <p class="text-xs text-[#B8B4AC] mb-4">You must first inscribe a certificate before uploading its photo seal.</p>
                <a href="{{ route('admin.certificates.create') }}" class="btn-gold text-xs">Inscribe Certificate First</a>
            </div>
        </div>
    @else
        <div class="space-y-8">
            @foreach($certificates as $cert)
                <div class="rpg-panel p-6 rounded-2xl">
                    <div class="flex items-center justify-between border-b border-[#D6AC55]/20 pb-3 mb-4">
                        <div>
                            <h2 class="font-rpg text-lg font-bold text-white flex items-center gap-2">
                                <i class="fa-solid fa-award text-[#D6AC55] text-sm"></i>
                                {{ $cert->certificate_name }}
                            </h2>
                            <p class="text-xs text-[#54D5E8] font-mono">{{ $cert->issuer ?: 'Independent' }} ({{ $cert->photos->count() }} Scans)</p>
                        </div>
                        <a href="{{ route('admin.certificate-photos.create') }}?certificate_id={{ $cert->id }}" class="btn-outline !py-1 !px-3 text-xs">
                            <i class="fa-solid fa-plus mr-1"></i> Attach Scan
                        </a>
                    </div>

                    @if($cert->photos->isEmpty())
                        <div class="p-6 text-center text-[#B8B4AC] text-xs font-story italic bg-[#10131D]/40 rounded-xl">
                            No scanned image relics attached to this certificate yet.
                        </div>
                    @else
                        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-4">
                            @foreach($cert->photos as $photo)
                                <div class="bg-[#10131D] rounded-xl overflow-hidden border border-[#D6AC55]/20 group flex flex-col justify-between">
                                    <div class="aspect-[4/3] relative overflow-hidden bg-[#1B2233]">
                                        <img src="{{ $photo->photo_url }}" alt="Scan" class="w-full h-full object-cover group-hover:scale-105 transition-transform">
                                    </div>
                                    <div class="p-2 space-y-2">
                                        <p class="text-[11px] text-[#B8B4AC] truncate" title="{{ $photo->caption }}">
                                            {{ $photo->caption ?: 'No caption' }}
                                        </p>
                                        <div class="flex items-center justify-between pt-1 border-t border-[#D6AC55]/10">
                                            <a href="{{ route('admin.certificate-photos.edit', $photo) }}" class="text-[#54D5E8] hover:text-white text-xs" title="Edit caption">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </a>
                                            <form action="{{ route('admin.certificate-photos.destroy', $photo) }}" method="POST" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" 
                                                        class="text-red-400 hover:text-red-300 text-xs" 
                                                        data-confirm-delete="Purge this certificate scan relic?"
                                                        title="Delete">
                                                    <i class="fa-solid fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
