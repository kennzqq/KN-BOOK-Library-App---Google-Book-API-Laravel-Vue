<script setup lang="ts">
import { computed } from 'vue';

interface FilterOption {
    value: string;
    label: string;
}

const props = defineProps<{
    modelValue: string;
    options: FilterOption[];
    title: string;
}>();

const emit = defineEmits<{
    'update:modelValue': [value: string];
}>();

const selectedCount = computed(() => props.modelValue ? 1 : 0);
</script>

<template>
    <div class="relative">
        <details class="group [&_summary::-webkit-details-marker]:hidden">
            <summary class="flex cursor-pointer items-center gap-2 border-b border-book-border pb-1 text-book-text-primary transition hover:border-book-primary">
                <span class="text-sm font-medium">{{ title }}</span>
                <span class="transition group-open:-rotate-180">
                    <svg class="size-4" viewBox="0 0 24 24" fill="none" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5"></path>
                    </svg>
                </span>
            </summary>

            <div class="z-50 group-open:absolute group-open:mt-2 w-64 rounded-sm border border-book-border bg-book-bg shadow-lg">
                <header class="flex items-center justify-between p-4">
                    <span class="text-sm text-book-text-secondary">{{ selectedCount }} Selected</span>
                    <button 
                        type="button" 
                        @click="emit('update:modelValue', '')" 
                        class="text-sm text-book-primary underline hover:text-book-secondary transition-colors"
                    >
                        Reset
                    </button>
                </header>

                <ul class="space-y-1 border-t border-book-border p-4">
                    <li v-for="option in options" :key="option.value">
                        <label class="inline-flex items-center gap-2 cursor-pointer hover:text-book-primary transition-colors">
                            <input 
                                type="radio" 
                                :value="option.value" 
                                :checked="modelValue === option.value"
                                @change="emit('update:modelValue', option.value)"
                                class="size-5 border-book-border accent-book-primary"
                            >
                            <span class="text-sm text-book-text-primary capitalize">{{ option.label }}</span>
                        </label>
                    </li>
                </ul>
            </div>
        </details>
    </div>
</template>
