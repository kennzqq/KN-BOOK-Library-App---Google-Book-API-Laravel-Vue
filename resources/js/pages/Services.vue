<script setup lang="ts">
import { Head, Link } from '@inertiajs/vue3';
import GuestLayout from '@/layouts/GuestLayout.vue';

withDefaults(
    defineProps<{
        canRegister: boolean;
    }>(),   
    {
        canRegister: true,
    },
);
</script>

<template>
    <GuestLayout :can-register="canRegister">
        <Head title="Services" />
        
        <main class="relative overflow-hidden">
            <!-- Hero Section -->
            <div class="bg-gradient-to-b from-[#f8f4f0] to-white py-16">
                <div class="container mx-auto px-6 max-w-4xl text-center">
                    <span class="w-20 h-2 bg-[#8b5e3c] mb-8 mx-auto block"></span>
                    <h1 class="text-4xl md:text-5xl font-bold text-[#3f2f23] mb-6">
                        Our Services
                    </h1>
                    <p class="text-lg text-[#5c4a3f] leading-relaxed">
                        Discover the features and services that make your reading experience exceptional. We provide powerful tools to help you find and explore millions of books.
                    </p>
                </div>
            </div>

            <!-- Main Services -->
            <div class="container mx-auto px-6 py-16 max-w-6xl">
                <div class="grid md:grid-cols-2 gap-12">
                    <div class="bg-white p-8 rounded-xl shadow-lg hover:shadow-2xl hover:-translate-y-2 transition-all duration-300 border border-[#8b5e3c]/20">
                        <div class="flex items-center gap-4 mb-6">
                            <div class="w-16 h-16 bg-[#8b5e3c] rounded-full flex items-center justify-center flex-shrink-0">
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                            </div>
                            <h3 class="text-2xl font-bold text-[#3f2f23]">Advanced Search</h3>
                        </div>
                        <p class="text-[#5c4a3f] mb-4">
                            Powerful search capabilities to find exactly what you're looking for. Filter by genre, author, publication date, and more.
                        </p>
                        <ul class="space-y-2 text-[#5c4a3f]">
                            <li class="flex items-start">
                                <span class="text-[#8b5e3c] mr-2">•</span>
                                <span>Search by title, author, or ISBN</span>
                            </li>
                            <li class="flex items-start">
                                <span class="text-[#8b5e3c] mr-2">•</span>
                                <span>Filter by category and genre</span>
                            </li>
                            <li class="flex items-start">
                                <span class="text-[#8b5e3c] mr-2">•</span>
                                <span>Sort by relevance, date, or rating</span>
                            </li>
                        </ul>
                    </div>

                    <div class="bg-white p-8 rounded-xl shadow-lg hover:shadow-2xl hover:-translate-y-2 transition-all duration-300 border border-[#8b5e3c]/20">
                        <div class="flex items-center gap-4 mb-6">
                            <div class="w-16 h-16 bg-[#8b5e3c] rounded-full flex items-center justify-center flex-shrink-0">
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                                </svg>
                            </div>
                            <h3 class="text-2xl font-bold text-[#3f2f23]">Vast Library</h3>
                        </div>
                        <p class="text-[#5c4a3f] mb-4">
                            Access millions of books from Google Books library. Fiction, non-fiction, academic texts, and more.
                        </p>
                        <ul class="space-y-2 text-[#5c4a3f]">
                            <li class="flex items-start">
                                <span class="text-[#8b5e3c] mr-2">•</span>
                                <span>Over 40 million titles available</span>
                            </li>
                            <li class="flex items-start">
                                <span class="text-[#8b5e3c] mr-2">•</span>
                                <span>Multiple languages and formats</span>
                            </li>
                            <li class="flex items-start">
                                <span class="text-[#8b5e3c] mr-2">•</span>
                                <span>Regular updates with new releases</span>
                            </li>
                        </ul>
                    </div>

                    <div class="bg-white p-8 rounded-xl shadow-lg hover:shadow-2xl hover:-translate-y-2 transition-all duration-300 border border-[#8b5e3c]/20">
                        <div class="flex items-center gap-4 mb-6">
                            <div class="w-16 h-16 bg-[#8b5e3c] rounded-full flex items-center justify-center flex-shrink-0">
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                </svg>
                            </div>
                            <h3 class="text-2xl font-bold text-[#3f2f23]">Preview & Details</h3>
                        </div>
                        <p class="text-[#5c4a3f] mb-4">
                            Get detailed information about each book before making a decision. Read previews and reviews.
                        </p>
                        <ul class="space-y-2 text-[#5c4a3f]">
                            <li class="flex items-start">
                                <span class="text-[#8b5e3c] mr-2">•</span>
                                <span>Book descriptions and summaries</span>
                            </li>
                            <li class="flex items-start">
                                <span class="text-[#8b5e3c] mr-2">•</span>
                                <span>Author information and biographies</span>
                            </li>
                            <li class="flex items-start">
                                <span class="text-[#8b5e3c] mr-2">•</span>
                                <span>Publication details and categories</span>
                            </li>
                        </ul>
                    </div>

                    <div class="bg-white p-8 rounded-xl shadow-lg hover:shadow-2xl hover:-translate-y-2 transition-all duration-300 border border-[#8b5e3c]/20">
                        <div class="flex items-center gap-4 mb-6">
                            <div class="w-16 h-16 bg-[#8b5e3c] rounded-full flex items-center justify-center flex-shrink-0">
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                                </svg>
                            </div>
                            <h3 class="text-2xl font-bold text-[#3f2f23]">Instant Access</h3>
                        </div>
                        <p class="text-[#5c4a3f] mb-4">
                            Browse and discover books anytime, anywhere. Fast loading and responsive design for all devices.
                        </p>
                        <ul class="space-y-2 text-[#5c4a3f]">
                            <li class="flex items-start">
                                <span class="text-[#8b5e3c] mr-2">•</span>
                                <span>Mobile-friendly interface</span>
                            </li>
                            <li class="flex items-start">
                                <span class="text-[#8b5e3c] mr-2">•</span>
                                <span>Fast search results</span>
                            </li>
                            <li class="flex items-start">
                                <span class="text-[#8b5e3c] mr-2">•</span>
                                <span>24/7 availability</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- CTA Section -->
            <div class="bg-[#f8f4f0] py-16">
                <div class="container mx-auto px-6 max-w-4xl text-center">
                    <h2 class="text-3xl font-bold text-[#3f2f23] mb-6">
                        Ready to Explore?
                    </h2>
                    <p class="text-lg text-[#5c4a3f] mb-8">
                        Start discovering amazing books today
                    </p>
                    <div class="flex gap-4 justify-center">
                        <Link href="/books"
                            class="inline-block uppercase py-3 px-6 rounded-lg bg-[#8b5e3c] border-2 border-transparent text-white text-md hover:bg-[#6e472b] transition-colors">
                            Browse Books
                        </Link>
                        <Link href="/contact"
                            class="inline-block uppercase py-3 px-6 rounded-lg bg-transparent border-2 border-[#8b5e3c] text-[#8b5e3c] hover:bg-[#8b5e3c] hover:text-white transition-colors text-md">
                            Contact Us
                        </Link>
                    </div>
                </div>
            </div>
        </main>
    </GuestLayout>
</template>
