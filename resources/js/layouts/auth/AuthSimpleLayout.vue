<script setup lang="ts">
import AppLogoIcon from '@/components/AppLogoIcon.vue';
import { home } from '@/routes';
import { Link } from '@inertiajs/vue3';

defineProps<{
    title?: string;
    description?: string;
}>();
</script>

<template>
    <div
        class="flex min-h-svh flex-col items-center justify-center gap-6 bg-book-bg p-6 md:p-10"
    >
        <div class="w-full max-w-sm">
            <div class="flex flex-col gap-8">
                <div class="flex flex-col items-center gap-4">
                    <Link
                        :href="home()"
                        class="flex items-center gap-3 font-medium"
                    >
                        <div class="relative h-10 w-10">
                            <svg class="h-10 w-10 text-book-primary" viewBox="0 0 40 40" fill="none">
                                <rect x="8" y="24" width="24" height="12" rx="1" 
                                    fill="currentColor" opacity="0.6" 
                                    transform="rotate(-5 20 30)" />
                                <rect x="6" y="16" width="24" height="12" rx="1" 
                                    fill="currentColor" opacity="0.8" 
                                    transform="rotate(3 18 22)" />
                                <rect x="10" y="8" width="24" height="12" rx="1" 
                                    fill="currentColor" 
                                    transform="rotate(-2 22 14)" />
                                <line x1="12" y1="10" x2="12" y2="18" 
                                    stroke="#f8f4f0" stroke-width="0.5" />
                            </svg>
                        </div>
                        <span class="text-xl font-bold tracking-tight text-book-primary">KN BOOK</span>
                    </Link>
                    <div class="space-y-2 text-center">
                        <h1 class="text-xl font-medium text-book-text-primary">{{ title }}</h1>
                        <p class="text-center text-sm text-book-text-secondary">
                            {{ description }}
                        </p>
                    </div>
                </div>
                <div class="auth-form-container">
                    <slot />
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped>
.auth-form-container :deep(label),
.auth-form-container :deep(.text-muted-foreground) {
    color: var(--color-book-text-primary) !important;
}

.auth-form-container :deep(input) {
    background-color: white !important;
    border-color: var(--color-book-border) !important;
    color: var(--color-book-text-primary) !important;
}

.auth-form-container :deep(input::placeholder) {
    color: var(--color-book-text-secondary) !important;
    opacity: 0.6;
}

.auth-form-container :deep(input:focus) {
    border-color: var(--color-book-primary) !important;
    outline-color: var(--color-book-primary) !important;
}

.auth-form-container :deep(button[type="submit"]) {
    background-color: var(--color-book-primary) !important;
    color: white !important;
}

.auth-form-container :deep(button[type="submit"]:hover) {
    background-color: var(--color-book-secondary) !important;
}

.auth-form-container :deep(a) {
    color: var(--color-book-primary) !important;
}

.auth-form-container :deep(a:hover) {
    color: var(--color-book-secondary) !important;
}
</style>
