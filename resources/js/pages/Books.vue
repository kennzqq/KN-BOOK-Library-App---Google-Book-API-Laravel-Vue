<script setup lang="ts">
import { Head, Link } from '@inertiajs/vue3';
import { ref, reactive, watch } from 'vue';
import { router } from '@inertiajs/vue3';
import GuestLayout from '@/layouts/GuestLayout.vue';
import { useDebounceFn } from '@vueuse/core';

interface Book {
    id: string;
    volumeInfo: {
        title: string;
        authors?: string[];
        imageLinks?: {
            thumbnail: string;
        };
        description?: string;
        publishedDate?: string;
        categories?: string[];
    };
}

const props = defineProps<{
    books: Book[];
    query: string;
    canRegister?: boolean;
}>();

const searchQuery = ref(props.query);

const filters = reactive({
    subject: '',
    printType: '',
    orderBy: 'relevance'
});

const search = () => {
    const params: any = { 
        q: searchQuery.value,
        orderBy: filters.orderBy
    };
    
    if (filters.subject) {
        params.q = `${searchQuery.value}+subject:${filters.subject}`;
    }
    
    if (filters.printType) {
        params.printType = filters.printType;
    }
    
    router.get('/books', params, {
        preserveState: true,
        preserveScroll: true,
    });
};

// Debounced search - waits 500ms after user stops typing
const debouncedSearch = useDebounceFn(() => {
    search();
}, 500);

// Watch for changes in search query
watch(searchQuery, () => {
    if (searchQuery.value) {
        debouncedSearch();
    }
});

// Watch for filter changes
watch(() => [filters.subject, filters.printType, filters.orderBy], () => {
    search();
}, { deep: true });
</script>

