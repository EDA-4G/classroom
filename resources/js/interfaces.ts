export interface IAdvertisement {
    id: number;
    description: string;
    image: string;
    is_active: boolean;
    created_at: Date;
}

export interface IDepartment {
    id: number;
    description: string;
    is_active: boolean;
    created_at?: Date;
}
