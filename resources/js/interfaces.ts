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

export enum ClassroomStatus {
    Open = 'open',
    In_class = 'in_class',
    In_room = 'in_room',
    Test = 'test',
    Exam = 'exam',
    Unlock = 'unlock',
    Maintenance = 'maintenance',
    To_wash = 'to_wash',
    None = 'none',
}

export interface IClassroom {
    id: number;
    description: string;
    image: string;
    level: string;
    status: ClassroomStatus;
    is_fixed: boolean;
    is_active: boolean;
    created_at?: Date;
}

export interface IPopoverItem {
    label: string;
    value: string;
}

export interface IDocument {
    id: number;
    user_id: number;
    description: string;
    document: string;
    extension: string;
    is_active: boolean;
    created_at?: Date;
}