<template>
    <GuestLayout :can-register="canRegister">
        <Head title="Books" />
        
        <main class="bg-book-bg min-h-screen text-book-text-primary">
            <section>
                <div class="mx-auto max-w-7xl px-4 py-8 sm:px-6 sm:py-12 lg:px-8">
                    
                    <header>
                        <h2 class="text-xl font-bold text-book-text-primary sm:text-3xl">
                            Book Collection
                        </h2>

                        <p class="mt-4 max-w-md text-book-text-secondary">
                            Discover thousands of books from the Google Books library. Search, filter, and explore our extensive collection.
                        </p>
                    </header>

                    <div class="mt-8 sm:flex sm:items-end sm:justify-between sm:gap-4">

                        <div class="flex-1 max-w-xs">
                            <label for="Search" class="block text-sm font-medium text-book-text-secondary mb-2">
                                Search Books
                            </label>
                            <input
                                id="Search"
                                v-model="searchQuery"
                                type="text"
                                placeholder="Type to search..."
                                class="w-full rounded-lg border border-book-border bg-book-surface text-book-text-primary px-4 py-2 
                                    focus:border-book-primary focus:ring-book-primary"
                            />
                        </div>

                        <div class="mt-4 sm:mt-0 flex items-end gap-4">

                            <!-- Category -->
                            <div class="relative">
                                <details class="group [&_summary::-webkit-details-marker]:hidden">
                                    <summary class="flex cursor-pointer items-center gap-2 border-b border-[#cdbdaf] pb-1 text-[#3f2f23] transition hover:border-[#8b5e3c]">
                                        <span class="text-sm font-medium">Category</span>
                                        <span class="transition group-open:-rotate-180">
                                            <svg class="size-4" viewBox="0 0 24 24" fill="none" stroke-width="1.5" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5"></path>
                                            </svg>
                                        </span>
                                    </summary>

                                    <div class="z-50 group-open:absolute group-open:mt-2 w-64 rounded-sm border border-[#d8c7b8] bg-[#f8f4f0] shadow-lg">
                                        <header class="flex items-center justify-between p-4">
                                            <span class="text-sm text-[#5a4334]">{{ filters.subject ? '1 Selected' : '0 Selected' }}</span>
                                            <button type="button" @click="filters.subject = ''" class="text-sm text-[#8b5e3c] underline">
                                                Reset
                                            </button>
                                        </header>

                                        <ul class="space-y-1 border-t border-[#d8c7b8] p-4">
                                            <li v-for="label in ['fiction','science','history','technology','business']" :key="label">
                                                <label class="inline-flex items-center gap-2 cursor-pointer">
                                                    <input type="radio" :value="label" v-model="filters.subject" class="size-5 border-[#cdbdaf]">
                                                    <span class="text-sm text-[#3f2f23] capitalize">{{ label }}</span>
                                                </label>
                                            </li>
                                        </ul>
                                    </div>
                                </details>
                            </div>

                            <!-- Type -->
                            <div class="relative">
                                <details class="group [&_summary::-webkit-details-marker]:hidden">
                                    <summary class="flex cursor-pointer items-center gap-2 border-b border-[#cdbdaf] pb-1 text-[#3f2f23] transition hover:border-[#8b5e3c]">
                                        <span class="text-sm font-medium">Type</span>
                                        <span class="transition group-open:-rotate-180">
                                            <svg class="size-4" viewBox="0 0 24 24" fill="none" stroke-width="1.5" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5"></path>
                                            </svg>
                                        </span>
                                    </summary>

                                    <div class="z-50 group-open:absolute group-open:mt-2 w-64 rounded-sm border border-[#d8c7b8] bg-[#f8f4f0] shadow-lg">
                                        <header class="flex items-center justify-between p-4">
                                            <span class="text-sm text-[#5a4334]">{{ filters.printType ? '1 Selected' : '0 Selected' }}</span>
                                            <button type="button" @click="filters.printType = ''" class="text-sm text-[#8b5e3c] underline">
                                                Reset
                                            </button>
                                        </header>

                                        <ul class="space-y-1 border-t border-[#d8c7b8] p-4">
                                            <li v-for="item in [{v:'books',t:'Books Only'},{v:'magazines',t:'Magazines Only'}]" :key="item.v">
                                                <label class="inline-flex items-center gap-2 cursor-pointer">
                                                    <input type="radio" :value="item.v" v-model="filters.printType" class="size-5 border-[#cdbdaf]">
                                                    <span class="text-sm text-[#3f2f23]">{{ item.t }}</span>
                                                </label>
                                            </li>
                                        </ul>
                                    </div>
                                </details>
                            </div>

                            <!-- Sort -->
                            <div>
                                <select
                                    v-model="filters.orderBy"
                                    class="h-10 rounded-sm border border-[#d8c7b8] bg-[#f4eee7] text-[#3f2f23] text-sm px-2 focus:border-[#8b5e3c] focus:ring-[#8b5e3c]"
                                >
                                    <option value="relevance">Most Relevant</option>
                                    <option value="newest">Newest</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <ul class="mt-8 grid gap-4 sm:grid-cols-2 lg:grid-cols-4">
                        <li 
                            v-for="book in books" 
                            :key="book.id" 
                            class="rounded-lg overflow-hidden bg-book-surface border border-book-border shadow-sm hover:shadow-md transition"
                        >
                            <Link :href="`/books/${book.id}`" class="group block">
                                
                                <img
                                    v-if="book.volumeInfo.imageLinks?.thumbnail"
                                    :src="book.volumeInfo.imageLinks.thumbnail.replace('http:', 'https:').replace('zoom=1', 'zoom=2')"
                                    class="h-[350px] w-full object-cover transition duration-500 group-hover:scale-105 sm:h-[450px]"
                                />

                                <div v-else class="h-[350px] flex items-center justify-center bg-book-accent text-book-primary sm:h-[450px]">
                                    No Image
                                </div>

                                <div class="p-3">
                                    <h3 class="text-sm font-medium text-book-text-primary group-hover:underline group-hover:underline-offset-4 line-clamp-2">
                                        {{ book.volumeInfo.title }}
                                    </h3>

                                    <p v-if="book.volumeInfo.authors" class="mt-1.5 text-xs text-book-text-secondary">
                                        {{ book.volumeInfo.authors.join(', ') }}
                                    </p>

                                    <p v-if="book.volumeInfo.publishedDate" class="mt-2 text-xs text-book-primary font-semibold">
                                        {{ book.volumeInfo.publishedDate.split('-')[0] }}
                                    </p>
                                </div>
                            </Link>
                        </li>
                    </ul>

                    <div v-if="books.length === 0" class="px-4 py-12 text-center text-book-text-secondary">
                        <p>No books found.</p>
                    </div>

                </div>
            </section>
        </main>
    </GuestLayout>
</template>
