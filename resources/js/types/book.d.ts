export interface BookVolumeInfo {
    title: string;
    authors?: string[];
    imageLinks?: {
        thumbnail: string;
        smallThumbnail?: string;
    };
    description?: string;
    publishedDate?: string;
    categories?: string[];
    publisher?: string;
    pageCount?: number;
    averageRating?: number;
    ratingsCount?: number;
    infoLink?: string;
    previewLink?: string;
}

export interface Book {
    id: string;
    volumeInfo: BookVolumeInfo;
}

export interface BookSearchParams {
    q: string;
    maxResults?: number;
    orderBy?: 'relevance' | 'newest';
    printType?: 'all' | 'books' | 'magazines';
    subject?: string;
}

export interface BookSearchResponse {
    books: Book[];
    totalItems: number;
    query: string;
}
