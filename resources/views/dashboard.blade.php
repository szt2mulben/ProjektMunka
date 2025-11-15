@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <h1 class="text-2xl font-semibold mb-4">Dashboard</h1>

    <div class="flex h-full flex-1 flex-col gap-4 overflow-x-auto rounded-xl p-4">
        <div class="grid auto-rows-min gap-4 md:grid-cols-3">
            <div class="relative aspect-video overflow-hidden rounded-xl border border-zinc-700 bg-zinc-900/40">
                <svg class="absolute inset-0 w-full h-full stroke-neutral-900/20 dark:stroke-neutral-100/20" xmlns="http://www.w3.org/2000/svg">
                    <defs>
                        <pattern id="p1" width="20" height="20" patternUnits="userSpaceOnUse">
                            <path d="M 0 20 L 20 0 M -5 5 L 5 -5 M 15 25 L 25 15" fill="none" />
                        </pattern>
                    </defs>
                    <rect width="100%" height="100%" fill="url(#p1)" />
                </svg>
            </div>

            <div class="relative aspect-video overflow-hidden rounded-xl border border-zinc-700 bg-zinc-900/40">
                <svg class="absolute inset-0 w-full h-full stroke-neutral-900/20 dark:stroke-neutral-100/20" xmlns="http://www.w3.org/2000/svg">
                    <defs>
                        <pattern id="p2" width="20" height="20" patternUnits="userSpaceOnUse">
                            <path d="M 0 20 L 20 0 M -5 5 L 5 -5 M 15 25 L 25 15" fill="none" />
                        </pattern>
                    </defs>
                    <rect width="100%" height="100%" fill="url(#p2)" />
                </svg>
            </div>

            <div class="relative aspect-video overflow-hidden rounded-xl border border-zinc-700 bg-zinc-900/40">
                <svg class="absolute inset-0 w-full h-full stroke-neutral-900/20 dark:stroke-neutral-100/20" xmlns="http://www.w3.org/2000/svg">
                    <defs>
                        <pattern id="p3" width="20" height="20" patternUnits="userSpaceOnUse">
                            <path d="M 0 20 L 20 0 M -5 5 L 5 -5 M 15 25 L 25 15" fill="none" />
                        </pattern>
                    </defs>
                    <rect width="100%" height="100%" fill="url(#p3)" />
                </svg>
            </div>
        </div>

        <div class="relative min-h-[100vh] flex-1 overflow-hidden rounded-xl border border-zinc-700 bg-zinc-900/40 md:min-h-min">
            <svg class="absolute inset-0 w-full h-full stroke-neutral-900/20 dark:stroke-neutral-100/20" xmlns="http://www.w3.org/2000/svg">
                <defs>
                    <pattern id="p4" width="20" height="20" patternUnits="userSpaceOnUse">
                        <path d="M 0 20 L 20 0 M -5 5 L 5 -5 M 15 25 L 25 15" fill="none" />
                    </pattern>
                </defs>
                <rect width="100%" height="100%" fill="url(#p4)" />
            </svg>
        </div>
    </div>
@endsection
