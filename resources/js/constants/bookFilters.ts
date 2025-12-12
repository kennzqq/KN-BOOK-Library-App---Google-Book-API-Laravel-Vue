export const BOOK_SUBJECTS = [
    { value: 'fiction', label: 'Fiction' },
    { value: 'science', label: 'Science' },
    { value: 'history', label: 'History' },
    { value: 'technology', label: 'Technology' },
    { value: 'business', label: 'Business' },
    { value: 'art', label: 'Art' },
    { value: 'biography', label: 'Biography' },
    { value: 'computers', label: 'Computers' },
    { value: 'cooking', label: 'Cooking' },
    { value: 'health', label: 'Health' },
] as const;

export const PRINT_TYPES = [
    { value: 'all', label: 'All' },
    { value: 'books', label: 'Books' },
    { value: 'magazines', label: 'Magazines' },
] as const;

export const ORDER_BY_OPTIONS = [
    { value: 'relevance', label: 'Relevance' },
    { value: 'newest', label: 'Newest' },
] as const;

export type BookSubject = typeof BOOK_SUBJECTS[number]['value'];
export type PrintType = typeof PRINT_TYPES[number]['value'];
export type OrderBy = typeof ORDER_BY_OPTIONS[number]['value'];
