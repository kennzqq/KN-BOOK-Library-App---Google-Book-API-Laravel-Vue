<script setup lang="ts">
import { login, register, dashboard, logout as logoutRoute } from '@/routes';
import { Link, usePage } from '@inertiajs/vue3';
import {
  NavigationMenu,
  NavigationMenuItem,
  NavigationMenuLink,
  NavigationMenuList,
} from '@/components/ui/navigation-menu';
import {
  DropdownMenu,
  DropdownMenuContent,
  DropdownMenuItem,
  DropdownMenuLabel,
  DropdownMenuSeparator,
  DropdownMenuTrigger,
} from '@/components/ui/dropdown-menu';
import { Sheet, SheetContent, SheetHeader, SheetTitle, SheetTrigger } from '@/components/ui/sheet';
import { Menu, User, LogOut, LayoutDashboard } from 'lucide-vue-next';
import { ref, computed } from 'vue';

withDefaults(
    defineProps<{
        canRegister?: boolean;
    }>(),   
    {
        canRegister: true,
    },
);

const mobileMenuOpen = ref(false);
const page = usePage();
const user = computed(() => page.props.auth?.user);
</script>

<template>
    <div class="min-h-screen bg-book-bg text-book-text-primary">
        <header class="border-b border-book-border bg-book-surface">
            <div class="mx-auto flex h-16 max-w-7xl items-center justify-between px-4 sm:px-6 lg:px-8">
                <Sheet v-model:open="mobileMenuOpen">
                    <SheetTrigger as-child class="lg:hidden">
                        <button class="p-2 text-book-primary hover:text-book-secondary transition-colors">
                            <Menu class="h-6 w-6" />
                            <span class="sr-only">Open menu</span>
                        </button>
                    </SheetTrigger>
                    <SheetContent side="left" class="bg-book-bg border-book-border text-book-text-primary">
                        <SheetHeader>
                            <SheetTitle class="text-book-primary font-bold text-2xl">Navigation</SheetTitle>
                        </SheetHeader>
                        <nav class="flex flex-col gap-1 mt-6">
                            <Link href="/" @click="mobileMenuOpen = false" class="text-book-text-primary hover:text-white hover:bg-book-primary transition-all px-4 py-2 rounded-md text-base font-medium">Home</Link>
                            <Link href="/books" @click="mobileMenuOpen = false" class="text-book-text-primary hover:text-white hover:bg-book-primary transition-all px-4 py-2 rounded-md text-base font-medium">Books</Link>
                            <Link href="/services" @click="mobileMenuOpen = false" class="text-book-text-primary hover:text-white hover:bg-book-primary transition-all px-4 py-2 rounded-md text-base font-medium">Services</Link>
                            <Link href="/about" @click="mobileMenuOpen = false" class="text-book-text-primary hover:text-white hover:bg-book-primary transition-all px-4 py-2 rounded-md text-base font-medium">About</Link>
                            <Link href="/contact" @click="mobileMenuOpen = false" class="text-book-text-primary hover:text-white hover:bg-book-primary transition-all px-4 py-2 rounded-md text-base font-medium">Contact</Link>
                        </nav>
                    </SheetContent>
                </Sheet>

                <Link href="/" class="flex items-center gap-3 text-book-primary hover:text-book-secondary transition-colors group">
                    <span class="sr-only">Home</span>
                    <div class="relative h-10 w-10">
                        <svg class="h-10 w-10" viewBox="0 0 40 40" fill="none">
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
                    <span class="text-xl font-bold tracking-tight hidden sm:block">KN BOOK</span>
                </Link>

                <NavigationMenu class="hidden lg:flex">
                    <NavigationMenuList>
                        <NavigationMenuItem>
                            <NavigationMenuLink as-child>
                                <Link href="/" class="group inline-flex h-10 w-max items-center justify-center rounded-md px-4 py-2 text-sm font-medium transition-colors hover:text-book-primary">
                                    Home
                                </Link>
                            </NavigationMenuLink>
                        </NavigationMenuItem>

                        <NavigationMenuItem>
                            <NavigationMenuLink as-child>
                                <Link href="/books" class="group inline-flex h-10 w-max items-center justify-center rounded-md px-4 py-2 text-sm font-medium transition-colors hover:text-book-primary">
                                    Books
                                </Link>
                            </NavigationMenuLink>
                        </NavigationMenuItem>

                        <NavigationMenuItem>
                            <NavigationMenuLink as-child>
                                <Link href="/services" class="group inline-flex h-10 w-max items-center justify-center rounded-md px-4 py-2 text-sm font-medium transition-colors hover:text-book-primary">
                                    Services
                                </Link>
                            </NavigationMenuLink>
                        </NavigationMenuItem>

                        <NavigationMenuItem>
                            <NavigationMenuLink as-child>
                                <Link href="/about" class="group inline-flex h-10 w-max items-center justify-center rounded-md px-4 py-2 text-sm font-medium transition-colors hover:text-book-primary">
                                    About
                                </Link>
                            </NavigationMenuLink>
                        </NavigationMenuItem>

                        <NavigationMenuItem>
                            <NavigationMenuLink as-child>
                                <Link href="/contact" class="group inline-flex h-10 w-max items-center justify-center rounded-md px-4 py-2 text-sm font-medium transition-colors hover:text-book-primary">
                                    Contact
                                </Link>
                            </NavigationMenuLink>
                        </NavigationMenuItem>
                    </NavigationMenuList>
                </NavigationMenu>

                <div class="flex items-center gap-2 sm:gap-4">
                    <!-- Show user menu when logged in -->
                    <DropdownMenu v-if="user">
                        <DropdownMenuTrigger class="flex items-center gap-2 rounded-md bg-book-primary px-3 py-2 text-sm font-medium text-white transition hover:bg-book-secondary focus:outline-none">
                            <User class="h-4 w-4" />
                            <span class="hidden sm:inline">{{ user.name }}</span>
                        </DropdownMenuTrigger>
                        <DropdownMenuContent align="end" class="w-48 bg-book-surface border-book-border">
                            <DropdownMenuLabel class="text-book-text-primary">
                                <div class="flex flex-col">
                                    <span class="font-medium">{{ user.name }}</span>
                                    <span class="text-xs text-book-text-secondary">{{ user.email }}</span>
                                </div>
                            </DropdownMenuLabel>
                            <DropdownMenuSeparator class="bg-book-border" />
                            <DropdownMenuItem as-child>
                                <Link :href="dashboard.url()" class="flex items-center gap-2 cursor-pointer text-book-text-primary hover:text-book-primary hover:bg-book-bg">
                                    <LayoutDashboard class="h-4 w-4" />
                                    <span>Dashboard</span>
                                </Link>
                            </DropdownMenuItem>
                            <DropdownMenuSeparator class="bg-book-border" />
                            <DropdownMenuItem as-child>
                                <Link :href="logoutRoute.url()" method="post" as="button" class="flex w-full items-center gap-2 cursor-pointer text-book-text-primary hover:text-book-primary hover:bg-book-bg">
                                    <LogOut class="h-4 w-4" />
                                    <span>Logout</span>
                                </Link>
                            </DropdownMenuItem>
                        </DropdownMenuContent>
                    </DropdownMenu>

                    <!-- Show login/register when not logged in -->
                    <template v-else>
                        <Link :href="login.url()" class="rounded-md bg-book-primary px-3 py-2 text-sm font-medium text-white transition hover:bg-book-secondary">
                            Login
                        </Link>
                        <Link v-if="canRegister" :href="register.url()" class="hidden md:block rounded-md bg-book-accent px-3 py-2 text-sm font-medium text-book-text-secondary transition hover:bg-book-border">
                            Register
                        </Link>
                    </template>
                </div>
            </div>
        </header>

        <main>
            <slot />
        </main>
    </div>
</template>