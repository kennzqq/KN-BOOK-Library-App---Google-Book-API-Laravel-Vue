<script setup lang="ts">
import { Head } from '@inertiajs/vue3';
import GuestLayout from '@/layouts/GuestLayout.vue';
import { useForm } from '@inertiajs/vue3';

withDefaults(
    defineProps<{
        canRegister: boolean;
    }>(),   
    {
        canRegister: true,
    },
);

const form = useForm({
    name: '',
    email: '',
    subject: '',
    message: ''
});

const handleSubmit = () => {
    form.post('/contact', {
        onSuccess: () => {
            form.reset();
        },
    });
};
</script>

<template>
    <GuestLayout :can-register="canRegister">
        <Head title="Contact Us" />
        
        <main class="relative overflow-hidden">
            <!-- Hero Section -->
            <div class="bg-gradient-to-b from-book-bg to-white py-16">
                <div class="container mx-auto px-6 max-w-4xl text-center">
                    <span class="w-20 h-2 bg-book-primary mb-8 mx-auto block"></span>
                    <h1 class="text-4xl md:text-5xl font-bold text-book-text-primary mb-6">
                        Get in Touch
                    </h1>
                    <p class="text-lg text-book-text-secondary leading-relaxed">
                        Have questions? We'd love to hear from you. Send us a message and we'll respond as soon as possible.
                    </p>
                </div>
            </div>

            <div class="container mx-auto px-6 py-16 max-w-6xl">
                <div class="grid md:grid-cols-2 gap-12">
                    <!-- Contact Form -->
                    <div class="bg-white p-8 rounded-xl shadow-lg border border-book-primary/20">
                        <h2 class="text-2xl font-bold text-book-text-primary mb-6">Send us a Message</h2>
                        <form @submit.prevent="handleSubmit" class="space-y-6">
                            <div>
                                <label for="name" class="block text-sm font-medium text-book-text-primary mb-2">Name</label>
                                <input
                                    type="text"
                                    id="name"
                                    v-model="form.name"
                                    required
                                    class="w-full px-4 py-2 border border-book-primary/30 rounded-lg focus:ring-2 focus:ring-book-primary focus:border-transparent outline-none transition"
                                    placeholder="Your name"
                                />
                            </div>

                            <div>
                                <label for="email" class="block text-sm font-medium text-book-text-primary mb-2">Email</label>
                                <input
                                    type="email"
                                    id="email"
                                    v-model="form.email"
                                    required
                                    class="w-full px-4 py-2 border border-book-primary/30 rounded-lg focus:ring-2 focus:ring-book-primary focus:border-transparent outline-none transition"
                                    placeholder="your@email.com"
                                />
                            </div>

                            <div>
                                <label for="subject" class="block text-sm font-medium text-book-text-primary mb-2">Subject</label>
                                <input
                                    type="text"
                                    id="subject"
                                    v-model="form.subject"
                                    required
                                    class="w-full px-4 py-2 border border-book-primary/30 rounded-lg focus:ring-2 focus:ring-book-primary focus:border-transparent outline-none transition"
                                    placeholder="How can we help?"
                                />
                            </div>

                            <div>
                                <label for="message" class="block text-sm font-medium text-book-text-primary mb-2">Message</label>
                                <textarea
                                    id="message"
                                    v-model="form.message"
                                    required
                                    rows="6"
                                    class="w-full px-4 py-2 border border-book-primary/30 rounded-lg focus:ring-2 focus:ring-book-primary focus:border-transparent outline-none transition resize-none"
                                    placeholder="Your message..."
                                ></textarea>
                            </div>

                            <div v-if="form.errors.name" class="text-red-600 text-sm">{{ form.errors.name }}</div>
                            <div v-if="form.errors.email" class="text-red-600 text-sm">{{ form.errors.email }}</div>
                            <div v-if="form.errors.subject" class="text-red-600 text-sm">{{ form.errors.subject }}</div>
                            <div v-if="form.errors.message" class="text-red-600 text-sm">{{ form.errors.message }}</div>

                            <button
                                type="submit"
                                :disabled="form.processing"
                                class="w-full uppercase py-3 px-6 rounded-lg bg-book-primary border-2 border-transparent text-white text-md hover:bg-book-secondary transition-colors disabled:opacity-50 disabled:cursor-not-allowed"
                            >
                                <span v-if="form.processing">Sending...</span>
                                <span v-else>Send Message</span>
                            </button>

                            <div v-if="form.recentlySuccessful" class="text-green-600 text-sm text-center">
                                Thank you for your message! We will get back to you soon.
                            </div>
                        </form>
                    </div>

                    <!-- Contact Info -->
                    <div class="space-y-8">
                        <div class="bg-white p-8 rounded-xl shadow-lg border border-book-primary/20">
                            <h2 class="text-2xl font-bold text-book-text-primary mb-6">Contact Information</h2>
                            
                            <div class="space-y-6">
                                <div class="flex items-start">
                                    <div class="w-12 h-12 bg-book-primary rounded-full flex items-center justify-center flex-shrink-0">
                                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                        </svg>
                                    </div>
                                    <div class="ml-4">
                                        <h3 class="font-semibold text-book-text-primary mb-1">Email</h3>
                                        <p class="text-book-text-secondary">contact@knbook.com</p>
                                    </div>
                                </div>

                                <div class="flex items-start">
                                    <div class="w-12 h-12 bg-book-primary rounded-full flex items-center justify-center flex-shrink-0">
                                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                        </svg>
                                    </div>
                                    <div class="ml-4">
                                        <h3 class="font-semibold text-book-text-primary mb-1">Phone</h3>
                                        <p class="text-book-text-secondary">+1 (555) 123-4567</p>
                                    </div>
                                </div>

                                <div class="flex items-start">
                                    <div class="w-12 h-12 bg-book-primary rounded-full flex items-center justify-center flex-shrink-0">
                                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        </svg>
                                    </div>
                                    <div class="ml-4">
                                        <h3 class="font-semibold text-book-text-primary mb-1">Address</h3>
                                        <p class="text-book-text-secondary">123 Book Street<br>Reading City, RC 12345</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="bg-white p-8 rounded-xl shadow-lg border border-book-primary/20">
                            <h2 class="text-2xl font-bold text-book-text-primary mb-4">Office Hours</h2>
                            <div class="space-y-2 text-book-text-secondary">
                                <p><span class="font-semibold text-book-text-primary">Monday - Friday:</span> 9:00 AM - 6:00 PM</p>
                                <p><span class="font-semibold text-book-text-primary">Saturday:</span> 10:00 AM - 4:00 PM</p>
                                <p><span class="font-semibold text-book-text-primary">Sunday:</span> Closed</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </GuestLayout>
</template>
