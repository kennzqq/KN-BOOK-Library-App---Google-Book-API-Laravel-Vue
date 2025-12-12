<script setup lang="ts">
import { Head, Link } from '@inertiajs/vue3';
import GuestLayout from '@/layouts/GuestLayout.vue';

interface Book {
    id: string;
    volumeInfo: {
        title: string;
        authors?: string[];
        publisher?: string;
        publishedDate?: string;
        description?: string;
        pageCount?: number;
        categories?: string[];
        imageLinks?: {
            thumbnail?: string;
            small?: string;
            medium?: string;
            large?: string;
        };
        language?: string;
        previewLink?: string;
        infoLink?: string;
    };
}

defineProps<{
    book: Book;
    canRegister?: boolean;
}>();
</script>

<template>
    <GuestLayout :can-register="canRegister">
        <Head :title="book.volumeInfo?.title || 'Book Details'" />
        
        <main class="bg-book-bg min-h-screen text-book-text-primary">
            <div class="container mx-auto px-6 py-12 max-w-6xl">
                
                <Link href="/books" class="inline-flex items-center text-book-primary hover:text-book-secondary mb-8 transition-colors">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    Back to Books
                </Link>

                <div class="grid md:grid-cols-3 gap-8">
                    <div class="md:col-span-1">
                        <div class="bg-white p-6 rounded-xl shadow-lg border border-book-primary/20 sticky top-8">
                            <img 
                                v-if="book.volumeInfo?.imageLinks?.thumbnail"
                                :src="book.volumeInfo.imageLinks.thumbnail.replace('http:', 'https:').replace('zoom=1', 'zoom=3')"
                                :alt="book.volumeInfo?.title"
                                class="w-full rounded-lg shadow-md mb-6"
                            />
                            <div v-else class="w-full h-96 flex items-center justify-center bg-book-accent text-book-primary rounded-lg mb-6">
                                No Cover Image
                            </div>

                            <div class="space-y-3">
                                <a 
                                    v-if="book.volumeInfo?.previewLink"
                                    :href="book.volumeInfo.previewLink" 
                                    target="_blank"
                                    class="block w-full text-center uppercase py-3 px-4 rounded-lg bg-book-primary border-2 border-transparent text-white text-sm hover:bg-book-secondary transition-colors"
                                >
                                    Preview Book
                                </a>
                                <a 
                                    v-if="book.volumeInfo?.infoLink"
                                    :href="book.volumeInfo.infoLink" 
                                    target="_blank"
                                    class="block w-full text-center uppercase py-3 px-4 rounded-lg bg-transparent border-2 border-book-primary text-book-primary hover:bg-book-primary hover:text-white transition-colors text-sm"
                                >
                                    More Info
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="md:col-span-2">
                        <div class="bg-white p-8 rounded-xl shadow-lg border border-book-primary/20">
                            <h1 class="text-3xl md:text-4xl font-bold text-book-text-primary mb-4">
                                {{ book.volumeInfo?.title || 'Untitled' }}
                            </h1>

                            <div class="flex flex-wrap gap-4 mb-6 text-sm text-book-text-secondary">
                                <div v-if="book.volumeInfo?.authors" class="flex items-center">
                                    <svg class="w-5 h-5 mr-2 text-book-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                    </svg>
                                    <span class="font-semibold">{{ book.volumeInfo.authors.join(', ') }}</span>
                                </div>

                                <div v-if="book.volumeInfo?.publishedDate" class="flex items-center">
                                    <svg class="w-5 h-5 mr-2 text-book-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                    <span>{{ book.volumeInfo.publishedDate }}</span>
                                </div>

                                <div v-if="book.volumeInfo?.pageCount" class="flex items-center">
                                    <svg class="w-5 h-5 mr-2 text-book-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                                    </svg>
                                    <span>{{ book.volumeInfo.pageCount }} pages</span>
                                </div>
                            </div>

                            <div v-if="book.volumeInfo?.categories" class="mb-6">
                                <div class="flex flex-wrap gap-2">
                                    <span 
                                        v-for="category in book.volumeInfo.categories" 
                                        :key="category"
                                        class="px-3 py-1 bg-book-primary/10 text-book-primary rounded-full text-sm font-medium"
                                    >
                                        {{ category }}
                                    </span>
                                </div>
                            </div>

                            <div class="border-t border-[#8b5e3c]/20 pt-6 mb-6">
                                <h2 class="text-xl font-bold text-[#3f2f23] mb-4">Description</h2>
                                <div 
                                    v-if="book.volumeInfo?.description"
                                    v-html="book.volumeInfo.description"
                                    class="text-[#5c4a3f] leading-relaxed prose prose-sm max-w-none"
                                ></div>
                                <p v-else class="text-[#6b5a4a] italic">No description available</p>
                            </div>

                            <div class="border-t border-[#8b5e3c]/20 pt-6">
                                <h2 class="text-xl font-bold text-[#3f2f23] mb-4">Additional Information</h2>
                                <div class="grid md:grid-cols-2 gap-4 text-sm">
                                    <div v-if="book.volumeInfo?.publisher" class="flex items-start">
                                        <span class="font-semibold text-[#3f2f23] mr-2">Publisher:</span>
                                        <span class="text-[#5c4a3f]">{{ book.volumeInfo.publisher }}</span>
                                    </div>
                                    <div v-if="book.volumeInfo?.language" class="flex items-start">
                                        <span class="font-semibold text-[#3f2f23] mr-2">Language:</span>
                                        <span class="text-[#5c4a3f]">{{ book.volumeInfo.language.toUpperCase() }}</span>
                                    </div>
                                    <div class="flex items-start">
                                        <span class="font-semibold text-[#3f2f23] mr-2">Book ID:</span>
                                        <span class="text-[#5c4a3f] break-all">{{ book.id }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </GuestLayout>
</template>

<style scoped>
/* Style the HTML description content */
:deep(.prose p) {
    margin-bottom: 1rem;
}

:deep(.prose strong) {
    font-weight: 600;
    color: #3f2f23;
}

:deep(.prose em) {
    font-style: italic;
}
</style>
