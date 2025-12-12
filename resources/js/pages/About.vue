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
        <Head title="About Us" />
        
        <main class="relative overflow-hidden">
            <div class="bg-gradient-to-b from-[#f8f4f0] to-white py-16">
                <div class="container mx-auto px-6 max-w-4xl text-center">
                    <span class="w-20 h-2 bg-[#8b5e3c] mb-8 mx-auto block"></span>
                    <h1 class="text-4xl md:text-5xl font-bold text-[#3f2f23] mb-6">
                        About KN Book
                    </h1>
                    <p class="text-lg text-[#5c4a3f] leading-relaxed">
                        Your gateway to millions of books from around the world. We connect readers with knowledge, stories, and inspiration.
                    </p>
                </div>
            </div>

            <div class="container mx-auto px-4 sm:px-6 py-12 sm:py-20 max-w-5xl">
                <div class="bg-gradient-to-br from-[#8b5e3c] to-[#6e472b] p-1 rounded-2xl shadow-2xl">
                    <div class="bg-white p-6 sm:p-10 md:p-12 rounded-2xl">
                        <div class="text-center mb-8 sm:mb-12">
                            <div class="inline-block bg-[#8b5e3c] text-white px-4 sm:px-6 py-2 rounded-full text-xs sm:text-sm font-bold uppercase tracking-wider mb-4 sm:mb-6">
                                Developed By
                            </div>
                            <div class="w-24 h-1 bg-gradient-to-r from-[#8b5e3c] to-[#6e472b] mx-auto"></div>
                        </div>
                        
                        <div class="flex flex-col lg:flex-row items-center gap-6 sm:gap-8 lg:gap-12">
                            <div class="flex-shrink-0 relative group">
                                <div class="absolute inset-0 bg-gradient-to-br from-[#8b5e3c] to-[#6e472b] rounded-full blur-xl opacity-50 group-hover:opacity-75 transition-opacity"></div>
                                <div class="relative">
                                    <img 
                                        src="/images/dev.jpg" 
                                        alt="Developer" 
                                        class="w-40 h-40 sm:w-48 sm:h-48 lg:w-64 lg:h-64 rounded-full object-cover shadow-2xl border-4 sm:border-6 border-white ring-4 ring-[#8b5e3c]/30 group-hover:scale-105 transition-transform duration-300"
                                    />
                                </div>
                            </div>
                            
                            <div class="flex-1 text-center lg:text-left">
                                <h3 class="text-2xl sm:text-3xl md:text-4xl font-bold text-[#3f2f23] mb-2 sm:mb-3">
                                    CARL KENNETH RUBIA
                                </h3>
                                <div class="flex flex-wrap gap-2 justify-center lg:justify-start mb-4 sm:mb-6">
                                    <span class="bg-gradient-to-r from-[#8b5e3c] to-[#6e472b] text-white px-3 sm:px-4 py-1.5 sm:py-2 rounded-full text-xs sm:text-sm font-semibold shadow-md">
                                        Full Stack Developer
                                    </span>
                                    <span class="bg-gradient-to-r from-[#8b5e3c] to-[#6e472b] text-white px-3 sm:px-4 py-1.5 sm:py-2 rounded-full text-xs sm:text-sm font-semibold shadow-md">
                                        Project Creator
                                    </span>
                                </div>
                                
                                <p class="text-sm sm:text-base md:text-lg text-[#5c4a3f] leading-relaxed mb-4 sm:mb-6">
                                    <strong class="text-[#3f2f23] font-bold">Information Techonology Student</strong> specializing in modern web development. 
                                    This platform was built from scratch demonstrating expertise in full-stack development, API integration, 
                                    authentication systems, and responsive design principles.
                                </p>
                                
                                <div class="bg-[#f8f4f0] p-4 sm:p-6 rounded-xl mb-4 sm:mb-6">
                                    <h4 class="text-base sm:text-lg font-bold text-[#3f2f23] mb-3 sm:mb-4">Technology Stack Used:</h4>
                                    <div class="grid grid-cols-2 gap-3 sm:gap-4">
                                        <div class="text-center p-2 sm:p-3 bg-white rounded-lg shadow-sm hover:shadow-md transition-shadow">
                                            <div class="text-base sm:text-xl md:text-2xl font-black text-[#8b5e3c] mb-1 break-words">Laravel 11</div>
                                            <div class="text-xs text-[#5c4a3f]">Backend</div>
                                        </div>
                                        <div class="text-center p-2 sm:p-3 bg-white rounded-lg shadow-sm hover:shadow-md transition-shadow">
                                            <div class="text-base sm:text-xl md:text-2xl font-black text-[#8b5e3c] mb-1 break-words">Vue 3</div>
                                            <div class="text-xs text-[#5c4a3f]">Frontend</div>
                                        </div>
                                        <div class="text-center p-2 sm:p-3 bg-white rounded-lg shadow-sm hover:shadow-md transition-shadow">
                                            <div class="text-base sm:text-xl md:text-2xl font-black text-[#8b5e3c] mb-1 break-words">TypeScript</div>
                                            <div class="text-xs text-[#5c4a3f]">Type Safety</div>
                                        </div>
                                        <div class="text-center p-2 sm:p-3 bg-white rounded-lg shadow-sm hover:shadow-md transition-shadow">
                                            <div class="text-base sm:text-xl md:text-2xl font-black text-[#8b5e3c] mb-1 break-words">MySQL</div>
                                            <div class="text-xs text-[#5c4a3f]">Database</div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="flex flex-wrap gap-3 sm:gap-4 justify-center lg:justify-start">
                                    <a href="https://github.com/yourusername" target="_blank" class="flex items-center gap-2 bg-[#3f2f23] hover:bg-[#2a1f17] text-white px-4 sm:px-6 py-2 sm:py-3 rounded-lg font-semibold transition-all hover:scale-105 shadow-md text-sm sm:text-base">
                                        <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/>
                                        </svg>
                                        GitHub
                                    </a>
                                    <a href="https://linkedin.com/in/yourusername" target="_blank" class="flex items-center gap-2 bg-[#0077b5] hover:bg-[#006399] text-white px-4 sm:px-6 py-2 sm:py-3 rounded-lg font-semibold transition-all hover:scale-105 shadow-md text-sm sm:text-base">
                                        <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/>
                                        </svg>
                                        LinkedIn
                                    </a>
                                    <a href="mailto:your.email@example.com" class="flex items-center gap-2 bg-[#8b5e3c] hover:bg-[#6e472b] text-white px-4 sm:px-6 py-2 sm:py-3 rounded-lg font-semibold transition-all hover:scale-105 shadow-md text-sm sm:text-base">
                                        <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                        </svg>
                                        Email
                                    </a>
                                </div>
                            </div>
                        </div>
                        
                        <div class="mt-8 sm:mt-12 pt-6 sm:pt-8 border-t-2 border-[#8b5e3c]/20">
                            <div class="bg-gradient-to-r from-[#8b5e3c]/10 to-[#6e472b]/10 p-4 sm:p-6 rounded-xl">
                                <h4 class="text-lg sm:text-xl font-bold text-[#3f2f23] mb-3 sm:mb-4 text-center">Project Highlights</h4>
                                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-3 sm:gap-4 text-xs sm:text-sm">
                                    <div class="flex items-center gap-2 sm:gap-3 text-[#3f2f23]">
                                        <svg class="w-4 h-4 sm:w-5 sm:h-5 text-[#8b5e3c] flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                        </svg>
                                        <span class="font-semibold">Google Books API Integration</span>
                                    </div>
                                    <div class="flex items-center gap-2 sm:gap-3 text-[#3f2f23]">
                                        <svg class="w-4 h-4 sm:w-5 sm:h-5 text-[#8b5e3c] flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                        </svg>
                                        <span class="font-semibold">User Authentication System</span>
                                    </div>
                                    <div class="flex items-center gap-2 sm:gap-3 text-[#3f2f23]">
                                        <svg class="w-4 h-4 sm:w-5 sm:h-5 text-[#8b5e3c] flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                        </svg>
                                        <span class="font-semibold">Responsive Mobile Design</span>
                                    </div>
                                    <div class="flex items-center gap-2 sm:gap-3 text-[#3f2f23]">
                                        <svg class="w-4 h-4 sm:w-5 sm:h-5 text-[#8b5e3c] flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                        </svg>
                                        <span class="font-semibold">Advanced Search Filters</span>
                                    </div>
                                    <div class="flex items-center gap-2 sm:gap-3 text-[#3f2f23]">
                                        <svg class="w-4 h-4 sm:w-5 sm:h-5 text-[#8b5e3c] flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                        </svg>
                                        <span class="font-semibold">Real-time Search Debouncing</span>
                                    </div>
                                    <div class="flex items-center gap-2 sm:gap-3 text-[#3f2f23]">
                                        <svg class="w-4 h-4 sm:w-5 sm:h-5 text-[#8b5e3c] flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                        </svg>
                                        <span class="font-semibold">Custom Design System</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container mx-auto px-6 py-16 max-w-6xl">
                <div class="grid md:grid-cols-2 gap-12 items-center">
                    <div>
                        <h2 class="text-3xl font-bold text-[#3f2f23] mb-4">Our Mission</h2>
                        <p class="text-[#5c4a3f] mb-4 leading-relaxed">
                            We believe that books have the power to transform lives. Our mission is to make reading accessible to everyone by providing easy access to millions of books from the Google Books library.
                        </p>
                        <p class="text-[#5c4a3f] leading-relaxed">
                            Whether you're looking for the latest bestseller, a classic novel, or educational resources, we're here to help you discover your next great read.
                        </p>
                    </div>
                    <div class="relative">
                        <img 
                            src="https://images.unsplash.com/photo-1507842217343-583bb7270b66?w=600&h=400&fit=crop&auto=format" 
                            alt="Library" 
                            class="rounded-lg shadow-xl"
                        />
                    </div>
                </div>
            </div>

            <div class="bg-[#f8f4f0] py-16">
                <div class="container mx-auto px-6 max-w-6xl">
                    <h2 class="text-3xl font-bold text-[#3f2f23] mb-12 text-center">Our Values</h2>
                    <div class="grid md:grid-cols-3 gap-8">
                        <div class="bg-white p-8 rounded-xl shadow-lg hover:shadow-2xl transition-all duration-300">
                            <div class="w-16 h-16 bg-[#8b5e3c] rounded-full flex items-center justify-center mb-6 mx-auto">
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold text-[#3f2f23] mb-3 text-center">Accessibility</h3>
                            <p class="text-[#5c4a3f] text-center">
                                Making books available to everyone, everywhere, anytime.
                            </p>
                        </div>

                        <div class="bg-white p-8 rounded-xl shadow-lg hover:shadow-2xl transition-all duration-300">
                            <div class="w-16 h-16 bg-[#8b5e3c] rounded-full flex items-center justify-center mb-6 mx-auto">
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold text-[#3f2f23] mb-3 text-center">Quality</h3>
                            <p class="text-[#5c4a3f] text-center">
                                Curating the best content from trusted sources worldwide.
                            </p>
                        </div>

                        <div class="bg-white p-8 rounded-xl shadow-lg hover:shadow-2xl transition-all duration-300">
                            <div class="w-16 h-16 bg-[#8b5e3c] rounded-full flex items-center justify-center mb-6 mx-auto">
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold text-[#3f2f23] mb-3 text-center">Innovation</h3>
                            <p class="text-[#5c4a3f] text-center">
                                Constantly improving the reading and discovery experience.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container mx-auto px-6 py-16 max-w-4xl text-center">
                <h2 class="text-3xl font-bold text-[#3f2f23] mb-6">
                    Ready to Start Reading?
                </h2>
                <p class="text-lg text-[#5c4a3f] mb-8">
                    Explore millions of books and find your next favorite story.
                </p>
                <Link href="/books"
                    class="inline-block uppercase py-3 px-6 rounded-lg bg-[#8b5e3c] border-2 border-transparent text-white text-md hover:bg-[#6e472b] transition-colors">
                    Browse Books
                </Link>
            </div>
        </main>
    </GuestLayout>
</template>