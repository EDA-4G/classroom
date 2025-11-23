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

export interface IClassroom {
    id: number;
    description: string;
    image: string;
    level: string;
    status: string;
    is_fixed: boolean;
    is_active: boolean;
    created_at?: Date;
}
